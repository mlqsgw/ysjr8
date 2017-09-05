<?php
/**
 * 认证管理
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class MyaccountController extends MemberbaseController
{
	protected $users_model;
	protected $userinfo_model;
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
		$this->userinfo_model = M('user_info');
	}
	//会员中心
	public function index() {
		$userid=sp_get_current_userid();
		$loginuser=$this->users_model->where(array("id"=>$userid))->find();//会员注册信息
		$this->assign('loginuser',$loginuser);
		$user=$this->userinfo_model->where(array("uid"=>$userid))->find();//会员基本信息
		if($user['native_place']){
			$nap = explode(",", $user['native_place']);
			$user['native_place1'] = $nap[0];
			$user['native_place2'] = $nap[1];
			$user['native_place3'] = $nap[2];
		}
		$this->assign($user);
		$this->display();
	}
	//账户设置修改与添加
	public function profile(){
		if($_POST["name"]==null && $_POST["idcard"]==null)
		{
			$user_info=M("user_info");
			
			$r=$user_info->where("uid=".$_SESSION["user"]["id"])->find();		
			$_POST["name"]=$r["name"];	
			$_POST["idcard"]=$r["idcard"];
		}
		$p = I("post.");
		if((!empty($p['old_password'])&&!empty($p['password'])&&!empty($p['repassword']))||(empty($p['old_password'])&&empty($p['password'])&&empty($p['repassword']))){
			$uid=sp_get_current_userid();
			$date = array();
			if(isset($p['name'])){
				if(!empty($p['name'])){
					//正则真实姓名
					$regname="/^[\x{4e00}-\x{9fa5}]+$/u";
					if(!preg_match($regname, $p['name'])){
						$this->error("真实姓名填写不正确");
					}
					$date['name']=$p['name'];
				}else{
					$this->error("真实姓名不能为空");
				}
			}
			if(isset($p['idcard'])){
				if(!empty($p['idcard'])){
					//身份证合法性
					if(!$this->idcard_checksum18($p['idcard'])){
						$this->error("身份证号不合法");
					}
					$date['idcard']=$p['idcard'];
				}else{
					$this->error("身份证号不能为空");
				}
			}
			if(isset($p['cellphone'])){
				if(!empty($p['cellphone'])){
					//正则判断手机号
					$search ='/^(1(([0-9][0-9])|(47)|[8][0126789]))\d{8}$/';
					if(!preg_match($search, $p['cellphone'])) {
						$this->error("手机格式不正确！ ");
					}
					$date['cellphone']=$p['cellphone'];
				}else{
					$this->error("手机号不能为空");
				}
			}
			if(!isset($p['marriage'])){$this->error("选择婚姻状况");}
			if(!isset($p['housing'])){$this->error("选择是否有房");}
			if(!isset($p['buy_cars'])){$this->error("选择是否有车");}
			if($p['s_province']=="省份"||$p['s_city']=="地级市"||$p['s_county']=="市、县级市"){$this->error("正确选择籍贯地址");}
			if(empty($p['location'])){$this->error("现居住地址不能为空");}
			
			
			//修改密码
			if(!empty($p['password'])){
				$admin=$this->users_model->where("id=$uid")->find();
				$old_password=$_POST['old_password'];
				$password=$_POST['password'];
				if(sp_password($old_password)==$admin['user_pass']){
					if($_POST['password']==$_POST['repassword']){
						if($admin['user_pass']==sp_password($password)){
							$this->error("新密码不能和原始密码相同！");
						}else{
							$data['user_pass']=sp_password($password);
							$data['id']=$uid;
							$r=$this->users_model->save($data);
							if ($r==false) {
								$this->error("修改失败！");
							}
						}
					}else{
						$this->error("密码输入不一致！");
					}
					 
				}else{
					$this->error("原始密码不正确！");
				}
			}
			
			$date['gender'] = $p['gender'];
			$date['born'] = $p['born'];
			$date['education'] = $p['education'];
			$date['university'] = $p['university'];
			$date['marriage'] = $p['marriage'];
			$date['housing'] = $p['housing'];
			$date['buy_cars'] = $p['buy_cars'];
			$date['native_place'] = $p['s_province'].','.$p['s_city'].','.$p['s_county'];
			$date['location'] = $p['location'];
			$date['national']=$p['national'];
			
			if($this->userinfo_model->where("uid=".$uid)->count()){
				$a = $this->userinfo_model->where("uid=".$uid)->save($date);
			}else{
				$date['uid'] = $uid;
				$date['wechat_audit'] = 2;
				$a = $this->userinfo_model->add($date);
			}
			if($a){
				$this->redirect('Myaccount/work');
			}else{
				$this->error("保存失败,没有改动");
			}
			
		}else{
			$this->error("密码确认失败");
		}
	}
	
    /**
     * 工作认证
     * */
    public function work()
    {
    	$uid=sp_get_current_userid();
    	if(IS_POST){
			
			$p = I("post.");
			if(empty($p['office'])){$this->error("单位名称不能为空");}
			if(empty($p['jobtype'])){$this->error("请选择职业状态");}
			if($p['s_province']=="省份"||$p['s_city']=="地级市"||$p['s_county']=="市、县级市"){$this->error("正确选择工作城市");}
			
			if(empty($p['officetype'])){$this->error("请选择公司类别");}
			if(empty($p['officedomain'])){$this->error("请选择公司行业");}
			if(empty($p['officecale'])){$this->error("请选择公司规模");}
			if(empty($p['position'])){$this->error("职位不能为空");}
			
			if(empty($p['salary'])){$this->error("请选择月收入");}
			if(empty($p['workyears'])){$this->error("请选择在现单位工作年限");}
			if(empty($p['workphone'])){$this->error("公司电话不能为空");}
			if(empty($p['workemail'])){$this->error("工作邮箱不能为空");}
			
			if(empty($p['officeaddress'])){$this->error("公司地址不能为空");}
			if(empty($p['urgentcontact'])){$this->error("姓名不能为空");}
			if(empty($p['urgentrelation'])){$this->error("关系不能为空");}
    		if(empty($p['urgentmobile'])){$this->error("手机不能为空");}
    		if(empty($p['urgentcontact2'])){$this->error("姓名不能为空");}
    		if(empty($p['urgentrelation2'])){$this->error("关系不能为空");}
    		if(empty($p['urgentmobile2'])){$this->error("手机不能为空");}
			
    		//正则判断邮箱
    		$email = "/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/";
    		if(!preg_match($email, $p['workemail'])) {
    			$this->error("邮箱格式不正确！ ");
    		}
    		//正则判断手机号
    		$search ='/^(1(([358][0-9])|(47)|[8][0126789]))\d{8}$/';
    		if(!preg_match($search, $p['urgentmobile'])) {
    			$this->error("手机格式不正确！ ");
    		}
    		$search ='/^(1(([358][0-9])|(47)|[8][0126789]))\d{8}$/';
    		if(!preg_match($search, $p['urgentmobile2'])) {
    			$this->error("手机格式不正确！ ");
    		}
    		
    		$date['office'] = $p['office'];
    		$date['jobtype'] = $p['jobtype'];
    		$date['work_city'] = $p['s_province'].','.$p['s_city'].','.$p['s_county'];
    		$date['officetype'] = $p['officetype'];
    		$date['officedomain'] = $p['officedomain'];
    		$date['officecale'] = $p['officecale'];
    		$date['salary'] = $p['salary'];
    		$date['position'] = $p['position'];
    		$date['workyears'] = $p['workyears'];
    		$date['workphone'] = $p['workphone'];
    		$date['workemail'] = $p['workemail'];
    		$date['officeaddress'] = $p['officeaddress'];
    		
    		$date['urgentcontact'] = $p['urgentcontact'];
    		$date['urgentrelation'] = $p['urgentrelation'];
    		$date['urgentmobile'] = $_POST["urgentmobile"];
    		$date['urgentcontact2'] = $p['urgentcontact2'];
    		$date['urgentrelation2'] = $p['urgentrelation2'];
    		$date['urgentmobile2'] = $_POST["urgentmobile2"];
    		
			
    		if(M("user_work")->where(array("uid"=>$uid))->count()){//判断数据是否已存在
    			$a = M("user_work")->where(array("uid"=>$uid))->save($date);
    		}else{
    			$date['uid'] = $uid;
    			$a = M("user_work")->add($date);
    		}
			if($a){
				$this->success("保存成功");
			}else{
				$this->error("保存失败,没有改动");
			}
			
			
    	}else{
    		//会员工作信息
    		$work=M("user_work")->where(array("uid"=>$uid))->find();
    		//公司电话
    		if($work['workphone']){
    			$nap = explode("-", $work['workphone']);
    			$work['workphone1'] = $nap[0];
    			$work['workphone2'] = $nap[1];
    		}
    		//工作城市
    		if($work['work_city']){
    			$nap = explode(",", $work['work_city']);
    			$work['work_city1'] = $nap[0];
    			$work['work_city2'] = $nap[1];
    			$work['work_city3'] = $nap[2];
    		}
			
    		$this->assign($work);
    		$this->assign("uid",$uid);
    		$this->display();
    	}
    		
    }
    
    /**
     * 手机认证
     *
     */
     public function authphone()
    {
		if(IS_POST){
			$p = I("post.");
            $mima = sp_password($p['validateCode']);
            
            if($mima!=$_SESSION['phonema']){
                
                $this->error("验证码输入不正确");
            }
    		$uid=sp_get_current_userid();
			$user_info=M("user_info");
			$data["cellphone_audit"]=1;
			$data["cellphone"]=$_POST["paypassword"];
			
			$r=$user_info->where("uid=".$uid)->save($data);
			if($r)
			{	
				$this->success("认证成功");	
			}else{
				$this->error("认证失败");	
			}
			

    		
    	}else{
			$this->auth();//判断是否可以认证
	    	$this->display();
    	}
    }
    
    /**
     * 视频认证
     *
     */
    public function authvodie()
    {
    	if(IS_POST){
    		$uid=sp_get_current_userid();
    		$audit_id = $this->userinfo_model->where("uid=".$uid)->getfield("video_audit");
    		echo $audit_id;exit;
    		if($audit_id==0||$audit_id==3){
    			$a = $this->userinfo_model->where("uid=".$uid)->save(array('video_audit'=>2));
    			if($a){
    				$this->success("申请成功");
    			}else{
    				$this->error("申请失败");
    			}
    		}else{
    			$this->error("错误操作");
    		}
    	}else{
    		$this->auth();//判断是否可以认证
    		$this->display();
    	}
    	
    }
    /**
     * 现场认证
     *
     */
    public function authsite()
    {
    	if(IS_POST){
    		$uid=sp_get_current_userid();
    		$audit_id = $this->userinfo_model->where("uid=".$uid)->getfield("site_audit");
    		if($audit_id==0||$audit_id==3){
    			$a = $this->userinfo_model->where("uid=".$uid)->save(array('site_audit'=>2));
    			if($a){
    				$this->success("申请成功");
    			}else{
    				$this->error("申请失败");
    			}
    		}else{
    			$this->error("错误操作");
    		}
    	}else{
    		$this->auth();//判断是否可以认证
    		$this->display();
    	}
    }
	
    
    /**
     * 支付密码 
     * 
     */
    public function paypassword()
    {
		
    	$uid=sp_get_current_userid();
		$user_info=M("user_info");
		$r=$user_info->where("uid=".$uid)->find();
		if($r)
		{
			if(IS_POST){
    		$p = I("post.");
    		$mima = sp_password($p['validateCode']);
			
    		if($mima!=$_SESSION['phonema']){
				
    			$this->error("验证码输入不正确");
    		}


    		$pass = sp_password($p['paypassword']);
			//dump($pass);
    		$a = $this->users_model->where("id=".$uid)->save(array("payment_pass"=>$pass));
			//dump($a);
			//die();
    		if($a){
				$_SESSION['user']['payment_pass'] = $pass;
    			$this->success("支付密码设置成功");
    		}else{
    			$this->error("设置失败,没有改动");
    		}
    		
			}else{
				//$this->auth();
				$phone = $this->userinfo_model->field("cellphone_audit,cellphone")->where("uid=".$uid)->find();
				/*if($phone['cellphone_audit'] !=1){
					$this->error("手机认证还未成功",U("user/Myaccount/authphone"));
				}*/
				$this->assign($phone);
				$this->display();
			}
		}else{
			$this->error("请先提交您的账户设置信息",U("user/Myaccount/index"));
		}
    	
    }
    //修改密码
    //用户登录密码修改
    public function alterpassword(){
    	//var_dump($_SESSION['user']);exit();
    	if(IS_POST){
    		$p = I("post.");
    		$mima = sp_password($p['validateCode']);
    		if($mima!=$_SESSION['phonema']){
    			$this->error("验证码输入不正确");
    		}
    		$data=M("Users");
    		$userdata=$_SESSION['user'];
    		$formerpass=sp_password(I('formerpass'));
    		$newpass=sp_password(I('newpass'));
    		$affirmpass=sp_password(I('affirmpass'));
    		
    			if ($newpass==$affirmpass) {
    				$newdata['user_pass']=$newpass;
    				$re=$data->where(array("id"=>$userdata['id']))->save($newdata);
    				if ($re) {
    					$user=$data->where(array("id"=>$userdata['id']))->find();
    					session('user',$user);
    					$this->success('密码修改成功');
    				}else{
    					$this->error('密码修改失败');
    				}
    			}else{
    				$this->error('两次密码不一致');
    			
    			}
    	}
    	$this->assign('phone',$_SESSION['user']['user_phone']);
    	$this->display();
    		
    }
    //发送手机验证码
    public function authma(){
    	$uid=sp_get_current_userid();

    	$phone = $this->userinfo_model->where("uid=".$uid)->getfield("cellphone");
    	if(empty($phone)){
    		$data['status'] = -1;
    		$data['info'] = "用户不存在";
    		$data = json_encode($data);
    		echo $data;
    	}
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
    
    //认证判断
    public function auth(){
    	$uid=sp_get_current_userid();
    	$auth = $this->userinfo_model->field("wechat_audit,video_audit,site_audit,cellphone_audit,cellphone")->where('uid='.$uid)->find();
    	$this->assign($auth);
    	if(empty($auth)){
    		$this->error("请先提交您的账户设置信息",U("user/Myaccount/index"));
    	}
    	if($auth['wechat_audit']==2){
    		$this->error("您的账户设置信息正在审核中",U("user/Myaccount/index"));
    	}
    	if($auth['wechat_audit']==3){
    		$this->error("您的账户设置信息审核失败，请重新提交",U("user/Myaccount/index"));
    	}
    }
    
    //身份证验证
    public function idcard_checksum18($idcard){
    	if (strlen($idcard) != 18){ return false; }
    	$aCity = array(11 => "北京",12=>"天津",13=>"河北",14=>"山西",15=>"内蒙古",
    			21=>"辽宁",22=>"吉林",23=>"黑龙江",
    			31=>"上海",32=>"江苏",33=>"浙江",34=>"安徽",35=>"福建",36=>"江西",37=>"山东",
    			41=>"河南",42=>"湖北",43=>"湖南",44=>"广东",45=>"广西",46=>"海南",
    			50=>"重庆",51=>"四川",52=>"贵州",53=>"云南",54=>"西藏",
    			61=>"陕西",62=>"甘肃",63=>"青海",64=>"宁夏",65=>"新疆",
    			71=>"台湾",81=>"香港",82=>"澳门",
    			91=>"国外");
    	//非法地区
    	if (!array_key_exists(substr($idcard,0,2),$aCity)) {
    		return false;
    	}
    	//验证生日
    	if (!checkdate(substr($idcard,10,2),substr($idcard,12,2),substr($idcard,6,4))) {
    		return false;
    	}
    	$idcard_base = substr($idcard, 0, 17);
    	if ($this->idcard_verify_number($idcard_base) != strtoupper(substr($idcard, 17, 1))){
    		return false;
    	}else{
    		return true;
    	}
    }
    
    // 计算身份证校验码，根据国家标准GB 11643-1999
    public function idcard_verify_number($idcard_base){
    	if (strlen($idcard_base) != 17){ return false; }
    	// 加权因子
    	$factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    
    	// 校验码对应值
    	$verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
    
    	$checksum = 0;
    	for ($i = 0; $i < strlen($idcard_base); $i++){
    		$checksum += substr($idcard_base, $i, 1) * $factor[$i];
    	}
    
    	$mod = strtoupper($checksum % 11);
    	$verify_number = $verify_number_list[$mod];
    
    	return $verify_number;
    }
}

?>