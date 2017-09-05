<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="Generator" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
<link rel="icon" href="/iocn.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="/iocn.ico" type="/image/x-icon" />
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>" />
<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/style.css" />
<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/weebox.css" />
<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/main.css" />
<style>
.sddmlia a:hover {
	background: #49A3FF
}
.sddmdiv {
	position: absolute;
	left:0px;
	top:55px;
	visibility: hidden;
	z-index:50;
	width:100px;
}
.sddmdiva {
	position: relative;
	background:#E47F2B;
	display: block;
	color:#333;
	font: 12px arial;
	height:30px;
	line-height:30px;
	width: 96px;
	text-align: center;
}
.sddmdiv a:hover {
	background: #c15f0e;
}
</style>
<script type="text/javascript">

var APP_ROOT = '/';
var LOADER_IMG = '';
var ERROR_IMG = '';

</script>
<script type="text/javascript">
<!--
var timeout         = 100;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>

<!--[if lt IE 10]>
<script type="text/javascript" src="/tpl/simplebootx/Public/js/PIE.js"></script>
<![endif]-->

</head>

<body>
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.js"></script> 
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.bgiframe.js"></script> 
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.weebox.js"></script> 
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.pngfix.js"></script> 
<script type="text/javascript" src="/tpl/simplebootx/Public/js/lazyload.js"></script> 
<script type="text/javascript" src="/tpl/simplebootx/Public/js/script.js"></script> 
<script language="javascript">
$(function() {
    if (window.PIE) {
        $('.rounded').each(function() {
            PIE.attach(this);
        });
    }
});
</script> 

<!--<div style="position:fixed;bottom:40px;right:40px;z-index:99999; width:110px;"><a><img src="/down/images/appcode.jpg" /></a></div>--> 
<!--qq客服代码-->
<link href="/tpl/simplebootx/Public/css/qqkfcss.css" type="text/css" rel="stylesheet" />
<script>
	function show() {
	var floatContact = document.getElementById('float-contact');
	var floatContactMini = document.getElementById('float-contact-mini');
	if(floatContact.style.display=="none") {
		floatContact.style.display="block";
		floatContactMini.style.display="none";
	}else {
		floatContact.style.display="none";
		floatContactMini.style.display="block";
	}
}
</script>
<div  class="float-contact" id="float-contact" style=" z-index:1000; position: fixed; right: 1px; display:none;"> <a title="点击收缩" href="javascript:void(0);" onclick="show()" class="close" id="float-contact-close"></a>
  <div class="container">
    <div class="qq" style="border:#6fba29 solid 3px;border-radius: 0px 0px 4px 4px;border-top:none; margin-top:-2px;">
      <ul class="btn1">
        <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3238496694&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3238496694:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></li>
        <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3284612319&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3284612319:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></li>
        <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2030874377&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:2030874377:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></li>
        <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2644760349&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:2644760349:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></li>
        <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3238496694&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3238496694:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></li>
      </ul>
    </div>
  </div>
