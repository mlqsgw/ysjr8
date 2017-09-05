<?php


function get_current_admin_id(){
	return $_SESSION['ADMIN_ID'];
}

function sp_is_user_login(){
	return  !empty($_SESSION['user']);
}

function sp_get_current_user(){
	if(isset($_SESSION['user'])){
		return $_SESSION['user'];
	}else{
		return false;
	}
}

function sp_update_current_user($user){
	$_SESSION['user']=$user;
}
//得到当前用户ID  注意是用户哦。不是管理员
function get_current_userid(){
	
	if(isset($_SESSION['user'])){
		return $_SESSION['user']['id'];
	}else{
		return 0;
	}
}

function sp_get_current_userid(){
	return get_current_userid();
}

/**
 * 返回带协议的域名
 */
function sp_get_host(){
	$host=$_SERVER["HTTP_HOST"];
	$protocol=is_ssl()?"https://":"http://";
	return $protocol.$host;
}

/**
 * 获取前台模板根目录
 */
function sp_get_theme_path(){
	// 获取当前主题名称
	$tmpl_path=C("SP_TMPL_PATH");
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

	return __ROOT__.'/'.$tmpl_path.$theme."/";
}


/**
 * 获取用户头像相对网站根目录的地址
 */
function sp_get_user_avatar_url($avatar){
	
	if($avatar){
		if(strpos($avatar, "http")===0){
			return $avatar;
		}else {
			return __ROOT__."/".C("UPLOADPATH")."avatar/".$avatar;
		}
		
	}else{
		return $avatar;
	}
	
}
function sp_password($pw){
	$decor=md5(C('DB_PREFIX'));
	$mi=md5($pw);
	return substr($decor,0,12).$mi.substr($decor,-4,4);
}

function sp_log($content,$file="log.txt"){
	file_put_contents($file, $content,FILE_APPEND);
}

function sp_random_string($len = 6) {
	$chars = array(
			"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
			"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
			"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
			"H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
			"S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
			"3", "4", "5", "6", "7", "8", "9"
	);
	$charsLen = count($chars) - 1;
	shuffle($chars);    // 将数组打乱
	$output = "";
	for ($i = 0; $i < $len; $i++) {
		$output .= $chars[mt_rand(0, $charsLen)];
	}
	return $output;
}

/**
 * 清空缓存
 */
function sp_clear_cache(){
		import ( "ORG.Util.Dir" );
		$dirs = array ();
		// runtime/
		$rootdirs = scandir ( RUNTIME_PATH );
		//$noneed_clear=array(".","..","Data");
		$noneed_clear=array(".","..");
		$rootdirs=array_diff($rootdirs, $noneed_clear);
		foreach ( $rootdirs as $dir ) {
			
			if ($dir != "." && $dir != "..") {
				$dir = RUNTIME_PATH . $dir;
				if (is_dir ( $dir )) {
					array_push ( $dirs, $dir );
					$tmprootdirs = scandir ( $dir );
					foreach ( $tmprootdirs as $tdir ) {
						if ($tdir != "." && $tdir != "..") {
							$tdir = $dir . '/' . $tdir;
							if (is_dir ( $tdir )) {
								array_push ( $dirs, $tdir );
							}
						}
					}
				}else{
					@unlink($dir);
				}
			}
		}
		$dirtool=new \Dir("");
		foreach ( $dirs as $dir ) {
			$dirtool->del ( $dir );
		}
		
		if(defined('IS_SAE') && IS_SAE){
			$global_mc=@memcache_init();
			if($global_mc){
				$global_mc->flush();
			}
			
			$no_need_delete=array("THINKCMF_DYNAMIC_CONFIG");
			$kv = new SaeKV();
			// 初始化KVClient对象
			$ret = $kv->init();
			// 循环获取所有key-values
			$ret = $kv->pkrget('', 100);
			while (true) {
				foreach($ret as $key =>$value){
                    if(!in_array($key, $no_need_delete)){
                    	$kv->delete($key);
                    }
                }
				end($ret);
				$start_key = key($ret);
				$i = count($ret);
				if ($i < 100) break;
				$ret = $kv->pkrget('', 100, $start_key);
			}
			
		}
	
}

/**
 * 保存变量
 */
function sp_save_var($path,$value){
	$ret = file_put_contents($path, "<?php\treturn " . var_export($value, true) . ";?>");
	return $ret;
}
/**
 * 配置CONFIG
 * @param unknown $data
 * @return number
 */
function sp_set_dynamic_config($data){
	if(defined('IS_SAE') && IS_SAE){
		$kv = new SaeKV();
		$ret = $kv->init();
		$configs=$kv->get("THINKCMF_DYNAMIC_CONFIG");
		$configs=empty($configs)?array():unserialize($configs);
		$configs=array_merge($configs,$data);
		$result = $kv->set('THINKCMF_DYNAMIC_CONFIG', serialize($configs));
	}elseif(defined('IS_BAE') && IS_BAE){
		$bae_mc=new BaeMemcache();
		$configs=$bae_mc->get("THINKCMF_DYNAMIC_CONFIG");
		$configs=empty($configs)?array():unserialize($configs);
		$configs=array_merge($configs,$data);
		$result = $bae_mc->set("THINKCMF_DYNAMIC_CONFIG",serialize($configs),MEMCACHE_COMPRESSED,0);
	}else{
		$config_file="./data/conf/config.php";
		if(file_exists($config_file)){
			$configs=include $config_file;
		}else {
			$configs=array();
		}
		$configs=array_merge($configs,$data);
		$result = file_put_contents($config_file, "<?php\treturn " . var_export($configs, true) . ";?>");
	}
	sp_clear_cache();
	return $result;
}


/**
 * 生成参数列表,以数组形式返回
 */
function sp_param_lable($tag = ''){
	$param = array();
	$array = explode(';',$tag);
	foreach ($array as $v){
		$v=trim($v);
		if(!empty($v)){
			list($key,$val) = explode(':',$v);
			$param[trim($key)] = trim($val);
		}
	}
	return $param;
}


/**
 * 
 */

function get_site_options(){
	$site_options = F("site_options");
	if(empty($site_options)){
		$options_obj = M("Options");
		$option = $options_obj->where("option_name='site_options'")->find();
		if($option){
			$site_options = (array)json_decode($option['option_value']);
		}else{
			$site_options = array();
		}
		F("site_options", $site_options);
	}
	$site_options['site_tongji']=htmlspecialchars_decode($site_options['site_tongji']);
	return $site_options;	
}

function sp_get_site_options(){
	get_site_options();
}


