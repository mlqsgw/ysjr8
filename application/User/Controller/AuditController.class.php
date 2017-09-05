<?php
/**
 * 认证管理
 */

namespace User\Controller;
use Common\Controller\MemberbaseController;
class AuditController extends MemberbaseController
{
    public function index(){
    	
        //当前位置
        $this->assign('curr','Auditindex');
        //当前页面标题
        $this->assign('page_title',"认证中心");
      
     
        //积分配置
        $this->integral=get_integral_config();
        //必要的认证              

        //动态的资料认证  在btop上面可能这个不需要显示 用户不用添加 都是后台管理添加的       
       // $Review=M("data_model")->field("id,name,source")->select();
       	$Review=$this->userStates();
        $this->assign('Reviewcoun',count($Review));
        $this->assign('Review',$Review);
        //认证信息
        $userid=sp_get_current_userid();
        $autd=M("user_info")->where("uid=".$userid)->find();
        $this->assign('autd',$autd);
		
        $this->display();
    }
    /*
     * 获取用户资料认证的类型 ，积分和是否认证
     */
    
    private  function  userStates()
    {
    	$where["u_id"]=$_SESSION["user"]["id"];
    	$where["user_login"]=$_SESSION["user"]["user_login"];
    	if(empty($where["u_id"])||empty($where["user_login"])) return ;
    	$Review=M("data_model")->field("id,name,source")->select();
    	if(!$Review) return ;
    	foreach($Review as $key=>$val)
    	{
    		$userData=$this->IsOneDataAuth($val["id"],$where);
    		if(!$userData) $userData["sys_state"]=-1;
    		$Review[$key]['state']=$userData["sys_state"];
    	}
    	return $Review;
    }
    /*
     * 获取用户的某一个资料认证状态
     * @mid 认证模型 id
     * @where 查询条件
     * @return int; 
     */
    private function IsOneDataAuth($mid,$where)
    {
    	$UserData=M("data_table_{$mid}")->where($where)->find();
    	//if(!$UserData) $UserData["sys_state"]=-1;
    	
    	
    	return $UserData;
    }
    /*
     * 资料认证
     */
    public function DataAuth()
    {
    	$mid=I("get.mid","0","intval");
    	if($mid<=0) $this->error("非法操作");
    	//判断是否存在该类型
    	$modeData=M("data_model")->where("id=$mid")->find();
    	if(!$modeData) $this->error("不存在此认证模型");
    	$where["u_id"]=$_SESSION["user"]["id"];
    	$where["user_login"]=$_SESSION["user"]["user_login"];
    	$UserAuth=$this->IsOneDataAuth($mid, $where);
    	if(!$UserAuth)
    	{
    		$UserAuth["sys_state"]=-1;	
    	}
    	if($UserAuth["sys_state"]==1) $this->error("已经认证过了，请不要重复操作");
    	if($UserAuth["sys_state"]==0) $this->error("正在等待审核，请不要重复操作");
    	$temAuth=A("Admin/TemAuth");
    	if(!empty($_POST))
    	{
    		if($UserAuth["sys_state"]==-1)	//新加
    		{
    			$_POST["u_id"]=$_SESSION["user"]["id"];
	    		$resu=$temAuth->insertData($mid);
	    		if(is_string($resu))
	    		{
	    			$this->error($resu);
	    		}else{
	    			if($resu)
	    			{
	    				$this->success("添加成功",U("Audit/index"));die();
	    			}else{
	    				$this->error("添加失败");
	    			}
	    		}
    		}elseif($UserAuth["sys_state"]==2) //未通过修改
    		{
    			$_GET["id"]=$UserAuth["id"];
    			$resu=$temAuth->editData($mid);
    			if(is_string($resu))
    			{
    				$this->error($resu);
    			}else{
    				if($resu)
    				{
    					//把状态修改为带审核
    					$mwhere["id"]=$UserAuth["id"];
    					$data["sys_state"]=0;
    					M("data_table_{$mid}")->where($mwhere)->save($data);
    					$this->success("修改成功",U("Audit/index"));die();
    				}else{
    					$this->error("修改失败");die();
    				}
    			}	
    		
    		}	
    	}
    	$this->assign("modeName",$modeData["name"]);
    	$this->assign("mid",$mid);
    	if($UserAuth["sys_state"]==2) //未通过认证
    	{
    		//获取用户认证数据
    		$modeTemp=$temAuth->getTemp($mid,$UserAuth,"edit","F");
   	    	$this->assign("addtemp",$modeTemp);
   	    	$this->display("auth");
    	}else{
    		$addTemp=$temAuth->addtemp($mid,"F"); //获取资料认证的前台模版
    		$this->assign("addtemp",$addTemp);
    		$this->display("auth");
    	}
    }
    /**
     * 会员查看其他会员资料审核信息 
     * 
     */
    private function seeUserDataAuth($uid,$mid)
    {
    	//获取用户数据
    	$mw["u_id"]=$uid;
    	$mw["sys_state"]=1;
    	$UserAuth=$this->IsOneDataAuth($mid, $mw);
    	if(!$UserAuth) return false;
    	//获取当前登录用户的积分 判断等级
    	$cuid=$_SESSION["user"]["id"];
		if($cuid!=$uid) //当前浏览用户浏览的不是自己的认证数据
		{
    		$score=$_SESSION["user"]["score"];
    		$great=$this->QuertGreat($score);
    		if(!great)$great["id"]=-1;
		}else{
			$great["id"]=0;	//最大级别
		}
    	$temAuth=A("Admin/TemAuth");
    	$modeTemp=$temAuth->getTemp($mid,$UserAuth,"see","F",$great['id']);
    	return $modeTemp;
    }
    /*
     * 获取用户等级 
     * @score 用户的积分数
     */
    private  function QuertGreat($score=0)
    {
    	if($score<0)return false;
 		$great=M("user_level")->order("min asc,max asc")->getField("id,name,img,min,max");
 		if(!$great) return false;
 		$maxGreat=end($great);
 		if($score>=$maxGreat["max"]||($score>=$maxGreat["min"] and $score<=$maxGreat["max"]))
 		{
 			return $maxGreat;
 		}
 		foreach($great as $key=>$val)
 		{
 			if($score>=$val["min"] && $score<=$val["max"])
 			{
 				return $val;	
 			}	
 		}
 		return false;
    }
    
