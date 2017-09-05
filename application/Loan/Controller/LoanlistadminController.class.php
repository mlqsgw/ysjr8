<?php 
namespace Loan\Controller;
use Common\Controller\AdminbaseController;

class LoanlistadminController extends AdminbaseController {
    public function index(){    
           /*    [cate_id] => 1
                [deal_status] => 1
                [name] => 贷款名称
                [user_login] => 赵玉 */
        $where=" is_delete=0 and del_type=0 ";
        if(isset($_POST['cate_id']) && $_POST['cate_id']!=0){
            $where.=" and cate_id={$_POST['cate_id']}";
            $this->cate_id=$_POST['cate_id'];            
        }
        if(isset($_POST['deal_status']) && $_POST['deal_status']!=""){
            $where.=" and deal_status={$_POST['deal_status']} ";
            $this->deal_status=$_POST['deal_status'];
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
             
            $page = $this->page($count, 10);     
            $lists = D("LoanView")
            ->where($where)
            ->order("create_time desc")
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();
            //var_dump($lists);exit();     
            $this->assign('lists', $lists);
            $this->assign("Page", $page->show('Admin'));
            
            $this->display();
        
    }
    public function add_two(){
        if(IS_POST){        
            $p=I("post.");      
            //先判断这个用户是不是符合条件
            $result=check_loan($p['cate_id'],$p['user_id']);
            if($result['error']){             
               $this->error("该用户不符合该贷款的资料认证条件");
                
            }else{
                if($p['name']==""){
                    $this->error("标名称不能为空");
                }
                if($p['sub_name']==""){
                    $this->error("简短名称不能为空");
                }            
                if($p['loantype']==""){
                    $this->error("还款方式不能为空");
                }
                $cate_mod=M("loan_cate")->find($p['cate_id']);
                
                //借款金额
                if($p['borrow_amount'] > $cate_mod['amount']){
                                        
                    $this->error("借款金额不能大于{$cate_mod['amount']}");
                }
                //年利率           
                if($p['rate']<C('sys_loans_lowest_apr') ||$p['rate']> C('sys_loans_highest_apr') ){
                    $this->error("贷款利率请在{C('sys_loans_lowest_apr')}到{C('sys_loans_highest_apr')}之间");
                }
               //筹标期限
               if($p['deadline']>$cate_mod['deadline']){
                   $this->error("筹标期限不能大于{$cate_mod['deadline']}");
               }
               if($p['loantype']==""){
                   $this->error("还款类型不能为空");
               }
               //序列号用户要显示的资料
               $p['userdata']=serialize($p['userdata']);
               //创建时间
               $p['create_time']=time();
               $p['deal_status']=0;
               //借款周期
               $cRate='\Common\Lib\Loan\\'.$p['loantype'];
               $p['repay_nper']=$cRate::getNper($p['repay_time']); 
               if($p['repay_nper']<=0){
                   $this->error("借款还款总期数出现错误");
               }              
             // 0 待审核	1审核通过	2审核失败	3用户取消	4流标	5满标待审核		6满标审核失败	7还款中	8逾期中	9已完成
                
               if(!!$id=M("loan")->add($p)){
                   adminLog("添加{$p['user_login']}贷款信息");
                   loanLog("创建标", $id,get_current_admin_id());
                   $this->success("添加成功");
               }else{
                   $this->error("添加失败");
               }
                      
                
            }
            
        
            
            
        }else{         
            $g=I("get.");            
            
            if(empty($g['loan_cate'])){
                $this->error("标类型不能为空");
            }
            if(empty($g['user'])){
                $this->error("用户不能为空");
            }
            $result=check_loan($g['loan_cate'],$g['user']);
            if($result['error']){
                $this->error("用户有没有通过的审核");
            }else{             
                //标分类               
                $loan_cate=M("loan_cate")->find($g['loan_cate']); 
           
                $this->assign("loan_cate",$loan_cate);
                //用户    //标 模型的认证。必要的认证   
                $this->user=M('users')->field("id,user_login,datamark")->find($g['user']); 
                //借款用途          
                $this->loan_type=M("loan_type")->field("id,t_name")->select();
                //  pe($loan_type);             
                
                //担保公司
               $this->loan_agency= M("loan_agency")->where(array("is_effect"=>1))->field("id,name")->select();
               
                $this->display();
            }
        
          
        }
       
    }
    public function add(){      
            //标分类
            $this->loan_cate=M("loan_cate")->field("id,cat_name")->select();    
            $this->display();
      
         
    }
    /*新手标入库*/
    public function NewAdd_two(){
    	if(IS_POST){
    		$p=I("post.");
    		//先判断这个用户是不是符合条件
    		$result=check_loan($p['cate_id'],$p['user_id']);
    		if($result['error']){
    			$this->error("该用户不符合该贷款的资料认证条件");
    
    		}else{
    			if($p['name']==""){
    				$this->error("标名称不能为空");
    			}
    			if($p['sub_name']==""){
    				$this->error("简短名称不能为空");
    			}
    			if($p['loantype']==""){
    				$this->error("还款方式不能为空");
    			}
    			$cate_mod=M("loan_cate")->find($p['cate_id']);
    
    			//借款金额
    			if($p['borrow_amount'] > $cate_mod['amount']){
    
    				$this->error("借款金额不能大于{$cate_mod['amount']}");
    			}
    			//年利率
    			if($p['rate']<C('sys_loans_lowest_apr') ||$p['rate']> C('sys_loans_highest_aprs') ){
    				$this->error("贷款利率请在{C('sys_loans_lowest_apr')}到{C('sys_loans_highest_apr')}之间");
    			}
    			//筹标期限
    			if($p['deadline']>$cate_mod['deadline']){
    				$this->error("筹标期限不能大于{$cate_mod['deadline']}");
    			}
    			if($p['loantype']==""){
    				$this->error("还款类型不能为空");
    			}
    			//序列号用户要显示的资料
    			$p['userdata']=serialize($p['userdata']);
    			//创建时间
    			$p['create_time']=time();
    			$p['deal_status']=0;
    			//借款周期
    			$cRate='\Common\Lib\Loan\\'.$p['loantype'];
    			$p['repay_nper']=$cRate::getNper($p['repay_time']);
    			if($p['repay_nper']<=0){
    				$this->error("借款还款总期数出现错误");
    			}
    			// 0 待审核	1审核通过	2审核失败	3用户取消	4流标	5满标待审核		6满标审核失败	7还款中	8逾期中	9已完成
    			$p['borrow_type']=0;//0为新手标
    			//var_dump($p);
    			if(!!$id=M("loan")->add($p)){
    				adminLog("添加{$p['user_login']}贷款信息");
    				loanLog("创建标", $id,get_current_admin_id());
    				$this->success("添加成功");
    			}else{
    				$this->error("添加失败");
    			}
    
    
    		}
    
    
    
    
    	}else{
    		$g=I("get.");
    
    		if(empty($g['loan_cate'])){
    			$this->error("标类型不能为空");
    		}
    		if(empty($g['user'])){
    			$this->error("用户不能为空");
    		}
    		$result=check_loan($g['loan_cate'],$g['user']);
    		if($result['error']){
    			$this->error("用户有没有通过的审核");
    		}else{
    			//标分类
    			$loan_cate=M("loan_cate")->find($g['loan_cate']);
    			 
    			$this->assign("loan_cate",$loan_cate);
    			//用户    //标 模型的认证。必要的认证
    			$this->user=M('users')->field("id,user_login,datamark")->find($g['user']);
    			//借款用途
    			$this->loan_type=M("loan_type")->field("id,t_name")->select();
    			//  pe($loan_type);
    
    			//担保公司
    			$this->loan_agency= M("loan_agency")->where(array("is_effect"=>1))->field("id,name")->select();
    			 
    			$this->display();
    		}
    
    
    	}
    	 
    }
    /*新手标*/
    public function NewAdd(){
    	$this->loan_cate=M("loan_cate")->where('NewSign=1')->field("id,cat_name")->select();
    	$this->display();
    }
    public function delindex(){
    	/*    [cate_id] => 1
    	 [deal_status] => 1
    	[name] => 贷款名称
    	[user_login] => 赵玉 */
    	$where=" is_delete=0 and del_type=1 ";
    	if(isset($_POST['cate_id']) && $_POST['cate_id']!=0){
    		$where.=" and cate_id={$_POST['cate_id']}";
    		$this->cate_id=$_POST['cate_id'];
    	}
    	if(isset($_POST['deal_status']) && $_POST['deal_status']!=""){
    		$where.=" and deal_status={$_POST['deal_status']} ";
    		$this->deal_status=$_POST['deal_status'];
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
    	 
    	$page = $this->page($count, 10);
    	$lists = D("LoanView")
    	->where($where)
    	->order("create_time desc")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();
    	//var_dump($lists);exit();
    	$this->assign('lists', $lists);
    	$this->assign("Page", $page->show('Admin'));
    
    	$this->display();
    
    }
	function del()
	{	
		//var_dump($_GET);exit();
		if($_GET['del']==1){
			$m=M("loan");
			$r=$m->where('id='.$_GET['id'])->save(array('del_type'=>1));
			if ($r) {
				$this->success("放入回收站 成功！<br/>彻底删除请前往删除列表.");
			}else{
				$this->error("放入回收站 失败！");
			}
		}else{
			$m=M("loan");
			$r=$m->where('id='.$_GET['id'])->delete();
			if($r)
			{
				$this->success("删除成功");
				
			}else{
				$this->error("删除失败");
			}
		}
		
	}
	function restore(){
		//var_dump($_GET);exit();
		$m=M("loan");
		$r=$m->where('id='.$_GET['id'])->save(array('del_type'=>0));
		if ($r) {
			$this->success("还原成功！");
		}else{
			$this->error("还原失败！");
		}
	}
	public function Newcheck_loan(){
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
			$this->success("ok",U("Loan/Loanlistadmin/NewAdd_two",array("loan_cate"=>$p['loan_cate'],"user"=>$p['user'])));
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
            $p=I('post.');
            if($p['name']==""){
                $this->error("标名称不能为空");
            }
            if($p['sub_name']==""){
                $this->error("简短名称不能为空");
            }
            if($p['loantype']==""){
                $this->error("还款方式不能为空");
            }
            $cate_mod=M("loan_cate")->find($p['cate_id']);
            
            //借款金额
            if($p['borrow_amount'] > $cate_mod['amount']){
            
                $this->error("借款金额不能大于{$cate_mod['amount']}");
            }
            //年利率
            if($p['rate']<C('sys_loans_lowest_apr') ||$p['rate']> C('sys_loans_highest_apr') ){
                $this->error("贷款利率请在{C('sys_loans_lowest_apr')}到{C('sys_loans_highest_apr')}之间");
            }
            //筹标期限
            if($p['deadline']>$cate_mod['deadline']){
                $this->error("筹标期限不能大于{$cate_mod['deadline']}");
            }
            if($p['loantype']==""){
                $this->error("还款类型不能为空");
            }
            //序列号用户要显示的资料
            $p['userdata']=serialize($p['userdata']);
            //创建时间
            $p['update_time']=time();
            $p['deal_status']=0;
            //借款周期
            $cRate='\Common\Lib\Loan\\'.$p['loantype'];
            $p['repay_nper']=$cRate::getNper($p['repay_time']);
            if($p['repay_nper']<=0){
                $this->error("借款还款总期数出现错误");
            }
            // 0 待审核	1审核通过	2审核失败	3用户取消	4流标	5满标待审核		6满标审核失败	7还款中	8逾期中	9已完成
            
            if(!!$id=M("loan")->save($p)){
                adminLog("修改标:{$p['id']}贷款信息");
                loanLog("修改标", $id,get_current_admin_id());
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
        }else{
            $id=I('get.loan_id','');
            $loan=M('loan')->find($id);
            if($loan['deal_status']!=0){
                $this->error('只有待审核的标才可以编辑');
            }
            //标分类
            $loan_cate=M("loan_cate")->find($loan['cate_id']);                         
            $this->assign("loan_cate",$loan_cate);            
    
            //借款用途
            $this->loan_type=M("loan_type")->field("id,t_name")->select();
            //  pe($loan_type);
            
            //担保公司
            $this->loan_agency= M("loan_agency")->where(array("is_effect"=>1))->field("id,name")->select();
            //用户    //标 模型的认证。必要的认证
            $this->user=M('users')->field("id,user_login,datamark")->find($loan['user_id']);
            
            $this->loan=$loan;
           
            $this->display();
        }
    }
    //标删除
    public function delete(){
        $id=I('get.loan_id');
      
       if(M('loan')->where(array('id'=>$id))->save(array('is_delete'=>1))){
           $this->success("删除成功");
       }     
    }
    
    //标日志
    public function loanlog(){
        $l_id=I('get.loan_id');
        $count=M('loan_log')->where('l_id='.$l_id)->count();
        if($count){
            $page = $this->page($count, 15);
            $lists= M('loan_log as loan_log')->join('__USERS__ as users on users.id=loan_log.uid')->order('loan_log.id desc')->field('loan_log.*,users.user_login')->where('l_id='.$l_id)->limit($page->firstRow . ',' . $page->listRows)->select();
            $this->assign('lists', $lists);
            $this->assign("Page", $page->show('Admin'));
        }
        $this->display();
    }
    //标列表
    public function loanloadlist(){
        $id=I('get.loan_id');
        $count=M('loan_load')->where('loan_id='.$id)->count();
        if($count){
            $page = $this->page($count, 15);
            $lists= M('loan_load')->where('loan_id='.$id)->limit($page->firstRow . ',' . $page->listRows)->select();
            $this->assign('lists', $lists);
            $this->assign("Page", $page->show('Admin'));
        }
        $this->display();
    }
    //还款记录
    public function repaylist(){
        $id=I('get.loan_id');
        $count=M('loan_repay')->where('loan_id='.$id)->count();
        if($count){
            $page = $this->page($count, 15);
            $lists= M('loan_repay')->where('loan_id='.$id)->limit($page->firstRow . ',' . $page->listRows)->select();
            $this->assign('lists', $lists);
            $this->assign("Page", $page->show('Admin'));
        }
        $this->display();
    }
    
}
?>