<?php
/**
 * 投资
 */

namespace Loan\Controller;
use Common\Controller\HomeBaseController;
class BaofuController extends HomeBaseController{
		
	public function regma(){
    	
		$phone="18336384270";
    	$str = rand(100000,999999);
    	$mima = $str;
    	$mima = sp_password($str);//验证码加密
    	$_SESSION['phonema']=$mima;
    	$SITE_NAME = C("SITE_NAME");
		
		$_SESSION['testphone']=$phone;
		
		$a = ldSms($phone,'【'.$SITE_NAME.'】用户您好！验证码是：'.$str);
    	//$a = sendSms($phone,'您好！【'.$SITE_NAME.'】 验证码是：'.$str,$uid);
    	if(1){
    		$data['status'] = 1;
    		$data['info'] = "发送成功";
    	}else{
    		$data['status'] = -2;
    		$data['info'] = "发送失败";
    	}
    	$data = json_encode($data);
    	echo $data;
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
													
													
					$arrid=explode('ysjr',$TransID);
					$user_id=$arrid[0];
					
					//修改充值日志
					$user=M("users");
					$userlist=$user->where("id=".$user_id)->find();
					$account=M("account");
					$cdata["uid"]=$user_id;
					$cdata["user_name"]=$userlist["user_login"];
					$cdata["account_id"]=$arrid[1];
					$cdata["type"]="1";
					$cdata["bank_name"]="1";
					$cdata["money"]=$FactMoney/100;
					$cdata["money_fee"]="0.00";
					$cdata["money_actual"]=$FactMoney/100;	
					$cdata["state"]="1";
					$cdata["create_time"]=date("Y-m-d H:i:s",time());	
					$cdata["create_ip"]=$_SERVER["REMOTE_ADDR"];	
					
					$r=$account->add($cdata);	
					
					if($r){
						//修改账户金额
						$money=M("money");
						$list=$money->where("uid=".$user_id)->find();
						$data["total_money"]=$list["total_money"]+($FactMoney/100);
						$data["available_funds"]=$list["available_funds"]+($FactMoney/100);
						$num=$money->where("uid=".$user_id)->save($data);
						//修改账户日志
						$money_log=M("money_log");
						$mdata["uid"]=$user_id;
						$mdata["type"]="1";
						$mdata["actionname"]="用户充值";
						$mdata["total_money"]=$data["total_money"];
						$mdata["available"]=$data["available"];
						$mdata["freeze_funds"]="0.00";
						$mdata["operation"]=$FactMoney/100;
						$mdata["counterparty"]="平台";
						$mdata["time"]=time();
						$mdata["ip"]=$_SERVER["REMOTE_ADDR"];
						$money_log->add($mdata);
						$udata["uid"]=$user_id;
						$udata["actionname"]="充值:尊敬的用户".$userlist["user_login"]."您好　".($FactMoney/100)."元充值成功";
						$udata["time"]=time();
						$udata["ip"]=$_SERVER["REMOTE_ADDR"];
						$ulist=M("user_log")->add($udata);	
					}
					
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

	
	
	
}