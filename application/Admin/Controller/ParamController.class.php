<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
/**
 * 网站参数配置
 * @author 2
 */
class ParamController extends AdminbaseController
{
   public function index(){      
        $cate_id=I("get.cate_id",1);
        $this->cate=M("param_cate")->select();
        $this->list=M("param")->where(array("cate_id"=>$cate_id))->select();
        $this->assign("cate_id",$cate_id);
        $this->display();
      
    }
    public function updata(){
       $p=I("post.");
       $m=M('param');
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
            if(M("param")->where(array("var_name"=>$p['var_name']))->count()>0){
                $this->error("重复的变量名称");
            }
            if(M("param")->add($p)){
                if($this->upconfig()){
                    $this->success("添加成功");
                }else{
                    $this->error("添加失败");
                }
            }else{
                $this->error("添加失败");
            }
        }else{
            $this->cate=M("param_cate")->select();
            $this->display();
        }
        
    }
    public function edit(){
        $id=I("get.id");
        if(IS_POST){
            $p=I('post.');         
            if(M("param")->where(array("id"=>$id))->save($p)){
                if($this->upconfig()){
                    $this->success("更新成功");
                }else{
                    $this->error("更新失败");
                }
            }else{
                $this->error("添加失败");
            }
            
        }else{
            $this->assign("id",$id);
            $this->cate=M("param_cate")->select();
            $this->res= M("param")->find($id);
            $this->display();
        }
      
    }
    public function upconfig(){
        $conf=M("param")->getField("var_name,value");
        if(sp_save_var("data/conf/param.php",$conf)){
            return true;
        }else{
            return false;
        }
    }
}

?>