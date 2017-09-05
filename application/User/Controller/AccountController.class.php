<?php

/**
 * 后台首页
 */
namespace User\Controller;
use Common\Controller\AdminbaseController;
class AccountController extends AdminbaseController {
	
    public $model;
    public $money;
    
    function _initialize(){
        parent::_initialize();        
        
        $this->model=M("account");
        $this->money=M("money as m");
    }
    //搜索条件
    private function sopre($where="1"){

    	$p=I("post.");
    	if(!empty($p['type'])){//充值类型
    		$where .=" and type=".$p['type'];
    		$this->assign('type',$p['type']);
    	}
    	if($p['state']!=3){//充值状态
    		$where .=" and state=".$p['state'];
    		$this->assign('state',$p['state']);
    	}

    	if(!empty($p['so_start'])){
    		$so_start=strtotime($p['so_start']);
    		$where.=" and unix_timestamp(create_time)>$so_start";
    		$this->assign('so_start',$p['so_start']);
    	}
    	if(!empty($p['so_end'])){
    		$so_end=strtotime($p['so_end']);
    		$where.=" and unix_timestamp(create_time)<$so_end";
    		$this->assign('so_end',$p['so_end']);
    	}
    	if(!empty($p['so_name'])){
    		$where.=" and user_name like '%{$p['so_name']}%'";
    		$this->assign('so_name',$p['so_name']);
    	}
    	return $where;
    }

	
    //资金账号管理
    public function index() {
    	$where ="";
    	if(IS_POST){
    		$name = I("post.so_name");
    		if(empty($name)){
    			$this->error("用户名不能为空");
    		}else{
    			$where.="u.user_login like '%{$name}%'";
    			$this->assign('so_name',$name);
    		}
    	}
    	$count = $this->money->join("__USERS__ as u on m.uid=u.id")->where($where)->count();
    	$page = $this->page($count, 20);
        $content = $this->money->join("__USERS__ as u on m.uid=u.id")->field("m.id,m.uid,u.user_login,m.total_money,m.available_funds,m.freeze_funds,m.due_in")->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("content",$content);
        $this->assign("page", $page->show('Admin'));
       	$this->display();
        
    }
    
    //修改资金
    public function account_edit(){
    	if(IS_POST){
    		$p = I("post.");
    		$money = M("money");
    		$ava_money = $money->field("total_money,available_funds")->where("uid=".$p['uid'])->find();
    		if(($p['money']+$ava_money['available_funds'])<0){
    			$this->error("用户可用金额不足");
    		}
    		if($p['money']<0){
    			$active_name = "扣除";
    		}else {
    			$active_name = "增加";
    		}
    		$data['total_money'] = $ava_money['total_money']+$p['money'];
    		$data['available_funds'] = $ava_money['available_funds']+$p['money'];
    		$a = $money->where("uid=".$p['uid'])->save($data);
    		if($a){
    			//管理员日志
    			adminLog("系统调整资金: ".$_SESSION['name']."管理员修改".$p['user_name']." "."会员账户金额。         变动金额为".$p['money']."元 。变动原因： ".$p['dec']  );
    			
    			//会员日志
    			userLog("系统调整资金：".$p['user_name']."用户您好    ".$_SESSION['name']."管理员修改了您的账户金额。   变动金额为".$p['money']."元 。变动原因： ".$p['dec']  );
    			$this->success("调整资金成功");
    		}else{
    			$this->error("调整资金失败");
    		}
    	}else{
    		$uid = I("get.uid");
    		$users = M("users")->field("id,user_login")->where("id=".$uid)->find();
	    	$this->assign($users);
	    	$this->display();
    	}
    }

    //资金记录
    public function account_log() {
    	$money_log = M("money_log as m");
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
    	if($uid = I("get.uid")){
    		$where .= " and m.uid=".$uid;
    	}
    	$count = $money_log->join("__USERS__ as u on m.uid=u.id")->where($where)->count();
    	$page = $this->page($count, 20);
        $content = $money_log->join("__USERS__ as u on m.uid=u.id")->field("m.*,u.user_login")->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("content",$content);
        $this->assign("page", $page->show('Admin'));
       	$this->display();
    
    }
    
    //账号管理
    public function account_bank() {
    	$where = "1";
    	if(IS_POST){
    		//搜索判断
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
    			$where.=" and user_name like '%{$p['so_name']}%'";
    			$this->assign('so_name',$p['so_name']);
    		}
    	}
    	
