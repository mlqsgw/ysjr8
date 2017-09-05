<?php
namespace App\Controller;
use Common\Controller\AppBaseController; 
/**
 * 首页
 */
class IndexController extends AppBaseController {
	
    //最新投资列表
	public function index() {
		//最新借款列表
		$num=I("get.num",4,"intval");
		$where=array('is_delete'=>0,);
		$loan=new \Common\Lib\Loan\Loanbest();
		$count=D('LoanlistsView')->where($where)->count();
		
		$page = $this->page($count, $num);
		$_lists=D('LoanlistsView')
		->where($where)
		->field()
		->order("deal_status ASC, update_time DESC,id DESC")
		->limit($page->firstRow . ',' . $page->listRows)
        ->select();  
		$lists=$loan->deal_with_list($_lists);
		$this->assign('deal_list', $lists);
    	$this->display();	
    }
 
    public function  login()
    {
    	$user_phone=I("get.user_phone");
    	$password=I("get.password");
    	$type=I("get.type");
    	if(empty($user_phone))
    	{
    		$this->error("0000");
    	}
    	$where["user_phone"]=$user_phone;
    	$where["user_type"]=2;
    	$users_model=M('Users');
    	$result = $users_model->where($where)->find();
    	if($result)
    	{
    		if(empty($type))
    		{
    			$this->success(array("usercheck"=>1));
    		}else{
    			if(empty($password)||$result['user_pass'] != sp_password($password))
    			{
    				$this->error("1002");
    			}
    			$_SESSION["user"]=$result;
    			//写入此次登录信息
    			$data = array(
    					'last_login_time' => date("Y-m-d H:i:s"),
    					'last_login_ip' => get_client_ip(),
    			);
    			$users_model->where("id=".$result["id"])->save($data);   
    			$result["userlogin"]=1;	
    			$auditamark=unserialize($result["auditamark"]);		
    			$result["realName"]=isset($auditamark["3"])?1:0;
    			$this->success($result);
    		}
    	}else{
    		$this->error("1001");
    		
    	}
    }
    
    public function about()
    {
    	$id=3;
    	if(!function_exists("sp_sql_post"))
    	{
    		$filename=APP_PATH."Portal/Common/function.php";
    		if(is_file($filename))include_once($filename);
    	}
    	$article=sp_sql_post($id,'');
    	$this->success($article);
    }
  
    //贷款详情页
    public function deal(){
    	//得到贷款ID
    	$id=I("get.id",0,"intval");
   		if($id==0)$this->error("0000");
    	$res=D('LoanfullView')->where(array('is_delete'=>0,'id'=>$id))->find();
    	if(!$res){
    		$this->error("1018");//未获取到相应数据
    	}
    	//引用类
    	$loan=new \Common\Lib\Loan\Loanbest($res);
    	$loan_info=$loan->getLoan();
    	//标信息
    	$this->assign('deal',$loan_info);
    	//用户资料
    
    	$this->dusers=D('UsersinfoView')->where('users.id='.$res['user_id'])->find();
    	 
    	//投标列表
    	$load_list= M('loan_load')->where(array('loan_id'=>$id))->field("user_login,user_id,money,create_time,is_auto")->select();
    	$is_faved=false;
    	if(sp_is_user_login()){
    		$is_faved=M('user_favorites')->where(array('uid'=>get_current_userid(),'object_id'=>$loan_info['id']))->count();
    		if($loan_info['deal_status']>=7){
    			//还款列表
    			$this->loan_repay_list=$loan->get_deal_load_list();
    			//债权人人剩余本金
    			foreach($load_list as $k=>$v){
    				$load_list[$k]['remain_money'] = $v['money'] -M('loan_load_repay')->where("user_id={$v['user_id']} AND loan_id={$id}")->sum('self_money');
    				if($load_list[$k]['remain_money'] <=0){
    					$load_list[$k]['remain_money'] = 0;
    					$load_list[$k]['status'] = 1;
    				}
    			}
    			 
    		}
    	}else{
    		$_SESSION['login_http_referer']=__SELF__;
    	}
    	$this->loan_load=$load_list;
    	$this->is_faved=$is_faved;
    	//统计数据
    	//$this->user_statics= $loan->getCount($loan_info['user_id']);
	 	
    	$this->display();
    }
    
    //30天统计平台还款数
    
    public function backTj()
    {
    	$time=time();
    	$where="true_repay_time > $time-30*24*60*60";
    	$res= M('loan_repay')->group('loan_id')->where($where)->select();
    	$data["count"]=count($res);
    	$data["money"]=M('loan_repay')->where($where)->sum('repay_money');
    	$this->success($data);
    }
    
    
   
    
    
    
    
    
       

}
?>