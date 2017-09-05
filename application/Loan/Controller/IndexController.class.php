<?php

/**
 * 前台首页
 */
namespace Loan\Controller;
use Common\Controller\HomeBaseController;


class IndexController extends HomeBaseController {

    //首页
	public function index() {
	    $loan=new \Common\Lib\Loan\Loanbest();
	    
	    //更改过期状态
	    //发送还款提醒
	    $loan->syn_deal_status();
	  
	    //投资总
	        $this->loads =number_format(getOneUseIndex("SELECT SUM(money)   FROM __LOAN_LOAD__ ")/10000,2);
	    //总收益
	        $this->make_interest =number_format(M('money')->sum('make_interest')/1000,2);
	   //最新借款列表
	    /*$where=array(
	        'is_delete'=>0,
	        'is_recommend'=>1,    
	    );*/
		$where['deal_status']=array("in","1");//1,0待审核  1,4流标  1,7还款中  1,9已完成
	   $_lists=D('LoanlistsView')
	    ->where($where)
	    ->field()
	    ->order("start_time DESC")
	    ->limit('5')
	    ->select();	 
	    $lists=$loan->deal_with_list($_lists);
	    $this->assign('deal_list', $lists);
		//还款中列表
	    $refundwhere['deal_status']=array("in","7");//1,0待审核  1,4流标  1,7还款中  1,9已完成
	    $refund_lists=D('LoanlistsView')
	    ->where($refundwhere)
	    ->field()
	    ->order("start_time DESC")
	    ->limit('5')
	    ->select();
	    $refundlists=$loan->deal_with_list($refund_lists);
	    $this->assign('refund_list', $refundlists);
	    //以完成列表
	    $accomplishwhere['deal_status']=array("in","9");//1,0待审核  1,4流标  1,7还款中  1,9已完成
	    $accomplish_lists=D('LoanlistsView')
	    ->where($accomplishwhere)
	    ->field()
	    ->order("start_time DESC")
	    ->limit('5')
	    ->select();
	    $rlists=$loan->deal_with_list($accomplish_lists);
	    $this->assign('accomplish_list', $rlists);
	   //输出最新转让
        $twhere['is_delete']=0;
        $twhere['deal_status']=7;
	    $_tlists=D('TransferlistsView')
	    ->where($twhere)
	    ->field()
	    ->order('id DESC')
	    ->limit('5')
	    ->select();
	    $tlists=$loan->deal_with_transfer($_tlists);
	    $this->assign('transfer_list', $tlists);	  
	    //新手投标列表
	    $NewbieWhere=array("deal_status"=>1,'borrow_type'=>0);//deal_status 1招标中,0待审核  1,4流标  1,7还款中  1,9已完成
	    $Newbie_lists=D('LoanlistsView')
	    ->where($NewbieWhere)
	    ->field()
	    ->order("start_time DESC")
	    ->limit('2')
	    ->select();
	    $Newlists=$loan->deal_with_list($Newbie_lists);
	    $wheretime['deal_status'] = array('EQ',1);
	    $wheretime['borrow_type'] = array('EQ',0);
	    $Newbie_total_volume_buy_count=D('LoanlistsView')
	    ->where($wheretime)
	    ->field()
	    ->order("start_time DESC")
	    ->select();
	    foreach ($Newbie_total_volume_buy_count as $k=>$v){
	    	$Newbie['buy_count']+=$v['buy_count'];
	    	$Newbie['total_volume']+=$v['load_money'];
	    }
	    $this->assign('Newbie', $Newbie);
	    $this->assign('Newbie_lists', $Newlists);
	    //文章
	   $this->posts=M("TermRelationships")->alias("a")->join('__POSTS__ as b on a.object_id =b.id')->field('b.id,b.post_title')->where('a.term_id=7')->limit('10')->select();
	  
		//公告
	   $notice_list = M("TermRelationships")->alias("a")->join('__POSTS__ as b on a.object_id =b.id')->field('a.tid,b.post_title')->where('a.term_id=11 and status=1')->order("a.tid desc")->limit('5')->select();
	   $this->assign('notice_list',$notice_list);

	   //投资月排行榜
	  $month_load_top_list = M('loan_load as ld')->join('__USERS__ AS u on u.id=ld.user_id ')->where("ld.create_time>".(time()-60*60*24*30))->group('user_id ')->limit(10)->field('sum(money),u.user_login')->order('sum(money) desc' )->select();
	  $this->assign('month_load_top_list',$month_load_top_list);
	  /*
	  //投资周排行榜
	  $week_load_top_list = M('loan_load as ld')->join('__USERS__ AS u on u.id=ld.user_id ')->where("ld.create_time>".(time()-60*60*24*7))->group('user_id ')->limit(10)->field('sum(money),u.user_login')->order('sum(money) desc' )->select();
	  $this->assign('week_load_top_list',$week_load_top_list);
	  //投资日排行榜
	  $day_load_top_list = M('loan_load as ld')->join('__USERS__ AS u on u.id=ld.user_id ')->where("ld.create_time>".(time()-60*60*24*1))->group('user_id ')->limit(10)->field('sum(money),u.user_login')->order('sum(money) desc' )->select();
	  $this->assign('day_load_top_list',$day_load_top_list);*/
	 	
	
		
		
		$ljgd=$this->articleList(19);
		$hyzx=$this->articleList(20);
		$sybz=$this->articleList(10);
		
		$this->assign("sybz",$sybz);
		$this->assign("gd",$ljgd);
		$this->assign("zx",$hyzx);		
		
			
	    $this->display();
    }
    private function articleList($tid)
	{
		$rs= M("Posts");
		$where['p.post_status'] = array('eq',1);
		$id=intval($tid);
		$tr=M("term_relationships");
		$where["b.term_id"]=$id;
		$join = "".C('DB_PREFIX').'term_relationships as b on p.id =b.object_id';
		$article=M("Posts")->alias("p")->join($join)->order("id desc")->where($where)->limit(6)->select();
		return $article;

		
		
	
	}
    /**
     * 条件地址的生成
     */
    private function where($arr,$pare,$cur,$default=null,$who='id'){
        unset($pare[$cur]); 
        if($default){                        
            $default['url']=UU('loan/index/'.ACTION_NAME,$pare);
            $a[]=$default;
        } 
        foreach ($arr as $k=>$v){
            $pare[$cur]=$v[$who];
            $v['url']=UU('loan/index/'.ACTION_NAME,$pare);
            $a[]=$v;
        }  
        return $a;
    }
    //标的列表
    public function lists(){
        //page_title
        //keywords
        //dest
        
        //url生成  
        $where['is_delete']=0;
        $get=I('get.');
       
        //标类型
        $cates=empty($get['loan_cate'])?'0':$get['loan_cate'];  
        if(!empty($get['loan_cate'])){         
            $where['cate_id']=$get['loan_cate'];           
        }
        $this->loan_cate_c=$cates;
        
       //借款期限
        $months_type=empty($get['months_type'])?0:$get['months_type'];
        if(!empty($get['months_type']) && $get['months_type']!=0 ){
            switch ($get['months_type']){
                case 1:
                    $where['repay_time']=array('ELT',3);
                    break;
                case 2:
                    $where['_string']='(repay_time >3 and repay_time <=6)';
                    break;
                case 3:
                    $where['_string']='(repay_time >6 and repay_time <=9)';
                   break;
                case 4:
                    $where['_string']='(repay_time >9 and repay_time <=12)';
                   break;
                case 5:
                    $where['repay_time']=array('GT',12);
                   break;
            }
        }        
        $this->months_type_c=$months_type;
     
        //标状态        
        $deal_status=isset($get['deal_status'])?$get['deal_status']:'-1';
        if(isset($get['deal_status']) && $get['deal_status']!=-1){
            $where['deal_status']=$get['deal_status'];
        }
        $this->deal_status_c=$deal_status;        
        
        
        //等级
        $user_level=isset($get['user_level'])?$get['user_level']:'0';
        if(isset($get['user_level']) && $get['user_level']!=0){
            $level_config=get_user_level_config();       
           $min=$level_config[$get['user_level']]['min'];
           $where['score']=array('EGT',$min);          
        }
        $this->user_level_c=$user_level;
        //年利率  
        $year_rate=isset($get['year_rate'])?$get['year_rate']:'0';
        if(isset($get['year_rate']) && $get['year_rate']!=0){
            switch ($get['year_rate']){
                case 1:
                    $where['rate']=array('EGT',10);
                    break;
                case 2:
                    $where['rate']=array('EGT',15);
                    break;
                case 3:
                $where['rate']=array('EGT',18);
                 break;
               case 4:
                 $where['rate']=array('EGT',20);
                break;
            }
           
        }   
        $this->year_rate_c=$year_rate;
        
        //剩余时间
        $lefttime=isset($get['lefttime'])?$get['lefttime']:'0';
        if(isset($get['lefttime']) && $get['lefttime']>0){
          
            switch ($get['lefttime']){
                case 1:                   
                    $where['enddate']=array('lt', time()+24*60*60);
                    break;
                case 2:
                    $where['enddate']=array('lt', time()+24*60*60*3);
                    break;                   
                case 3:
                    $where['enddate']=array('lt', time()+24*60*60*6);
                    break;
                case 4:
                    $where['enddate']=array('lt', time()+24*60*60*9);
                 break;
                case 5:
                    $where['enddate']=array('lt', time()+24*60*60*12);
                    break;
            }
        }
        $this->lefttime_c=$lefttime;
      
        
        $pare=array(
            'loan_cate'=>$cates,
            'deal_status'=>$deal_status,
            'months_type'=>$months_type,
            'user_level'=>$user_level,
            'year_rate'=>$year_rate,
            'lefttime'=>$lefttime
        );        
        //标类型
        $cate_list=M('loan_cate')->field('cat_name,id')->select();         
        $this->cate_list=$this->where($cate_list,$pare,'loan_cate',array('cat_name'=>'不限','id'=>0)); 
        
        //借款期限
        $months_type=array(array('id'=>0,'name'=>'不限'),array('id'=>1,'name'=>'3个月以下'),array('id'=>2,'name'=>'3-6 个月'),array('id'=>3,'name'=>'6-9 个月'),array('id'=>4,'name'=>'9-12 个月'),array('id'=>5,'name'=>'12 个月以上'));
        $this->months_type=$this->where($months_type, $pare, 'months_type');
        
        //借款状态 // 0 待审核1审核通过2审核失败3用户取消4流标5满标待审核6满标审核失败	7还款中8逾期中9已完成
        $deal_status=array(array('id'=>1,'name'=>'招标中'),array('id'=>5,'name'=>'满标待审核'),array('id'=>7,'name'=>'还款中'), array('id'=>9,'name'=>'已完成'));
		/*$deal_status=array(array('id'=>0,'name'=>'待审核'),array('id'=>1,'name'=>'招标中'),array('id'=>4,'name'=>'流标'),array('id'=>5,'name'=>'等待复审'),array('id'=>7,'name'=>'还款中'), array('id'=>9,'name'=>'已完成'));*/

        $this->deal_status=$this->where($deal_status,$pare,'deal_status',array('id'=>'-1','name'=>'不限'));
        
      //信用等级
      $level=get_user_level_config();
      $this->user_level=$this->where($level,$pare,'user_level',array('id'=>'0','name'=>'不限'));
      //利率
      $year_rate=array(array('id'=>0,'name'=>'不限'),array('id'=>1,'name'=>'10%以上'),array('id'=>2,'name'=>'15%以上'),array('id'=>3,'name'=>'18%以上'),array('id'=>4,'name'=>'20%以上'));
      $this->year_rate=$this->where($year_rate,$pare,'year_rate');
     
      //剩余时间
      $lefttime=array(array('id'=>0,'name'=>'不限'),array('id'=>1,'name'=>'1天以内'),array('id'=>2,'name'=>'3天以内'),array('id'=>3,'name'=>'6天以内'),array('id'=>4,'name'=>'9天以内'),array('id'=>5,'name'=>'12天以内'));
      $this->lefttime=$this->where($lefttime,$pare,'lefttime');
      if ($_GET['deal_status']<0) {
      	$_GET['deal_status']='1,7,9';
      }
	  $where['deal_status']=array("in",$_GET['deal_status']?$_GET['deal_status']:'1,7,9');
      $count=D('LoanlistsView')->where($where)->count();
	 
        if($count>0){
            $loan=new \Common\Lib\Loan\Loanbest();
            $page = $this->page($count, 6);
            //   select *,start_time as last_time,(load_money/borrow_amount*100) as progress_point,(enddate - 1422296959) as remain_time from ac_loan where is_effect = 1 and is_delete = 0
            $_lists=D('LoanlistsView')
            ->where($where)
            ->field()
            ->order("id desc")
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();                    
            $lists=$loan->deal_with_list($_lists);  
                           
            $this->assign('deal_list', $lists);  
			
            $this->assign("Page", $page->show('Admin'));
        }   

        /*seo 部分*/
        $this->assign('site_seo_title','借款投资列表');    
     
        $this->display();
    }
    //债权转让
    public function transfer(){
    
        //url生成  
        $where['is_delete']=0;
        $get=I('get.');
       
        //标类型
        $cates=empty($get['loan_cate'])?'0':$get['loan_cate'];  
        if(!empty($get['loan_cate'])){         
            $where['cate_id']=$get['loan_cate'];           
        }
        $this->loan_cate_c=$cates;
        
       //借款期限
        $months_type=empty($get['months_type'])?0:$get['months_type'];
        if(!empty($get['months_type']) && $get['months_type']!=0 ){
            switch ($get['months_type']){
                case 1:
                    $where['repay_time']=array('ELT',3);
                    break;
                case 2:
                    $where['_string']='(repay_time >3 and repay_time <=6)';
                    break;
                case 3:
                    $where['_string']='(repay_time >6 and repay_time <=9)';
                   break;
                case 4:
                    $where['_string']='(repay_time >9 and repay_time <=12)';
                   break;
                case 5:
                    $where['repay_time']=array('GT',12);
                   break;
            }
        }        
        $this->months_type_c=$months_type;
  
        
        //等级
        $user_level=isset($get['user_level'])?$get['user_level']:'0';
        if(isset($get['user_level']) && $get['user_level']!=0){
            $level_config=get_user_level_config();       
           $min=$level_config[$get['user_level']]['min'];
           $where['score']=array('EGT',$min);          
        }
        $this->user_level_c=$user_level;
        //年利率  
        $year_rate=isset($get['year_rate'])?$get['year_rate']:'0';
        if(isset($get['year_rate']) && $get['year_rate']!=0){
            switch ($get['year_rate']){
                case 1:
                    $where['rate']=array('EGT',10);
                    break;
                case 2:
                    $where['rate']=array('EGT',15);
                    break;
                case 3:
                $where['rate']=array('EGT',18);
                 break;
               case 4:
                 $where['rate']=array('EGT',20);
                break;
            }
           
        }   
        $this->year_rate_c=$year_rate;
        
     
      
        
        $pare=array(
            'loan_cate'=>$cates,           
            'months_type'=>$months_type,
            'user_level'=>$user_level,
            'year_rate'=>$year_rate,           
        );        
        //标类型
        $cate_list=M('loan_cate')->field('cat_name,id')->select();         
        $this->cate_list=$this->where($cate_list,$pare,'loan_cate',array('cat_name'=>'不限','id'=>0)); 
        
        //借款期限
        $months_type=array(array('id'=>0,'name'=>'不限'),array('id'=>1,'name'=>'3个月以下'),array('id'=>2,'name'=>'3-6 个月'),array('id'=>3,'name'=>'6-9 个月'),array('id'=>4,'name'=>'9-12 个月'),array('id'=>5,'name'=>'12 个月以上'));
        $this->months_type=$this->where($months_type, $pare, 'months_type');
        
        //借款状态 // 0 待审核1审核通过2审核失败3用户取消4流标5满标待审核6满标审核失败	7还款中8逾期中9已完成
        $deal_status=array(array('id'=>0,'name'=>'待审核'),array('id'=>1,'name'=>'招标中'),array('id'=>4,'name'=>'流标'),array('id'=>5,'name'=>'等待复审'),array('id'=>7,'name'=>'还款中'), array('id'=>9,'name'=>'已完成'));
        $this->deal_status=$this->where($deal_status, $pare,'deal_status',array('id'=>'-1','name'=>'不限'));
        
      //信用等级
      $level=get_user_level_config();
      $this->user_level=$this->where($level,$pare,'user_level',array('id'=>'0','name'=>'不限'));
      //利率
      $year_rate=array(array('id'=>0,'name'=>'不限'),array('id'=>1,'name'=>'10%以上'),array('id'=>2,'name'=>'15%以上'),array('id'=>3,'name'=>'18%以上'),array('id'=>4,'name'=>'20%以上'));
      $this->year_rate=$this->where($year_rate,$pare,'year_rate');
      
      $count=D('TransferlistsView')->where($where)->count();    
        if($count>0){      
     
            $loan=new \Common\Lib\Loan\Loanbest();
            $page = $this->page($count, 20);
            //   select *,start_time as last_time,(load_money/borrow_amount*100) as progress_point,(enddate - 1422296959) as remain_time from ac_loan where is_effect = 1 and is_delete = 0
            $_lists=D('TransferlistsView')
            ->where($where)
            ->field()
            ->order('id DESC')
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();  
            $lists=$loan->deal_with_transfer($_lists);          
            $this->assign('transfer_list', $lists);
            $this->assign("Page", $page->show('Admin'));
        }
        
        /*seo 部分*/
        $this->assign('site_seo_title','股权转让列表');
      
        
        $this->display();    
    }
    //转让详情页
    public function t_details(){
  
        $id = I('id');
        
        $deal_id = M('loan_load_transfer')->where(array('id'=>$id))->getField('loan_id');

        
        if($deal_id==0){
            $this->error( "不存在的债权");         
        }
        $loan= D('LoanfullView')->find($deal_id);
        $class=new \Common\Lib\Loan\Loanbest($loan);        
        $deal =$class->getLoan(); 
        
 
        //预期情况
        $deal['yq_count'] =M('load_repay')->where(array('deal_id'=>$deal_id,'status'=>array('gt',2)))->count();

        $this->assign('deal',$deal);
      
        
        //借款列表       
        $load_list= M('loan_load')->where(array('loan_id'=>$deal_id))->field("user_login,money,create_time,is_auto")->select();
 
           
        //得到当前用户的钱 是可用金额哦
        $available_funds=M('money')->where(array('uid'=>get_current_userid()))->getField("available_funds");
        $this->can_use_quota=$available_funds;
        
   
        $deal['is_faved'] = 0;
        $user_info=sp_get_current_user();
         if($user_info){
            if($deal['deal_status'] >=7){
                //还款列表
                $loan_repay_list = $class->get_deal_load_list();
                $this->assign("loan_repay_list",$loan_repay_list);
                foreach($load_list as $k=>$v){                  //"SELECT sum(self_money) FROM ".DB_PREFIX."deal_load_repay WHERE user_id=".$v['user_id']." AND deal_id=".$deal_id
                    $load_list[$k]['remain_money'] = $v['money'] - M('loan_load_repay')->where(array('user_id'=>$v['user_id'],'loan_id'=>$deal_id))->sum('self_money');
                    if($load_list[$k]['remain_money'] <=0){
                        $load_list[$k]['remain_money'] = 0;
                        $load_list[$k]['status'] = 1;
                    }
                }
            }     
         }else{
             $_SESSION['login_http_referer']=__SELF__;
         }
   
       
         $this->assign('user_info',$user_info);       
         $this->assign("loan_load",$load_list);
  
        
        //==================================================
        $where=array(
            'loan_load_transfer.id'=>$id,
            'Loan.deal_status'=>array('egt',7),          
            'Loan.is_delete'=>0 , 
            'Loan.publish_wait'=>0            
        );
        $transfer=D('TransferlistsView')->where($where)->find();         
        $transfer = $class->gettransfer($transfer);
		$transfer["transfer_amount"]=substr($transfer["transfer_amount"],0,strlen($transfer["transfer_amount"])-2);
      
        $this->assign('transfer',$transfer);
       
        
        /*seo 部分*/
        $this->assign('site_seo_title',$transfer['name'].'股权转让详情');        
        $this->display();
    }
    //处理转让购买
    public function dotrans(){
        if(!sp_is_user_login()){
            $this->error('请先登录',UU('user/login/index'));
        }    
        
        $paypassword = I('post.paypassword','');
        $id = I('get.id','');
        if($paypassword==''){
            $this->error('密码不能为空');
        }
        if($id==''){
            $this->error('转让ID不能为空');
        }    
        $class=new \Common\Lib\Loan\Loanbest();     
        $status =$class->dotrans($id,$paypassword); 
      
        	
        if($status['status'] == 1){
           $this->success($status['show_err']);
           
        }else{
          $this->error($status['show_err']);
        }
    }
    public function send_msg(){
       $id=I('get.user_id','');     
       if($id!=''){
           $this->id=$id;
           $this->user=M('users')->where(array('id'=>$id))->getField('user_login');
           
           $this->display();
       }
    }
    public function send_pm(){
  
        $p=I('post.');
        if(sp_is_user_login()){
            if(sendmessage($p['user_name'], '站内信', $p['content'],get_current_userid(),11)){
                $this->success("发送成功");
            }else{
                $this->error("发送失败");
            }
        }else{
            $this->error('请登录后在发送消息');
        }
    }
    
