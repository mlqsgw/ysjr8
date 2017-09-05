<?php

/**
 * 会员中心
 */
namespace User\Controller;
use Common\Controller\MemberbaseController;
class CenterController extends MemberbaseController {
	
	protected $users_model;
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
	}
    //会员中心
	public function index() {
	    $userid=sp_get_current_userid();
	    //所在地
	    $address=M("user_info")->where(array("uid"=>$userid))->getfield("native_place");
	    //借款记录
	    $loanlog=M('loan')->where(array('user_id'=>$userid))->count();
	    $this->assign("loanlog",$loanlog);
	    //投标记录
	    $lendlog=M('loan_load')->where(array('user_id'=>$userid))->count();
	    $this->assign("lendlog",$lendlog);
		$money = M("money")->field("total_money,available_funds,freeze_funds")->where("uid=".$userid)->find();
		$this->assign("money",$money);
		$act=I("get.act");
		switch ($act)
		{
			case "deal":	//借款记录	
                if($loanlog){
                    $page = $this->page($loanlog, 10);
                    $lists = M("loan")
                    ->where(array('user_id'=>$userid))
                    ->order("create_time desc")
                    ->limit($page->firstRow . ',' . $page->listRows)
                    ->select();
                    $this->assign('lists', $lists);
                    $this->assign("Page", $page->show('Admin'));
                }
				$temple="deal";
				break;
		
			case "lend":     //投标记录
			    if($lendlog){
			        $page = $this->page($lendlog, 10);
			        $lists = M("loan_load as loan_load")
			        ->join("__LOAN__ as loan on loan_load.loan_id=loan.id ")
			        ->field('loan_load.*,loan.name,deal_status')
			        ->where(array('loan_load.user_id'=>$userid))
			        ->order("create_time desc")
			        ->limit($page->firstRow . ',' . $page->listRows)
			        ->select();	
			        $this->assign('lists', $lists);
			        $this->assign("Page", $page->show('Admin'));
			    }
		
				$temple="lend";
				break;
			default:
		    $count= M('user_log')->where(array('uid'=>$userid))->count();
		    if($count){
		        $page = $this->page($count, 10);
		        $lists = M("user_log")
		        ->where(array('uid'=>$userid))
		        ->order("time desc")
		        ->limit($page->firstRow . ',' . $page->listRows)
		        ->select();
		        $this->assign('lists', $lists);
		        $this->assign("Page", $page->show('Admin'));
		    }		  
			$temple="index";
		}

		
		$this->assign("act",$act);
		$this->assign("address",$address);
		//$this->assign($user);
    	$this->display($temple);
    }
}
?>
