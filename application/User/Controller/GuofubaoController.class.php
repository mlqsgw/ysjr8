<?php
/**
 * 投资
 */
namespace User\Controller;
use Common\Controller\MemberbaseController;
class GuofubaoController extends MemberbaseController{
	function post(){
// 		$i='a:3:{s:2:"zd";s:5:"25196";s:3:"key";s:6:"521253";s:7:"partner";s:16:"dejqf9qv5df8w94q";}';
// 		var_dump(unserialize($i));exit();
		//$this->zhengjia();
		$uid=sp_get_current_userid();
		$user_info=M("user_info");
		$r=$user_info->where("uid=".$uid)->find();
		if($r){
			$id=$_SESSION["user"]["id"];
			$userID = "0000011528";
			$OrderNumber = $id.'YSJR'.date("YmdHis");//订单号
			$money = $_POST["money"];//充值的价格
			$feemoney = '0';
			$currency = 156; //币种
			$DealTime = date("YmdHis");
			$ShiftToAccuont = '0000000002000004267'; //汇入帐户
			$udID = '13673399507';
			$ClientIP = $_SERVER["REMOTE_ADDR"];
			//var_dump($ClientIP);exit();
			//echo $OrderNumber;
			$this->assign('udID',$udID);
			$this->assign('userID',$userID);
			$this->assign('ClientIP',$ClientIP);
			$this->assign('ShiftToAccuont',$ShiftToAccuont);
			$this->assign('DealTime',$DealTime);
			$this->assign('currency',$currency);
			$this->assign('feemoney',$feemoney);
			$this->assign('money',$money);
			$this->assign('OrderNumber',$OrderNumber);
			$this->display();
		}else{
			$this->error("请先提交您的账户设置信息",U("user/Myaccount/index"));
		}
	}
	function frontmer_url(){
		$this->success('充值成功！',U("Money/index"));
	}

}