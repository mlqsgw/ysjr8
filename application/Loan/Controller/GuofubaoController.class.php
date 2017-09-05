<?php

/**
 * 国付宝
 */
namespace Loan\Controller;
use Common\Controller\HomeBaseController;
class GuofubaoController extends HomeBaseController {
	function merchant_url(){
		$version = $_POST["version"];
		$charset = $_POST["charset"];
		$language = $_POST["language"];
		$signType = $_POST["signType"];
		$tranCode = $_POST["tranCode"];
		$merchantID = $_POST["merchantID"];
		$merOrderNum = $_POST["merOrderNum"];
		$tranAmt = $_POST["tranAmt"];
		$feeAmt = $_POST["feeAmt"];
		$frontMerUrl = $_POST["frontMerUrl"];
		$backgroundMerUrl = $_POST["backgroundMerUrl"];
		$tranDateTime = $_POST["tranDateTime"];
		$tranIP = $_POST["tranIP"];
		$respCode = $_POST["respCode"];
		$msgExt = $_POST["msgExt"];
		$orderId = $_POST["orderId"];
		$gopayOutOrderId = $_POST["gopayOutOrderId"];
		$bankCode = $_POST["bankCode"];
		$tranFinishTime = $_POST["tranFinishTime"];
		$merRemark1 = $_POST["merRemark1"];
		$merRemark2 = $_POST["merRemark2"];
		$signValue = $_POST["signValue"];
		
		
		
		$signValue = $_POST["signValue"];
		
		//注意md5加密串需要重新拼装加密后，与获取到的密文串进行验签
		$signValue2='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=['.$orderId.']gopayOutOrderId=['.$gopayOutOrderId.']tranIP=['.$tranIP.']respCode=['.$respCode.']gopayServerTime=[]VerficationCode=[13673399507]';
		//VerficationCode是商户识别码为用户重要信息请妥善保存
		//注意调试生产环境时需要修改这个值为生产参数
		
		
		$signValue2 = md5($signValue2);
		
		if($signValue==$signValue2){
			if($respCode=='0000'){
				//验签成功
				//建议在此处进行商户的业务逻辑处理
					$arrid=explode('YSJR',$merOrderNum);
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
					$cdata["money"]=$tranAmt;
					$cdata["money_fee"]="0.00";
					$cdata["money_actual"]=$tranAmt;	
					$cdata["state"]="1";
					$cdata["create_time"]=date("Y-m-d H:i:s",time());	
					$cdata["create_ip"]=$_SERVER["REMOTE_ADDR"];

					$r=$account->add($cdata);
					if($r){
						//修改账户金额
						$money=M("money");
						$list=$money->where("uid=".$user_id)->find();
						$data["total_money"]=$list["total_money"]+($tranAmt);
						$data["available_funds"]=$list["available_funds"]+($tranAmt);
						$num=$money->where("uid=".$user_id)->save($data);
						//修改账户日志
						$money_log=M("money_log");
						$mdata["uid"]=$user_id;
						$mdata["type"]="1";
						$mdata["actionname"]="用户充值";
						$mdata["total_money"]=$data["total_money"];
						$mdata["available_funds"]=$data["available_funds"];
						$mdata["freeze_funds"]="0.00";
						$mdata["operation"]=$tranAmt;
						$mdata["counterparty"]="平台";
						$mdata["time"]=time();
						$mdata["ip"]=$_SERVER["REMOTE_ADDR"];
						$money_log->add($mdata);

						$udata["uid"]=$user_id;
						$udata["actionname"]="充值:尊敬的用户".$userlist["user_login"]."您好　".($tranAmt)."元充值成功";
						$udata["time"]=time();
						$udata["ip"]=$_SERVER["REMOTE_ADDR"];
						$ulist=M("user_log")->add($udata);	
					}
				//var_dump($_SESSION['user']);exit;
				//注意返回参数中不包括用户的session、cookie
				//echo 'RespCode=0000|JumpURL=';
				//如果要正常跳转指定地址，返回应答必须符合规范，参考文档中5.	通知机制
				 //$this->success('充值成功!',U("Money/index"));
				 echo 'RespCode=0000|JumpURL=http://www.ysjr8.com/index.php/User/Guofubao/frontmer_url';exit();
			}else{
		
				//验签失败
				//返回失败信息
				echo 'RespCode=9999|JumpURL=http://ysjr8.com/index.php';exit();
			}
		}else{
			//验签失败
			//返回失败信息
			echo 'RespCode=9999|JumpURL=http://ysjr8.com/index.php';exit();
		}
		
	}
}
?>
