<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
/**
 * 短信配置
 * @author 2
 *
 */

class SmsController extends AdminbaseController
{
    public function index(){
        $this->display();
    }
    public function index_post(){
        $appkey=trim(I('post.appkey',""));
        if($appkey=="") $this->error("不能留空！");
        $configs['SMS_APPKEY'] = $appkey;
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
        $phone=I("post.phone","");
        $tpl=I("post.tpl","");
        if($phone=="" || $tpl ==""){
            $this->error("不能留空！");
        }
        $apk=C("SMS_APPKEY");
        if(!$apk){
            $data['state']="error";
            $data['info']="请先配置邮箱SMTP";
            $data['url']=U("Admin/sms/index");
            $this->ajaxReturn($data);
        }
       if(juhesms($phone,$tpl)){
           $this->success("发送成功");
       }else{
           $this->success("发送失败");
       }        
        
    }
    
    public function active_list(){
        $list=M("remind")->select();
        $this->assign("list",$list);
        $this->display();
    }
    
    
    public function active(){
       
        $id=I("get.id","");
        $res=M("remind")->where("id=$id")->field("id,title,sms,param")->find();
         
        $temp="";
        foreach (json_decode($res['param'],true) as $k=>$v){
            $temp.=$k."代替".$v.";";
        }       
        
        $this->assign('sms', $res['sms']);
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
        $data['sms']= $_POST['sms'];
         
        $rst2=M(remind)->save($data);
        if ($rst2!==false) {
            $this->success("保存成功！");
        } else {
            $this->error("保存失败！");
        }
    }
}

?>