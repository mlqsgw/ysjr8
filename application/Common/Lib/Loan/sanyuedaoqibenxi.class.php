<?php 
namespace Common\Lib\Loan;

//等额本金
class sanyuedaoqibenxi implements Interestrate{
    
    public static function getNper($month){
        return ceil($month/3);
    }
    
    
    /**
     * 每期贷款管理费用
     * @param 系统的每期管理费 $month_manage
     */
    public static function getNperManage($month_manage){
        return $month_manage*3;
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
    * @param 总期数 $all_idx
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
       if($toid-$formid==1){
          $res= self::debj($borrow_amount,$rate,$drepay_time,true); 
          return array(
         'zongLiXi'=>$res['zongLiXi'],
         'sy_benjin'=>$borrow_amount,
         'sy_lixi'=>$res['zongLiXi']
              
          );
       }else{
           return array(
               'zongLiXi'=>0,
               'sy_benjin'=>0,
               'sy_lixi'=>0
           );
       }
   
   }
   //3个月到期本息
  private  static function debj($borrow_amount, $rate, $drepay_time,$showYue=false){ 
       $fh = array();
       $fh['yueBenJin'] = $borrow_amount;  
       $yueLiXi=$borrow_amount*$rate*$drepay_time;//总利息 就一期 也就是期 利息   月利息了
   
       
           $xj = array();
           $xj['bh'] = 1;
           $xj['yueLiXi'] = $yueLiXi;   //月利息
           $xj['yueBenJin']=$borrow_amount; //月本金
           $xj['yueHuanKuan'] = $yueLiXi+$borrow_amount;   //月还款
           $xj['yue'] = 0;     //余额
           $sz[0]=$xj;
       
       $fh['zongLiXi'] = $yueLiXi;
       $fh['huanKuanZongHe'] = $yueLiXi+$borrow_amount;

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
    * @param 总共的期数 $all_idx
    * @param 当前期数 $idx
    */
   public static function getMonthRepayMoney($amount_money,$rate,$all_idx,$idx){ 
     
        return array(
            'yueLiXi'=> $amount_money*$rate*3,  //月利息
            'yueBenJin'=> $amount_money, //月本金
        );
   }

   /**
    * 下一个还款时间
    * @param 借款开始时间 $repay_start_time
    * @param 借款周期 月  $repay_time
    * @param 下一次还款时间 $next_repay_time
    * @return 时间戳
    */
   public static function next_replay_month($repay_start_time,$next_repay_time,$repay_time){
    
          return next_replay_month($repay_start_time,3);      
   }
   


} 

?>
