<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class InvestController extends MemberbaseController
{
	public function index(){
		$act=I("get.act");
		switch ($act)
		{
			case "invite":  //招标中借款				
			    $this->getInvestList('invite');
				break;
			case "ing":    //回收中借款				
			    $this->getInvestList('ing');
				break;
			case "over":	//已回收借款
			    $this->getInvestList('over');
				break;
				
			case "bad":     //坏账
			    $this->getInvestList('bad');
				
				break;
			default:
				 $this->getInvestList('index');
				
		}
		$this->assign("act",$act);
		$this->display();
	}
	
	private  function getInvestList($mode = "index", $user_id = 0) {
          
	      $user_id=get_current_userid();	
	      $where=array('loan_load_uid'=>$user_id);
	        switch($mode){
	            case "index" :
	                //$condtion = "   AND deal_status in(1,2,4,5)  ";
	                $where['deal_status']=array('in','1,2,3,4,5,6,7,8,9');
	                break;
	                //招标中
	            case "invite" :	             
	                $where['deal_status']=1;
	                break;
	                //还款中
	            case "ing" :	            
	                $where['deal_status']=7;
	                break;
	                //换完了
	            case "over" :	               
	                $where['deal_status']=9;
	                break;
	                //坏账
	            case "bad" :
	                $where['deal_status']=8;
	                $where['_string']="(".time()." - last_repay_time)/24/3600 >=31 and last_repay_time > 0 ";
	                break;
	        }	
	
	        $count=D('LoanloadView')->where($where)->count();  	      
	   
	        $list = array();	      
	        if($count >0){
	            $page = $this->page($count, 10);
	            $list=D('LoanloadView')
	            ->where($where)	        
	            ->order("loan_load_create_time desc")
	            ->limit($page->firstRow . ',' . $page->listRows)
	            ->select();	  
	                     
	            $load_ids = array();	            
	            foreach($list as $k=>$v){
	                $list[$k]['borrow_amount_format'] = format_price($v['borrow_amount']/10000)."万";//format_price($deal['borrow_amount']);
	                $list[$k]['rate_foramt_w'] = number_format($v['rate'],2)."%";	              
	                $list[$k]['rate_foramt'] = number_format($v['rate'],2);	    

	                $cRate='\Common\Lib\Loan\\'.$v['loantype'];
	                	
	                //本息还款金额
	               //  $list[$k]['month_repay_money'] = pl_it_formula($v['borrow_amount'],$v['rate']/12/100,$v['repay_time']);
	               // $list[$k]['month_repay_money_format'] =  format_price($list[$k]['month_repay_money']);

                    //全部利息
	                $list[$k]['rate_count']=$cRate::countRate($v['borrow_amount'],$v['rate']/12/100,$v['repay_time']);
	                 
	                if($v['deal_status'] == 1){
	                    //还需多少钱
	                    $list[$k]['need_money'] = format_price($v['borrow_amount'] - $v['load_money']);
	                    	
	                    //百分比
	                    $list[$k]['progress_point'] = $v['load_money']/$v['borrow_amount']*100;
	                    	
	                } elseif($v['deal_status'] == 5 || $v['deal_status'] == 9 ||$v['deal_status'] == 6)
	                {
	                    $list[$k]['progress_point'] = 100;
	                }
	                elseif($v['deal_status'] == 7 || $v['deal_status'] == 8){	                     
	                    //百分比	                    
	                    $list[$k]['remain_repay_money'] = $v['borrow_amount'] + $list[$k]['rate_count']; 
	                    //还有多少需要还
	                    $list[$k]['need_remain_repay_money'] = $list[$k]['remain_repay_money'] - $v['repay_money'];
	                    //还款进度条
	                    $list[$k]['progress_point'] =  round($v['repay_money']/$list[$k]['remain_repay_money']*100,2);
	                }
	                //等级图片
	                $list[$k]['score_img'] = get_user_level($v['score'],'img');	           
	                
	                $load_ids[] = $v['load_id'];
	            }
	            //判断是否已经转让
	            if(count($load_ids) > 0){
	               
	               // $tmptransfer_list  = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."deal_load_transfer where load_id in(".implode(",",$load_ids).") and t_user_id > 0 and user_id=".$user_id);
	                $tmptransfer_list=M('deal_load_transfer')->where( array('load_id'=>array('in',$load_ids),'t_user_id'=>array('gt',0),'user_id'=>$user_id))->select();
	                $transfer_list = array();
	                foreach($tmptransfer_list as $k=>$v){
	                    $transfer_list[$v['load_id']] = $v;
	                }
	                unset($tmptransfer_list);
	                foreach($list as $k=>$v){
	                    if(isset($transfer_list[$v['load_id']])){
	                        $list[$k]['has_transfer'] = 1;
	                    }
	                }
	            }
	            $this->assign('lists', $list);
	            $this->assign("Page", $page->show('Admin'));
	
	        }
	}
	
	//回款详情
	public function refdetail(){
	    $user_id = get_current_userid();
	    $id = I('get.id');
	    $loan=M('loan')->find($id);
	    $new=new \Common\Lib\Loan\Loanbest($loan);
	     $deal=$new->getLoan();
	    if(!$deal || $deal['deal_status']<7){
	        $this->error("无法查看，可能有以下原因！<br>1。借款不存在<br>2。借款被删除<br>3。借款未成功");
	    }
	    //还款方式
	    $deal['reapy_name']=  M('loan_repay_type')->where(array('value'=>$deal['loantype']))->getField('name');
	     
	    $this->assign('deal',$deal);
	    
	    $deal_load_list = $new->get_deal_load_list($deal);
	    
	    //获取本期的投标记录
	   // $temp_user_load_ids = $GLOBALS['db']->getAll("SELECT  FROM ".DB_PREFIX."deal_load WHERE deal_id=".$id);
	   $temp_user_load_ids= M('loan_load')->field('loan_id,user_id,money')->where('loan_id='.$id)->select();

	   $user_load_ids = array();
	    $i = 0;
	    foreach($temp_user_load_ids as $k=>$v){
	        if($v['user_id'] == $user_id){
	            $v['repay_start_time'] = $deal['repay_start_time'];
	            $v['repay_time'] = $deal['repay_time'];
	            $v['rate'] = $deal['rate'];
	            $v['u_key'] = $k;
	            $v['load'] = $new->get_deal_user_load_list($v,$deal['loantype'],$deal['repay_nper']);
	            $v['impose_money'] =0;
	            $v['manage_fee'] = 0;
	            $v['repay_money'] = 0;
	            foreach($v['load'] as $kk=>$vv){
	                $v['impose_money'] += $vv['impose_money'];
	                $v['manage_fee'] += $vv['month_manage_money'];
	                $v['repay_money'] += $vv['month_has_repay_money'];
	            }
	            $user_load_ids[$i] = $v;
	            $i ++;
	        }
	    }
	  
	    
	    $this->assign('user_load_ids',$user_load_ids);	    
	    $inrepay_info=M('loan_inrepay_repay')->where('loan_id='.$id)->find();
	    $this->assign("inrepay_info",$inrepay_info);
	   $this->display();
	}
	
	
	
}