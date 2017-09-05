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


<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/pcmain.css" media="screen" />

<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
			})
</script>
<script type="text/javascript">
var Speed_1 = 10; //速度(毫秒)
var Space_1 = 20; //每次移动(px)
var PageWidth_1 = 107 * 6; //翻页宽度
var fill_1 = 0; //整体移位
var MoveLock_1 = false;
var MoveTimeObj_1;
var MoveWay_1="right";
var Comp_1 = 0;
var AutoPlayObj_1=null;
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}}
function AutoPlay_1(){clearInterval(AutoPlayObj_1);AutoPlayObj_1=setInterval('ISL_GoDown_1();ISL_StopDown_1();',interval_1)}
function ISL_GoUp_1(){if(MoveLock_1)return;clearInterval(AutoPlayObj_1);MoveLock_1=true;MoveWay_1="left";MoveTimeObj_1=setInterval('ISL_ScrUp_1();',Speed_1);}
function ISL_StopUp_1(){if(MoveWay_1 == "right"){return};clearInterval(MoveTimeObj_1);if((GetObj('ISL_Cont_1').scrollLeft-fill_1)%PageWidth_1!=0){Comp_1=fill_1-(GetObj('ISL_Cont_1').scrollLeft%PageWidth_1);CompScr_1()}else{MoveLock_1=false}
AutoPlay_1()}
function ISL_ScrUp_1(){if(GetObj('ISL_Cont_1').scrollLeft<=0){GetObj('ISL_Cont_1').scrollLeft=GetObj('ISL_Cont_1').scrollLeft+GetObj('List1_1').offsetWidth}
GetObj('ISL_Cont_1').scrollLeft-=Space_1}
function ISL_GoDown_1(){clearInterval(MoveTimeObj_1);if(MoveLock_1)return;clearInterval(AutoPlayObj_1);MoveLock_1=true;MoveWay_1="right";ISL_ScrDown_1();MoveTimeObj_1=setInterval('ISL_ScrDown_1()',Speed_1)}
function ISL_StopDown_1(){if(MoveWay_1 == "left"){return};clearInterval(MoveTimeObj_1);if(GetObj('ISL_Cont_1').scrollLeft%PageWidth_1-(fill_1>=0?fill_1:fill_1+1)!=0){Comp_1=PageWidth_1-GetObj('ISL_Cont_1').scrollLeft%PageWidth_1+fill_1;CompScr_1()}else{MoveLock_1=false}
AutoPlay_1()}
function ISL_ScrDown_1(){if(GetObj('ISL_Cont_1').scrollLeft>=GetObj('List1_1').scrollWidth){GetObj('ISL_Cont_1').scrollLeft=GetObj('ISL_Cont_1').scrollLeft-GetObj('List1_1').scrollWidth}
GetObj('ISL_Cont_1').scrollLeft+=Space_1}
function CompScr_1(){if(Comp_1==0){MoveLock_1=false;return}
var num,TempSpeed=Speed_1,TempSpace=Space_1;if(Math.abs(Comp_1)<PageWidth_1/2){TempSpace=Math.round(Math.abs(Comp_1/Space_1));if(TempSpace<1){TempSpace=1}}
if(Comp_1<0){if(Comp_1<-TempSpace){Comp_1+=TempSpace;num=TempSpace}else{num=-Comp_1;Comp_1=0}
GetObj('ISL_Cont_1').scrollLeft-=num;setTimeout('CompScr_1()',TempSpeed)}else{if(Comp_1>TempSpace){Comp_1-=TempSpace;num=TempSpace}else{num=Comp_1;Comp_1=0}
GetObj('ISL_Cont_1').scrollLeft+=num;setTimeout('CompScr_1()',TempSpeed)}}
function picrun_ini(){
GetObj("List1_1").innerHTML=GetObj("List1_1").innerHTML;
GetObj('ISL_Cont_1').scrollLeft=fill_1>=0?fill_1:GetObj('List1_1').scrollWidth-Math.abs(fill_1);
GetObj("ISL_Cont_1").onmouseover=function(){clearInterval(AutoPlayObj_1)}
GetObj("ISL_Cont_1").onmouseout=function(){AutoPlay_1()}
AutoPlay_1();
}
</script>

