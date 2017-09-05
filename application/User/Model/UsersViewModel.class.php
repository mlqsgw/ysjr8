<?php
/**
 * 用户的视图模型 
 */
namespace User\Model;
use Think\Model\ViewModel;

class UsersViewModel extends ViewModel
{
    public $viewFields = array(
        'Users'=>array('*'),
        'User_info'=>array('*', '_on'=>'Users.id=User_info.uid'),
    );
}

?>