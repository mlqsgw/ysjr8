<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class MainController extends AdminbaseController {
	
	function _initialize() {
	}
    public function index(){
    	
    	$mysql= mysql_get_server_info();
    	$mysql=empty($mysql)?"未知":$mysql;
    	//服务器信息
    	$info = array(
    			'操作系统' => PHP_OS,
    			'运行环境' => $_SERVER["SERVER_SOFTWARE"],
    			'PHP运行方式' => php_sapi_name(),
    			'MYSQL版本' =>$mysql,
    			'上传附件限制' => ini_get('upload_max_filesize'),
    			'执行时间限制' => ini_get('max_execution_time') . "秒",
    			'剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
				'技术支持' => "[<a href='http://www.hssofts.com' target='_blank'>宏源盛智</a>]",
    	);
    	//贷款初审
    	$this->frist=M('loan')->where("deal_status=0")->count();
    	//满标待审
    	$this->full=M('loan')->where("deal_status=5")->count();
    	//三日内需还款
    	$this->nextrepay=M('loan')->where("deal_status=7 and next_repay_time -".time().'<'.(24*60*60*3).' and next_repay_time >'.time())->count();
    	//预期
    	$this->yuqi=M('loan')->where("deal_status=7  and next_repay_time <".time())->count();
    	//充值user_carry
    	$this->account=M('account')->where('state=0')->count();
    	//提现
    	$this->user_carry=M('user_carry')->where('status=0')->count();
    	//待认证
    	$this->audit=M('user_info')->where('wechat_audit=2 or email_audit=2 or cellphone_audit=2 or video_audit=2 or site_audit=2')->count();
    	//资料审核
    	$data_model=M('data_model')->select();
    	$auditdate=0;
    	foreach ($data_model as $v){
    	  $auditdate+=M('data_table_'.$v['id'])->where('sys_state=0')->count();
    	}
    	$this->auditdate=$auditdate;
    	$this->assign('server_info', $info);
    	$this->display();
    }
}