</div>
<div class="float-contact-mini" id="float-contact-mini" style=" z-index:200; display:block; position: fixed; right: 1px;"> <a href="javascript:void(0);" onclick="show()" id="float-contact-mini"  ></a> </div>
<div class="header" id="header" style="position:relative; z-index:2;">
  <div class="constr">
    <div class="wrap clearfix" style="overflow:visible;">
      <div class="f_l"> <img src="/tpl/simplebootx/Public/images/tel.png"/ style="float:left; margin-top:5px;"> <span>客服电话:</span><span style=" font-style:italic;color:#CCC;">0371-63225933</span> 
        <!--<div class="sharemk">
					<a  href="" target="_blank" title="新浪微博"; class="share xinlan"></a>
					<a  href="" target="_blank" title="腾讯微博"; class="share tenxun"></a>
					<a  href="" target="_blank" title="微信"; class="share weixin"></a>
				</div>--> 
      </div>
      <div class="f_r"> <span id="user_head_tip" class="pr"> 
        <!---//////////////////////------用户登了的开始------//////////////////////-------->
        
        <?php if(sp_is_user_login()): ?><span class="li li_no" id="J_account"> 
        	<span class="li" rel=''> <a <?php if($Think.CONTROLLER_NAME == 'Xszy'){echo 'class="current"';}?> href="<?php echo U('Loan/xszy/index');?>" >新手指引</a> </span><span class="li"> </span>
        	<span class="f14">您好，</span><!-- <a href="<?php echo U('User/Center/index');?>"> --><b style="color:#E47F2B;"><?php echo ($user["user_login"]); ?></b><!-- </a> --> <a class="rrd-dimgray" href="<?php echo u('user/index/logout');?>">退出</a>
          <ul class="ui-nav-dropdown ui-nav-dropdown-account">
            <li class="ui-nav-dropdown-angle"><span></span></li>
            <!--<li class="ui-nav-dropdown-item">
			   	<a href="<?php echo u('user/Message/index');?>" class="rrd-dimgray msg_count">
			   	<span class="pm f_l mt5 {if $msg_count>0 || $user.videopassed neq 1 || $user.idcardpassed neq 1 || $user.creditpassed neq 1 || $user.workpassed neq 1 || $user.incomepassed neq 1}new_pm {/if}">
				</span> 消息<?php if($msg_count > 0): echo ($msg_count); endif; ?></a>
		   	</li>
			<li class="ui-nav-dropdown-separator"></li>
          	<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo U('User/Money/index',array('act'=>'incharge'));?>">充值</a></li>
          	<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo U('User/Money/index',array('act'=>'bank'));?>">提现</a></li>
          	<li class="ui-nav-dropdown-separator"></li>
          	<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo U('User/Money/index');?>">资金管理</a></li>
          	<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo U('User/Invest/index');?>">理财管理</a></li>
          	<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo U('User/Deal/index');?>">借款管理</a></li>
          	<li class="ui-nav-dropdown-separator"></li>
          	<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo u('user/index/logout');?>">退出</a></li>
			<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo u('user/center/index');?>">个人中心</a></li>
			-->
          </ul>
          </span> 
          <script type="text/javascript">
	var acc_menu_hide = null;
	var hide_menu = null;
		$("#J_account").hover(function(){
			clearTimeout(acc_menu_hide);
			$(this).addClass("li_hover");
		},function(){
			var obj = $(this);
			hide_menu = function(){
				obj.removeClass("li_hover");
			}
			acc_menu_hide = setTimeout(hide_menu,200);
		});

	</script>
          <?php else: ?>
          
          <span class="li" rel=''> <a <?php if($Think.CONTROLLER_NAME == 'Xszy'){echo 'class="current"';}?> href="<?php echo U('Loan/xszy/index');?>" >新手指引</a> </span><span class="li">|</span> 
          <span class="li"><a href="/index.php/loan/Borrow/inapply">理财计算器</a></span> <span class="li">|</span> <span class="li"><a href="<?php echo U('User/register/index');?>">注册</a></span> <span class="li">|</span> <span class="li"><a href="<?php echo U('User/Login/index');?>">登录</a></span><?php endif; ?>
        
        <!---//////////////////////------用户登了的结束------//////////////////////-------> 
        
        <!--<span class="li"><a href="<?php echo U('Portal/Article/index',array('id'=>4));?>">帮助</a></span>--> 
        </span> </div>
    </div>
    <!--end wrap--> 
    
  </div>
  <div class="main_bars">
    <div class="main_bar wrap">
      <div class="logo mr15"> <a class="link f_l" href="/"> <img src="/4cdd501dc023b.png" alt=""/> </a> </div>
      <ul class="main_nav">
        <li class="" rel=''> <a href="/" >首页</a> </li>
        <li class="" rel=''> <a <?php if($Think.CONTROLLER_NAME == 'Index'){echo 'class="current"';}?> href="<?php echo U('Loan/index/lists');?>"  onmouseover="mopen('m1')" onmouseout="mclosetime();">我要投资</a><img src="/tpl/simplebootx/Public/images/jt1.png"/ style="padding-top:30px;padding-left: 4px; float:right;"/>
          <p style="z-index:100; font-size:15px;" class="sddmdiv" id="m1"  onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> <a style="color:#ffffff; font-size:15px; " href="<?php echo U('Loan/index/lists');?>" class="sddmdiva">投资列表</a> <a style="color:#ffffff; font-size:15px;" href="<?php echo U('Loan/index/transfer');?>" class="sddmdiva">债权转让</a> </p>
        </li>
        <li class="" rel=''> <a <?php if($Think.CONTROLLER_NAME == 'Borrow'){echo 'class="current"';}?>  href="<?php echo U('Loan/borrow/index');?>" onmouseover="mopen('m3')" onmouseout="mclosetime();">我要融资</a><!-- <img src="/tpl/simplebootx/Public/images/jt1.png"/ style="padding-top:30px;padding-left: 4px; float:right;"/>
        	<p class="sddmdiv" id="m3"  onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                <a style="color:#ffffff; font-size:15px;"  href="<?php echo U('Loan/index/lists');?>" class="sddmdiva" >投资列表</a>
                <a style="color:#ffffff;  font-size:15px;" href="<?php echo U('Loan/index/transfer');?>" class="sddmdiva">债权转让</a>
                        
            </p> -->
        </li>
        
        <li class="" rel=''> <a <?php if($Think.CONTROLLER_NAME == 'Jm'){echo 'class="current"';}?>  href="<?php echo U('Loan/jm/index');?>"   >加入我们</a> </li>
        <li class="" rel=''> <a <?php if($Think.CONTROLLER_NAME == 'List' || $Think.CONTROLLER_NAME =='Article'){echo 'class="current"';}?>  href="<?php echo U('portal/list/index');?>"   >资讯中心</a> </li>
        <li class="" rel=''> <a href="<?php echo U('User/center/index');?>"  onmouseover="mopen('m2')" onmouseout="mclosetime();"  ><!--<img src="/tpl/simplebootx/Public/images/tx.png"/ style="padding-top:15px; padding-right:10px; float:left;" >-->个人中心</a>
          <p style="z-index:100; font-size:15px;" class="sddmdiv" id="m2"  onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> 
            <!-- <a style="color:#ffffff; font-size:15px; width:125px;" href="<?php echo U('User/center/index');?>" class="sddmdiva">账户首页</a>--> 
            <!-- <a style="color:#ffffff; font-size:15px; width:125px;" href="<?php echo U('user/Audit/index');?>" class="sddmdiva">认证中心</a>--> 
            <!--<a style="color:#ffffff; font-size:15px; width:130px;" href="<?php echo U('User/Invest/index');?>" class="sddmdiva">我的投资</a> <a style="color:#ffffff; font-size:15px; width:130px;" href="<?php echo U('User/Deal/borrow_stat');?>" class="sddmdiva">贷款统计</a> --></p>
        </li>
      </ul>
	  <div><img style="padding-left: 25px; margin-top: 4px;" src="/tpl/simplebootx/Public/images/cccc.png"/></div>
    </div>
  </div>
