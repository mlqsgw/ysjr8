<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class BaofuController extends MemberbaseController
{
		
	function post()
	{
		$money=$_POST["money"];
		$pay_config=M("pay_config");
		$pay=$pay_config->where("id=10")->find();
		$config=unserialize($pay["config"]);
		$id=$_SESSION["user"]["id"];
		$this->assign("id",$id);
		$this->assign("zd",$config["zd"]);
		$this->assign("key",$config["key"]);
		$this->assign("partner",$config["partner"]);
		$this->assign("money",$money);
		$this->display();	
	}
	function return_url()
	{
		$MemberID=$_REQUEST['MemberID'];//商户号
		$TerminalID =$_REQUEST['TerminalID'];//商户终端号
		$TransID =$_REQUEST['TransID'];//流水号
		$Result=$_REQUEST['Result'];//支付结果
		$ResultDesc=$_REQUEST['ResultDesc'];//支付结果描述
		$FactMoney=$_REQUEST['FactMoney'];//实际成功金额
		$AdditionalInfo=$_REQUEST['AdditionalInfo'];//订单附加消息
		$SuccTime=$_REQUEST['SuccTime'];//支付完成时间
		$Md5Sign=$_REQUEST['Md5Sign'];//md5签名
		$Md5key = "dejqf9qv5df8w94q";
		$MARK = "~|~";
		//MD5签名格式
		$WaitSign=md5('MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key);
		$isreturn="";
		if ($Md5Sign == $WaitSign) {
					$arrid=explode('+',$TransID);
					$user_id=$arid[0];
					$user=M("users");
					$userlist=$user->where("id=".$user_id)->find();
					$account=M("account");
					$cdata["uid"]=$user_id;
					$cdata["user_name"]=$userlist["user_login"];
					$cdata["account_id"]="";
					$cdata["type"]="1";
					$cdata["money"]=$FactMoney;
					$cdata["money_fee"]="0.00";
					$cdata["money_actual"]=$FactMoney;	
					$cdata["state"]="0";
					$cdata["create_time"]=date("Y-m-d H:i:s",time());	
					$cdata["create_ip"]=$_SERVER["REMOTE_ADDR"];	
					$r=$account->add($cdata);	
					$udata["uid"]=$user_id;
					$udata["actionname"]="充值:尊敬的用户".$userlist["user_login"]."您好　".$FactMoney."元充值成功";
					$udata["time"]=time();
					$udata["ip"]=$_SERVER["REMOTE_ADDR"];
					$ulist=M("user_log")->add($udata);	
					$isreturn="ok";
					$this->assign("isreturn",$isreturn);
					$this->display();
			//校验通过开始处理订单		
			//全部正确了输出OK
			//处理想处理的事情，验证通过，根据提交的参数判断支付结果
		} else {
			$isreturn="Md5CheckFail'";//MD5校验失败
		    $this->assign("isreturn",$isreturn);
			$this->display();
		   //处理想处理的事情
		} 
	
	}
	function return_url1()
	{
		echo "1100223300";
		die();
	
	}
	function merchant_url()
	{
			$MemberID=$_REQUEST['MemberID'];//商户号
			$TerminalID =$_REQUEST['TerminalID'];//商户终端号
			$TransID =$_REQUEST['TransID'];//商户流水号
			$Result=$_REQUEST['Result'];//支付结果
			$ResultDesc=$_REQUEST['ResultDesc'];//支付结果描述
			$FactMoney=$_REQUEST['FactMoney'];//实际成功金额
			$AdditionalInfo=$_REQUEST['AdditionalInfo'];//订单附加消息
			$SuccTime=$_REQUEST['SuccTime'];//支付完成时间
			$Md5Sign=$_REQUEST['Md5Sign'];//md5签名
			$Md5key = "dejqf9qv5df8w94q"; ///////////md5密钥（KEY）
			$MARK = "~|~";
			//MD5签名格式
			$WaitSign=md5('MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key);
			
			if(isset($_SESSION['OrderMoney'])){
				
				$OrderMoney =$_SESSION['OrderMoney'];//获取提交金额的Session
			}
			if($Md5Sign == $WaitSign){
				//校验通过开始处理订单
				if($OrderMoney == $FactMoney){
					//卡面金额与用户提交金额一致
						$this->assign("TransID",$TransID);
						$this->assign("ResultDesc",$ResultDesc);
						$this->assign("FactMoney",$FactMoney);
						$this->assign("AdditionalInfo",$AdditionalInfo);
						$this->assign("SuccTime",$SuccTime);
						$this->success("支付成功",U("Money/index"));	
												
				}else{
					$this->success('实际成交金额与您提交的订单金额不一致，请接收到支付结果后仔细核对实际成交金额，以免造成订单金额处理差错。',U("Money/index"));	//实际成交金额与商户提交的订单金额不一致
				}
			}else{
				$this->success("Md5CheckFail",U("Money/index"));//MD5校验失败，订单信息不显示
				$TransID=$WaitSign;
				$ResultDesc="";
				$FactMoney="";
				$AdditionalInfo="";
				$SuccTime="";
			}
			

	}
	
	
}