    	$count = M("user_bank")->where($where)->count();
    	$page = $this->page($count, 20);
    	$content = M("user_bank")->where($where)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
    	$this->assign('content',$content);
    	$this->assign("page", $page->show('Admin'));
    	$this->display();
    
    }
    //账号修改
    public function bank_edit(){
    	if(IS_POST){
    		$p = I("post.");
    		if(empty($p['bankzone'])||empty($p['bankcard'])){
    			 $this->error("数据不能为空！");
    		}
    		$data['region_lv2'] = $p['s_province'];
    		$data['region_lv3'] = $p['s_city'];
    		$data['region_lv4'] = $p['s_county'];
    		$data['bank_name'] = $p['bank_name'];
    		$data['bankzone'] = $p['bankzone'];
    		$data['bankcard'] = $p['bankcard'];
			
    		$a = M("user_bank")->where("id=".$p['id'])->save($data);
    		if($a){
    			$this->success("修改成功！");
    		}else {
    			$this->error("修改失败！");
    		}
    		
    	}else{
	    	$id = I("get.id");
	    	$content = M("user_bank")->where("id=".$id)->find();
	    	
	    	$this->assign($content);
	    	$this->display();
    	}
    }
    
    //充值管理
    public function account_recharge() {
    
    	if(IS_POST){
    		$where = $this->sopre();
    	}else{
    		$state = I("get.state_id");
    		$uid = I("get.uid");
    		if($state !=""){
    			$where['state']=$state;
    		}
    		if($uid !=""){
    			$where['uid']=$uid;
    		}
    	}
    	$count = $this->model->where($where)->count();
    	$page = $this->page($count, 20);
    	$content = $this->model->where($where)->order("state,id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
    	$this->assign('state_id',$state);//状态
    	$this->assign('content',$content);
    	$this->assign("page", $page->show('Admin'));
    	$this->display();
    }
    
    //充值审核与查看
    public function review(){
    	if(IS_POST){
    		$p=I("post.");
    		//审核 信息
    		$data['time']=date("Y-m-d H:i:s");
    		$data['state']=$p['sys_state'];
    		$data['admin_user']=$_SESSION['name'];
    		$data['remarks']=$p['remarks'];
    		//更改状态
    		$this->model->startTrans();
    		$content = $this->model->where("id=".$p['id'])->find();
    		if($this->model->where("id=".$p['id'])->save($data)){
    			//充值审核成功
    			if($p['sys_state']==1){
    				$money = M("money")->where("uid=".$content['uid'])->find();
    				//获取免费额度 不等于0 说明要收费的
    				$topUpFees=C('sys_topUpFees');

    				if(!empty($content['money_fee'])){
    					if($money['topupfees']<$topUpFees){
    						if($money['topupfees']+$content['money']>=$topUpFees){
    							$dat['topupfees'] = $topUpFees;
    						}else{
    							$dat['topupfees'] = $money['topupfees']+$content['money'];
    						}
    					}
    				}
    				
    				$dat['total_money'] = $money['total_money']+$content['money'];
    				$dat['available_funds'] = $money['available_funds']+$content['money'];
    				
    				$a = M("money")->where("uid=".$content['uid'])->save($dat);
    				if($a){
    					//是否扣费
	    					if($content['money_actual'] != $content['money']){
	    						$datt['total_money'] = $money['total_money']+$content['money_actual'];
	    						$datt['available_funds'] = $money['available_funds']+$content['money_actual'];
	    						$b = M("money")->where("uid=".$content['uid'])->save($datt);
	    						if($b){   							
	    							//系统账户
	    							$fdata=array(
	    									"total_money"=>array('exp',"total_money+".$content['money_fee']),
	    									"available_funds"=>array('exp',"available_funds+".$content['money_fee'])
	    							);
	    							if(M("money")->where(array("uid"=>1))->save($fdata)){
	    									
	    								//资金日志
	    								moneyLog($content['uid'], -$content['money_fee'], "充值手续费", 7);
	    								//提醒
	    								//remind(5,$content['uid'],array("user"=>$content['user_name'],"modelname"=>"充值手续费"));
	    								//管理员日志
	    								adminLog("充值手续费: 会员".$content['user_name']." "."充值".$content['money']."元    手续费为".$content['money_fee']."元");
	    								//会员日志
	    								userLog("充值手续费：".$content['user_name']."用户您好    充值".$content['money']."元    手续费为".$content['money_fee']."元");

	    								
	    								moneySysLog($content['uid'], $content['money_fee'], "系统收取充值手续费", 7,$_SESSION['ADMIN_ID']);
	    								$this->model->commit();
	    								$this->success("审核成功");
	    							}else{
	    								$this->model->rollback();
	    								moneyErrLog($content['user_name']."用户充值:将管理费添加到系统帐号",$content['uid']);
	    								$this->error("操作失败");
	    							}
	    							
	    						}else{
	    							$this->model->rollback();
	    							//管理员日志
	    							adminLog($content['user_name']."用户充值:扣除用户充值手续费出错");
	    							moneyErrLog($content['user_name']."用户充值:扣除用户充值手续费出错",$content['uid']);
	    							$this->error("扣费操作失败");
	    						}
	    					}else{
	    						//资金日志
	    						moneyLog($content['uid'], $content['money'], "用户充值", 1);
	    						//提醒
	    						//remind(5,$content['uid'],array("user"=>$content['user_name'],"modelname"=>"会员充值"));
	    						//管理员日志
	    						adminLog("会员充值:".$content['user_name']." "."充值 ".$content['money']."元 审核成功");
	    						//会员日志
	    						userLog("充值：".$content['user_name']."用户您好    ".$content['money']."元充值成功");
	    						$this->model->commit();
	    						$this->success("审核成功");
	    					}
					       
					   }else{
					  	 	$this->model->rollback();
					  	 	moneyErrLog($content['user_name'].$error,$content['uid']);
					  	 	$this->error("更改资金操作失败");
					   }
    		
    			}elseif($p['sys_state']==2){
    				//没有通过审核
    				//提醒
    				//remind(5,$content['uid'],array("user"=>$ures['user_name'],"modelname"=>"充值审核失败"));
    				adminLog("用户充值:".$content['user_name']." "."充值审核为失败");
    				//会员日志
    				userLog("用户充值：".$content['user_name']."用户您好     您充值金额".$content['money']."元  审核为失败 ");
    				$this->model->commit();
    				$this->success("审核成功");
    			}
    			 
    		}else{
    			$this->error("操作失败");
    		}
    	}else{
	    	$id = I("get.id");
	    	if(empty($id)){
	    		$this->error("缺少参数");
	    	}
	    	$content = $this->model->where("id=".$id)->find();
	    	if(!$content){
	    		$this->error("数据查询失败");
	    	}
	    	$this->assign($content);
	    	$this->display();
    	}
    }
    
    //提现管理
    public function account_cash() {
    
    	if(IS_POST){
    		$p = I("post.");
    		$where = "1";
	    	if($p['status']!=3){//提现状态
	    		$where .=" and status=".$p['status'];
	    		$this->assign('state',$p['status']);
	    	}
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
	    		$where.=" and user_name like '%{$p['so_name']}%'";
	    		$this->assign('so_name',$p['so_name']);
	    	}
    	}else{
    		$state = I("get.state_id");
    		$uid = I("get.uid");
    		if($state !=""){
    			$where['status']=$state;
    		}
    		if($uid !=""){
    			$where['user_id']=$uid;
    		}
    	}
    	$count = M("user_carry")->where($where)->count();
    	$page = $this->page($count, 20);
    	$content = M("user_carry")->where($where)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
    	$this->assign('state_id',$state);//状态
    	$this->assign('content',$content);
    	$this->assign("page", $page->show('Admin'));
    	$this->display();
    
    }
    

    //提现审核与查看
    public function cash_review(){
    	$user_carry = M("user_carry");
    	if(IS_POST){
    		$p=I("post.");
    		//审核 信息
    		$data['time']=date("Y-m-d H:i:s");
    		$data['status']=$p['sys_state'];
    		$data['admin_user']=$_SESSION['name'];
    		$data['descs']=$p['remarks'];
    		//更改状态
    		$user_carry->startTrans();
    		$content = $user_carry->where("id=".$p['id'])->find();
    		//提现实际金额
    		$carry_sum = $content['money']+$content['fee']; 
    		if($user_carry->where("id=".$p['id'])->save($data)){
    			//提现审核成功
    			if($p['sys_state']==1){
    				$money = M("money")->where("uid=".$content['user_id'])->find();
    				//获取免费提现额度 不等于0 说明要收费的
    				$withdrawalfrees=C('sys_withdrawalsFees');
    
    				if(!empty($content['fee'])){
    					if($money['withdrawalfrees']<$withdrawalfrees){
    						if($money['withdrawalfrees']+$carry_sum>=$withdrawalfrees){
    							$dat['withdrawalfrees'] = $withdrawalfrees;
    						}else{
    							$dat['withdrawalfrees'] = $money['withdrawalfrees']+$carry_sum;
    						}
    					}
    				}
    
    				$dat['total_money'] = $money['total_money']-$carry_sum;
    				$dat['freeze_funds'] = $money['freeze_funds']-$carry_sum;
    
    				$a = M("money")->where("uid=".$content['user_id'])->save($dat);
    						if($a){
    							//系统账户
    							$fdata=array(
    									"total_money"=>array('exp',"total_money+".$content['fee']),
    									"available_funds"=>array('exp',"available_funds+".$content['fee'])
    							);
    							if(M("money")->where(array("uid"=>1))->save($fdata)){
    								//资金日志
    								moneyLog($content['user_id'], -$content['money'], "用户提现", 4);
    								moneyLog($content['user_id'], -$content['fee'], "提现手续费", 7);
    								//提醒
    								//remind(5,$content['uid'],array("user"=>$content['user_name'],"modelname"=>"充值手续费"));
    								//管理员日志
    								adminLog("用户提现: 会员".$content['user_name']." "."提现金额".$content['money']."元    手续费为".$content['fee']."元       总金额为".$carry_sum."元"  );
    								//会员日志
    								userLog("提现：".$content['user_name']."用户您好     您本次提现金额为".$content['money']."元    手续费为".$content['ee']."元       总金额为".$carry_sum."元" );
    
    								moneySysLog($content['user_id'], $content['fee'], "系统收取提现手续费", 7,$_SESSION['ADMIN_ID']);
    								
    								$user_carry->commit();
    								$this->success("审核成功");
    							}else{
    								$user_carry->rollback();
    								moneyErrLog($content['user_name']."用户提现:系统收取提现手续费操作失败",$content['user_id']);
    								$this->error("审核成功");
    							}
    
    						}else{
    							$this->model->rollback();
    							//管理员日志
    							adminLog($content['user_name']."用户提现:提现审核操作失败");
    							$this->error("提现审核失败");
    						}
    
    			}elseif($p['sys_state']==2){
    				//没有通过审核
    				$fdata=array(
    						"freeze_funds"=>array('exp',"freeze_funds-".$carry_sum),
    						"available_funds"=>array('exp',"available_funds+".$carry_sum)
    				);
    				$m = M("money")->where(array("uid"=>$content['user_id']))->save($fdata);
    				if($m){
	    				//提醒
	    				//remind(5,$content['uid'],array("user"=>$ures['user_name'],"modelname"=>"充值审核失败"));
	    				adminLog("用户提现:".$content['user_name']." "."提现审核为失败");
	    				//会员日志
	    				userLog("用户提现：".$content['user_name']."用户您好    您申请提现金额".$content['money']."元 审核失败 ");
	    				moneyLog($content['user_id'], $carry_sum, "用户申请提现审核失败 解冻", 8);
	    				$user_carry->commit();
	    				$this->success("审核操作成功");
    				}else{
    					$user_carry->rollback();
    					$this->error("审核操作失败");
    				}
    			}
    
    		}else{
    			$this->error("操作失败");
    		}
    	}else{
    		$id = I("get.id");
    		if(empty($id)){
    			$this->error("缺少参数");
    		}
    		$content = $user_carry->where("id=".$id)->find();
    		if(!$content){
    			$this->error("数据查询失败");
    		}
    		$this->assign($content);
    		$this->display();
    	}
    }
    
    
    
    
    //添加充值
    public function account_recharge_new() {
    
    	if(IS_POST){
    		$p = I("post.");

    		$uid = M("users")->where("user_login='".$p['user_name']."'")->getfield("id");
    		if(empty($uid)){
    			$this->error("用户不存在！");
    		}
    		if(empty($p['user_name'])||empty($p['money'])){
    			$this->error("用户名/充值金额不能为空！");
    		}
    		if(!is_numeric($p['money'])){
    			$this->error("请正确填写金额！");
    		}
    		
    		$date['uid'] = $uid;
    		$date['user_name'] = $p['user_name'];
    		$date['type'] = 2;//线下充值
    		$date['money'] = $p['money'];//充值金额
    		$date['money_actual'] = $p['money'];
    		$date['create_time'] = date("Y-m-d H:i:s");
    		$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
    		$user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
    		$date['create_ip'] = $user_IP;
    		$date['remarks'] = "系统充值：".$p['remarks'];
    		$a = M("account")->add($date);
    		if($a){
    			adminLog("管理员充值: 管理员给会员".$p['user_name']." "."充值".$p['money']."元");
    			$this->success("充值成功！");
    		}else{
    			$this->error("充值失败！");
    		}
    	}else{
    		$this->display();
    	}

    
    }
    
    

}

?>
