<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class MoneyController extends MemberbaseController
{

	public function index(){	
	 
		$act=I("get.act");
		$uid=get_current_userid();
		switch ($act)
		{
			case "incharge":  //会员充值
				$paycf = M("pay_config");
				if(IS_POST){
					$p = I("post.");
					if($_SESSION['_verify_']['verify']!=strtolower($p['verify'])){
						$this->error("验证码错误！");
					}
					$pay = $paycf->where("id=".$p['payment']." and type=2 and  state=1")->find();
					if($pay){
						$bank = unserialize($pay['config']);
						$date['uid'] = $uid;
						$date['user_name'] = $_SESSION["user"]["user_login"];
						$date['account_id'] = $p['memo'];
						$date['type'] = 2;//线下充值
						$date['bank_name'] = $bank['subname'];//充值银行
						$date['money'] = $p['money'];//充值金额
						
						//获取会员money信息
						$money = M("money")->where("uid=".$uid)->find();
						//获取免费额度 不等于0 说明要收费的
						$topUpFees=C('sys_topUpFees');
						if($topUpFees){
							if($money['topupfees']<$topUpFees){
								//获取收费率
								$topUpPoundage=C('sys_topUpPoundage');
								if($money['topupfees']+$p['money']>=$topUpFees){
									$shoufei = $money['topupfees']+$p['money']-$topUpFees;
									$date['money_fee'] = $shoufei*($topUpPoundage/100);//充值手续费 
									
									//获取上限
									$topUpPoundage_highest=C('sys_topUpPoundage_highest');
									//获取下限
									$topUpPoundage_lowest=C('sys_topUpPoundage_lowest');

									//费用大于上限 就用上限
									$date['money_fee']=$date['money_fee']>$topUpPoundage_highest?$topUpPoundage_highest:$date['money_fee'];
									//费用小于下限  就用下限
									$date['money_fee']=$date['money_fee']<$topUpPoundage_lowest?$topUpPoundage_lowest:$date['money_fee'];
								}
							}
						}
						//实际充值金额
						if(!empty($date['money_fee'])){
							$date['money_actual'] = $p['money']-$date['money_fee'];
						}else{
							$date['money_actual'] = $p['money'];
						}
						$date['create_time'] = date("Y-m-d H:i:s");
						//获取ip
						$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
						$user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
						$date['create_ip'] = $user_IP;
						$a = M("account")->add($date);
						if($a){
							$this->success("充值提交成功");
						}else{
							$this->error("充值提交失败");
						}
					}else{
						$this->error("操作错误");
					}
				}else{
					$pay = $paycf->where("type=2 and  state=1")->select();
					foreach ($pay as $key=>$value){
						$pay[$key]['config'] = unserialize($value['config']);
					}

					$this->assign("pay",$pay);
					$config=getPayConfig();
					$this->assign("config",$config);
					$temple="incharge";
				}
				break;
			case "incharge_log":    //充值日志
				
				$count = M("account")->where("uid=".$uid." and state=1")->count();
				$page = $this->page($count, 10);
				$incharge = M("account")->where("uid=".$uid." and state=1")->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
				$this->assign("incharge",$incharge);
				$this->assign("page", $page->show('User'));
				$temple="incharge_log";
				break;
			case "bank":	//会员银行卡信息
				$bank = M("user_bank")->field("id,real_name,bank_name,bankcard")->where("user_id=".$uid)->select();
				$this->assign("bank",$bank);
				$temple="bank";
				break;
				case "bank_add":	//添加银行卡号
					
					//判断实名认证是否通过
					$audit = M("user_info")->field("name,wechat_audit")->where("uid=".$uid)->find();
					if(empty($audit)){
						$this->assign("jumpUrl",U("Myaccount/index"));
						$this->error("您的实名信息未提交");
					}else{
						if($audit['wechat_audit']==2){
							$this->assign("jumpUrl",U("Myaccount/index"));
							$this->error("您的实名信息正在审核中！");
						}elseif ($audit['wechat_audit']==3){
							$this->assign("jumpUrl",U("Myaccount/index"));
							$this->error("您的实名信息审核失败 ,请重新提交！");
						}
					}
					$this->assign("real_name",$audit['name']);
					$temple="bank_add";
					break;
					
			case "carry":	//会员提现
					$id = I("get.id");
					$bank = M("user_bank")->field("id,real_name,bank_name,bankcard")->where("user_id=".$uid." and id=".$id)->find();
					$money = M("money")->field("withdrawalfrees,available_funds")->where("uid=".$uid)->find();
					$carry = M("user_carry")->where("status=1 and user_id=".$uid)->sum('money');//总提现金额
					$sys_carry['m_fee']=C("sys_withdrawalsFees");//提现免费额度
					$sys_carry['l_fee']=C("sys_withdrawalsPoundage");//提现收费率
					$sys_carry['s_fee']=C("sys_withdrawalsPoundage_highest");//提现上限
					$sys_carry['x_fee']=C("sys_withdrawalsPoundage_lowest");//提现下限
					$sys_withdrawalSMSvalidation =C("sys_withdrawalSMSvalidation");//是否需要短信验证
					$this->assign("sys_withdrawalSMSvalidation",$sys_withdrawalSMSvalidation);
					//判断是否提现收费
					if(empty($sys_carry['m_fee'])){
						$this->assign('fee',0);//不收费
					}else{
						$this->assign('fee',1);
					}
					
					$this->assign($sys_carry);
					$this->assign('carry',$carry);
					$this->assign("bank",$bank);
					$this->assign("money",$money);
					$temple="carry";
			break;
			
			default:	//账户资金信息
				//获取账户金额信息
				$money = M("money")->field("total_money,available_funds,freeze_funds")->where("uid=".$uid)->find();
				//账户资金变动日志
				$count = M("money_log")->where("uid=".$uid)->count();
				$page = $this->page($count, 10);
				$money_log = M("money_log")->field("type,operation,time")->order("id desc")->where("uid=".$uid)->limit($page->firstRow . ',' . $page->listRows)->select();
				$this->assign($money);				
				$this->assign("money_log",$money_log);
				$this->assign("page", $page->show('User'));
				$temple="index";	
		}
		$this->assign("act",$act);
		$this->display($temple);
	}
	
	
	//保存银行卡号
	public function add(){
		sendSms();
		$p = I("post.");
		$data['user_id']=get_current_userid();
		$data['user_name'] = $_SESSION['user']['user_login'];
		$data['real_name']=$p['real_name'];
		$data['bank_name']=$p['bank_name'];
		$data['region_lv1']="中国";
		$data['region_lv2']=$p['s_province'];
		$data['region_lv3']=$p['s_city'];
		$data['region_lv4']=$p['s_county'];
		$data['bankzone']=$p['bankzone'];
		$data['bankcard']=$p['bankcard'];
		$data['create_time'] = time();
		$a = M("user_bank")->add($data);
		if($a){
			$this->assign("jumpUrl",U("Money/index",array("act"=>"bank")));
			$this->success("银行卡添加成功");
		}else{
			$this->error("银行卡添加失败");
		}
	}
	//删除银行卡
	public function del(){
		$id = I("post.id");
		$uid=get_current_userid();
		$User_bank = M("user_bank"); // 实例化User_bank对象
		$a  = $User_bank->where("id=".$id." and user_id=".$uid)->delete(); // 删除id为5的用户数据
		if($a){
			$data['status'] =1;
		}else{
			$data['info'] ="银行卡删除失败";
		}
		$userinfo = json_encode($data);
		echo $userinfo;
	}
	
	//保存提现信息
	public function savecarry(){
		$uid=get_current_userid();
		$p = I("post.");
		$pass = sp_password($p['paypassword']);
		$user_pass = M("users")->where("id=".$uid)->getfield("payment_pass");
		if($user_pass != $pass){
			$this->error("支付密码错误！");
		}
		
		//手机验证码判断
		if(C("sys_withdrawalSMSvalidation")){
			if($p['phone_paypassword']){
				$phone_pass = sp_password($p['phone_paypassword']);
				if($phone_pass !=$_SESSION['phonema']){
					$this->error("手机验证码错误 ！");
				}
			}else{
				$this->error("请正确填写手机验证码！");
			}
		}
		//判断银行账户是否正确
		$bank = M("user_bank")->where("id=".$p['bank_id']." and user_id=".$uid)->find();
		if(empty($bank)){
			$this->error("错误操作");
		}
		//判断提现金额是否正确
		$sum = $p['amount']+$p['fee_money'];
		$money = M("money")->where("uid=".$uid)->getfield("available_funds");
		if($sum>$money){
			$this->error("您的可用金额不足！");
		}
		$data['user_id'] = $uid;
		$data['user_name'] = $bank['user_name'];
		$data['fee'] = $p['fee_money'];
		$data['money'] = $p['amount'];
		$data['bank_name'] = $bank['bank_name'];
		$data['create_time'] = time();
		
		$data['bankcard'] = $bank['bankcard'];
		$data['real_name'] = $bank['real_name'];
		$data['region_lv1'] = $bank['region_lv1'];
		$data['region_lv2'] = $bank['region_lv2'];
		$data['region_lv3'] = $bank['region_lv3'];
		$data['region_lv4'] = $bank['region_lv4'];
		$data['bankzone'] = $bank['bankzone'];
		$user_carry = M("user_carry");
		//开启事物
		$user_carry->startTrans();
		if($user_carry->add($data)){
			$fdata=array(
					"freeze_funds"=>array('exp',"freeze_funds+".$sum),
					"available_funds"=>array('exp',"available_funds-".$sum)
			);
			if(M("money")->where(array("uid"=>$uid))->save($fdata)){
				moneyLog($uid, -$sum, "用户申请提现", 2);
				$user_carry->commit();
				$this->assign("jumpUrl",U("Money/index",array("act"=>"bank")));
				$this->success("提现信息提交成功");
			}else{
				$user_carry->rollback();
				$this->assign("jumpUrl",U("Money/index",array("act"=>"bank")));
				$this->error("提现信息提交失败");
			}
		}else{
			$this->assign("jumpUrl",U("Money/index",array("act"=>"bank")));
			$this->error("提现信息提交失败");
		}
	}
	
	
	//支付中。。。。	
	public function paying(){
	    //页面上通过表单选择在线支付类型，支付宝为alipay 财付通为tenpay
	   // $paytype = I('post.paytype');
	    $paytype=I('post.payment');
	    $money=I('post.money',0,"intval");
	    if($money<=0){  E("充值金额不正确");die();  }
	    //得到 配置文件
	    $config=getPayConfig();	
	
	    $userid=get_current_userid();	    
	    $pay = new \Think\Pay($config[$paytype]['value'],unserialize($config[$paytype]['config']));
	    $order_no = $pay->createOrderNo();
	    $vo = new \Think\Pay\PayVo();
	    $vo->setBody("会员帐号充值")
	    ->setFee($money) //支付金额
	    ->setOrderNo($order_no)
	    ->setTitle("帐号充值")
	    ->setCallback("User/Money/pay")
	    ->setUrl(U("User/Money/index"))
	    ->setParam(array('out_trade_no' =>$order_no,'userid'=>$userid))
	    ->setUserid($userid)
	    ->setPaytype($paytype);		
	    echo $pay->buildRequestForm($vo);
	}
	/**
	 * 订单支付成功
	 * @param type $money
	 * @param type $param
	 */
	public function pay($money, $param) {
	    if (session("pay_verify") == true) {
	        session("pay_verify", null);	   
            
            //自定义订单成功了的处理方法
          $this->paysuccess($money, $param);
            
	    } else {
	        E("Access Denied");
	    }
	}
	/**
	 * 付款成功 的自定义函数
	 * @param unknown $money
	 * @param unknown $param
	 */
	public function paysuccess($money, $param){
	    //先改变订单状态
	    M("account")->where(array("account_id"=>$param['out_trade_no'],'uid'=>$param['userid']))->setField('state',1);
	    //给用户帐号增加钱	   
	    $data=array(
	        "total_money"=>array('exp',"total_money+$money"),
	        "available_funds"=>array('exp',"available_funds+$money")	        
	    );
	    $money_mod=M("money");
	  
	  
	    $error="";
	   if($money_mod->where(array("uid"=>$param['userid']))->save($data)){
	       moneyLog($param['userid'], $money, "用户充值", 1);
	       //判断充值收费
	     
	       //获取免费额度 不等于0 说明要收费的
	       $topUpFees=C('sys_topUpFees');
	       if($topUpFees){
	           //先获已经用了多少免费额度了
	           $free=$money_mod->where(array("uid"=>$param['userid']))->getField('topupfees');	           
	           //要出手续费的钱
	           $feiyong=0;
	           //如果免费额度大于等于 已使用的额度 说明现在要充值的钱全部都是要收手续费的
	           if($free>=$topUpFees){
	               //要收费的钱 直接等于充值金额就可以了
	               $feiyong=$money;
	               	               
	               //如果 用过的免费额度+现在充值的钱大于 免费额度
	           }elseif($free+$money>$topUpFees){
	               //要出手续费的钱
	               $feiyong=$free+$money-$topUpFees;
	               $money_mod->where(array("uid"=>$param['userid']))->setField('topupfees',$topUpFees);
	               
	               //已用额度+现在充值的钱都 小于等于免费额度
	           }elseif($free+$money<=$topUpFees){
	               //这个就不用出手续费了 直接更新已用额度就好了
	              $money_mod->where(array("uid"=>$param['userid']))->setField('topupfees',$free+$money);	              
	           }
	           
	           if($feiyong){
	               //获取费率
	               $topUpPoundage=C('sys_topUpPoundage');
	               //获取上限
	               $topUpPoundage_highest=C('sys_topUpPoundage_highest');
	               //获取下限
	               $topUpPoundage_lowest=C('sys_topUpPoundage_lowest');
	                
	               //手续费
	               $fei=$feiyong*($topUpPoundage/100);
	               //费用大于上限 就用上限
	               $fei=$fei>$topUpPoundage_highest?$topUpPoundage_highest:$fei;
	               //费用小于下限  就用下限
	               $fei=$fei<$topUpPoundage_lowest?$topUpPoundage_lowest:$fei;
	               //扣除用户的手续费用	          
	               
	               $fdata=array(
	                   "total_money"=>array('exp',"total_money-$fei"),
	                   "available_funds"=>array('exp',"available_funds-$fei")
	               );
	               if($money_mod->where(array("uid"=>$param['userid']))->save($fdata)){
	                   moneyLog($param['userid'], $fei, "充值手续费", 7);
	                   
	                   $sdata=array(
	                       "total_money"=>array('exp',"total_money+$fei"),
	                       "available_funds"=>array('exp',"available_funds+$fei")
	                   );
	                   //既然是系统扣款 就需要给系统增加钱了 
	                  if($money_mod->where(array("uid"=>1))->save($sdata)){
	                      moneySysLog($param['userid'], $fei, "充值手续费", 1);
	                  }else{
	                      $error="用户充值:将管理费添加到系统帐号出错";
	                  }
	               }else{
	                   $error="用户充值:扣除用户充值手续费出错";
	               }
	               
	           }
	       }
	   
	   }else{
	       //给用户增加资金出错
	       $error="用户充值:给用户增加资金出错";
	   }
	   //事务判断
	   if($error!=""){
	     
	       moneyErrLog($param['userid'].$error, $param['userid']);
	       
	   }
	}
	
	
	
}