function sp_get_cmf_settings($key=""){
	$cmf_settings = F("cmf_settings");
	if(empty($cmf_settings)){
		$options_obj = M("Options");
		$option = $options_obj->where("option_name='cmf_settings'")->find();
		if($option){
			$cmf_settings = json_decode($option['option_value'],true);
		}else{
			$cmf_settings = array();
		}
		F("cmf_settings", $cmf_settings);
	}
	if(!empty($key)){
		return $cmf_settings[$key];
	}
	return $cmf_settings;
}





/**
 * 全局获取验证码图片
 * 生成的是个HTML的img标签
 * @param string $imgparam 
 * 生成图片样式，可以设置
 * code_len=4&font_size=20&width=238&height=50&font_color=#ffffff&background=#000000
 * code_len:字符长度
 * font_size:字体大小
 * width:生成图片宽度
 * heigh:生成图片高度
 * font_color:字体颜色
 * background:图片背景
 * @param string $imgattrs
 * img标签原生属性，除src,onclick之外都可以设置
 * 默认值：style="cursor: pointer;" title="点击获取"
 * @return string
 * 原生html的img标签
 * 注，此函数仅生成img标签，应该配合在表单加入name=verify的input标签
 * 如：<input type="text" name="verify"/>
 */
function sp_verifycode_img($imgparam='code_len=4&font_size=20&width=238&height=50&font_color=&background=',$imgattrs='style="cursor: pointer;" title="点击获取"'){
	$src=U('Api/Checkcode/index',$imgparam);
	$img=<<<hello
<img  src="$src" onclick="this.src='$src&time='+Math.random();" $imgattrs/>
hello;
	return $img;
}




/**
 * 10
 * 返回指定id的菜单
 * 同上一类方法，jquery treeview 风格，可伸缩样式
 * @param $myid 表示获得这个ID下的所有子级
 * @param $effected_id 需要生成treeview目录数的id
 * @param $str 末级样式
 * @param $str2 目录级别样式
 * @param $showlevel 直接显示层级数，其余为异步显示，0为全部限制
 * @param $ul_class 内部ul样式 默认空  可增加其他样式如'sub-menu'
 * @param $li_class 内部li样式 默认空  可增加其他样式如'menu-item'
 * @param $style 目录样式 默认 filetree 可增加其他样式如'filetree treeview-famfamfam'
 * @param $dropdown 有子元素时li的class
 * $id="main";
 $effected_id="mainmenu";
 $filetpl="<a href='\$href'><span class='file'>\$label</span></a>";
 $foldertpl="<span class='folder'>\$label</span>";
 $ul_class="" ;
 $li_class="" ;
 $style="filetree";
 $showlevel=6;
 sp_get_menu($id,$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel);
 * such as
 * <ul id="example" class="filetree ">
 <li class="hasChildren" id='1'>
 <span class='folder'>test</span>
 <ul>
 <li class="hasChildren" id='4'>
 <span class='folder'>caidan2</span>
 <ul>
 <li class="hasChildren" id='5'>
 <span class='folder'>sss</span>
 <ul>
 <li id='3'><span class='folder'>test2</span></li>
 </ul>
 </li>
 </ul>
 </li>
 </ul>
 </li>
 <li class="hasChildren" id='6'><span class='file'>ss</span></li>
 </ul>
 */

function sp_get_menu($id="main",$effected_id="mainmenu",$filetpl="<span class='file'>\$label</span>",$foldertpl="<span class='folder'>\$label</span>",$ul_class="" ,$li_class="" ,$style="filetree",$showlevel=6,$dropdown='hasChild'){
	$navs=F("site_nav_".$id);
	if(empty($navs)){
		$navs=_sp_get_menu_datas($id);
	}
	
	import("Tree");
	$tree = new \Tree();
	$tree->init($navs);
	return $tree->get_treeview_menu(0,$effected_id, $filetpl, $foldertpl,  $showlevel,$ul_class,$li_class,  $style,  1, FALSE, $dropdown);
}
function _sp_get_menu_datas($id){
	$nav_obj= M("Nav");
	if($id=="main"){
		$navcat_obj= M("NavCat");
		$main=$navcat_obj->where("active=1")->find();
		$id=$main['navcid'];
	}
	$navs= $nav_obj->where("cid=$id and status=1")->order(array("listorder" => "ASC"))->select();
	foreach ($navs as $key=>$nav){
		$href=htmlspecialchars_decode($nav['href']);
		$hrefold=$href;
		
		if(strpos($hrefold,"{")){//序列 化的数据
			$href=unserialize(stripslashes($nav['href']));
			$default_app=strtolower(C("DEFAULT_MODULE"));
			$href=strtolower(leuu($href['action'],$href['param']));
			$g=C("VAR_MODULE");
			$href=preg_replace("/\/$default_app\//", "/",$href);
			$href=preg_replace("/$g=$default_app&/", "",$href);
		}else{
			if($hrefold=="home"){
				$href=__ROOT__."/";
			}else{
				$href=$hrefold;
			}
		}
		$nav['href']=$href;
		$navs[$key]=$nav;
	}
	F("site_nav",$navs);
	return $navs;
}
function sp_get_menu_tree($id="main"){
	$navs=F("site_nav_".$id);
	if(empty($navs)){
		$navs=_sp_get_menu_datas($id);
	}

	import("Tree");
	$tree = new \Tree();
	$tree->init($navs);
	return $tree->get_tree_array(0, "");
}



/**
 * 11
 * @param string $content
 * @return array
 */
function sp_getcontent_imgs($content){
	import("phpQuery");
	phpQuery::newDocumentHTML($content);
	$pq=pq();
	$imgs=$pq->find("img");
	$imgs_data=array();
	if($imgs->length()){
		foreach ($imgs as $img){
			$img=pq($img);
			$im['src']=$img->attr("src");
			$im['title']=$img->attr("title");
			$im['alt']=$img->attr("alt");
			$imgs_data[]=$im;
		}
	}
	phpQuery::$documents=null;
	return $imgs_data;
}

/**
 * 
 * @param unknown_type $navcatname
 * @param unknown_type $datas
 * @param unknown_type $navrule
 * @return string
 */
function sp_get_nav4admin($navcatname,$datas,$navrule){
	$nav['name']=$navcatname;
	$nav['urlrule']=$navrule;
	foreach($datas as $t){
		$urlrule=array();
		$group=strtolower(MODULE_NAME)==strtolower(C("DEFAULT_MODULE"))?"":MODULE_NAME."/";
		$action=$group.$navrule['action'];
		$urlrule['action']=MODULE_NAME."/".$navrule['action'];
		$urlrule['param']=array();
		if(isset($navrule['param'])){
			foreach ($navrule['param'] as $key=>$val){
				$urlrule['param'][$key]=$t[$val];
			}
		}
		
		$nav['items'][]=array(
				"label"=>$t[$navrule['label']],
				"url"=>U($action,$urlrule['param']),
				"rule"=>serialize($urlrule)
		);
	}
	return json_encode($nav);
}

