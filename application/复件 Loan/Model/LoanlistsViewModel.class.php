<?php
/**
 * 用户的视图模型 
 */
namespace Loan\Model;
use Think\Model\ViewModel;

class LoanlistsViewModel extends ViewModel
{  
    public $viewFields = array(
        'Loan'=>array("*"),
        'Loan_cate'=>array('cat_name','_on'=>'Loan.cate_id=Loan_cate.id'),
        'loan_repay_type'=>array('name'=>'repay_type_name', '_on'=>'loan_repay_type.value=Loan.loantype'),
        'users'=>array('score','_on'=>'Loan.user_id=users.id')
        
    );
}

?>