<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/deal.css" />
	<div id="deal-default" class="clearfix">
		<div id="deal-intro" style="border:none;">
			<p class="pos">
				<a href="/">首页</a> > <a href="<?php echo UU('loan/index/lists');?>">投资列表</a> > 借款详情
			</p>
		</div>
		<div id="deal-intro" class="clearfix cf">
			<div class="tl">
				<div class="lf">
					<img src="/tpl/simplebootx/Public/images/<?php if(($deal["warrant"]) == "0"): ?>dan0.png<?php else: ?>dan1.png<?php endif; ?>" width="24" height="24" />
					<span><?php echo ($deal["cat_name"]); ?></span>
					<!--<a href="<?php echo ($deal["url"]); ?>"><?php echo ($deal["name"]); ?></a>-->
				</div>
				<!--<div class="rt detail_number"><a href="<?php echo UU('Portal/Article/index',array('id'=>24));?>" class="f_blue" onclick="javascript:window.showModalDialog('{url x="index" r="tool#contact" p="win=1"}','','dialogWidth=1024px;dialogHeight=768px,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top=20,left=20,resizable=no')" >借款协议(范本)</a></div>-->
			</div>
			<div class="bd">
				<div class="bd_lf">
					<table class="bd_1" width="100%" border="0" cellpadding="18" cellspacing="1">
						<tbody>
							<tr>
								<th>借款金额(元)</th>
								<th>年利率</th>
								<th>还款期限(月)</th>
								<th>风险等级</th>
							</tr>
							<tr>
								<td><?php echo ($deal["borrow_amount_format"]); ?></td>
								<td><?php echo ($deal["rate_foramt_w"]); ?></td>
								<td><?php echo ($deal["repay_time"]); ?>个月</td>
								<td><?php if($deal["risk_rank"] == 0): ?>低<?php elseif($deal["rish_rank"] == 1): ?>中<?php elseif($deal["rish_rank"] == 2): ?>高<?php endif; ?></td>
							</tr>
						</tbody>
					</table>
					<div class="bd_2">
						<div class="lf">
							<ul class="bd_2_lf">
								<li>还款方式：<span><?php echo ($deal["repay_type_name"]); ?></span></li>
								<li>剩余时间：<span><?php echo ($deal["remain_time_format"]); ?></span></li>
								<li>

                                    到期利息：<span class="f_red"><?php echo ($deal["rate_money_format"]); ?></span>

								</li>
							</ul>
							<ul class="bd_2_rt">
								<li>借款用途：<span><?php echo ($deal["t_name"]); ?></li>
								<li>担保范围：<span><?php if($deal["warrant"] == 1): ?>本金<?php elseif($deal["warrant"] == 2): ?>本金及利息<?php else: ?>无<?php endif; ?></span></li>
								<li>

										到期需还本金：<span class="f_red"><?php echo ($deal["borrow_amount_format"]); ?></span>


								</li>
							</ul>
						</div>
						<div class="rt">
							<div class="f_l" style="width:183px;">
                                <?php if($deal["deal_status"] == 0): ?><img src=" /tpl/simplebootx/Public/images/not_publish.png" alt="" width="134px" height="128px">
                                    <?php elseif(($deal["deal_status"] == 1) and ($deal["is_wait"] == 1)): ?>
                                    <img src="/tpl/simplebootx/Public/images/wait_load.png" alt="" width="113px" height="34px">
                                <?php elseif($deal["deal_status"] == 1): ?>
                                    <img src="/tpl/simplebootx/Public/images/load.png" alt="" style="cursor: pointer" onclick="javascript:window.location.href='<?php echo UU("Loan/index/bid",array('loan_id'=>$deal['id']));?>'" width="183px" height="66px">
                                    <?php elseif(($deal["deal_status"] == 3)or($deal["deal_status"] == 2)or($deal["deal_status"] == 6)): ?>
                                    <img src="/tpl/simplebootx/Public/images/loan_writeM.png" alt="" width="134px" height="128px">
                                    <?php elseif(($deal["deal_status"] == 4)): ?>
                                    <img src="/tpl/simplebootx/Public/images/load_fail.png" alt="" width="134px" height="128px">
                                <?php elseif($deal["deal_status"] == 5): ?>
                                    <img src="/tpl/simplebootx/Public/images/load_full.png" alt="" width="134px" height="128px">
                                 <?php elseif(($deal["deal_status"] == 7)or($deal["deal_status"] == 8)): ?>
                                    <img src="/tpl/simplebootx/Public/images/load_in_progress.png" alt="" width="134px" height="128px">
                                <?php elseif($deal["deal_status"] == 9): ?>
                                    <img src="/tpl/simplebootx/Public/images/load_done.png" alt="" width="134px" height="128px"><?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="bd_rt">
					<div class="u_hd tc">
						借款人档案
					</div>
					<!--<div class="user_face tc clearfix" style="display:block;height:80px;">
                        <?php if(empty($$dusers["avatar"])): ?><img src="/tpl/simplebootx/Public/images/noavatar_middle.gif" alt=""/>
                            <?php else: ?>
                            <img src="<?php echo sp_get_user_avatar_url($dusers['avatar']);?>" alt=""/><?php endif; ?>
					</div>-->
					<div class="u_name tc clearfix" style="display:block;height:20px">
						<a href="">  <?php echo ($dusers["user_login"]); ?>   </a>
                        
					</div>

					<div class="row addr"><span style="padding-right: 0;">所 在 地：</span><?php echo ($dusers["location"]); ?></div>
					<div class="row addr"><span style="padding-right: 0;">借款笔数：</span><?php echo ($user_statics["deal_count"]); ?></div>
                    <div class="row addr"><span style="padding-right: 0;">借款笔数：</span><?php echo ($user_statics["repay_deal_count"]); ?></div>
                    <div class="row addr"><span style="padding-right: 0;">逾期次数：</span><?php echo ($user_statics["yuqi_count"]); ?></div>
                    <div class="row addr"><span style="padding-right: 0;">职业状态：</span><?php echo ($dusers["jobtype"]); ?></div>
					<!--<div class="row level" title="<?php echo ($u_info["point_level"]); ?>"><span>信用等级：</span><a href=""><img alt="等级" src="<?php echo (get_user_level($dusers["score"])); ?>" width="16" height="16"></a></div>-->

					<div class="attent">
						<ul>

							<!-- <li class="u_icons reportGuy J_reportGuy" id="J_reportGuy_<?php echo ($deal["user_id"]); ?>" dataid="<?php echo ($deal["user_id"]); ?>">
								<a href="###">举报此人</a> 
							</li> -->
							<!--<li class="u_icons send_msg J_send_msg" dataid="<?php echo ($deal["user_id"]); ?>">
								<a href="###">发送信息</a>
							</li>-->
						</ul>
					</div>

				</div>
				<div class="bd_bottom">

                    <?php if($deal["deal_status"] == 9): ?><span class="f_l">还款进度：</span>
                        <div class="blueProgressBar progressBar f_l" style="border:1px solid #D13030; background:#FFC4C5">
                            <div class="p">
                                <div class="c" style="width: 100%;background:url('/tpl/simplebootx/Public/images/progressBarBg2.png') repeat-x"></div>
                            </div>
                        </div>
                    <?php elseif($deal["deal_status"] > 5): ?>
                        <span class="f_l">还款进度：</span>
                        <div class="blueProgressBar progressBar f_l" style="border:1px solid #FDECC7; background:#FFF6E5">
                            <div class="p">
                                <div class="c" style="width: <?php echo (round($deal["repay_progress_point"],"3")); ?>%;background:url('/tpl/simplebootx/Public/images/progressBarBg2.png') repeat-x"></div>
                            </div>
                        </div>

                        <div class="f_l" style="width: 170px; padding-left:30px">
                            已还本息：<span class="f_red"><?php echo (format_price($deal["repay_money"])); ?>元</span>
                        </div>
                        <div class="f_l" style="width: 160px; ">
                            待还本息：<span class="f_red"><?php echo (format_price($deal["need_remain_repay_money"])); ?>元</span>
                        </div>
                    <?php else: ?>
                        <span style="float:left">投标进度：</span>
                        <div class="blueProgressBar progressBar f_l">
                            <div class="p">
                                <div class="c" style="width:<?php echo ($deal["progress_point"]); ?>%;"></div>
                            </div>
                        </div>
                        <div class="f_l">
                        <span class="f_red">&nbsp;&nbsp;
                        	<?php echo (round($deal["progress_point"],"2")); ?>%
                       	</span>
                            <span class="f_red"><?php echo ($deal["buy_count"]); ?></span>投标，还需 <span class="f_red"><?php echo ($deal["need_money"]); ?></span>
                        </div><?php endif; ?>


                        <div class="item f_r" style="width:auto" id="addFav">
                            <?php if($is_faved): ?>已关注
                            <?php else: ?>
                            <a href="<?php echo U('user/favorite/do_favorite');?>" class="J_favorite_btn f_red" id="addFavLink"  data-title="<?php echo ($deal["name"]); ?>" data-url="<?php echo ($deal["url"]); ?>" data-key="<?php echo sp_get_favorite_key('loan',$deal['id']);?>">关注此标</a><?php endif; ?>
                        </div>




				</div>
			</div>
		</div>
		<div class="blank"></div>
		<div class="blank"></div>
		<div class="desc_inf wrap clearfix">
	        <div class="list_title clearfix" id="J_deal_tab_select">
	            <ul>
	                <li class="list1 right_tab_select" style="cursor:pointer;" rel="1">借入者信用信息</li>

                    <?php if($deal["deal_status"] >= 7): ?><li class="list1" style="cursor:pointer;" rel="2">还款详情</li>
					<li class="list1" style="cursor:pointer;" rel="3">债权人信息</li><?php endif; ?>
					<li class="list1" style="cursor:pointer;" rel="4">投标记录</li>
				
	            </ul>
	        </div>
			<div class="cont clearfix" id="J_deal_tab_box">
				<div class="box_view box_view_1">
					<p class="b" style="margin-bottom:10px">用户信息</p>