function sp_get_apphome_tpl($tplname,$default_tplname,$default_theme=""){
	$theme      =    C('SP_DEFAULT_THEME');
	if(C('TMPL_DETECT_THEME')){// 自动侦测模板主题
		$t = C('VAR_TEMPLATE');
		if (isset($_GET[$t])){
			$theme = $_GET[$t];
		}elseif(cookie('think_template')){
			$theme = cookie('think_template');
		}
	}
	$theme=empty($default_theme)?$theme:$default_theme;
	$themepath=C("SP_TMPL_PATH").$theme."/".MODULE_NAME."/";
	$tplpath=$themepath.$tplname.C("TMPL_TEMPLATE_SUFFIX");
	$defaultpl=$themepath.$default_tplname.C("TMPL_TEMPLATE_SUFFIX");
	if(file_exists($tplpath)){
	}else if(file_exists($defaultpl)){
		$tplname=$default_tplname;
	}else{
		$tplname="404";
	}
	return $tplname;
}

//面包屑导航
function sp_bread_nav($nav_id){
	$navTable = M('Nav');
	$path = $navTable->where("id=$nav_id")->getField('path');
	if(!$path) return array();
	$path = str_replace('-',',',$path);
	$bread_path = $navTable->where("id in ($path)")->order('id')->select();
	return $bread_path;
}

/*
 * 作用：去除字符串中的指定字符
 * 参数: $str, string, 待处理字符串
 *       $chars, string, 需去掉的特殊字符
 */
function sp_strip_chars($str, $chars='?<*.>\'\"'){
	return preg_replace('/['.$chars.']/is', '', $str);
}

//发送邮件
function SendMail($address,$title,$message){
    import("PHPMailer");
    $mail = new \PHPMailer();
    // 设置PHPMailer使用SMTP服务器发送Email
    $mail->IsSMTP();
    $mail->IsHTML(true);
    // 设置邮件的字符编码，若不指定，则为'UTF-8'
    $mail->CharSet = 'UTF-8';
    // 添加收件人地址，可以多次使用来添加多个收件人
    $mail->AddAddress($address);
   
    // 设置邮件正文
    $mail->Body = $message;
    // 设置邮件头的From字段。
    $mail->From = C('SP_MAIL_ADDRESS');
    // 设置发件人名字
    $mail->FromName = C('SP_MAIL_NAME');
    // 设置邮件标题
    $mail->Subject = $title;
    // 设置SMTP服务器。
    $mail->Host = C('SP_MAIL_SMTP');
    // 设置端口
    $mail->Port = C('SP_MAIL_PORT');
    // 设置为"需要验证"
    $mail->SMTPAuth = true;
    // 设置用户名和密码。
    $mail->Username = C('SP_MAIL_LOGINNAME');
    $mail->Password = C('SP_MAIL_PASSWORD');
    
    // 发送邮件。
    return ($mail->Send());
}


function sp_send_email($address,$subject,$message){
	import("PHPMailer");
	$mail=new \PHPMailer();
	// 设置PHPMailer使用SMTP服务器发送Email
	$mail->IsSMTP();
	$mail->IsHTML(true);
	// 设置邮件的字符编码，若不指定，则为'UTF-8'
	$mail->CharSet='UTF-8';
	// 添加收件人地址，可以多次使用来添加多个收件人
	$mail->AddAddress($address);
	// 设置邮件正文
	$mail->Body=$message;
	// 设置邮件头的From字段。
	$mail->From=C('SP_MAIL_ADDRESS');
	// 设置发件人名字
	$mail->FromName='ThinkCMF';
	// 设置邮件标题
	$mail->Subject=$subject;
	// 设置SMTP服务器。
	$mail->Host=C('SP_MAIL_SMTP');
	// 设置为"需要验证"
	$mail->SMTPAuth=true;
	// 设置用户名和密码。
	$mail->Username=C('SP_MAIL_LOGINNAME');
	$mail->Password=C('SP_MAIL_PASSWORD');
	// 发送邮件。
	if(!$mail->Send()) {
		$mailerror=$mail->ErrorInfo;
		return array("error"=>1,"message"=>$mailerror);
	}else{
		return array("error"=>0);
	}
}

function sp_get_asset_upload_path($file,$withhost=false){
	if(strpos($file,"http")===0){
		return $file;
	}else if(strpos($file,"/")===0){
		return $file;
	}else{
		$filepath=C("TMPL_PARSE_STRING.__UPLOAD__").$file;
		if($withhost){
			if(strpos($filepath,"http")!==0){
				$http = 'http://';
				$http =is_ssl()?'https://':$http;
				$filepath = $http.$_SERVER['HTTP_HOST'].$filepath;
			}
		}
		return $filepath;
		
	}                    			
                        		
}


function sp_authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;

	$key = md5($key ? $key : C("AUTHCODE"));
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}

}

function sp_authencode($string){
	return sp_authcode($string,"ENCODE");
}

function Comments($table,$post_id,$params=array()){
	return  R("Comment/Widget/index",array($table,$post_id,$params));
}
/**
 * 获取评论
 * @param string $tag
 * @param array $where //按照thinkphp where array格式
 */
function sp_get_comments($tag="field:*;limit:0,5;order:createtime desc;",$where=array()){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '5';
	$order = !empty($tag['order']) ? $tag['order'] : 'createtime desc';
	
	//根据参数生成查询条件
	$mwhere['status'] = array('eq',1);
	
	if(is_array($where)){
		$where=array_merge($mwhere,$where);
	}else{
		$where=$mwhere;
	}
	
	$comments_model=M("Comments");
	
	$comments=$comments_model->field($field)->where($where)->order($order)->limit($limit)->select();
	return $comments;
}

function sp_file_write($file,$content){
	
	if(defined('IS_SAE') && IS_SAE){
		$s=new SaeStorage();
		$arr=explode('/',ltrim($file,'./'));
		$domain=array_shift($arr);
		$save_path=implode('/',$arr);
		return $s->write($domain,$save_path,$content);
	}else{
		try {
			$fp2 = @fopen( $file , "w" );
			fwrite( $fp2 , $content );
			fclose( $fp2 );
			return true;
		} catch ( Exception $e ) {
			return false;
		}
	}
}

function sp_asset_relative_url($asset_url){
	return str_replace(C("TMPL_PARSE_STRING.__UPLOAD__"), "", $asset_url);
}

