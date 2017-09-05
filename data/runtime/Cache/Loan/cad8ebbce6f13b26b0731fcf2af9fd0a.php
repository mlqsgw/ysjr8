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


<!----------------------头部结束--------------------------------->
<!------------这里定义自己的CSS样式------>
<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/loan.css" />
<style type="text/css">
/*TAB样式开始啰*/
#tabs2 {
	text-align:left;
	width:1000px;
	position:relative;
	margin-top:30px;
}

.main1box {
	clear:both;
	height:auto;
	width:1000px;
	
}
#main1 ul {
	display: none;
	text-align:left;
}
#main1 ul.block {
	display: block;
}
input#Button1 {
width: 116px;
background-color: #E47F2B;
}
/*TAB样式结束啰*/
/*文本样式开始啰*/
 
	.zou {
    width: 476px;
float: left;
padding-left: 21px;
margin-top: 22px;
margin-left: 33px;
font-weight: bolder;
font-size: 14px;
background-color: rgb(227, 253, 255);
}

.you {
    width: 440px;
    float: left;
	padding-top:20px;
}
.diyi {
   width: 438px;
font-weight: bolder;
color: rgb(111, 133, 197);
}
.dier {
    width: 438px;
}
.you p{ padding-left:25px; padding-top:7px; font-family:"微软雅黑";}
.disan{
    margin-top: 69px;
	width: 438px;
}
.disi{ margin-top: 89px; width: 438px;}
/*文本样式结束啰*/
/*新增样式输入框开始*/
.rt_bform {
    width: 457px;
    float: right;
    padding: 30px 60px 40px 50px;
    border-radius: 5px;
    background:#EEFFFC;
}
.clearfix {
    display: block;
}
.rtdt, .ladt {
    width: 90px;
    font-size: 14px;
    display: block;
    color: #333;
    float: left;
    height: 35px;
    text-align: right;
    line-height: 34px;
    margin-bottom: 33px;
}
.rtdt span {
    color: #ee0000;
    font-size: 16px;
    font-family: Verdana;
}
.rtdd {
    width: 310px;
    display: block;
    position: relative;
    float: right;
    height: 34px;
    border: 1px #A29B9B solid;
    line-height: 34px;
    margin-bottom: 33px;
}
.rtddc {
    width: 310px;
    display: block;
    position: relative;
    float: right;
    margin-bottom: 33px;
}
.rtdd .in, .ladd .in {
    height: 34px;
    padding: 0px 5px;
    border: 0px;
    line-height: 34px;
    font-size: 14px;
    width: 300px;
}
.tag {
    position: absolute;
    display: none;
    bottom: -25px;
    line-height: 22px;
}
.wrong i {
    background: url(//www.xiaoyoucai.com/source/images/login/formi.png) 0px -37px no-repeat;
    height: 16px;
    margin-right: 3px;
    width: 16px;
    display: block;
    margin-top: 3px;
    float: left;
}
.rtdd .choa {
    display: block;
    height: 34px;
    width: 100%;
}
.rtdd .rticon, .ladd .rticon, .coulf .rticon {
    border-color: transparent;
    border-style: solid;
    position: absolute;
    right: 10px;
    display: block;
    height: 0px;
    width: 0px;
    border-width: 6px;
    border-bottom: 0px;
    top: 14px;
    border-top-color: #333;
}
.rtdd .cl {
    color: #c4c4c4;
    font-family: "宋体";
    font-size: 12px;
}
.rtdd .dtxt {
    line-height: 34px;
    padding-left: 5px;
    color: #333;
}
.rtdd .choul, .borlf_l .choul {
    width: 269px;
    background: #fff;
    position: absolute;
    border: 1px #ececec solid;
    top: 35px;
    z-index: 5;
}
.DN, .dn {
    display: none;
}
.rtdd .choul li, .borlf_l .choul li {
    border-bottom: 1px #ececec solid;
    line-height: 32px;
}
.borlf_l .choul li a {
    display: block;
    height: 32px;
    padding: 0px 20px;
}
.rtdd textarea {
    border: 1px #ececec solid;
    width: 300px;
    height: 50px;
    line-height: 25px;
    padding-left: 5px;
}
.rtdd .rttxt {
    position: absolute;
    z-index: 1;
    right: 5px;
    text-align: right;
    line-height: 34px;
}
.ma01 {
    margin: 0px 20px;
}


dl.rtdl.clearfix {
    width: 447px;
}
.rtdd .choul li a:hover, .borlf_l .choul li a:hover {
    display: block;
    height: 32px;
    background: #ffc4aa;
    color: #333;
}
a{color:#666; text-decoration:none;}
a:hover{color:#000; text-decoration:none;}
textarea#loanDesc {
    width: 303px;
    height: 115px;
}
/*新增样式输入框结束*/
.biaoge tr{ line-height:18px;} 
.biaoge input{ border:1px solid #999999; font-size:15px;}
tr.xiala {
    height: 60px;
}
textarea#loanDesc {
    border: 1px solid #939898;
}
table.biaoge {
padding-top: 21px;
padding-bottom: 20px;
}
.c{
	color:green;
	padding:5px;
	height:8px;
	line-height:8px;
}
.formbtn{
background: #B2621F;
display: block;
border-radius: 5px;
text-align: center;
font-size: 18px;
color: #fff;
line-height: 45px;
height: 45px;
clear: both;
font-weight: bolder;
text-decoration:none;
margin-top:20px;
width: 235px;
margin-left:60px;
}
.zong {
width: 1000px;
height: 699px;
padding-bottom:100px;
}
.bmod {
width: 914px;
float: right;
padding-top: 30px;
padding-right: 50px;
}



.borbtn:hover {
background: #ff9600;
}

.borbtn:hover {
color: #fff;
background: #ff824b;
}
.formbtn:hover{ color:#000000;}
.ddd{ color:#FF0000;}
.kkkk {
width: 60px;
float: left;
margin-top: 20px;
margin-left: 10px;
}
.kkka {
width: 60px;
float: left;
margin-top: 11px;
margin-left: 10px;
}
.kkka {
width: 60px;
float: left;
margin-top: 11px;
margin-left: 10px;
}
.lll {
width: 110px;
float: left;
height: 40px;
background-color:#B2621F;
text-align:center;
font-size:16px;
}

</style>
<body onLoad="createCode()">
<div class="blank"></div>
<div class="tupian" style=" width:100%;"><img src="/tpl/simplebootx/Public/images/yindao_bann.jpg" width="100%"  > </div>
<div class="clearfix">
  <div id="tabs2">
    <div class="main1box">
      <div class="main" id="main1">
        <ul class="block">
          <div id="tabcontent1" style="display: block;">
            <div class="he" style="margin:0 auto; width:997px; background-color:#FFFFFF;  border-top:2px solid #B2621F; border-bottom:1px solid #B2621F; border-left:1px solid #B2621F; border-right:1px solid #B2621F; margin-bottom:1px;">
              <div class="zong" style=" ">
                <div class="you">
                  <div class="diyi">
                    <p style="line-height:28px; text-indent:2em;">煜商金融平台的借款功能指在帮助借款用户以低成本获得借款用户在需要资金时，可以将自己以有的房产或车产作为抵押物，煜商金融在线下审核通过后，根据抵押物的价值来融资！</p>
                  </div>
                  <div class="dier" style="margin-top:30px;">
                    <p><span style="font-size:19px; font-weight:bolder;">1</span>借款速度快，审核通过后7个自然日之内</p>
                    <p><span style="font-size:19px; font-weight:bolder;">2</span>借款息费低，借款息费年化10%-20%</p>
                    <p><span style="font-size:19px; font-weight:bolder;">3</span>借款期限短，借款时间1-6个月</p>
                  </div>
                  <div class="disan">
                    <h2 style="margin-left:22px; border-bottom:3px solid #B2621F; height:40px; line-height:40px;  color:#FFFFFF;">
                      <div class="lll">申请条件</div>
                    </h2>
                    <p class="t1" ><img src="/tpl/simplebootx/Public/images/1.png" style="margin-right:10px;">年满18周岁以上的公民</p>
                    <p class="t2"><img src="/tpl/simplebootx/Public/images/2.png" style="margin-right:10px;">需有房产或车产抵押</p>
                    <p class="t3"><img src="/tpl/simplebootx/Public/images/3.png" style="margin-right:10px;">个人或企业银行征信记录良好</p>
                    <p class="t4"><img src="/tpl/simplebootx/Public/images/4.png" style="margin-right:10px;">无现有诉讼记录</p>
                  </div>
                  <div class="disi">
                    <h2 style="margin-left:22px; border-bottom:3px solid #B2621F; height:40px; line-height:40px; color:#FFFFFF;">
                      <div class="lll">提交资料</div>
                    </h2>
                    <p class="p1"><img src="/tpl/simplebootx/Public/images/5.png" style="margin-right:10px;">身份证</p>
                    <p class="p2"><img src="/tpl/simplebootx/Public/images/6.png" style="margin-right:10px;">申请资料</p>
                    <p class="p3"><img src="/tpl/simplebootx/Public/images/7.png" style="margin-right:10px;">其他</p>
                  </div>
                </div>
                <div class="zou">
                  <form action="/index.php/Borrow/apply" method="post"  onSubmit="return checkAll();">

                    <table class="biaoge">
                      <tr>
                        <td><span class="ddd"> *</span>借款标题：</td>
                        <td><input style="width:240px; height:25px; line-height:25px;" type="text" onChange="checkUsername();" name="name"/></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><div id="sUsername" style="color:#BEBEC2;">由2-30个汉子组成</div></td>
                      </tr>
                      <tr class="xiala">
                        <td><span class="ddd"> *</span>借款用途：</td>
                        <td>
                        <!-- <select style="width:240px; height:30px; line-height:30px;" name="type_id">
                            <option value="短期周转" name="type_id">短期周转</option>
                            <option value="购房借款" name="type_id">购房借款</option>
                            <option value="装修借款" name="type_id">装修借款</option>
                            <option value="个人消费" name="type_id">个人消费</option>
                            <option value="婚礼筹备" name="type_id">婚礼筹备</option>
                            <option value="教育培训" name="type_id">教育培训</option>
                            <option value="汽车消费" name="type_id">汽车消费</option>
                            <option value="投资创业" name="type_id">投资创业</option>
                            <option value="医疗支出" name="type_id">医疗支出</option>
                            <option value="其他借款" name="type_id">其他借款</option>
                          </select> -->
                          <select id="systemimgpath" name="type_id" style="width:240px; height:30px; line-height:30px;" >
                              <?php if(is_array($loantype)): foreach($loantype as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["t_name"]); ?></option><?php endforeach; endif; ?>
                          </select>
                        </td>
                      </tr>
                     
                      <tr>
                        <td><span class="ddd"> *</span>借款金额：</td>
                        <td><input style="width:240px; height:25px; line-height:25px;" type="text" onChange="checkjine();"  name="borrow_amount"/>
                          元</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><div id="jPass" style="color:#BEBEC2;">（请填写为<?php echo (C("sys_tenderMultiplicand")); ?>的倍数,最大额度为<?php echo ($amount); ?>元） </div></td>
                      </tr>
                      <tr>
                        <td><span class="ddd"> *</span>年利率：</td>
                        <td><input style="width:120px; height:25px; line-height:25px;" type="text" onChange="nian();"  name="rate"/>
                          %（在<?php echo (C("sys_loans_lowest_apr")); ?>%到<?php echo (C("sys_loans_highest_apr")); ?>%之间）</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><div id="jnian" style="color:#BEBEC2;">请输入数字</div></td>
                      </tr>
                      <tr class="xiala">
                        <td><span class="ddd"> *</span>借款期限：</td>
                        <td><select style="width:240px; height:30px; line-height:30px;" name="repay_time">
                            <option value="6" name="repay_time">6个月</option>
                            <option value="10" name="repay_time">10个月</option>
                            <option value="12" name="repay_time">12个月</option>
							
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>还款周期：</td>
                        <td><div  style="width:215px; height:25px ; line-height:25px; border:1px solid #999999; margin:0; background-color:#FFFFFF; padding-left:20px;">按月还款</div></td>
                      </tr>
                      <tr class="xiala">
                        <td><span class="ddd"> *</span>还款方式：</td>
                        <td><select name="loantype" id="loantype" class="normal_select"  style="width:240px; height:28px; line-height:28px;" >
                                 <?php $payback=unserialize($payback); ?>
                                <?php if(is_array($payback)): foreach($payback as $key=>$paybackvo): ?><option value="<?php echo ($key); ?>" ><?php echo ($payback[$key]); ?></option><?php endforeach; endif; ?>

                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td><span class="ddd"> *</span>筹标期限：</td>
                        <td><input style="height:25px; line-height:25px;" type="text" onChange="checkqixian();" name="deadline"/>
                          （1到10天）</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><div id="sqixian" style="color:#BEBEC2;">请输入1到10之间的纯数字</div></td>
                      </tr>
                      <tr>
                        <td><span class="ddd"> *</span>最高投标金额：</td>
                        <td><input style=" width:73px; height:25px; line-height:25px;" type="text" onChange="checkgao();" name="max_loan_money"/>
                         元(0为不限制，请填写<?php echo (C("sys_tenderMultiplicand")); ?>的倍数)</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><div id="sgao" style="color:#BEBEC2;">请输入50倍数的纯数字</div></td>
                      </tr>
                      <tr>
                        <td><span class="ddd"> *</span>最低投标金额：</td>
                        <td><input style="width:73px; height:25px; line-height:25px;" type="text" onChange="checkxiao();" name="min_loan_money"/>
                     元   (最少投资<?php echo (C("sys_tenderMultiplicand")); ?>，请填写<?php echo (C("sys_tenderMultiplicand")); ?>的倍数)</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><div id="xiao" style="color:#BEBEC2;">请输入50倍数的纯数字</div></td>
                      </tr>
                      <tr>
                      <tr>
                        <td>借款描述：</td>
                        <td><textarea  class="wu" style=" width:240px; height:85px;" id="loanDesc" rows="2" placeholder="50个字以内" maximum="50" onChange="checkmiaoshu();" name="description"></textarea>
                        </td>
                      </tr>
                      <!-- <tr>
                        <td></td>
                        <td><div id="miaoshu" style="color:#BEBEC2;">请输入50字以内</div></td>
                      </tr> -->
                      <!-- <tr>
                        <input type="hidden" value="<?php echo ($leixing); ?>" name="borrowType">
                      </tr> -->
                       <tr>
                        <input name="cate_id" type="hidden" value="<?php echo ($id); ?>" />
                        <input name="user_id" type="hidden" value="<?php echo ($uid); ?>" />
                      </tr>

                      <tr>
                        <td colspan="3" align="center">
                       
                        <!-- <a class="formbtn ma01" id="submit" href="javascript:void(0)">提交申请</a> -->
                        <input class="formbtn ma01" id="submit" type="submit" value="提交申请"> </td></td>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
            <div class="bo"></div>
          </div>
        </ul>
      </div>
    </div>
  </div>
  <div class="liuchen" style="width:998px; margin-top:10px; background-color:rgb(248, 246, 244); padding-top:20px;">
    <h2 style="text-align:center; font-size:27px; font-weight:bolder;">煜商金融申请流程</h2>
    <img src="/tpl/simplebootx/Public/images/11.png" style="margin-top:30px;"></div>
</div>
<div class="blank"></div>
<!--表单验证开始-->
<script type="text/javascript">
//-------------借款标题
function checkUsername(){
	//1、得到username中输入的值
	var v=document.getElementsByName("name")[0].value;
	//2、进行合法性验证，使用正则表达式
	//3、在sUsername中，显示验证的结果
  if (v==""){
      document.getElementById("sUsername").innerHTML="借款标题不能为空！";
      document.getElementById("sUsername").style.color='red';
      return false;
  }
	if(/^([\u4e00-\u9fa5]){2,29}$/.test(v)){
		//sUsername中输出：正确
		document.getElementById("sUsername").innerHTML="正确";
		//设置字的颜色
		document.getElementById("sUsername").style.color="green";
		//document.getElementById("sUsername").style.border="1px solid orange";
		//document.getElementById("sUsername").style.padding="5px";
		//document.getElementById("sUsername").style.backgroundColor="#abcdef";
		document.getElementById("sUsername").className='c';
		return true;
	}else{  
    document.getElementById("sUsername").innerHTML="格式不正确,请输入2~30个汉字";
    document.getElementById("sUsername").style.color='red';
    return false;
  }
	
}
//--------------借款金额
function checkjine(){
  //1、得到username中输入的值
  var v=document.getElementsByName("borrow_amount")[0].value;
  //2、进行合法性验证，使用正则表达式
  //3、在sUsername中，显示验证的结果
  if(v==""){
    document.getElementById("jPass").innerHTML="借款金额不能为空！";
    document.getElementById("jPass").style.color='red';
    return false;
  }
  if(v%50==0 & v<=5000000 & v!=0){
    //sUsername中输出：正确
    document.getElementById("jPass").innerHTML="正确";
    //设置字的颜色
    document.getElementById("jPass").style.color="green";
    //document.getElementById("sUsername").style.border="1px solid orange";
    //document.getElementById("sUsername").style.padding="5px";
    //document.getElementById("sUsername").style.backgroundColor="#abcdef";
    document.getElementById("jPass").className='c';
    return true;
  }else{
    //sUsername中输出：用户名格式错误
    document.getElementById("jPass").innerHTML="请填写为50的倍数,最大额度为5000000.00元";
    document.getElementById("jPass").style.color='red';
    return false;
  }
  
}
//----------年利率
function nian(){
	//1、得到username中输入的值
	var v=document.getElementsByName("rate")[0].value;
	//2、进行合法性验证，使用正则表达式
	//3、在sUsername中，显示验证的结果
  if(v==""){
    document.getElementById("jnian").innerHTML="年利率不能为空！";
    document.getElementById("jnian").style.color='red';
    return false;
  }
	if(v>=10 & v<=20){
		//sUsername中输出：正确
		document.getElementById("jnian").innerHTML="正确";
		//设置字的颜色
		document.getElementById("jnian").style.color="green";
		
		document.getElementById("jnian").className='c';
		return true;
	}else{
		//sUsername中输出：用户名格式错误
		document.getElementById("jnian").innerHTML="利率格式错误";
		document.getElementById("jnian").style.color='red';
		return false;
	}
	
}
//--------筹标期限
function checkqixian(){
	//1、得到username中输入的值
	var v=document.getElementsByName("deadline")[0].value;
	//2、进行合法性验证，使用正则表达式
	//3、在sUsername中，显示验证的结果
  if(v==""){
    document.getElementById("sqixian").innerHTML="筹标期限不能为空！";
    document.getElementById("sqixian").style.color='red';
    return false;
  }
	if(v>=1&v<=10){
		//sUsername中输出：正确
		document.getElementById("sqixian").innerHTML="正确";
		//设置字的颜色
		document.getElementById("sqixian").style.color="green";
		document.getElementById("sqixian").className='c';
		return true;
	}else{
		//sUsername中输出：用户名格式错误
		document.getElementById("sqixian").innerHTML="格式错误,请输入数字";
		document.getElementById("sqixian").style.color='red';
		return false;
	}
	
}


//----------最高投标金额
function checkgao(){
	//1、得到username中输入的值
	var v=document.getElementsByName("max_loan_money")[0].value;
	//2、进行合法性验证，使用正则表达式
	//3、在sUsername中，显示验证的结果
  if(v==""){
    document.getElementById("sgao").innerHTML="最高投标金额不能为空！";
    document.getElementById("sgao").style.color='red';
    return false;
  }
	if(v%50==0 & v<=5000000){
		//sUsername中输出：正确
		document.getElementById("sgao").innerHTML="正确";
		//设置字的颜色
		document.getElementById("sgao").style.color="green";
		document.getElementById("sgao").className='c';
		return true;
	}else{
		//sUsername中输出：用户名格式错误
		document.getElementById("sgao").innerHTML="输50倍数的纯数字且小于500万";
		document.getElementById("sgao").style.color='red';
		return false;
	}
	
}
//----------最低投标金额
function checkxiao(){
  //1、得到username中输入的值
  var b=document.getElementsByName("max_loan_money")[0].value;
  var v=document.getElementsByName("min_loan_money")[0].value;
  //2、进行合法性验证，使用正则表达式
  //3、在sUsername中，显示验证的结果
  if(v==""){
    document.getElementById("xiao").innerHTML="最低投标金额不能为空！";
    document.getElementById("xiao").style.color='red';
    return false;
  }

  if(b==0 & v<=5000000 & v%50==0 &v!=0){
     document.getElementById("xiao").innerHTML="正确";
    //设置字的颜色
    document.getElementById("xiao").style.color="green";
    document.getElementById("xiao").className='c';
    return true;
  }else{
    if(v%50==0 &v!=0 &v<=5000000 & v<b){
    //sUsername中输出：正确
    document.getElementById("xiao").innerHTML="正确";
    //设置字的颜色
    document.getElementById("xiao").style.color="green";
    document.getElementById("xiao").className='c';
    return true;
  }else{
    //sUsername中输出：用户名格式错误
    document.getElementById("xiao").innerHTML="请输入50倍数且不能大于最高投标金额且小于500万";
    document.getElementById("xiao").style.color='red';
    return false;
  }
  
  }
  
}
// //-------借款描述：
// function checkmiaoshu(){
//   //1、得到username中输入的值
//   var v=document.getElementsByName("description")[0].value;
//   //2、进行合法性验证，使用正则表达式
//   //3、在sUsername中，显示验证的结果
//   if(v==""){
//     document.getElementById("miaoshu").innerHTML="借款描述不能为空!";
//     document.getElementById("miaoshu").style.color='red';
//     return false;
//   }else{
//      document.getElementById("miaoshu").innerHTML="正确";
//     //设置字的颜色
//     document.getElementById("miaoshu").style.color="green";
//     document.getElementById("miaoshu").className='c';
//     return true;
//   }
  
// }
function checkAll(){
	
	var re1=checkUsername();
	var re2=checkjine();
  var re3=nian();
  var re4=checkqixian();
  var re5=checkxiao();
  var re6=checkgao();

	if(re1 && re2 && re3 && re4 && re5 && re6){
		return true;
	}else{
    return false;
		return false;//其中任意一个不合法
	}
}
</script>
<!--表单验证结束-->
<!----------------------尾部开始--------------------------------->
</div>
<div class="blank"></div>
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
</body>