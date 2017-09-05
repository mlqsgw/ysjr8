<?php

/**
 * APPController
 */

namespace Common\Controller;
use Common\Controller\AppBaseController; 

class AppAdminBaseController extends AppBaseController {
	
	public function __construct() {
		parent::__construct();
		$this->check_login();
		$this->check_user();
	}
	function _initialize(){
		parent::_initialize();
	  
	}
	
	protected function check_login(){
		
		if(!isset($_SESSION["user"])){
			$this->error('0001');//还没有登录
		}
	}
	protected function  check_user(){
	
		if($_SESSION["user"]['user_status']==2){
			$this->error('0002');
		}
	
		if($_SESSION["user"]['user_status']==0){
			$this->error('0003');
		}
	}
	
	
}