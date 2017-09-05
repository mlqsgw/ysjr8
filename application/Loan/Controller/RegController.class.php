<?php
/**
 * 投资
 */

namespace Loan\Controller;
use Common\Controller\HomeBaseController;
class RegController extends HomeBaseController{
		
	public function regma(){
    	
		$phone=$_GET["phone"];
    	$str = rand(100000,999999);
    	$mima = $str;
    	$mima = sp_password($str);//验证码加密
    	$_SESSION['phonema']=$mima;
    	$SITE_NAME = C("SITE_NAME");
			
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
	
	
	
}