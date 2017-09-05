<?php 
namespace Loan\Controller;
use Common\Controller\AdminbaseController;
class RepayadminController extends AdminbaseController {
    
    public function index(){   
        $status=I('get.status');
        $this->status=$status;
        $where="deal_status=7";
        if($status==1){  //下次时间 -现在是<失察   下次时间》
            //三日内需换的
            $where.=" and next_repay_time -".time().'<'.(24*60*60*3).' and next_repay_time >'.time();
        }else{
            //已经逾期的
            $where.=" and next_repay_time <".time();
        }  
        if(isset($_POST['cate_id']) && $_POST['cate_id']!=0){
            $where.="and cate_id={$_POST['cate_id']}";
            $this->cate_id=$_POST['cate_id'];            
        }
        
        if(isset($_POST['start_time'] )&& $_POST['start_time']!=""){
           
            $start_time=strtotime($_POST['start_time']);
            $this->start_time=$_POST['start_time'];
        }
        
    
        if(isset($_POST['name']) && $_POST['name']!=""){
            $where.=' and Loan.name like '."'%".$_POST['name']."%'";
            $this->name=$_POST['name'];
        }
        if(isset($_POST['user_login']) && $_POST['user_login']!=""){
            $where.=' and user_login like '."'%".$_POST['user_login']."%'";
            $this->user_login=$_POST['user_login'];
        } 
        
        
        if(isset($_POST['end_time']) && $_POST['end_time']!=''){
            $end_time=strtotime($_POST['end_time']);
            $where.=" and Loan.create_time<{$end_time}";
            $this->end_time=$_POST['end_time'];
        }
        
        if(isset($_POST['start_time'] )&& $_POST['start_time']!=""){
             
            $start_time=strtotime($_POST['start_time']);
            $where.=" and Loan.create_time>{$start_time}";
            $this->start_time=$_POST['start_time'];
        }
            //模型分类
            $this->loan_cate=M("loan_cate")->field("cat_name,id")->select();
            $model=M("loan");
            $count=$model->where($where)->count(); 
          
           
          
            $page = $this->page($count, 20);     
            $_lists = D("LoanView")
            ->where($where)
            ->order("create_time ASC")
            ->field("id,repay_nper,repay_count,name,next_repay_time,loantype,cate_id,loantype,user_id,borrow_amount,buy_count,listorder,repay_time,rate,create_time,deal_status,user_login,cat_name,repay_type_name")
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();         
            foreach ($_lists as $k=>$v){
                $c=$v['loantype'];
                $class='\Common\Lib\Loan'.'\\'.$c;
                $benxi=$class::getMonthRepayMoney($v['borrow_amount'],$v['rate']/12/100,$v['repay_time'],$v['repay_count']+1);
                $_lists[$k]['benjin']=format_price($benxi['yueBenJin']);
                $_lists[$k]['lixi']=format_price($benxi['yueLiXi']);
            }     
            $this->assign('lists', $_lists);
            $this->assign("Page", $page->show('Admin'));
         
            $this->display();
        
    }
    
    
    /**
     * 提醒
     */
    public function tixing(){
        $uid=I('get.uid','');
        $id=I('get.did');
        $loan=M("loan")->find($id);       
        $loan_mod=new \Common\Lib\Loan\Loanbest($loan);
        $deal=$loan_mod->getLoan();        
        $param= array("loan_name"=>$deal['sub_name'],"url"=>$deal['url'],"repay_date"=>date('Y-m-d H:i',$deal['next_repay_time']),"money"=>format_price($deal['month_repay_money']));    
        if($uid!=''){
            remind(15,$uid,$param);
        }
       
    }
  
}
?>