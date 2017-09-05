<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class JmController extends AdminbaseController{
	function index()
	{
		$jm=M("jiameng");
		$count= $jm->count();
		$Page=new \Think\Page($count,10);
		$show=$Page->show();
		$list = $jm->order('jm_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign("comments",$list);
		
		$this->display();	
	}
	function del()
	{
		$id=$_GET["id"];
		$jm=M("jiameng");
		if($jm->delete($id))
		{
			$this->success("删除成功");
		}else{
			$this->error("删除失败");	
		}
		
	}
	function add()
	{
		$this->display();	
	}
	function c($isfile)
	{
		$id=$_POST["id"];
		$jm=M("jiameng");
		$data["jm_img"]=str_replace("./","/",$isfile);	
		$data["jm_title"]=$_POST["jm_title"];
		$data["jm_con"]=$_POST["jm_con"];
		$data["jm_phone"]=$_POST["jm_phone"];
		$data["jm_cz"]=$_POST["jm_cz"];
		$data["jm_dz"]=$_POST["jm_dz"];
		$data["jm_email"]=$_POST["jm_email"];		
		$data["jm_small"]=$_POST["jm_small"];
		$isedit=$_POST["isedit"];
		if($isedit==1)
		{
			if($jm->where("jm_id=".$id)->save($data))
			{
				return true;
			}else{
				return false;
			}
		}else{
			if($jm->add($data))
			{
				return true;
			}else{
				return false;
			}	
		}
		
	}
	function upload()
	{
		
		$isfile=$this->up();
		
		
		if($this->c($isfile))
		{
			$this->success("提交成功");
		}else{
			$this->error("提交失败");
		}
		
	}
	public function up(){
		$upload = new \Think\Upload();
		$upload->maxSize   =     3145728 ;
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
		$upload->savePath  ='./Uploads/images/';
		$info   =   $upload->uploadOne($_FILES["jm_img"]);  
		 
		if($info)
		{
			$r=$info['savepath'].$info['savename'];	
			
		  return $r;
		   
			
		}else{
			$this->error($upload->getError());
			
		}
	}
	function edit()
	{
		$id=$_GET["id"];
		$jm=M("jiameng");
		$list=$jm->where("jm_id=".$id)->find();
		$this->assign("jm",$list);
		$this->display();
			
	}
}
