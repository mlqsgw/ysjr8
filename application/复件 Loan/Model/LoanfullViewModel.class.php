<?php
/**
 * 用户的视图模型 
 */
namespace Loan\Model;
use Think\Model\ViewModel;

class LoanfullViewModel extends ViewModel
{  
    public $viewFields = array(
        'Loan'=>array("*"),
        'Loan_cate'=>array('cat_name','_on'=>'Loan.cate_id=Loan_cate.id'),
        'loan_repay_type'=>array('name'=>'repay_type_name', '_on'=>'loan_repay_type.value=Loan.loantype'),
        'loan_type'=>array('t_name','_on'=>'loan_type.id=Loan.type_id'),      
        
    );
}

?>