function sp_content_page($content,$pagetpl='{first}{prev}{liststart}{list}{listend}{next}{last}'){
	$contents=explode('_ueditor_page_break_tag_',$content);
	$totalsize=count($contents);
	import('Page');
	$pagesize=1;
	$PageParam = C("VAR_PAGE");
	$page = new \Page($totalsize,$pagesize);
	$page->setLinkWraper("li");
	$page->SetPager('default', $pagetpl, array("listlong" => "6", "first" => "首页", "last" => "尾页", "prev" => "上一页", "next" => "下一页", "list" => "*", "disabledclass" => ""));
	$content=$contents[$page->firstRow];
	$data['content']=$content;
	$data['page']=$page->show('default');
	
	return $data;
}


/**
 * 根据广告名称获取广告内容
 * @param string $ad
 * @return 广告内容
 */

function sp_getad($ad){
	$ad_obj= M("Ad");
	$ad=$ad_obj->field("ad_content")->where("ad_name='$ad' and status=1")->find();
	return htmlspecialchars_decode($ad['ad_content']);
}

/**
 * 根据幻灯片标识获取所有幻灯片
 * @param string $slide 幻灯片标识
 * @return array;
 */
function sp_getslide($slide){
	$slide_obj= M("SlideCat");
	$join = "".C('DB_PREFIX').'slide as b on '.C('DB_PREFIX').'slide_cat.cid =b.slide_cid';
	return $slide_obj->join($join)->where("cat_idname='$slide' and slide_status=1")->order("listorder ASC")->select();

}

/**
 * 获取所有友情连接
 * @return array
 */
function sp_getlinks(){
	$links_obj= M("Links");
	return  $links_obj->where("link_status=1")->order("listorder ASC")->select();
}

/**
 * 检查用户对某个url,内容的可访问性，用于记录如是否赞过，是否访问过等等;开发者可以自由控制，对于没有必要做的检查可以不做，以减少服务器压力
 * @param number $object 访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录;如果object为空，表示只检查对某个url访问的合法性
 * @param number $count_limit 访问次数限制,如1，表示只能访问一次
 * @param boolean $ip_limit ip限制,false为不限制，true为限制
 * @param number $expire 距离上次访问的最小时间单位s，0表示不限制，大于0表示最后访问$expire秒后才可以访问
 * @return true 可访问，false不可访问
 */
function sp_check_user_action($object="",$count_limit=1,$ip_limit=false,$expire=0){
	$common_action_log_model=M("CommonActionLog");
	$action=MODULE_NAME."-".CONTROLLER_NAME."-".ACTION_NAME;
	$userid=get_current_userid();
	
	$ip=get_client_ip();
	
	$where=array("user"=>$userid,"action"=>$action,"object"=>$object);
	if($ip_limit){
		$where['ip']=$ip;
	}
	
	$find_log=$common_action_log_model->where($where)->find();
	
	$time=time();
	if($find_log){
		$common_action_log_model->where($where)->save(array("count"=>array("exp","count+1"),"last_time"=>$time,"ip"=>$ip));
		if($find_log['count']>=$count_limit){
			return false;
		}
		
		if($expire>0 && ($time-$find_log['last_time'])<$expire){
			return false;
		}
	}else{
		$common_action_log_model->add(array("user"=>$userid,"action"=>$action,"object"=>$object,"count"=>array("exp","count+1"),"last_time"=>$time,"ip"=>$ip));
	}
	
	return true;
}
/**
 * key是否存在在数组中
 */
function checked($key,$array){
    if(array_key_exists($key, $array)){
        return "checked";
    }
}
/**
 * 用于生成收藏内容用的key
 * @param string $table 收藏内容所在表
 * @param int $object_id 收藏内容的id
 */
function sp_get_favorite_key($table,$object_id){
	$auth_code=C("AUTHCODE");
	$string="$auth_code $table $object_id";
	
	return sp_authencode($string);
}


function sp_get_relative_url($url){
	if(strpos($url,"http")===0){
		$url=str_replace(array("https://","http://"), "", $url);
		
		$pos=strpos($url, "/");
		if($pos===false){
			return "";
		}else{
			$url=substr($url, $pos+1);
			$root=preg_replace("/^\//", "", __ROOT__);
			$root=str_replace("/", "\/", $root);
			$url=preg_replace("/^".$root."\//", "", $url);
			return $url;
		}
	}
	return $url;
}

/**
 * 
 * @param string $tag
 * @param array $where
 * @return array
 */

function sp_get_users($tag="field:*;limit:0,8;order:create_time desc;",$where=array()){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '8';
	$order = !empty($tag['order']) ? $tag['order'] : 'create_time desc';
	
	//根据参数生成查询条件
	$mwhere['user_status'] = array('eq',1);
	$mwhere['user_type'] = array('eq',2);//default user
	
	if(is_array($where)){
		$where=array_merge($mwhere,$where);
	}else{
		$where=$mwhere;
	}
	
	$users_model=M("Users");
	
	$users=$users_model->field($field)->where($where)->order($order)->limit($limit)->select();
	return $users;
}

/**
 * URL组装 支持不同URL模式
 * @param string $url URL表达式，格式：'[模块/控制器/操作#锚点@域名]?参数1=值1&参数2=值2...'
 * @param string|array $vars 传入的参数，支持数组和字符串
 * @param string $suffix 伪静态后缀，默认为true表示获取配置值
 * @param boolean $domain 是否显示域名
 * @return string
 */
