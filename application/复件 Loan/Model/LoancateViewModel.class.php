<?php
/**
 * 用户的视图模型 
 */
namespace Loan\Model;
use Think\Model\ViewModel;

class LoancateViewModel extends ViewModel
{  
    public $viewFields = array(
        'Loan_cate'=>array('id','cat_name','deadline','amount','listorder','terms_id'),
        'Posts'=>array('post_title', '_on'=>'Loan_cate.terms_id=Posts.id'),
    );
}

?>