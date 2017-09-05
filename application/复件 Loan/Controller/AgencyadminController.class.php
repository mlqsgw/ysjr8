<?php
/**
 * 机构管理
 */
namespace Loan\Controller;
use Common\Controller\AdminbaseController;
class AgencyadminController extends AdminbaseController
{
    public function index(){
        $this->lists=M("loan_agency")->field("id,name,is_effect,listorder")->select();
       
        $this->display();
    }
    public function add(){
        if(IS_POST){
           $p=I("post.");
           $p['content'] = htmlspecialchars_decode($p['content']);
          if(M("loan_agency")->add($p)){
              $this->success("添加成功!");
          }else{
              $this->error("添加失败!");
          }
        }else{
            $this->display();
        }
    }
    public function edit(){
    	if(IS_POST){
    		$p=I("post.");
    		$p['content'] = htmlspecialchars_decode($p['content']);
    		if(M("loan_agency")->save($p)){
    			$this->success("修改成功!");
    		}else{
    			$this->error("修改失败!");
    		}
    	}else{
	    	$id = I("get.id");
	    	$data = M("loan_agency")->where("id=".$id)->find();
	    	//var_dump($data);exit;
	    	$this->assign("post",$data);
	        $this->display();
    	}
    }
    public function del(){
        $id = I("get.id");
        $a = M("loan_agency")->where("id=".$id)->delete();
        if($a){
        	$this->success("删除成功");
        }else {
        	$this->error("删除失败");
        }
    	
    }
}

?>