</div>
<!---//////////////////////------首页广告位------//////////////////////-------> 
<!-- 
<div id="main_adv_box" class="main_adv_box f_l">
    <div id="main_adv_img" class="main_adv_img">
        <span rel="1"></span>
        <span rel="2"></span>
        <span rel="3"></span>
        <span rel="4"></span>
        <span rel="5"></span>
    </div>
    <div id="main_adv_ctl" class="main_adv_ctl">
        <ul>
            <li rel="1">1</li>
            <li rel="2">2</li>
            <li rel="3">3</li>
            <li rel="4">4</li>
            <li rel="5">5</li>
        </ul>
    </div>
    <script type="text/javascript" src="http://www.webtiro.com/demo-p2p/app/Tpl/blue/js/index_adv.js"></script>
</div>
<p class="touy"></p>
 --> 
<!---//////////////////////------广告为结束------//////////////////////------->


</div>
<style>
.main_bars {
	border-bottom:none !important;
}
.yindao_wrap {
	width:100%;
	height:auto;
	font-family:"微软雅黑";
	margin:0 auto -25px auto;
	background-color:#fff;
	padding-bottom:40px;
}
body {
	background-color:#fff !important;
}
.yindao_bann {
	width:100%;
	height:316px;
	background:url(/tpl/simplebootx/Public/images/yindao_bann.jpg) no-repeat center top;
}
.yindao_con {
	width:1050px;
	height:auto;
	margin:0 auto;
	text-align:center;
}
.yindao_bz1 {
	padding-top:30px;
	padding-bottom:40px;
}
.liuchengtu img {
	margin-top:50px;
	margin-bottom:30px;
}
.youshi {
	width:33%;
	height:auto;
	float:left;
}
.youshi h2 {
	margin-bottom:20px;
	margin-top:20px;
}
.youshi p {
	font-size:16px;
	color:#666;
}
.yindao_ys {
	padding-top:20px;
	padding-bottom:20px;
}
.yindao_wenti {
	width:1050px;
	height:auto;
	margin:0 auto;
	line-height:35px;
}
.yindao_wenti p {
	font-size:16px;
}
.yindao_wenti p:hover {
	background-color:rgba(204, 204, 204, 0.26);
}
.liucheng_img {
	margin-top:50px;
	margin-bottom:40px;
}
.touzi_btn a {
	display: block;
width: 222px;
height: 69px;
line-height: 70px;
background-color: #E47F2B;
border-bottom: 3px solid #E47F2B;
cursor: pointer;
font-size: 36px;
color: #fff;
font-family: "微软雅黑";
margin: 40px auto 18px auto;
}
.touzi_btn p {
	font-size:20px;
}
<!--
<!--
新增样式-->
<!--
新增样式-->
-->
.main {
clear:both;
padding:8px;
text-align:center;
}
/*TAB样式开始啰*/
#tabs1 {
	text-align:left;
	width:1050px;
	position:relative;
}
.menu1box {
	overflow:hidden;
	height:35px;
	width:1050px;
	text-align:left;
	margin-bottom:20px;
}
#menu1 {
	position:absolute;
	top:0;
	left:0;
	z-index:1;
}
#menu1 li {
	float:left;
	display:block;
	cursor:pointer;
	width:107px;
	text-align:center;
	line-height:40px;
	height:40px;
	padding-top:2px;
	border-bottom: none;
	font-size:19px;
	font-weight:bolder;
	margin-left:85px;
}
#menu1 li:hover {
	background-color:#CCC; color:#FFC;
}
#menu1 li.hover {
	background-color: #E47F2B;
	height: 40px;
	line-height: 40px;
	font-weight:bold;
	color:#FFF;
}
.main1box {
	clear:both;
	margin-top:40px;
	height:auto;
	width:1050px;
	
}
#main1 ul {
	display: none;
	text-align:left;
}
#main1 ul.block {
	display: block;
}
</style>
<div class="yindao_wrap">
<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/loan.css" />
<div class="yindao_wrap clearfix">
  <div class="yindao_bann"> </div>
  <div class="yindao_con">
    <div class="yindao_bz1"> <img src="/tpl/simplebootx/Public/images/bz.jpg"> </div>
    <h1 style="font-size:44px;margin-bottom:40px;">什么是煜商金融</h1>
    <div style="width:1030px;height:auto;margin:0;line-height:30px; font-size:14px; text-indent:4em;">煜商金融网由一支曾在华尔街顶级投行工作、有着丰富金融及互联网经验的团队成立。我们致力于为广大缺乏投资渠道的人们提供一个安全、诚信、低风险、回报稳定的理财渠道。在金融产品的设计不断变得让人眼花缭乱、各种理财渠道推销鱼龙混杂的今天，煜商金融网希望能帮助您化解看似高深的理财投资，将各种<p style="float:left; margin-left:-40px;">复杂的理财产品变成让所有人都能看得懂的理财计划！</p> </div>
    <div class="liuchengtu"> <img src="/tpl/simplebootx/Public/images/bz1.jpg"> </div>
  </div>
  <div class="yindao_con">
    <div class="yindao_bz1"> <img src="/tpl/simplebootx/Public/images/bz2.jpg"> </div>
    <h1 style="font-size:44px;margin-bottom:30px;">煜商金融,牛在哪?</h1>
    <div class="yindao_ys">
      <div class="youshi"> <img src="/tpl/simplebootx/Public/images/bz3.jpg">
        <h2>
        高收益，低门槛
        </h3>
        <p>30倍银行存款利息，50元起步，0手续费</p>
      </div>
      <div class="youshi"> <img src="/tpl/simplebootx/Public/images/bz4.jpg">
        <h2>
        安全审核流程
        </h3>
        <p>7道审核、FICO评分、机构全额担保</p>
      </div>
      <div class="youshi"> <img src="/tpl/simplebootx/Public/images/bz5.jpg">
        <h2>
        随时随地赎回投资
        </h3>
        <p>2步即可赎回投资，最快当天到账</p>
      </div>
      <div style="clear:both;"></div>
    </div>
  </div>
  <div class="yindao_wenti">
    <div class="yindao_bz1"> <img src="/tpl/simplebootx/Public/images/bz6.jpg"> </div>
    <h1 style="font-size:44px;margin-bottom:30px;text-align:center">常见问题</h1>
    <!--<div class="wenti_list">
       	 	<h3>Q:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有项目期限一般有项目期限一般有项目期限一般有3个月、6个月、9个月、12个月</p>
       	 	<h3>Q:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3个月、6个月、9个月、12个月</p>
       	 	<h3>Q:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3项目期限一般有项目期限一般有项目期限一般有个月、6个月、9个月、12个月</p>
       	 	<h3>Q:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3个项目期限一般有项目期限一般有项目期限一般有月、6个月、9个月、12个月</p>
       	 	<h3>Q:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3项目期限一般有项目期限一般有项目期限一般有项目期限一般有个月、6个月、9个月、12个月</p>
       	 	<h3>Q:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3项目期限一般有项目期限一般有项目期限一般有项目期限一般有项目期限一般有个月、6个月、9个月、12个月</p>
       	 </div>--> 
    <!--<div style="width:1050px; margin:50px auto;">
 代码开始 
 tab选项卡 start 
 tab 