<?php if(!sp_is_user_login()): ?><p align="center">只有<a href="<?php echo UU('user/register/index');?>">注册</a>用户才可以查看借入者信用信息！现在<a href="<?php echo UU('user/login/index');?>">登录</a></p>

    <?php else: ?>

	<div class="clearfix" style="border-bottom:1px solid #e3e3e3; padding:0 0 30px 90px;">

    <div class="clearfix_list">
        <?php if(($$dusers["sex"]) > "0"): ?><p class="f_l">
            性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<span>

            <?php if(($$dusers["sex"]) == "1"): ?>男<?php else: ?>女<?php endif; ?>
            </span>
        </p><?php endif; ?>
        <p class="f_l">
            年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span>

                <?php echo date("Y",time())-$dusers['born'];?>
        </span>
        </p>
        <p class="f_l">
        民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族：<span>
            <?php echo ($dusers["national"]); ?>
        </span>
      </p>
        <p class="f_l">
            是否结婚：<span><?php echo ($dusers["marriage"]); ?></span>
        </p>
        <p class="f_l">
		工作城市：<span><?php echo ($dusers["work_city"]); ?>
            </span>
        </p>
    </div>
    <div class="clearfix_list">
		<p class="f_l">
		公司行业：<span>
            <?php echo ($dusers["officedomain"]); ?>
           </span>
     	</p>

		<!--<p class="f_l">
		公司名称：<span><?php echo ($dusers["office"]); ?></span>
     	</p>-->

     	<p class="f_l">
		公司规模：<span>
            <?php echo ($dusers["officecale"]); ?>人</span>
      	</p>
        <p class="f_l">
            职业状态：<span>
            <?php echo ($dusers["jobtype"]); ?>
        </span>
        </p>

        <p class="f_l">
		 职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位：<span>
            <?php echo ($dusers["position"]); ?>
        </span>
        </p>

         <p class="f_l">
        工作年限：<span><?php echo ($dusers["workyears"]); ?></span>
        </p>
        <p class="f_l">
		工作收入：<span>
            <?php echo ($dusers["salary"]); ?>
            </span>
        </p>
    </div>

    <div class="clearfix_list">
		<!--
        <p class="f_l">
         学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span>
            <?php echo ($dusers["education"]); ?>
        </span>
        </p>
         <p class="f_l">
        毕业院校：<span><?php echo ($dusers["university"]); ?></span>
        </p>
		-->
    </div>

    <div class="clearfix_list">
        <p class="f_l">
		 有无购房：<span>
            <?php if(($dusers["housing"]) == "1"): ?>有<?php else: ?>无<?php endif; ?></span>
		</p>
        <p class="f_l">
		有无购车：<?php if(($dusers["buy_cars"]) == "1"): ?>有<?php else: ?>无<?php endif; ?></span> </p>
        <!--<p class="f_l">
            有无房贷：<span>?</span>
        </p>
        <p class="f_l">
            有无车贷：<span>?</span>
        </p>-->
    </div>