function leuu($url='',$vars='',$suffix=true,$domain=false){
	$routes=sp_get_routes();
	if(empty($routes)){
		return U($url,$vars,$suffix,$domain);
	}else{
		// 解析URL
		$info   =  parse_url($url);
		$url    =  !empty($info['path'])?$info['path']:ACTION_NAME;
		if(isset($info['fragment'])) { // 解析锚点
			$anchor =   $info['fragment'];
			if(false !== strpos($anchor,'?')) { // 解析参数
				list($anchor,$info['query']) = explode('?',$anchor,2);
			}
			if(false !== strpos($anchor,'@')) { // 解析域名
				list($anchor,$host)    =   explode('@',$anchor, 2);
			}
		}elseif(false !== strpos($url,'@')) { // 解析域名
			list($url,$host)    =   explode('@',$info['path'], 2);
		}
		
		// 解析子域名
		//TODO?
		
		// 解析参数
		if(is_string($vars)) { // aaa=1&bbb=2 转换成数组
			parse_str($vars,$vars);
		}elseif(!is_array($vars)){
			$vars = array();
		}
		if(isset($info['query'])) { // 解析地址里面参数 合并到vars
			parse_str($info['query'],$params);
			$vars = array_merge($params,$vars);
		}
		
		$vars_src=$vars;
		
		ksort($vars);
		
		// URL组装
		$depr       =   C('URL_PATHINFO_DEPR');
		$urlCase    =   C('URL_CASE_INSENSITIVE');
		if('/' != $depr) { // 安全替换
			$url    =   str_replace('/',$depr,$url);
		}
		// 解析模块、控制器和操作
		$url        =   trim($url,$depr);
		$path       =   explode($depr,$url);
		$var        =   array();
		$varModule      =   C('VAR_MODULE');
		$varController  =   C('VAR_CONTROLLER');
		$varAction      =   C('VAR_ACTION');
		$var[$varAction]       =   !empty($path)?array_pop($path):ACTION_NAME;
		$var[$varController]   =   !empty($path)?array_pop($path):CONTROLLER_NAME;
		if($maps = C('URL_ACTION_MAP')) {
			if(isset($maps[strtolower($var[$varController])])) {
				$maps    =   $maps[strtolower($var[$varController])];
				if($action = array_search(strtolower($var[$varAction]),$maps)){
					$var[$varAction] = $action;
				}
			}
		}
		if($maps = C('URL_CONTROLLER_MAP')) {
			if($controller = array_search(strtolower($var[$varController]),$maps)){
				$var[$varController] = $controller;
			}
		}
		if($urlCase) {
			$var[$varController]   =   parse_name($var[$varController]);
		}
		$module =   '';
		
		if(!empty($path)) {
			$var[$varModule]    =   array_pop($path);
		}else{
			if(C('MULTI_MODULE')) {
				if(MODULE_NAME != C('DEFAULT_MODULE') || !C('MODULE_ALLOW_LIST')){
					$var[$varModule]=   MODULE_NAME;
				}
			}
		}
		if($maps = C('URL_MODULE_MAP')) {
			if($_module = array_search(strtolower($var[$varModule]),$maps)){
				$var[$varModule] = $_module;
			}
		}
		if(isset($var[$varModule])){
			$module =   $var[$varModule];
		}
		
		if(C('URL_MODEL') == 0) { // 普通模式URL转换
			$url        =   __APP__.'?'.http_build_query(array_reverse($var));
			
			if($urlCase){
				$url    =   strtolower($url);
			}
			if(!empty($vars)) {
				$vars   =   http_build_query($vars);
				$url   .=   '&'.$vars;
			}
		}else{ // PATHINFO模式或者兼容URL模式
			
			if(empty($var[C('VAR_MODULE')])){
				$var[C('VAR_MODULE')]=MODULE_NAME;
			}
				
			$module_controller_action=strtolower(implode($depr,array_reverse($var)));
			
			$has_route=false;
			
			if(isset($routes[$module_controller_action])){
				$urlrules=$routes[$module_controller_action];
				
				$empty_query_urlrule=array();
				
				foreach ($urlrules as $ur){
					$intersect=array_intersect($ur['query'], $vars);
					if($intersect){
						$vars=array_diff_key($vars,$ur['query']);
						$url= $ur['url'];
						$has_route=true;
						break;
					}
					if(empty($empty_query_urlrule) && empty($ur['query'])){
						$empty_query_urlrule=$ur;
					}
				}
				
				if(!empty($empty_query_urlrule)){
					$url=$empty_query_urlrule['url'];
					foreach ($vars as $key =>$value){
						if(strpos($url, ":$key")!==false){
							$url=str_replace(":$key", $value, $url);
							unset($vars[$key]);
						}
					}
					$url=str_replace(array("\d","$"), "", $url);
					$has_route=true;
				}
				
				if($has_route){
					if(!empty($vars)) { // 添加参数
						foreach ($vars as $var => $val){
							if('' !== trim($val))   $url .= $depr . $var . $depr . urlencode($val);
						}
					}
					
					$url =__APP__."/".$url ;
					
				}
				
			
			}
			
			if(!$has_route){
				$module =   defined('BIND_MODULE') ? '' : $module;
				$url    =   __APP__.'/'.implode($depr,array_reverse($var));
					
				if($urlCase){
					$url    =   strtolower($url);
				}
					
				if(!empty($vars)) { // 添加参数
					foreach ($vars as $var => $val){
						if('' !== trim($val))   $url .= $depr . $var . $depr . urlencode($val);
					}
				}
			}
			
			
			if($suffix) {
				$suffix   =  $suffix===true?C('URL_HTML_SUFFIX'):$suffix;
				if($pos = strpos($suffix, '|')){
					$suffix = substr($suffix, 0, $pos);
				}
				if($suffix && '/' != substr($url,-1)){
					$url  .=  '.'.ltrim($suffix,'.');
				}
			}
		}
		
		if(isset($anchor)){
			$url  .= '#'.$anchor;
		}
		if($domain) {
			$url   =  (is_ssl()?'https://':'http://').$domain.$url;
		}
		
		return $url;
	}
}

function UU($url='',$vars='',$suffix=true,$domain=false){
	return leuu($url,$vars,$suffix,$domain);
}

function sp_get_routes($refresh=false){
	$routes=F("routes");
	
	if( (!empty($routes)||is_array($routes)) && !$refresh){
		return $routes;
	}
	$routes=M("Route")->where("status=1")->order("listorder asc")->select();
	$module_routes=array();
	$cache_routes=array();
	foreach ($routes as $er){
		$full_url=$er['full_url'];
			
		// 解析URL
		$info   =  parse_url($full_url);
			
		$path       =   explode("/",$info['path']);
		if(count($path)!=3){//必须是完整 url
			continue;
		}
			
		$module=strtolower($path[0]);
			
		// 解析参数
		$vars = array();
		if(isset($info['query'])) { // 解析地址里面参数 合并到vars
			parse_str($info['query'],$params);
			$vars = array_merge($params,$vars);
		}
			
		$vars_src=$vars;
			
		ksort($vars);
			
		$path=$info['path'];
			
		$full_url=$path.(empty($vars)?"":"?").http_build_query($vars);
			
		$url=$er['url'];
			
		$cache_routes[$path][]=array("query"=>$vars,"url"=>$url);
			
		$module_routes[$module][$url]=$full_url;
			
	}
	F("routes",$cache_routes);
	$route_dir=SITE_PATH."/data/conf/route/";
	foreach ($module_routes as $module => $routes){
		
		if(!file_exists($route_dir)){
			mkdir($route_dir);
		}
			
		$route_file=$route_dir."$module.php";
			
		$route_ruels=array();
			
		file_put_contents($route_file, "<?php\treturn " . stripslashes(var_export($routes, true)) . ";");
	}
	
	return $cache_routes;
	
	
}






