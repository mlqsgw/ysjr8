<?php 
namespace Common\Lib\Loan;

//等额本金
class averagecCapital implements Interestrate{
    
    public static function getNper($month){
        return $month;
    }
    
    
    /**
     * 每期贷款管理费用
     * @param 系统的每期管理费 $month_manage
     */
    public static function getNperManage($month_manage){
        return $month_manage;
    }
    
 
   /**
    * 得到贷款所以的利息
    * @param 总金额  $borrow_amount
    * @param 利率  $rate
    * @param 借款时间 $drepay_time
    * @return number
    */
    public static function countRate($borrow_amount,$rate,$drepay_time){ 
        $res= self::debj($borrow_amount,$rate,$drepay_time);         
        return $res['zongLiXi'];
   }
   /**
    * 获取从第几期到第几期的 贷款数组
    * @param 总 $amount_money
    * @param 总月数 $drepay_time
    * @param 利率 $rate
    * @param  从几期开始 $formid  0从第一期
    * @param 到第几期 $toid
    * return array(
    * 'zongLiXi'=>'总利息',
    * 'sy_benjin'=>'剩余本金',
    * 'sy_lixi'=>'剩余利息',   
    * );
    */
    public static function get_shengyu($borrow_amount,$rate,$drepay_time,$formid=0,$toid=0){
       
      $res= self::debj($borrow_amount,$rate,$drepay_time,true);
      $list=array();
      $sy=array('sy_benjin'=>0,'sy_lixi'=>0);
      foreach ($res['xx'] as $k=>$v){
          if($k>=$formid && $k<$toid){     
              $sy['sy_benjin']+=$v['yueBenJin'];
              $sy['sy_lixi']+=$v['yueLiXi'];          
          }
      }       
      return array(
     'zongLiXi'=>$res['zongLiXi'],
     'sy_benjin'=>$sy['sy_benjin'],
     'sy_lixi'=>$sy['sy_lixi']);
   
   }
   
  //等额本金还款法
  private  static function debj($borrow_amount, $rate, $drepay_time,$showYue=false){     
   
       //累计还款总额
       $HuanKuanZonge=0;
       //月本金
       $yueBenJin = $borrow_amount / $drepay_time;
     
   
       $fh = array();
       $fh['yueBenJin'] = $yueBenJin;
   
        //余额
       $yue = $borrow_amount;
       $sz = array();
       for($i = 1; $i <= $drepay_time; $i++)
       {
           $yueHuanKuan = $borrow_amount/$drepay_time + ($borrow_amount-$borrow_amount*($i-1)/$drepay_time)*$rate;//第i月还款额
        
           if ($i == 1)
           {
               //首月还款
               $fh['shouYueHuanKuan'] = $yueHuanKuan;
           }
           if ($i == 2)
           {
               //每月递减
               $fh['meiYuDiJian'] = $fh['shouYueHuanKuan'] - $yueHuanKuan;
           }
           $HuanKuanZonge = $HuanKuanZonge + $yueHuanKuan;
           $yueLiXi = $yueHuanKuan - $yueBenJin;
           $yue = $yue - $yueBenJin;
   
           $xj = array();
           $xj['bh'] = $i;
           $xj['yueLiXi'] = $yueLiXi;   //月利息
           $xj['yueBenJin']=$yueBenJin; //月本金
           $xj['yueHuanKuan'] = $yueHuanKuan;   //月还款
           $xj['yue'] = $yue;     //余额
           $sz[$i-1] = $xj;
       }
       $fh['zongLiXi'] = $HuanKuanZonge - $borrow_amount;
       $fh['huanKuanZongHe'] = $HuanKuanZonge;

       if ($showYue)
       {
           $fh['xx'] = $sz;
       } 
       return $fh;
   }
   /**
    * 获取第制定期数  本金和利息
    * @param 总钱数 $amount_money
    * @param 月利率 $rate
    * @param 总共月数 $all_idx
    * @param 当前期数 $idx
    */
   public static function getMonthRepayMoney($amount_money,$rate,$all_idx,$idx){
       if($idx>$all_idx){
           return 0;
       }
       $res=self::debj($amount_money, $rate, $all_idx,true);
       foreach ($res['xx'] as $v){
           if($v[bh]==$idx){             
               return array(
                    'yueLiXi'=> $v['yueLiXi'] ,  //月利息
                    'yueBenJin'=> $v['yueBenJin'], //月本金
               );
           }
       }
   }

   /**
    * 下一个还款时间
    * @param 借款开始时间 $repay_start_time 
    * @param 借款周期 月  $repay_time
    * @param 下一次还款时间 $next_repay_time
    * @return 时间戳
    */
   public static function next_replay_month($repay_start_time,$next_repay_time,$repay_time){
      if($next_repay_time > 0){
           return  next_replay_month($next_repay_time);
       }else{
          return next_replay_month($repay_start_time);
       }
   }
   


} 

?>
