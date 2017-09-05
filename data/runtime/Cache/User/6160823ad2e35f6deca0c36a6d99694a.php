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


<div class="wrap" style="width:1143px;">
<style type="text/css">
	.i_deal_list table td{ font-size:14px}
</style>
<div class="blank"></div>
<div class="short_uc f_l wb mr5">
    <div id="uc_cate">
    <div class="hdc c_hds c_hd0">个人中心</div>
    <div class="c_body">
        <ul class="menu">

            <li class="<?php if($con_name == Center and ($act_name == index)): ?>act<?php endif; ?>"><a class="uc_cate" href="<?php echo U('User/Center/index');?>" title="我的主页">我的主页</a></li>
            <li class="<?php if($con_name == Myaccount and ($act_name == index or $act_name == account_setting or $act_name == work)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Myaccount/index');?>" title="帐户设置">帐户设置</a></li>
            <li class="<?php if($con_name == Myaccount and ($act_name == paypassword or $act_name == alterpassword )): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Myaccount/paypassword');?>" title="安全设置">安全设置</a></li>
            <li class="<?php if(($curr) == "Auditindex"): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('user/Audit/index');?>" title="认证">认证中心</a></li>
            <li class="<?php if($con_name == Money and ($act_name == index)): ?>act<?php endif; ?>"><a class="uc_cate" href="<?php echo U('User/Money/index');?>" title="充值">充值提现</a></li>
            <!--<li class="<?php if($con_name == Message ): ?>act<?php endif; ?>"><a class="uc_cate" href="<?php echo U('User/Message/index');?>" title="消息管理">消息</a></li>-->
        </ul>
    </div>
    <div class="hdc c_hds c_hd1">贷款管理</div>
    <div class="c_body">
        <ul class="menu">
            <li class="<?php if($con_name == Deal and ($act_name == index)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Deal/index');?>" title="偿还贷款">偿还贷款</a></li>
            <li class="<?php if($con_name == Deal and ($act_name == borrowed)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Deal/borrowed');?>" title="已发布的贷款">已发布的贷款</a></li>
            <li class="<?php if($con_name == Deal and ($act_name == borrow_stat)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Deal/borrow_stat');?>" title="贷款统计">贷款统计</a></li>
        </ul>
    </div>
    <div class="hdc c_hds c_hd2">理财管理</div>
    <div class="c_body">
        <ul class="menu">
            <li class="<?php if($con_name == Invest and ($act_name == index)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Invest/index');?>" title="我的投资">我的投资</a></li>
            <li class="<?php if($con_name == Transfer and ($act_name == index)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Transfer/index');?>" title="债权转让">债权转让</a></li>
            <li class="<?php if($con_name == Collect): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Collect/index');?>" title="我关注的标">我关注的标</a></li>
            <li class="<?php if($con_name == Earnings ): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Earnings/index');?>" title="理财统计">理财统计</a></li>        
        </ul>
    </div>
    <!--<div class="hdc c_hds c_hd3">个人设置</div>
    <div class="c_body">
        <ul class="menu">
            <li class="<?php if($con_name == Myaccount and ($act_name == index or $act_name == work)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Myaccount/index');?>" title="帐户设置">帐户设置</a></li>
            <li class="<?php if($con_name == Myaccount and ($act_name == paypassword)): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('User/Myaccount/paypassword');?>" title="支付密码">支付密码</a></li>
            <li class="<?php if(($curr) == "Auditindex"): ?>act<?php endif; ?>"> <a class="uc_cate" href="<?php echo U('user/Audit/index');?>" title="认证">认证中心</a></li>
            <!--<li class=""> <a class="uc_cate" href="<?php echo U('User/Audit/dataauth_list');?>" title="认证">资料审核</a></li>
          
        </ul>
    </div>-->
	<!--
    <div class="hdc c_hds c_hd4">推荐奖励</div>
    <div class="c_body">
        <ul class="menu">
            <li class=""> <a class="uc_cate" href="/demo-p2p/index.php?ctl=uc_account" title="帐户设置">邀请奖励</a></li>
           
        </ul>
    </div>
	-->
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#uc_cate li.act").parent().parent().prev(".hdc").removeClass("c_hds");
	$("#uc_cate li.act").parent().parent().prev(".hdc").addClass("c_hd");
					   
	/* 滑动/展开 */
	$("#uc_cate .hdc").click(function(){
		
		$(this).next(".c_body").slideToggle();
		
	});
	
});
</script>

