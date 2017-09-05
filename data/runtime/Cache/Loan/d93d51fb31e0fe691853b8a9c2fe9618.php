<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--页面布局样式调整-->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="Generator" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
<link rel="icon" href="favicon.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="/image/x-icon" />
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>" />
<link rel="stylesheet" type="text/css" href="/ysjr8/tpl/simplebootx/Public/css/style.css" />
<link rel="stylesheet" type="text/css" href="/ysjr8/tpl/simplebootx/Public/css/weebox.css" />
<link rel="stylesheet" type="text/css" href="/ysjr8/tpl/simplebootx/Public/css/main.css" />


<!--2015.08.14banner轮播js end-->
<style>

.sddmlia a:hover{background: #49A3FF}

.sddmdiv{ position: absolute;top:55px;visibility: hidden;z-index:9999; width:100px;}
.sddmdiva{position: relative; background:#E47F2B; display: block;color:#333;font: 12px arial; height:30px;line-height:30px;width: 96px;text-align: center;}
.sddmdiv a:hover{background:#C15F0E;}
</style>

<!--2015.08.14新增样式-->
<style>
.main_image {width:100%;height:380px;margin:0 auto;position:relative; z-index:1;}
.main_image ul {width:9999px;height:380px;overflow:hidden;position:absolute;top:0;left:0}
.main_image li {float:left;width:100%;height:380px;}
.main_image li span {display:block;width:100%;height:380px}
.main_image li a {display:block;width:100%;height:380px}
.main_image li .img_1 {
	background: url(/ysjr8/tpl/simplebootx/Public/images/banner1.png) center top no-repeat
}
.main_image li .img_2 {
	background: url(/ysjr8/tpl/simplebootx/Public/images/banner2.png)  center top no-repeat
}
.main_image li .img_3 {
	background: url(/ysjr8/tpl/simplebootx/Public/images/banner3.png) center top no-repeat
}
div.flicking_con {width:1100px;margin:0 auto;position:relative}
div.flicking_con .flicking_inner {position:absolute;top:350px;left:45%;z-index:999;width:300px;height:21px} /* 121126 */
div.flicking_con a {float:left;width:50px;height:4px;margin-right:8px;padding:0;background-color:#fff;border-radius:50px;display:block;
	text-indent:-1000px}
div.flicking_con a.on {background-color:#1dbbd4;border-radius:50px;}
#btn_prev, #btn_next {z-index:11111;position:absolute;display:block;width:41px!important;height:80px!important;
	top:50%;margin-top:-37px;display:none;opacity: 0.5;}
#btn_prev:hover {opacity: 0.9;}
#btn_next:hover {opacity: 0.9;}
#btn_prev {background:url(/ysjr8/tpl/simplebootx/Public/images/hover_left.png) no-repeat left top;left:200px;z-index: -10;}
#btn_next {background:url(/ysjr8/tpl/simplebootx/Public/images/hover_right.png) no-repeat right top;right:200px;z-index: -10;}
.login_xf{width:1100px;height:auto; margin:0 auto; position:relative; }
.login_con{width:318px; height:300px; position:absolute; right:0px; top:35px;z-index:999;}
.login_conbg{width:318px; height:300px;background-color:#666;filter:alpha(opacity=80);-moz-opacity:0.80; opacity:0.80;position:absolute; right:0px; top:0px;z-index:999;top:35px;}
.main_adv_img{width:100%; height:380px; display:block; z-index:99;position:absolute; top:0px; left:0px;}
.main_adv_ctl{position:relative;z-index:999;}
.login_biaoti{width:310px;height:60px;border-bottom:1px dotted #fff;line-height:60px;margin:0 auto;color:#fff;}
.login_biaoti b{font-size:20px;display:block; float:left;margin-left:10px;font-weight:normal;}
.login_biaoti small{display:block; float:right !important;font-size:12px;margin-right:10px;}
.logon-con {float: left;width: 280px;padding: 10px 0px 0px 20px;}
.logon-con .logon-ipt {position: relative;background: #fff;height: 43px;line-height: 43px;border: 1px solid #dadada;border-top-color: #c0c0c0;font-family: Verdana,Tahoma,Arial;margin-bottom:12px;
}
.logon-con .logon-ipt input {float: left;width: 225px;
height: 14px;line-height: 14px;padding: 12px 0 11px 0;
margin-top: 1px;border: 0;font-family: "微软雅黑";
color: #666;font-size: 14px;font-family: Verdana,Tahoma,Arial;
}
.logon-con .logon-ipt {position: relative;background: #fff;height: 38px;line-height: 38px;border: 1px solid #dadada;border-top-color: #c0c0c0;font-family: Verdana,Tahoma,Arial;}

.login-btn {width: 280px;height: 40px;background-color:#ff7417;line-height: 40px;color: #fff;border: 0;text-shadow: 1px 1px 0 #e77614;text-align: center;
cursor: pointer;font-family: "微软雅黑";font-size: 18px;
overflow: hidden;
}
.user{display:block;width:22px; height:22px; background:url(/ysjr8/tpl/simplebootx/Public/images/dl.jpg) no-repeat;float:left; margin:10px 0px 0px 10px;margin-right:5px;}
.key{display:block;width:22px; height:22px; background:url(/ysjr8/tpl/simplebootx/Public/images/mm.jpg) no-repeat; float:left;margin:10px 0px 0px 10px;margin-right:5px;}
.yzm{display:block;width:22px; height:22px; background:url(/ysjr8/tpl/simplebootx/Public/images/dl.jpg) no-repeat;float:left; margin:10px 0px 0px 10px;margin-right:5px;}
.tixing{color:#fff;font-size:18px;line-height:30px; text-align:center;margin-top:10px;}
</style>

<!--2015.08.14新增样式end-->

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

	// get new layerand show it
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
<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/PIE.js"></script>
<![endif]-->


</head>

<body style="overflow:scroll;overflow-x:hidden">

<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/jquery.weebox.js"></script>
<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/jquery.pngfix.js"></script>
<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/lazyload.js"></script>
<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/script.js"></script>

<script language="javascript">
$(function() {
    if (window.PIE) {
        $('.rounded').each(function() {
            PIE.attach(this);
        });
    }
});
</script>

<!--<div style="position:fixed;bottom:40px;right:40px;z-index:99999; width:110px;"><a ><img src="/ysjr8/down/images/appcode.jpg" /></a></div>-->




<div class="header" id="header" style="position:relative;z-index:2">
	<div class="constr">
		<div class="wrap clearfix" style="overflow:visible;">
			<div class="f_l">
            <img src="/ysjr8/tpl/simplebootx/Public/images/tel.png"/ style="float:left; margin-top:5px;">
				<span>客服电话:</span><span style=" font-style:italic;">0371-63225933</span>
				<!--<div class="sharemk">
					<a  href="" target="_blank" title="新浪微博"; class="share xinlan"></a>
					<a  href="" target="_blank" title="腾讯微博"; class="share tenxun"></a>
					<a  href="" target="_blank" title="微信"; class="share weixin"></a>
				</div>-->
			</div>
			<div class="f_r">
				<span id="user_head_tip" class="pr">
<!---/////------用户登了的开始-->

	<?php if(sp_is_user_login()): ?><span class="li li_no" id="J_account">
	<span class="li"><a <?php if($Think.CONTROLLER_NAME == 'Xszy'){echo 'class="current"';}?> href="<?php echo U('Loan/xszy/index');?>" >新手指引</a></span>
     <span class="li"> </span>
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
          	<li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo u('user/index/logout');?>">退出</a></li>-->
			<!-- <li class="ui-nav-dropdown-item"><a class="rrd-dimgray" href="<?php echo u('user/center/index');?>"> 个人中心 </a></li> -->
        </ul>
	</span>
	<!--<script type="text/javascript">
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
			acc_menu_hide = setTimeout(hide_menu,100);
		});

	</script>-->
	<?php else: ?>
	<span class="li"><a <?php if($Think.CONTROLLER_NAME == 'Xszy'){echo 'class="current"';}?> href="<?php echo U('Loan/xszy/index');?>" >新手指引</a></span>
     <span class="li">|</span>
	<span class="li"><a href="/ysjr8/index.php/loan/Borrow/inapply">理财计算器</a></span>
     <span class="li">|</span>
	<span class="li"><a href="<?php echo U('User/register/index');?>">注册</a></span>
    <span class="li">|</span>
	<span class="li"><a href="<?php echo U('User/Login/index');?>">登录</a></span><?php endif; ?>

<!---//////////////////////------用户登了的结束------//////////////////////------->

				

				<!--<span class="li"><a href="<?php echo U('Portal/Article/index',array('id'=>4));?>">帮助</a></span>-->
				</span>
			</div>		
		</div>
	<!--end wrap-->
		
	</div>
	<div class="main_bars"  >
		<div class="main_bar wrap">	
			<div class="logo mr15">
				<a class="link f_l" href="/ysjr8/">
                    <img src="/ysjr8/4cdd501dc023b.png" alt=""/>
				</a>
			</div>
			<ul class="main_nav">

                <li class="" rel=''>
                    <a class="current" href="/ysjr8/" >首页</a>
                </li>
                <li class="" rel=''>
                    <a href="<?php echo U('Loan/index/lists');?>"  onmouseover="mopen('m1')" onmouseout="mclosetime();">我要投资</a><img src="/ysjr8/tpl/simplebootx/Public/images/jt1.png"/ style="padding-top:30px;padding-left:4px; float:right;" />				
                    <p class="sddmdiv" id="m1"  onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                       <a style="color:#ffffff; font-size:15px;"  href="<?php echo U('Loan/index/lists');?>" class="sddmdiva" >投资列表</a>
                       <a style="color:#ffffff;  font-size:15px;" href="<?php echo U('Loan/index/transfer');?>" class="sddmdiva">债权转让</a>
                        
                    </p>
                    	
                </li>
              <li class="" rel=''>
                	 <a href="<?php echo U('Loan/borrow/index');?>" onmouseover="mopen('m3')" onmouseout="mclosetime();" >我要融资</a><!-- <img src="/ysjr8/tpl/simplebootx/Public/images/jt1.png"/ style="padding-top:30px;padding-left:4px; float:right;" />
                     <p class="sddmdiv" id="m3"  onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> 
                       <a style="color:#ffffff; font-size:15px;"  href="<?php echo U('Loan/index/lists');?>" class="sddmdiva" >投资列表</a>
                       <a style="color:#ffffff;  font-size:15px;" href="<?php echo U('Loan/index/transfer');?>" class="sddmdiva">债权转让</a>
                    </p> -->           
                  </li>
                  

                 <li class="" rel=''>
                        <a href="<?php echo U('Loan/jm/index');?>">加入我们</a>
                    </li> 
                    
                <li class="" rel=''>
                        <a href="<?php echo U('portal/list/index');?>">资讯中心</a>
                 </li>
                  <li class="" rel=''>
                        <a href="<?php echo U('User/center/index');?>"  onmouseover="mopen('m2')" onmouseout="mclosetime();"  ><!--<img src="/ysjr8/tpl/simplebootx/Public/images/tx.png"/ style="padding-top:15px; padding-right:10px; float:left;" >-->个人中心</a>
                           <p style="z-index:100; font-size:15px;" class="sddmdiv" id="m2"  onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                     <!--  <a style="color:#ffffff; font-size:15px; width:125px; " href="<?php echo U('User/center/index');?>" class="sddmdiva">账户首页</a>-->
                       <!--<a style="color:#ffffff; font-size:15px; width:125px;" href="<?php echo U('user/Audit/index');?>" class="sddmdiva">认证中心</a>-->
                         <!--<a style="color:#ffffff; font-size:15px; width:125px;" href="<?php echo U('User/Invest/index');?>" class="sddmdiva">我的投资</a>
                       <a style="color:#ffffff; font-size:15px; width:125px;" href="<?php echo U('User/Deal/borrow_stat');?>" class="sddmdiva">贷款统计</a>-->
                    </p>
                 </li>
			</ul>
			<div><img style="padding-left: 25px; margin-top: 4px;" src="/ysjr8/tpl/simplebootx/Public/images/cccc.png"/></div>
		</div>
	</div>
	
</div>
<!---//////////////////////------首页广告位-------->
<!--<?php $home_slides=sp_getslide("index"); $home_slides=empty($home_slides)?$default_home_slides:$home_slides; ?> -->
<link href="/ysjr8/tpl/simplebootx/Public/css/qqkfcss.css" type="text/css" rel="stylesheet" />
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


<div  class="float-contact" id="float-contact" style=" position: fixed;z-index:1000; right: 1px; display: none;">
		<a title="点击收缩" href="javascript:void(0);" onclick="show()" class="close" id="float-contact-close"></a>
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
    <div class="float-contact-mini" id="float-contact-mini" style="z-index:20; display: block; position: fixed; right: 1px;">
    <a href="javascript:void(0);" onclick="show()" id="float-contact-mini" style="z-index:200;" ></a>
    
</div>
<!--2015.08.14banner轮播js-->

<script src="/ysjr8/tpl/simplebootx/Public/js/jquery.event1.js"></script>
<script src="/ysjr8/tpl/simplebootx/Public/js/jquery.touchSlider.js"></script>
<script>
$(document).ready(function () {
	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
		},function(){
		$("#btn_prev,#btn_next").fadeOut()
		})
	$dragBln = false;
	$(".main_image").touchSlider({
		flexible : true,
		speed : 300,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e) {
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	})
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	})
	$(".main_image a").click(function() {
		if($dragBln) {
			return false;
		}
	})
	timer = setInterval(function() { $("#btn_next").click();}, 6000);
	$(".main_visual").hover(function() {
		clearInterval(timer);
	}, function() {
		timer = setInterval(function() { $("#btn_next").click();},6000);
	})
	$(".main_image").bind("touchstart", function() {
		clearInterval(timer);
	}).bind("touchend", function() {
		timer = setInterval(function() { $("#btn_next").click();},6000);
	})
});
</script>
<script src="/ysjr8/tpl/simplebootx/Public/js/placeholder.js"></script>
<!---//////////////////////------2015.08.14首页广告位-------->
<div class="main_visual">
     <!--登陆悬浮框-->
	 <?php if(($_SESSION['user'] == null)): ?><div class="login_xf" style="z-index:9;height:auto; ">
      <div class="login_conbg"></div>
      <div class="login_con">
         <div class="login_biaoti">
         	<b>用户登陆</b>
         	<small><a style="color:#CCCCCC;" href="<?php echo U('User/Register/index');?>">立即注册</a></small>
         	<small>|</small>
         	<small><a style="color:#CCCCCC;" href="<?php echo U('User/Resetting/index');?>">忘记密码</a></small>
         	<div style="clear:both"></div>
         </div> 
         <ul class="logon-con">	
         	<form id="form1" name="form1" method="post" action="<?php echo U('User/Login/dologin');?>">
			<li id="username1" class="logon-ipt z-index10">
				<em class="user"></em>
				
				<input type="text" id="username" name="username"  class="holder" placeholder="请输入用户名">
				<div style="clear:both;"></div>
			</li>
			<li id="pwd" class="logon-ipt mgt20">
				<em class="key"></em>
				<input type="password" id="password" name="password"  class="holder"  placeholder="密码">
				<div style="clear:both;"></div>
			</li> 
            <li id="pwd" class="logon-ipt mgt20" style=" position:relative;">
            
				<em class="yzm"></em>
				
				<input type="text" id="verify" name="verify" style="width:130px; border-right:#CCC 1px solid;"  class="holder"  placeholder="验证码">
                
                <span style=" position:absolute; right:0px; top:3px;"><?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?></span>
				<div style="clear:both;"></div>
                
			</li>        	 
			<li>
				<input class="login-btn" tabindex="4" name="submit" accesskey="l" value="登录" type="submit">
                
			</li>
			<!--<li><div class="tixing">理财有风险，投资需谨慎!</div></li>	-->
            </from>
		</ul>
      </div>
    </div>
	<?php else: endif; ?>
    <!--登陆悬浮框 end-->
     <div class="flicking_con" style="z-index:3;">
            <div class="flicking_inner">
            <a href="javascript:">1</a>
            <a href="javascript:">2</a>
            <a href="javascript:">3</a>
         </div>
    </div>
    <div class="main_image">
        <ul>	
            <li><span class="img_1"></span></li>
            <li><span class="img_2"></span></li>
            <li><span class="img_3"></span></li>
        </ul>
        <a href="javascript:;" id="btn_prev"></a>
        <a href="javascript:;" id="btn_next"></a>
    </div>
 </div>
<!---//////////////////////------2015.08.14首页广告位结束-------->

<div class="wrap">





<style>
	.f_yj{ behavior:url(iecss3.htc); }

</style>
<!--[if lte IE 8]><script src="http://cdn.bootcss.com/selectivizr/1.0.2/selectivizr.js"></script><![endif]-->

<script type="text/javascript" src="/ysjr8/tpl/simplebootx/Public/js/jscharts_cr.js"></script>
<link rel="stylesheet" type="text/css" href="/ysjr8/tpl/simplebootx/Public/css/index.css" />
<style>
    .i_deal_list table td {
        text-align:center;
    }
	
	.news{height:222px;; width:1164px;   border-top: 2px solid #E47F2B; padding-bottom: 18px;/*border-left:2px dotted #CCC ; border-right: 2px dotted #CCC ;*/
	}
	
	.hz_xwzdiv{float:left; width:505px;height:192px;  padding:20px; color:#333; }
	.hz_xwzdivr{float:right; width:565px;height:192px; padding:20px; border-left:1px solid #dadada;color:#333; padding-left:27px;}
	.newstitlex{position:relative; top:-10px; font-weight:bold; color:#999; font-family:"宋体";}
	.newsconx{font-size:12px; color:#777; height:30px;}
	/*a:hover{ color:#00C;}*/
	.newstimex{float:right; color:#F66; width:120px; height:25px;}
	
</style>
<style>
.right-solid{width:100%;overflow: hidden; background: none; margin:0; padding:0; }
#colee_left{ overflow: hidden;width:1124px;}
#colee_left td{ text-align:center; width:196px;}
#colee_left img{ margin:6px; width:180px; height:53px;border: 1px solid #cacaca;}
#colee_left a{ font-size:16px; color:#ff6e02;}
#colee_left a:hover{ color:#590c0e;}
</style>

<style>
.jinrong_xc{width:1164px; height:400px; background-color:#FFF;  overflow:hidden;margin:0 auto;margin-bottom:15px;}
.jinrong_NewHand{width:1164px; height:355px;margin-bottom: 10px;}
.jinrong_NewHand_d1{width:210px; height:364px;float:left;position: relative;top:-9px;background:url(/ysjr8/tpl/simplebootx/public/images/add_index.png);background-repeat: no-repeat;}
.jinrong_NewHand_d1 span{position: relative;top: 130px;left: 52px;}
.jinrong_NewHand_d2{width:660px; height:353px;float:left;border-top:1px solid #E9E9E9;border-bottom:1px solid #E9E9E9;border-left: 1px solid #E9E9E9;overflow: hidden;position: relative;left: -6px;}
.jinrong_NewHand_d2 .lists{width:100%; height:50%;border-bottom: 1px solid #e9e9e9;margin-left: 4px;}
.jinrong_NewHand_d2 .lists .top{margin: 0px 26px;height:50px;}
.jinrong_NewHand_d2 .lists .top span{line-height:50px;color: #3688BD;font-family: 微软雅黑;font-size: 18px;font-weight: bold;}
.jinrong_NewHand_d2 .lists .below{margin: 0px 26px;height:110px;}
.jinrong_NewHand_d2 .lists .left{width:75%;float: left;}
.jinrong_NewHand_d2 .lists .left td{font-family: 微软雅黑;font-size: 16px;width: 158px;color:#9e9e9e;}
.jinrong_NewHand_d2 .lists .left th{text-align: left;font-size: 22px;padding-top: 10px;height: 35px;}
.jinrong_NewHand_d2 .lists .left span{font-size:14px;position:relative;top:11px;}
.jinrong_NewHand_plank{width: 480px;height: 38px;}
.jinrong_NewHand_plan{margin-top: 20px;background: #E3E4E8;width: 420px;margin-left: 4px;border-radius: 5px;height: 10px;float: left;}
.jinrong_NewHand_planse{background: #E37E2C;float: left;border-radius: 5px;height: 10px;}
.jinrong_NewHand_d2 .lists .right{width: 100px;float:right;background: #E47F2B none repeat scroll 0% 0%;text-align: center;height: 36px;line-height: 36px;position: relative;top: 66px;right: 18px;}
.jinrong_NewHand_d2 .lists .right a{color: #FFF;}
.jinrong_NewHand_d3{width:282px; height:352px;float:right;border: 1px solid #E9E9E9;}
.jinrong_NewHand_d3 div{margin-top: 10px;text-align: center;}
.jinrong_NewHand_d3 .top{height:48px;}
.jinrong_NewHand_d3 .centre{height: 164px;background: #F2F7FB;width: 262px;}
.jinrong_NewHand_d3 .centre .centre-top{height:20px;background:url(/ysjr8/tpl/simplebootx/public/images/pt.png);background-repeat: no-repeat;width: 262px;}
.jinrong_NewHand_d3 .centre .centre-top span{float: right; color:#858797;}
.jinrong_NewHand_d3 .centre .centre-top span a{color:#858797;}
.jinrong_NewHand_d3 .centre li{text-align: left;font-size:15px;font-weight:600;margin:4px;font-family:微软雅黑，宋体;}
.jinrong_NewHand_d3 .centre li span{color:#FE6600;font-size:24px;font-weight:600;}
.jinrong_NewHand_d3 .below{height:101px;}
.jinrong_xc_top{width:100%; height:110px; border-top:2px solid #17bf98; line-height:110px; border-bottom:1px dotted #e3e3e3;}
.jinrong_xc_top b{display:block; float:left;font-size:40px; font-weight:bold; color:#17bf98;margin-right:30px;margin-left:30px;}
.jinrong_xc_top span{ display:block; float:left;color:#888888;font-size:15px;}
.jinrong_xc_top span small{color:#f7391a;font-size:18px;}
.jinrong_xc_con{ height:155px;}
.xc_con_list li{width:265px;height:155px; float:left;margin:0px 13px;}
.xc_con_img{width:105px;height:105px;margin-top:18px;}
.xc_con_info{width:265px;margin-top:18px; float:left;}
.xc_con_info h2{font-weight:normal;margin-bottom:5px;font-size:18px;color:#000;text-align: center;}
.xc_con_info p{color:#666;margin: 12px 6px;font-family: "宋体";font-size: 14px;}
.licai_btn{width:320px; height:130px; float:left;}
.licai-btnn{width:240px; height:45px; background-color:#fd715a; border-bottom:3px solid #ea563d;cursor:pointer;font-size:18px; color:#fff; font-family:"微软雅黑";margin-top:30px; margin-left:40px;}
</style>

<div class="blank20"></div>
<div class="info">
		<div class="row-fluid-h w-content">
			<div class="pull-left intro">
				<h3 style="font-family:微软雅黑；; font-weight:bolder; font-size:24px;"><span style="color:#000;">一分钟了解</span><span style="color:#FF0000
; margin-left:10px;">煜商金融</span></h3>
				<p> 煜商金融由深圳九略资产管理有限公司、河南煜森实业有限公司...<a href="/ysjr8/index.php/portal/article/index/id/3/tid/6" class="more">《了解更多》</a></p>
			</div>
			<div class="pull-right stat-sum ">
				<ul class="pull-left" id="count-data">				
					 <li class="row-fluid">
						<dl>
						   <dt id="total_ivs" style="font-family:微软雅黑；; font-weight:bolder; color:#F00;"><span style=" font-size:24px; margin-right:7px;">420.64</span>万元</span></dt>
						   <dd>累计投资金额（元）</dd>
						</dl>
						<dl>
						   <dt id="total_sy" style="color:#F00; font-weight:bolder"> <span style=" font-size:24px; margin-right:7px; color:#F00; font-family:微软雅黑；; font-weight:bolder; ">28.19</span>万元</dt>
						   <dd>累计创造收益（元）</dd>
						</dl>
					 	<dl>
						   <dt id="total_pay" style="font-family:微软雅黑；; font-weight:bolder; color:#F00;"><span style=" font-size:24px; margin-right:7px;">90.38</span>万元</span></dt>
						   <dd>累计还款金额</dd>
						</dl>
						<dl class="" style="margin-left:40px;">
						   <dt id="total_fx" style="font-weight: bolder;font-size:24px; font-family:微软雅黑; color:#F00
                           ">1000.00<span style="font-size:14px;">万元</span></dt>
						   <dd>本息保证金（元）</dd>
						</dl>
						
					</li>  
				</ul>
				
			</div>
		</div>
	</div>
    
    <div class="bottom"></div>
    <!--<div class="row-fluid-h notice">
    <div class="tuu" style="font-weight:bolder;">
    <p>最新公告:</p>
    </div>
    <div  style="float:left; height:50px; line-height:50px;">
<marquee direction="up" behavior="scroll" scrollamount="0.8" scrolldelay="0" loop="-1" width="900" height="30" hspace="1" vspace="10" style="line-height:35px; margin-top:15px; float:left;margin-left:15px;">
<ul id="wimoban_nav">
    <li><a href="/ysjr8/index.php/portal/Article/index/id/97">煜商金融中秋送礼活动</a> <span style="float:right;">2015-11-10</span></li>
    <li><a href="/ysjr8/index.php/portal/Article/index/id/94">2015年煜商金融中秋节放假通知 </a><span style="float:right;">2015-11-10</span></li>
    <li><a  href="/ysjr8/index.php/portal/Article/index/id/83">2015年抗战胜利70周年纪念日放假通知</a> <span style="float:right;">2015-11-10</span></li>
    <li><a  href="/ysjr8/index.php/portal/Article/index/id/73">金融新财富沙龙探讨P2P趋向</a> <span style="float:right;">2015-11-10</span></li>
    <li><a  href="/ysjr8/index.php/portal/Article/index/id/67">2015年端午节放假通知</a> <span style="float:right;">2015-11-10</span></li>
</ul>
</marquee>
<div class="pull-right" style=" margin-top:15px; margin-left:70px; border:2px solid #E47F2B; height:30px; line-height:30px;
border-radius: 10px;">
			<a href="/ysjr8/index.php/portal/list/index/id/11" style="padding-left:10px;">更多公告</a>
		</div>
</div>
       
		
	</div>-->
<div class="jinrong_xc" style="font-family:'微软雅黑'; height:270px;" >
	<!--<div class="jinrong_xc_top" >
	  <b>煜商金融</b>
	  
	  <span>稳定收益类理财，百元起投，收益灵活，安全可靠，收益稳健，最高年化收益率<small>18%</small>，安全无忧，稳赚不赔！</span>
	  <div style="clear:both"></div>
	</div>-->
    
    
	<div class="jinrong_xc_con">
		<ul class="xc_con_list">
			<li>
				<div class="xc_con_img" >
					<img src="/ysjr8/tpl/simplebootx/Public/images/xuanchuan.jpg">
				</div>
				<div class="xc_con_info">
					<h2>随时赎回投资</h2>
				    <p>突然急用钱想收回投资？随时赎回投资，收益拿的爽，流动性更给力。</p>
				</div>
				<div style="clear:both"></div>
			</li>
			<li>
				<div class="xc_con_img">
					<img src="/ysjr8/tpl/simplebootx/Public/images/xuanchuan1.jpg">
				</div>
				<div class="xc_con_info">
					<h2>先行垫付</h2>
				    <p>若贷方出现逾期情况，平台便立即启动“先行垫付”程序，及对投资人本金和利息进行先行垫付。</p>
				</div>
				<div style="clear:both"></div>
			</li>
			<li>
				<div class="xc_con_img">
					<img src="/ysjr8/tpl/simplebootx/Public/images/xuanchuan2.jpg">
				</div>
				<div class="xc_con_info">
					<h2>全面风控</h2>
				    <p>风控团队由数位来自国有银行的资深信贷从业人士构成，对借款项目进行严格的审核，严谨的执行。</p>
				</div>
				<div style="clear:both"></div>
			</li>
			<li>
				<div class="xc_con_img">
					<img src="/ysjr8/tpl/simplebootx/Public/images/xuanchuan3.jpg">
				</div>
				<div class="xc_con_info">
					<h2>低门槛&nbsp;&nbsp;高收益</h2>
				    <p>最低100元可以投资，年化收益14%-18%：无论是资金，还是收益金煜商金融总能让你有钱。</p>
				</div>
				<div style="clear:both"></div>
			</li>
			
			<div style="clear:both"></div>
		</ul>
	</div>
</div>
<div class="jinrong_NewHand">
	<div class="jinrong_NewHand_d1"></div>
	<?php if(!empty($Newbie_lists)){?>
	<div class="jinrong_NewHand_d2">
		<?php if(is_array($Newbie_lists)): foreach($Newbie_lists as $key=>$vo): ?><div class="lists">
			<div class="top">
				<span>新用户专享</span>
				<span style="font-size: 14px; border: 1px solid #FCB765; color: #FCB765; padding: 2px 12px; margin-left: 80px;border-radius:3px;"><?php echo ($vo["min_loan_money"]); ?>元起投限投<?php echo ($vo["max_loan_money"]); ?>元</span>
				<span style="font-family:微软雅黑;font-size: 13px; font-weight: inherit; color: #6E6E6E; float: right;">已参与人数: <?php echo ($vo["buy_count"]); ?>人</span>
			</div>
			<div class="below">
				<div class="left">
					<table>
						<tr>
							<td>年化收益</td>
							<td>项目期限</td>
							<td>借款金额</td>
						</tr>
						<tr>
							<th  style="color: #FF8900; font-size: 34px;"><?php echo ($vo["rate"]); ?>%</th>
							<th><?php echo ($vo["deadline"]); ?>天</th>
							<th><?php echo $vo[borrow_amount]/10000;?>万元</th>
							<?php $i=$vo[load_money]/$vo[borrow_amount]*100?>
						</tr>
					</table>
					<div class="jinrong_NewHand_plank">
						<div class="jinrong_NewHand_plan">
							<div class="jinrong_NewHand_planse" style="width:<?php echo ($i); ?>%;"></div>
						</div>
						<span>&nbsp;<?php echo ($i); ?>%</span>
					</div>
				</div>
				<div class="right"><a href="<?php echo ($vo["url"]); ?>">立即抢购</a></div>
			</div>
		</div><?php endforeach; endif; ?>
	</div>
	<?php }else{?>
		<div class="jinrong_NewHand_d2">
			<h1>暂时没有发布的新手标..</h1>
		</div>
	<?php }?>
	<div class="jinrong_NewHand_d3">
		<div class="top"><img src="/ysjr8/tpl/simplebootx/public/images/add_index_right1.png"/></div>
		<div class="centre">
			<div style="height: 1px;"></div>
			<div class="centre-top">
				<span><a href="">更多数据 >&nbsp;</a></span>
			</div>
			<ul>
				<li>已投资人数:</li>
				<li><span><?php echo ($Newbie["buy_count"]); ?></span></li>
				<li>总成交量:</li>
				<li><span><?php echo ($Newbie["total_volume"]); ?></span>元</li>
			</ul>
		</div>
		<div class="below"><img src="/ysjr8/tpl/simplebootx/public/images/add_index_right.png"/></div>
	</div>
</div>
<div class="index_left f_l" style="margin-left:20px;">
	<div class="list_title clearfix">
		<div class="list_tt list1 cur">投资列表</div>
		<div class="list_tt list2">债权转让</div>
        <div class="list_tt list3">还款中</div>
        <div class="list_tt list4">已完成</div>
        <!--<a href="/ysjr8/index.php/loan/Borrow/inapply" style='background:url("/ysjr8/tpl/simplebootx/Public/images/deals_icon1.png") no-repeat; color:#25ae90 display:block; font-size:14px; font-family:"Microsoft YaHei"; float:right; height:40px; line-height:40px; margin:4px 10px 0 0; padding-left:50px; text-align:center; text-decoration:none;' }>理财计算器</a>-->
	</div>
	
    <div class="list_cont panes">
		<div class="i_deal_list clearfix" style="display:block;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr  border="0" style="height:34px; font-size: 16px;">
						<th style="width: 14%; text-align: left; padding-left: 25px;">名 称</th>
						<th style="width:15%">额 度</th>
						<th style="width:10%">等 级</th>
						<th style="width:10%">利 率<span style="font-size:12px;">/年</span></th>
                        <th style="width:10%">进 度</th>
						<th style="width:10%">期 限</th>						
						<th style="width:15%">状 态</th>
					</tr>
                    <?php if(is_array($deal_list)): $key = 0; $__LIST__ = $deal_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): $mod = ($key % 2 );++$key;?><tr class="item <?php if(($mod) == "1"): ?>item_1<?php endif; ?>" >
                        <td style="text-align: left;" class="tl pl10">
                            &nbsp;&nbsp;<img src="/ysjr8/tpl/simplebootx/Public/images/<?php if(($$deal["warrant"]) == "0"): ?>dan0.png<?php else: ?>dan1.png<?php endif; ?>" width="18" height="18"  class="ico" />
                            <a href="<?php echo ($deal["url"]); ?>"><?php echo ($deal["name"]); ?></a>
                        </td>
                        <td>
                            <span ><?php echo ($deal["borrow_amount_format"]); ?></span>
                        </td>
                        <td>
                            <img src="<?php echo ($deal["level_img"]); ?>" align="absmiddle" title="<?php echo ($deal["user"]["point_level"]); ?>" alt="<?php echo ($deal["user"]["point_level"]); ?>" height="40" />
                        </td>
                        <td>
                            <span><?php echo ($deal["rate"]); ?> %</span>
                        </td>
                        <td>
                            <div class="graph-box">
                                <p>
                                    <?php if(($deal["deal_status"] == 9) or ($deal["deal_status"] == 5)): ?>100%
                                        <?php else: ?>
                                        <?php echo (round($deal["progress_point"])); ?>%<?php endif; ?>
                                </p>
                                <div id="graph-<?php echo ($deal["id"]); ?>"></div>
                            </div>
                            <script type="text/javascript">
                                <?php if($deal["deal_status"] == 9): ?><!--//已还清-->
                                    var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array(['OK', 100], ['NO', 0]);
                                <?php elseif($deal["deal_status"] == 7): ?>
                                        <!--//还款中-->
                                var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array([' ', <?php echo (round($deal["progress_point"],"2")); ?>], ['', <?php echo 100-round($deal['progress_point'],2) ?>]);
                                <?php else: ?>
                                <!--//筹款中-->
                                var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array([' ', <?php echo (round($deal["progress_point"],"2")); ?>], [' ', <?php echo 100-round($deal['progress_point'],2) ?>]);<?php endif; ?>
                                var myChart = new JSChart('graph-<?php echo ($deal["id"]); ?>', 'pie');
                                myChart.setDataArray(myData);
                                myChart.colorizePie(colors);
                                myChart.setTitleColor('#8E8E8E');
                                myChart.setTitleFontSize(0);
                                myChart.setTextPaddingTop(280);
                                myChart.setPieValuesDecimals(1);
                                myChart.setPieUnitsFontSize(0);
                                if($.browser.msie)
                                    myChart.setPieValuesFontSize(0);
                                else
                                    myChart.setPieValuesFontSize(100000000);
                                myChart.setPieValuesColor('#fff');
                                myChart.setPieUnitsColor('#969696');
                                myChart.setSize(46, 46);
                                myChart.setPiePosition(0, 0);
                                myChart.setPieRadius(23);
                                myChart.setFlagColor('#1BB8E3');
                                myChart.setFlagRadius(4);
                                myChart.setTooltipOpacity(1);
                                myChart.setTooltipBackground('#ddf');
                                myChart.setTooltipPosition('ne');
                                myChart.setTooltipOffset(2);
                                myChart.draw();
                            </script>
                        </td>
                        <td>
                            <span><?php echo ($deal["repay_time"]); ?></span>个月
                        </td>
                        <td>
                            <a href="<?php echo ($deal["url"]); ?>">

                                <span style="behavior: url(/ysjr8/tpl/simplebootx/js/ie-css3.htc)"
                                <?php if($deal["deal_status"] == 0): ?>class="f_white" 
                                    <?php elseif($deal["deal_status"] == 1): ?>
                                    class="f_white"
                                    <?php elseif($deal["deal_status"] == 4): ?>
                                    class="f_white f_gray"
                                    <?php elseif($deal["deal_status"] == 5): ?>
                                    class="f_white f_orange"
                                    <?php elseif($deal["deal_status"] == 7): ?>
                                    class="f_white f_green"
                                    <?php elseif($deal["deal_status"] == 9): ?>
                                    class="f_white f_green"
                                    <?php else: ?>
                                    class="f_white"<?php endif; ?>
                                >
                                <?php echo (loan_state($deal["deal_status"])); ?>
                                </span>
                            </a>
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<a href="<?php echo UU('loan/index/lists');?>" title="查看更多借款列表" class="more">查看更多借款列表</a>
		</div>
		<div class="i_deal_list clearfix" style="display:none;">
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
					<tr  border="0" style="height:34px;font-size: 16px;">
				        <th>名称</th>
						<th style="width:15%">转让人/承接人</th>
						<th style="width:15%">本/息/转让金</th>
						<th style="width:10%">利率</th>
						<th style="width:15%">待还/总期数</th>
						<th style="width:10%">等级</th>
						<th style="width:20%">状态</th>
				    </tr>

                    <?php if(is_array($transfer_list)): $i = 0; $__LIST__ = $transfer_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): $mod = ($i % 2 );++$i;?><tr class="item <?php if(($mod) == "1"): ?>item_1<?php endif; ?> tc">
                        <td>
                            &nbsp;&nbsp;<img src="/ysjr8/tpl/simplebootx/Public/images/<?php if(($$deal["warrant"]) == "0"): ?>dan0.png<?php else: ?>dan1.png<?php endif; ?>" width="18" height="18" class="ico" />
                            <a href="<?php echo ($deal["url"]); ?>" target="_blank">
                                <?php echo ($deal["name"]); ?>
                            </a>
                        </td>
                        <td>
                            <div class="f_gray">
                                <?php echo ($deal["user_name"]); ?><br/><?php echo ($deal["tuser"]); ?>
                            </div>
                            <?php if(!empty($deal["tuser"])): ?><div class="f_gray">
                                    <a href="<?php echo ($deal["tuser"]["url"]); ?>" target="_blank"><?php echo ($deal["tuser_name"]); ?></a>
                                </div><?php endif; ?>
                        </td>
                        <td>
                            <div><?php echo ($deal["left_benjin_format"]); ?></div>
                            <div><?php echo ($deal["left_lixi_format"]); ?></div>
                            <div>
                                <?php echo (format_price($deal["transfer_amount"])); ?>
                            </div>
                        </td>
                        <td>
                            <div>
                                <?php echo (number_format($deal["rate"],"2")); ?>%
                            </div>

                        </td>
                        <td>
		                    <span class="f_red"><?php echo ($deal["how_much_month"]); ?>/<?php echo ($deal["repay_nper"]); ?>
                        </td>
                        <td>
                            <a href="<?php echo U('User/Audit/index');?>"><img src="<?php echo ($deal["level_img"]); ?>" width="40" align="absmiddle" alt="<?php echo ($deal["duser"]["point_level"]); ?>" title="<?php echo ($deal["duser"]["point_level"]); ?>"></a>
                        </td>
                        <td>
							<a href="<?php echo ($deal["url"]); ?>" target="_blank"><span class="f_white">还款中</span></a>
                            <!--<?php if(($$deal["t_user_id"]) > ""): ?>已转让
                                <?php else: ?>
                                <?php if(($$deal["status"]) == "0"): ?>已撤销
                                    <?php else: ?>
                                    </lt>
                                    <?php if($deal["remain_time"] < 0): ?>逾期还款
                                        <?php else: ?>
                                        <?php echo ($deal["remain_time_format"]); endif; endif; endif; ?>-->
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
				<a href="<?php echo UU('loan/index/transfer');?>" title="查看更多债权列表" class="more">查看更多债权列表</a>
			</div>
            
            <!--新增加内容1-->
            <div class="i_deal_list clearfix" style="display:none;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr  border="0" style="height:34px; font-size: 16px;">
						<th style="width: 14%; text-align: left; padding-left: 25px;">名 称</th>
						<th style="width:15%">额 度</th>
						<th style="width:10%">等 级</th>
						<th style="width:10%">利 率<span style="font-size:12px;">/年</span></th>
                        <th style="width:10%">进 度</th>
						<th style="width:10%">期 限</th>						
						<th style="width:15%">状 态</th>
					</tr>
                    <?php if(is_array($refund_list)): $key = 0; $__LIST__ = $refund_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): $mod = ($key % 2 );++$key;?><tr class="item <?php if(($mod) == "1"): ?>item_1<?php endif; ?>" >
                        <td style="text-align: left;" class="tl pl10">
                            &nbsp;&nbsp;<img src="/ysjr8/tpl/simplebootx/Public/images/<?php if(($$deal["warrant"]) == "0"): ?>dan0.png<?php else: ?>dan1.png<?php endif; ?>" width="18" height="18"  class="ico" />
                            <a href="<?php echo ($deal["url"]); ?>"><?php echo ($deal["name"]); ?></a>
                        </td>
                        <td>
                            <span><?php echo ($deal["borrow_amount_format"]); ?></span>
                        </td>
                        <td>
                            <img src="<?php echo ($deal["level_img"]); ?>" align="absmiddle" title="<?php echo ($deal["user"]["point_level"]); ?>" alt="<?php echo ($deal["user"]["point_level"]); ?>" height="40" />
                        </td>
                        <td>
                            <span><?php echo ($deal["rate"]); ?> %</span>
                        </td>
                        <td>
                            <div class="graph-box">
                                <p>
                                    <?php if(($deal["deal_status"] == 9) or ($deal["deal_status"] == 5)): ?>100%
                                        <?php else: ?>
                                        <?php echo (round($deal["progress_point"])); ?>%<?php endif; ?>
                                </p>
                                <div id="graph-<?php echo ($deal["id"]); ?>"></div>
                            </div>
                            <script type="text/javascript">
                                <?php if($deal["deal_status"] == 9): ?><!--//已还清-->
                                    var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array(['OK', 100], ['NO', 0]);
                                <?php elseif($deal["deal_status"] == 7): ?>
                                        <!--//还款中-->
                                var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array([' ', <?php echo (round($deal["progress_point"],"2")); ?>], ['', <?php echo 100-round($deal['progress_point'],2) ?>]);
                                <?php else: ?>
                                <!--//筹款中-->
                                var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array([' ', <?php echo (round($deal["progress_point"],"2")); ?>], [' ', <?php echo 100-round($deal['progress_point'],2) ?>]);<?php endif; ?>
                                var myChart = new JSChart('graph-<?php echo ($deal["id"]); ?>', 'pie');
                                myChart.setDataArray(myData);
                                myChart.colorizePie(colors);
                                myChart.setTitleColor('#8E8E8E');
                                myChart.setTitleFontSize(0);
                                myChart.setTextPaddingTop(280);
                                myChart.setPieValuesDecimals(1);
                                myChart.setPieUnitsFontSize(0);
                                if($.browser.msie)
                                    myChart.setPieValuesFontSize(0);
                                else
                                    myChart.setPieValuesFontSize(100000000);
                                myChart.setPieValuesColor('#fff');
                                myChart.setPieUnitsColor('#969696');
                                myChart.setSize(46, 46);
                                myChart.setPiePosition(0, 0);
                                myChart.setPieRadius(23);
                                myChart.setFlagColor('#1BB8E3');
                                myChart.setFlagRadius(4);
                                myChart.setTooltipOpacity(1);
                                myChart.setTooltipBackground('#ddf');
                                myChart.setTooltipPosition('ne');
                                myChart.setTooltipOffset(2);
                                myChart.draw();
                            </script>
                        </td>
                        <td>
                            <span><?php echo ($deal["repay_time"]); ?></span>个月
                        </td>
                        <td>
                            <a href="<?php echo ($deal["url"]); ?>">

                                <span
                                <?php if($deal["deal_status"] == 0): ?>class="f_white"
                                    <?php elseif($deal["deal_status"] == 1): ?>
                                    class="f_white"
                                    <?php elseif($deal["deal_status"] == 4): ?>
                                    class="f_white f_gray"
                                    <?php elseif($deal["deal_status"] == 5): ?>
                                    class="f_white f_orange"
                                    <?php elseif($deal["deal_status"] == 7): ?>
                                    class="f_white f_green"
                                    <?php elseif($deal["deal_status"] == 9): ?>
                                    class="f_white f_green"
                                    <?php else: ?>
                                    class="f_white"<?php endif; ?>
                                >
                                <?php echo (loan_state($deal["deal_status"])); ?>
                                </span>
                            </a>
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<a href="<?php echo UU('loan/index/lists');?>" title="查看更多借款列表" class="more">查看更多借款列表</a>
		</div>
            
       <!--新增加内容-->      
            
            <!--新增加内容2-->
            <div class="i_deal_list clearfix" style="display:none;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr  border="0" style="height:34px; font-size: 16px;">
						<th style="width: 14%; text-align: left; padding-left: 25px;">名 称</th>
						<th style="width:15%">额 度</th>
						<th style="width:10%">等 级</th>
						<th style="width:10%">利 率<span style="font-size:12px;">/年</span></th>
                        <th style="width:10%">进 度</th>
						<th style="width:10%">期 限</th>						
						<th style="width:15%">状 态</th>
					</tr>
                    <?php if(is_array($accomplish_list)): $key = 0; $__LIST__ = $accomplish_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): $mod = ($key % 2 );++$key;?><tr class="item <?php if(($mod) == "1"): ?>item_1<?php endif; ?>" >
                        <td style="text-align: left;" class="tl pl10">
                            &nbsp;&nbsp;<img src="/ysjr8/tpl/simplebootx/Public/images/<?php if(($$deal["warrant"]) == "0"): ?>dan0.png<?php else: ?>dan1.png<?php endif; ?>" width="18" height="18"  class="ico" />
                            <a href="<?php echo ($deal["url"]); ?>"><?php echo ($deal["name"]); ?></a>
                        </td>
                        <td class="ju">
                            <span><?php echo ($deal["borrow_amount_format"]); ?></span>
                        </td>
                        <td>
                            <img src="<?php echo ($deal["level_img"]); ?>" align="absmiddle" title="<?php echo ($deal["user"]["point_level"]); ?>" alt="<?php echo ($deal["user"]["point_level"]); ?>" height="40" />
                        </td>
                        <td>
                            <span><?php echo ($deal["rate"]); ?> %</span>
                        </td>
                        <td>
                            <div class="graph-box">
                                <p>
                                    <?php if(($deal["deal_status"] == 9) or ($deal["deal_status"] == 5)): ?>100%
                                        <?php else: ?>
                                        <?php echo (round($deal["progress_point"])); ?>%<?php endif; ?>
                                </p>
                                <div id="graph-<?php echo ($deal["id"]); ?>"></div>
                            </div>
                            <script type="text/javascript">
                                <?php if($deal["deal_status"] == 9): ?><!--//已还清-->
                                    var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array(['OK', 100], ['NO', 0]);
                                <?php elseif($deal["deal_status"] == 7): ?>
                                        <!--//还款中-->
                                var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array([' ', <?php echo (round($deal["progress_point"],"2")); ?>], ['', <?php echo 100-round($deal['progress_point'],2) ?>]);
                                <?php else: ?>
                                <!--//筹款中-->
                                var colors = ['#E47F2B', '#e7e5e5'];
                                var myData = new Array([' ', <?php echo (round($deal["progress_point"],"2")); ?>], [' ', <?php echo 100-round($deal['progress_point'],2) ?>]);<?php endif; ?>
                                var myChart = new JSChart('graph-<?php echo ($deal["id"]); ?>', 'pie');
                                myChart.setDataArray(myData);
                                myChart.colorizePie(colors);
                                myChart.setTitleColor('#8E8E8E');
                                myChart.setTitleFontSize(0);
                                myChart.setTextPaddingTop(280);
                                myChart.setPieValuesDecimals(1);
                                myChart.setPieUnitsFontSize(0);
                                if($.browser.msie)
                                    myChart.setPieValuesFontSize(0);
                                else
                                    myChart.setPieValuesFontSize(100000000);
                                myChart.setPieValuesColor('#fff');
                                myChart.setPieUnitsColor('#969696');
                                myChart.setSize(46, 46);
                                myChart.setPiePosition(0, 0);
                                myChart.setPieRadius(23);
                                myChart.setFlagColor('#1BB8E3');
                                myChart.setFlagRadius(4);
                                myChart.setTooltipOpacity(1);
                                myChart.setTooltipBackground('#ddf');
                                myChart.setTooltipPosition('ne');
                                myChart.setTooltipOffset(2);
                                myChart.draw();
                            </script>
                        </td>
                        <td>
                            <span><?php echo ($deal["repay_time"]); ?></span>个月
                        </td>
                        <td>
                            <a href="<?php echo ($deal["url"]); ?>">

                                <span
                                <?php if($deal["deal_status"] == 0): ?>class="f_white"
                                    <?php elseif($deal["deal_status"] == 1): ?>
                                    class="f_white"
                                    <?php elseif($deal["deal_status"] == 4): ?>
                                    class="f_white f_gray"
                                    <?php elseif($deal["deal_status"] == 5): ?>
                                    class="f_white f_orange"
                                    <?php elseif($deal["deal_status"] == 7): ?>
                                    class="f_white f_green"
                                    <?php elseif($deal["deal_status"] == 9): ?>
                                    class="f_white f_green"
                                    <?php else: ?>
                                    class="f_white"<?php endif; ?>
                                >
                                <?php echo (loan_state($deal["deal_status"])); ?>
                                </span>
                            </a>
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<a href="<?php echo UU('loan/index/lists');?>" title="查看更多借款列表" class="more">查看更多借款列表</a>
		</div>
            
       <!--新增加内容-->      
            
            
	</div>
</div>

<div class="index_right f_r" style="margin-right:17px; width:286px; margin-top:-20px;" >
	<adv adv_id="首页右侧顶部广告" />
	
	<div class="blank10"></div>
	<div class="blank10"></div>
	
	<div id="loadtop" class="r-block" style="font-family:'微软雅黑';">
		<div class="ti clearfix" style="border: 1px solid #E3E3E3;border-bottom: none;">
			<div style="padding-left:5px" class="f_l">投资排行榜</div>
		</div>
		
		<div id="J_conbox" class="bdd" style="padding:5px;">
			<ul class="clearfix" rel="1">
				<?php if(is_array($month_load_top_list)): $i = 0; $__LIST__ = $month_load_top_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$monthload): $mod = ($i % 2 );++$i;?><li class="clearfix pl10 pt10 pb10" style="border-bottom:1px dashed #eee">
					<span class="nums tc" style="color:#FFF;"><?php echo ($i); ?><!--<img src='/ysjr8/tpl/simplebootx/Public/images/b<?php echo ($i); ?>.png'>--></span>
					<span class="uname">&nbsp;<?php $names=$monthload['user_login']; $name="/(\w{2})([\w\x{2460}-\x{2468}]+)(\w{2})/u"; $gname='${1}*****$3'; echo preg_replace($name, $gname, $names); ?>
					</span>
					<span class="money"><?php echo ($monthload["sum(money)"]); ?>元</span>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>

	<div class="blank10"></div>
	<div class="r-block" style="font-family:'微软雅黑';">
		<div class="gray_title clearfix" style="background-color:#FFF;border: 1px solid #E3E3E3;border-bottom: none;">
			<div class="f_l f_dgray b" style=" color:#666; font-size:16px;">使用帮助</div>
			<!--<div class="f_r">
	        	<div style="vertical-align: middle;_padding: 8px 0;">
	                <span style="font-weight: normal;">
	                    <a href="{url x="index" r="usagetip"}"> <?php echo ($LANG["MORE"]); ?></a>
	                </span>
	                <span><img src="/ysjr8/tpl/simplebootx/Public/images/more.gif" align="absmiddle" alt="<?php echo ($LANG["MORE"]); ?>" style="" title="<?php echo ($LANG["MORE"]); ?>"></span>
	            </div>
	    	</div>-->
		</div>
		<div class="clearfix" style="border:1px solid #e3e3e3; padding:5px 15px; ">
			<ul>
			<?php if(is_array($sybz)): foreach($sybz as $key=>$post): ?><li class="f_l" style="width: 110px; padding: 2px; overflow:hidden;">
				 · <a href="<?php echo UU('portal/Article/index',array('id'=>$post['tid']));?>"><?php echo (msubstr($post["post_title"],0,8)); ?></a>
				</li><?php endforeach; endif; ?>
       		</ul>
		</div>
        
	</div>
</div>
</div>
</div>
	<div class="blank20"></div>
    <style>
    	
			.newsconx{overflow:hidden; border-bottom:1px dotted #CCC;}
			.newstimex{color:#999 !important;}
					.newstitlex a{font-family:"微软雅黑";}
			.sub-list{padding-left:20px !important;}

    </style>
<div class="news" style="background-color:#FFF;">
  <div class="hz_xwzdiv" >
	<div class="newstitlex" style="overflow:hidden;"><a style='color:#333;float:left;' href='/ysjr8/index.php/portal/list/index/id/19'>新闻资讯</a><span style=" height:25px; font-size:12px;  width:50px; display:block; float:right;"><a href="/ysjr8/index.php/portal/list/index/id/19">更多</a></span> <div class="clear"></div></div>
		<?php if(is_array($gd)): $i = 0; $__LIST__ = $gd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ljgd): $mod = ($i % 2 );++$i;?><div class="newsconx">
        	
				<a href="<?php echo U('portal/article/index',array('id'=>$ljgd['tid']));?>" style=" height:25px;width:370px; display:block; float:left;"><?php echo ($ljgd["post_title"]); ?></a><span class="newstimex" ><?php echo ($ljgd["post_modified"]); ?></span>
            <div class="clear"></div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
     <div class="clear"></div>
    </div>
    <div class="hz_xwzdivr" >
	<div class="newstitlex" style="overflow:hidden;" ><a style='color:#333;float:left;' href='/ysjr8/index.php/portal/list/index/id/20'>行业新闻</a><span style=" height:25px; font-size:12px;  width:50px; display:block; float:right;"><a href="/ysjr8/index.php/portal/list/index/id/20">更多</a></span> <div class="clear"></div></div>
		<?php if(is_array($zx)): $i = 0; $__LIST__ = $zx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hyzx): $mod = ($i % 2 );++$i;?><div class="newsconx" >
        		<a href="<?php echo U('portal/article/index',array('id'=>$hyzx['tid']));?>" style=" height:25px; width:370px; display:block; float:left;"><?php echo ($hyzx["post_title"]); ?></a><span class="newstimex" ><?php echo ($hyzx["post_modified"]); ?></span>
            <div class="clear"></div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		
     <div class="clear"></div>
    </div>
</div>

<div class="gun" style="margin:0 auto;">  
<div class="he" style="width:1168px; margin-bottom:10px;">
<p style="font-family: 微软雅黑; padding-left: 20px; color: #444; font-size: 20px; font-weight: 600;">合作伙伴</p>
</div>
 <div id="colee_left">

                <table cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                      <tr>
                          <td id="colee_left1" valign="top" align="center">
                              <table cellpadding="2" cellspacing="0" border="0">
                                  <tbody>
                                      <tr align="center">
                                          <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g1.png">                                     
                                          </td>
                                          <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g2.png"> 
                                          </td>
                                          <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g3.jpg"> 
                                          </td>
                                          <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g4.jpg">                                    
                                          </td>
                                          <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g5.jpg">
                                          </td>
                                          <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g6.jpg">
                                          </td>
                                          <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g7.png">
                                          </td>
										  <td>
                                         <img src="/ysjr8/tpl/simplebootx//Public/images/g8.png">
                                          </td>
                                      </tr>
                                  </tbody>
                                </table>
                      </td>
                      <td id="colee_left2" valign="top">
                              <table cellpadding="2" cellspacing="0" border="0">
                                  <tbody>
                                      <tr align="center">
                                          <td>
                                          <a href="#" class="test" target="_blank"><img src="/ysjr8/tpl/simplebootx//Public/images/g1.png"> </a>                                       
                                          </td>
                                          <td>
                                          <a href="#" class="test" target="_blank"><img src="/ysjr8/tpl/simplebootx//Public/images/g2.png"> </a>
                                          </td>
                                          <td>
                                         <a href="#" class="test" target="_blank"><img src="/ysjr8/tpl/simplebootx//Public/images/g3.jpg"> </a>
                                          </td>
                                          <td>
                                          <a href="#" class="test" target="_blank"><img src="/ysjr8/tpl/simplebootx//Public/images/g4.jpg"> </a>                                      
                                         
                                          </td>
                                          <td>
                                         <a href="#" class="test" target="_blank"><img src="/ysjr8/tpl/simplebootx//Public/images/g5.jpg"> </a>
                                          </td>
                                          <td>
                                          <a href="#" class="test" target="_blank"><img src="/ysjr8/tpl/simplebootx//Public/images/g6.jpg"></a>
                                          </td>
                                          
                                      </tr>
                                  </tbody>
                                </table>
                      </td>
                </tr>
              </tbody>
            </table>
            </div>
             <script>
//使用div时，请保证colee_left2与colee_left1是在同一行上.
var speed=20000//速度数值越大速度越慢
var colee_left2=document.getElementById("colee_left2");
var colee_left1=document.getElementById("colee_left1");
var colee_left=document.getElementById("colee_left");
colee_left2.innerHTML=colee_left1.innerHTML
function Marquee3(){
if(colee_left2.offsetWidth-colee_left.scrollLeft<=0)//offsetWidth 是对象的可见宽度
colee_left.scrollLeft-=colee_left1.offsetWidth//scrollWidth 是对象的实际内容的宽，不包边线宽度
else{
colee_left.scrollLeft++
}
}
var MyMar3=setInterval(Marquee3,speed)
colee_left.onmouseover=function() {clearInterval(MyMar3)}
colee_left.onmouseout=function() {MyMar3=setInterval(Marquee3,speed)}
</script></div>
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
background: url("/ysjr8/tpl/simplebootx/Public/images/phone-icon.png") no-repeat scroll 33% center;
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
background: url("/ysjr8/tpl/simplebootx/Public/images/icon-wb.png") no-repeat scroll 0 0; width:50px; height:49px;
}
.wx {
position: relative;
background: url("/ysjr8/tpl/simplebootx/Public/images/icon-wx.png") no-repeat scroll 0 0; width:50px; height:49px;
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
background: url("/ysjr8/tpl/simplebootx/Public/images/icon-qq.png") no-repeat scroll 0 0;
}
.txwb {
background: url("/ysjr8/tpl/simplebootx/Public/images/icon-txwb.png") no-repeat scroll 0 0; width:50px; height:49px;
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
                <img src="/ysjr8/tpl/simplebootx/Public/images/index03.png" alt="煜商金融logo" style="max-width:150px; border:none;">
            	<a href='/ysjr8/index.php/portal/list/index/id/6'rel="nofollow">关于我们</a>
            	<a href="/ysjr8/index.php/portal/article/index/id/10" rel="nofollow">条款</a>
            	<a href="/ysjr8/index.php/portal/article/index/id/9" rel="nofollow">联系我们</a>
            	<a href="/ysjr8/index.php/portal/article/index/id/3" rel="nofollow">公司简介</a>
            	<a href="/ysjr8/index.php/portal/article/index/id/76" rel="nofollow">借款协议</a>
            	<a href="/ysjr8/index.php/portal/article/index/id/65" rel="nofollow">法律保障</a>
            	<a href="/ysjr8/index.php/portal/article/index/id/64">资金管理</a>
            	<a href="/ysjr8/index.php/portal/article/index/id/63">风控审查</a>
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
				<img src="/ysjr8/tpl/simplebootx/Public/images/er.png" style="width:120px; height:auto;" alt="煜商金融二维码">
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
<script type="text/javascript">
$(function(){	
	$("#case").find("li:odd").css("backgroundColor","#f9f9f9");

   	var $div_li = $(".list_title .list_tt");
   	$div_li.click(function(){
          $(this).addClass("cur").siblings().removeClass("cur");
          var div_index = $div_li.index(this);
          $(".panes").find(".i_deal_list").eq(div_index).show().siblings().hide();
   	});   	
})
</script>
<script>
//使用div时，请保证colee_left2与colee_left1是在同一行上.
var speed=8//速度数值越大速度越慢
var colee_left2=document.getElementById("colee_left2");
var colee_left1=document.getElementById("colee_left1");
var colee_left=document.getElementById("colee_left");
colee_left2.innerHTML=colee_left1.innerHTML
function Marquee3(){
if(colee_left2.offsetWidth-colee_left.scrollLeft<=0)//offsetWidth 是对象的可见宽度
colee_left.scrollLeft-=colee_left1.offsetWidth//scrollWidth 是对象的实际内容的宽，不包边线宽度
else{
colee_left.scrollLeft++
}
}
var MyMar3=setInterval(Marquee3,speed)
colee_left.onmouseover=function() {clearInterval(MyMar3)}
colee_left.onmouseout=function() {MyMar3=setInterval(Marquee3,speed)}
</script>

<!--公告滚动js-->