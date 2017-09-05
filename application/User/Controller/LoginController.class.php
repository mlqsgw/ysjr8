<?php
/**
 * 会员注册
 */
namespace User\Controller;
use Common\Controller\HomeBaseController;
class LoginController extends HomeBaseController {
	
	function index(){
		$this->display("/Public/login");
	}
	
	function active(){
		$this->check_login();
		$this->display(":active");
	}
	function doactive_r(){		$userid=sp_get_current_userid();		$email = M("users")->where("id=".$userid)->field("user_email,user_status")->find();		if($email['user_status'] !=2){			$this->error('错误操作！',__ROOT__."/");		}		$this->assign("email",$email);		$this->display("/Public/doactive");	}
	function doactive(){				if(empty($_POST['email'])){			$this->error("错误操作！ ");		}		$userid=sp_get_current_userid();		$data['user_email'] = $_POST['email'];		M("users")->where('id='.$userid)->save($data);
		$this->check_login();
		$this->_send_to_active();
		$this->success('激活邮件发送成功，激活请重新登录！',U("user/index/logout"));
	}
	
	function forgot_password(){
		$this->display(":forgot_password");
	}
	
	
	function doforgot_password(){
		if(IS_POST){
			if($_SESSION['_verify_']['verify']!=strtolower($_POST['verify'])){
				$this->error("验证码错误！");
			}else{
				$users_model=M("Users");
				$rules = array(
						//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
						array('email', 'require', '邮箱不能为空！', 1 ),
						array('email','email','邮箱格式不正确！',1), // 验证email字段格式是否正确
						
				);
				if($users_model->validate($rules)->create()===false){
					$this->error($users_model->getError());
				}else{
					$email=I("post.email");
					$find_user=$users_model->where(array("user_email"=>$email))->find();
					if($find_user){
						$this->_send_to_resetpass($find_user);
						$_SESSION['_verify_']['verify']="";
						$this->success("密码重置邮件发送成功！",__ROOT__."/");
					}else {
						$this->error("账号不存在！");
					}
					
				}
				
			}
			
		}
	}
	
	protected  function _send_to_resetpass($user){
		$options=get_site_options();
		//邮件标题
		$title = $options['site_name']."密码重置";
		$uid=$user['id'];
		$username=$user['user_login'];
	
		$activekey=md5($uid.time().uniqid());
		$users_model=M("Users");
	
		$result=$users_model->where(array("id"=>$uid))->save(array("user_activation_key"=>$activekey));
		if(!$result){
			$this->error('密码重置激活码生成失败！');
		}
		//生成激活链接
		$url = U('user/login/password_reset',array("hash"=>$activekey), "", true);
		//邮件内容
		$template =<<<hello
		#username#，你好！<br>
		请点击或复制下面链接进行密码重置：<br>
		<a href="http://#link#">http://#link#</a>
hello;
		$content = str_replace(array('http://#link#','#username#'), array($url,$username),$template);
	
		$send_result=sp_send_email($user['user_email'], $title, $content);
	
		if($send_result['error']){
			$this->error('密码重置邮件发送失败！');
		}
	}
	
	
	function password_reset(){
		$this->display(":password_reset");
	}
	