function pe($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    die;
}
function p($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    
}
function lastsql(){
    echo M()->getLastSql();die;
}
    
 /*
 * **请求接口，返回JSON数据
 * **@url:接口地址
 * **@params:传递的参数
 * **@ispost:是否以POST提交，默认GET
 */
 function ldSms($phone,$str)
 {
	$username = 'zzhysz';		//用户账号
	$password = '55823450';		//密码
	$mobile	 = $phone;	//号码
	$content = $str;		//内容
	$content=iconv("UTF-8", "UTF-8", $content);
	$dstime = '';		//为空代表立即发送  如果加了时间代表定时发送  精确到秒
	$productid = 676767;		//内容
	$xh = '';		//留空
	
	$url='http://www.ztsms.cn:8800/sendXSms.do?username='.$username.'&password='.$password.'&mobile='.$mobile.'&content='.$content.'&dstime='.$dstime.'&productid='.$productid.'&xh='; 
	if(function_exists('file_get_contents'))
	{
		$file_contents = file_get_contents($url);
	}
	else
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	}
		return $file_contents;
}
 /*function ldSms($phone,$str)
 {
	$username = 'wg806398'; //用户名
	$passwrod = '680689'; //密码
	$smsnumber = $phone; //发送号码列表，每个号码后面加|
	$smscontent = mb_convert_encoding($str,"gb2312","utf-8"); //发送内容
	$sendtime = ''; //定时时间，立即发送为空
	$url = 'http://125.40.53.101:6060'; //网通网络+
	$lasturl = '/api/';
	$url .= $lasturl;
	//发送，号码每次不大于1000
	$para = 'sendsms.asp?username=' . $username . '&password=' . $passwrod . '&smsnumber=' . $smsnumber . '&smscontent=' . $smscontent . '&sendtime=' . $sendtime;
	echo file_get_contents($url . $para)."<br>"; 
	
	
	//状态，如果有可以返回的状态，则每次返回前100个号码状态。若无，则返回空xml
	//$para = 'getreport.asp?username=' . $username . '&password=' . $passwrod;
	//echo file_get_contents($url . $para)."<br>";
	//上行，如果有可以返回的上行，则每次返回前100个上行，若无，则返回空xml
	//$para = 'getreply.asp?username=' . $username . '&password=' . $passwrod;
	//echo file_get_contents($url . $para);
	//查询余额
	//$para = 'getmoney.asp?username=' . $username . '&password=' . $passwrod;
	//echo file_get_contents($url . $para);
 }*/

 
function juhesms($phone, $tpl, $params="", $ispost = 0)
{
    $appkey = C("SMS_APPKEY"); // 通过聚合申请到数据的appkey
    $url = 'http://v.juhe.cn/sms/send'; // 请求的数据接口URL
    $params = "key={$appkey}&dtype=json&mobile={$phone}&tpl_id={$tpl}&tpl_value=%23code%23%3D123456";
    $httpInfo = array();
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        // echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);
    
    if ($response) {
        $result = json_decode($response, true);       
        // 错误码判断
        $error_code = $result['error_code'];
        if($error_code=="0"){
            return true;
        }else{
            return false;
        }
    }
}


/**
 * 发送短信的方法
 * @param 手机号 $phone
 * @param 需要发送的文字 $str
 * @return mixed 返回代码  100为正确
 * 其它错误参考http://www.dxton.com/member/member/help/
 */
function _sendSms($phone,$str){
    //请求地址
    $url = "http://sms.106jiekou.com/utf8/sms.aspx";
    $curlPost=$post_data = "account=".C('SMS_ACCOUNT')."&password=".C('SMS_PASSWORD')."&mobile=".$phone."&content=".rawurlencode($str);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    $return_str = curl_exec($curl);
    curl_close($curl);
    return $return_str;
}

/*
 * 作用：写入新消息
 * 参数：$from	发送者id
 * 		$to		消息接受者id
 * 		$content  消息内容
 * 		$targetid 相应数据表中的id的值
 * 		$mestype可选值：topic_comment(话题评论)、topic_answer(话题回复)、topic_collect(话题收藏)、topic_love(喜欢) 10站内信
 */
function insertMes($from, $to,$title,$content, $targetid, $mestype){
    $data = array(
        'mes_from'	=> $from,
        'mes_to'	=> $to,
        'mes_content' => $content,
        "mes_title"=>$title,
        'post_time'	=> time(),
        'target_id'	=> $targetid,
        'mes_type'	=> $mestype,
        'mes_status'=> '2', //未读
    );
    return M('Message')->add($data);
}
/**
 * 系统发送过信件的log
 * @param 发送给谁 $to
 * @param  内容 $content
 * @param 信息类型 $type 1短信2邮件3站内信 
 * @param 成功与否 $isok  0失败1成功
 */
function messageLog($to,$content,$type,$isok,$mes_from=1){
   $data['mes_to']=$to;
   $data['mes_from']=$mes_from;
   $data['content']=$content;
   $data['type']=$type;
   $data['isok']=$isok;   
   M("message_log")->add($data);  
}
/**
 * 发送站内信
 * @param 用户id $rid
 * @param 内容 $tpl
 */
function sendmessage($to,$title,$tpl,$mes_from=1,$mestype=10){
   if(insertMes($mes_from,$to,$title,$tpl, 0, $mestype)){
       messageLog($to,$tpl,3,'1',$mes_from);
       return true;
   }else{
       messageLog($to,$tpl,3,'0',$mes_from);
       return false;
   }
}
/**
 * 发送emall
 */
function sendEmail($address,$title,$message,$uid){   
    if(SendMail($address,$title,$message)){       
        messageLog($uid,$message,2,'1');
		return true;
    }else{
        messageLog($uid,$message,2,'0');
     	return false;	
	}
}
/**
 * 发送短信
 */
function sendSms($phond,$tpl,$uid){
    if(_sendSms($phond,$tpl)){
        messageLog($uid,$tpl,1,'1');
        return true;
    }else{
        messageLog($uid,$tpl,1,'0');
        return false;
    }
 } 
/**
 * 模版的替换
 * @param unknown $find
 * @param unknown $param
 * @param unknown $content
 * @return mixed
 */
function remind_replace($find,$param,$content){
    
    $content = str_replace(array_keys(json_decode($find,true)),$param,$content);
    $option=get_site_options();   
    $tpl=str_replace(array('#SITE_NAME#','#SITE_HOST#'), array($option['site_name'],$option['site_host']), $content);
    return $tpl;
}



/**
 * 得到支付配置
 */
function getPayConfig(){
    $config=F("pay_config");
    if(empty($config)){
        $config=M("pay_config")->where(array("state"=>1))->getField("id,type,value,name,config,logo");
        F("pay_config",$config);        
    }
    return $config;
}
/**
 * 得到积分配置
 */
