<?php 
namespace Loan\Controller;
use Common\Controller\AdminbaseController;

class TransferadminController extends AdminbaseController {
    //满标待审
    public function index(){   
       
        $deal_status=I('get.deal_status');
        $this->deal_status=$deal_status;       
        if($deal_status==1){
            $where="status=1 and t_user_id=0";
        }else{
            $where="status=1 and t_user_id !=0";
        }
        if(isset($_POST['cate_id']) && $_POST['cate_id']!=0){
            $where.=" and cate_id={$_POST['cate_id']}";
            $this->cate_id=$_POST['cate_id'];            
        }
        if(isset($_POST['end_time']) && $_POST['end_time']!=''){
            $end_time=strtotime($_POST['end_time']);            
            $where.=" and loan_load_transfer.create_time<{$end_time}";
            $this->end_time=$_POST['end_time'];
        }
        
        if(isset($_POST['start_time'] )&& $_POST['start_time']!=""){
             
            $start_time=strtotime($_POST['start_time']);
            $where.=" and loan_load_transfer.create_time>{$start_time}";
            $this->start_time=$_POST['start_time'];
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
     
            $count=D('TransferlistsView')->where($where)->count();        
            $loan=new \Common\Lib\Loan\Loanbest();
            $page = $this->page($count, 20);
            $_lists=D('TransferlistsView')
            ->where($where)
            ->field()
            ->order('id DESC')
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();  
            $lists=$loan->deal_with_transfer($_lists);                   
            $this->assign('lists', $lists);
            $this->assign("Page", $page->show('Admin'));           
            $this->display();
        
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