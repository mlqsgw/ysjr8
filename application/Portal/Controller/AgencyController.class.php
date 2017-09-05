<?php

/**
 * 担保机构
 */
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class AgencyController extends HomeBaseController {
    //担保机构
    public function index() {
    	$id=intval($_GET['id']);
		
    	$agency= M("loan_agency");
    	$content=$agency->where("id='$id' and is_effect=1")->find();
		if(empty($content)){
			$this->error("该担保机构不存在");
		}

    	$this->assign($content);

    	$this->display(":agency");
    }

    
}
?>