function get_integral_config(){
    if(!isset($GLOBALS['integral_config'])){
      $integral=F("integral_config");
        if(empty($integral)){
            $integral=M("integral_config")->getField("id,remark,value");
            F("integral_config",$integral);
        }
        $GLOBALS['integral_config']=$integral;
      return $integral;
    }
    return $GLOBALS['integral_config'];    
}

/**
 * 得到等级配置
 */
function get_user_level_config(){ 
    if(!isset($GLOBALS['user_level'])){       
        $user_level=F("user_level");      
        if(empty($user_level)){
            $user_level=M("user_level")->getField("id,name,img,min,max");
            F("user_level",$user_level);
        }
        $GLOBALS['user_level']=$user_level;
      
        return $user_level;
    }    
    return $GLOBALS['user_level'];
}

/**
 * 提醒的函数
 * @param 提醒模版id $rid
 * @param 要提醒的用户 $uid
 * @param 模版替换的参数 $param
 */
function remind($rid,$uid,$param){
    $rem=C("remind"); 
    //先检测这个 模版ID 是否存在
    if(array_key_exists($rid, $rem)){
        //如果存在了 就取出提醒状态
        $state=$rem[$rid]['state'];       
        //检测状态是否等于0
        if($state==0){
            return true;
        }
        //不等于零就去查找数据库
        $res=M("remind")->field("title,email,sms,message,param")->find($rid);
        if(($state & 1)==1){           
            //短信
            $tpl=remind_replace($res['param'], $param, $res['sms']);
            $user=M("users")->find($uid);
            sendSms($user['user_phone'],$tpl,$uid);
        }
        if(($state & 2)==2){
            //电子邮件      
            $tpl=remind_replace($res['param'],$param,json_decode($res['email'], true));
          
            $user=M("users")->find($uid);
            sendEmail($user['user_email'],$res['title'],$tpl,$uid);
        }
        if(($state & 4) == 4){          
            //站内信            
            $tpl=remind_replace($res['param'], $param, $res['message']);           
            sendmessage($uid,$res['title'],$tpl);
        }
        return true;

    }else{
        return false;
    }
}
/**
 * 积分操作函数
 * @param 用户id $uid
 * @param 动作id $act_id 当$other等于真的时候这个地方没有用
 * @param 操作者id $o_id  1为系统
 * @param 是否是手动操作 $other
 * @param 积分 $source
 * @param 动作名称 $action_name
 * @return boolean
 */
function integral($uid,$act_id,$o_id=1,$other=FALSE,$source=0,$action_name=""){
    
    //先判断是手动操作吗
    if($other){        
        if($source==0){
            return true;
        }
        if($action_name==""){
            $action_name="系统管理操作";
        }       
        
    }else{
       
        $integral=get_integral_config();     
        //先去取这个动作的ID 如果有ID 了
        if(array_key_exists($act_id, $integral)){
            $inter=$integral[$act_id];         
            //然后判断这个地方的加分是为0吗如果是零就直接 返回
            if($inter["value"]==0){
                return true;
            }             
            $source=$inter["value"];
            $action_name=$inter['remark'];        
        
        }else{
            return false;
        }
    }  
    //不为零了 给该用户添加积分
    M("users")->where(array("id"=>$uid))->setInc('score',$source);
    //然后在在日志文件更新
      $data=array(
            'u_id'=>$uid,
            'o_id'=>$o_id,
            'action_name'=>$action_name,
            'source'=>$source,
            'time'=>time(),
            'ip'=>get_client_ip()        
        );
      if(M('integral_log')->add($data)){
          return true;
      }else{
         
          return false;
      } 
}
/**
 * 管理员操作日志
 * @param 动作名称 $actionname
 * @return boolean
 */
function adminLog($actionname){     
     $data=array(
         'uid'=>$_SESSION['ADMIN_ID'],
         'actionname'=>$actionname,
         'page'=>MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,
         'time'=>time(),
         'ip'=>get_client_ip(),
     );
     if(M("admin_log")->add($data)){
         return true;
     }else{
         return false;
     }
}
/**
 * 用户的日志
 * @param unknown $actionname
 * @return boolean
 */
function userLog($actionname){ 
    $data=array(
        'uid'=>get_current_userid(),
        'actionname'=>$actionname,
        'page'=>MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,
        'time'=>time(),
        'ip'=>get_client_ip(),
    );
    if(M("user_log")->add($data)){
        return true;
    }else{
        return false;
    }
}
/**
 * 资金操着错误日志
 * @param unknown $actionname
 * @return boolean
 */
function moneyErrLog($actionname,$uid){
    $data=array(
        'uid'=>$uid,
        'actionname'=>$actionname,
        'page'=>MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,
        'time'=>time(),
        'ip'=>get_client_ip(),
    );
    if(M("money_error_log")->add($data)){
        return true;
    }else{
        return false;
    }
}
/**
 * 标 的日志
 * @param 动作描述 $actionname
 * @param 标 id $l_id
 * @return boolean
 */
function loanLog($actionname,$l_id,$uid=null){
    if($uid==null){
       $uid=get_current_userid();
    }
    $data=array(
        'uid'=>get_current_userid(),
        'actionname'=>$actionname,
        'page'=>MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,
        'time'=>time(),
        'l_id'=>$l_id,
        'ip'=>get_client_ip(),
    );
    if(M("loan_log")->add($data)){
        return true;
    }else{
        return false;
    }
}

//总钱数=可用资金+冻结资金
/**
 * 钱的日志
 * @param int $uid  当前操着的用户ID
 * @param double $operation 金额
 * @param int $type 1充值 2冻结 3支付 4提现 5收款 6系统放款7手续费8恢复冻结资金
 * @param string $actionname 动作名称
 * @param string $counterparty 
 */
function moneyLog($uid,$operation,$actionname,$type,$counterparty="平台"){
    //如果没有钱的操着就直接返回
        if($operation==0){
            return true;
        }       
        //counterparty 对方帐号   分用户 和平台哦 平台是1把
        //uid 当前帐号        
        $account=M("money")->where(array("uid"=>$uid))->field("total_money,available_funds,freeze_funds")->find();
       
        $data=array(
            //谁的钱
            'uid'=>$uid,
            //钱给谁了
            'counterparty'=>$counterparty, 
            //动作类型
            'type'=>$type,
            //操作的资金
            'operation'=>$operation,
            //动作名称           
            'actionname'=>$actionname,            
            //总钱数
            'total_money'=>$account['total_money'],
            //可用资金
            'available_funds'=>$account['available_funds'],
            //冻结资金
            'freeze_funds'=>$account['freeze_funds'],
            'time'=>time(),
            'ip'=>get_client_ip(),
            
        );   
        return M("money_log")->add($data);
   
}

