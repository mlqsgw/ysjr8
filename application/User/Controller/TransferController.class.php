<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class TransferController extends MemberbaseController
{
    public function __construct(){
    
		parent::__construct();		
		if(ACTION_NAME =="index" || ACTION_NAME =="buys"){		  
			//可以转让	
		 $uid=get_current_userid();
         $where='is_delete=0 and publish_wait=0 and Loan_load.user_id='.$uid.' and Loan.deal_status=7 and  (isnull(Loan_load_transfer.id) or (Loan_load_transfer.t_user_id =0 and Loan_load_transfer.status = 0) ) and Loan.next_repay_time - '.time().' + 24*3600 - 1 > 0 ';
         $rs_count=  D('TransferView')->where($where)->count();	   
       
		
			$statics['need_transfer']= $rs_count;
			//待回收本金
			$statics['need_transfer_benjin']= 0;
			//待回收利息
			$statics['need_transfer_lixi']= 0;
			
			if($statics['need_transfer'] > 0){
				/* $list_sql = 'SELECT dl.id as dlid,d.*,dl.money as loan_load_money,Loan_load_transfer.id as dltid,Loan_load_transfer.status as tras_status,Loan_load_transfer.t_user_id,Loan_load_transfer.transfer_amount,Loan_load_transfer.create_time as tras_create_time FROM '.DB_PREFIX.'deal_load dl LEFT JOIN '.DB_PREFIX.'deal d ON d.id = dl.deal_id LEFT JOIN '.DB_PREFIX.'deal_load_transfer dlt ON Loan_load_transfer.deal_id = dl.deal_id and Loan_load_transfer.load_id=dl.id WHERE 1=1 and d.is_effect=1 and d.is_delete=0 and d.loantype = 0 and d.repay_time_type =1 and d.publish_wait=0 and dl.user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 4 and isnull(Loan_load_transfer.id) and d.next_repay_time - '.TIME_UTC.' + 24*3600 - 1 > 0 ';
				$list = $GLOBALS['db']->getAll($list_sql); */
				$list= D('TransferView')->where($where)->select();
							
				foreach($list as $k => $v){				
					$cRate='\Common\Lib\Loan\\'.$v['loantype'];
					$shengyu=$cRate::get_shengyu($v['loan_load_money'],$v['rate']/12/100,$v['repay_time'],$v['repay_count'],$v['repay_nper']);
					//剩余多少本金未回
					$statics['need_transfer_benjin'] += $shengyu['sy_benjin'];
					//剩多少利息
					$statics['need_transfer_lixi'] += $shengyu['sy_lixi'];
				}
				unset($list);
				
			}		
			
			//转让中
		//   d.publish_wait=0 and dl.user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 4  AND Loan_load_transfer.status = 1 and Loan_load_transfer.user_id >0 and Loan_load_transfer.t_user_id=0';
			$where='is_delete=0 and publish_wait=0 and Loan_load.user_id='.$uid.' and Loan.deal_status=7 and  Loan_load_transfer.t_user_id =0 and Loan_load_transfer.status = 1 and Loan_load_transfer.user_id>0';
		
			$rs_count= D('TransferView')->where($where)->count();			
			$statics['in_transfer']= $rs_count;
			//待回收本金
			$statics['in_transfer_benjin']= 0;
			//待回收利息
			$statics['in_transfer_lixi']= 0;
			if($statics['in_transfer'] > 0){
			/* 	$list_sql = 'SELECT dl.id as dlid,d.*,dl.money as load_money,Loan_load_transfer.id as dltid,Loan_load_transfer.status as tras_status,Loan_load_transfer.t_user_id,Loan_load_transfer.transfer_amount,Loan_load_transfer.create_time as tras_create_time FROM '.DB_PREFIX.'deal_load dl LEFT JOIN '.DB_PREFIX.'deal d ON d.id = dl.deal_id LEFT JOIN '.DB_PREFIX.'deal_load_transfer dlt ON Loan_load_transfer.deal_id = dl.deal_id and Loan_load_transfer.load_id=dl.id WHERE 1=1 and d.is_effect=1 and d.is_delete=0 and d.loantype = 0 and d.repay_time_type =1 and d.publish_wait=0 and dl.user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 4 AND Loan_load_transfer.status = 1 and Loan_load_transfer.user_id >0 and Loan_load_transfer.t_user_id=0';
				$list = $GLOBALS['db']->getAll($list_sql); */
			    $list= D('TransferView')->where($where)->select();
				foreach($list as $k => $v){				
					$cRate='\Common\Lib\Loan\\'.$v['loantype'];
					$shengyu=$cRate::get_shengyu($v['loan_load_money'],$v['rate']/12/100,$v['repay_time'],$v['repay_count'],$v['repay_nper']);
					
				    //剩余多少本金未回
				    $statics['in_transfer_benjin'] +=  $shengyu['sy_benjin'];
					//剩多少利息
					$statics['in_transfer_lixi'] +=  $shengyu['sy_lixi'];
				}
				unset($list);
				
			}
			
			//回收中
			//$count_sql ='SELECT count(DISTINCT Loan_load_transfer.id) FROM '.DB_PREFIX.'deal_load_transfer dlt LEFT JOIN '.DB_PREFIX.'deal_load dl ON Loan_load_transfer.deal_id = dl.deal_id LEFT JOIN '.DB_PREFIX.'deal d ON d.id = dl.deal_id  WHERE 1=1 and d.is_effect=1 and d.is_delete=0 and d.loantype = 0 and d.repay_time_type =1 and d.publish_wait=0 and Loan_load_transfer.t_user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 4  and Loan_load_transfer.status = 1';
			
			//    d.is_delete=0 and d.publish_wait=0 and Loan_load_transfer.t_user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 4  and Loan_load_transfer.status = 1';
			$where='is_delete=0 and publish_wait=0  and  Loan_load_transfer.t_user_id ='.$uid.' and Loan.deal_status=7  and Loan_load_transfer.status = 1';
			$rs_count= D('TransferView')->where($where)->count();			
			$statics['inback_transfer']= $rs_count;
			$statics['inback_transfer_benjin']= 0;
			$statics['inback_transfer_lixi']= 0;
			if($statics['inback_transfer'] > 0){
				$list = D('TransferView')->where($where)->select();
				foreach($list as $k => $v){
				    
				    $cRate='\Common\Lib\Loan\\'.$v['loantype'];
				    $shengyu=$cRate::get_shengyu($v['loan_load_money'],$v['rate']/12/100,$v['repay_time'],$v['repay_count'],$v['repay_nper']);
			
				    $statics['inback_transfer_benjin'] +=$shengyu['sy_benjin'];
					
					$statics['inback_transfer_lixi'] +=  $shengyu['sy_lixi'];
					
				}
				unset($list);
			}
			
			//已回收
			//$count_sql ='SELECT count(dl.id) FROM '.DB_PREFIX.'deal_load dl LEFT JOIN '.DB_PREFIX.'deal d ON d.id = dl.deal_id LEFT JOIN '.DB_PREFIX.'deal_load_transfer dlt ON Loan_load_transfer.deal_id = dl.deal_id WHERE 1=1 and d.is_effect=1 and d.is_delete=0 and d.loantype = 0 and d.repay_time_type =1 and d.publish_wait=0 and Loan_load_transfer.t_user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 5';
			//d.is_delete=0 and  d d.publish_wait=0 and Loan_load_transfer.t_user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 5';
			//$rs_count = $GLOBALS['db']->getOne($count_sql);
			$where='is_delete=0 and publish_wait=0  and  Loan_load_transfer.t_user_id ='.$uid.' and Loan.deal_status=9 ';
			$rs_count= D('TransferView')->where($where)->count();
			$statics['hasback_transfer']= $rs_count;
			$statics['hasback_transfer_all']= 0;
			if($statics['hasback_transfer'] > 0){
				//$list_sql = 'SELECT dl.id as dlid,d.*,dl.money as load_money,Loan_load_transfer.id as dltid,Loan_load_transfer.status as tras_status,Loan_load_transfer.t_user_id,Loan_load_transfer.transfer_amount,Loan_load_transfer.create_time as tras_create_time,Loan_load_transfer.transfer_time,Loan_load_transfer.near_repay_time FROM '.DB_PREFIX.'deal_load dl LEFT JOIN '.DB_PREFIX.'deal d ON d.id = dl.deal_id LEFT JOIN '.DB_PREFIX.'deal_load_transfer dlt ON Loan_load_transfer.deal_id = dl.deal_id WHERE 1=1 and d.is_effect=1 and d.is_delete=0 and d.loantype = 0 and d.repay_time_type =1 and d.publish_wait=0 and Loan_load_transfer.t_user_id='.intval($GLOBALS['user_info']['id']).' AND d.deal_status = 5';
				$list = D('TransferView')->where($where)->select();
				foreach($list as $k => $v){
				    $cRate='\Common\Lib\Loan\\'.$v['loantype'];
				    $shengyu=$cRate::get_shengyu($v['loan_load_money'],$v['rate']/12/100,$v['repay_time'],0,$v['repay_count']);
				    $statics['hasback_transfer_all'] += $shengyu['sy_benjin']+ $shengyu['sy_lixi'];
			
				}
				unset($list);
			}
		
			$this->assign("statics",$statics);
			$this->assign('act',ACTION_NAME);
		}
        
    }
    //转让首页
	public function index()
	{
	 
	    $status = intval($_REQUEST['status']); 
	    $result = $this->getUcTransferList($status);
	    $this->ACTION_NAME='index'; 	
	    $this->display();
	}
	
	
	
	public function buys()
	{
	 $status = I('status');	
    	$where=array(
    	    'is_delete'=>0,
    	    'publish_wait'=>0,
    	    't_user_id'=>get_current_userid(),	    
    	);
    	switch($status){
    	    case 1://回收中    	      
    	        $where['deal_status']=7;
    	        break;
    	    case 2://已回收
    	         $where['deal_status']=9;
    	        break;
    	    default ://默认
    	        $where['deal_status']=array('egt',7);    	     
    	        break;
    	}
    	$count=D('TransferView')->where($where)->count();
    	if($count>0){
    	$page = $this->page($count, 20);
    	$list=D('TransferView')
    	->where($where)
    	->order("")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();    	
    	
        	foreach($list as $k => $v){
        	    //最后还款日
        	    $list[$k]['final_repay_time'] = next_replay_month($v['repay_start_time'],$v['repay_time']);
        	    $list[$k]['final_repay_time_format'] = date("Y-m-d",$list[$k]['final_repay_time']);
        	    //剩余期数
        	    $list[$k]['how_much_month'] = $v['repay_nper']-$v['repay_count'];        	       
        	 
        	   
        	
        	    //本息还款金额
        	   // $list[$k]['month_repay_money'] = pl_it_formula($v['load_money'],$v['rate']/12/100,$v['repay_time']);
        	    	
        	
        	    if($v['deal_status']==7){
        	        //实例化类
        	        $cRate='\Common\Lib\Loan\\'.$v['loantype'];
        	         
        	        $shengyu= $cRate::get_shengyu($v['loan_load_money'],$v['rate']/12/100,$v['repay_time'],$v['repay_count'],$v['repay_nper']);
        	        //剩余多少钱未回
        	        $list[$k]['all_must_repay_money'] = $shengyu['sy_benjin']+$shengyu['sy_lixi'];
        	        //剩余多少本金未回
        	        $list[$k]['left_benjin'] =$shengyu['sy_benjin'];
        	        $list[$k]['left_benjin_format'] = format_price($list[$k]['left_benjin']/10000)."万";
        	        //剩多少利息
        	        $list[$k]['left_lixi'] = $shengyu['sy_lixi'];
        	        $list[$k]['left_lixi_format'] = format_price($list[$k]['left_lixi']);
        	
        	    }
        	    else{
        	        $list[$k]['left_benjin_format'] = format_price(0);
        	        $list[$k]['left_lixi_format'] = format_price(0);
        	    }
        	
        	    //转让价格
        	    $list[$k]['transfer_amount_format'] =  format_price($v['transfer_amount']/10000)."万";
        	
        	    if($v['tras_create_time'] !=""){
        	        $list[$k]['tras_create_time_format'] =date("Y-m-d",$v['tras_create_time']);
        	    }
        	
        	    if(intval($v['transfer_time'])>0){
        	        $list[$k]['transfer_time_format'] =date("Y-m-d",$v['transfer_time']);
        	    }        
        	    $list[$k]['tras_status_op'] = 5;
        	    if($v['deal_status']==7)
        	        $list[$k]['tras_status_format'] = '回收中';
        	    elseif($v['deal_status']==9)
        	    $list[$k]['tras_status_format'] = '已回收';   
        	    $this->assign('lists', $list);
        	    $this->assign("Page", $page->show('Admin'));
        	}
    	}
		$this->display('index');
	   
	}
	
	//转让页面
	public function to_transfer(){			
	    $id = I('get.id');
	    $tid = I('get.tid');
	
	    $status = $this->getUcToTransfer($id,$tid);
	
	    if($status['status'] ==0){
	        echo $status['show_err']; die();
	    }else{	  
	        $this->assign('transfer',$status['transfer']);
	        $this->display();
	    }
	}
	
	/**
	 * 执行转让
	 */
	public function do_transfer(){		  
	    $id = I('post.dlid');
	    $tid = I('post.dltid');
	    $paypassword =I('post.paypassword');
	    $transfer_money = floatval(I('post.transfer_money'));	
	    $status =$this->getUcDoTransfer($id,$tid,$paypassword,$transfer_money);
	
	    if($status['status']==0){	
	        $this->error($status['show_err']);
	    }else{	     
	        $this->success($status['show_err']);
	    }
	}
	
	/**
	 * 撤销转让
	 */
	public function do_reback(){
	  
	    $dltid = I('post.dltid');
	    if($dltid==0){
	        $this->error("不存在的转让债权");
	    }	
    	if(M('loan_load_transfer')->where(array('user_id'=>get_current_userid(),'id'=>$dltid,'t_user_id'=>0))->save(array('status'=>0,'callback_count'=>array('exp','callback_count+1')))){
    	    $this->success('撤销操作成功');
    	}else{
    	    $this->error('撤销操作失败');
    	}
	}	

	/**
	 * 得到用户 债券列表
	 * @param unknown $status
	 * @return multitype:mixed unknown |multitype:NULL number
	 */
	function getUcTransferList($status){	 
	
	    $condition = ' Loan.is_delete=0  and  Loan.publish_wait=0 and Loan_load.user_id='.get_current_userid()."  ";
	    switch($status){
	        case 1://可转让
	            $condition.= " AND Loan.next_repay_time - ".time()." + 24*3600 - 1 > 0 AND Loan.deal_status = 7 and (isnull(Loan_load_transfer.id) or (Loan_load_transfer.t_user_id =0 and Loan_load_transfer.status = 0) ) ";
	            break;
	        case 2://转让中
	            $condition.=" AND Loan.deal_status = 7 AND Loan_load_transfer.status = 1 and Loan_load_transfer.user_id >0 and Loan_load_transfer.t_user_id=0 ";
	            break;
	        case 3://已转让
	            $condition.=" AND Loan_load_transfer.t_user_id > 0 ";
	            break;
	        case 4://已撤销
	            $condition.=" AND Loan_load_transfer.status = 0 ";
	            break;
	        default ://默认
	            $condition.=" AND ((Loan.deal_status = 7 and Loan_load_transfer.id > 0) or (Loan.deal_status = 7 and isnull(Loan_load_transfer.id) AND Loan.next_repay_time - ".time()." + 24*3600 - 1 > 0)  or (Loan.deal_status = 9 and Loan_load_transfer.id >0))";
	            break;
	    }
	
	    $rs_count=D('TransferView')->where($condition)->count();
	   if($rs_count > 0){
	        $page = $this->page($rs_count, 20);
	        $list=D('TransferView')
	        ->where($condition)
	        ->order("")
	        ->limit($page->firstRow . ',' . $page->listRows)
	        ->select();	
	        foreach($list as $k => $v){
	            //最后还款日
	            $list[$k]['final_repay_time'] = next_replay_month($v['repay_start_time'],$v['repay_time']);
	            $list[$k]['final_repay_time_format'] = date("Y-m-d",$list[$k]['final_repay_time']);
	            //剩余期数   总期数 -已还期数
	            $list[$k]['how_much_month'] =$v['repay_nper']- $v['repay_count'];	            
	            //实例化类
	            $cRate='\Common\Lib\Loan\\'.$v['loantype'];
	             
	            $shengyu= $cRate::get_shengyu($v['loan_load_money'],$v['rate']/12/100,$v['repay_time'],$v['repay_count'],$v['repay_nper']);
	            

	            //本息还款金额
	            $list[$k]['month_repay_money'] = $v['loan_load_money']+$cRate::countRate($v['loan_load_money'],$v['rate']/12/100,$v['repay_time']);
	         
	            //剩余多少钱未回
	            $list[$k]['all_must_repay_money'] = $shengyu['sy_benjin']+$shengyu['sy_lixi'];
	             
	            //剩余多少本金未回
	            $list[$k]['left_benjin'] = $shengyu['sy_benjin'];
	            $list[$k]['left_benjin_format'] = format_price($list[$k]['left_benjin']);
	            //剩多少利息
	            $list[$k]['left_lixi'] = $shengyu['sy_lixi'];
	            $list[$k]['left_lixi_format'] = format_price($list[$k]['left_lixi']);
	            
	
	            //转让价格
	            $list[$k]['transfer_amount_format'] =  format_price($v['transfer_amount']/10000)."万";
	
	            if($v['tras_create_time'] !=""){
	                $list[$k]['tras_create_time_format'] =  date("Y-m-d",$v['tras_create_time']);
	            }
	
	            $list[$k]['near_repay_time_format'] =  date("Y-m-d",$v['near_repay_time']);
	
	            if ($list[$k]['tras_status'] == '')
	                $list[$k]['tras_status_format'] = '可转让';
	            else if ($list[$k]['tras_status'] == 0)
	                $list[$k]['tras_status_format'] = '已撤销';
	            else if ($list[$k]['tras_status'] == 1){
	                if ($list[$k]['t_user_id'] > 0){
	                    $list[$k]['tras_status_format'] = '已转让';
	                }else{
	                    $list[$k]['tras_status_format'] = '转让中';
	                }
	            }
	
	            $list[$k]['tras_status_op'] = 0;
	
	            if ($list[$k]['tras_status'] == '')
	                $list[$k]['tras_status_op'] = 1;//'转让';//<a href="javascript:void(0);" class="J_do_transfer" dataid="{$item.dlid}">转让</a>
	            else if ($list[$k]['tras_status'] == 0){
	                if ($list[$k]['how_much_month'] == 0)
	                    $list[$k]['tras_status_op'] = 2;//'还款完毕,无法转让';
	                else{
	                    if ($list[$k]['next_repay_time'] +24*3600-1 - time() < 0)
	                        $list[$k]['tras_status_op'] = 3;//'逾期还款,无法转让';
	                    else
	                        $list[$k]['tras_status_op'] = 4;//'重转让';//<a href="javascript:void(0);" class="J_do_transfer" dataid="{$item.dlid}">重转让</a>
	                }
	            }
	            else if ($list[$k]['tras_status'] == 1){
	                if ($list[$k]['t_user_id'] > 0){
	                    $list[$k]['tras_status_op'] = 5;//'查看详情<br>转让协议';
	                    //<a href="{url x="index" r="transfer#detail" p="id=$item.dltid"}">查看详情</a><br>
	                    //<a href="javascript:void(0);" onclick="javascript:window.showModalDialog('{url x="index" r="uc_transfer#contact" p="id=$item.dltid"}');">转让协议</a>
	                }else
	                    $list[$k]['tras_status_op'] = 6;//'撤销';//<a href="javascript:void(0);"  class="J_do_reback" dataid="{$item.dltid}">撤销</a>
	            }
	
	            $durl = "/index.php?ctl=deal&act=mobile&id=".$v['id'];
	            $list[$k]['app_url'] = str_replace("/mapi", "", SITE_DOMAIN.$durl);
	        }
	           $this->assign('lists', $list);
	            $this->assign("Page", $page->show('Admin'));
	    }
	}
	
	//转让;
	function getUcToTransfer($id,$tid){
	     
	    $status = array('status'=>0,'show_err'=>'','transfer');
	    if($id==0){
	        $status['status'] = 0;
	        $status['show_err'] = "不存在的债权";
	        return $status;
	    }
	
	    //先执行更新借贷信息
	  // $deal_id = $GLOBALS['db']->getOne("SELECT deal_id FROM ".DB_PREFIX."deal_load WHERE id=".$id);
	    $deal_id=M('loan_load')->where("id=$id")->getField('loan_id');	   
	    if($deal_id==0){
	        $status['status'] = 0;
	        $status['show_err'] = "不存在的债权";
	        return $status;
	    }
	    else{
	        syn_deal_status($deal_id);
	    }
	    
	    $condition = ' Loan_load.id='.$id.' AND Loan.deal_status = 7 and  Loan.is_delete=0 and  Loan.publish_wait=0 and Loan_load.user_id='.get_current_userid()."  and Loan.next_repay_time - ".time()." + 24*3600 - 1 > 0  ";
	    if($tid > 0)
	    {
	        $condition.=" and Loan_load_transfer.id=$tid";
	    }
	    
	    $transfer=D('TransferView')->where($condition)->find();	
	    
	    if($transfer){ 
	        $cRate='\Common\Lib\Loan\\'.$transfer['loantype'];
	        //下个还款日
	        if(intval($transfer['next_repay_time']) > 0){
	            $transfer['next_repay_time_format'] = date("Y-m-d",$transfer['next_repay_time']);
	        }
	        else{
	            $next_replay_month=$cRate::next_replay_month($transfer['repay_start_time'],0,$transfer['repay_time']);
	            $transfer['next_repay_time_format'] = date("Y-m-d",$next_replay_month);	    
	        }	       
	
	        //最后还款日  
	        $transfer['final_repay_time'] = next_replay_month($transfer['repay_start_time'],$transfer['repay_time']);
           
	        $transfer['final_repay_time_format'] = date("Y-m-d",$transfer['final_repay_time']);
	        //剩余期数
	        $transfer['how_much_month']=$transfer['repay_nper']-$transfer['repay_count'];
	
	       

	        $shengyu= $cRate::get_shengyu($transfer['loan_load_money'],$transfer['rate']/12/100,$transfer['repay_time'],$transfer['repay_count'],$transfer['repay_nper']);
           //剩余多少钱未回	        
	        $transfer['all_must_repay_money'] =$shengyu['sy_benjin']+$shengyu['sy_lixi'];	       
	        //剩余多少本金未回
	        $transfer['left_benjin'] = $shengyu['sy_benjin'];
	        $transfer['left_benjin_format'] = format_price($transfer['left_benjin']);	       
	        //剩多少利息
	        $transfer['left_lixi'] = $shengyu['sy_lixi'];	       
	        $transfer['left_lixi_format'] = format_price($transfer['left_lixi']);
	        
	
	        //转让价格
	        $transfer['transfer_amount_format'] =  format_price($transfer['all_must_repay_money']);
	
	        if($transfer['tras_create_time'] !=""){
	            $transfer['tras_create_time_format'] =  date("Y-m-d",$transfer['tras_create_time']);
	        }
	      
	        $status['status'] = 1;
	        $status['transfer'] = $transfer;
	        $status['show_err'] = "";
	        return $status;
	    }
	    else{
	        $status['status'] = 0;
	        $status['show_err'] = "不存在的债权转让";
	        return $status;
	    }
	}
	
	/**
	 * 执行转让
	 */
	private  function getUcDoTransfer($id,$tid,$paypassword,$transfer_money){	 
	    $transfer_money = floatval($transfer_money);	
	    $status = array('status'=>0,'show_err'=>'');
	    if($id==0){
	        $status['status'] = 0;
	        $status['show_err'] = "不存在的债权";
	        return $status;
	    }
	
	    if($transfer_money <= 0){
	        $status['status'] = 0;
	        $status['show_err'] = "转让金额必须大于0";
	        return $status;
	    }
	
	   // $deal_id = $GLOBALS['db']->getOne("SELECT deal_id FROM ".DB_PREFIX."deal_load WHERE id=".$id);
	    $deal_id=M('loan_load')->where(array('id'=>$id))->getField('loan_id');
	    if($deal_id==0){
	        $status['status'] = 0;
	        $status['show_err'] = "不存在的债权";
	        return $status;
	    }
	    else{
	        syn_deal_status($deal_id);
	    }
	
	    //判断支付密码是否正确
	    if($paypassword ==""){
	        $status['status'] = 0;
	        $status['show_err'] = '支付密码不能为空';
	        return $status;
	    }
	
	    if(sp_password($paypassword) != $_SESSION['user']['payment_pass']){
	        $status['status'] = 0;
	        $status['show_err'] ='支付密码错误';
	        return $status;
	    }
	
	    $condition = ' Loan_load.id='.$id.' AND Loan.deal_status = 7 and Loan.is_delete=0 and  Loan.publish_wait=0 and Loan_load.user_id='.get_current_userid()." and Loan.next_repay_time - ".time()." + 24*3600 - 1 > 0  ";
	
    	$transfer=D('TransferView')->where($condition)->find();

	    if($transfer){
	        //实例化类
	        $cRate='\Common\Lib\Loan\\'.$transfer['loantype'];
	        //下个还款日
	        if(intval($transfer['next_repay_time']) == 0){
	            $transfer['next_repay_time'] = $cRate::next_replay_month($transfer['repay_start_time'],0,$transfer['repay_time']);
	        }
	        	
	        if($transfer['next_repay_time'] - time() + 24*3600 -1 < 0){
	            $status['status'] = 0;
	            $status['show_err'] = "转让操作失败，有逾期未还款存在！";
	            return $status;
	        }
	
	        //最后还款日
	        $transfer['final_repay_time'] = next_replay_month($transfer['repay_start_time'],$transfer['repay_time']);
	
	        //剩余期数
	        $transfer['how_much_month']=$transfer['repay_nper']-$transfer['repay_count']; 
	
	      
	        $shengyu= $cRate::get_shengyu($transfer['loan_load_money'],$transfer['rate']/12/100,$transfer['repay_time'],$transfer['repay_count'],$transfer['repay_nper']);
	        //剩余多少钱未回
	        $transfer['all_must_repay_money'] =$shengyu['sy_benjin']+$shengyu['sy_lixi'];
	        //剩余多少本金未回
	        $transfer['left_benjin'] = $shengyu['sy_benjin'];	
	        //剩多少利息
	        $transfer['left_lixi'] = $shengyu['sy_lixi'];
	
	        //判断转让金额是否超出了可转让的界限
	        if(round($transfer_money,2) > round(floatval($transfer['all_must_repay_money']),2)){
	            $status['status'] = 0;
	            $status['show_err'] = "转让金额不得大于最大转让金额";
	            return $status;
	        }
	
	        $transfer_data['create_time'] = time();
	        $transfer_data['loan_id'] = $transfer['id'];
	        $transfer_data['load_id'] = $id;
	        $transfer_data['user_id'] = get_current_userid();
	        $transfer_data['transfer_number'] = $transfer['how_much_month'];
	        $transfer_data['last_repay_time'] = $transfer['final_repay_time'];
	        $transfer_data['load_money'] = $transfer['loan_load_money'];
	        $transfer_data['status'] = 1;
	        $transfer_data['transfer_amount'] = $transfer_money;
	        $transfer_data['near_repay_time'] = $transfer['next_repay_time'];
	        $s=false;
	        
	        if($tid > 0){
	          //  $GLOBALS['db']->autoExecute(DB_PREFIX."deal_load_transfer",$transfer_data,"UPDATE","id=".$tid);
	            $s=M('loan_load_transfer')->where("id=$tid")->save($transfer_data);
	        }else{
	            //$GLOBALS['db']->autoExecute(DB_PREFIX."deal_load_transfer",$transfer_data);
	            $s=M('loan_load_transfer')->add($transfer_data);
	        }	      
	
	        if($s){
	            $status['status'] = 1;
	            $status['show_err'] = "转让操作成功";
	            return $status;
	        }
	        else{	          
	            $status['status'] = 0;
	            $status['show_err'] = "转让操作失败";
	            return $status;
	        }
	    }
	    else{
	        $status['status'] = 0;
	        $status['show_err'] = "不存在的债权";
	        return $status;
	    }
	}
	/*
	 * 用户购买转让列表
	 */
	function getUcTransferBuys($status){
	    if($page==0)
	        $page = 1;
	
	    $limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
	    $page_args= array();
	
	    $condition = ' and d.is_effect=1 and d.is_delete=0 and d.loantype = 0 and d.repay_time_type =1 and  d.publish_wait=0 and Loan_load_transfer.t_user_id='.$GLOBALS['user_info']['id']."  ";
	    $union_sql = " LEFT JOIN ".DB_PREFIX."deal_load_transfer dlt ON Loan_load_transfer.deal_id = dl.deal_id  and Loan_load_transfer.load_id=dl.id ";
	    switch($status){
	        case 1://回收中
	            $condition.= " AND d.deal_status = 4 ";
	            break;
	        case 2://已回收
	            $condition.=" AND d.deal_status = 5 ";
	            break;
	        default ://默认
	            $condition.=" AND d.deal_status >= 4 ";
	            break;
	    }
	
	    $count_sql = 'SELECT count(dl.id) FROM '.DB_PREFIX.'deal_load dl LEFT JOIN '.DB_PREFIX.'deal d ON d.id = dl.deal_id '.$union_sql.' WHERE 1=1 '.$condition;
	
	    $rs_count = $GLOBALS['db']->getOne($count_sql." LIMIT $limit ");
	    if($rs_count > 0){
	        $list_sql = 'SELECT dl.id as dlid,d.*,dl.money as load_money,Loan_load_transfer.id as dltid,Loan_load_transfer.status as tras_status,Loan_load_transfer.t_user_id,Loan_load_transfer.transfer_amount,Loan_load_transfer.create_time as tras_create_time,Loan_load_transfer.transfer_time FROM '.DB_PREFIX.'deal_load dl LEFT JOIN '.DB_PREFIX.'deal d ON d.id = dl.deal_id '.$union_sql.' WHERE 1=1 '.$condition;
	
	        $list = $GLOBALS['db']->getAll($list_sql);
	        foreach($list as $k => $v){
	            //最后还款日
	            $list[$k]['final_repay_time'] = next_replay_month($v['repay_start_time'],$v['repay_time']);
	            $list[$k]['final_repay_time_format'] = to_date($list[$k]['final_repay_time'],"Y-m-d");
	            //剩余期数
	            if($v['deal_status']==4){
	                if(intval($v['last_repay_time']) > 0)
	                    $list[$k]['how_much_month'] = how_much_month($v['last_repay_time'],$list[$k]['final_repay_time']);
	                else{
	                    $list[$k]['how_much_month'] = how_much_month($v['repay_start_time'],$list[$k]['final_repay_time']);
	                }
	            }
	            else{
	                $list[$k]['how_much_month'] = 0;
	            }
	
	            //本息还款金额
	            $list[$k]['month_repay_money'] = pl_it_formula($v['load_money'],$v['rate']/12/100,$v['repay_time']);
	            	
	
	            if($v['deal_status']==4){
	                //剩余多少钱未回
	                $list[$k]['all_must_repay_money'] = $list[$k]['month_repay_money'] * $list[$k]['how_much_month'];
	                //剩余多少本金未回
	                $list[$k]['left_benjin'] = get_benjin($v['repay_time']-$list[$k]['how_much_month']-1,$v['repay_time'],$v['load_money'],$list[$k]['month_repay_money'],$v['rate']);
	                $list[$k]['left_benjin_format'] = format_price($list[$k]['left_benjin']/10000)."万";
	                //剩多少利息
	                $list[$k]['left_lixi'] = $list[$k]['all_must_repay_money'] - $list[$k]['left_benjin'];
	                $list[$k]['left_lixi_format'] = format_price($list[$k]['left_lixi']);
	
	            }
	            else{
	                $list[$k]['left_benjin_format'] = format_price(0);
	                $list[$k]['left_lixi_format'] = format_price(0);
	            }
	
	            //转让价格
	            $list[$k]['transfer_amount_format'] =  format_price($v['transfer_amount']/10000)."万";
	
	            if($v['tras_create_time'] !=""){
	                $list[$k]['tras_create_time_format'] =  to_date($v['tras_create_time'],"Y-m-d");
	            }
	
	            if(intval($v['transfer_time'])>0){
	                $list[$k]['transfer_time_format'] =  to_date($v['transfer_time'],"Y-m-d");
	            }
	
	            $list[$k]['tras_status_op'] = 5;
	            if($v['deal_status']==4)
	                $list[$k]['tras_status_format'] = '回收中';
	            elseif($v['deal_status']==5)
	            $list[$k]['tras_status_format'] = '已回收';
	
	            $durl = "/index.php?ctl=deal&act=mobile&id=".$v['id'];
	            $list[$k]['app_url'] = str_replace("/mapi", "", SITE_DOMAIN.$durl);
	        }
	
	        return array('list'=>$list,'count'=>$rs_count);
	    }else{
	        return array('list'=>null,'count'=>0);
	    }
	}
	

	
	
	
	
	
	
	
}