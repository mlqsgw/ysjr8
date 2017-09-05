<?php
/**
 * 投资
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class MessageController extends MemberbaseController
{
	
	//通知
	public function index(){  
		
		$where["mes_from"]=1;
		$where["mes_to"]=$_SESSION["user"]["id"];
		$where["mes_type"]=10;
		$Message=M("message");
		$count=$Message->where($where)->count();
		$Page       = new \Think\Page($count,10);
		$show       = $Page->show();
		$list = $Message->where($where)->order('post_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $key=>$val)
		{
			$list[$key]["post_time"]=$this->setTime($val["post_time"]);	
		
		}
	
		$this->assign("list",$list);
		$this->assign("page",$show);

		$this->display();
	}
	
	private function setTime($timestamp)
	{
		$CurTime=time();
		$showString=array("秒","分钟","小时","天");
		$showTimeStr=array(60,60*60,60*60*24,60*60*24*30);
		$unit=array(1,60,60*60,60*60*24);
		$meet=$CurTime-intval($timestamp);
		if($meet>end($showTimeStr))
		{
			return date("Y-m-d",$timestamp);
		}
		foreach($showTimeStr as $key=>$val)
		{
				if($meet<$val)
				{
					return floor($meet/$unit[$key]).$showString[$key]."前";
				}
		}
	}
	public function detail()
	{
		$id=I("get.id",0,"intval");
		if($id<0) $this->error("数据丢失");
		$where["mes_from"]=1;
		$where["mes_to"]=$_SESSION["user"]["id"];
		$where["mes_type"]=10;
		$where["id"]=$id;
		$Message=M("message");
		$info=$Message->where($where)->find();
		if(!$info) $this->error("这条信息不存在");
		if($info["mes_status"]==0) $this->error("这条信息已经删除");
		if($info["mes_status"]==2) $this->changeState($id,1);
		$this->assign($info);
		$this->display();
	}
	
	/**
	 * @param unknown $id 通知id
	 * @param number $status 状态 0 删除 1已读 2 未读
	 */
	private function changeState($id,$status=1)
	{
		$Message=M("message");
		$where["id"]=$id;
		$data["mes_status"]=$status;
		$Message->where($where)->save($data);
	}
	
	public function ToMess()
	{
		if(!empty($_POST))
		{
			$uname=I("post.user_name");	
			$content=I("post.conent");
			if(empty($uname)||empty($content))
			{
				$this->error("发送信息不完整");
			}
			//判断是否存在被发送的用户
			if(is_numeric($uname))
			{
				$where["id"]=$uname;
				$uinfo=M("users")->where($where)->find();
				if(!$uinfo)$this->error("不存在接收信息用户");
			}else{
				$where["user_login"]=$uname;
				$uinfo=M("users")->where($where)->find();
				if(!$uinfo)$this->error("不存在{$uname}用户");
			}
			$MyUid=$_SESSION["user"]["id"];
			if($uinfo["id"]==$MyUid)$this->error("不能给自己发送站内信");
			$resu=sendmessage($uinfo["id"],"",$content,$MyUid,11);
			if($resu)
			{
				$this->success("发送成功");
			}else{
				$this->error("发送不成功，请稍后在试试");
			}
		}
		$this->display("send");
	}
	
	public function interflow()
	{
		$MyUid=$_SESSION["user"]["id"];
		$Ouid=I("get.uid","0","intval");
		$where["mes_type"]=11;
		$where['_string'] ="(mes_from={$MyUid} and mes_to={$Ouid}) or (mes_from={$Ouid} and mes_to={$MyUid})";	
		$Message=M("message");
		$count=$Message->where($where)->count();
		
		$Page       = new \Think\Page($count,10);
		$show       = $Page->show();
		$list = $Message->where($where)->order('post_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $key=>$val)
		{
			$list[$key]["post_time"]=$this->setTime($val["post_time"]);
			$userid=$val["mes_from"]==$MyUid?$val["mes_to"]:$val["mes_from"];//获取交互的用户信息
			$uinfo=$this->userInfo($userid);
			$list[$key]["userimg"]=$uinfo["avatar"];
			$list[$key]["user_login"]=$uinfo["user_login"];
			$list[$key]["myid"]=$MyUid;
			$list[$key]["userid"]=$uinfo["id"];
		}
		
		$this->assign("list",$list);
		$this->assign("page",$show);
		$this->assign("uid",$Ouid);
		$this->display();
	}
	/*
	 * 私信列表
	 */
	public function primess()
	{
		//分两种方式获取用户信息
		//一种为 主动发起的
			$sendData=$this->GetData();
		//第二种 接收的信息
			$receiveData=$this->GetData("receive");	
			$data=array();
			foreach($sendData as $key=>$val)
			{
				if(isset($receiveData[$key]))
				{
					if($val["post_time"]<$receiveData[$key]["post_time"])
					{
						$data[$key]=$receiveData[$key];
					}else{
						$data[$key]=$val;
					}
				unset($sendData[$key],$receiveData[$key]);
				}	
			}
			$data=array_merge($data,$sendData,$receiveData);
// 			$count=count($data);
// 			$Page       = new \Think\Page($count,10);
// 			$show       = $Page->show();
// 			 $Page->firstRow;
// 			 $Page->listRows;
		
			$this->assign("list",$data);
			$this->assign("page",$show);
			$this->display();
			
			
	}
	
	/**
	 * 获取用户发送或者接收的信息 
	 *@pare $type 获取类型  receive || send 
	 */
	private function GetData($type="send")
	{
		$Message=M("message");
		$MyUid=$_SESSION["user"]["id"];
		$where["mes_type"]=11;
		$pre=C("DB_PREFIX");
		if($type=="send")
		{
			$where["mes_from"]=$MyUid;
			$join=$pre."users as U on U.id=M.mes_to";
			$group="mes_to";	
			$getfield="mes_to,post_time,M.id,mes_content,mes_status,U.user_login,U.avatar,U.id as uid";
		}else{
			$where["mes_to"]=$MyUid;
			$join=$pre."users as U on U.id=M.mes_from";
			$group="mes_from";
			$getfield="mes_from,post_time,M.id,mes_content,mes_status,U.user_login,U.avatar,U.id as uid";
		}
		$data=$Message->alias("M")->join($join)->where($where)->group($group)->order("M.post_time desc")->getField($getfield);
		return is_array($data)?$data:array();
	}
	
	
	
	
	/*
	 * 
	 */
	private function userInfo($uid)
	{
		$user=M("users");
		$where["id"]=$uid;
		$info=$user->where($where)->find();	
		return $info;	
	}
	
	public function delLog()
	{
		$id=$_POST["id"];
		if(!is_array($id)){$this->error("非法数据");}
		$MyUid=$_SESSION["user"]["id"];
		$Message=M("message");
		//print_r($id);
		//$where["id"]=array("in","1,2");
		$where["mes_type"]=11;
		$where['_string'] ="mes_from={$MyUid} or mes_to={$MyUid}";
		foreach($id as $key=>$val)
		{
			$where["id"]=$val;
			$result=$Message->where($where)->delete();
		}
		
		if($result)
		{
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	
	
	
	
	
	
}