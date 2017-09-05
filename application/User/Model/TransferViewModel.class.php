<?php
/**
 * 用户的视图模型 
 */
namespace User\Model;
use Think\Model\ViewModel;

class TransferViewModel extends ViewModel
{

    public $viewFields = array(
        'Loan_load'=>array('money'=>'loan_load_money', 'id'=>'dlid','create_time'=>'loan_load_create_time','user_id'=>'loan_load_uid','_type'=>'LEFT'),
        'Loan'=>array('*','_on'=>'Loan_load.loan_id=Loan.id','_type'=>'LEFT'),     
        'Loan_load_transfer'=>array('id'=>'dltid','status'=>'tras_status','t_user_id','transfer_amount','create_time'=>'tras_create_time','transfer_time','_on'=>'Loan_load_transfer.loan_id = Loan_load.loan_id and Loan_load_transfer.load_id=Loan_load.id'),
        
    );
}

?>