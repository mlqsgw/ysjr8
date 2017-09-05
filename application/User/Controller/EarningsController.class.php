<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class EarningsController extends MemberbaseController
{
	public function index(){
	    $user_id=get_current_userid();
	    $class=new \Common\Lib\Loan\Loanbest();
	    $this->user_statics=$class->getCount($user_id);
		$this->display();
	}
	
}