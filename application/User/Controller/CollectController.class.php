<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class CollectController extends MemberbaseController
{
	public function index(){
		$uid=get_current_userid();
		$count=M('user_favorites')->where("uid=".$uid)->count();
		if($count){
		    $page=$this->page($count,20);		   
		    $_lists=M('user_favorites')
	        ->where("uid=".$uid)	       
	        ->order("createtime desc")
	        ->limit($page->firstRow . ',' . $page->listRows)
	        ->select(); 
		   
		    $this->assign('lists', $_lists);		   
		    $this->assign("Page", $page->show('Admin'));
		}
		
		$this->display();
	}
	
	
	
	
}