<?php
/**
 * 积分设置
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class IntegralController extends AdminbaseController
{
public function index(){
    adminLog("修改积分设置");
        $this->list=M("integral_config")->select();
        $this->display();
      
    }
    public function updata(){
       $p=I("post.");
       $m=M('integral_config');
       $value=$p['value'];
       foreach ($p['id'] as $k=>$v){
           $m->where(array("id"=>$v))->save(array("value"=>$value[$k]));
       }
       if($this->upconfig()){
           $this->success("更新成功");
       }else{
           $this->error("更新失败");
       }
    }
 

    
    public function add(){       
        if(IS_POST){
            $p=I('post.');
            if(!is_numeric($p['value'])){
                $this->error("值必须是数字");
            }
            if(M("integral_config")->where(array("remark"=>$p['remark']))->count()>0){
                $this->error("重复的名称");
            }
            
            if(M("integral_config")->add($p)){
                if($this->upconfig()){
                    $this->success("添加成功");
                }else{
                    $this->error("添加失败");
                }
            }else{
                lastsql();
                $this->error("添加失败");
            }
        }else{          
            $this->display();
        }
        
    }
    public function edit(){
        $id=I("get.id");
        if(IS_POST){
            $p=I('post.'); 
            if(!is_numeric($p['value'])){
                $this->error("值必须是数字");
            }        
            if(M("integral_config")->where(array("id"=>$id))->save($p)){
                if($this->upconfig()){
                    $this->success("更新成功");
                }else{
                    $this->error("更新失败");
                }
            }else{
                $this->error("更新失败");
            }
            
        }else{
            $this->assign("id",$id);        
            $this->res= M("integral_config")->find($id);
            $this->display();
        }      
    }
    public function upconfig(){
       $conf=M("integral_config")->getField("id,remark,value");
       F("integral_config",$conf);
       return true; 
    }
}

?>