</div>
<div class="long_uc f_l">
	
<div class="list">
	<div class="list_title clearfix">
		<div <?php if(($act_name) == "index"): ?>class="cur"<?php endif; ?>   ><a href="<?php echo U('User/Myaccount/index');?>">账户设置</a></div>
		<div <?php if(($act_name) == "index"): ?>class="work"<?php endif; ?>  ><a href="<?php echo U('User/Myaccount/work');?>">工作认证</a></div>
	</div>
	<div class="uc_r_bl_box clearfix">
	<div class="blank"></div>
	<div class="tips mr10 ml10">
		<span class="f_red b">*</span> 为必填项，所有资料均会严格保密。
	</div>
	<style>
		.field{width:520px}
		.btn {
    background-image: none;
    border: 0 none;
    border-radius: 0;
    box-shadow: none;
    padding: 7px 12px;
    text-shadow: none;
    color: #999;
	cursor: pointer;
    display: inline-block;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
    text-align: center;
    vertical-align: middle;
    background-color: #e1e1e1;
    background-repeat: repeat-x;
}
.btn-primary {
    background-color: #498dc8;
    background-repeat: repeat-x;
    color: #fff;
 }
 .uploaded_avatar_btns{margin-top: 20px;}
.uploaded_avatar_area .uploaded_avatar_btns{display: none;}
	</style>
	<div class="blank"></div>
	<div class="t_name item_group">个人详细信息</div>
	<form method="post" action="<?php echo U('User/Myaccount/profile');?>" name="modify">
	<div class="inc wb">
		<div class="inc_main">
				<table width="800px" class="user_info_table">
					<tr>
						<td class="pt10" style="width:560px">
							<!--<div class="field password">
								<label for="settings-password"> 原始密码</label>
								<input type="password" class="f-input" id="input-old_password"  name="old_password"> 
							</div>
							<div class="blank10"></div>
						
							<div class="field password">
								<label for="settings-password">新密码</label>
								<input type="password" class="f-input" id="settings-password" name="password" size="30">
								<span class="hint">如果不想修改密码，请保持空白</span> 
							</div>
							<div class="blank10"></div>
							<div class="field password">
								<label for="settings-password-confirm">确认密码</label>
								<input type="password" class="f-input" id="settings-password-confirm" name="repassword" size="30">
							</div>-->
							<div class="blank10"></div>									
							<div class="field real_name">
								<label for="settings-real_name"><span class="red">*</span>真实姓名</label>
								<input type="text" value="<?php echo ($name); ?>" name="name"  <?php if(($wechat_audit) == "1"): ?>readonly="readonly" disabled="true"<?php endif; ?>  class="f-input readonly" id="settings-real_name" size="30">
							</div>
							<div class="blank10"></div>
							<div class="field idno">
								<label for="settings-idno"><span class="red">*</span>身份证号</label>
								<input type="text" value="<?php echo ($idcard); ?>" name="idcard" <?php if(($wechat_audit) == "1"): ?>readonly="readonly" disabled="true"<?php endif; ?>  class="f-input readonly" id="settings-idno" size="30" />
							</div>
							<div class="blank10"></div>
							<div class="field mobile">
								<label for="settings-mobile"><span class="red">*</span>手机号码</label>
								<input type="text" value="<?php echo ($cellphone); ?>" name="cellphone"  <?php if(($cellphone_audit) == "1"): ?>readonly="readonly" disabled="true"<?php endif; ?> class="f-input readonly" id="settings-mobile" size="30">
							</div>
							<div class="blank10"></div>
							<div class="field">
								<label><span class="red">*</span>性别</label>
								<select name="gender">
									<option value="1" <?php if(($gender) == "1"): ?>selected="selected"<?php endif; ?>>男</option>
									<option value="2" <?php if(($gender) == "2"): ?>selected="selected"<?php endif; ?>>女</option>
								</select>
							</div>
							<div class="blank10"></div>
							<div class="field clearfix">
								<label for="settings-birthday"><span class="red">*</span>出生日期</label>
								<input type="text" class="f-input J_date date" name="born"  value="<?php echo ($born); ?>">
								
							</div>
							<div class="blank10"></div>
							<div class="field clearfix">
								<label for="settings-birthday"><span class="red">*</span>民族</label>
								<input type="text" class="f-input" name="national"  value="<?php echo ($national); ?>">
								
							</div>
							<div class="blank10"></div>
							<div class="field graduation">
								<label for="settings-graduation"><span class="red">*</span>最高学历</label>
								<select name="education" id="settings-graduation">
									<option value="高中或以下" <?php if(($education) == "高中或以下"): ?>selected="selected"<?php endif; ?> >高中或以下</option>
									<option value="大专" <?php if(($education) == "大专"): ?>selected="selected"<?php endif; ?> >大专</option>
									<option value="本科" <?php if(($education) == "本科"): ?>selected="selected"<?php endif; ?> >本科</option>
									<option value="研究生或以上" <?php if(($education) == "研究生或以上"): ?>selected="selected"<?php endif; ?>>研究生或以上</option>
								</select>
							</div>
							<div class="blank10"></div>
							<div class="field university">
								<label for="university">毕业院校</label>
								<input type="text" value="<?php echo ($university); ?>" class="f-input" id="settings-university" name="university" size="30">
							</div>
							<div class="blank10"></div>
							<div class="field marriage">
								<label><span class="red">*</span>婚姻状况</label>
								
								<input type="radio" class="f-radio" value="已婚" name="marriage" <?php if(($marriage) == "已婚"): ?>checked="checked"<?php endif; ?>> 已婚
								&nbsp;&nbsp;&nbsp;
								<input type="radio" class="f-radio" value="未婚" name="marriage" <?php if(($marriage) == "未婚"): ?>checked="checked"<?php endif; ?>> 未婚
								&nbsp;&nbsp;&nbsp;
								<input type="radio" class="f-radio" value="离异" name="marriage" <?php if(($marriage) == "离异"): ?>checked="checked"<?php endif; ?>> 离异
								&nbsp;&nbsp;&nbsp;
								<input type="radio" class="f-radio" value="丧偶" name="marriage" <?php if(($marriage) == "丧偶"): ?>checked="checked"<?php endif; ?>> 丧偶
								
							</div>
							<div class="blank10"></div>
							<div class="field hashouse">
								<label><span class="red">*</span>是否有房</label>
								<input type="radio" class="f-radio" value="1" name="housing" <?php if(($housing) == "1"): ?>checked="checked"<?php endif; ?>> 有
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" class="f-radio" value="0" name="housing" <?php if(($housing) == "0"): ?>checked="checked"<?php endif; ?>> 无
							</div>
							<div class="blank10"></div>
							<div class="field hascar">
								<label><span class="red">*</span>是否有车</label>
								<input type="radio" class="f-radio" value="1" name="buy_cars" <?php if(($buy_cars) == "1"): ?>checked="checked"<?php endif; ?>> 有
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" class="f-radio" value="0" name="buy_cars" <?php if(($buy_cars) == "0"): ?>checked="checked"<?php endif; ?>> 无
							</div>		
							<div class="blank10"></div>
							<div class="field">
																			
								<label for="settings-region"><span class="red">*</span>籍贯</label>
								
									<select class="input" id="s_province" name="s_province"></select>&nbsp;&nbsp;
								    <select class="input" id="s_city" name="s_city" ></select>&nbsp;&nbsp;
								    <select class="input" id="s_county" name="s_county"></select>
								    <script src="/statics/js/area.js"></script>
								    <script type="text/javascript">
								    var natives = "<?php echo ($native_place1); ?>";
								    if(natives){
								    	var opt0 = ["<?php echo ($native_place1); ?>","<?php echo ($native_place2); ?>","<?php echo ($native_place3); ?>"];
								    }
								    _init_area();
								    </script>
							    
						   		 <div id="show"></div>
								
							</div>	
							<div class="blank10"></div>
							<div class="field address">
								<label for="settings-address"><span class="red">*</span>现居住地址</label>
								<input value="<?php echo ($location); ?>" class="f-input f-input220" name="location" id="settings-address">
							</div>
							<div class="blank10"></div>
						</td>
						<!--<td class="pt10" valign="top">
                               <div class="tab-content">
                                   <div class="tab-pane active" id="one">
                                   		<?php if(empty($loginuser['avatar'])): ?><img src="/tpl/simplebootx//Public/images/headicon_128.png" class="headicon"/>
							            <?php else: ?>
							            	<img src="<?php echo sp_get_user_avatar_url($loginuser['avatar']);?>" class="headicon"/><?php endif; ?>
                                   		<input type="file" onchange="avatar_upload(this)" id="avatar_uploder"  name="file"/>
                                   		<div class="uploaded_avatar_area">
                                   		
                                   		<div class="uploaded_avatar_btns">
                                   			<a class="btn btn-primary confirm_avatar_btn" onclick="update_avatar()">确定</a>
                                   			<a class="btn" onclick="reloadPage()">取消</a>
                                   		</div>
                                   		</div>
                                   </div>
                               </div>						
						</td>
					</tr>-->
					<tr>
						<td colspan="2">
							<div class="blank"></div>
							<div class="clearfix b">请确保您填写的资料真实有效，所有资料将会严格保密。一旦被发现所填资料有虚假，将会影响您在p2p信贷的信用，对以后借款造成影响。</div>
							<div class="blank"></div>
						</td>
					</tr>
					
				</table>
				<div class="blank20"></div>
				<div style="text-align:center">
						<input type="hidden" value="<?php echo ($loginuser["id"]); ?>" name="uid" />
						<input type="submit" class="sub_btn" id="settings-submit" name="commit" value="保存并继续">
				</div>
				<div class="blank"></div>
		</div>
		<div class="inc_foot"></div>
	</div>
	</form>
	</div>
