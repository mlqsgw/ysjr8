<?php

/**
 * 会员
 */
namespace User\Controller;
use Common\Controller\AdminbaseController;
class IndexadminController extends AdminbaseController {
    function index(){
	    	$where = "2";
    		//搜索判断
    	if (!empty($_POST)) {
    		$p = I("post.");
    		if(!empty($p['so_start'])){
    			$so_start=strtotime($p['so_start']);
    			$where.=" and create_time>$so_start";
    			$this->assign('so_start',$p['so_start']);
    		}
    		if(!empty($p['so_end'])){
    			$so_end=strtotime($p['so_end']);
    			$where.=" and create_time<$so_end";
    			$this->assign('so_end',$p['so_end']);
    		}
    		if(!empty($p['so_name'])){
    			$where.=" and user_login like '%{$p['so_name']}%'";
    			$this->assign('so_name',$p['so_name']);
    		}
    		$_SESSION['user_query_where']=$where;
    	}
    		if(empty($_POST)&&!empty($_GET)){
    			$where=$_SESSION['user_query_where'];
    		}
    		$users_model=M("Users");
    		$count=$users_model->where($where)->count();
    		$page = $this->page($count, 20);
    		$lists = $users_model
    		->where($where)
    		->order("create_time DESC")
    		->limit($page->firstRow.','.$page->listRows)
    		->select();
    		$this->assign('where',$where);
	    		
			$money=M("money");
			foreach($lists as $key=>$val){
				$mlist[$key]=$money->field('total_money,available_funds,freeze_funds,due_in')->where("uid=".$val['id'])->select();
				$hb[]=array_merge($lists[$key],$mlist[$key]);
			}
	    	$this->assign('lists', $hb);
	    	$this->assign("page", $page->show('Admin'));
	    	$this->display(":index");
    	
    }
    
    function ban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$rst = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status','0');
    		if ($rst) {
    			$this->success("会员拉黑成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员拉黑失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    
    //修改会员登陆密码、支付密码
    function user_edit(){
    	$uid = I("get.id");
    	$uid = $uid?$uid:I("post.uid");
    	$users = M("users")->field("id,user_login,user_email,user_pass,payment_pass")->where("id=".$uid)->find();
    	if(IS_POST){
    		$p = I("post.");
    		if(empty($p['password']) && empty($p['paypassword'])){
    			$this->success("操作成功");die;
    		}
    		//登陆密码
    		if(empty($p['password'])){
    			if(!empty($p['repassword'])){
    				$this->error("密码不能为空");
    			}
    		}else{
    			if(empty($p['repassword'])){
    				$this->error("确认密码不能为空");
    			}else{
    				if($p['password'] !=$p['repassword']){
    					$this->error("确认密码不正确");
    				}else{
    					if(sp_password($p['password'])==$users['user_pass']){
    						$this->error("新密码跟旧密码相同");
    					}else{
    						$a = 1;
    					}
    				}
    			}
    		}
    		
    		
    		//支付密码
    		if(empty($p['paypassword'])){
    			if(!empty($p['repaypassword'])){
    				$this->error("支付密码不能为空");
    			}
    		}else{
    			if(empty($p['repaypassword'])){
    				$this->error("确认支付密码不能为空");
    			}else{
    				if($p['paypassword'] !=$p['repaypassword']){
    					$this->error("确认支付密码不正确");
    				}else{
    					if(sp_password($p['paypassword'])==$users['payment_pass']){
    						$this->error("新支付密码跟旧支付密码相同");
    					}else{
    						$b = 1;
    					}
    				}
    			}
    		}
    		$data = array();
    		if($a){
    			$data['user_pass'] = sp_password($p['password']);
    		}
    		if($b){
    			$data['payment_pass'] = sp_password($p['paypassword']);
    		}
    		
    		if(!empty($data)){
    			$c = M("users")->where("id=".$uid)->save($data);
    			if($c){
    				$this->success("修改成功");
    			}else{
    				$this->error("修改失败");
    			}
    		}else{
    			$this->success("操作成功");
    		}
    		
    	}else{
    		$this->assign($users);
    		$this->display(":user_edit");
    	}
    }
    
    //查看会员基本信息
    function basic_information(){
    	$uid = I("get.id");
    	$this->assign("uid",$uid);
    	$user = M("users as u");
    	$content = $user->join("LEFT JOIN __USER_INFO__ as i on u.id=i.uid")->field("u.user_login,u.user_phone,u.user_email,u.last_login_time,u.create_time,i.name,i.gender,i.national,i.born,i.idcard,i.native_place,i.location,i.marriage,i.education,i.university,i.cellphone")->where("u.id=".$uid)->find();
		$work = M("user_work")->where("uid=".$uid)->find();
		if($work){
			$this->assign($work);
		}else{
			$this->assign("work",1);
		}
    	$this->assign("user",$content);
    	$this->display(":basic_information");
    }
    
    
    //查看会员财务信息
    function money_information(){
    	$uid = I("get.id");
    	$this->assign("uid",$uid);
    	$money_log = M("money_log as m");
    	$count = $money_log->join("__USERS__ as u on m.uid=u.id")->where("m.uid=".$uid)->count();
    	$page = $this->page($count, 5);
    	$content = $money_log->join("__USERS__ as u on m.uid=u.id")->field("m.*,u.user_login")->where("m.uid=".$uid)->limit($page->firstRow . ',' . $page->listRows)->select();
    	$this->assign("content",$content);
    	$this->assign("page", $page->show('Admin'));
    	
    	$this->display(":money_information");
    }
    
    function cancelban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$rst = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status','1');
    		if ($rst) {
    			$this->success("会员启用成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员启用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
}
?>
