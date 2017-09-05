<?php
/**
 * 贷款类型
 */
namespace Loan\Controller;
use Common\Controller\AdminbaseController;

class TypeadminController extends AdminbaseController
{
    //列表
    public function index(){
        $this->lists=M("loan_type")->order("listorder asc")->select();        
        $this->display();
    }    
    //排序
    public function sortlist(){
       if($this->_listorders(M("loan_type"))){
           $this->success("更新成功");
       }else{
           $this->error("更新失败");
       }
       
    }
    //添加
    public function add(){
        if(IS_POST){
            $p=I("post.");
            if(M('loan_type')->add($p)){
                $this->success("添加成功");
            }else{
                $this->error("添加失败");
            }            
        }else{
            $this->display();
        }
        
    }
    //修改
    public function edit(){
        $id=I("get.id");
        if(IS_POST){
            
          if(M("loan_type")->where(array("id"=>$id))->save(I("post."))){
                $this->success("更新成功");
          }else{             
              $this->error("更新失败");
          }
        }else{
          $this->res= M("loan_type")->find($id);
          $this->display();
        }       
       
    }
    //删除    
    public function del(){
        $id=I("get.id");
        if(M("loan_type")->delete($id)){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
}

?>