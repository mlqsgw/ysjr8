<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class DealController extends MemberbaseController
{
	public function index(){
		$act=I("get.act");
		switch ($act)
		{
			case "refund":  //已经还清的贷款
			    				
				$this->refundover();
				$temp='refundover';
				break;
			
			default:
			    $this->refundlist();				
				$act='index';
				$temp='index';
				break;
		}
		$this->assign("act",$act);
		$this->display($temp);
	}
	
	private function refundover(){


	    $uid=get_current_userid();
	    $where=array('is_delete'=>0,'deal_status'=>9,'user_id'=>$uid);
	    //获取还款的总数
	    $count=M('loan')->where($where)->count();
	    if($count>0){
	        $page = $this->page($count, 15);
	        $_lists=M('loan')
	        ->where($where)
	        ->field()
	        ->order("create_time ASC")
	        ->limit($page->firstRow . ',' . $page->listRows)
	        ->select();
	        $lists=$this->deal_with($_lists);
	        $this->assign('lists', $lists);	       
	        $this->assign("Page", $page->show('Admin'));
	    }	    
	}
	
	/**
	 * 还款列表
	 */
	private function refundlist(){

	    $uid=get_current_userid();
	    $where=array('is_delete'=>0,'deal_status'=>7,'user_id'=>$uid);
	    //获取还款的总数
	    $count=M('loan')->where($where)->count();
	    if($count>0){	        
	        $page = $this->page($count,15);	      
	     //   select *,start_time as last_time,(load_money/borrow_amount*100) as progress_point,(enddate - 1422296959) as remain_time from ac_loan where is_effect = 1 and is_delete = 0
	        $_lists=M('loan')
	        ->where($where)	        
	        ->field()
	        ->order("create_time ASC")
	        ->limit($page->firstRow . ',' . $page->listRows)
	        ->select();
	        $lists=$this->deal_with($_lists);            
	        $this->assign('lists', $lists);
	        $this->assign("Page", $page->show('Admin'));
	    }	   
	
	}
	/**
	 * 处理贷款信息
	 * @param unknown $_lists
	 */
	private function  deal_with($_lists){
	    	foreach ($_lists as $key=>$deal){
	    	    //借款金额： froat
	    	    $_lists[$key]['borrow_amount_format']=format_price($deal['borrow_amount']/10000).'万'; 
	    	     
	    	    $c=$deal['loantype'];
	    	    $class='\Common\Lib\Loan'.'\\'.$c;
	    	    
	    	    
	    	    //完成度 完成比例
	            // 0 待审核1审核通过2审核失败3用户取消4流标5满标待审核6满标审核失败	7还款中8逾期中9已完成
	    	   if($deal['deal_status']==1 || $deal['deal_status']==4 || $deal['deal_status']==5 || $deal['deal_status']==6  ){
	    	       $_lists[$key]['progress_point'] = $deal['load_money']/$deal['borrow_amount']*100;	    	   
	    	        
	    	   }elseif ($deal['deal_status']==7 || $deal['deal_status']==8 || $deal['deal_status']==9){
                 
	    	       //总利息
	    	       $count_rate=$class::countRate($deal['borrow_amount'],$deal['rate']/100/12,$deal['repay_time']);
	    	       //总钱数
	    	       $deal['remain_repay_money'] = $deal['borrow_amount'] + $count_rate;
	    	       $_lists[$key]['progress_point'] =$deal['repay_money']/$deal['remain_repay_money']*100;
	    	     
	    	   }else{
	    	       $_lists[$key]['progress_point']=0;
	    	   }
	    	   
	    	   if($deal['deal_status']==7){
	    	         	  
	    	       //下一个还款日    //开始还款日期  借款时间  下一个还款日期
	    	       if($_lists[$key]['next_repay_time']<=0){                     //$repay_start_time,$last_repay_time,$next_repay_time,$repay_time
	    	           $_lists[$key]['next_repay_time']=$class::next_replay_month($deal['repay_start_time'],0,$deal["repay_time"]);
	    	       }	    	 
	    	       //月还款额： 0
	    	      $monthrepay=$class::getMonthRepayMoney($deal['borrow_amount'],$deal['rate']/100/12,$deal['repay_time'],$deal['repay_count']+1);
              
	    	      $month_repay_money=$monthrepay['yueLiXi']+$monthrepay['yueBenJin'];
	    	      //月管理费
	    	      $month_manage=$class::getNperManage(C('sys_borrow_manage_fee'));
	    	      $month_manage_money=$deal['borrow_amount']*$month_manage/100; 
	    	      $_lists[$key]['true_month_repay_money'] = $month_repay_money + $month_manage_money;
	    	      $_lists[$key]['true_month_repay_money_format']=format_price( $_lists[$key]['true_month_repay_money']);
	    	      $time=time();
	    	      
	    	      //罚息
	    	      $_lists[$key]['impose_money_format']=format_price(0);
	    	      if($_lists[$key]['next_repay_time'] - $time <0){
	    	          //晚多少天
	    	          $time_span = strtotime(date("Y-m-d",$time));
	    	          $next_time_span = strtotime(date("Y-m-d",$_lists[$key]['next_repay_time']));
	    	          $day  = ceil(($time_span-$next_time_span)/24/3600);
	    	          
	    	          $impose_fee = trim(C('sys_penaltyint'));
	    	          $manage_impose_fee = trim(C('sys_overdue'));
	    	          //判断是否严重逾期
	    	          if($day >= 31){
	    	              $impose_fee = trim(C('sys_penaltyints'));
	    	              $manage_impose_fee = trim(C('sys_overdues'));
	    	          }
	    	          //罚息  
	    	          $deal['impose_money'] = $month_repay_money*$impose_fee*$day/100;
	    	          //罚管理费
	    	          $deal['manage_impose_money'] = $month_repay_money*$manage_impose_fee*$day/100;
	    	          $impose_money= $deal['manage_impose_money']+$deal['impose_money'];
	    	          $_lists[$key]['impose_money_format']=format_price($impose_money);
	    	      
	    	      }
	    	   }
	    	     
	    	}
	    	return $_lists;
	}
	/**
	 * 还款详情页
	 */
	public function refdetail(){
	    $user_id = get_current_userid();
	    $id = I('get.id');	
	    $loan=M('loan')->find($id);
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	    $deal=$new->getLoan();
	    if(!$deal || $deal['user_id']!=$user_id || $deal['deal_status']!=9){
	        $this->error('操作错误');
	    }	  
	    //还款方式
	   $deal['reapy_name']=  M('loan_repay_type')->where(array('value'=>$deal['loantype']))->getField('name');
	    $this->assign('deal',$deal);
	   
	    //还款列表
	    $loan_list=M('loan_repay')->where("loan_id=".$id)->order('repay_time ASC')->select();
	    $manage_fee = 0;
	    $impose_money = 0;
	    $repay_money = 0;
	    foreach($loan_list as $k=>$v){
	        $manage_fee += $v['manage_money'];
	        $impose_money += $v['impose_money'];
	        $repay_money += $v['repay_money'];
	    }
	    $this->assign("manage_fee",$manage_fee);
	    $this->assign("impose_money",$impose_money);
	    $this->assign("repay_money",$repay_money);
	    $this->assign("loan_list",$loan_list);	    
	    $inrepay_info=M('loan_inrepay_repay')->where('loan_id='.$id)->find();
	    $this->assign("inrepay_info",$inrepay_info);	    

	  
	    $this->display();
	}
	/**
	 * 已发布的贷款 
	 * 
	 */
	public function borrowed()
	{
	    $uid=get_current_userid();
	    $where=array('is_delete'=>0,'user_id'=>$uid);
	    //获取还款的总数
	    $count=M('loan')->where($where)->count();
	    if($count>0){
	        $page = $this->page($count, 20);
	        //   select *,start_time as last_time,(load_money/borrow_amount*100) as progress_point,(enddate - 1422296959) as remain_time from ac_loan where is_effect = 1 and is_delete = 0
	        $_lists=M('loan')
	        ->where($where)
	        ->field()
	        ->order("create_time desc")
	        ->limit($page->firstRow . ',' . $page->listRows)
	        ->select(); 
	        $lists=$this->deal_with($_lists);
	        $this->assign('lists', $lists);
	        $this->assign("Page", $page->show('Admin'));
	    }
	  
	   
		$this->display();
	}
	//正常还款操作界面
	public function quickrefund(){	   
	    $id=I('get.id');
	    $loan=M('loan')->where(array('id'=>$id,'is_delete'=>0))->find();
	    if(($loan['deal_status'] !=7 && $loan['deal_status'] !=8) && $loan['user_id'] !=get_current_userid()){
	        $this->error("操作失败");
	    }	    	    
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	    $this->deal=$new->getLoan();
	    $loan_list=$new->get_deal_load_list();		   
	    $this->assign('loan_list',$loan_list);	    
	    //用户的钱的
	    $this->available_funds=M('money')->where(array('uid'=>get_current_userid()))->getField('available_funds');
	    
	    $this->display();
	}
	//正常还款操作
	public function repay_borrow_money(){
	    $id = I('get.id');
	    $ids = I('post.ids');
	    if($id == 0){
	       $this->error("还款ID 不能为空");
	    }
	    $ids = explode(",",$ids);
	    if(!is_array($ids)){
	        
	    }
	    $loan=M('loan')->find($id);
	    if(!$loan){
	        $this->error("不存在的贷款");
	    }
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	    $state=$new->repay_borrow_money($id,$ids);
	    if($state['status']){
	        userLog('标：'.$id.'还款');
	        $this->success("还款成功");
	    }else {
	        $this->error($state['show_err']);
	    }
	}
	
	//管理员正常还款操作界面
	public function adminquickrefund(){
	    $id=I('get.id');
	    $loan=M('loan')->where(array('id'=>$id,'is_delete'=>0))->find();
	    if(($loan['deal_status'] !=7 && $loan['deal_status'] !=8) && get_current_admin_id()){
	        $this->error("操作失败");
	    }
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	    $this->deal=$new->getLoan();
	    $loan_list=$new->get_deal_load_list();
	    $this->assign('loan_list',$loan_list);	    
	     
	    $this->display();
	}
	
	//管理员正常还款操作
	public function admin_repay_borrow_money(){
	    $id = I('get.id');
	    $ids = I('post.ids');
	    if($id == 0){
	        $this->error("还款ID 不能为空");
	    }
	    $ids = explode(",",$ids);
	    if(!is_array($ids)){
	         
	    }
	    $loan=M('loan')->find($id);
	    if(!$loan){
	        $this->error("不存在的贷款");
	    }
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	    $state=$new->admin_repay_borrow_money($id,$ids);
	    if($state['status']){
	        $this->success("还款成功");
	    }else {
	        $this->error($state['show_err']);
	    }
	}
	
	
	
	/**
	 * 提前还款界面
	 * 
	 */
	public function inrepayrefund(){
	    
	    $id = I('get.id');	    
	    $loan=M('loan')->find($id);
	    if(!$loan){
	        $this->error("不存在的贷款");
	    }
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	    $status=$new->getUcInrepayRefund();	  
	   // pe($status); 
	    if ($status['status'] == 1){	       
	        $this->assign("deal",$status['deal']);	           	        	
	        $this->assign("impose_money",$status['impose_money']);
	        $this->assign("total_repay_money",$status['total_repay_money']);	    
	        $this->assign("true_total_repay_money",$status['true_total_repay_money']);
	        //用户的钱的
	        $this->available_funds=M('money')->where(array('uid'=>get_current_userid()))->getField('available_funds');
	        
	        
	         $this->display();
	    }else{
	        $this->error($status['show_err']);
	    }
	   
	}
	
	public function inrepay_repay_borrow_money(){
	        $id = I('get.id');	    
	    $loan=M('loan')->find($id);
	    if(!$loan){
	        $this->error("不存在的贷款");
	    }
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	    $status=$new->getUCInrepayRepayBorrowMoney();	  
	    if($status['status']){
	        $this->success("还款成功");
	    }else {
	        $this->error($state['show_err']);
	    }
	    
	}
	/**
	 *  贷款统计
	 */
	public function borrow_stat()
	{
	    $user_id=get_current_userid();
	    $class=new \Common\Lib\Loan\Loanbest();
	    $this->user_statics=$class->getCount($user_id);
		$this->display();
	}	 
	
	
	
	
	
	
}