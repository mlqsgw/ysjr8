<?php
/**
 * 资料审核
 */
namespace User\Controller;
use Common\Controller\AdminbaseController;
class ReviewadminController extends AdminbaseController
{
    public $model;
    public $modelname;
    public $mid;    
    
    function _initialize(){
        parent::_initialize();        
        
        $this->mid=I("get.mid");
        $this->assign("mid", $this->mid);       
        //取得MODEL
        $this->model=M("data_table_{$this->mid}");
        //赋值model名字
        $this->modelname=M("data_model")->where(array("id"=>$this->mid))->getField("name");
        $this->assign("modelname", $this->modelname);
        
    } 
    private function sopre($where){
        $p=I("post.");
        if(!empty($p['so_start'])){
            $so_start=strtotime($p['so_start']);
            $where.=" and sys_lodata>$so_start";
            $this->assign('so_start',$p['so_start']);
        }
        if(!empty($p['so_end'])){
            $so_end=strtotime($p['so_end']);
            $where.=" and sys_lodata<$so_end";
            $this->assign('so_end',$p['so_end']);
        }
        if(!empty($p['so_name'])){
            $where.=" and user_login like '%{$p['so_name']}%'";
            $this->assign('so_name',$p['so_name']);
        }
        return $where;
    }
    //待审核的
    public function index(){
        $where=$this->sopre("sys_state=0");       
        $count=$this->model->where($where)->count();  
   
        $page = $this->page($count, 20);
        $lists = $this->model
        ->where($where)
        ->order("sys_lodata ASC")
        ->limit($page->firstRow . ',' . $page->listRows)
        ->select();        
        $this->assign('lists', $lists);
        $this->assign("page", $page->show('Admin'));    
            
        $this->display(); 
    }
    //已经审核通过的
    public function pass(){  
        $where=$this->sopre("sys_state=1");
        $count=$this->model->where($where)->count();        
        $page = $this->page($count, 20);
        $lists = $this->model
        ->where($where)
        ->order("sys_lodata ASC")
        ->limit($page->firstRow . ',' . $page->listRows)
        ->select();
        $this->assign('lists', $lists);
        $this->assign("page", $page->show('Admin'));
        
        $this->display();
    }
    //已经审核通过的
    public function notpass(){
        $where=$this->sopre("sys_state=2");
        $count=$this->model->where($where)->count();
        $page = $this->page($count, 20);
        $lists = $this->model
        ->where($where)
        ->order("sys_lodata ASC")
        ->limit($page->firstRow . ',' . $page->listRows)
        ->select();
        $this->assign('lists', $lists);
        $this->assign("page", $page->show('Admin'));
    
        $this->display();
    }
    
