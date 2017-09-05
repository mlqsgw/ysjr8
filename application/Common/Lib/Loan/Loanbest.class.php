<?php 

namespace Common\Lib\Loan;
class Loanbest{
   public $loan;
   public function __construct($loan=null){
     $this->loan=$loan;
   }
   //得到一个标的详细信息
   public function getLoan($deal=null){
     //先同步下贷款状态吗
     if($deal==null){
         $deal= $this->loan;
     }    
     $deal['is_wait'] = 0;
     //剩余时间
     $time=time();
     if($deal['start_time']>$time){
         $deal['remain_time'] = $deal['start_time'] - $time;
         $deal['is_wait']=1;
     }else{
         $deal['remain_time'] = $deal['enddate'] - $time;          
     }  
     //担保方
     if($deal['agency_id']>0){
         $deal['agency_name']=M("loan_agency")->where(array("id"=>$deal['agency_id']))->getField("short_name");
     }
     //价格格式化  
     $deal['borrow_amount_format']=format_price($deal['borrow_amount']/10000).'万';
     //格式化 贷款利率
     $deal['rate_foramt_w'] = number_format($deal['rate'],2)."%";     
     //计算利息本息还款金额  三个参数  (贷款金额,月利率,贷款时间); 不是月换多少 是 总共多少     
     $cRate='\Common\Lib\Loan\\'.$deal['loantype'];     
     //$deal['rate_money']=$cRate::countRate($deal['borrow_amount'],$deal['rate']/12/100,$deal['repay_time']);
     //总利息
     $deal['rate_count']=$cRate::countRate($deal['borrow_amount'],$deal['rate']/12/100,$deal['repay_time']);
     $deal['rate_money_format']=format_price($deal['rate_count']);
     
     //月管理费
     $deal['month_manage_money'] = $deal['borrow_amount']*$cRate::getNperManage(C('sys_borrow_manage_fee'))/100;     
     $deal['month_manage_money_format'] = format_price($deal['month_manage_money']); 
     //全部管理费    
     $deal['all_manage_money'] = $deal['month_manage_money'] * $deal["repay_nper"];     
     //真正的月还款 等于  月还款+管理费   现在不知道的第几期怎么知道 月还款多少那  ???
    // $deal['true_month_repay_money'] = $deal['month_repay_money'] + $deal['month_manage_money'];
       
      //还需多少钱
      $deal['need_money'] = format_price($deal['borrow_amount'] - $deal['load_money']);
      //百分比
      $deal['progress_point'] = $deal['load_money']/$deal['borrow_amount']*100;
     
  

      //投标剩余时间
      if($deal['deal_status'] <> 1 || $deal['enddate'] <= $time){
          $deal['remain_time_format'] = "0天0时0分";
      }
      else{
          $deal['remain_time_format'] = remain_time($deal['enddate']-$time);
      }
   
      //判断流标
      if($deal['deal_status']==1 && $deal['enddate'] <= $time)  {
          $deal['deal_status']=4;
      }  
 
       
      //还款的 相关配置
      if($deal['deal_status']>=7){
          //下个月的还款日期  
          if($deal["next_repay_time"]==0){
          $deal["next_repay_time"] =$cRate::next_replay_month($deal['repay_start_time'],0,$deal['repay_time']);
          }
          //总的必须还多少本息
          $deal['remain_repay_money'] = $deal['borrow_amount'] + $deal['rate_count'];      
          //还有多少需要还   这里和数据库的  $deal['repay_money']已经换了多少钱相比的 所以没有加管理费哦
          $deal['need_remain_repay_money'] = $deal['remain_repay_money'] - $deal['repay_money'];
          //还款进度条
          $deal['repay_progress_point'] =  $deal['repay_money']/$deal['remain_repay_money']*100;          
          //最后一期还款 金额
         //  $last_month_repay_money =$cRate::getMonthRepayMoney($deal['borrow_amount'],$deal['rate']/12/100,$deal['repay_time'],$deal['repay_time']);
         // $deal['last_month_repay_money']=$last_month_repay_money['yueLiXi']+$last_month_repay_money['yueBenJin'];
          //下个月的还款
          $month_repay_money=$cRate::getMonthRepayMoney($deal['borrow_amount'],$deal['rate']/12/100,$deal['repay_time'],$deal['repay_count']+1);
          $deal['month_repay_money']=$month_repay_money['yueLiXi']+$month_repay_money['yueBenJin'];
          //最后的还款日期
          $y=date("Y",$deal['repay_start_time']);
          $m=date("m",$deal['repay_start_time']);
          $d=date("d",$deal['repay_start_time']);
           
          $y = $y + intval(($m+$deal['repay_time'])/12);
          $m = ($m+$deal['repay_time'])%12;
          
          $deal["end_repay_time"] = strtotime($y."-".$m."-".$d);
          if(date("Ymd",$deal["end_repay_time"]) < date("Ymd",$time)){
              $deal['exceed_the_time'] = true;
          }
          //罚息
          $is_check_impose = true;
          
          if(($deal["next_repay_time"] + 23*3600 + 59*60 + 59) - $time <0 && $is_check_impose){
              //晚多少天
              $time_span = strtotime(date("Y-m-d",$time));
              $next_time_span = strtotime(date("Y-m-d",$deal['next_repay_time']));
              $day  = ceil(($time_span-$next_time_span)/24/3600);
               
              $impose_fee = trim(C('sys_penaltyint'));
              $manage_impose_fee = trim(C('sys_overdue'));
              //判断是否严重逾期
              if($day >= 31){
                  $impose_fee = trim(C('sys_penaltyints'));
                  $manage_impose_fee = trim(C('sys_overdues'));
              }
              //罚息     //这个地方需要填写期数    
              $deal['impose_money'] = $deal['month_repay_money']*$impose_fee*$day/100;
              //罚管理费
              $deal['manage_impose_money'] = $deal['month_repay_money']*$manage_impose_fee*$day/100;
          
              $deal['impose_money'] += $deal['manage_impose_money'];
          }
      } 
  
      $durl = UU('Loan/index/deal',array("id"=>$deal['id']),true,true);
      
      $deal['share_url'] = $durl; 
      $deal['url'] = $durl;
      
     return $deal;
   }  
    //投标
   public function bid($bid_money){
       $uid=get_current_userid();
       $money_mod=M('money');
       $available_funds=$money_mod->where(array('uid'=>$uid))->getField("available_funds");
        $error=array();
        //判断帐号余额
       if($available_funds<$bid_money){
           $error['error']=true;
           $error['info']="帐号余额不足";
           return $error;
       }
       $loan=$this->getLoan();      
       //判断金额是否正确
       $sys_tenderMultiplicand=C('sys_tenderMultiplicand');
       if($bid_money=="" || !is_numeric($bid_money) || ($sys_tenderMultiplicand < 0 && $bid_money%$sys_tenderMultiplicand!=0) ||$bid_money<$loan['min_loan_money'] || ($loan['max_loan_money'] > 0 && $bid_money >$loan['max_loan_money']) ){
           $error['error']=true;
           $error['info']="投标金额不正确";
           return $error;
       }     
       //判断投资的金额是否大于待借的金额    
       if($bid_money>$loan['borrow_amount']-$loan['load_money']){
           $error['error']=true;
           $error['info']="投标金额不能大于剩余金额";
           return $error;
       }  
           //添加投资的借款信息
           $data=array(
               'loan_id'=>$loan['id'],
               'user_id'=>$uid,
               'user_login'=>$_SESSION['user']['user_login'],
               'money'=>$bid_money,
               'create_time'=>time(),
               'is_repay'=>0,
               'is_rebate'=>0,
               'is_auto'=>0
           );
           if(M('loan_load')->add($data)){
               
               //更改资金记录  冻结资金               
               $ddata=array(                 
                   "available_funds"=>array('exp',"available_funds-$bid_money"),//可用资金-投标额度
                   "freeze_funds"=>array('exp',"freeze_funds+$bid_money"),//冻结资金+投标额度
               ); 
               if($money_mod->where(array('uid'=>$uid))->save($ddata)){               
                  if(!moneyLog($uid, '-'.$bid_money,'编号ID'.$loan['id'].'的投标,冻结资金:'.$bid_money, 2)){
                      $error['error']=true;
                      $error['info']="用户资金记录写入失败!";                    
                      return $error;
                  }
                   
               }else{                   
                   moneyErrLog($uid.'对编号'.$loan['id'].'的投标支付失败,钱并没有冻结成功', $uid);
                   
                   $error['error']=true;
                   $error['info']="冻结资金失败!";
                   return $error;
                 
               }               
               //更新借款的信息
               $ldata=array(
                   'buy_count'=>array('exp',"buy_count+1"),
                   'load_money'=>array('exp',"load_money+$bid_money")
               );
               
                if(M('loan')->where(array('id'=>$loan['id']))->save($ldata)){
                    //判断是否一满标
                    if($loan['load_money']+$bid_money==$loan['borrow_amount']){
                        //修改标当前的状态
                        $sdata=array(
                            'deal_status'=>5,//满标待审核
                            'success_time'=>time(),
                            'is_send_success_msg'=>1
                        );
                       if(M('loan')->where(array('id'=>$loan['id']))->save($sdata) && $loan['is_send_success_msg']==0){
                           //发布满标通知   is_send_success_msg
                           $param=array("username"=>$loan['user_login'],"loanname"=>$loan['sub_name'],"time"=>date('Y-m-d H:i:s'),"url"=>$loan['url']);
                           remind(7,$loan['user_id'],$param);                           
                       }
                       loanLog("用户{$_SESSION['user']['user_login']}进行投标致使满标",$loan['id'],$uid);
                      
                    }             
                  
                    //判断是投标金额否 超过一半了    配置是否开启       是否已通知过     当前是否超过了一半
                    if(C('sys_loadThanHalf') && $loan['is_send_half_msg']==0 && ($loan['load_money']+$bid_money)>($loan['borrow_amount']/2)){

                        //发送过半通知   
                       $param=array("username"=>$loan['user_login'],"loanname"=>$loan['sub_name'],"time"=>date('Y-m-d H:i:s'),"url"=>$loan['url']);
                      if(remind(6,$loan['user_id'],$param)){
                          //更改发送过半的状态                        
                          $sdata=array(
                              'send_half_msg_time'=>time(),
                              'is_send_half_msg'=>1
                          );
                          M('loan')->where(array('id'=>$loan['id']))->save($sdata);
                      }
                      loanLog("用户{$_SESSION['user']['user_login']}进行投标致使招标金额过半",$loan['id'],$uid);
                    }
                   
                
                    
                }else{
                    $error['error']=true;
                    $error['info']="更新标信息失败";
                    return $error;
                }
               
           }
           
           $error['error']=false;
           $error['info']="投标成功";
           return $error;
   }
   /**
    * 通过复审  并放款
    */
   public function pass(){
       $loan=$this->loan;
       $loan_id=$loan['id'];
      $loan_load=M('loan_load')->where(array('loan_id'=>$loan_id))->select();
      $cRate='\Common\Lib\Loan\\'.$loan['loantype'];
      /**
       *    [id] => 18
            [loan_id] => 7
            [user_id] => 7
            [user_login] => ac371
            [money] => 5000.00
            [create_time] => 1422085241
            [is_repay] => 0
            [is_rebate] => 0
            [is_auto] => 0
       */
        $money_mod=M('money');
        $err=false;
        //开启事务
       $money_mod->startTrans();
       //从用户帐号扣款
        foreach ($loan_load as $v){
            //代收利息
            $stay_interest=$cRate::countRate($v['money'],$loan['rate']/100/12,$loan['repay_time']);
            $mdata=array(
                'total_money'=>array('exp',"total_money-{$v['money']}"),//总钱数减去 投标的钱数
                'freeze_funds'=>array('exp',"freeze_funds-{$v['money']}"),//冻结资金-投标额度
                'due_in'=>array('exp',"due_in+{$v['money']}"),//代收资金
                'stay_interest'=>array('exp',"stay_interest+{$stay_interest}")//待收利息
            );  
           if($money_mod->where(array('uid'=>$v['user_id']))->save($mdata)){
               //更新用户日志
               moneyLog($v['user_id'], '-'.$v['money'], '支付标号id:'.$v['loan_id'].'的投标资金'.$v['money'], 3);
                
           }else{
               $err=true;
               moneyErrLog('贷款标id:'.$loan_id.'减去用户帐号冻结资金时出错,用户'.$v['user_id'].'的资金并没有成功减去', get_current_admin_id());
                
           }          
        }
        if($err){         
            $error=array(
                'state'=>true,
                'info'=>'贷款标id:'.$loan_id.'减去用户帐号冻结资金时出错,用户资金并没有成功减去'
            );
            return $error;
        }
  
      //开始放款给用户
      $money_mod->startTrans();

      //待还金额=本金+利息
    
     $rate= $cRate::countRate($loan['load_money'],$loan['rate']/100/12,$loan['repay_time']);
     $stay_still=$rate+$loan['load_money'];
      
      $fdata=array(
          'total_money'=>array('exp',"total_money+{$loan['load_money']}"),//总钱数+贷款额度  
          "available_funds"=>array('exp',"available_funds+{$loan['load_money']}"),//可用资金+贷款额度
          'stay_still'=>array('exp',"stay_still+{$stay_still}"),//待还资金  
          'withdrawalfrees'=>array('exp',"withdrawalfrees-{$loan['load_money']}")//免费提现额度减去 系统放款的钱 也就是说系统放款的钱可以免费提现哦
      );
      if($money_mod->where(array('uid'=>$loan['user_id']))->save($fdata)){
         $money_mod->commit();
          //添加日志
          moneyLog($loan['user_id'], $loan['load_money'], '标号ID:'.$loan_id.'审核成功系统放款'.$loan['load_money'], 6);
      }else{
         
          $money_mod->rollback();
          moneyErrLog('贷款标id:'.$loan_id.'已经扣除投标人的钱，放款给该贷款人时错误,没有放款成功，需要手动给该用户添加该贷款的额度', get_current_admin_id());
          $error=array(
              'state'=>true,
              'info'=>'贷款标id:'.$loan_id.'已经扣除投标人的钱，放款给该贷款人时错误,没有放款成功，需要手动给该用户添加该贷款的额度'
          );
          return $error;
      }
     //给该用户放款成功后 该扣除该人的成交服务费
     $borrow_success_fee= M('loan_cate')->where(array('id'=>$loan['cate_id']))->getField('borrow_success_fee');
     if($borrow_success_fee>0){
         //成交服务费
        $borrow_success_money=$loan['load_money']*$borrow_success_fee/100;
        $cdata=array(
            'total_money'=>array('exp',"total_money+{$borrow_success_money}"),//总钱数-贷款额度
            "available_funds"=>array('exp',"available_funds-{$borrow_success_money}"),//可用资金-贷款额度          
            'withdrawalfrees'=>array('exp',"withdrawalfrees+{$borrow_success_money}")//免费提现额度+手续费 就是说 免费的提现额度= 系统放款-成交费用
        );
        $money_mod->startTrans();
       if($money_mod->where(array('uid'=>$loan['user_id']))->save($cdata)){
          $money_mod->commit();
          //添加日志
          moneyLog($loan['user_id'], '-'.$borrow_success_money, '标号ID:'.$loan_id.'成交手续费'.$borrow_success_money, 7);
          
          
          //扣款后该给管理员加钱了。
          $sdata=array(
              "total_money"=>array('exp',"total_money+$borrow_success_money"),
              "available_funds"=>array('exp',"available_funds+$borrow_success_money")
          );
          //既然是系统扣款 就需要给系统增加钱了
          if($money_mod->where(array("uid"=>1))->save($sdata)){
              moneySysLog($loan['user_id'], $borrow_success_money, "成交服务费", 1);
          }else{
              $error="用户充值:将管理费添加到系统帐号出错";
              $error=array(
                  'state'=>true,
                  'info'=>'贷款标id:'.$loan_id.'成交服务费已经扣除但是没有将钱添加到管理员帐号内，金额'.$borrow_success_money
              );
              return $error;
          }
       
       }else{
          $money_mod->rollback();
          moneyErrLog('贷款标id:'.$loan_id.'需要扣除贷款人的贷款成交服务费'.$borrow_success_money.'没有扣款成功', get_current_admin_id());
          $error=array(
              'state'=>true,
              'info'=>'贷款标id:'.$loan_id.'需要扣除贷款人的贷款成交服务费'.$borrow_success_money.'没有扣款成功'
          );
          return $error;
      }
        
     }
     $error=array(
         'state'=>false,
         'info'=>'审核成功'
     );
     return $error;
   }
   /**
    * 提前还款操着
    */
   function getUcInrepayRefund(){

       $root = array();
       $root["status"] = 0;//0:出错;1:正确;
       $deal = $this->getLoan();
       $id=$deal['id'];
       $uid=get_current_userid();
       if(!$deal || $deal['user_id']!=$uid){
           $root["show_err"] = "操作失败！";
           return $root;
       }
       
       $root["deal"] = $deal;
       
       $time = time();
       $impose_money = 0;
       //还了几期了
      $has_repay_count= $deal['repay_count'];   
       //计算罚息
       $loan_list = $this->get_deal_load_list();     
       foreach($loan_list as $k=>$v){
           if($k>($has_repay_count-1))
           {
               $impose_money +=$v['impose_money'];
           }
       }
       
       //月利率
       $rate = $deal['rate']/12/100;
       
       $cRate='\Common\Lib\Loan\\'.$deal['loantype'];
       //总钱数 =剩余本金 +当期利息
       $get_shengyu=$cRate::get_shengyu($deal['borrow_amount'],$rate,$deal['repay_time'],$deal['repay_count'],$deal['repay_nper']);
        //剩余本金
       $benjin=$get_shengyu['sy_benjin'];
      
       $sys_advance_repay=C('sys_advance_repay')/100;
       //罚息 = 延迟还款+提前还款费用
       $impose_money +=$benjin*$sys_advance_repay;
       //当期利息
       $syRate=$cRate::getMonthRepayMoney($deal['borrow_amount'],$rate,$deal['repay_time'],$deal['repay_count']+1);
       $curr_rate=$syRate['yueLiXi'];   
       //总钱数 =剩余本金 +当期利息
       $total_repay_money = $benjin + $curr_rate;  
       
   
       
       $root["status"] = 1;//0:出错;1:正确;
       $root["impose_money"] = $impose_money;
       $root["impose_money_format"] = format_price($root["impose_money"]);
       
       $root["total_repay_money"] = $total_repay_money;
       $root["total_repay_money_format"] = format_price($root["total_repay_money"]);
       
       $true_total_repay_money = $total_repay_money + $impose_money + $deal['month_manage_money'];
       $root["true_total_repay_money"] = $true_total_repay_money;
       $root["true_total_repay_money_format"] = format_price($root["true_total_repay_money"]);
       
       return $root;
        
   }
   //提前还款执行程序
   function getUCInrepayRepayBorrowMoney(){
       $deal =$this->getLoan();
       $uid=get_current_userid();
       $id = $deal['id'];
   
       $root = array();
       $root["status"] = 0;//0:出错;1:正确;
   
 
       if(!$deal || $deal['user_id']!=$uid){
           $root["show_err"] = "操作失败！";
           return $root;
       }
   
       $time = time();
       $impose_money = 0;
       $has_repay_count=$deal['repay_count'];
       //计算罚息
       $loan_list = $this->get_deal_load_list();
       $k_repay_time = 0;
       foreach($loan_list as $k=>$v){
           if($k>($has_repay_count-1))
           {
               if($k_repay_time==0)
                   $k_repay_time = $v['repay_day'];
               $impose_money +=$v['impose_money'];
           }
       }
   
       if($impose_money > 0){
           $root["show_err"] = "请将逾期未还的借款还完才可以进行此操作！";
           return $root;
       }
   
       //月利率
       $rate = $deal['rate']/12/100;
   
       $impose_money = 0;
       
       
       //月利率
       $rate = $deal['rate']/12/100;
        
       $cRate='\Common\Lib\Loan\\'.$deal['loantype'];
       //总钱数 =剩余本金 +当期利息
       $get_shengyu=$cRate::get_shengyu($deal['borrow_amount'],$rate,$deal['repay_time'],$deal['repay_count'],$deal['repay_nper']);
       //剩余本金
       $benjin=$get_shengyu['sy_benjin'];
       
       $sys_advance_repay=C('sys_advance_repay')/100;
       //罚息 = 延迟还款+提前还款费用
       $impose_money +=$benjin*$sys_advance_repay;
       //当期利息
       $syRate=$cRate::getMonthRepayMoney($deal['borrow_amount'],$rate,$deal['repay_time'],$deal['repay_count']+1);
       $curr_rate=$syRate['yueLiXi'];
       //总钱数 =剩余本金 +当期利息
       $total_repay_money = $benjin + $curr_rate;
       
       
    
       //用户的钱的
       $available_funds=M('money')->where(array('uid'=>$uid))->getField('available_funds');
        
       $true_total_repay_money = $total_repay_money + $impose_money + $deal['month_manage_money'];
   
       if(($total_repay_money+$impose_money+$deal['month_manage_money'])>$available_funds){
           $root["show_err"] = "对不起，您的余额不足！";
           return $root;
       }       
   
       //录入到提前还款列表
       $inrepay_data['loan_id'] = $id;
       $inrepay_data['user_id'] = $uid;
       $inrepay_data['repay_money'] = round($total_repay_money);
       $inrepay_data['impose_money'] = round($impose_money,2);
       $inrepay_data['manage_money'] = round($deal['month_manage_money']);
       $inrepay_data['repay_time'] = $k_repay_time;
       $inrepay_data['true_repay_time'] = $time;   
  
       if(!M('loan_inrepay_repay')->add($inrepay_data)){
           lastsql();
           $root["show_err"] = "对不起，数据处理失败，请联系客服！";
           return $root;
       }     
   
       //录入还款列表
      // $after_time = $GLOBALS['db']->getOne("SELECT repay_time FROM ".DB_PREFIX."deal_repay WHERE deal_id=".$id." ORDER BY repay_time DESC");
       $after_time= M('loan_repay')->where("loan_id=".$id)->order('repay_time DESC')->getField('repay_time');
       if($after_time==""){
           $after_time = $deal['repay_start_time'];
       }
    
       $temp_ids[] = array();
       for($i=0;$i<($deal['repay_nper']-$has_repay_count);$i++){
           $repay_data['loan_id'] = $id;
           $repay_data['user_id'] = $uid;
           $repay_data['repay_time'] = $after_time = $cRate::next_replay_month($deal['repay_start_time'],$after_time,$deal['repay_time']);
           $repay_data['true_repay_time'] = $time;
           $repay_data['status'] = 0;
           if($i==0){
               $repay_data['repay_money'] = round($deal['month_repay_money'],2);
               $repay_data['impose_money'] = round($impose_money,2);
               $repay_data['manage_money'] = round($deal['month_manage_money']);
           }
           else{        
               //每期的还款 本金
               $qimoney=$cRate::getMonthRepayMoney($deal['borrow_amount'],$rate,$deal['repay_time'],1+$i+$has_repay_count);
               $repay_data['repay_money']=$qimoney['yueBenJin'];
              
               $repay_data['impose_money'] = 0;
               $repay_data['manage_money'] = 0;
           }
           $deal_repay_id = 0;
        //   $GLOBALS['db']->autoExecute(DB_PREFIX."deal_repay",$repay_data,"INSERT");          
           $deal_repay_id = M('loan_repay')->add($repay_data);
           	
           //假如出错 删除掉原来的以插入的数据
           if(intval($deal_repay_id)==0)
           {
               if($temp_ids){
                 //  $GLOBALS['db']->query("DELETE FROM ".DB_PREFIX."deal_repay WHERE id in (".implode(",",$temp_ids).")");
                   M('loan_repay')->where(array('id'=>array('in',$temp_ids)))->delete();
               }
               $root["show_err"] = "对不起，处理数据失败请联系客服！";
               return $root;
           }
           else{
               $temp_ids[] = $deal_repay_id;
           }
       }
   
       //更新用户账户资金记录   
       $money_mod=M('money');
       //偿还本息
       //此处的待还资金  因为录入的时候是 本金+利息  现在要算出剩余多少本金和利息       
        $stay_still=$get_shengyu['sy_benjin']+$get_shengyu['sy_lixi'];
       $hdata=array(
           "total_money"=>array('exp',"total_money-{$total_repay_money}"),//总金额- 还款额度
           "available_funds"=>array('exp',"available_funds-{$total_repay_money}"),//可用额度-还款额度
           'stay_still'=>array('exp',"stay_still-{$stay_still}"),//待 还资金-还款额度
       );
       if($money_mod->where(array('uid'=>$uid))->save($hdata)){
           moneyLog($uid, '-'.$total_repay_money,"标:".$id.",期:".($deal['repay_count']+1).'-'.$deal['repay_nper'].",提前还款本息", 3);
           //更新这个贷款的相关信息
           $nepr=$deal['repay_nper']-$deal['repay_count'];
           $ldata=array(
               'repay_money'=>array('exp',"repay_money+{$total_repay_money}"),//换了了多少了      本金+利息
               'repay_count'=>array('exp',"repay_count+{$nepr}"),//还款次数
           );
           if(M('loan')->where(array('id'=>$id))->save($ldata)){
               loanLog("标:".$id.",期:".($deal['repay_count']+1).",提前还款本息".$total_repay_money, $id);
           };
       };
       
       //支付管理费用
       if($deal['month_manage_money']>0){
           $gdata=array(
               "total_money"=>array('exp',"total_money-{$deal['month_manage_money']}"),//总金额- 管理费用
               "available_funds"=>array('exp',"available_funds-{$deal['month_manage_money']}"),//可用额度-管理费用
           );
           if($money_mod->where(array('uid'=>$uid))->save($gdata)){
               moneyLog($uid, '-'.$deal['month_manage_money'],"标:".$id.",期:".($deal['repay_count']+1).",支付管理费用", 7);
               //给系统加钱
              $sdata=array(
                   "total_money"=>array('exp',"total_money+{$deal['month_manage_money']}"),
                   "available_funds"=>array('exp',"available_funds+{$deal['month_manage_money']}")
               );
               //既然是系统扣款 就需要给系统增加钱了
               if($money_mod->where(array("uid"=>1))->save($sdata)){
                   moneySysLog($uid, $deal['month_manage_money'],"标:".$id.",期:".($deal['repay_count']+1).",借款管理费",$uid);
               } 
           };
       }
       //支付逾期费用
       if($impose_money>0){
       
           $idata=array(
               "total_money"=>array('exp',"total_money-{$impose_money}"),//总金额- 还款额度
               "available_funds"=>array('exp',"available_funds-{$impose_money}"),//可用额度-还款额度
           );
           if($money_mod->where(array('uid'=>$uid))->add($idata)){
               moneyLog($uid, '-'.$impose_money,"标:".$id.",期:".($deal['repay_count']+1).",提前还款违约金", 3);
           };
       }
       //给这个标 加日志
       loanLog('用户支付:'.($deal['repay_count']+1).'-'.$deal['repay_nper'].'提前还款:'.$total_repay_money.'管理费:'.$deal['month_manage_money'].'违约金：'.$impose_money, $id,$uid);
       //加积分
       integral($uid,9);
        //提现  
     $param=array(
         "url"=>$deal['url'],
         "name"=>$deal['name'],
         "money"=>$total_repay_money,
         "month_manage_money"=>$deal['month_manage_money'],
         "impose_money"=>round($impose_money,2)         
     );    
     remind(14,$uid,$param);

   
   
       //用户回款
       $user_load_ids=M('loan_load')->field('id,loan_id,user_id,money')->where('loan_id='.$id)->select();
        //获取当前借款所有转让的债权
       $tmp_user_transfer_loads=M('loan_load_transfer')->field('id,load_id,near_repay_time,t_user_id,user_id')->where('loan_id='.$id.' and status=1 and t_user_id > 0')->select();
      
       $user_transfer_loads = array();
       foreach($tmp_user_transfer_loads as $kk=>$vv){
           $user_transfer_loads[$vv['load_id']] = $vv;
       }    
       unset($tmp_user_transfer_loads);    
   
       foreach($user_load_ids as $k=>$v){
           //本金
           $user_self_money = 0;
           //本息
           $user_repay_money = 0;
           //违约金
           $user_impose_money = 0;
           //管理费
           $user_manage_money = 0;
           //第几期还的款
           $user_repay_k = 0;
           	
           	
           $v['repay_start_time'] = $deal['repay_start_time'];
           $v['repay_time'] = $deal['repay_time'];
           $v['rate'] = $deal['rate'];
           $v['u_key'] = $k;
           	
           $user_loan_list =$this->get_deal_user_load_list($v,$deal['loantype'],$deal['repay_nper']);
           $loan_user_info = array();
           $mesg=array(
               "url"=>$deal['url'],
               "loan_name"=>$deal['sub_name'],
               "money"=>$vv['month_repay_money']+$vv['impose_money'],
           );
           foreach($user_loan_list as $kk=>$vv){
                    // 借入者已还款，但是没打款到借出用户中心
                if ($vv['has_repay'] == 0) {
                    $user_load_data['loan_id'] = $v['loan_id'];
                    $user_load_data['user_id'] = $v['user_id'];
                    $user_load_data['repay_time'] = $vv['repay_day'];
                    $user_load_data['true_repay_time'] = $time;
                    $user_load_data['is_site_repay'] = 0;
                    $user_load_data['status'] = 0;
                    
                    // 本次还款的本息
                    $qimoney = $cRate::getMonthRepayMoney($v['money'], $deal['rate'] / 12 / 100, $deal['repay_time'], $kk + 1);
                    $user_load_data['self_money'] = $qimoney['yueBenJin'];
                    
                    // 小于提前还款按正常还款
                    if ($vv['repay_day'] < $k_repay_time) {
                        
                        $user_load_data['repay_money'] = $vv['month_repay_money'];
                        $user_load_data['manage_money'] = $vv['month_manage_money'];
                        $user_load_data['impose_money'] = $vv['impose_money'];
                        if ($vv['status'] > 0)
                            $user_load_data['status'] = $vv['status'] - 1;
                        
                        $user_self_money += (float) $user_load_data['self_money'];
                        if ($user_load_data['impose_money'] != 0 || $user_load_data['manage_money'] != 0 || $user_load_data['repay_money'] != 0) {
                            $in_user_id = $v['user_id'];
                            // 判断是否转让了债权
                            if ($user_transfer_loads[$v['id']]['near_repay_time'] <= $vv['repay_day'] && $user_transfer_loads[$v['id']]['user_id'] == $v['user_id']) {
                                $in_user_id = $user_transfer_loads[$v['id']]['t_user_id'];
                            }
                            
                            // 本息
                            $hdata = array(
                                "total_money" => array(
                                    'exp',
                                    "total_money+{$user_load_data['repay_money']}"
                                ), // 总金额+ 还款额度
                                "available_funds" => array(
                                    'exp',
                                    "available_funds+{$user_load_data['repay_money']}"
                                ), // 可用额度+还款额度
                                'due_in' => array(
                                    'exp',
                                    "due_in-{$qimoney['yueBenJin']}"
                                ), // 代收资金-这一期本金
                                'stay_interest' => array(
                                    'exp',
                                    "stay_interest-{$qimoney['yueLiXi']}"
                                ), // 代收利息-这一期利息
                                'make_interest' => array(
                                    'exp',
                                    "make_interest+{$qimoney['yueLiXi']}"
                                )
                            ) // 一赚利息+利息
;
                            if (M('money')->where(array(
                                'uid' => $in_user_id
                            ))->save($hdata)) {
                                moneyLog($in_user_id, $user_load_data['repay_money'], '标:' . $id . ',期:' . ($kk + 1) . '回报本息', 5);
                            } else {
                                moneyErrLog('用户' . $in_user_id . ',标:' . $id . ',期:' . ($kk + 1) . '应收本息金额' . $user_load_data['repay_money'] . '没有入账需要手动打款', $in_user_id);
                            }
                            // 罚息
                            if ($user_load_data['impose_money'] > 0) {
                                $fdata = array(
                                    "total_money" => array(
                                        'exp',
                                        "total_money+{$user_load_data['impose_money']}"
                                    ), // 总金额+还款额度
                                    "available_funds" => array(
                                        'exp',
                                        "available_funds+{$user_load_data['impose_money']}"
                                    )
                                ) // 可用额度+还款额度
;
                                if (M('money')->where(array(
                                    'uid' => $in_user_id
                                ))->save($fdata)) {
                                    moneyLog($in_user_id, $user_load_data['impose_money'], '标:' . $id . ',期:' . ($kk + 1) . '罚息', 7);
                                } else {
                                    moneyErrLog('用户' . $in_user_id . ',标:' . $id . ',期:' . ($kk + 1) . '应收罚息金额' . $user_load_data['impose_money'] . '没有入账需要手动打款', $in_user_id);
                                }
                            }
                            // 管理费
                            if ($user_load_data['manage_money'] > 0) {
                                $mdata = array(
                                    "total_money" => array(
                                        'exp',
                                        "total_money-{$user_load_data['manage_money']}"
                                    ), // 总金额-管理费
                                    "available_funds" => array(
                                        'exp',
                                        "available_funds-{$user_load_data['manage_money']}"
                                    )
                                ) // 可用额度-管理费
;
                                if (M('money')->where(array(
                                    'uid' => $in_user_id
                                ))->save($mdata)) {
                                    moneyLog($in_user_id, '-' . $user_load_data['manage_money'], '标:' . $id . ',期:' . ($kk + 1) . '管理费', 7);
                                    // 给系统管理加钱
                                    $sdata = array(
                                        "total_money" => array(
                                            'exp',
                                            "total_money+{$user_load_data['manage_money']}"
                                        ), // 总金额+管理费
                                        "available_funds" => array(
                                            'exp',
                                            "available_funds+{$user_load_data['manage_money']}"
                                        )
                                    ) // 可用额度+管理费
;
                                    if (M('money')->where(array(
                                        'uid' => 1
                                    ))->save($sdata)) {
                                        moneySysLog($in_user_id, $user_load_data['manage_money'], '用户' . $in_user_id . ',标:' . $id . ',期:' . ($kk + 1) . '管理费', 1);
                                    } else {
                                        moneyErrLog('用户' . $in_user_id . ',标:' . $id . ',期:' . ($kk + 1) . '管理费金额额' . $user_load_data['manage_money'] . '扣除成功，但是没有打到管理员帐号', $in_user_id);
                                    }
                                } else {
                                    moneyErrLog('用户' . $in_user_id . ',标:' . $id . ',期:' . ($kk + 1) . '管理费金额额' . $user_load_data['manage_money'] . '没有入账需要手动扣除', $in_user_id);
                                }
                            }
                            
                            $unext_loan = $user_loan_list[$kk + 1];
                            if ($unext_loan) {
                                $mesg['next_time'] = date("Y年m月d日", $unext_loan['repay_day']);
                                $mesg['next_money'] = round($unext_loan['month_repay_money'], 2);
                                remind(12, $in_user_id, $mesg);
                            }
                        }
                    }                     // 提前还款
                    // 当前提前还款的第一个月
                    else {
                        if ($vv['repay_day'] == $k_repay_time) {
                            
                            // 当期的提前还款补偿
                            $sys_advance_repay = C('sys_advance_repay') / 100;
                            $user_load_data['impose_money'] = $user_load_data['self_money'] * $sys_advance_repay;
                            $user_self_money += (float) $user_load_data['self_money'];
                            // 当期还款金额
                            $user_load_data['repay_money'] = $vv['month_repay_money'];
                            // 当期管理费
                            $user_load_data['manage_money'] = $vv['month_manage_money'];
                            $user_repay_k = $kk + 1;
                        } else {
                            // 其他月份
                            $sys_advance_repay = C('sys_advance_repay') / 100;
                            $user_load_data['impose_money'] = $user_load_data['self_money'] * $sys_advance_repay;
                            $user_load_data['manage_money'] = 0;
                        }
                        
                        $user_repay_money += (float) $user_load_data['repay_money'];
                        $user_impose_money += (float) $user_load_data['impose_money'];
                        $user_manage_money += (float) $user_load_data['manage_money'];
                        $user_load_data['l_key'] = $kk;
                        $user_load_data['u_key'] = $k;
                    }
                    
                    // $GLOBALS['db']->autoExecute(DB_PREFIX."deal_load_repay",$user_load_data,"INSERT");
                    M('loan_load_repay')->add($user_load_data);
                }
            }
           	
           if($user_repay_money >0){                         
            
               $in_user_id = $v['user_id'];
               //判断是否转让了债权
               if($user_transfer_loads[$v['id']]['near_repay_time']<=$vv['repay_day'] && $user_transfer_loads[$v['id']]['user_id'] == $v['user_id'])
               {
                   $in_user_id = $user_transfer_loads[$v['id']]['t_user_id'];
               }
               //本息
               $hdata=array(
                   "total_money"=>array('exp',"total_money+{$user_repay_money}"),//总金额+ 还款额度
                   "available_funds"=>array('exp',"available_funds+{$user_repay_money}"),//可用额度+还款额度
                   'due_in'=>array('exp',"due_in-{$qimoney['yueBenJin']}"),//代收资金-这一期本金
                   'stay_interest'=>array('exp',"stay_interest-{$qimoney['yueLiXi']}"),//代收利息-这一期利息
                   'make_interest'=>array('exp',"make_interest+{$qimoney['yueLiXi']}")//一赚利息+利息
               );
               if(M('money')->where(array('uid'=>$in_user_id))->save($hdata)){
                   moneyLog($in_user_id, $user_repay_money, '标:'.$id.',回报本息', 5);
               }else{
                   moneyErrLog('用户'.$in_user_id.',标:'.$id.',应收本息金额'.$user_repay_money.'没有入账需要手动打款', $in_user_id);
               }
               //罚息
               if($user_impose_money>0){
                   $fdata=array(
                       "total_money"=>array('exp',"total_money+{$user_impose_money}"),//总金额+还款额度
                       "available_funds"=>array('exp',"available_funds+{$user_impose_money}"),//可用额度+还款额度
                   );
                   if(M('money')->where(array('uid'=>$in_user_id))->save($fdata)){
                       moneyLog($in_user_id, $user_impose_money, '标:'.$id.',期:'.($kk+1).'罚息', 7);
                   }else{
                       moneyErrLog('用户'.$in_user_id.',标:应收罚息金额'.$user_impose_money.'没有入账需要手动打款', $in_user_id);
                   }
               }
               //管理费
               if($user_manage_money>0){
                   $mdata=array(
                       "total_money"=>array('exp',"total_money-{$user_manage_money}"),//总金额-管理费
                       "available_funds"=>array('exp',"available_funds-{$user_manage_money}"),//可用额度-管理费
                   );
                   if(M('money')->where(array('uid'=>$in_user_id))->save($mdata)){
                       moneyLog($in_user_id, '-'.$user_manage_money, '标:'.$id.',管理费', 7);
                       //给系统管理加钱
                       $sdata=array(
                           "total_money"=>array('exp',"total_money+{$user_manage_money}"),//总金额+管理费
                           "available_funds"=>array('exp',"available_funds+{$user_manage_money}"),//可用额度+管理费
                       );
                       if(M('money')->where(array('uid'=>1))->save($sdata)){
                           moneySysLog($in_user_id, $user_manage_money,'用户'.$in_user_id.',标:'.$id.',期:'.($kk+1).'管理费', 1);
                       }else{
                           moneyErrLog('用户'.$in_user_id.',标:'.$id.',管理费金额额'.$user_manage_money.'扣除成功，但是没有打到管理员帐号', $in_user_id);
                            
                       }
                   }else{
                       moneyErrLog('用户'.$in_user_id.',标:'.$id.',管理费金额额'.$user_manage_money.'没有入账需要手动扣除', $in_user_id);
                   }
               }
               $all_repay_money=round(M('loan_load_repay')->where("loan_id=".$v['loan_id']." AND user_id=".$v['user_id'])->getField('(sum(repay_money)-sum(self_money) + sum(impose_money)) as shouyi'),2);
                
               $all_impose_money=round(M('loan_load_repay')->where("loan_id=".$v['loan_id']." AND user_id=".$v['user_id'])->sum('impose_money'),2);
                
               $mesg["all_repay_money"]=$all_repay_money;
               $mesg["all_impose_money"]=$all_impose_money;
           
               remind(13,$in_user_id,$mesg);
           
         }
        
       }
       $root["status"] = 1;//0:出错;1:正确;
       $root["show_err"] = "操作成功!";
       return $root;
   }
    
