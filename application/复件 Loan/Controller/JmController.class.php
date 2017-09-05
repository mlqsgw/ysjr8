<?php
/**
 * 我要贷款
 */
namespace Loan\Controller;
use Common\Controller\HomeBaseController;
class JmController extends HomeBaseController {
	function index()
	{
		$jm=M("jiameng");
		$count= $jm->count();
		$Page=new \Think\Page($count,10);
		$show=$Page->show();
		$list = $jm->order('jm_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('page',$show);
		$this->assign("jm",$list);
		$jmbz=$this->articleList(17);
		$this->assign("bz",$jmbz);
		
		$this->display();	
	}
	private function articleList($tid)
	{
		$rs= M("Posts");
		$where['p.post_status'] = array('eq',1);
		$id=intval($tid);
		$tr=M("term_relationships");
		$where["b.term_id"]=$id;
		$join = "".C('DB_PREFIX').'term_relationships as b on p.id =b.object_id';
		$article=M("Posts")->alias("p")->join($join)->where($where)->select();
		return $article;

	}
	
	function jmcon()
	{
		$id=$_GET["id"];
		$jm=M("jiameng");
		$list=$jm->where("jm_id=".$id)->find();
		$this->assign("jm",$list);
		
		$this->display();	
	}
	
}