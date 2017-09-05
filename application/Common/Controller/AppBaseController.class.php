<?php

/**
 * APPController
 */
//定义是后台
namespace Common\Controller;
use Think\Controller;

class AppBaseController extends Controller {
	
	protected $tVar;
	public function __construct() {
		
		parent::__construct();
	
	}
    function _initialize(){
       	//parent::_initialize();
   
    }
    /**
     * 消息提示
     * @param type $message
     * @param type $jumpUrl
     * @param type $ajax 
     */
    public function success($message = '', $jumpUrl = '', $ajax = false) {
      $this->dispatchJump($message,1,$jumpUrl,$ajax);
    }
	public function error($message = '', $jumpUrl = '', $ajax = false) {
		$this->dispatchJump($message,0,$jumpUrl,$ajax);
	}
    
    
    private function dispatchJump($message,$status=1,$jumpUrl='',$ajax=false) {       	
       		$data['info']   =   $message;
       		$data['status'] =   $status;
       		$data['url']    =   $jumpUrl;
       		$this->ajaxReturn($data);   
       		die();   	
       }
 

    /**
     * 模板显示
     * @param type $templateFile 指定要调用的模板文件
     * @param type $charset 输出编码
     * @param type $contentType 输出类型
     * @param string $content 输出内容
     * 此方法作用在于实现后台模板直接存放在各自项目目录下。例如Admin项目的后台模板，直接存放在Admin/Tpl/目录下
     */
    public function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '') {
      $this->dispatchJump( $this->tVar,1);
    }

 	public function assign($name,$value=''){
        if(is_array($name)) {
            $this->tVar   =  array_merge($this->tVar,$name);
        }else {
            $this->tVar[$name] = $value;
        }
    }
    
    //分页
    protected function page($Total_Size = 1, $Page_Size = 0, $Current_Page = 1, $listRows = 6, $PageParam = '', $PageLink = '', $Static = FALSE) {
    	import('Page');
    	if ($Page_Size == 0) {
    		$Page_Size = C("PAGE_LISTROWS");
    	}
    	if (empty($PageParam)) {
    		$PageParam = C("VAR_PAGE");
    	}
    	$Page = new \Page($Total_Size, $Page_Size, $Current_Page, $listRows, $PageParam, $PageLink, $Static);
    	$Page->SetPager('default', '{first}{prev}&nbsp;{liststart}{list}{listend}&nbsp;{next}{last}', array("listlong" => "6", "first" => "首页", "last" => "尾页", "prev" => "上一页", "next" => "下一页", "list" => "*", "disabledclass" => ""));
    	return $Page;
    }
    
   
    //扩展方法，当用户没有权限操作，用于记录日志的扩展方法
    public function _ErrorLog() {
        
    }
}