    public function review(){        
       if(IS_POST){ 
           $p=I("post."); 
            
           //用户信息
           $ures=$this->model->field("u_id,user_login,sys_state")->find($p['id']);
           
           if($ures['sys_state']==$p['sys_state']){
               $this->error("没有更改任何状态");
           }           
      
           //模块信息
           $mres=M("data_model")->field("source,through,notthrough")->find($this->mid);
           
           $p['sys_updata']=time();
           $p['sys_audata']=$p['sys_state']=="1"?time():0;
           $p['audit_id']=$_SESSION['ADMIN_ID'];
           //更改状态
           if($this->model->save($p)){               
              //通过审核后
              if($p['sys_state']==1){         
              
                  //给这个用户添加这个资料认证的标识
                  $usermark=M("users")->where(array("id"=>$ures['u_id']))->getField("datamark");
                  $datamark=unserialize($usermark);
                  if(empty($datamark)){
                      $datamark=array();
                  }
                  $newmark=array($this->mid=>$this->modelname);
                 
                  $merge=serialize($newmark+$datamark);
                  if(M("users")->where(array("id"=>$ures['u_id']))->save(array("datamark"=>$merge))){
                      //加积分
                      integral($ures['u_id'],0,1,true,$mres['source'],"{$this->modelname}资料审核通过");
                      //提醒
                      remind($mres['through'],$ures['u_id'],array("user"=>$ures['user_login'],"modelname"=>$this->modelname));
                      //管理员日志
                      adminLog("修改用户:".$ures['user_login']." ".$this->modelname."资料审核通过");
                      
                      $this->success("审核成功");
                  }else{
                      $this->success("用户添加资料标识失败");
                  }
              
              
              }elseif($p['sys_state']==2){
                //没有通过审核
               //提醒
               remind($mres['notthrough'],$ures['u_id'],array("user"=>$ures['user_login'],"modelname"=>$this->modelname));
               adminLog("修改用户:".$ures['user_login']." ".$this->modelname."资料审核未通过");
               
               $this->success("审核成功");
               
              }
             
           }else{
               $this->error("状态更改失败");
           }
       }else{
           $id=I("get.id");
           $res=$this->model->field("id,sys_state,user_login")->find($id);
           if($res['sys_state']==0){
               $res['sy_state']="待审核";
           }elseif($res['sys_state']==1){
               $res['sy_state']="已审核通过";
           }elseif($res['sys_state']==2){
               $res['sy_state']="未通过审核";
           }          
           $this->assign("res",$res);                   
           $this->display();
       }
    }
    public function add()
    {
    	//引入资料认证模版类
    	$temAuth=A("Admin/TemAuth");
    	if(!empty($_POST))
    	{
    		$act=I("get.act");
    		if($act=="search")
    		{	
	    		$userInfo=I("post.userInfo");
	    		if(empty($userInfo)) $this->error("请输入用户名或者用户id");
	    		if(is_numeric($userInfo))
	    		{
	    			$Uwhere["id"]=$where["u_id"]=$userInfo;
	    		}else{
	    			$Uwhere["user_login"]=$where["user_login"]=array("like","%$userInfo%");
	    		}
	    			//$where["sys_state"]=0;
					$Uwhere["user_type"]=2;
					//获取用户信
	    		$lsList=$this->model->where($where)->getField("u_id");
				
	    		if(is_array($lsList))
	    		{
	    			$Uwhere["id"]=array('not in',$lsList);
	    		}elseif(!empty($lsList))
	    		{
	    			$Uwhere["id"]=array("neq",$lsList);
	    		}
	    	
	    		$userlist=M("users")->where($Uwhere)->select();
	    		$this->assign("userlist",$userlist);
	    		$this->assign("searchInfo",$userInfo);
    		}elseif($act=="insert"){
    			$resu=$temAuth->insertData($this->mid);
    			if(is_string($resu))
    			{
    				$this->error($resu);	
    			}else{
    				if($resu)
    				{ 
    					$this->success("添加成功",U("Reviewadmin/index",array("mid"=>$this->mid)));
    				}else{
    					$this->error("添加失败");
    				}	
    			
    			}
    		}
    	}
    	//$temAuth=A("Admin/TemAuth");
    	$addTemp=$temAuth->addtemp($this->mid);
    	$this->assign("addtemp",$addTemp);
    	$this->display();
    }
    public function del()
    {
    	if(empty($_GET)) $this->error("非法操作");
 		$where["id"]=I("get.id");
 		$res=$this->model->where($where)->delete();
    	if($res)
    	{
    		$this->success("删除成功");
    	}else{
    		$this->error("删除失败");
    	}
    }
    public function chakan()
    {
    	if(empty($_GET)) $this->error("非法操作");
    	$where["id"]=I("get.id");
    	$res=$this->model->where($where)->find();
    	$temAuth=A("Admin/TemAuth");
    	$modeTemp=$temAuth->getTemp($this->mid,$res);
    	$this->assign("seetemp",$modeTemp);
    	$this->display();
    }
    public function edit()
    {
    	$temAuth=A("Admin/TemAuth");
    	if(!empty($_POST))
    	{
    		$resu=$temAuth->editData($this->mid);
    		if(is_string($resu))
    		{
    			$this->error($resu);
    		}else{
    			if($resu)
    			{
    				$this->success("修改成功");
    			}else{
    				$this->error("修改失败");
    			}	 
    		}
    	}
    	if(empty($_GET)) $this->error("非法操作");
    	$where["id"]=I("get.id");
    	$res=$this->model->where($where)->find();
    	
    	$modeTemp=$temAuth->getTemp($this->mid,$res,"edit");
    	$this->assign("edittemp",$modeTemp);
    	$this->assign("id",$where["id"]);
    	$this->assign("user_login",$res["user_login"]);
    	$this->display();

    }
    
    
    
}

?>