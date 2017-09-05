<?php
/**
 * 用户的视图模型 
 */
namespace User\Model;
use Think\Model\ViewModel;

class LoanloadViewModel extends ViewModel
{
    public $viewFields = array(
        'Loan'=>array('*','_tpye'=>'left'),
        'Users'=>array('score','_on'=>'Users.id=Loan.user_id'),
        'Loan_load'=>array('money'=>'u_load_money', 'id'=>'load_id','create_time'=>'loan_load_create_time','user_id'=>'loan_load_uid','_on'=>'Loan.id=Loan_load.loan_id'),
    );
}

?>