   /**
    * 没有通过复审  将投标人的钱返回到自己帐号
    */
   public function notpass($loan=null){
       if($loan==null){
           $loan=$this->loan;
       }      
       $loan_id=$loan['id'];
       $loan_load=M('loan_load')->where(array('loan_id'=>$loan_id))->select();
       $money_mod=M('money');
       $err=false;
   
       //从用户帐号扣款
       foreach ($loan_load as $v){
           $mdata=array(       
               'freeze_funds'=>array('exp',"freeze_funds-{$v['money']}"),//冻结资金-投标额度
               'available_funds'=>array('exp',"available_funds+{$v['money']}"),//可用资金+投标资金
           );
           if(!$money_mod->where(array('uid'=>$v['user_id']))->save($mdata)){
               $err=true;
               moneyErrLog('贷款标id:'.$loan_id.'复审失败,恢复投标用户:'.$v['user_id'].'冻结资金失败', get_current_admin_id());
           }else{
               //更新用户日志
               moneyLog($v['user_id'], $v['money'], '恢复标号id:'.$v['loan_id'].'的投标的冻结资金'.$v['money'], 8);
           }
       }
       if($err){        
          
           $error=array(
               'state'=>true,
               'info'=>'贷款标id:'.$loan_id.'复审失败,恢复投标用户冻结资金失败'
           );
           return $error;
       }
 
       //编辑用户投标的状态
       if(M('loan_load')->where(array('loan_id'=>$loan_id))->save(array('is_repay'=>1))){
           $error=array(
               'state'=>false,
               'info'=>'成功'
           );
           return $error;
       };
       
   }
   
