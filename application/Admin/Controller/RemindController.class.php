<?php
namespace Admin\Controller;

use Common\Controller\AdminbaseController;
/**
 * 提醒设置
 * @author 2
 *
 */
class RemindController extends AdminbaseController
{
    public function index(){             
        $this->list=M("remind")->field("id,title,state")->select();       
        $this->display();
    }
    public function updata(){
        $post=I("post.");
        $data=array();
        $m=M("remind");
        foreach ($post as $k =>$v){
            $num=0;
            foreach ($v as $vv){
                $num+=$vv;
            }           
            $m->where(array("id"=>substr($k,3)))->setField("state",$num);
        }
        $conf["remind"]=$m->getField("id,state");        
       if(sp_save_var("data/conf/remind.php",$conf)){
           $this->success("更新成功！");
       }
        
      
        
     
    }
    public function add(){
        $this->display();
    }
    
    /**
     *    [title] => 标题
    [param] => array("#name#"=>"用户名称")
    [ids] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 0
        )
     */
    public function add_post(){   
       $param=array();   
        foreach (explode(",",trim(trim($_POST['param']),",")) as $v){
            list($a,$b)=explode("=", $v);            
            $param[trim(trim($a),'"')]=$b;
        }       
       $post=I("post.");               
       $data["param"]=json_encode($param);    
       $num=0;
       foreach ($post[ids] as $v){
           $num+=$v;
       }
       $data['state']=$num;
       $data['title']=$post['title'];
       if(M("remind")->add($data)){
          
           if($this->sevaConf()){
               $this->success("添加成功！");
           }else{
               $this->error("保存配置失败!");
           }
       }else{
           $this->error("添加失败");
       }       
       
    }
    public function edit(){
        $id=I("get.id");
        $this->res= M("remind")->find($id);
        $this->display();
    }
    public function edit_post(){
        $param=array();
        foreach (explode(",",trim(trim($_POST['param']),",")) as $v){
            list($a,$b)=explode("=", $v);
            $param[trim(trim($a),'"')]=$b;
        }
        $post=I("post.");
        $data["param"]=json_encode($param);
        $num=0;
        foreach ($post[ids] as $v){
            $num+=$v;
        }
        $data['state']=$num;
        $data['title']=$post['title'];
        $data['id']=$_POST['id'];
        if(M("remind")->save($data)){
           if($this->sevaConf()){
               $this->success("编辑成功！");
           }else{
               $this->error("保存配置失败!");
           }
            
        }else{
            $this->error("编辑失败");
        }
    }
    
    private function sevaConf(){
        $conf["remind"]=M('remind')->getField("id,state");
        if(sp_save_var("data/conf/remind.php",$conf)){
           return true;
        }else{
            return false;
        }
    }
}

?>