<div class="menu">
	<ul>
		<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');" onclick="return false;" title="" id="tablink1" class="tab1 tabactive">注册认证</a></li>
		<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');" onclick="return false;" title="" id="tablink2" class="tab2">充值提现</a></li>
		<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');" onclick="return false;" title="" id="tablink3" class="tab3">贷款管理</a></li>
		<li><a href="#" onmouseover="easytabs('1', '4');" onfocus="easytabs('1', '4');" onclick="return false;" title="" id="tablink4" class="tab4">理财管理</a></li>
        <li><a href="#" onmouseover="easytabs('1', '5');" onfocus="easytabs('1', '5');" onclick="return false;" title="" id="tablink5" class="tab5">其他问题</a></li>
	</ul>
</div>
 content 
<div id="tabcontent1" style="display: block;"><div class="wenti_list">
       	 	<h3>Q1:如何在网站注册？</h3>
       	 	<p>A:进入煜商金融（www.ysjr8.com）官网首页,点击右上角"注册"。
根据页面提示，填写邮箱、注册账号、密码、手机号码及验证码，点击"注册"即可完成。
</p>
       	 	<h3>Q2:注册过程中邮箱没有收到邮件怎么办？</h3>
       	 	<p>A:请查询邮件是否被放置到垃圾邮件中，或更换其他常用的邮箱。</p>
       	 	<h3>Q3:手机收不到验证码怎么回事？</h3>
       	 	<p>A:（1）	确认短信是否被手机软件拦截或过滤。
（2）	确认手机是否正常接近短信（信号问题、欠费、停机等）。
（3）	短信收发过程中可能会有延时，请耐心等候。
（4）	直接联系客服为您服务。
</p>
       	 	<h3>Q4:注册成功后需要完成哪些认证？</h3>
       	 	<p>A:注册成功后需要完成实名认证和工作认证及手机认证。</p>
       	 	<h3>Q5:如何实名认证？</h3>
       	 	<p>A:用户注册成功后可以在"个人中心-账户设置-填写个人信息"，即可完成实名认证。</p>
       	 	<h3>Q6:认证成功后，身份证号码可以更换吗？</h3>
       	 	<p>A:为保障投资者账号安全，实名认证通过后不能修改，一个身份证号仅认证一个账号。</p>
       	 </div></div>