</div>
<p class="b" style="margin:30px 0 10px 0;">
    <?php echo (C("SITE_NAME")); ?>借款记录
</p>
<div class="clearfix" style="border-bottom:1px solid #e3e3e3;">
    <div style="padding-left:90px;">
        <div class="clearfix_list">
            <p class="f_l">
                借款笔数：<span><?php echo ($user_statics["deal_count"]); ?></span>
            </p>
            <p class="f_l">
                成功笔数：<span><?php echo ($user_statics["success_deal_count"]); ?></span>
            </p>
            <p class="f_l">
                还清笔数：<span><?php echo ($user_statics["repay_deal_count"]); ?></span>
            </p>
            <p class="f_l">
                共计借入：<span><?php echo (format_price($user_statics["borrow_amount"])); ?></span>
            </p>
        </div>
        <div class="clearfix_list">
            <p class="f_l">
                逾期次数：<span><?php echo ($user_statics["yuqi_count"]); ?></span>
            </p>
            <p class="f_l">
                严重逾期：<span><?php echo ($user_statics["yz_yuqi_count"]); ?></span>
            </p>
            <p class="f_l">
                逾期金额：<span><?php echo (format_price($user_statics["yuqi_amount"])); ?></span>
            </p>
            <p class="f_l">
                待还本息：<span><?php echo (format_price($user_statics["need_repay_amount"])); ?></span>
            </p>
        </div>
        <div class="clearfix_list">
            <p class="f_l">
                共计借出：<span><?php echo (format_price($user_statics["load_money"])); ?></span>
            </p>
            <p class="f_l">
                待收本息：<span><?php echo (format_price($user_statics["load_wait_repay_money"])); ?></span>
            </p>
        </div>
    </div>
    <div class="prompt" style="padding:30px 0; text-align:center;">
         <i></i>以下基本信息资料，经用户同意披露。为通过网站审核之项目。
    </div>
