<?php
/**
 * 用户的视图模型 
 */
namespace Loan\Model;
use Think\Model\ViewModel;

class UsersinfoViewModel extends ViewModel
{  
    public $viewFields = array(
        'users'=>array("*"),
        'user_info'=>array('*','_on'=>'users.id=user_info.uid'),
        'user_work'=>array('*', '_on'=>'users.id=user_work.uid')      
    );
}

?>