<div id="tabcontent2" style="display: none;"><div class="wenti_list">
       	 	<h3>Q1:如何充值？</h3>
       	 	<p>A:登录账户，进入"个人中心"点击左侧"充值提现"，再点击"会员充值"即可。</p>
       	 	<h3>Q2:有哪些充值渠道？</h3>
       	 	<p>A:用户可通过使用已开通网上银行的储蓄卡、信用卡或者第三方支付进行充值。</p>
       	 	<h3>Q3:如何提现？</h3>
       	 	<p>A:用户可在 官网登录，进入个人中心，选择左侧的"充值提现"，进入"提现"页面后，选择"会员提现"添加银行卡信息，最后填写取现金额即可。</p>
       	 	<h3>Q4:提现有次数和金额限制吗？</h3>
       	 	<p>A:我们是没有次数与金额限制的。</p>
       	 	<h3>Q5:提现有手续费没有？</h3>
       	 	<p>A:提现手续费在10万以内每笔2元。</p>
       	 	<h3>Q6:提现后多久会到账？</h3>
       	 	<p>A:提现一般是1到3个工作日。</p>
       	 </div></div>
<div id="tabcontent3" style="display: none;"><div class="wenti_list">
       	 	<h3>Q1:如何申请借款？</h3>
       	 	<p>A:在首页点击"我要贷款"，根据个人需要选择3个月、6个月或12个月的期限然后点击"立即申请"，填写借款信息并确认发布即可。</p>
       	 	<h3>Q2:是否可以修改已发布的借款？</h3>
       	 	<p>A:用户发布贷款标之后，不可以对已发布的贷款进行修改，请用户在填写贷款信息时请认真填写各项信息。</p>
       	 	<h3>Q3:如何查看借款进度？</h3>
       	 	<p>A:在个人中心查看"贷款管理-已发布的贷款"可以查看借款进度。</p>
       	 	<h3>Q4:未按时归还借款，需要支付哪些费用？</h3>
       	 	<p>A:未按时还款则需要支付逾期费。</p>
       	 	<h3>Q5:还款方式都有哪些??</h3>
       	 	<p>A:等额本金是指一种贷款的还款方式，等额本金法最大的特点是每月的还款额不同，呈现逐月递减的状态;它是将贷款本金按还款的总月数均分，再加上上期剩余本金的利息，这样就形成月还款额，所以等额本金法第一个月的还款额最多 ，然后逐月减少，越还越少。 </p>
       	 	<h3>Q6:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3项目期限一般有项目期限一般有项目期限一般有项目期限一般有项目期限一般有个月、6个月、9个月、12个月</p>
       	 </div></div>
<div id="tabcontent4" style="display: none;"><div class="wenti_list">
       	 	<h3>Q1:投资门槛是多少？</h3>
       	 	<p>A:100元起投。</p>
       	 	<h3>Q2:如何进行投资？</h3>
       	 	<p>A:根据首页投资列表中"招标中"的项目进行选择，认真阅读所投资的产品及项目的详细信息（包括产品期限，购买金额、年化收益率，利息处理方式、借款信息等）。</p>
       	 	<h3>Q3:投标前需要注意什么？</h3>
       	 	<p>A:投标前请认真阅读所投资的项目详细信息（包括借款金额，年利率，借款期限等），以确定您所要投的标符合您的风险承受能力和所要求的投资回报率；</p>
       	 	<h3>Q4:投资期限都有多长时间的？</h3>
       	 	<p>A:我们平台一般有3个月、6个月和12个月等</p>
       	 	<h3>Q5:如何查看投资标的进展状况？</h3>
       	 	<p>A:在个人中心查看"理财管理-我的投资"查看所投资标的进展状况。</p>
       	 	<h3>Q6:投资后什么时候开始计息？</h3>
       	 	<p>A:投资是 从标满之后还款之日开始计息。</p>
       	 </div></div>
 <div id="tabcontent5" style="display:none;"><div class="wenti_list">
       	 	<h3>Q1:111111项目期限大方的说法都有多长时间的?</h3>
       	 	<p>A:项目期限一般有项目期限一般有项目期限一般有项目期限一般有3个月、6个月、9个月、12个月</p>
       	 	<h3>Q2:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3个月、6个月、9个月、12个月</p>
       	 	<h3>Q3:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3项目期限一般有项目期限一般有项目期限一般有个月、6个月、9个月、12个月</p>
       	 	<h3>Q4:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3个项目期限一般有项目期限一般有项目期限一般有月、6个月、9个月、12个月</p>
       	 	<h3>Q5:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3项目期限一般有项目期限一般有项目期限一般有项目期限一般有个月、6个月、9个月、12个月</p>
       	 	<h3>Q6:项目期限都有多长时间的?</h3>
       	 	<p>A:项目期限一般有3项目期限一般有项目期限一般有项目期限一般有项目期限一般有项目期限一般有个月、6个月、9个月、12个月</p>
       	 </div></div>    
 tab选项卡 end 
<a href="#" onmousedown="javascript:stop_autochange(); return false;">停止自动切换</a>&nbsp;|&nbsp; 
<a href="#" onmousedown="javascript:restart_autochange(); return false;">开始自动切换</a>
 代码结束 