   /**
    * 得到还款列表
    */
   public function get_deal_load_list($deal=null){
       if($deal==null){
           $deal=$this->getLoan();
       }       
       $time=time();
       //借款时间 /月
       $true_repay_time = $deal['repay_time'];      

       //开始还款日期
       $repay_day = $deal['repay_start_time'];
       $cRate='\Common\Lib\Loan\\'.$deal['loantype'];
     
      
       //此处循环的是 期数 
       $repay_nper=$deal['repay_nper'];
       for($i=0;$i<$repay_nper;$i++){
           $loan_list[$i]['impose_day'] = 0;
           /**
            * status 1提前,2准时还款，3逾期还款 4严重逾期
            */
           $loan_list[$i]['status'] = 0;
           $repay_day = $loan_list[$i]['repay_day'] =$cRate::next_replay_month($repay_day,0,$deal['repay_time']);
          //每期本息
          $month_repay_money= $cRate::getMonthRepayMoney($deal['borrow_amount'],$deal['rate']/100/12,$deal['repay_time'],$i+1);
         //每期实际货款金额 =利息+本金
          $loan_list[$i]['month_repay_money'] = $month_repay_money['yueLiXi']+$month_repay_money['yueBenJin'];
       
       
           //判断是否已经还完
         //  $repay_item = $GLOBALS['db']->getRow("SELECT * FROM ".DB_PREFIX."deal_repay WHERE deal_id=".$deal['id']." AND repay_time=".$repay_day."");
           $repay_item=M('loan_repay')->where(array('loan_id'=>$deal['id'],'repay_time'=>$repay_day))->find();
           $loan_list[$i]['true_repay_time'] = $repay_item['true_repay_time'];
          
           //已还
           $loan_list[$i]['month_has_repay_money'] = 0;
           if($repay_item){
               $loan_list[$i]['month_has_repay_money'] = $repay_item['repay_money'];
               $loan_list[$i]['month_manage_money'] = 0;
               	
               $loan_list[$i]['has_repay'] = 1;
               $loan_list[$i]['status'] = $repay_item['status']+1;              
               $loan_list[$i]['month_repay_money']=0;
               $loan_list[$i]['impose_money'] = $repay_item['impose_money'];
               	
               //真实还多少
               $loan_list[$i]['month_has_repay_money_all'] = $loan_list[$i]['month_has_repay_money'] + $deal['month_manage_money']+$loan_list[$i]['impose_money'];
               	
               //总的必须还多少
               $loan_list[$i]['month_need_all_repay_money'] = 0;
           }
           else{
               
              //每期管理费
             $month_manage=$cRate::getNperManage(C('sys_borrow_manage_fee'));
             $month_manage_money=$deal['borrow_amount']*$month_manage/100;            
             $loan_list[$i]['month_manage_money'] = $month_manage_money;
             
             $loan_list[$i]['impose_money'] =0;
               //判断是否罚息
               if($time > ($repay_day+ 23*3600 + 59*60 + 59)&& $loan_list[$i]['month_repay_money'] > 0){
                   //晚多少天
                   $loan_list[$i]['status'] = 3;                   
                   $time_span = strtotime(date("Y-m-d",$time));
                   $next_time_span = strtotime(date("Y-m-d",$repay_day));
                   $day  = ceil(($time_span-$next_time_span)/24/3600); 
                   $loan_list[$i]['impose_day'] = $day;
                  
                   //预期罚息
                   $impose_fee = trim(C('sys_penaltyint'));
                   //预期管理费
                   $manage_impose_fee = trim(C('sys_overdue'));
                   //严重逾期费率
                   if($day >= 31){
                       $loan_list[$i]['status'] = 4;
                       $impose_fee = trim(C('sys_penaltyints'));
                       $manage_impose_fee = trim(C('sys_overdues'));
                   }       
                   //罚息
                   $loan_list[$i]['impose_money'] = $loan_list[$i]['month_repay_money']*$impose_fee*$day/100;
           
                   //罚管理费
                   $loan_list[$i]['manage_impose_money'] = $loan_list[$i]['month_repay_money']*$manage_impose_fee*$day/100;
                   $loan_list[$i]['impose_money'] += $loan_list[$i]['manage_impose_money']; 
               }
               	
               //总的必须还多少
               $loan_list[$i]['month_need_all_repay_money'] =  $loan_list[$i]['month_repay_money'] + $loan_list[$i]['month_manage_money'] + $loan_list[$i]['impose_money'];
           }     
           //has_repay：1：已还款;0:未还款
           $loan_list[$i]['has_repay'] = intval($loan_list[$i]['has_repay']);
       
           //还款日
           $loan_list[$i]['repay_day_format'] = date('Y-m-d',$loan_list[$i]['repay_day']);
  
           //已还金额
           $loan_list[$i]['month_has_repay_money_all_format'] = format_price($loan_list[$i]['month_has_repay_money_all']);
           //待还金额
           $loan_list[$i]['month_need_all_repay_money_format'] = format_price($loan_list[$i]['month_need_all_repay_money']);
       
           //待还本息
           $loan_list[$i]['month_repay_money_format'] = format_price($loan_list[$i]['month_repay_money']);
           //借款管理费
           $loan_list[$i]['month_manage_money_format'] = format_price($loan_list[$i]['month_manage_money']);
       
           //逾期费用
           $loan_list[$i]['impose_money_format'] = format_price($loan_list[$i]['impose_money']);
       
           //状态
           if($loan_list[$i]['status'] == 0){
               $loan_list[$i]['status_format'] = '待还';
           }elseif($loan_list[$i]['status'] == 1){
               $loan_list[$i]['status_format'] = '提前还款';
           }elseif($loan_list[$i]['status'] == 2){
               $loan_list[$i]['status_format'] = '准时还款';
           }elseif($loan_list[$i]['status'] == 3){
               $loan_list[$i]['status_format'] = '逾期还款';
           }elseif($loan_list[$i]['status'] == 4){
               $loan_list[$i]['status_format'] = '严重逾期';
           }
       }   
       return $loan_list;
   }
   /**
    * 用户还款操作
    */
   public function repay_borrow_money($id,$ids){ 
       $loan=$this->getLoan();
       $time = time();
        //得到还款列表
       $loan_list=$this->get_deal_load_list(); 
       //这个地方需要判断，有时候是管理员还款那。
       $uid=get_current_userid();  
       $money_mod=M('money');
       //用户的钱的
       $available_funds=$money_mod->where(array('uid'=>$uid))->getField('available_funds');
       
       //第一个循环的KEY 的值
       $first_key = -1;
       //是否找到了第一个KEY的值
       $find_first_key = false; 
       //还款日期      
       $repay_data = null;       
       //需还多少
       $must_repay = 0;
       //管理费多少
       $must_fee = 0;
       //罚息
       $must_impose = 0;
       
          //普通逾期   
       $pt_impose = array();
       //严重逾期
       $yz_impose = array();
       $k_repay_time = 0 ;
       //has_repay=1说明换过了
       foreach($loan_list as $k=>$v){         
           if($v['has_repay']<>1){
               if(!$find_first_key){
                   $first_key = $k;
                   $find_first_key = true;
               }              
               //本次循环的K 存在在 要换的数组内     
               if(in_array($k,$ids)){
                   if($k_repay_time==0)
                     $k_repay_time = $v['repay_day'];
                   $repay_data[$k]['loan_id'] = $id;
                   $repay_data[$k]['user_id'] =$uid;
                   $repay_data[$k]['l_key']=$k+1;
                   //月还本息
                   $repay_data[$k]['repay_money'] = round($v['month_repay_money'],2);
                   $must_repay +=round($v['month_repay_money'],2);
                   	
                   //管理费
                   $repay_data[$k]['manage_money'] = round($v['month_manage_money'],2);
                   $must_fee += round($v['month_manage_money'],2);
                   	
                   //罚息
                   $repay_data[$k]['impose_money'] = round($v['impose_money'],2);                  
                   $must_impose += round($v['impose_money'],2);
                   	
                   $repay_data[$k]['status'] = 0;
                   if(date("Y-m-d",$v['repay_day']) == date("Y-m-d",$time)){
                       //准时
                       $repay_data[$k]['status'] = 1;
                   }elseif($v['impose_money'] >0){
                       //逾期
                       $repay_data[$k]['status'] = 2;
                       if($v['impose_day'] < 31){
                           //普通逾期
                           $pt_impose[] = $k;
                       }
       
                       else{
                           //严重逾期
                           $repay_data[$k]['status'] = 3;
                           $yz_impose[] = $k;
                       }
                   }
                   //系统算出的日期
                   $repay_data[$k]['repay_time'] = $v['repay_day'];
                   //现在还款的日期
                   $repay_data[$k]['true_repay_time'] = $time;
               }
           }
       }
       $root["status"] = 0;//0:出错;1:正确;  
       
       //判断是否按顺序 
       if($first_key!=$ids[0]){
           $root["show_err"] = "还款失败，请按顺序还款！";
            return $root;
       }
      
       
       if(($must_repay+$must_fee+$must_impose)>$available_funds){
           $root["show_err"] = "对不起，您的余额不足！";
           return $root;
       }  
       //还款次数
        $repay_count=0;
       //录入到还款列表  
       foreach($repay_data as $k=>$v){    
           //添加到还款列表内     
           if(M('loan_repay')->add($v)){
               //成功了需要变动用户帐号的钱       
               //偿还本息
               $hdata=array(
                   "total_money"=>array('exp',"total_money-{$v['repay_money']}"),//总金额- 还款额度
                   "available_funds"=>array('exp',"available_funds-{$v['repay_money']}"),//可用额度-还款额度
                   'stay_still'=>array('exp',"stay_still-{$v['repay_money']}"),//待 还资金-还款额度
               );
              if($money_mod->where(array('uid'=>$uid))->save($hdata)){
                  moneyLog($uid, '-'.$v['repay_money'],"标:".$id.",期:".($k+1).",偿还本息", 3);
                  //更新这个贷款的相关信息                  
                  $ldata=array(
                      'repay_money'=>array('exp',"repay_money+{$v['repay_money']}"),//换了了多少了      本金+利息         
                      'repay_count'=>array('exp','repay_count+1'),//还款次数
                  );
                  if(M('loan')->where(array('id'=>$id))->save($ldata)){
                      loanLog("标:".$id.",期:".($k+1).",偿还本息".$v['repay_money'], $id);
                  };
              };
              
              //支付管理费用
              if($v['manage_money']>0){                 
                  $gdata=array(
                      "total_money"=>array('exp',"total_money-{$v['manage_money']}"),//总金额- 管理费用
                      "available_funds"=>array('exp',"available_funds-{$v['manage_money']}"),//可用额度-管理费用                
                  );
                  if($money_mod->where(array('uid'=>$uid))->save($gdata)){
                      moneyLog($uid, '-'.$v['manage_money'],"标:".$id.",期:".($k+1).",支付管理费用", 7);
                      //给系统加钱
                      $sdata=array(
                          "total_money"=>array('exp',"total_money+{$v['manage_money']}"),
                          "available_funds"=>array('exp',"available_funds+{$v['manage_money']}")
                      );
                      //既然是系统扣款 就需要给系统增加钱了
                      if($money_mod->where(array("uid"=>1))->save($sdata)){
                          moneySysLog($uid, $v['manage_money'],"标:".$id.",期:".($k+1).",借款管理费",$uid);
                      }                      
                  };
              }
              //支付逾期费用   //这个地方有个小错误  逾期费用= 逾期li'x
              /***
               * 这个地方有个小错误 也不算错误 只是系统会少钱
               * 逾期费用= 逾期利息+逾期管理费
               * 这里已经扣除了 借款人的 逾期钱数
               * 后面用户回款的时候 逾期钱说是安用户的投资算的 只给用户打了 利息  
               * 管理费用 已经扣除 应该加个管理帐号的 这个地方没有加。。。 所以 逾期管理费 没有加到 管理的帐号 但是已经扣除了
               */
              if($v['impose_money']>0){
                  
                  $idata=array(
                      "total_money"=>array('exp',"total_money-{$v['impose_money']}"),//总金额- 还款额度
                      "available_funds"=>array('exp',"available_funds-{$v['impose_money']}"),//可用额度-还款额度                  
                  );
                  if($money_mod->where(array('uid'=>$uid))->save($idata)){
                      moneyLog($uid, '-'.$v['impose_money'],"标:".$id.",期:".($k+1).",逾期罚息", 3);
                  };
              } 
              //给这个标 加日志
              loanLog('用户支付:'.($k+1).'期还款本息:'.$v['repay_money'].'管理费:'.$v['manage_money'].'逾期费用'.$v['impose_money'], $id,$uid);
              //加积分
              integral($uid,8);
              $repay_count++;
           }else{
               $root["show_err"] = "对不起，处理数据失败请联系客服！";
               return $root;
           }
          
       }
  

       //如果逾期了 扣除信用额度
       //信用额度
       if($pt_impose){
           foreach($pt_impose as $pt_k=>$pt_v){
               integral($uid,10);
           }
       }elseif($yz_impose){
           foreach($yz_impose as $yz_k=>$yz_v){
               integral($uid,11);
           }
       }
       //下次还款
       $next_loan = $loan_list[$ids[count($ids)-1]+1];   
       //还款成功了发送通知
      $content= array("url"=>$loan['url'],"name"=>$loan['sub_name'],"moeny"=>number_format(($must_repay+$must_fee+$must_impose),2)."元","date"=>date('Y年m月d日',time()));
      $cRate='\Common\Lib\Loan\\'.$loan['loantype'];
      if($next_loan){
          $exp=array("next_repay_date"=>date("Y年m月d日",$next_loan['repay_day']),"next_repay_moeny"=>number_format($next_loan['month_repay_money'],2)."元");
           //更新下次还款时间
           $bdata=array(              
               'next_repay_time'=>$next_loan['repay_day'],//下次还款时间             
           );
           if(M('loan')->where(array('id'=>$id))->save($bdata)){
               remind(10, $uid, $content+$exp);
           }else{
               moneyErrLog('用户还款钱已扣除,已还金额、还款次数没有更新', $id);
           }
       }
       else{            
         
           //算利息
           $rate=$cRate::countRate($loan['borrow_amount'],$loan['rate']/100/12,$loan['repay_time']);
           //说明真换完了  还了的期数==总期数 AND 利息+本金 和还款数在正负10之间就算还完了      
           if($loan['repay_nper']==($loan['repay_count']+$repay_count) && ($rate+$loan['borrow_amount']+10>$loan['repay_money']+$must_repay ||$rate+$loan['borrow_amount']-10<$loan['repay_money']+$must_repay)){
                 //真还完了还有更改用户的状态
               $bdata=array(                 
                   'deal_status'=>9
               );
               if(M('loan')->where(array('id'=>$id))->save($bdata)){ 
                   //提现用户换完了
                   remind(11, $uid, $content);
                   //添加积分
                   integral($uid,9);
               }else{
                   moneyErrLog('用户还款钱已扣除,已还金额、还款次数、标状态没有更新,投标人未有到账', $id);
               }
           }else{
               moneyErrLog('用户还款钱已扣除,已还金额、还款次数没有更新,投标人未有到账,标下次还款日期为NULL', $id);
           }
          
       }        
       //用户回款
       $user_load_ids=M('loan_load')->field('id,loan_id,user_id,money')->where('loan_id='.$id)->select();

       //获取当前借款所有转让的债权
       $tmp_user_transfer_loads=M('loan_load_transfer')->field('id,load_id,near_repay_time,t_user_id,user_id')->where('loan_id='.$id.' and status=1 and t_user_id > 0')->select();
      
       $user_transfer_loads = array();
       foreach($tmp_user_transfer_loads as $kk=>$vv){
           $user_transfer_loads[$vv['load_id']] = $vv;
       }    
       unset($tmp_user_transfer_loads);    
     
       //循环投标人的列表
       foreach($user_load_ids as $k=>$v){          	
           $v['repay_start_time'] = $loan['repay_start_time'];
           $v['repay_time'] = $loan['repay_time'];
           $v['rate'] = $loan['rate'];
           $v['u_key'] = $k;
           //得到投标人 还款状态列表 
           $user_loan_list = $this->get_deal_user_load_list($v,$loan['loantype'],$loan['repay_nper']);
           $loan_user_info = array();
           foreach($user_loan_list as $kk=>$vv){
               //借入者已还款，但是没打款到借出用户中心
               if($vv['has_repay']==0){
                   $user_load_data['loan_id'] = $v['loan_id'];
                   $user_load_data['user_id'] = $v['user_id'];
                   $user_load_data['repay_time'] = $vv['repay_day'];
                   $user_load_data['true_repay_time'] = $time;
                   $user_load_data['is_site_repay'] = 0;
                   $user_load_data['status'] = 0;
                   	
                   //当默认还款时间小于当前还款时间  或者 指针小于等于当前还款的日期   如果用户收款钱不对了 肯定是这个地方的错。。。                   	
                   if($vv['repay_day'] < $k_repay_time || $kk <= max($ids)){
                       //小于提前还款的话
                       
                       //本次还款的本息
                       $qimoney=$cRate::getMonthRepayMoney($v['money'],$loan['rate']/12/100,$loan['repay_time'],$kk+1);
                       $user_load_data['self_money']=$qimoney['yueBenJin'];
                       
                       $user_load_data['repay_money'] = $vv['month_repay_money'];
                       $user_load_data['manage_money'] = $vv['month_manage_money'];
                       $user_load_data['impose_money'] = $vv['impose_money'];
                       if($vv['status']>0)
                           $user_load_data['status'] = $vv['status'] - 1;
                       $user_load_data['l_key'] = $kk;
                       $user_load_data['u_key'] = $k;
                      
                      // $GLOBALS['db']->autoExecute(DB_PREFIX."deal_load_repay",$user_load_data,"INSERT","","SILENT");
                     if(M('loan_load_repay')->add($user_load_data)){
                         $in_user_id=0;
                         if($user_load_data['impose_money'] !=0 || $user_load_data['manage_money'] !=0 || $user_load_data['repay_money']!=0){
                              
                             $in_user_id  = $v['user_id'];
                             //如果是转让债权那么将回款打入转让者的账户
                             if($user_transfer_loads[$v['id']]['near_repay_time'] <= $vv['repay_day'] && $user_transfer_loads[$v['id']]['user_id'] == $v['user_id']){
                                 $in_user_id = $user_transfer_loads[$v['id']]['t_user_id'];
                             }
                             //给用户回款
                              
                             //本息  此处按照原先设计少了一个  减去代收资金 代收利息  和已收利息
                             $hdata=array(
                                 "total_money"=>array('exp',"total_money+{$user_load_data['repay_money']}"),//总金额+ 还款额度
                                 "available_funds"=>array('exp',"available_funds+{$user_load_data['repay_money']}"),//可用额度+还款额度
                                 'due_in'=>array('exp',"due_in-{$qimoney['yueBenJin']}"),//代收资金-这一期本金
                                 'stay_interest'=>array('exp',"stay_interest-{$qimoney['yueLiXi']}"),//代收利息-这一期利息
                                 'make_interest'=>array('exp',"make_interest+{$qimoney['yueLiXi']}")//一赚利息+利息
                             );
                             if(M('money')->where(array('uid'=>$in_user_id))->save($hdata)){
                                 moneyLog($in_user_id, $user_load_data['repay_money'], '标:'.$loan['id'].',期:'.($kk+1).'回报本息', 5);
                             }else{
                                 moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'应收本息金额'.$user_load_data['repay_money'].'没有入账需要手动打款', $in_user_id);
                             }
                             //罚息  
                             if($user_load_data['impose_money']>0){
                                 $fdata=array(
                                     "total_money"=>array('exp',"total_money+{$user_load_data['impose_money']}"),//总金额+还款额度
                                     "available_funds"=>array('exp',"available_funds+{$user_load_data['impose_money']}"),//可用额度+还款额度
                                 );
                                 if(M('money')->where(array('uid'=>$in_user_id))->save($fdata)){
                                     moneyLog($in_user_id, $user_load_data['impose_money'], '标:'.$loan['id'].',期:'.($kk+1).'罚息', 7);
                                 }else{
                                     moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'应收罚息金额'.$user_load_data['impose_money'].'没有入账需要手动打款', $in_user_id);
                                 }
                             }
                             //管理费
                             if($user_load_data['manage_money']>0){
                                 $mdata=array(
                                     "total_money"=>array('exp',"total_money-{$user_load_data['manage_money']}"),//总金额-管理费
                                     "available_funds"=>array('exp',"available_funds-{$user_load_data['manage_money']}"),//可用额度-管理费
                                 );
                                 if(M('money')->where(array('uid'=>$in_user_id))->save($mdata)){
                                     moneyLog($in_user_id, '-'.$user_load_data['manage_money'], '标:'.$loan['id'].',期:'.($kk+1).'管理费', 7);
                                     //给系统管理加钱
                                     $sdata=array(
                                         "total_money"=>array('exp',"total_money+{$user_load_data['manage_money']}"),//总金额+管理费
                                         "available_funds"=>array('exp',"available_funds+{$user_load_data['manage_money']}"),//可用额度+管理费
                                     );
                                     if(M('money')->where(array('uid'=>1))->save($sdata)){
                                         moneySysLog($in_user_id, $user_load_data['manage_money'],'用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'管理费', 1);
                                     }else{
                                         moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'管理费金额额'.$user_load_data['manage_money'].'扣除成功，但是没有打到管理员帐号', $in_user_id);
                                          
                                     }
                                 }else{
                                     moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'管理费金额额'.$user_load_data['manage_money'].'没有入账需要手动扣除', $in_user_id);
                                 }
                             }
                            
                              
                         }
                         
                           $mesg=array(
                               "url"=>$loan['url'],
                               "loan_name"=>$loan['sub_name'],
                               "money"=>$vv['month_repay_money']+$vv['impose_money'],
                              
                           );
                           $unext_loan = $user_loan_list[$kk+1];
                           	
                           if($unext_loan){
                               $mesg['next_time']=date("Y年m月d日",$unext_loan['repay_day']);
                               $mesg['next_money']=round($unext_loan['month_repay_money'],2);
                               remind(12,$in_user_id,$mesg);
                           }
                           else{
                              // $all_repay_money= round($GLOBALS['db']->getOne("SELECT (sum(repay_money)-sum(self_money) + sum(impose_money)) as shouyi FROM ".DB_PREFIX."deal_load_repay WHERE deal_id=".$v['deal_id']." AND user_id=".$v['user_id']),2);
                              $all_repay_money=round(M('loan_load_repay')->where("loan_id=".$v['loan_id']." AND user_id=".$v['user_id'])->getField('(sum(repay_money)-sum(self_money) + sum(impose_money)) as shouyi'),2);
                              
                             //  $all_impose_money = round($GLOBALS['db']->getOne("SELECT sum(impose_money) FROM ".DB_PREFIX."deal_load_repay WHERE deal_id=".$v['deal_id']." AND user_id=".$v['user_id']),2);
                               $all_impose_money=round(M('loan_load_repay')->where("loan_id=".$v['loan_id']." AND user_id=".$v['user_id'])->sum('impose_money'),2);
                               $mesg["all_repay_money"]=$all_repay_money;
                               $mesg["all_impose_money"]=$all_impose_money;
                               remind(13,$in_user_id,$mesg);
                           }
                          
                       }else{
                           moneyErrLog("用户回款失败", 0);
                       }
                   }
               }
           }
       }
       $root["status"] = 1;//0:出错;1:正确;
       $root["show_err"] = "操作成功!";
       return $root;
   }
   
   
   /**
    * 管理员还款操作
    */
   public function admin_repay_borrow_money($id,$ids){
       $loan=$this->getLoan();
       $time = time();
       //得到还款列表
       $loan_list=$this->get_deal_load_list();
       //这个地方需要判断，有时候是管理员还款那。
       $uid=$loan['user_id'];
       $money_mod=M('money');
       //用户的钱的
    //   $available_funds=$money_mod->where(array('uid'=>$uid))->getField('available_funds');
        
       //第一个循环的KEY 的值
       $first_key = -1;
       //是否找到了第一个KEY的值
       $find_first_key = false;
       //还款日期
       $repay_data = null;
       //需还多少
       $must_repay = 0;
       //管理费多少
       $must_fee = 0;
       //罚息
       $must_impose = 0;
        
       //普通逾期
       $pt_impose = array();
       //严重逾期
       $yz_impose = array();
       $k_repay_time = 0 ;
       //has_repay=1说明换过了
       foreach($loan_list as $k=>$v){
           if($v['has_repay']<>1){
               if(!$find_first_key){
                   $first_key = $k;
                   $find_first_key = true;
               }
               //本次循环的K 存在在 要换的数组内
               if(in_array($k,$ids)){
                   if($k_repay_time==0)
                       $k_repay_time = $v['repay_day'];
                   $repay_data[$k]['loan_id'] = $id;
                   $repay_data[$k]['user_id'] =$uid;
                   $repay_data[$k]['l_key']=$k+1;
                   //月还本息
                   $repay_data[$k]['repay_money'] = round($v['month_repay_money'],2);
                   $must_repay +=round($v['month_repay_money'],2);
   
                   //管理费
                   $repay_data[$k]['manage_money'] = round($v['month_manage_money'],2);
                   $must_fee += round($v['month_manage_money'],2);
   
                   //罚息
                   $repay_data[$k]['impose_money'] = round($v['impose_money'],2);
                   $must_impose += round($v['impose_money'],2);
   
                   $repay_data[$k]['status'] = 0;
                   if(date("Y-m-d",$v['repay_day']) == date("Y-m-d",$time)){
                       //准时
                       $repay_data[$k]['status'] = 1;
                   }elseif($v['impose_money'] >0){
                       //逾期
                       $repay_data[$k]['status'] = 2;
                       if($v['impose_day'] < 31){
                           //普通逾期
                           $pt_impose[] = $k;
                       }
                        
                       else{
                           //严重逾期
                           $repay_data[$k]['status'] = 3;
                           $yz_impose[] = $k;
                       }
                   }
                   //系统算出的日期
                   $repay_data[$k]['repay_time'] = $v['repay_day'];
                   //现在还款的日期
                   $repay_data[$k]['true_repay_time'] = $time;
               }
           }
       }
       $root["status"] = 0;//0:出错;1:正确;
        
       //判断是否按顺序
       if($first_key!=$ids[0]){
           $root["show_err"] = "还款失败，请按顺序还款！";
           return $root;
       }
   
        
 /*       if(($must_repay+$must_fee+$must_impose)>$available_funds){
           $root["show_err"] = "对不起，您的余额不足！";
           return $root;
       } */
       //还款次数
       $repay_count=0;
       //录入到还款列表
       foreach($repay_data as $k=>$v){
           //添加到还款列表内
           if(M('loan_repay')->add($v)){
               loanLog("标:".$id.",期:".($k+1).",系统垫付偿还本息".$v['repay_money'], $id,get_current_admin_id());
           
           /* 
               //成功了需要变动用户帐号的钱
               //偿还本息
               $hdata=array(
                   "total_money"=>array('exp',"total_money-{$v['repay_money']}"),//总金额- 还款额度
                   "available_funds"=>array('exp',"available_funds-{$v['repay_money']}"),//可用额度-还款额度
                   'stay_still'=>array('exp',"stay_still-{$v['repay_money']}"),//待 还资金-还款额度
               );
               if($money_mod->where(array('uid'=>$uid))->save($hdata)){
                   moneyLog($uid, '-'.$v['repay_money'],"标:".$id.",期:".($k+1).",偿还本息", 3);
                   //更新这个贷款的相关信息
                   $ldata=array(
                       'repay_money'=>array('exp',"repay_money+{$v['repay_money']}"),//换了了多少了      本金+利息
                       'repay_count'=>array('exp','repay_count+1'),//还款次数
                   );
                   if(M('loan')->where(array('id'=>$id))->save($ldata)){
                       loanLog("标:".$id.",期:".($k+1).",偿还本息".$v['repay_money'], $id);
                   };
               };
   
               //支付管理费用
               if($v['manage_money']>0){
                   $gdata=array(
                       "total_money"=>array('exp',"total_money-{$v['manage_money']}"),//总金额- 管理费用
                       "available_funds"=>array('exp',"available_funds-{$v['manage_money']}"),//可用额度-管理费用
                   );
                   if($money_mod->where(array('uid'=>$uid))->save($gdata)){
                       moneyLog($uid, '-'.$v['manage_money'],"标:".$id.",期:".($k+1).",支付管理费用", 7);
                       //给系统加钱
                       $sdata=array(
                           "total_money"=>array('exp',"total_money+{$v['manage_money']}"),
                           "available_funds"=>array('exp',"available_funds+{$v['manage_money']}")
                       );
                       //既然是系统扣款 就需要给系统增加钱了
                       if($money_mod->where(array("uid"=>1))->save($sdata)){
                           moneySysLog($uid, $v['manage_money'],"标:".$id.",期:".($k+1).",借款管理费",$uid);
                       }
                   };
               }
               //支付逾期费用
               if($v['impose_money']>0){
   
                   $idata=array(
                       "total_money"=>array('exp',"total_money-{$v['impose_money']}"),//总金额- 还款额度
                       "available_funds"=>array('exp',"available_funds-{$v['impose_money']}"),//可用额度-还款额度
                   );
                   if($money_mod->where(array('uid'=>$uid))->add($idata)){
                       moneyLog($uid, '-'.$v['impose_money'],"标:".$id.",期:".($k+1).",逾期罚息", 3);
                   };
               }
               //给这个标 加日志
               loanLog('用户支付:'.($k+1).'期还款本息:'.$v['repay_money'].'管理费:'.$v['manage_money'].'逾期费用'.$v['impose_money'], $id,$uid);
               //加积分
               integral($uid,8);*/
               $repay_count++;
            }else{
               $root["show_err"] = "对不起，处理数据失败请联系客服！";
               return $root;
           }
   
       }
   
   
       //如果逾期了 扣除信用额度
       //信用额度
       if($pt_impose){
           foreach($pt_impose as $pt_k=>$pt_v){
               integral($uid,10);
           }
       }elseif($yz_impose){
           foreach($yz_impose as $yz_k=>$yz_v){
               integral($uid,11);
           }
       }
       //下次还款
       $next_loan = $loan_list[$ids[count($ids)-1]+1];
       //还款成功了发送通知
       $content= array("url"=>$loan['url'],"name"=>$loan['sub_name'],"moeny"=>number_format(($must_repay+$must_fee+$must_impose),2)."元","date"=>date('Y年m月d日',time()));
       $cRate='\Common\Lib\Loan\\'.$loan['loantype'];
       if($next_loan){
           $exp=array("next_repay_date"=>date("Y年m月d日",$next_loan['repay_day']),"next_repay_moeny"=>number_format($next_loan['month_repay_money'],2)."元");
           //更新下次还款时间
           $bdata=array(
               'next_repay_time'=>$next_loan['repay_day'],//下次还款时间
           );
           if(M('loan')->where(array('id'=>$id))->save($bdata)){
               remind(10, $uid, $content+$exp);
           }else{
               moneyErrLog('用户还款钱已扣除,已还金额、还款次数没有更新,投标人未有到账', $id);
           }
       }
       else{
            
           //算利息
           $rate=$cRate::countRate($loan['borrow_amount'],$loan['rate']/100/12,$loan['repay_time']);
           //说明真换完了  还了的期数==总期数 AND 利息+本金 和还款数在正负10之间就算还完了
           if($loan['repay_nper']==($loan['repay_count']+$repay_count) && ($rate+$loan['borrow_amount']+10>$loan['repay_money']+$must_repay ||$rate+$loan['borrow_amount']-10<$loan['repay_money']+$must_repay)){
               //真还完了还有更改用户的状态
               $bdata=array(
                   'deal_status'=>9
               );
               if(M('loan')->where(array('id'=>$id))->save($bdata)){
                   //提现用户换完了
                   remind(11, $uid, $content);
                   //添加积分
                   integral($uid,9);
               }else{
                   moneyErrLog('用户还款钱已扣除,已还金额、还款次数、标状态没有更新,投标人未有到账', $id);
               }
           }else{
               moneyErrLog('用户还款钱已扣除,已还金额、还款次数没有更新,投标人未有到账,标下次还款日期为NULL', $id);
           }
   
       }
       //用户回款
       $user_load_ids=M('loan_load')->field('id,loan_id,user_id,money')->where('loan_id='.$id)->select();
   
       //获取当前借款所有转让的债权
       $tmp_user_transfer_loads=M('loan_load_transfer')->field('id,load_id,near_repay_time,t_user_id,user_id')->where('loan_id='.$id.' and status=1 and t_user_id > 0')->select();
   
       $user_transfer_loads = array();
       foreach($tmp_user_transfer_loads as $kk=>$vv){
           $user_transfer_loads[$vv['load_id']] = $vv;
       }
       unset($tmp_user_transfer_loads);
        
       //循环投标人的列表
       foreach($user_load_ids as $k=>$v){
           $v['repay_start_time'] = $loan['repay_start_time'];
           $v['repay_time'] = $loan['repay_time'];
           $v['rate'] = $loan['rate'];
           $v['u_key'] = $k;
           //得到投标人 还款状态列表
           $user_loan_list = $this->get_deal_user_load_list($v,$loan['loantype'],$loan['repay_nper']);
           $loan_user_info = array();
           foreach($user_loan_list as $kk=>$vv){
               //借入者已还款，但是没打款到借出用户中心
               if($vv['has_repay']==0){
                   $user_load_data['loan_id'] = $v['loan_id'];
                   $user_load_data['user_id'] = $v['user_id'];
                   $user_load_data['repay_time'] = $vv['repay_day'];
                   $user_load_data['true_repay_time'] = $time;
                   $user_load_data['is_site_repay'] = 1;
                   $user_load_data['status'] = 0;
   
                   //当默认还款时间小于当前还款时间  或者 指针小于等于当前还款的日期   如果用户收款钱不对了 肯定是这个地方的错。。。
                   if($vv['repay_day'] < $k_repay_time || $kk <= max($ids)){
                       //小于提前还款的话
                        
                       //本次还款的本息
                       $qimoney=$cRate::getMonthRepayMoney($v['money'],$loan['rate']/12/100,$loan['repay_time'],$kk+1);
                       $user_load_data['self_money']=$qimoney['yueBenJin'];
                        
                       $user_load_data['repay_money'] = $vv['month_repay_money'];
                       $user_load_data['manage_money'] = $vv['month_manage_money'];
                       $user_load_data['impose_money'] = $vv['impose_money'];
                       if($vv['status']>0)
                           $user_load_data['status'] = $vv['status'] - 1;
                       $user_load_data['l_key'] = $kk;
                       $user_load_data['u_key'] = $k;
   
                       // $GLOBALS['db']->autoExecute(DB_PREFIX."deal_load_repay",$user_load_data,"INSERT","","SILENT");
                       if(M('loan_load_repay')->add($user_load_data)){
                           $in_user_id=0;
                           if($user_load_data['impose_money'] !=0 || $user_load_data['manage_money'] !=0 || $user_load_data['repay_money']!=0){
   
                               $in_user_id  = $v['user_id'];
                               //如果是转让债权那么将回款打入转让者的账户
                               if($user_transfer_loads[$v['id']]['near_repay_time'] <= $vv['repay_day'] && $user_transfer_loads[$v['id']]['user_id'] == $v['user_id']){
                                   $in_user_id = $user_transfer_loads[$v['id']]['t_user_id'];
                               }
                               //给用户回款
   
                               //本息  此处按照原先设计少了一个  减去代收资金 代收利息  和已收利息
                               $hdata=array(
                                   "total_money"=>array('exp',"total_money+{$user_load_data['repay_money']}"),//总金额+ 还款额度
                                   "available_funds"=>array('exp',"available_funds+{$user_load_data['repay_money']}"),//可用额度+还款额度
                                   'due_in'=>array('exp',"due_in-{$qimoney['yueBenJin']}"),//代收资金-这一期本金
                                   'stay_interest'=>array('exp',"stay_interest-{$qimoney['yueLiXi']}"),//代收利息-这一期利息
                                   'make_interest'=>array('exp',"make_interest+{$qimoney['yueLiXi']}")//一赚利息+利息
                               );
                               if(M('money')->where(array('uid'=>$in_user_id))->save($hdata)){
                                   moneyLog($in_user_id, $user_load_data['repay_money'], '标:'.$loan['id'].',期:'.($kk+1).'回报本息', 5);
                               }else{
                                   moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'应收本息金额'.$user_load_data['repay_money'].'没有入账需要手动打款', $in_user_id);
                               }
                               //罚息
                               if($user_load_data['impose_money']>0){
                                   $fdata=array(
                                       "total_money"=>array('exp',"total_money+{$user_load_data['impose_money']}"),//总金额+还款额度
                                       "available_funds"=>array('exp',"available_funds+{$user_load_data['impose_money']}"),//可用额度+还款额度
                                   );
                                   if(M('money')->where(array('uid'=>$in_user_id))->save($fdata)){
                                       moneyLog($in_user_id, $user_load_data['impose_money'], '标:'.$loan['id'].',期:'.($kk+1).'罚息', 7);
                                   }else{
                                       moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'应收罚息金额'.$user_load_data['impose_money'].'没有入账需要手动打款', $in_user_id);
                                   }
                               }
                               //管理费
                               if($user_load_data['manage_money']>0){
                                   $mdata=array(
                                       "total_money"=>array('exp',"total_money-{$user_load_data['manage_money']}"),//总金额-管理费
                                       "available_funds"=>array('exp',"available_funds-{$user_load_data['manage_money']}"),//可用额度-管理费
                                   );
                                   if(M('money')->where(array('uid'=>$in_user_id))->save($mdata)){
                                       moneyLog($in_user_id, '-'.$user_load_data['manage_money'], '标:'.$loan['id'].',期:'.($kk+1).'管理费', 7);
                                       //给系统管理加钱
                                       $sdata=array(
                                           "total_money"=>array('exp',"total_money+{$user_load_data['manage_money']}"),//总金额+管理费
                                           "available_funds"=>array('exp',"available_funds+{$user_load_data['manage_money']}"),//可用额度+管理费
                                       );
                                       if(M('money')->where(array('uid'=>1))->save($sdata)){
                                           moneySysLog($in_user_id, $user_load_data['manage_money'],'用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'管理费', 1);
                                       }else{
                                           moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'管理费金额额'.$user_load_data['manage_money'].'扣除成功，但是没有打到管理员帐号', $in_user_id);
   
                                       }
                                   }else{
                                       moneyErrLog('用户'.$in_user_id.',标:'.$loan['id'].',期:'.($kk+1).'管理费金额额'.$user_load_data['manage_money'].'没有入账需要手动扣除', $in_user_id);
                                   }
                               }
   
   
                           }
                            
                           $mesg=array(
                               "url"=>$loan['url'],
                               "loan_name"=>$loan['sub_name'],
                               "money"=>$vv['month_repay_money']+$vv['impose_money'],
   
                           );
                           $unext_loan = $user_loan_list[$kk+1];
   
                           if($unext_loan){
                               $mesg['next_time']=date("Y年m月d日",$unext_loan['repay_day']);
                               $mesg['next_money']=round($unext_loan['month_repay_money'],2);
                               remind(12,$in_user_id,$mesg);
                           }
                           else{
                               // $all_repay_money= round($GLOBALS['db']->getOne("SELECT (sum(repay_money)-sum(self_money) + sum(impose_money)) as shouyi FROM ".DB_PREFIX."deal_load_repay WHERE deal_id=".$v['deal_id']." AND user_id=".$v['user_id']),2);
                               $all_repay_money=round(M('loan_load_repay')->where("loan_id=".$v['loan_id']." AND user_id=".$v['user_id'])->getField('(sum(repay_money)-sum(self_money) + sum(impose_money)) as shouyi'),2);
   
                               //  $all_impose_money = round($GLOBALS['db']->getOne("SELECT sum(impose_money) FROM ".DB_PREFIX."deal_load_repay WHERE deal_id=".$v['deal_id']." AND user_id=".$v['user_id']),2);
                               $all_impose_money=round(M('loan_load_repay')->where("loan_id=".$v['loan_id']." AND user_id=".$v['user_id'])->sum('impose_money'),2);
                               $mesg["all_repay_money"]=$all_repay_money;
                               $mesg["all_impose_money"]=$all_impose_money;
                               remind(13,$in_user_id,$mesg);
                           }
   
                       }else{
                           moneyErrLog("用户回款失败", 0);
                       }
                   }
               }
           }
       }
       $root["status"] = 1;//0:出错;1:正确;
       $root["show_err"] = "操作成功!";
       return $root;
   }
    
   
   /**
    * 用户还款列表
    * array $user_load_info 用户投标记录
    * int $repay_time_type 表的类型 0天表 1正常标
    * int $true_time 如果不等于false 那么该时间为所输入的日期 以输入的日期来判断是否罚息
    */
   function get_deal_user_load_list($user_load_info,$loantype,$repay_nper,$true_time = false){
       if($true_time!==false)
           $time = $true_time;
       else
           $time = time();
       
       $true_repay_time = $user_load_info['repay_time'];
       
       $repay_day = $user_load_info['repay_start_time'];
       $cRate='\Common\Lib\Loan\\'.$loantype;
       for($i=0;$i<$repay_nper;$i++){
           
           $loan_list[$i]['impose_day'] = 0;
           /**
            * status 1提前,2准时还款，3逾期还款 4严重逾期
            */
           $loan_list[$i]['status'] = 0;
           
           $repay_day = $loan_list[$i]['repay_day']=$user_load_info['repay_start_time']=$cRate::next_replay_month($user_load_info['repay_start_time'],0,$user_load_info['repay_time']);
           //每期本息
           $month_repay_money= $cRate::getMonthRepayMoney($user_load_info['money'],$user_load_info['rate']/100/12,$user_load_info['repay_time'],$i+1);
           //每期实际货款金额 =利息+本金
           $loan_list[$i]['month_repay_money'] = $month_repay_money['yueLiXi']+$month_repay_money['yueBenJin'];
      
           //判断是否已经还完
           $repay_item = array();
        //   $repay_item = $GLOBALS['db']->getRow("SELECT * FROM ".DB_PREFIX."deal_load_repay USE INDEX(idx_0) WHERE user_id=".$user_load_info['user_id']." AND deal_id=".$user_load_info['deal_id']." AND repay_time=".$repay_day." AND l_key=".$i." AND u_key=".$user_load_info['u_key']);
           $repay_item=M('loan_load_repay')->where("user_id=".$user_load_info['user_id']." AND loan_id=".$user_load_info['loan_id']." AND repay_time=".$repay_day." AND l_key=".$i." AND u_key=".$user_load_info['u_key'])->find();
          
           $loan_list[$i]['true_repay_time'] = $repay_item['true_repay_time'];
                 
           //管理费  只是利息的管理费
          $loan_list[$i]['month_manage_money'] = $month_repay_money['yueLiXi']* trim(C('sys_borrow_interest_fee')) /100;
        
           //已还
           $loan_list[$i]['month_has_repay_money'] = 0;
           if($repay_item){
               $loan_list[$i]['true_repay_time'] = $repay_item['true_repay_time'];
               $loan_list[$i]['month_has_repay_money'] = $repay_item['repay_money'];
               	
               $loan_list[$i]['has_repay'] = 1;
               $loan_list[$i]['status'] = $repay_item['status']+1;
               $loan_list[$i]['month_repay_money'] -=$loan_list[$i]['repay_money'];
               $loan_list[$i]['impose_money'] = $repay_item['impose_money'];
               	
               //真实还多少
               $loan_list[$i]['month_has_repay_money_all'] = $loan_list[$i]['month_has_repay_money'] + $user_load_info['month_manage_money']+$loan_list[$i]['impose_money'];
               	
           }
           else{
               $loan_list[$i]['impose_money'] =0;              
               //判断是否罚息
               if($time > ($repay_day + 23*3600 + 59*60 + 59) && $loan_list[$i]['month_repay_money'] > 0){
                   //晚多少天
                   //获得真正的还款
               //    $true_time = $GLOBALS['db']->getOne("SELECT true_repay_time FROM ".DB_PREFIX."deal_repay WHERE deal_id=".$user_load_info['deal_id']." AND repay_time=".$repay_day." ");
                   $true_time=M('loan_repay')->where("loan_id=".$user_load_info['loan_id']." AND repay_time=".$repay_day)->getField('true_repay_time');
                   if($true_time == 0){
                       $true_time = $time;
                   }
                   $time_span = strtotime(date("Y-m-d",$true_time));
                   $next_time_span = strtotime(date("Y-m-d",$repay_day));
                   $day  = ceil(($time_span-$next_time_span)/24/3600);
   
                   if($day >0){
                       
                       //普通逾期
                       $loan_list[$i]['status'] = 3;
                       $impose_fee = trim(C('sys_penaltyint'));
                     
                       if($day >= 31){//严重逾期
                           $loan_list[$i]['status'] = 4;                          
                           $impose_fee = trim(C('sys_penaltyints'));                         
                       }	
                    //罚息
                       $loan_list[$i]['impose_money'] = $loan_list[$i]['month_repay_money']*$impose_fee*$day/100;
                        
                  }
               }
           }
   
   
       }  
    
       return $loan_list;
   }
   
   /**
    * 处理贷款信息
    * @param unknown $_lists
    */
   private function  deal_with($_lists){
       foreach ($_lists as $key=>$deal){
           //借款金额： froat
           $_lists[$key]['borrow_amount_format']=format_price($deal['borrow_amount']/10000).'万';
           	
           //完成度 完成比例
           // 0 待审核1审核通过2审核失败3用户取消4流标5满标待审核6满标审核失败	7还款中8逾期中9已完成
           if($deal['deal_status']==1 || $deal['deal_status']==4 || $deal['deal_status']==5 || $deal['deal_status']==6  ){
               $_lists[$key]['progress_point'] = $deal['load_money']/$deal['borrow_amount']*100;
   
           }elseif ($deal['deal_status']==7 || $deal['deal_status']==8 || $deal['deal_status']==9){
               //总钱数
               $deal['remain_repay_money'] = $deal['borrow_amount'] + $deal['month_repay_money'];
               $_lists[$key]['progress_point'] =$deal['repay_money']/$deal['remain_repay_money']*100;
               	
           }else{
               $_lists[$key]['progress_point']=0;
           }
            
           if($deal['deal_status']==7){
               $c=$deal['loantype'];
               $class='\Common\Lib\Loan'.'\\'.$c;
               //下一个还款日    //开始还款日期  借款时间  下一个还款日期
               if($_lists[$key]['next_repay_time']<=0){                     //$repay_start_time,$last_repay_time,$next_repay_time,$repay_time
                   $_lists[$key]['next_repay_time']=$class::next_replay_month($deal['repay_start_time'],0,$deal["repay_time"]);
               }
               //月还款额： 0
               $monthrepay=$class::getMonthRepayMoney($deal['borrow_amount'],$deal['rate']/100/12,$deal['repay_time'],$deal['repay_count']+1);
   
               $month_repay_money=$monthrepay['yueLiXi']+$monthrepay['yueBenJin'];
               //月管理费
               $month_manage=$class::getNperManage(C('sys_borrow_manage_fee'));
               $month_manage_money=$deal['borrow_amount']*$month_manage/100;
               $_lists[$key]['true_month_repay_money'] = $month_repay_money + $month_manage_money;
               $_lists[$key]['true_month_repay_money_format']=format_price( $_lists[$key]['true_month_repay_money']);
               $time=time();
   
               //罚息
               $_lists[$key]['impose_money_format']=format_price(0);
               if($_lists[$key]['next_repay_time'] - $time <0){
                   //晚多少天
                   $time_span = strtotime(date("Y-m-d",$time));
                   $next_time_span = strtotime(date("Y-m-d",$_lists[$key]['next_repay_time']));
                   $day  = ceil(($time_span-$next_time_span)/24/3600);
   
                   $impose_fee = trim(C('sys_penaltyint'));
                   $manage_impose_fee = trim(C('sys_overdue'));
                   //判断是否严重逾期
                   if($day >= 31){
                       $impose_fee = trim(C('sys_penaltyints'));
                       $manage_impose_fee = trim(C('sys_overdues'));
                   }
                   //罚息
                   $deal['impose_money'] = $month_repay_money*$impose_fee*$day/100;
                   //罚管理费
                   $deal['manage_impose_money'] = $month_repay_money*$manage_impose_fee*$day/100;
                   $impose_money= $deal['manage_impose_money']+$deal['impose_money'];
                   $_lists[$key]['impose_money_format']=format_price($impose_money);
   
               }
           }
           	
       }
       return $_lists;
   }
   //获取正在进行的投标列表
    function deal_with_list($_lists)
    {
        $time=time();
        foreach ($_lists as $key=>$deal){
            
            //判断是否已经开始
            $_lists[$key]['is_wait'] = 0;
            
            if($deal['start_time'] > $time){
                $_lists[$key]['is_wait'] = 1;
                $deal['remain_time'] = $deal['start_time'] - $time;
            }
            else{
                $deal['remain_time'] =$deal['enddate'] - $time;
            }
            
            //借款金额： froat
            $_lists[$key]['borrow_amount_format']=format_price($deal['borrow_amount']/10000).'万';
            $_lists[$key]['rate_foramt'] = number_format($deal['rate'],2);
            $_lists[$key]['rate_foramt_w'] = number_format($deal['rate'],2)."%";
         
            
            //判断是否流标
            if($deal['deal_status']==1 && $deal['enddate']<$time){
               $_lists[$key]['deal_status']= $deal['deal_status']=4;              
            }
            
            //完成度 完成比例
            // 0 待审核1审核通过2审核失败3用户取消4流标5满标待审核6满标审核失败	7还款中8逾期中9已完成
            if($deal['deal_status']==1 || $deal['deal_status']==4 || $deal['deal_status']==5 || $deal['deal_status']==6  ){
                $_lists[$key]['progress_point'] = $deal['load_money']/$deal['borrow_amount']*100;
                 
            }elseif ($deal['deal_status']==7 || $deal['deal_status']==8 || $deal['deal_status']==9){
                $c=$deal['loantype'];
                $class='\Common\Lib\Loan'.'\\'.$c;
                //总利息
                $count_rate=$class::countRate($deal['borrow_amount'],$deal['rate']/100/12,$deal['repay_time']);
                //总钱数
                $deal['remain_repay_money'] = $deal['borrow_amount'] + $count_rate;
           
                $_lists[$key]['progress_point'] =$deal['repay_money']/$deal['remain_repay_money']*100;
        
            }else{
                $_lists[$key]['progress_point']=0;
            }  
            //用户等级图片
            $_lists[$key]['level_img']= get_user_level($deal['score'],'img'); 
            //url
            //var_dump($_lists[$key]['borrow_type']);
            if ($_lists[$key]['borrow_type']==0) {
            	$_lists[$key]['url']=UU('Loan/index/NewbieDeal',array('id'=>$deal['id']));
            }else{
            	$_lists[$key]['url']=UU('Loan/index/deal',array('id'=>$deal['id'])); 
            }
        }
       return $_lists;
    		
    	
    }
    //转让列表    
    function deal_with_transfer($list){   
        //pe($list);

        //获取转让列表     
        foreach($list as $k=>$v){
            //借贷人的ID            
         
            $list[$k]['user_name'] = M('users')->where(array('id'=>$v['user_id']))->getField('user_login');
            	
     
            if($v['t_user_id'] > 0){
              $list[$k]['tuser'] =  M('users')->where(array('id'=>$v['t_user_id']))->getField('user_login');
            }else{
                $list[$k]['tuser'] = null; 
            }; 
             
    
             
            $list[$k]['url'] = UU('loan/index/t_details',array('id'=>$v['id']));
        
             
            //剩余期数
            $list[$k]['how_much_month'] = $v['repay_nper']-$v['repay_count'];
             
            
            $c=$v['loantype'];
            $class='\Common\Lib\Loan'.'\\'.$c;
            
           $shengyu=$class::get_shengyu($v['load_money'],$v['rate']/12/100,$v['repay_time'],$v['repay_count'],$v['repay_nper']);
          
            //本息还款金额
          //  $list[$k]['month_repay_money'] = pl_it_formula($v['load_money'],$v['rate']/12/100,$v['repay_time']);
            //剩余多少钱未回
            $list[$k]['all_must_repay_money'] = $shengyu['sy_benjin']+$shengyu['sy_lixi'];
             
            //剩余多少本金未回
            $list[$k]['left_benjin'] = $shengyu['sy_benjin'];
            $list[$k]['left_benjin_format'] = format_price($list[$k]['left_benjin']/10000)."万";
             
            //剩多少利息
            $list[$k]['left_lixi'] = $shengyu['sy_lixi'];
            $list[$k]['left_lixi_format'] = format_price($list[$k]['left_lixi']);
             
            //剩余时间  =下次还款时间- 现在的时间
            $list[$k]['remain_time'] =$v['near_repay_time'] - time() + 24*3600 - 1;
           
            $list[$k]['remain_time_format'] = remain_time($list[$k]['remain_time']);
             
        
            $list[$k]['near_repay_time_format'] = date("Y-m-d",$v['near_repay_time']);
            $list[$k]['transfer_amount_format'] = format_price($v['transfer_amount']/10000)."万";
             
            //转让收益
            $list[$k]['transfer_income'] =  $list[$k]['all_must_repay_money']-$list[$k]['transfer_amount'];
            $list[$k]['transfer_income_format'] =  format_price($list[$k]['transfer_income']);
             
            //
            $list[$k]['transfer_time_format'] = date("Y-m-d",$v['transfer_time']);
            
            $list[$k]['level_img']= get_user_level($v['dscore'],'img');
            
             
        }
       return  $list;
        
    }
    //转让详情
    function gettransfer($transfer){
       
            //下个还款日
            $transfer['next_repay_time_format'] = date("Y-m-d",$transfer['near_repay_time']);
            
            //借贷人的ID             
            $transfer['user_name'] = M('users')->where(array('id'=>$transfer['user_id']))->getField('user_login');
             
             
            if($transfer['t_user_id'] > 0){
               $transfer['tuser'] =  M('users')->where(array('id'=>$transfer['t_user_id']))->getField('user_login');
            }else{
                $transfer['tuser'] = null;
            };
             
    
             
           $transfer['url'] = UU('loan/index/t_details',array('id'=>$transfer['id']));
    
             
            //剩余期数
           $transfer['how_much_month'] = $transfer['repay_nper']-$transfer['repay_count'];
             
    
            $c=$transfer['loantype'];
            $class='\Common\Lib\Loan'.'\\'.$c;
           
    
            $shengyu=$class::get_shengyu($transfer['load_money'],$transfer['rate']/12/100,$transfer['repay_time'],$transfer['repay_count'],$transfer['repay_nper']);
    
            //本息还款金额
            // $transfer['month_repay_money'] = pl_it_formula($v['load_money'],$v['rate']/12/100,$v['repay_time']);
            //剩余多少钱未回
           $transfer['all_must_repay_money'] = $shengyu['sy_benjin']+$shengyu['sy_lixi'];
             
            //剩余多少本金未回
           $transfer['left_benjin'] = $shengyu['sy_benjin'];
           $transfer['left_benjin_format'] = format_price($transfer['left_benjin']/10000)."万";
             
            //剩多少利息
           $transfer['left_lixi'] = $shengyu['sy_lixi'];
           $transfer['left_lixi_format'] = format_price($transfer['left_lixi']);
            
            //剩余时间  =下次还款时间- 现在的时间
           $transfer['remain_time'] =$transfer['near_repay_time'] - time() + 24*3600 - 1;
             
           $transfer['remain_time_format'] = remain_time($transfer['remain_time']);
             
    
           $transfer['near_repay_time_format'] = date("Y-m-d",$transfer['near_repay_time']);
           $transfer['transfer_amount_format'] = format_price($transfer['transfer_amount']/10000)."万";
             
            //转让收益
           $transfer['transfer_income'] = $transfer['all_must_repay_money']-$transfer['transfer_amount'];
           $transfer['transfer_income_format'] =  format_price($transfer['transfer_income']);
             
            //
           $transfer['transfer_time_format'] = date("Y-m-d",$transfer['transfer_time']);
    
           $transfer['level_img']= get_user_level($transfer['dscore'],'img');
    
             
       // pe($transfer);
        return  $transfer;
    
    }
    
    function dotrans($id,$paypassword){
   
        $root = array();
        $root["status"] = 0;//0:出错;1:正确;       
  
        
    
        if(sp_password($paypassword)!=$_SESSION['user']['payment_pass']){
            $root["show_err"] = '支付密码错误';
            return $root;
        }        
        
      
        $deal_id =M('loan_load_transfer')->where(array('id'=>$id))->getField('loan_id');      
        if($deal_id==0){
            $root["show_err"] = "不存在的债权";
            return $root;
        }else{
            syn_deal_status($deal_id);
        }
        
       
       /*  
        $condition = ' AND dlt.id='.$id.' AND d.deal_status = 4 and d.is_effect=1 and d.is_delete=0 and d.loantype = 0 and d.repay_time_type =1 and  d.publish_wait=0 ';
        $union_sql = " LEFT JOIN ".DB_PREFIX."deal_load_transfer dlt ON dlt.deal_id = dl.deal_id ";
        
        $sql = 'SELECT dlt.load_id,dlt.id,dlt.t_user_id,dlt.transfer_amount,dlt.user_id,dlt.near_repay_time,d.next_repay_time,d.last_repay_time,d.rate,d.repay_start_time,d.repay_time,dlt.load_money,dlt.id as dltid,dlt.status as tras_status,dlt.t_user_id,dlt.transfer_amount,dlt.create_time as tras_create_time,d.user_id as duser_id FROM 
            '.DB_PREFIX.'deal_load dl LEFT JOIN 
            '.DB_PREFIX.'deal d ON d.id = dl.deal_id '.$union_sql.' WHERE 1=1 '.$condition;
        
        $transfer = $GLOBALS['db']->getRow($sql); */
        
        $where=array(
            'loan_load_transfer.id'=>$id,
            'Loan.deal_status'=>array('egt',7),
            'Loan.is_delete'=>0 ,
            'Loan.publish_wait'=>0
        );
        $transfer=D('TransferlistsView')->where($where)->find();   
        if($transfer){
            
            $uid=get_current_userid();
          
            if($transfer['user_id']==$uid){
                $root["show_err"] = "不能购买自己转让的债权";
                return $root;
            }
            	
            if($transfer['duser_id']==$uid){
                $root["show_err"] = "不能购买自己的的借贷债权";
                return $root;
            }
            	
            if($transfer['status']==0){
                $root["show_err"] = "债权已撤销";
                return $root;
            }
            	
            if(intval($transfer['t_user_id'])>0){
                $root["show_err"] = "债权已转让";
                return $root;
            }
            $c=$transfer['loantype'];
            $class='\Common\Lib\Loan'.'\\'.$c;
        
            //下个还款日
            if(intval($transfer['next_repay_time']) == 0){
                
                $transfer['next_repay_time'] = $class::next_replay_month($transfer['repay_start_time'],0,$transfer['repay_time']);
            }
            	
            if($transfer['next_repay_time'] - time()  + 24*3600 - 1 <= 0){
                $root["show_err"] = "债权转让已过期";
                return $root;
            }
            
            $available_funds=M('money')->where(array('uid'=>$uid))->getField("available_funds");
             if(floatval($transfer['transfer_amount']) > floatval($available_funds)){
                $root["show_err"] = "账户余额不足";
                return $root;
            }
          //处理下 这个借款的 数组 主要是为了要下 剩余的 本金和利息       
         
         $shengyu=$class::get_shengyu($transfer['load_money'],$transfer['rate']/12/100,$transfer['repay_time'],$transfer['repay_count'],$transfer['repay_nper']);
      
         //剩余多少本金未回
         $transfer['left_benjin'] = $shengyu['sy_benjin'];
         //剩多少利息
         $transfer['left_lixi'] = $shengyu['sy_lixi']; 
         
     
         $status= M('loan_load_transfer')->where(array('id'=>$id,'t_user_id'=>0,'status'=>1,'_string'=>"near_repay_time- ".time()." + 24*3600 - 1>0"))->save(array('t_user_id'=>$uid,'transfer_time'=>time()));
         
      
            if($status){ 
                $money_mod=M('money');
                //承接人扣除转让费         
                $cdata=array(
                    'total_money'=>array('exp',"total_money-{$transfer['transfer_amount']}"),//总资金
                    'available_funds'=>array('exp',"available_funds-{$transfer['transfer_amount']}"),//可用资金
                    'due_in'=>array('exp',"due_in+{$transfer['left_benjin']}"),//待收资金  这里的代收资金是 转让人的 剩余本金
                    'stay_interest'=>array('exp',"stay_interest+{$transfer['left_lixi']}")//代收利息 转让人的剩余利息
                );
                
                if($money_mod->where(array("uid"=>$uid))->save($cdata)){
                    moneyLog($uid, '-'.$transfer['transfer_amount'], "支付债:".$id.'承接金'.$transfer['transfer_amount'], 3,$transfer['user_id']);
                }else{
                    $root["show_err"] = "支付失败";
                    return $root;
                }
               //转让人接受转让费
                $adata=array(
                    'total_money'=>array('exp',"total_money+{$transfer['transfer_amount']}"),//总资金
                    'available_funds'=>array('exp',"available_funds+{$transfer['transfer_amount']}"),//可用资金
                    'due_in'=>array('exp',"due_in-{$transfer['left_benjin']}"),//待收资金  这里的代收资金是- 转让的 剩余本金
                    'stay_interest'=>array('exp',"stay_interest-{$transfer['left_lixi']}")//代收利息 -转让的剩余利息
                );
                if($money_mod->where(array("uid"=>$transfer['user_id']))->save($adata)){
                    moneyLog($transfer['user_id'], $transfer['transfer_amount'], "收到债:".$id.'转让金'.$transfer['transfer_amount'], 5,$uid);
                    //扣除转让人的手续费
                    $sys_equity_transfer=C("sys_equity_transfer");
                    if($sys_equity_transfer){
                        $transfer_fee = $transfer['transfer_amount']*(float)$sys_equity_transfer/100;
                        $transfer_fee=floor($transfer_fee*100)/100;
                        $fdata=array(
                            'total_money'=>array('exp',"total_money-{$transfer_fee}"),//总资金
                            'available_funds'=>array('exp',"available_funds-{$transfer_fee}"),//可用资金
                        );
                        if($money_mod->where(array("uid"=>$transfer['user_id']))->save($fdata)){
                            moneyLog($transfer['user_id'], $transfer_fee, "支付债:".$id.'债权转让手续费'.$transfer_fee,7);
                            //给系统打钱
                            $sdata=array(
                                "total_money"=>array('exp',"total_money+$transfer_fee"),
                                "available_funds"=>array('exp',"available_funds+$transfer_fee")
                            );
                            //既然是系统扣款 就需要给系统增加钱了
                            if($money_mod->where(array("uid"=>1))->save($sdata)){
                                moneySysLog($transfer['user_id'], $transfer_fee, "股权转让手续费", 1);
                            }
                            
                        }
                        
                   }                
                
                }else{
                    moneyErrLog('债权转让'.$uid.'债权已更新,已经扣款,未能给转让人'.$transfer['user_id'].'加钱'.$transfer['transfer_amount'].'需要手动加钱', $uid);
                    $root["show_err"] = "给转让方支付转让金失败";
                    return $root;
                }
                //发送消息
                $param=array(
                    'transfer_time'=>date('Y年m月d日 H:i',time()),
                    'transfer_id'=>$transfer['id'],
                    'url'=>UU('loan/index/t_details',array('id'=>$id)),
                    'loan_id'=>$transfer['load_id'],
                    'transfer_amount'=>$transfer['transfer_amount']                   
                );
                remind(9,$transfer['user_id'],$param);        
                $root["status"] = 1;//0:出错;1:正确;
                $root["show_err"] = "转让成功";
                return $root;
            }
        }          
        
        
    }
    
    public function getCount($user_id){
        //总借款数
        $data['borrow_amount'] =getOneUseIndex("SELECT sum(borrow_amount) FROM __LOAN__  use index(idx_0) WHERE deal_status in(7,8,9) AND user_id=$user_id AND  is_delete = 0 ");
        //已还本息
        $data['repay_amount'] = getOneUseIndex("SELECT sum(repay_money)  FROM __LOAN_REPAY__ WHERE user_id=$user_id");
        //发布借款笔数
        $data['deal_count'] =getOneUseIndex("SELECT count(*) FROM __LOAN__ use index(idx_1) WHERE user_id=$user_id AND  is_delete = 0 ");
        //成功借款笔数
        $data['success_deal_count'] = getOneUseIndex("SELECT count(*) FROM __LOAN__ use index(idx_0) WHERE deal_status in (7,8,9) AND user_id=$user_id AND  is_delete = 0 ");
        
        //还清笔数
        $data['repay_deal_count'] = getOneUseIndex("SELECT count(*) FROM __LOAN__ use index(idx_0) WHERE deal_status = 9 AND user_id=$user_id  and is_delete = 0  ");
        //未还清笔数
        $data['wh_repay_deal_count'] = $data['success_deal_count'] - $data['repay_deal_count'];
        //提前还清笔数
        $data['tq_repay_deal_count'] = getOneUseIndex("SELECT count(*) FROM __LOAN_INREPAY_REPAY__ WHERE user_id=$user_id");
        //正常还清笔数
        $data['zc_repay_deal_count'] = getOneUseIndex("SELECT count(*) FROM __LOAN__ use index(idx_0) WHERE deal_status = 9 AND user_id=$user_id   and is_delete = 0  AND id not in (SELECT id FROM __LOAN_INREPAY_REPAY__ WHERE user_id=$user_id)");
        
        //加权平均借款利率
        $data['avg_rate'] = getOneUseIndex("SELECT sum(rate)/count(*) FROM __LOAN__ use index(idx_0) WHERE deal_status in (7,8,9) AND user_id=$user_id AND  is_delete = 0   ");
        //平均每笔借款金额
        $data['avg_borrow_amount'] = $data['borrow_amount'] / $data['success_deal_count'];
         
        //逾期本息
        $data['yuqi_amount'] = getOneUseIndex("SELECT (sum(repay_money) + sum(impose_money)) as new_amount FROM __LOAN_REPAY__ use index(idx_0) WHERE user_id=$user_id AND status in(2,3)");
        //逾期费用
        $data['yuqi_impose'] = getOneUseIndex("SELECT sum(repay_money) FROM __LOAN_REPAY__  use index(idx_0) WHERE user_id=$user_id AND status in(2,3)");
         
        //逾期次数
        $data['yuqi_count'] = getOneUseIndex("SELECT count(*) FROM __LOAN_REPAY__  use index(idx_0) WHERE user_id=$user_id AND status = 2");
        //严重逾期次数
        $data['yz_yuqi_count'] = getOneUseIndex("SELECT count(*) FROM __LOAN_REPAY__  use index(idx_0) WHERE user_id=$user_id AND status = 3");
        
        //待还本息
        $data['need_repay_amount'] = 0;
        //待还管理费
        $data['need_manage_amount'] = 0;
        //  $deals = $GLOBALS['db']->getAll("SELECT id FROM ".DB_PREFIX."deal  use index(idx_0) WHERE deal_status in(4,5) AND user_id=$user_id AND publish_wait = 0");
        $deals=M()->query("SELECT id FROM __LOAN__ use index(idx_0) WHERE deal_status in(7,8,9) AND user_id=$user_id AND is_delete = 0");
        if($deals){
            foreach($deals as $k=>$v){
                $res=M('loan')->find($v['id']);            
                $loan=$this->get_deal_load_list($this->getLoan($res));
                foreach($loan as $kk=>$vv){
                    if($vv['has_repay']==0)
                    {
                        $data['need_repay_amount'] +=$vv['month_repay_money'];
                        $data['need_manage_amount'] +=$vv['month_manage_money'];
                    }
                }
            }
        }
         
        $load_infos = M()->query("SELECT (sum(repay_money)-sum(self_money)) as load_earnings,sum(repay_money) AS load_repay_money FROM __LOAN_LOAD_REPAY__  WHERE user_id=$user_id");
        $load_info=current($load_infos);
        //已赚利息
        $data['load_earnings'] = $load_info['load_earnings'];
        //已回收本息
        $data['load_repay_money'] = $load_info['load_repay_money'];
         
        //已赚提前还款违约金
        $data['load_tq_impose'] = getOneUseIndex("SELECT sum(impose_money) FROM __LOAN_LOAD_REPAY__ use index(idx_1) WHERE status = 0 AND user_id=$user_id");
        //已赚逾期罚息
        $data['load_yq_impose'] = getOneUseIndex("SELECT sum(impose_money) FROM __LOAN_LOAD_REPAY__  use index(idx_1) WHERE status in (2,3) AND user_id=$user_id");
         
        //借出加权平均收益率
        $data['load_avg_rate'] = getOneUseIndex("SELECT sum(rate)/count(*) FROM __LOAN_LOAD_REPAY__  dl LEFT JOIN __LOAN__  d ON d.id=dl.loan_id WHERE d.deal_status in(7,8,9) AND dl.user_id=$user_id  and d.is_delete = 0 ");
         
        //总借出笔数
        $u_loads = M()->query("SELECT count(*) as load_count,sum(dl.money) as load_money FROM __LOAN_LOAD__ dl LEFT JOIN __LOAN__ d ON d.id=dl.loan_id WHERE d.deal_status in(7,8,9) AND dl.user_id=$user_id  and d.is_delete = 0 ");
        $u_load=current($u_loads);
        $data['load_count'] = $u_load['load_count'];
        //总借出金额
        $data['load_money'] = $u_load['load_money'];
        
         
        //已回收笔数
        $data['reback_load_count'] = getOneUseIndex("SELECT count(*)  FROM __LOAN_LOAD__ dl LEFT JOIN __LOAN__ d ON d.id=dl.loan_id WHERE d.deal_status =7 AND dl.user_id=$user_id  ");
        //待回收笔数
        $data['wait_reback_load_count'] = $data['load_count'] - $data['reback_load_count'];
         
        //待回收本息
        $data['load_wait_repay_money'] = 0;
        //获取跟用户相关的还款中的标
         
        //全部需回收的本息
        $all_load_wait_repay_money = 0;
        $user_loads  = M()->query("SELECT dl.id,dl.money,d.loantype,d.repay_time,d.rate FROM __LOAN_LOAD__ dl LEFT JOIN __LOAN__ d ON d.id=dl.loan_id WHERE dl.is_repay=0 and dl.user_id =$user_id AND ( d.deal_status = 7 or d.deal_status = 8) and d.is_delete = 0  ");
         
        foreach($user_loads as $k=>$v){
            $cRate='\Common\Lib\Loan\\'.$v['loantype'];
            $all_load_wait_repay_money +=$v['money']+$cRate::countRate($v['money'],$v['rate']/12/100,$v['repay_time']);
        }
        //已回收的
        $load_repay_money = getOneUseIndex("SELECT sum(repay_money) AS load_repay_money FROM __LOAN_LOAD_REPAY__ WHERE user_id=$user_id AND loan_id in (SELECT id FROM __LOAN__ WHERE (deal_status =7 or deal_status =8 or deal_status =9) and is_delete=0  )");
        $data['load_wait_repay_money'] = round($all_load_wait_repay_money,2) - round($load_repay_money,2);
         
        return $data;
    }
    //同步标状态 至少有在打开首页的时候才执行的
    public function syn_deal_status(){
        //更改过期状态
        $time=time();
       $liubiao= M('loan')->where(array('is_delete'=>0,'deal_status'=>1,'enddate'=>array('lt',$time)))->select();
    
       $money_mod=M('money');      
      foreach ($liubiao as $kk=>$vv){       
          $loan_load=M('loan_load')->where(array('loan_id'=>$vv['id']))->select(); 
           //从用户帐号恢复钱
           foreach ($loan_load as $v){
               $mdata=array(       
                   'freeze_funds'=>array('exp',"freeze_funds-{$v['money']}"),//冻结资金-投标额度
                   'available_funds'=>array('exp',"available_funds+{$v['money']}"),//可用资金+投标资金
               );
               if(!$money_mod->where(array('uid'=>$v['user_id']))->save($mdata)){                  
                   moneyErrLog('贷款标id:'.$liubiao['id'].'流标,恢复投标用户:'.$v['user_id'].'冻结资金失败',0);
               }else{
                   //更新用户日志
                   moneyLog($v['user_id'], $v['money'], '标号id:'.$v['loan_id'].'流标,恢复冻结资金'.$v['money'], 8);
               }
           }
           //编辑用户投标的状态
           M('loan_load')->where(array('loan_id'=>$vv['id']))->save(array('is_repay'=>1));
           
           $deal=$this->getLoan($vv);
           //发送流标通知 is_send_bad_msg   bad_time
           $param= array("loan_name"=>$deal['sub_name'],"url"=>$deal['url'],"time"=>date('Y-m-d H:i',$time));
           remind(16,$deal['user_id'],$param);
           //改变标的状态
           M('loan')->where(array('id'=>$vv['id']))->save(array('deal_status'=>4,'is_send_bad_msg'=>1,'bad_time'=>$time));
         
          
      }
      //三日内还款的提醒  send_half_msg_time  发送3天内还款时间
       $SanTian=24*60*60*3;
      $SanRiTiXing=M('loan')->where(array('deal_status'=>7,'_string'=>"next_repay_time < ($time+$SanTian) and next_repay_time > $time and (send_three_msg_time=0 or send_three_msg_time <$time-$SanTian )"))->select();

     foreach ($SanRiTiXing as $v){       
         //发送提醒
         $deal=$this->getLoan($v);
         $param= array("loan_name"=>$deal['sub_name'],"url"=>$deal['url'],"repay_date"=>date('Y-m-d H:i',$deal['next_repay_time']),"money"=>format_price($deal['month_repay_money']));
         remind(15,$deal['user_id'],$param);
         //修改提现时间
         M('loan')->where(array('id'=>$v['id']))->save(array('send_three_msg_time'=>$time));         
     }
    }

} 

?>
