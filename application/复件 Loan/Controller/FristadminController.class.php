<?php 
namespace Loan\Controller;
use Common\Controller\AdminbaseController;

class FristadminController extends AdminbaseController {
    public function index(){

        $deal_status=I('get.deal_status');
        $this->deal_status=$deal_status;
        $where=" is_delete=0 and deal_status=$deal_status ";
        if(isset($_POST['cate_id']) && $_POST['cate_id']!=0){
            $where.="and cate_id={$_POST['cate_id']}";
            $this->cate_id=$_POST['cate_id'];            
        }
    
        if(isset($_POST['name']) && $_POST['name']!=""){
            $where.=' and name like '."'%".$_POST['name']."%'";
            $this->name=$_POST['name'];
        }
        if(isset($_POST['user_login']) && $_POST['user_login']!=""){
            $where.=' and user_login like '."'%".$_POST['user_login']."%'";
            $this->user_login=$_POST['user_login'];
        }
            //模型分类
            $this->loan_cate=M("loan_cate")->field("cat_name,id")->select();
            $model=M("loan");
      
            $count=$model->where($where)->count();                  
            
            $page = $this->page($count, 20);     
            $lists = D("LoanView")
            ->where($where)
            ->order("create_time ASC")
            ->field("id,name,cate_id,loantype,user_id,borrow_amount,listorder,repay_time,rate,create_time,deal_status,user_login,cat_name,repay_type_name")
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();          
            $this->assign('lists', $lists);
            $this->assign("Page", $page->show('Admin'));
            
            $this->display();
        
    }
    //标的 第一次审核    
    public function fristaudit(){
        if(IS_POST){           
            $p=I("post.");
      
            $deal_status=$p['deal_status'];
            $loan=M("loan")->where("id={$p['id']} and (deal_status =0 or deal_status=2)")->field("sub_name,deadline,user_id,user_login")->find();
         
            
            if(!$loan){
                $this->error("你不能审核这个标");
            }
            //审核不通过
            if($deal_status==2){
                 $data=array(
                     'deal_status'=>2,
                     'id'=>$p['id'],
                     'firstauditmark'=>$p['firstauditmark'],
                     'firstaudittime'=>time(),
                     'firstaudit'=>$_SESSION['ADMIN_ID'],
                 );
                 $state="没有通过初次审核";
                //审核通过了
            }elseif($deal_status==1){
                //开始时间
                $start_time=$p['start_time'];
                if($start_time==""){
                    $this->error("开始招标时间不能为空");
                }
                
                $is_recommend=$p['is_recommend']==1?1:0;
                $start_time=strtotime($start_time);
                //start_time 开始招标日期
                //deal_status 1初次审核通过 2失败
                //firstaudit初审审核人
                //firstauditmark 初审备注
                //firstaudittime 初审时间
                //enddate流标时间
                $data=array(
                    'start_time'=>$start_time,
                    'deal_status'=>1,
                    'id'=>$p['id'],
                    'firstauditmark'=>$p['firstauditmark'],
                    'firstaudittime'=>time(),
                    'firstaudit'=>$_SESSION['ADMIN_ID'],
                    'is_recommend'=>$is_recommend,
                    'enddate'=>$loan['deadline']*24*60*60+$start_time,
                    
                );
                $state="通过初次审核";
            }
            if(M("loan")->save($data)){
                //管理员日志
                adminLog("审核{$p['id']}的标");
                //标日志
                loanLog($state, $p['id'],$_SESSION['ADMIN_ID']);
                //发送提醒
                $param=array('user_login'=>$loan['user_login'],'sub_name'=>$loan['sub_name'],'state'=>$state,'time'=>date("Y-m-d H:i:s",time()),'url'=>UU('Loan/index/deal',array('id'=>$p['id']),true,true));
                remind(5,$loan['user_id'],$param);
                $this->success("审核成功");
                
            }else{
                $this->error("审核失败");
            }
        
            
        }else{ 
            
            $loan_id=I("get.loan_id");
            //判断当前状态是否是 0为审核，2审核失败  其他的状态就不能审核了
            $loan=M("loan")->where("id=$loan_id and (deal_status =0 or deal_status=2)")->count(); 
            if($loan){
                $this->loan_id=$loan_id;
                $this->display();
            }else{
                $this->error("你不能审核这个标");
            }           
            
           
        }
        
    }
    