</div><?php endif; ?>
<script type="text/javascript">
$(function(){
    $(".clearfix_list").find("p:last").css("paddingRight","0");
})
</script>
					
<p class="b" style="margin-top:30px;">风险把控</p>
<div class="clearfix" style="border-bottom:1px solid #e3e3e3; padding:30px 90px;">
    <table class="data_table" border="0" cellspacing="1" style="background:#e3e3e3;width:100%;">
        <tbody>
            <tr style="background:#00bef0; color:#fff; height:40px;">
                <th width="40%" class="tc">
                	审核项目
                </th>
                <th width="40%" class="tc">
    				状态
                </th>
                <th width="20%" class="tc">
                    查看
                </th>
            </tr>
            <?php $userdata=unserialize($deal['userdata']); ?>
            <?php if($deal["agency_id"] > 0): ?><tr style="height: 40px;" class="wb">
                    <td class="tc pl5 pr5">
                        <?php echo ($deal["agency_name"]); ?>
                    </td>
                    <td class="tc pl5 pr5">
                        <img src="/tpl/simplebootx/Public/images/answer_success.jpg" alt="通过">
                    </td>
                    <td class="tc pl5 pr5">
                        <a target="_blank" href="<?php echo UU('portal/agency/index',array('id'=>$deal['agency_id']));?>">点击查看</a>
                    </td>
                </tr><?php endif; ?>

            <?php if(is_array($userdata)): foreach($userdata as $key=>$userdatavo): ?><tr style="height: 40px;" class="wb">
                    <td class="tc pl5 pr5">
                       <?php echo ($userdata[$key]); ?>
                    </td>
                    <td class="tc pl5 pr5">
                        <img src="/tpl/simplebootx/Public/images/answer_success.jpg" alt="通过">
                    </td>
                    <td class="tc pl5 pr5">
                    <?php if(!sp_is_user_login()): ?>登录后查看 
                    <?php else: ?>
                       <a class="J_do_transfer" href="<?php echo UU('user/Audit/seeauth',array('uid'=>$deal['user_id'],'mid'=>$key));?>">点击查看</a><?php endif; ?>
                     
                    </td>
                </tr><?php endforeach; endif; ?>



        </tbody>
    </table>
    <div class="prompt" style="padding: 10px 0 10px 54px; text-align:left;">
        <p style="line-height:30px;">
            <i style="margin-top:13px;"></i>将以客观、公正的原则，最大程度地核实借入者信息的真实性。但<?php echo (C("SITE_NAME")); ?> 不保证审核信息100%真实。
        </p>
        <p style="line-height:30px;">
            <i style="margin-top:13px;"></i>借入者若长期逾期，其个人信息将被公布
        </p>
    </div>
</div>

<script>
    $(function(){
        $(".J_do_transfer").click(function(){
            var url=$(this).attr("href");
            $.ajax({
                url:url,
                data:'',
                dataType:"text",
                success:function(result){
                    $.weeboxs.open(result, {boxid:"do-tras-box",contentType:'text',showButton:false, title:'详情',type:'wee',width:800});
                },
                error:function(){
                    $.showErr("请求数据失败");
                }
            });

            return false;
        });
    });