    //贷款详情页
    public function deal(){ 
        //得到贷款ID  
       $id=I("get.id");
       $res=D('LoanfullView')->where(array('is_delete'=>0,'id'=>$id))->find();   
     
      if(!$res){
          $this->error("没有符合要求的标");
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
       $this->user_statics= $loan->getCount($loan_info['user_id']);
       
       /*seo 部分*/
       $this->assign('site_seo_title',$loan_info['name'].'借款详情');
		/*用户图片信息*/
    	$user = M("users as u");
        $list=$user->join("LEFT JOIN ac_user_images_info as i on u.id=i.uid")->field("i.uid,i.images_name")->where("i.uid=".$res['user_id'])->order("arrange asc")->select();
		//echo $id;
		//var_dump($list);
    	$this->assign("list",$list);
       
        $this->display();
    }
    //投标页面
    public function bid(){             
       $payment_pass=$_SESSION['user']['payment_pass'];
   
        if(IS_AJAX){
            //判断登录
            if(!sp_is_user_login()){
                $_SESSION['login_http_referer']=__SELF__;
                $this->error("请登录后再投标",U("User/Login/index"));
            }
            $p=I('post.');
            if($p['bid_paypassword']==""){
                $this->error("请输入支付密码");
            }
            if(sp_password($p['bid_paypassword'])!=$payment_pass){
                $this->error("支付密码错误");
            }
            $loan_id=$p['id'];
            $res=D('LoanfullView')->where(array('is_delete'=>0,'deal_status'=>1,'id'=>$loan_id))->find();
            
            if(!$res){
                $this->error("您不能投这个标");
            }
            //先做简单判断
            $this->checkLoan($res);
         
            //引用类      
            $loan_class=new \Common\Lib\Loan\Loanbest($res);                     
            $state=$loan_class->bid($p['bid_money']);                
            if($state['error']){
                $this->error($state['info']);
            }else{
                //标日志
                loanLog('用户投标,金额:'.$p['bid_money'], $p['id']);
                //用户日志
                userLog('用户投标,标ID:'.$p['id'].',金额:'.$p['bid_money']);
                $this->success($state['info'],UU('Loan/index/deal',array('id'=>$loan_id)));
            }
          
        }else{             
            //判断登录
            if(!sp_is_user_login()){
                $_SESSION['login_http_referer']=__SELF__;
                $this->error("请登录后再投标",U("User/Login/index"));
            }  
            if($payment_pass==""){
                $this->error("请先设置支付密码后再投标",U('User/Myaccount/paypassword'));
            }       
            $loan_id=I('get.loan_id');
            $res=D('LoanfullView')->where(array('is_delete'=>0,'deal_status'=>1,'id'=>$loan_id))->find();
            
            if(!$res){
                $this->error("您不能投这个标");
            }
            //先判断
            $this->checkLoan($res);            
           
            //引用类      
            $loan_class=new \Common\Lib\Loan\Loanbest($res);
            $loan=$loan_class->getLoan();           
            //得到当前用户的钱 是可用金额哦
            $available_funds=M('money')->where(array('uid'=>get_current_userid()))->getField("available_funds");
            $this->available_funds=format_price($available_funds);
            $this->assign('loan',$loan);   
            /*seo 部分*/
            $this->assign('site_seo_title',$loan['name'].'投标');
          
           
            $this->display();
        }
       
    }
    
    private function checkLoan($res){ 
        
        if($res['user_id']==get_current_userid()){
            $this->error("不能投自己发布的标！");
        }       
        //不等于1 不再 投标期内
        if($res['deal_status'] !=1){
            $this->error("您不能投这个标");
        }
        //判断是否已经投资满额
        if($res['borrow_amount']==$res['load_money']){
            $this->error("你要投资的标已经筹款结束");
        }      
        //判断是否已经过期
        if($res['enddate']<time()){
            $this->error("你要投资的标已经筹款结束");
        }    
        //判断是否还没有开始
        if($res['start_time']>time()){
            $this->error("你要投资的标还没有开始");
        }    
       
    }
    
    
    
    
    
    
    
    
    //新手贷款详情页
    public function NewbieDeal(){
    	//得到贷款ID
    	$id=I("get.id");
    	$res=D('LoanfullView')->where(array('is_delete'=>0,'id'=>$id))->find();
    	 
    	if(!$res){
    		$this->error("没有符合要求的标");
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
    	$this->user_statics= $loan->getCount($loan_info['user_id']);
    	 
    	/*seo 部分*/
    	$this->assign('site_seo_title',$loan_info['name'].'借款详情');
    	/*用户图片信息*/
    	$user = M("users as u");
    	$list=$user->join("LEFT JOIN ac_user_images_info as i on u.id=i.uid")->field("i.uid,i.images_name")->where("i.uid=".$res['user_id'])->order("arrange asc")->select();
    	//echo $id;
    	//var_dump($list);
    	$this->assign("list",$list);
    	 
    	$this->display();
    }
    //新手投标页面
    public function NewbieBid(){
    	$Muser=M('users');
    	$payment_pass=$_SESSION['user']['payment_pass'];
    	$uid=$_SESSION['user']['id'];
    	$userdata=$Muser->where(array('id'=>$uid))->find();
    	//var_dump($userdata["invest_Newbie"]);
    	//var_dump($_SESSION['user']);
    	if(IS_AJAX){
    		//判断登录
    		if(!sp_is_user_login()){
    			$_SESSION['login_http_referer']=__SELF__;
    			$this->error("请登录后再投标",U("User/Login/index"));
    		}
    		if($userdata["invest_Newbie"]!=0){
    			$this->error('您已经投过新手标，新手标只能投一次。');
    		}
    		$p=I('post.');
    		if($p['bid_paypassword']==""){
    			$this->error("请输入支付密码");
    		}
    		if(sp_password($p['bid_paypassword'])!=$payment_pass){
    			$this->error("支付密码错误");
    		}
    		$loan_id=$p['id'];
    		$res=D('LoanfullView')->where(array('is_delete'=>0,'deal_status'=>1,'id'=>$loan_id))->find();
    		
    		if(!$res){
    			$this->error("您不能投这个标");
    		}
    		//先做简单判断
    		$this->checkLoan($res);
    		//引用类
    		$loan_class=new \Common\Lib\Loan\Loanbest($res);
    		$state=$loan_class->bid($p['bid_money']);
    		if($state['error']){
    			$this->error($state['info']);
    		}else{
    			//标日志
    			loanLog('用户投标,金额:'.$p['bid_money'], $p['id']);
    			//用户日志
    			userLog('用户投标,标ID:'.$p['id'].',金额:'.$p['bid_money']);
    			$Muser->where(array('id'=>$uid))->save(array('invest_Newbie'=>1));
    			$this->success($state['info'],UU('Loan/index/NewbieDeal',array('id'=>$loan_id)));
    		}
    
    	}else{
    		//判断登录
    		if(!sp_is_user_login()){
    			$_SESSION['login_http_referer']=__SELF__;
    			$this->error("请登录后再投标",U("User/Login/index"));
    		}
    		if($payment_pass==""){
    			$this->error("请先设置支付密码后再投标",U('User/Myaccount/paypassword'));
    		}
    		$loan_id=I('get.loan_id');
    		$res=D('LoanfullView')->where(array('is_delete'=>0,'deal_status'=>1,'id'=>$loan_id))->find();
    
    		if(!$res){
    			$this->error("您不能投这个标");
    		}
    		//先判断
    		$this->checkLoan($res);
    		 
    		//引用类
    		$loan_class=new \Common\Lib\Loan\Loanbest($res);
    		$loan=$loan_class->getLoan();
    		//得到当前用户的钱 是可用金额哦
    		$available_funds=M('money')->where(array('uid'=>get_current_userid()))->getField("available_funds");
    		$this->available_funds=format_price($available_funds);
    		$this->assign('loan',$loan);
    		/*seo 部分*/
    		$this->assign('site_seo_title',$loan['name'].'投标');
    
    		 
    		$this->display();
    	}
    	 
    }

}
?>