</div>-->
    
    <div id="tabs1">
      <div class="menu1box">
        <ul id="menu1">
          <li class="hover" onClick="setTab(1,0)">注册认证</li>
          <li onClick="setTab(1,1)">充值提现</li>
          <li onClick="setTab(1,2)">贷款管理</li>
          <li onClick="setTab(1,3)">理财管理</li>
          <li onClick="setTab(1,4)">其它问题</li>
        </ul>
      </div>
      <div class="main1box">
        <div class="main" id="main1">
          <ul class="block">
            <div id="tabcontent1" style="display: block;">
              <div class="wenti_list">
                <h3>Q1;如何在网站注册？</h3>
                <p>A:进入煜商金融（www.ysjr8.com）官网首页,点击右上角"注册"。
                  根据页面提示，填写邮箱、注册账号、密码、手机号码及验证码，点击“注册”即可完成。 </p>
                <h3>Q2:注册过程中邮箱没有收到邮件怎么办？</h3>
                <p>A:请查询邮件是否被放置到垃圾邮件中，或更换其他常用的邮箱。</p>
                <h3>Q3:手机收不到验证码怎么回事？</h3>
                <p>A:（1）	确认短信是否被手机软件拦截或过滤。
                  （2）	确认手机是否正常接近短信（信号问题、欠费、停机等）。
                  （3）	短信收发过程中可能会有延时，请耐心等候。
                  （4）	直接联系客服为您服务。 </p>
                <h3>Q4:注册成功后需要完成哪些认证？</h3>
                <p>A:注册成功后需要完成实名认证和工作认证及手机认证。</p>
                <h3>Q5:如何实名认证？</h3>
                <p>A:用户注册成功后可以在"个人中心-账户设置-填写个人信息"，即可完成实名认证。</p>
                <h3>Q6:认证成功后，身份证号码可以更换吗？</h3>
                <p>A:为保障投资者账号安全，实名认证通过后不能修改，一个身份证号仅认证一个账号。</p>
              </div>
            </div>
          </ul>
          <ul>
            <div id="tabcontent2" style="display:block;">
              <div class="wenti_list">
                <h3>Q1:如何充值？</h3>
                <p>A:登录账户，进入"个人中心"点击左侧"充值提现"，再点击"会员充值"即可。</p>
                <h3>Q2:有哪些充值渠道？</h3>
                <p>A:用户可通过使用已开通网上银行的储蓄卡、信用卡或者第三方支付进行充值。</p>
                <h3>Q3:如何提现？</h3>
                <p>A:用户可在 官网登录，进入个人中心，选择左侧的"充值提现"，进入"提现"页面后，选择"会员提现"添加银行卡信息，最后填写取现金额即可。</p>
                <h3>Q4:提现有次数和金额限制吗？</h3>
                <p>A:我们是没有次数与金额限制的。</p>
                <h3>Q5:提现有手续费没有？</h3>
                <p>A:提现手续费在10万以内每笔2元。</p>
                <h3>Q6:提现后多久会到账？</h3>
                <p>A:提现一般是1到3个工作日。</p>
              </div>
            </div>
          </ul>
          <ul>
            <div id="tabcontent3" style="display:block;">
              <div class="wenti_list">
                <h3>Q1:如何申请借款？</h3>
                <p>A:在首页点击"我要贷款"，根据个人需要选择3个月、6个月或12个月的期限然后点击"立即申请"，填写借款信息并确认发布即可。</p>
                <h3>Q2:是否可以修改已发布的借款？</h3>
                <p>A:用户发布贷款标之后，不可以对已发布的贷款进行修改，请用户在填写贷款信息时请认真填写各项信息。</p>
                <h3>Q3:如何查看借款进度？</h3>
                <p>A:在个人中心查看"贷款管理-已发布的贷款"可以查看借款进度。</p>
                <h3>Q4:未按时归还借款，需要支付哪些费用？</h3>
                <p>A:未按时还款则需要支付逾期费。</p>
                <h3>Q5:还款方式都有哪些??</h3>
                <p>A:(1)等额本金是指一种贷款的还款方式，等额本金法最大的特点是每月的还款额不同，呈现逐月递减的状态;它是将贷款本金按还款的总月数均分，再加上上期剩余本金的利息，这样就形成月还款额，所以等额本金法第一个月的还款额最多 ，然后逐月减少，越还越少。 
                  (2)  等额本息是指一种购房贷款的还款方式，最重要的一个特点是每月的还款额相同，从本质上来说是本金所占比例逐月递增，利息所占比例逐月递减，月还款数不变，即在月供"本金与利息"的分配比例中，前半段时期所还的利息比例大、本金比例小，还款期限过半后逐步转为本金比例大、利息比例小。 </p>
              </div>
            </div>
          </ul>
          <ul>
            <div id="tabcontent4" style="display:block;">
              <div class="wenti_list">
                <h3>Q1:投资门槛是多少？</h3>
                <p>A:100元起投。</p>
                <h3>Q2:如何进行投资？</h3>
                <p>A:1）根据首页投资列表中"招标中"的项目进行选择，认真阅读所投资的产品及项目的详细信息（包括产品期限，购买金额、年化收益率，利息处理方式、借款信息等）。
                  （2）确定投标项目点击"马上投标"。
                  （3）投资时，仔细输入投标金额，填写支付密码，并确认投标即可完成投资。 </p>
                <h3>Q3:投标前需要注意什么？</h3>
                <p>A:(1）根据首页投资列表中"招标中"的项目进行选择，认真阅读所投资的产品及项目的详细信息（包括产品期限，购买金额、年化收益率，利息处理方式、借款信息等）。
                  （2）确定投标项目点击"马上投标"。
                  （3）投资时，仔细输入投标金额，填写支付密码，并确认投标即可完成投资。 </p>
                <h3>Q4:投资期限都有多长时间的？</h3>
                <p>A:我们平台一般有3个月、6个月和12个月等</p>
                <h3>Q5:如何查看投资标的进展状况？</h3>
                <p>A:在个人中心查看"理财管理-我的投资"查看所投资标的进展状况。</p>
                <h3>Q6:投资后什么时候开始计息？</h3>
                <p>A:投资是 从标满之后还款之日开始计息。</p>
              </div>
            </div>
          </ul>
          <ul>
            <div id="tabcontent5" style="display:block;">
              <div class="wenti_list">
                <h3>Q1:什么是债权转让？</h3>
                <p>A:债权转让是指持有人通过债权转让平台将债权挂出且与购买人签订债权转让协议，将所持有的债权转让给购买人的操作。</p>
                <h3>Q2:债权转让有什么要求？</h3>
                <p>A:在未收款时，只有在所投资的标满之后才能进行债券转让；在已收到几期还款时，债权转让时间限定为最近一期还款日之前，如若无人承接，会自动撤销转让。</p>
                <h3>Q3:借款审核都需要审核什么?</h3>
                <p>A:我们需要审核您的基本信息、工作收入、还款能力、个人信用、资产状况等。</p>
                <h3>Q4:如何绑定银行卡？</h3>
                <p>A:登录个人中心后，在"充值提现"-"会员提现"-"银行卡信息"点击添加银行卡，根据提示信息填写信息点击确认即可完成。所绑定的银行卡的持有人姓名应与账户实名认证姓名相同。</p>
                <h3>Q5:一个账户可以绑定几张银行卡?</h3>
                <p>A:我们平台没有限制，您可以添加多张银行卡。</p>
                <h3>Q6:如何变更绑定的银行卡？</h3>
                <p>A:登录个人中心后，在"充值提现"-"会员提现"-"银行卡信息"点击删除已有的银行卡信息，添加新的银行卡，填写新的银行卡信息点击确认即可完成。</p>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="yindao_con">
    <div class="yindao_bz1"> <img src="/tpl/simplebootx/Public/images/bz7.jpg"> </div>
    <h1 style="font-size:44px;margin-bottom:30px;text-align:center">煜商金融投资理财流程</h1>
    <div class="liucheng_img"> <img src="/tpl/simplebootx/Public/images/bz8.jpg"> </div>
    <div class="touzi_btn"> <a href="<?php echo U('User/register/index');?>">马上注册</a>
      <p>1分钟成为煜商金融会员，轻松开始理财！</p>
    </div>
  </div>
</div>
<script>
<!--
/*更换显示样式*/
function setTab(m,n){
var tli=document.getElementById("menu"+m).getElementsByTagName("li");
var mli=document.getElementById("main"+m).getElementsByTagName("ul");
for(i=0;i<tli.length;i++){
tli[i].className=i==n?"hover":"";
mli[i].style.display=i==n?"block":"none";
}
}
//-->
</script>
﻿
	<!--<style>
    /*新增样底部式*/
	.ui-footer {
padding-top: 15px;
padding-bottom: 5px;
font-size: 12px;
clear:both;
}
.ui-header, .ui-footer {
background-color: #4E4E4E;
color: #c7c7c7;
}
.ui-footer .layout {
padding-bottom: 5px;
border-bottom: 1px solid #6a6a6a;
}
.layout {
white-space: nowrap;
letter-spacing: -4px;
}
.w-content {
width: 960px;
min-width: 960px;
margin: 0 auto;
}
.layout {
padding-bottom: 5px;
border-bottom: 1px solid #6a6a6a;
}
.layout .element {
display: inline-block;
white-space: normal;
letter-spacing: normal;
vertical-align: top;
}
.abouts {
margin-bottom: 15px;
width: 190px;
border-right: 1px dotted #6a6a6a;
}
.links {
width: 230px;
}
.links>div {
font-size: 16px;
padding: 0px 0;
margin-left: 40px;
margin-bottom: 12px;
}
.layout .element {
display: inline-block;
white-space: normal;
letter-spacing: normal;
vertical-align: top;
}
.rightbottom {
text-align: right;
font-size: 12px;
width: 39%;
padding-bottom: 15px;
}
.rightbottom p {
margin-top: -2px;
}
.service-num-bg {
background: url("/tpl/simplebootx/Public/images/phone-icon.png") no-repeat scroll 33% center;
font-size: 32px;
font-style: italic;
height: 45px;
line-height: 45px;
font-weight:bolder;
}
.services a {
display: inline-block;
padding: 0;
vertical-align: middle;
}
.safe-tag, .copyright {
text-align: center;
}
.copyright {
padding-top: 8px;
margin-bottom:20px;
}

.ui-footer a {
font-size: 12px;
color: #c7c7c7;
padding-left: 8px;
padding-right: 8px;
display: inline-block;
}
.abouts a {
padding-right: 30px;
padding-top: 8px;
}
.links a {
text-align: left;
width: 68px;
margin-left: 30px;
padding: 8px 0 0 0;
}
.wb {
background: url("/tpl/simplebootx/Public/images/icon-wb.png") no-repeat scroll 0 0; width:50px; height:49px;
}
.wx {
position: relative;
background: url("/tpl/simplebootx/Public/images/icon-wx.png") no-repeat scroll 0 0; width:50px; height:49px;
}
.erweima {
position: absolute;
display: none;
width: 302px;
left: -130px;
top: -165px;
background: #fff;
border: 1px solid #e6e6e6;
z-index: 9999;
}
.weixin_desc {
color: #666;
border-right: 1px #dcdcdc solid;
}
.weixin_descimg {
width: 150px;
height: 150px;
}
.erweima .zbd-name {
margin-top: -8px;
}
.rightbottom p {
margin-top: -2px;
}
.zbd-name {
font-size: 12px;
text-align: center;
margin-top: -8px;
line-height: 22px;
}
.qq0{
background: url("/tpl/simplebootx/Public/images/icon-qq.png") no-repeat scroll 0 0;
}
.txwb {
background: url("/tpl/simplebootx/Public/images/icon-txwb.png") no-repeat scroll 0 0; width:50px; height:49px;
}
.services {
margin-top: 12px;
}
.bottom-app {
margin-left: 30px;
}
/*新增底部样式结束*/
    </style>-->
	<div class="ui-footerc" style="background-color:#333;">
    <div class="w-content">
        <div class="layout ">
            <div class="abouts element" style="191px;">
                <img src="/tpl/simplebootx/Public/images/index03.png" alt="煜商金融logo" style="max-width:150px; border:none;">
            	<a href='/index.php/portal/list/index/id/6'rel="nofollow">关于我们</a>
            	<a href="/index.php/portal/article/index/id/10" rel="nofollow">条款</a>
            	<a href="/index.php/portal/article/index/id/9" rel="nofollow">联系我们</a>
            	<a href="/index.php/portal/article/index/id/3" rel="nofollow">公司简介</a>
            	<a href="/index.php/portal/article/index/id/76" rel="nofollow">借款协议</a>
            	<a href="/index.php/portal/article/index/id/65" rel="nofollow">法律保障</a>
            	<a href="/index.php/portal/article/index/id/64">资金管理</a>
            	<a href="/index.php/portal/article/index/id/63">风控审查</a>
            </div>
             <div class="element links" style="margin-top:18px;">
            	<div style="color:#FFF;">友情链接</div>
            	<a target="_blank" href="http://www.ysjr8.com//">P2P理财</a>
            	<a target="_blank" href="http://www.hexun.com">和讯网</a>
            	<a target="_blank" href="http://www.wangdaizhijia.com">网贷之家</a>
            	<a target="_blank" href="http://www.p2peye.com">网贷天眼</a>
            	<a target="_blank" href="http://www.touzhijia.cn">投之家</a>
            	<a target="_blank" href="http://www.zongls.cn/">棕榈树</a>
            	<a target="_blank" href="http://www.ysjr8.com//">煜商金融</a>
            	<a target="_blank" href="http://www.wangdaiguancha.com">网贷观察网 </a>
            </div>
			<div class="element rightbottom" style="margin-top:15px;">
				<p style="margin-bottom:-5px; color:#FFF;">客服热线</p>
				<p class="service-num-bg">0371-63225933</p>
				<p style="color:#FFF;"><em>服务时间：</em>周一至周五 9:00-21:00</p>
				<p style="color:#FFF;">周六、周日 9:00-18:00</p>
				<div class="services">
					<a class="wbc" rel="nofollow" target="_blank" href=""></a>
					<a class="wx" rel="nofollow" href="javascript:void(0)">
						<div class="erweima">
                        	
                            
                            <div class="row-fluid">
                                <div class="weixin_desc pull-left">
                                    <div class="weixin_descimg"><img src="/public/v2/images/erweima1.jpg"></div>
                                    <p class="zbd-name" >煜商金融订阅号</p>
                                    
                                </div>
                                <div class="weixin_desc pull-left weixin_last">
                                    <div class="weixin_descimg"><img src="/public/v2/images/erweimakefu2.jpg"></div>
                                    <p class="zbd-name">煜商金融客服</p>
                                    
                                </div>
                                
                            </div>
                           
						</div>
					</a>
					<a class="qq0" style="width:50px; height:49px;" rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3238496694&site=qq&menu=yes"></a>
					<a class="txwb" style="width:47px;" rel="nofollow" target="_blank" href=""></a>
				</div>
			</div>
			<div class="element bottom-app" style="margin-top:15px;">
				<img src="/tpl/simplebootx/Public/images/er.png" style="width:120px; height:auto;" alt="煜商金融二维码">
				<p style=" text-align:center; color:#CCC;">扫二维码可进入网站</p>
			</div>
		</div>

		<div class="safe-tag">
             	<p class="er" style="text-align:center; margin-top:10px; color:#CCC;">© 电话：0371-63225933 周一至周六 9:00-18:00  </p>
        </div>
		<p class="copyright" style="color:#CCC;">豫ICP备15013555号版权归煜商金融所有</p>
    </div> 
</div>
        <div id="gotop" style="display: block;"></div>
        <script type="text/javascript" defer="defer">
	resetWindowBox();
</script>

</body>
</html>