</script>
					<p class="b" style="margin:30px 0 10px 0;">借款描述</p>
					<div class="clearfix" style="border-bottom:1px solid #e3e3e3; padding:0 0 20px 90px;">
						<span><?php echo ($deal["description"]); ?></span>
					</div>
					<p class="b" style="margin:30px 0 10px 0;">风控保障</p>
					<?php if(!empty($list)){?>
					<div class="clearfix" style=" padding:0 0 20px 90px;">
						<center>
  <div class="blk_18"> <a class="LeftBotton" onmousedown="ISL_GoUp_1()" onmouseup="ISL_StopUp_1()" onmouseout="ISL_StopUp_1()" href="javascript:void(0);" target="_self"></a>
    <div class="pcont" id="ISL_Cont_1">
      <div class="ScrCont">
        <div id="List1_1">
          <ul class="tupian " style="list-style:none; float:left; padding-top:21px; padding-left:0px; ">
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li style="float:left; "> <a class="fancybox" data-fancybox-group="gallery"  href="/tpl/simplebootx/Public/user_img_info/<?php echo ($vo["uid"]); ?>/<?php echo ($vo["images_name"]); ?>"> <img src="/tpl/simplebootx/Public/user_img_info/<?php echo ($vo["uid"]); ?>/<?php echo ($vo["images_name"]); ?>" style="height:150xp; width:150px;"> </a></li><?php endforeach; endif; ?>
            <!--<li style="float:left;  margin-left:26px;"> <a class="fancybox"    href="/tpl/simplebootx/Public/images/img_b.jpg"> <img src="/tpl/simplebootx/Public/images/img_b.jpg"  style="height:150xp; width:150px;" > </a><div class="yin"></div> </li>
            <li style="float:left;   margin-left:26px;"> <a class="fancybox" data-fancybox-group="Buttion"   href="/tpl/simplebootx/Public/images/img_c.jpg"> <img src="/tpl/simplebootx/Public/images/img_c.jpg" style="height:150xp; width:150px;" > </a><div class="yin"></div> </li>
            <li style="float:left;   margin-left:26px;"> <a class="fancybox" data-fancybox-group="gallery"   href="/tpl/simplebootx/Public/images/img_d.jpg"> <img src="/tpl/simplebootx/Public/images/img_d.jpg" style="height:150xp; width:150px;"> </a><div class="yin"></div> </li>
			<li style="float:left;   margin-left:26px;"> <a class="fancybox" data-fancybox-group="gallery"   href="/tpl/simplebootx/Public/images/img_d.jpg"> <img src="/tpl/simplebootx/Public/images/img_d.jpg" style="height:150xp; width:150px;"> </a><div class="yin"></div></li>-->
          </ul>
        </div>
      </div>
	 
    </div>
	
    <a class="RightBotton" onmousedown="ISL_GoDown_1()" onmouseup="ISL_StopDown_1()" onmouseout="ISL_StopDown_1()" href="javascript:void(0);" target="_self"></a> </div>
  <script type="text/javascript">
        <!--
        picrun_ini()
        //-->
        </script>
</center>
					</div>
					<?php }else{?>
					<p>暂无数据...</p>
					<?php }?>
					<hr/>
					<!-----
<p class="b" style="margin:30px 0 10px 0;">留言板</p>
<div class="clearfix" style="padding:0 90px 0 90px;">
	<div class="inc_top"><?php echo ($post_title); ?></div>
	<div class="inc_main">		
	<form method="post" id="consult-add-form" action="{url x="index" r="msg#add"}"  onsubmit="return check_content(this);" name="message">
		<div>
            <?php if(sp_is_user_login()): ?><textarea name="content" rows="5" cols="60" class="f-textarea" style="width:100%"></textarea>
				<div class="blank"></div>
				
				<p class="commit" style="float:right;">
					<input type="hidden" value="1" name="ajax" />
					<input type="hidden" value="<?php echo ($rel_table); ?>" name="rel_table">
					<input type="hidden" value="<?php echo ($rel_id); ?>" name="rel_id">
					<input type="submit" class="sub_btn f_r" name="commit" value="好了,提交">

					<?php if(C("sys_comments_code")== 1): ?><div class="commit  f_r">
						<div class="verify_row">
						<input type="text" value="" class="f-input f-input60" style="width:45px" name="verify" />
                         <?php echo sp_verifycode_img('code_len=4&font_size=15&width=120','title="点击获取"');?>
						</div>
					</div><?php endif; ?>
				</p>
			<?php else: ?>
                <p align="center">只有<a href="<?php echo UU('user/register/index');?>">注册</a>用户才可以留言！现在<a href="<?php echo UU('user/login/index');?>">登录</a></p><?php endif; ?>
		</div>
						
	</form>
	</div>
	<div class="inc_foot"></div>
</div>

<div class="blank"></div>