/**
 * 管理钱的日志  用于手续费等
 * @param int $uid  当前操着的用户ID
 * @param double $operation 金额
 * @param int $type 1手续费 
 * @param string $actionname 动作名称
 * @param string $counterparty  对方帐号
 */
function moneySysLog($counterparty,$operation,$actionname,$type,$uid="平台"){
    //如果没有钱的操着就直接返回
    if($operation==0){
        return true;
    }
    //counterparty 对方帐号  
    //uid 当前操作者
    $account=M("money")->where('uid=1')->field("total_money,available_funds")->find();
     
    $data=array(
        //操作者
        'uid'=>$uid,
        //对方帐号
        'counterparty'=>$counterparty,
        //动作类型
        'type'=>$type,
        //操作的资金
        'operation'=>$operation,
        //动作名称
        'actionname'=>$actionname,
        //总钱数
        'total_money'=>$account['total_money'],
        //可用资金
        'available_funds'=>$account['available_funds'],    
        'time'=>time(),
        'ip'=>get_client_ip(),

    );
    return M("money_sys_log")->add($data);
     
}
/**
 * 添加水印
 * @param $source 原图文件名

 * @return string
 * */
function water($source)
{
	//检测添加水印是否开启
	if(C("con_watermark_status")!=1) return $source;
	$waterposition=C("con_watermark_position");
	$waterposition=empty($waterposition)?1:$waterposition;
	$image = new \Think\Image();
	$image->open($source);
	$water_log=C("con_watermark_log");	//获取配置的水印图片
	if(C("con_watermark_type")==2 && !empty($water_log)) //图片类型
	{
		$water="./".strstr($water_log,"data");
		$image->open($source)->water($water,$waterposition)->save($source);
	}else{
		$water=C("con_watermark_word");
		$fontface='./jsxy.ttf';
		//字体大小
		$wateSize=C("con_watermark_font");
		//字体颜色
		$waterColor=C("con_watermark_color");
		$waterColor=empty($waterColor)?"#FF0000":$waterColor;
		$image->open($source)->text($water,$fontface,$wateSize,$waterColor,$waterposition)->save($source);
	}

	return $source;
}
/**
 * 判断是否为图片路径
 * @param $filename 图片路径
 * return boolean
 * */
function isImage($filename){
	$types = '.gif|.jpeg|.png|.bmp';//定义检查的图片类型
	if(file_exists($filename)){
		$info = getimagesize($filename);
		$ext = image_type_to_extension($info['2']);
		return stripos($types,$ext);
	}else{
		return false;
	}
}
/**
 * 格式化价格
 * @param unknown $price
 * @return string
 */
function format_price($price)
{
    return '￥'."".number_format($price,2);
}

/**
 * 剩余时间
 */
function remain_time($remain_time){   
    
    $d = intval($remain_time/86400);
    $h = intval(($remain_time%86400)/3600);
    $m = intval(($remain_time%3600)/60);
    return $d.'天'.$h.'时'.$m.'分';
}
/**
 * 下个月的还款日
 * @param unknown $time
 * @param number $m
 * @return unknown
 */
function next_replay_month($time,$m=1,$format = 'Y-m-d H:i:s')
{
    $str_t = strtotime(date($format,$time)." ".$m." month "); 
    return $str_t;
}
/**
 * LOG文件
 * @param unknown $msg
 */
function aog($msg){
    if(APP_DEBUG){
        echo $msg,'<br/>';
    }
}
/**
 *截取替换
 */
function utf_substr($str){
    return mb_substr($str, 0, 1).'***'.mb_substr($str, -1, 1);
}
/**
 * 贷款的状态
 * @param unknown $state
 * @return string
 */
function loan_state($state){
    // 0 待审核	1审核通过	2审核失败	3用户取消	4流标	5满标待审核		6满标审核失败	7还款中	8逾期中	9已完成
    $name="";
    switch ($state){
        case 0:
            $name="待审核";
            break;
        case 1:
            $name="立即投资";
            break;
        case 2:
            $name="审核失败";
            break;
        case 3:
            $name="用户取消";
            break;
        case 4:
            $name="流标";
            break;
        case 5:
            $name="等待复审";
            break;
        case 6:
            $name="复审失败";
            break;
        case 7:
            $name="还款中";
            break;
        case 8:
            $name="逾期中";
            break;
        case 9:
            $name="已完成";
    }
    return $name;
}

/**
 * 计算两个日期差几个月
 */
function how_much_month($start_time,$end_time){
    if($start_time=="" || $end_time=="")
    {
        return "";
    }
   
    $time1 = date("Y",$start_time)*12 + date("m",$start_time);
    $time2 = date("Y",$end_time)*12 + date("m",$end_time); 
    return $time2 - $time1;
}
//用户等级判断
function get_user_level($score,$index="img"){   
   if($score<0){
       return array();
   }   
   $level=get_user_level_config();
   
   //先根据积分判断等级
   $dengji=array();
   $k=array();
   foreach ($level as  $v){
       if($score >= $v['min'] && $score <= $v['max']){
           $dengji=$v;
           break;
       }
       $k=$v;
   }
   $dengji=empty($dengji)?$k:$dengji;  
   switch ($index){
       case 'img': //只返回图片                 
           return $dengji['img'];
       case 'level'://只返回等级ID          
           return $dengji['id'];
       case 'all'://返回全部
           return $dengji;
   }
}

//同步贷款状态
function syn_deal_status($id){
    
}
function getOneUseIndex($sql){
   $res= M()->query($sql);
   return current($res[0]);
}
//判断用户导航的所在位置
//判断用户导航的所在位置
//判断用户导航的所在位置
function menuPostion($module,$action,$func)
{
    //第二个等于空说明一个参数
    if($action==''){
        if(strtolower($module)=='portal'&&strtolower($module)==strtolower(MODULE_NAME)){
            return true;
        }
    }
    if($func==''){        
        if(strtolower($action)=='center'&&strtolower($module)==strtolower(MODULE_NAME)){
            return  true;
        }
        if(strtolower($action)=='borrow'&&strtolower(CONTROLLER_NAME)=='borrow'){
            return  true;
        }
    }
    if(strtolower($func)==strtolower(ACTION_NAME)&&strtolower($action)==strtolower(CONTROLLER_NAME)&&strtolower($module)==strtolower(MODULE_NAME)){
        return true;
    }
    if(strtolower($module)=='loan'&&strtolower(CONTROLLER_NAME)=='index'){
        if((ACTION_NAME=='deal'||ACTION_NAME=='transfer'||ACTION_NAME=='t_details')&&$func=='lists'){
            return true;
        }
    }
     
    return false;
	
// 		echo  MODULE_NAME;
// 	echo CONTROLLER_NAME;
// 	echo ACTION_NAME;

}

