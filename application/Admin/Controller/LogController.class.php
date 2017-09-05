<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class LogController extends AdminbaseController{
	
	//管理员日志
	public function adminlog(){
		$where = "1";
		if(IS_POST){
			$p = I("post.");
			if(!empty($p['so_start'])){
				$so_start=strtotime($p['so_start']);
				$where.=" and m.time>$so_start";
				$this->assign('so_start',$p['so_start']);
			}
			if(!empty($p['so_end'])){
				$so_end=strtotime($p['so_end']);
				$where.=" and m.time<$so_end";
				$this->assign('so_end',$p['so_end']);
			}
			if(!empty($p['so_name'])){
				$where.=" and u.user_login like '%{$p['so_name']}%'";
				$this->assign('so_name',$p['so_name']);
			}
		}
		$count = M("admin_log as m")->join("__USERS__ as u on m.uid=u.id")->where($where)->count();
		$page = $this->page($count,20);
		$content = M("admin_log as m")->join("__USERS__ as u on m.uid=u.id")->field("m.*,u.user_login")->where($where)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign("page", $page->show('Admin'));
		$this->assign("comments",$content);
		$this->display();
	}
	
	//会员日志
	public function userlog(){
		$where = "1";
		if(IS_POST){
			$p = I("post.");
			if(!empty($p['so_start'])){
				$so_start=strtotime($p['so_start']);
				$where.=" and m.time>$so_start";
				$this->assign('so_start',$p['so_start']);
			}
			if(!empty($p['so_end'])){
				$so_end=strtotime($p['so_end']);
				$where.=" and m.time<$so_end";
				$this->assign('so_end',$p['so_end']);
			}
			if(!empty($p['so_name'])){
				$where.=" and u.user_login like '%{$p['so_name']}%'";
				$this->assign('so_name',$p['so_name']);
			}
		}
		$count = M("user_log as m")->join("__USERS__ as u on m.uid=u.id")->where($where)->count();
		$page = $this->page($count,20);
		if($p['so_name']){
				$page->parameter.="&so_name=".$p['so_name'];
		}
		$content = M("user_log as m")->join("__USERS__ as u on m.uid=u.id")->field("m.*,u.user_login")->where($where)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign("page", $page->show('Admin'));
		$this->assign("comments",$content);
		$this->display();
	}
	
	//钱日志
	public function moneylog(){
		$where = "1";
		if(IS_POST){
			$p = I("post.");
			if(!empty($p['so_start'])){
				$so_start=strtotime($p['so_start']);
				$where.=" and m.time>$so_start";
				$this->assign('so_start',$p['so_start']);
			}
			if(!empty($p['so_end'])){
				$so_end=strtotime($p['so_end']);
				$where.=" and m.time<$so_end";
				$this->assign('so_end',$p['so_end']);
			}
			if(!empty($p['so_name'])){
				$where.=" and u.user_login like '%{$p['so_name']}%'";
				$this->assign('so_name',$p['so_name']);
			}
		}
		$count = M("money_log as m")->join("__USERS__ as u on m.uid=u.id")->where($where)->count();
		$page = $this->page($count,20);

		$content = M("money_log as m")->join("__USERS__ as u on m.uid=u.id")->field("m.*,u.user_login")->where($where)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign("page", $page->show('Admin'));
		$this->assign("comments",$content);
		$this->display();
	}
	
	//删除
	function delete(){
		$name = I("get.name");
		$model =M("$name"); 
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if ($model->where("id=$id")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if ($model->where("id in ($ids)")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	
	
	
}