<div class="clearfix" style="padding:0 90px 20px 90px;">
	<div class="inc_main">		
		
		<div  class="message-list">
            <ul>
                {foreach from=$message_list item=message_item key=key}
                <li class="message-row" id="thread_<?php echo ($message_item["id"]); ?>" name="thread_<?php echo ($message_item["id"]); ?>" style="position:relative;">
                    <table class="msg_row">
                        <tr>
                            <td style="width:75px; text-align:left; margin-right:5px;">
                                <div class="avatar_middle">
                                    {function name="show_avatar" uid=$message_item.user_id  type="middle" }
                                </div>
                            </td>
                            <td>
                                <div class="item" style="border:1px solid #e3e3e3; overflow:hidden; padding:20px; -moz-border-radius: 5px;-khtml-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;">
                                    <div class="clearfix">
							<span class="f_l" style="color:#00bef0;">
							{function name="get_user_name" value=$message_item.user_id}
								<span style="font-size:12px; color:#999;">
								<?php echo ($LANG["SUPPLIER_COMMENT_SAY"]); ?>：
								</span>
							</span>
                                        {if $user_auth['msg']['del']}
                                        <div class="f_r">
                                            &nbsp;&nbsp;<a href="javascript:void(0);" onclick="op_msg_del(<?php echo ($message_item["id"]); ?>);">删除</a>
                                        </div>
                                        {/if}
							<span class="f_r f_dgray">
								<i></i>
								{function name='to_date' v='$message_item.create_time'}
							</span>
                                    </div>

                                    <div class="blank1"></div>
                                    <p class="text pl20 pt5 pb5">
                                        {function name="nl2br" value=$message_item.content}
                                    </p>
                                    <div class="subcomment">
                                        {if $message_item.admin_reply neq ''}
                                        <div class="clearfix comment bt1 pt10 pb10">
                                            <div class="avatar_middle f_l" style="width:75px">
                                                <img src="public/avatar/noavatar_middle.gif">
                                            </div>
                                            <div class="subc f_l">
                                                <div class="clearfix">
                                                    <span class="f_l"><a href="###">管理员</a><?php echo ($LANG["SUPPLIER_COMMENT_SAY"]); ?>：</span>
											<span class="f_r f_dgray">
												{function name='to_date' v='$message_item.update_time'}
											</span>
                                                </div>
                                                <div class="pl20 pt5 pb5">
                                                    {function name="nl2br" value=$message_item.admin_reply}
                                                </div>
                                            </div>
                                        </div>
                                        {/if}
                                        {foreach from=$message_item.sub item="sub_message"}
                                        <div class="clearfix comment bt1 pt10 pb10">
                                            <div class="avatar_middle f_l" style="width:75px">
                                                {function name="show_avatar" uid=$sub_message.user_id  type="middle" }
                                            </div>
                                            <div class="subc f_l">
                                                <div class="clearfix">
                                                    <span class="f_l">{function name="get_user_name" value=$sub_message.user_id} <?php echo ($LANG["SUPPLIER_COMMENT_SAY"]); ?>：</span>
										<span class="f_r f_dgray">
											<i></i>
											{function name='to_date' v='$sub_message.create_time'}
										</span>
                                                </div>
                                                <div class="pl20 pt5 pb5">
                                                    {function name="nl2br" value=$sub_message.content}
                                                </div>
                                            </div>
                                        </div>
                                        {/foreach}
                                    </div>
                                    {if $deal.user_id eq $user_info.id}
                                    <p style="float:right;"><a href="###" dealid="<?php echo ($deal["id"]); ?>" dataid="<?php echo ($message_item["id"]); ?>" class="J_comment_reply" style="background-color:#51c2e8; color:#fff; display:block; height:40px; line-height:40px; text-align:center; width:85px; -moz-border-radius: 5px;-khtml-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;">回复</a></p>
                                    {/if}
                                </div>
                            </td>
                        </tr>
                    </table>
                    <i style="background:url(<?php echo ($TMPL); ?>/images/liuyan_icon.gif) no-repeat; display:block; height:18px; left:75px; position:absolute; top:34px; width:8px;"></i>
                </li>
                {/foreach}
            </ul>

            <div class="blank"></div>
            <div class="pages"><?php echo ($pages); ?></div>
        </div>
	</div>
	<div class="inc_foot"></div>
</div>
----->
				</div>
				<?php if($deal["deal_status"] >= 7): ?><div class="box_view box_view_2 hide">
                    <?php if(sp_is_user_login()): ?><div class="clearfix">
        <table class="data_table" id="refundTab" border="0" cellspacing="1" style="background:#e3e3e3; width:100%; margin:0 auto;">
            <tr>
                <th width="10%">编号</th>
                <th width="12%">还款日期</th>
                <th width="12%">已还本息</th>
                <th width="12%">待还本息</th>
                <th width="12%">已付罚息</th>
                <th width="12%">待还罚息</th>
                <th width="12%">状态</th>
            </tr>
            <?php $idx=1;?>
            <?php if(is_array($loan_repay_list)): foreach($loan_repay_list as $key=>$loan): ?><tr>
                    <td width="10%">
                        <?php echo $idx;++$idx;?>
                    </td>
                    <td width="12%"><?php echo ($loan["repay_day_format"]); ?></td>
                    <td width="12%" style="color:red"><?php echo ($loan["month_has_repay_money_all_format"]); ?></td>
                    <td width="12%" style="color:red"><?php if($loan["has_repay"] == 0): echo ($loan["month_need_all_repay_money_format"]); else: ?>0.0<?php endif; ?></td>
                    <td width="12%" style="color:red"><?php if($loan["has_repay"] == 0): echo ($loan["impose_money_format"]); else: ?>0.0<?php endif; ?></td>
                    <td width="12%" style="color:red"><?php if($loan["has_repay"] == 0): echo ($loan["impose_money_format"]); else: ?>0.0<?php endif; ?></td>
                    <td width="12%">
                        <?php if($loan["has_repay"] == 1): if($loan["status"] == 0): ?><span style="color:#f7634f">未偿还</span>
                                <?php elseif($loan["status"] == 1): ?>
                                <span style="color:#83a700">提前还款</span>
                                <?php elseif($loan["status"] == 2): ?>
                                <span style="color:#00bef0">已偿还</span>
                                <?php elseif($loan["status"] == 3): ?>
                                <span style="color:#ffaa00">逾期还款</span>
                                <?php elseif($loan["status"] == 4): ?>
                                <span style="color:#c82e25">严重逾期</span><?php endif; ?>
                            <?php else: ?>
                            <span style="color:#f7634f">未偿还</span><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
