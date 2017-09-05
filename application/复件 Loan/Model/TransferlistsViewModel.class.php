<?php
/**
 * 转让 的列表
 */
namespace Loan\Model;
use Think\Model\ViewModel;

class TransferlistsViewModel extends ViewModel
{  
    public $viewFields = array(
        'loan_load_transfer'=>array("*"),
        'Loan'=>array('name','cate_id','repay_start_time','next_repay_time','user_id'=>'duser_id','borrow_amount','rate','repay_time','repay_count','repay_nper','loantype','_type'=>'LEFT','_on'=>'Loan.id=loan_load_transfer.loan_id'),
        'loan_repay_type'=>array('name'=>'repay_type_name','_type'=>'LEFT', '_on'=>'loan_repay_type.value=Loan.loantype'),
        'users'=>array('score'=>'dscore','_on'=>'Loan.user_id=users.id'),
   );
}

?>