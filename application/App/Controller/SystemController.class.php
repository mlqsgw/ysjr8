<?php
namespace App\Controller;
use Common\Controller\AppAdminBaseController; 
/**
 * 首页
 */
class SystemController extends AppAdminBaseController {

	public $bankName=array(
					"中国工商银行","中国农业银行","中国建设银行","招商银行"
					,"中国光大银行","中国邮政储蓄银行","兴业银行"
					,"中国银行","交通银行","中信银行"
					,"华夏银行","上海浦东发展银行","城市信用社"
					,"恒丰银行","广东发展银行","深圳发展银行"
					,"中国民生银行","中国农业发展银行","农村商业银行"
					,"农村信用社","城市商业银行","农村合作银行"
					,"浙商银行","上海农商银行","中国进出口银行"
					,"渤海银行","国家开发银行","村镇银行"
					,"徽商银行股份有限公司","南洋商业银行","韩亚银行"
					,"花旗银行","渣打银行","华一银行","东亚银行"
					,"苏格兰皇家银行"
			);
	//退出
	public function logout(){
		session("user",null);//只有前台用户退出
		$this->success("退出成功");
	}
	//修改密码
	public function changePw()
	{
		$old_pass=I("get.old_pass");
		$new_pass=I("get.new_pass");
		$newpre_pass=I("get.newpre_pass");
		$yanzheng=I("get.yanzheng");
		if($new_pass!=$newpre_pass)
		{
			$this->error("1003");//两次密码不一致	
		}
		$user_pass=$_SESSION["user"]["user_pass"];
		if($user_pass!=sp_password($old_pass))
		{
			$this->error("1004");//原始密码不正确
		}
		$Syanzhen=$_SESSION["yanzhen"];
		if($yanzheng!=$Syanzhen)
		{
			$this->error("1005");//验证码不正确
		}
		unset($_SESSION['yanzhen']);
		$data["user_pass"]=sp_password($new_pass);
		$where["id"]=$_SESSION["user"]["id"];
		$result=M("users")->where($where)->save($data);
		if($result)
		{
			$this->success("修改成功");	
		}else{
			$this->error("1006");//密码修改失败
		}
		
	
	}
	//发短信验证码
	public function sendMes()
	{
		$phone=I("get.phone");
		$uid=$_SESSION["user"]["id"];
		$yanzhen=rand(99999, 10000);
		$tpl="您的验证码为：{$yanzhen},请务泄漏，如需帮助请直接联系管理员";
		$_SESSION["yanzhen"]=$yanzhen;
		$requset=sendSms($phone,$tpl,$uid);
		$this->success($requset);
	}
	//系统账户
	public function myaccount()
	{
		$uid=$_SESSION["user"]["id"];
		$where["uid"]=$uid;
		$result=M("money")->where($where)->find();
		//取现冻结资金
		$res=M("user_carry")->Field("SUM(money+fee) AS quxian")->where("user_id=$uid")->find();
		if(res)
		{
			$result["investMoney"]=floatval($result["freeze_funds"])-floatval($res["quxian"]);
			$result["quxianMoeny"]=$res["quxian"];
		}
		//获取银行卡张数
		$cardNum=M("user_bank")->where("user_id=$uid")->count();
		$result["cardNum"]=$cardNum?$cardNum:0;
		$this->success($result);
	}
	//实名制  接口不做处理
	public function trueName()
	{
			$username=I("get.username");
			$IDcard=I("get.IDcard");
			$this->error("1007");
	}
	//添加银行卡
	public function addBank()
	{
		$act=I("get.act");
		$uid=$_SESSION["user"]["id"];
		if($act=="add")
		{
			//判断实名认证是否通过
			$audit = M("user_info")->field("name,wechat_audit")->where("uid=".$uid)->find();
			if(empty($audit)) $this->error("1008");//请先进行实名验证

			if($audit['wechat_audit']==2){
				
				$this->error("1009");//您的实名信息正在审核中;
			}elseif ($audit['wechat_audit']==3){
				$this->error("1010"); //你的实名审核失败
			}
			$data["bankName"]=$this->bankName;
			$data["trueName"]=$audit["name"];
			$this->success($data);
		}elseif($act=="postadd"){
			$p = I("get.");
			$needlist=array("real_name","bank_name","s_province","s_city","s_county","bankcard");
			if(empty($p)){$this->error("0000");}
			foreach($p as $key=>$val)
			{
				if(empty($val)&&in_array($key,$needlist)){ $this->error("0000"); }
			}
			$data['user_id']=$_SESSION['user']['id'];
			$data['user_name'] = $_SESSION['user']['user_login'];
			$data['real_name']=$p['real_name'];
			$data['bank_name']=$p['bank_name'];
			$data['region_lv1']="中国";
			$data['region_lv2']=$p['s_province'];
			$data['region_lv3']=$p['s_city'];
			$data['region_lv4']=$p['s_county'];
			$data['bankzone']="";
			$data['bankcard']=$p['bankcard'];
			$data['create_time'] = time();
			$a = M("user_bank")->add($data);
			if($a){
				$this->success("银行卡添加成功");
			}else{
				$this->error("银行卡添加失败");
			}
		}
		
	}
	//银行列表
	function bankList()
	{
		$uid=$_SESSION['user']['id'];
		$bank = M("user_bank")->field("id,bank_name,bankcard")->where("user_id=".$uid)->select();
		if($bank)
		{
			$this->success($bank);
		}else{
			$this->error("不存在银行卡");
		}
	}
	//获取用户提现银行的数据和账户信息
	function userTixianInfo()
	{
		$id = I("get.bankid",0,"intval");
		if(empty($id)){$this->error("0000");}
		$uid=$_SESSION['user']['id'];
		
		$bank = M("user_bank")->field("id,real_name,bank_name,bankcard")->where("user_id=".$uid." and id=".$id)->find();

		$money = M("money")->field("withdrawalfrees,available_funds")->where("uid=".$uid)->find();
		//$carry = M("user_carry")->where("status=1")->sum('money');//总提现金额
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
		//$this->assign('carry',$carry);
		$this->assign("bank",$bank);
		$this->assign("money",$money);
		$this->display();
	}
	//系统账户列表
	function accountList()
	{
		$type=I("get.type");
		if($type!=1)$this->error("1011");//手机暂时不提供再付充值服务
		$paycf = M("pay_config");
		$pay = $paycf->where("type=2 and  state=1")->select();
		if($pay)
		{
			foreach ($pay as $key=>$value){
				$pay[$key]['config'] = unserialize($value['config']);
			}
			$this->success($pay);
		}else{
			$this->error("1012");//系统暂时未设置线下账户
		}
	}
	//处理充值数据
	function chongzhi()
	{
			$checkField=array("type","money","memo","bankid");
			$P=I("GET.");
			foreach($P as $key=>$val)
			{
				if(in_array($key,$checkField)&&empty($val))
				{
					$this->error("0000");
				}	
			}
			//判断银行流水帐号，是否重复提交
			if(isset($_SESSION["USER_MEMO"]))
			{
				$MEMO=$_SESSION["USER_MEMO"];
				if($P["memo"]==$MEMO) $this->error("0004"); //不可以重复提交；
			}

			if($P["type"]!=1){$this->error("1011");}
			$uid=$_SESSION['user']['id'];
			$paycf = M("pay_config");
			$pay = $paycf->where("id=".$P['bankid']." and type=2 and  state=1")->find();
			if($pay){
				$bank = unserialize($pay['config']);
				$date['uid'] = $uid;
				$date['user_name'] = $_SESSION["user"]["user_login"];
				$date['account_id'] = $P['memo'];
				$date['type'] = 2;//线下充值
				$date['bank_name'] = $bank['subname'];//充值银行
				$date['money'] = $P['money'];//充值金额
				$data["money_fee"]=$this->CacluTopUpPoundage($P["money"]);
				//实际充值金额
				if(!empty($date['money_fee'])){
					$date['money_actual'] = $P['money']-$date['money_fee'];
				}else{
					$date['money_actual'] = $P['money'];
				}
				//记录一下流水帐号。避免重复提交；
				$_SESSION["USER_MEMO"]=$P["memo"];
				
				$date['create_time'] = date("Y-m-d H:i:s");
				//获取ip
				$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
				$user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
				$date['create_ip'] = $user_IP;
				$a = M("account")->add($date);
				if($a){
					$this->success("充值提交成功");
				}else{
					$this->error("1013");//充值提交失败
				}
			}else{
				$this->error("1014");//不存在此账户
			}
	}
	/*
	 * 充值手续费
	 * $money  充值钱数
	 */
	private function CacluTopUpPoundage($qian)
	{
		$uid=$_SESSION['user']['id'];
		//获取会员money信息
		$money = M("money")->where("uid=".$uid)->find();
		$date["money_fee"]="";
		//获取免费额度 不等于0 说明要收费的
		$topUpFees=C('sys_topUpFees');
		if($topUpFees){
			if($money['topupfees']<$topUpFees){
				//获取收费率
				$topUpPoundage=C('sys_topUpPoundage');
				if($money['topupfees']+$qian>=$topUpFees){
					$shoufei = $money['topupfees']+$qian-$topUpFees;
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
		return $date["money_fee"];
	}
	
	//处理提现get过来的数据信息
	public function tixiansave()
	{
		$uid=$_SESSION['user']['id'];
		$p = I("get.");
		$pass = sp_password($p['paypassword']);
		$user_pass = M("users")->where("id=".$uid)->getfield("payment_pass");
		if($user_pass != $pass)$this->error("1016"); //支付密码错误
		//手机验证码判断
		if(C("sys_withdrawalSMSvalidation"))
		{
			if(empty($p['yanzheng']))$this->error("0000");//手机验证码不能为空
			if($p['yanzheng']!=$_SESSION['yanzhen'])$this->error("1005");//手机验证码错误 
			unset($_SESSION['yanzhen']);
		}
		//判断银行账户是否正确
		$bank = M("user_bank")->where("id=".$p['bankid']." and user_id=".$uid)->find();
		if(empty($bank))$this->error("1015"); //不存在这个银行  
		//判断提现金额是否正确
		$sum = $p['amount']+$p['fee_money'];
		$money = M("money")->where("id=".$uid)->getfield("available_funds");
		if($sum>$money)$this->error("1017");//您的可用金额不足！
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
				$this->success("提现信息提交成功");
			}else{
				$user_carry->rollback();
				
				$this->error("0004");//提交失败
			}
		}else{

			$this->error("0004");//提交失败
		
		}

	}
	//我的投资
	public function invest()
	{
		$typelist=array("invite","ing","over");
		$type=I("get.type");
		if(empty($type)) $this->error("0000");
		if(!in_array($type,$typelist)) $this->error("0006");//非发操作
		$data=$this->getInvestList($type);
		$this->success($data);
	}
	
	
	private  function getInvestList($mode = "invite",$pagenum=4) {
          
	      $user_id=get_current_userid();	
	      $where=array('loan_load_uid'=>$user_id);
	        switch($mode){
	         
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
	             
	        }	
	
	        $count=D('LoanloadView')->where($where)->count();  	
			$p=I("get.p");
			if(ceil($count/$pagenum)<=$p) {return ;}
			
	        
	        $list = array();	      
	        if($count >0){
	            $page = $this->page($count,$pagenum);
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
	          //  $this->assign('lists', $list);
				
				return $list;
	        }
	}
	
	//投标页面
	public function bid(){
		$payment_pass=$_SESSION['user']['payment_pass'];
			if($payment_pass==""){
				$this->error("1019");//请先设置支付密码后再投标
			}
			$loan_id=I('get.loan_id');
			$res=D('LoanfullView')->where(array('is_delete'=>0,'deal_status'=>1,'id'=>$loan_id))->find();
	
			if(!$res){
				$this->error("1020");//您不能投这个标
			}
			//先判断
			$this->checkLoan($res);
			 
			//引用类
			$loan_class=new \Common\Lib\Loan\Loanbest($res);
			$loan=$loan_class->getLoan();
			//得到当前用户的钱 是可用金额哦
			$available_funds=M('money')->where(array('uid'=>get_current_userid()))->getField("available_funds");
			$this->available_funds=format_price($available_funds);
			$this->assign('loan',$loan);
			/*seo 部分*/
			//$this->assign('site_seo_title',$loan['name'].'投标');
			$this->display();
	
		 
	}
	
	public function dealBid()
	{
		//判断登录
		$payment_pass=$_SESSION['user']['payment_pass'];
		$p=I('get.');
		if($p['bid_paypassword']==""){$this->error("0000");}
		if(sp_password($p['bid_paypassword'])!=$payment_pass){
		
			$this->error("1025");//支付密码错误
		}
		$loan_id=$p['id'];
		if(empty($p["id"])){ $this->error("0000");}
		
		$res=D('LoanfullView')->where(array('is_delete'=>0,'deal_status'=>1,'id'=>$loan_id))->find();
		
		if(!$res){
			$this->error("1020");//您不能投这个标
		}
		//先做简单判断
		$this->checkLoan($res);
		
		//引用类
		$loan_class=new \Common\Lib\Loan\Loanbest($res);
		$state=$loan_class->bid($p['bid_money']);
		if($state['error']){
			$this->error($state['info']);
		}else{
			//标日志
			loanLog('用户投标,金额:'.$p['bid_money'], $p['id']);
			//用户日志
			userLog('用户投标,标ID:'.$p['id'].',金额:'.$p['bid_money']);
			$this->success($state['info']);
		}
		
	
	}
	
	
	private function checkLoan($res){
	
		if($res['user_id']==get_current_userid()){
			$this->error("1021");//不能投自己发布的标！
		}
		//不等于1 不再 投标期内
		if($res['deal_status'] !=1){
			$this->error("1020"); //你不能投这个标
		}
		//判断是否已经投资满额
		if($res['borrow_amount']==$res['load_money']){
			$this->error("1022");//你要投资的标已经筹款结束
		}
		//判断是否已经过期
		if($res['enddate']<time()){
			$this->error("1023");//你要投资的标已经筹款结束
		}
		//判断是否还没有开始
		if($res['start_time']>time()){
			$this->error("1024");//你要投资的标还没有开始
		}
	}
	
	
	
	
	
	
	
}