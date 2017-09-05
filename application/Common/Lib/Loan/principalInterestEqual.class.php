<?php 
namespace Common\Lib\Loan;
//等额本息 
class principalInterestEqual implements Interestrate{
   //http://www.edai.com/jsq/debj/
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

    public static function countRate($money,$rate,$remoth){       
      // return $money * ($rate*pow(1+$rate,$remoth)/(pow(1+$rate,$remoth)-1));
     $res=self::debx($money, $rate, $remoth);
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
        
       $res= self::debx($borrow_amount,$rate,$drepay_time,true);      
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
  /**
   * 
   * @param  总金额 $je
   * @param 月利率 $ylv
   * @param 借款时间 $qx
   * @param bool 是否显示详细 $isshow
   * @return multitype:number multitype:multitype:number Ambigous <string, number>
   */
  private static function debx($je, $ylv, $qx,$isshow=false)
   {    
       //每月还款
        $yhk=$je * $ylv * (pow(1+$ylv, $qx)/(pow(1+$ylv, $qx) -1));;
      
       //累计还款总额
       $hkze=$yhk * $qx;
       //累计支付利息
       $zlx=$hkze - $je;
        
       $fh = array();
       $fh['zongLiXi'] = $zlx;
       $fh['huanKuanZongHe'] = $hkze;
       $fh['yueHuanKuan'] = $yhk;
   
       if ($isshow)
       {
          $ye = $je;    //贷款余额
          $sz =array();
           for ($i=1; $i<=$qx; $i++)
           {
               $ylx = $ye * $ylv;
               $ybj = $yhk-$ylx;
               $ye -= $ybj;
               $xj = array();
               $xj['bh'] = $i;
               $xj['yueLiXi'] = $ylx;   //月利息
               $xj['yueBenJin'] = $ybj;   //月本金
               $xj['yueHuanKuan']=$ylx+$ybj;//月还款
               $xj['yue'] = $ye;     //余额
               $sz[$i-1] = $xj;
           }
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
       $res=self::debx($amount_money, $rate, $all_idx,true);
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