<?php else: ?>
    <p align="center">只有<a href="<?php echo UU('user/register/index');?>">注册</a>用户才可以查看借入者信用信息！现在<a href="<?php echo UU('user/login/index');?>">登录</a></p><?php endif; ?>







                    </div>
                    <div class="box_view box_view_3 hide">
                    <?php if(sp_is_user_login()): ?><div class="clearfix">
        <table class="data_table" border="0" cellspacing="1" style="background:#e3e3e3; margin:0 auto; width:100%;">
            <tbody>
            <tr>
                <th width="10%">编号</th>
                <th width="25%">债权人昵称</th>
                <th width="25%">剩余本金</th>
                <th width="25%">出借时间</th>
                <th>状态</th>
            </tr>
            <?php $idx=1;?>
            <?php if(is_array($loan_load)): foreach($loan_load as $key=>$load): ?><tr>
                <td>   <?php echo $idx;++$idx;?></td>
                <td>
                    <span style="color:#00bef0">
                        	<?php echo (utf_substr($load["user_login"])); ?>
                    </span>
                </td>
                <td>
                    <span style="color:#f7634f">
                        <?php echo (format_price($load["remain_money"])); ?>
                    </span>
                </td>
                <td>
                    <?php echo (date("Y-m-d",$load["create_time"])); ?>
                </td>
                <td>
                    <?php if($load["status"] == 1): ?><span style="color:#00bef0">还款完毕</span>
                   <?php else: ?>
                    <span style="color:#f7634f">还款中</span><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <p align="center">只有<a href="<?php echo UU('user/register/index');?>">注册</a>用户才可以查看借入者信用信息！现在<a href="<?php echo UU('user/login/index');?>">登录</a></p><?php endif; ?>
                    </div><?php endif; ?>
				 <div class="box_view box_view_4 hide">
	               <div class="clearfix">
	  <table class="data_table" id="refundTab" border="0" cellspacing="1" style="background:#e3e3e3; width:100%; margin:0 auto;">
	    <tbody>
	        <tr style="height: 30px;">
	            <th width="20%">投标人</th>
	            <th width="20%">投标金额</th>
				<th width="10%">状态</th>
	            <th width="20%">投标时间</th>
	        </tr>

			<?php if(is_array($loan_load)): foreach($loan_load as $key=>$load): ?><tr>
				<td class="wb tc" style="color:#E47F2B;">
					<?php echo (utf_substr($load["user_login"])); ?>
				</td>
				<td class="wb tc f_red">
					<?php echo (format_price($load["money"])); ?>
				</td>
				<td class="wb tc">
					<?php if($load["is_auto"] == 1): ?>自动<?php else: ?>手动<?php endif; ?>
				</td>
				<td class="wb tc">
                    <?php echo (date("Y-m-d H:i",$load["create_time"])); ?>
				</td>
			</tr><?php endforeach; endif; ?>
	    </tbody>
	</table>
</div>



		        </div>
				
			</div>
		</div>
	</div>
<script type='text/javascript'>

	function fav_result(o)
	{
		$(o).html("已关注");
		$(o).addClass("f_red");
		$(o).attr("click","");
	}
	jQuery(function(){
		$("#J_deal_tab_select li").click(function(){

			$("#J_deal_tab_select li").removeClass("right_tab_select");
			$("#J_deal_tab_select li").addClass("right_tab_unselect");
			$(this).removeClass("right_tab_unselect");
			$(this).addClass("right_tab_select");
			$("#J_deal_tab_box .box_view").addClass("hide");
			$("#J_deal_tab_box .box_view_"+$(this).attr("rel")).removeClass("hide");
		});

        $('.J_favorite_btn').click(function (e) {

            e.preventDefault();
            var $this = $(this),
                    href = $this.attr('href'),
                    url = $this.attr("data-url"),
                    key = $this.attr("data-key"),
                    title = $this.attr("data-title"),
                    description = $this.attr("data-description");

            $.post(href,{url:url,key:key,title:title,description:description},function(data){

                if (data.state === 'success') {

                    if(data.info){
                        alert(data.info);
                        location.reload();
                    }


                } else if (data.state === 'fail') {
                    if(data.info){
                        alert(data.info);
                    }
                }


            },"json");

        });
	});







</script>
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