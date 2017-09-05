<?php
namespace Common\Controller;
use Common\Controller\AppframeController;
class HomeBaseController extends AppframeController {
	
	public function __construct() {
		$this->set_action_success_error_tpl();
		parent::__construct();
		$this->assign("about",$this->articleList(6));//关于我们
		$this->assign("help",$this->articleList(10));//使用帮助
		$this->assign("Understanding",$this->articleList(8));//了解
		$this->assign("safe",$this->articleList(9));//安全保护
		//$this->assign("other",$this->get_article(10,8));//其他
	}
	private function articleList($tid)
	{
		$rs= M("Posts");
		$where['p.post_status'] = array('eq',1);
		$id=intval($tid);
		$tr=M("term_relationships");
		$where["b.term_id"]=$id;
		$join = "".C('DB_PREFIX').'term_relationships as b on p.id =b.object_id';
		$article=M("Posts")->alias("p")->join($join)->where($where)->order("id desc")->limit(4)->select();
		return $article;

		
		
	
	}
	function _initialize() {
		parent::_initialize();
		$site_options=get_site_options();
		$this->assign($site_options);
		$ucenter_syn=C("UCENTER_ENABLED");
		if($ucenter_syn){
			if(!isset($_SESSION["user"])){
				if(!empty($_COOKIE['thinkcmf_auth'])  && $_COOKIE['thinkcmf_auth']!="logout"){
					$thinkcmf_auth=sp_authcode($_COOKIE['thinkcmf_auth'],"DECODE");
					$thinkcmf_auth=explode("\t", $thinkcmf_auth);
					$auth_username=$thinkcmf_auth[1];
					$users_model=M('Users');
					$where['user_login']=$auth_username;
					$user=$users_model->where($where)->find();
					if(!empty($user)){
						$is_login=true;
						$_SESSION["user"]=$user;
					}
				}
			}else{
			}
		}
		
		if(sp_is_user_login()){
			$this->assign("user",sp_get_current_user());
		}
		
	}
	
	protected function check_login(){
		//var_dump(get_current_admin_id());exit();
	    if(get_current_admin_id()){
	        return true;
	    }
		if(!isset($_SESSION['user'])){
			$this->error('您还没有登录!',__ROOT__."/");
		}
	}
	
	protected function  check_user(){	   
	    if(get_current_admin_id() &&(ACTION_NAME=='adminquickrefund' || ACTION_NAME=='admin_repay_borrow_money')){
	        return true;
	    }
		if($_SESSION["user"]['user_status']==2){
			$this->error('您还没有激活账号，请激活后再使用！',U("user/login/doactive_r"));
		}
		
		if($_SESSION["user"]['user_status']==0){
			$this->error('此账号已经被禁止使用，请联系管理员！',__ROOT__."/");
		}
	}
	
	//发送邮件
	protected  function _send_to_active(){
		$option = M('Options')->where(array('option_name'=>'member_email_active'))->find();
		if(!$option){
			$this->error('网站未配置账号激活信息，请联系网站管理员');
		}
		$options = json_decode($option['option_value'], true);
		//邮件标题
		$title = $options['title'];
		$title=str_replace('ThinkCMF',C('site_name'),$title);
		$uid=$_SESSION['user']['id'];
		$username=$_SESSION['user']['user_login'];
	
		$activekey=md5($uid.time().uniqid());
		$users_model=M("Users");
	
		$result=$users_model->where(array("id"=>$uid))->save(array("user_activation_key"=>$activekey));
	
		if(!$result){
			$this->error();
		}
		//生成激活链接
		$url = U('user/register/active',array("hash"=>$activekey,"wo"=>"aaa"), "", true);
		//邮件内容
		$template = $options['template'];
		//$content = str_replace(array('http://#link#','#username#'), array($url,$username),$template);
		$option=get_site_options();
		$content = str_replace(array('http://#link#','#username#','ThinkCMF','www.thinkcmf.com'), array($url,$username,C('site_name'),$option['site_host']),$template);
			$send_result=sendEmail($_SESSION['user']['user_email'],$title,$content,$_SESSION["user"]["id"]);
		if(!$send_result){
			$this->error('激活邮件发送失败！');
		}
	}
	
