<?php 
namespace Common\Lib\Loan;
interface Interestrate{
    /**
     * 给你一个月数 返回多少期
     * @param unknown $month
     */
   public static function getNper($month);
   
   /**
    * 每期贷款管理费用
    * @param 系统的每期管理费 $month_manage
    */
   public static function getNperManage($month_manage);
    
   /** 
    * @param 总钱数 $money
    * @param 月利息 $rate
    * @param 月数量 $remoth
    * return  总利息
    */
   public static function countRate($money,$rate,$remoth);
   
   
   //获取剩余 期数的   本金   提前还款的时候用的
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
    public static function get_shengyu($borrow_amount,$rate,$drepay_time,$formid=0,$toid=0);

   
 
   /**
    * 获取第指定期数  本金和利息   
    * @param 总钱数 $amount_money
    * @param 月利率 $rate
    * @param 总共的期数 $all_idx
    * @param 当前期数 $idx
    *  return array(
                    'yueLiXi'=> $v['yueLiXi'] ,  //月利息
                    'yueBenJin'=> $v['yueBenJin'], //月本金
               );
    */
   public static function getMonthRepayMoney($amount_money,$rate,$all_idx,$idx);
   
   

   /**
    * 下一个还款时间
    * @param 借款开始时间 $repay_start_time 
    * @param 借款周期 月  $repay_time
    * @param 下一次还款时间 $next_repay_time
    * @return 时间戳
    */
   public static function next_replay_month($repay_start_time,$next_repay_time,$repay_time);
}

?>