	function dopassword_reset(){
		if(IS_POST){
			if($_SESSION['_verify_']['verify']!=strtolower($_POST['verify'])){
				$this->error("验证码错误！");
			}else{
				$users_model=M("Users");
				$rules = array(
						//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
						array('password', 'require', '密码不能为空！', 1 ),
						array('repassword', 'require', '重复密码不能为空！', 1 ),
						array('repassword','password','确认密码不正确',0,'confirm'),
						array('hash', 'require', '重复密码激活码不能空！', 1 ),
				);
				if($users_model->validate($rules)->create()===false){
					$this->error($users_model->getError());
				}else{
					$password=sp_password(I("post.password"));
					$hash=I("post.hash");
					$result=$users_model->where(array("user_activation_key"=>$hash))->save(array("user_pass"=>$password,"user_activation_key"=>""));
					if($result){
						$_SESSION['_verify_']['verify']="";
						$this->success("密码重置成功，请登录！",U("user/login/index"));
					}else {
						$this->error("密码重置失败，重置码无效！");
					}
					
				}
				
			}
		}
	}
	//登录验证
	function dologin(){

    	if($_SESSION['_verify_']['verify']!=strtolower($_POST['verify'])){
    		$this->error("验证码错误！");
    	}
    	
    	$users_model=M("Users");
    	$rules = array(
    			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)    		
    			array('username', 'require', '用户名或者邮箱不能为空！', 1 ),
    			array('password','require','密码不能为空！',1),
    	
    	);
    	if($users_model->validate($rules)->create()===false){
    		$this->error($users_model->getError());
    	}
    	
    	extract($_POST);
    			$search ='/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/';
    	if(strpos($username,"@")>0){//邮箱登陆
    		$where['user_email']=$username;
    	}elseif(preg_match($search, $username)){						$where['user_phone']=$username;					}else{
    		$where['user_login']=$username;
    	}
    	$users_model=M('Users');
    	$result = $users_model->where($where)->find();
    	$ucenter_syn=C("UCENTER_ENABLED");
    		
    	$ucenter_old_user_login=false;
    	