	/**
	 * 加载模板和页面输出 可以返回输出内容
	 * @access public
	 * @param string $templateFile 模板文件名
	 * @param string $charset 模板输出字符集
	 * @param string $contentType 输出类型
	 * @param string $content 模板输出内容
	 * @return mixed
	 */
	public function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '') {
		//echo $this->parseTemplate($templateFile);
		parent::display($this->parseTemplate($templateFile), $charset, $contentType);
	}
	
	public function fetch($templateFile='',$content='',$prefix=''){
		return parent::fetch($this->parseTemplate($templateFile),$content,$prefix);
	}
	
	/**
	 * 自动定位模板文件
	 * @access protected
	 * @param string $template 模板文件规则
	 * @return string
	 */
	public function parseTemplate($template='') {
		
		$tmpl_path=C("SP_TMPL_PATH");
		// 获取当前主题名称
		$theme      =    C('SP_DEFAULT_THEME');
		if(C('TMPL_DETECT_THEME')) {// 自动侦测模板主题
			$t = C('VAR_TEMPLATE');
			if (isset($_GET[$t])){
				$theme = $_GET[$t];
			}elseif(cookie('think_template')){
				$theme = cookie('think_template');
			}
			if(!file_exists($tmpl_path."/".$theme)){
				$theme  =   C('SP_DEFAULT_THEME');
			}
			cookie('think_template',$theme,864000);
		}
		
		C('SP_DEFAULT_THEME',$theme);
		
		// 获取当前主题的模版路径
		define('THEME_PATH',   $tmpl_path.$theme."/");
		
		C("TMPL_PARSE_STRING.__TMPL__",__ROOT__."/".THEME_PATH);
		
		C('SP_VIEW_PATH',$tmpl_path);
		C('DEFAULT_THEME',$theme);
		
		if(is_file($template)) {
			return $template;
		}
		$depr       =   C('TMPL_FILE_DEPR');
		$template   =   str_replace(':', $depr, $template);
		
		// 获取当前模块
		$module   =  MODULE_NAME;
		if(strpos($template,'@')){ // 跨模块调用模版文件
			list($module,$template)  =   explode('@',$template);
		}
		
		
		// 分析模板文件规则
		if('' == $template) {
			// 如果模板文件名为空 按照默认规则定位
			$template = "/".CONTROLLER_NAME . $depr . ACTION_NAME;
		}elseif(false === strpos($template, '/')){
			$template = "/".CONTROLLER_NAME . $depr . $template;
		}
		
		$file=THEME_PATH.$module.$template.C('TMPL_TEMPLATE_SUFFIX');
		if(!is_file($file)) E(L('_TEMPLATE_NOT_EXIST_').':'.$file);
		return $file;
	}
	
	
	private function set_action_success_error_tpl(){
		$theme      =    C('SP_DEFAULT_THEME');
		if(C('TMPL_DETECT_THEME')) {// 自动侦测模板主题
			if(cookie('think_template')){
				$theme = cookie('think_template');
			}
		}
		$tpl_path=C("SP_TMPL_PATH").$theme."/";
		$defaultjump=THINK_PATH.'Tpl/dispatch_jump.tpl';
		$action_success=$tpl_path.C("SP_TMPL_ACTION_SUCCESS").C("TMPL_TEMPLATE_SUFFIX");
		$action_error=$tpl_path.C("SP_TMPL_ACTION_ERROR").C("TMPL_TEMPLATE_SUFFIX");
		if(file_exists($action_success)){
			C("TMPL_ACTION_SUCCESS",$action_success);
		}else{
			C("TMPL_ACTION_SUCCESS",$defaultjump);
		}
		
		if(file_exists($action_error)){
			C("TMPL_ACTION_ERROR",$action_error);
		}else{
			C("TMPL_ACTION_ERROR",$defaultjump);
		}
	}
	/**
	 * 获取文章列表
	 * @param $classId
	 * return 二维数组
	 */
	public function get_article($classId,$num=4)
	{
		if(!function_exists("sp_sql_posts"))
		{
			$filename=APP_PATH."Portal/Common/function.php";
			if(is_file($filename))include_once($filename);
		}
		
		$lastnews=sp_sql_posts("cid:$classId;field:post_title,post_excerpt,tid,smeta;order:listorder asc;limit:$num;");
		return $lastnews;
	}
	
}