</list>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/statics/js/jquery.js"></script>
    <script src="/statics/js/wind.js"></script>
    <script src="/tpl/simplebootx/Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script src="/statics/js/frontend.js"></script>
	<script>
	$(function(){
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>

 
	<script type="text/javascript">
	function update_avatar(){
		var area=$(".uploaded_avatar_area img").data("area");
		$.post("<?php echo U('profile/avatar_update');?>",area,
				function(data){
			if(data.status==1){
				reloadPage(window);
			}
			
		},"json");
		
	}
	function avatar_upload(obj){
		var $fileinput=$(obj);
		/* $(obj)
		.show()
		.ajaxComplete(function(){
			$(this).hide();
		}); */
		Wind.css("jcrop");
		Wind.use("ajaxfileupload","jcrop","noty",function(){
			$.ajaxFileUpload({
				url:"<?php echo U('profile/avatar_upload');?>",
				secureuri:false,
				fileElementId:"avatar_uploder",
				dataType: 'json',
				data:{},
				success: function (data, status){
					if(data.status==1){
						$("#avatar_uploder").hide();
						var $uploaded_area=$(".uploaded_avatar_area");
						$uploaded_area.find("img").remove();
						var $img=$("<img/>").attr("src","/data/upload//avatar/"+data.data.file);
						$img.prependTo($uploaded_area);
						$(".uploaded_avatar_btns").show();
						$img.Jcrop({
					    	aspectRatio:1/1,
					    	setSelect: [ 0, 0, 100, 100 ],
					    	onSelect: function(c){
					    		$img.data("area",c);
					    	}
					    });
						
					}else{
						noty({text: data.info,
                    		type:'error',
                    		layout:'center'
                    	});
					}
					
				},
				error: function (data, status, e){}
			});
		});
		
		
		
		return false;
	}
</script>
</div>

<div class="blank"></div>


 
</div>

<div class="blank"></div>
</div>
</div>
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