<?php 
namespace Loan\Controller;
use Common\Controller\AdminbaseController;
use Common\Lib\Loan\Loanbest;

class FulladminController extends AdminbaseController {
    //满标待审
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
            ->field("id,name,cate_id,loantype,user_id,borrow_amount,buy_count,listorder,repay_time,rate,create_time,deal_status,user_login,cat_name,repay_type_name")
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();          
            $this->assign('lists', $lists);
            $this->assign("Page", $page->show('Admin'));
           
            $this->display();
        
    }
    //标的 第一次审核    
    public function fullaudit(){
        if(IS_POST){           
            $p=I("post.");
           /**
    [deal_status] => 7
    [start_time] => 2015-01-26 11:39
    [fullauditmark] => 巴巴爸爸
    [id] => 7
            */      
            $deal_status=$p['deal_status'];
            $loan=M("loan")->where("id={$p['id']} and (deal_status =0 or deal_status=5)")->find();
                      
            if(!$loan){
                $this->error("你不能审核这个标");
            }
            
            //初始化标
            $loan_mod=new Loanbest($loan);
            //审核不通过            
            if($deal_status==6){
                 $data=array(
                     'deal_status'=>6,
                     'id'=>$p['id'],
                     'fullauditmark'=>$p['fullauditmark'],
                     'fullaudittime'=>time(),
                     'fullaudit'=>$_SESSION['ADMIN_ID'],
                 );
                 //需要将以投资的人的冻结的钱反悔到各自的帐号
                 $state=$loan_mod->notpass();
                 if($state['state']){
                     $this->error($state['info']);
                 
                 }else{
                     $state="没有通过满标复审审核";
                 }
              
                //审核通过了  还款中的状态   
            }elseif($deal_status==7){                
                //设置开始还款的时间时间
                //算出下个月的还款时间           
                $repay_start_time=$p['repay_start_time'];
                if($repay_start_time==""){
                    $this->error("开始还款时间不能为空");
                }          
                $repay_start_time=strtotime($repay_start_time);
                //$repay_start_time 开始还款时间            
                //firstaudit初审审核人
                //firstauditmark 初审备注
                //firstaudittime 初审时间
                //下次还款日期                
                $cRate='\Common\Lib\Loan\\'.$loan['loantype'];
                $next_repay_time=$cRate::next_replay_month($repay_start_time,0,$loan['repay_time']); 
                //还款期数
                $repay_nper=$cRate::getNper($loan['repay_time']);
                $data=array(
                    'repay_start_time'=>$repay_start_time,
                    'deal_status'=>7,
                    'id'=>$p['id'],
                    'repay_nper'=>$repay_nper,
                    'fullauditmark'=>$p['fullauditmark'],
                    'fullaudittime'=>time(),
                    'fullaudit'=>$_SESSION['ADMIN_ID'], 
                    'is_has_loans'=>1,//是否以放款
                    'next_repay_time'=>$next_repay_time,                 
                );               
           
                $state=$loan_mod->pass();
                if($state['state']){
                    $this->error($state['info']);
                }
                $state="通过满标复审审核并放款";
            }
            if(M("loan")->save($data)){
                //管理员日志
                adminLog($state.'ID:'.$p['id'].'的标');
                //标日志
                loanLog($state, $p['id'],$_SESSION['ADMIN_ID']);
                //发送提醒
                $param=array('user_login'=>$loan['user_login'],'sub_name'=>$loan['sub_name'],'state'=>$state,'time'=>date("Y-m-d H:i:s",time()),'url'=>UU('Loan/index/deal',array('id'=>$p['id']),true,true));
                remind(8,$loan['user_id'],$param);
                $this->success("审核成功");
                
            }else{
                $this->error("审核失败");
            }
        
            
        }else{ 
            
            $loan_id=I("get.loan_id");
            //判断当前状态是否是 0为审核，2审核失败  其他的状态就不能审核了
            $loan=M("loan")->where("id=$loan_id and (deal_status =0 or deal_status=5)")->count(); 
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
}
?>