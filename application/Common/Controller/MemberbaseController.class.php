<?php
namespace Common\Controller;
use Common\Controller\HomeBaseController;
class MemberbaseController extends HomeBaseController{
	
	function _initialize() {
		parent::_initialize();
		
		$this->check_login();
		$this->check_user();
		/* 控制器名称
		 方法名称
		*/
		$this->assign("con_name",CONTROLLER_NAME); 
		$this->assign("act_name",ACTION_NAME);	   
		}
		function suru(){
			$suru=M('posts')->select();
			foreach ($suru as $k=>$v){
				M('posts')->where(array('id'=>$v['id']))
				->save(array('post_hits'=>mt_rand(16000,22222)));
					
			}
		}
		function zhengjia(){
			$suru=M('posts')->select();
			foreach ($suru as $k=>$v){
				M('posts')->where(array('id'=>$v['id']))
				->save(array('post_hits'=>$v['post_hits']+mt_rand(1400,2222)));
					
			}
		}
	
}