    //查看用户认证资料
    public function seeauth()
    {
    	//判断是否存在uid的 用户
    	$uid=I("get.uid",0,"intval");
    	$mid=I("get.mid",0,"intval");
    	$style=I("get.style","iframe","trim");
    	$UW["id"]=$uid;
    	$uData=M("users")->where($UW)->find();
    	if(!$uData) return false;
    	$modeData=M("data_model")->where("id=$mid")->find();
    	if(!$modeData) return false;
    	$modetemp=$this->seeUserDataAuth($uid,$mid);
    	if(!$modetemp)$this->error("不存在当前认证");
    	$this->assign("modetemp",$modetemp);
    	
    	if($style=="page")
    	{
    		$this->assign($uData);
    		$this->assign($modeData);
    		$default="temp";	
    	}else{
    		$default="iframe";
    	}
    	$this->display($default);
    }
    //资料认证审核
    public function dataauth_list(){
    	$userid=sp_get_current_userid();
    	$Review = M("data_model")->select();
    	foreach ($Review as $key=>$value){
    		$models = M("data_table_".$value['id']);
    		$sys_state = $models->where("u_id=".$userid)->getfield("sys_state");
    		if(!empty($sys_state)){
    			$Review[$key]['sys_state'] = $sys_state;
    		}else{
    			$Review[$key]['sys_state'] = 3;
    		}
    	}
    	$this->assign("Review",$Review);
    	$this->assign("Reviewcoun",count($Review));
    	$this->display();
    }
    
    
}

?>