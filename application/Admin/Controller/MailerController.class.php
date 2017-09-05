<?php

/**
 * 邮箱配置
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class MailerController extends AdminbaseController {

	//SMTP配置
    public function index() {
    	$this->display();
    }
    
    //SMTP配置处理
    public function index_post() {
    	$_POST = array_map('trim', $_POST);
    	if(in_array('', $_POST)) $this->error("不能留空！");
    	$configs['SP_MAIL_ADDRESS'] = $_POST['address'];
    	
    	$configs['SP_MAIL_SMTP'] = $_POST['smtp'];
    	$configs['SP_MAIL_LOGINNAME'] = $_POST['loginname'];
    	$configs['SP_MAIL_PASSWORD'] = $_POST['password'];
    	
    	$configs['SP_MAIL_NAME'] = $_POST['name'];
    	$configs['SP_MAIL_PORT'] = $_POST['port'];    	
    	$rst=sp_set_dynamic_config($configs);
    	if ($rst) {
    		$this->success("保存成功！");
    	} else {
    		$this->error("保存失败！");
    	}
    }
    

    
    public function send_test(){
      $this->display();
    }
    public function test_post(){
        $address=I("post.address","");
        if(!$address){
            $this->error("邮箱不能为空!");
        }
        if(!C('SP_MAIL_SMTP')){  
            $data['state']="error";
            $data['info']="请先配置邮箱SMTP";
            $data['url']=U("Admin/Mailer/index");          
            $this->ajaxReturn($data);
        }
        import("PHPMailer");
        $mail=new \PHPMailer();
        // 设置PHPMailer使用SMTP服务器发送Email
        $mail->IsSMTP();
        $mail->IsHTML(true);
        // 设置邮件的字符编码，若不指定，则为'UTF-8'
        $mail->CharSet='UTF-8';
        // 添加收件人地址，可以多次使用来添加多个收件人
        $mail->AddAddress($address);
        $site=C('SITE_NAME');
        // 设置邮件正文
        $mail->Body="当你收到这封邮件，说明你的站点{$site}邮件发送配置是成功的";
        // 设置邮件头的From字段。
        $mail->From=C('SP_MAIL_ADDRESS');
        // 设置发件人名字
        $mail->FromName=C('SP_MAIL_NAME');
        // 设置邮件标题
        $mail->Subject="这是一封测试邮件";
        // 设置SMTP服务器。
        $mail->Host=C('SP_MAIL_SMTP');
        //设置端口
        $mail->Port=C('SP_MAIL_PORT');
        // 设置为"需要验证"
        $mail->SMTPAuth=true;
        // 设置用户名和密码。
        $mail->Username=C('SP_MAIL_LOGINNAME');
        $mail->Password=C('SP_MAIL_PASSWORD');
        // 发送邮件。
        if($mail->Send()){
            $this->success("发送成功");
        }else{
            $this->error("发送失败");
        }
        
       
    }
    public function active_list(){
       $list=M("remind")->select();
       $this->assign("list",$list);
       $this->display();
    }
    
    
    public function active(){        
        $id=I("get.id","");       
        $res=M("remind")->where("id=$id")->field("id,title,email,param")->find();
       
        $temp="";
        foreach (json_decode($res['param'],true) as $k=>$v){
            $temp.=$k."代替".$v.";";
        }
        /*
        $content=json_decode($res['email']);
        $content = str_replace(array_keys(json_decode($res['param'],true)), array("张丽","2014-12-12"),$content);
        pe($content);
        */     
        $this->assign('content', json_decode($res['email'], true));
        $this->assign("title",$res['title']);
        $this->assign("param",$temp);
        $this->assign('id', $res['id']);       
        $this->display();       
        
    }
    
    public function active_post(){
        //是否是需要邮件激活 1是
    	//$configs['SP_MEMBER_EMAIL_ACTIVE'] = intval($_POST['lightup']);    	
    	//sp_set_dynamic_config($configs);   	

    	$data['id']=I("post.id");  
    	$data['email']= json_encode($_POST['email']);
    	
    	$rst2=M(remind)->save($data);    	
    	if ($rst2!==false) {
    		$this->success("保存成功！");
    	} else {
    		$this->error("保存失败！");
    	}
    }
}

?>