    public function check_loan(){
        $p=I('post.');
        if(empty($p['loan_cate'])){
            $this->error("标类型不能为空");
        }
        if(empty($p['user'])){
            $this->error("用户不能为空");
        }
        $result=check_loan($p['loan_cate'],$p['user']);   
        if($result['error']){
           $data['status'] = "" ;          
           $data['data']=$result['data'];  
           $data['info']="缺少红色字体的资料";    
           $this->ajaxReturn($data);
        }else{
            $this->success("ok",U("Loan/Loanlistadmin/add_two",array("loan_cate"=>$p['loan_cate'],"user"=>$p['user'])));
        }
    }
    //搜索用户
    public function souser(){
        $userInfo=I("post.userInfo");       
        $where['id']  = $userInfo;
        $where['user_login']  = array('like',"%$userInfo%");
        $where['_logic'] = 'or';
        $map['_complex'] = $where;
        $map['user_type']  = 2;   
        $map['user_status']  = array("NEQ",0);
       $lists=M("users")->where($map)->field("id,user_login")->select();
       if($lists){
           $data['status'] = "success" ;
           $data['data']=$lists;
      
           $this->ajaxReturn($data);
       }else{
           $this->error("没有查找到任何用户信息");
       }
        
    }
    public function edit(){
       if(IS_POST){
            
        }else{
            $this->display();
        }
    }
    
    //申请贷款列表
    public function applylist(){

    	$where="1";
    	
    	if(isset($_POST['name']) && $_POST['name']!=""){
    		$where.=' and user_name like '."'%".$_POST['name']."%'";
    		$this->name=$_POST['name'];
    	}
    	if(isset($_POST['user_login']) && $_POST['user_login']!=""){
    		$where.=' and real_name like '."'%".$_POST['user_login']."%'";
    		$this->user_login=$_POST['user_login'];
    	}
    	
    	if(!empty($_POST['so_start'])){
    		$so_start=strtotime($_POST['so_start']);
    		$where.=" and unix_timestamp(time)>$so_start";
    		$this->assign('so_start',$_POST['so_start']);
    	}
    	if(!empty($_POST['so_end'])){
    		$so_end=strtotime($_POST['so_end']);
    		$where.=" and unix_timestamp(time)<$so_end";
    		$this->assign('so_end',$_POST['so_end']);
    	}
    	if($_POST['status']!=""){
    		$where.=" and status=".$_POST['status'];
    		$this->assign('status',$_POST['status']);
    	}
    	
    	$model=M("loan_apply");
    	$count=$model->where($where)->count();
    	$page = $this->page($count, 20);
    	$lists = $model
    	->where($where)
    	->order("id desc")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();
    	$this->assign('lists', $lists);
    	$this->assign("page", $page->show('Admin'));
    	
    	$this->display();
    }
    
    //查看申请贷款信息
    public function review(){
    	$model=M("loan_apply");
    	if(IS_POST){
	    	$p=I("post.");
	    	//处理 信息
	    	$data['handle_time']=date("Y-m-d H:i:s");
	    	$data['status']=$p['status'];
	    	$data['admin_name']=$_SESSION['name'];
	    	$data['remarks']=$p['remarks'];
	    	if($model->where("id=".$p['id'])->save($data)){
	    		$this->success("审核成功");
	    	}else{
	    		$this->error("审核失败");
	    	}
    	}else{	
	    	$id = I("get.id");
	    	$content = $model->where("id=".$id)->find();
	    	$this->assign($content);
	    	$this->display();
    	}
    }
    
    //删除申请贷款信息
    public function delete(){
    	$id = I("get.id");
    	if(M("loan_apply")->where("id=".$id)->delete()){
    		$this->success("删除成功");
    	}else {
    		$this->error("删除失败");
    	}
    }
}
?>