    	$ucenter_login_ok=false;
    	if($ucenter_syn){
    		setcookie("thinkcmf_auth","");
    		include UC_CLIENT_ROOT."client.php";
    		list($uc_uid, $username, $password, $email)=uc_user_login($username, $password);
    	
    		if($uc_uid>0){
    			if(!$result){
    				$data=array(
    						'user_login' => $username,
    						'user_email' => $email,
    						'user_pass' => sp_password($password),
    						'last_login_ip' => get_client_ip(),
    						'create_time' => time(),
    						'last_login_time' => time(),
    						'user_status' => '1',
    				);
    				$id= $users_model->add($data);
    				$data['id']=$id;
    				$result=$data;
    			}
    				
    		}else{
    	
    			switch ($uc_uid){
    				case "-1"://用户不存在，或者被删除
    					if($result){//本应用已经有这个用户
    						if($result['user_pass'] == sp_password($password)){//本应用已经有这个用户,且密码正确，同步用户
    							$uc_uid2=uc_user_register($username, $password, $result['user_email']);
    							if($uc_uid2<0){
    								$uc_register_errors=array(
    										"-1"=>"用户名不合法",
    										"-2"=>"包含不允许注册的词语",
    										"-3"=>"用户名已经存在",
    										"-4"=>"Email格式有误",
    										"-5"=>"Email不允许注册",
    										"-6"=>"该Email已经被注册",
    								);
    								$this->error("同步用户失败--".$uc_register_errors[$uc_uid2]);
    	
    	
    							}
    							$uc_uid=$uc_uid2;
    						}else{
    							$this->error("密码错误！");
    						}
    					}
    						
    					break;
    				case -2://密码错
    					if($result){//本应用已经有这个用户
    						if($result['user_pass'] == sp_password($password)){//本应用已经有这个用户,且密码正确，同步用户
    							$uc_user_edit_status=uc_user_edit($username,"",$password,"",1);
    							if($uc_user_edit_status<=0){
    								$this->error("登陆错误！");
    							}
    							list($uc_uid2)=uc_get_user($username);
    							$uc_uid=$uc_uid2;
    							$ucenter_old_user_login=true;
    						}else{
    							$this->error("密码错误！");
    						}
    					}else{
    						$this->error("密码错误！");
    					}
    	
    					break;
    	
    			}
    		}
    		$ucenter_login_ok=true;
    		echo uc_user_synlogin($uc_uid);
    	}
    	//exit();
    	if($result != null)
    	{
    		if($result['user_pass'] == sp_password($password)|| $ucenter_login_ok)
    		{
    			$_SESSION["user"]=$result;
    			//写入此次登录信息
    			$data = array(
    					'last_login_time' => date("Y-m-d H:i:s"),
    					'last_login_ip' => get_client_ip(),
    			);
    			$users_model->where("id=".$result["id"])->save($data);
    			$redirect=empty($_SESSION['login_http_referer'])?__ROOT__."/":preg_replace("/index.php\//","",$_SESSION['login_http_referer']);
    			$_SESSION['login_http_referer']="";
    			$ucenter_old_user_login_msg="";
    				//var_dump($redirect);exit();
    			if($ucenter_old_user_login){
    				//$ucenter_old_user_login_msg="老用户请在跳转后，再次登陆";
    			}
    			//$this->success('', $redirect);
				//header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');    
				//setcookie("test", $_SESSION["user"], time()+3600, "/", ".ysjr8.com");
    			$this->redirect($redirect);
				//success("登录成功！", $redirect);
    		}else{
    			$this->error("密码错误！");
    		}
    	}else{
    		$this->error("用户名不存在！");
    	}
    	 
    }
	
	
    //登录验证2
    /*function dologin(){
        //1.先获取post传来的phone和password的值

            $username=$_POST['username'];
            $password=sp_password($_POST['password']);
            //$email=$_POST['username'];
            $verify=$_POST['verify'];
            $userdata=M("Users"); 

            $name['user_login']=$username; 
            $email['user_email']=$username;
            $password['user_pass']=$password;
        //判断是否有空格
            //判断name和password是否为空
            if($username=="" || $_POST['password']==""){
                $this->error("账号和密码不能为空！");
            }
        //判断验证码是否为空
            if($verify==""){
                $this->error("验证码不能为空！");
            }
        //判断验证码是否正确
            if($_SESSION['_verify_']['verify']!=strtolower($_POST['verify'])){
             $this->error("验证码错误！");
        }

        //2.判断用户是否存在
            $a = $userdata->where("(user_login='".$username."' or user_email='".$username."')")->find();
            if($a>0){
                //存在的情况
                $b=$userdata->where("(user_login='".$username."' or user_email='".$username."') and user_pass='".$password."'")->find();
                    if($b>0){
                         $status=$a['user_status'];//用户状态0禁用1正常2审核
                        //判断密码正确时的不同状态
                        if($status==1){
                            $_SESSION['user']= $b;
                            $_SESSION["'".$username."'"]["login_error_times"]=0;
                            //$this->success('登录成功！');
							if(setcookie("username", "idididid", time()+3600,'/')){
								$this->redirect(__ROOT__.'/');
							}else{
								$this->error("登录失败请重新登录!");
							}
                        }elseif($status==0){
                             $this->error("你的账户已被冻结，请联系客服解冻");
                        }
                        
                    }else{
                       //3.判断密码错误时登录错误次数 
                        $status=$a['user_status'];//用户状态0禁用1正常2审核
                        //状态为1
                        if($status==1){
                            if (isset($_SESSION["'".$username."'"]["login_error_times"])) {
                                $_SESSION["'".$username."'"]["login_error_times"]++;
                            }else{
                                $_SESSION["'".$username."'"]["login_error_times"] = 1;
                            }
                            if($_SESSION["'".$username."'"]["login_error_times"]>4){  
                            //var_dump($_SESSION["'".$username."'"]["login_error_times"]);exit();  
                                //修改用户状态为禁用0.以当前手机号为条件
                                $d=$userdata->where(array('user_login' => $username ))->save(array('user_status' => 0 ));
                                $this->error("你的账户已被冻结，请联系客服解冻");
                            }   
                         $this-> error (("登录失败：密码输入错误次数为").$_SESSION["'".$username."'"]["login_error_times"].("次"));
                        

                        }elseif($status==0){
                          //状态为0  
                            $this->error("你的账户已被冻结，请联系客服解冻");
                        }
                        
                    }
            }else{
                $this->error("该用户不存在!");
            }
        
}   */
}    