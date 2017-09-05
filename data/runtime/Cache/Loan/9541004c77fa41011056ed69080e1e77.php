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



<link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/transfer.css" />
	<div id="deal-default" class="clearfix">
		<div style="width:1100px;">
		<p class="pos">
			<a href="">首页</a> > <a href="<?php echo UU('loan/index/transfer');?>">债权列表</a> > 债权详情
		</p>
		<div id="deal-intro" class="clearfix cf">
			<div class="detail ">
				<div class="cont clearfix">
					<div class="cont_l f_l">
						<div class="detail_title_bg">
							<div class="detail_title">
								<?php echo ($deal["name"]); ?>
								<span class="f12" style="font-weight:normal;">&nbsp;&nbsp;转让者：<a href="<?php echo ($transfer["user"]["url"]); ?>"><?php echo ($transfer["user_name"]); ?></a></span>
							</div>
						</div>
						<div class="blank1"></div>
						<div class="clearfix items items_big items_no">
							<div class="item f_l">
								<div class="lt">
									剩余期限：
								</div>
								<div class="lb">
									<b class="f_red f14"><?php echo ($transfer["how_much_month"]); ?></b>期
								</div>
							</div>
							<div class="item f_l">
								<div class="lt">
									总还款期限：
								</div>
								<div class="lb">
									<b class="f_red f14"><?php echo ($transfer["repay_nper"]); ?></b>期
								</div>
							</div>
							
						</div>
						<div class="clearfix items items_big">
							<div class="item f_l">
								<div class="lt">
									下个还款日：
								</div>
								<div class="lb">
									<?php echo ($transfer["next_repay_time_format"]); ?>
								</div>
							</div>
							<div class="item f_l">
								<div class="lt">
									转让金额：
								</div>
								<div class="lb">
									<span class="f_red">
										<?php echo ($transfer["transfer_amount_format"]); ?>
									</span>
								</div>
							</div>
							
						</div>
						<div class="clearfix items items_big">
							<div class="item f_l">
								<div class="lt">
									剩余本金：
								</div>
								<div class="lb">
									<span class="f_red"><?php echo ($transfer["left_benjin_format"]); ?></span>
								</div>
							</div>
							<div class="item f_l">
								<div class="lt">
									剩余利息：
								</div>
								<div class="lb">
									<span class="f_red">
										<?php echo ($transfer["left_lixi_format"]); ?>
									</span>
								</div>
							</div>
							
						</div>
						<div class="cont_t clearfix">
							原始标转让详情
						</div>
						<div class="clearfix items ">
							<div class="f_l item">
								<div class="lt">借款用户：</div>
								<div class="lb">
	                            	<a href="<?php echo ($u_info["url"]); ?>"><?php echo ($deal["user_login"]); ?></a>
								</div>
							</div>
                            <div class="f_l item">
                            	<div class="lt">标的类型：</div>
								<div class="lb">
									<?php echo ($deal["cat_name"]); ?>
								</div>
                            </div>
						</div>
						<div class="clearfix items">
							<div class="item f_l">
								<div class="lt">
									借款年利率：
								</div>
								<div class="lb">
									<span class="f_red"><?php echo ($deal["rate_foramt_w"]); ?></span>
								</div>
							</div>
							<div class="item f_l">
								<div class="lt">
									借款期限：
								</div>
								<div class="lb">
									<?php echo ($deal["repay_time"]); ?>个月
								</div>
							</div>
						</div>
						<div class="clearfix items">
							<div class="item f_l">
								<div class="lt">
									借款用途：
								</div>
								<div class="lb">
									<?php echo ($deal["t_name"]); ?>
								</div>
							</div>
							<div class="item f_l">
								<div class="lt">
									风险等级：
								</div>
								<div class="lb">
									<span class="f_green">
										<?php if($deal["rish_rank"] == 0): ?>低
										<?php elseif($deal["rish_rank"] == 1): ?>
										中
										<?php elseif($deal["rish_rank"] == 2): ?>
										高<?php endif; ?>
									</span>
								</div>
							</div>
							
						</div>
						<div class="items clearfix ">
							<div class="item f_l">
								<div class="lt">
									担保范围：
								</div>
								<div class="lb">
									 <?php if($deal["warrant"] == 1): ?>本金<?php elseif($deal["warrant"] == 2): ?>本金及利息<?php else: ?>无<?php endif; ?>
								</div>
							</div>
							<div class="item f_l">
								<div class="lt">
									还款周期：
								</div>
								<div class="lb">
									<?php echo ($deal["repay_type_name"]); ?>
								</div>
							</div>
						</div>
						<div class="items clearfix  pb5 ">
							
							<div class="item f_l">
								<div class="lt">
									提前还款费率：
								</div>
								<div class="lb">
									<span class="f_red"><?php echo (C("sys_advance_repay")); ?>%</span>
								</div>
							</div>
							<div class="item f_l">
								<div class="lt">
                                    逾期情况：
								</div>
								<div class="lb">
									<?php if($deal["yq_count"] > 0): ?>逾期了<?php echo ($deal["yq_count"]); ?>次<?php else: if($transfer["remain_time"] < 0): ?>逾期还款<?php else: ?>未发生逾期<?php endif; endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="cont_r f_r">
						<div class="clearfir tr contact">
							<a href="javascript:void(0);" class="f_blue" onclick="javascript:window.showModalDialog('{url x="index" r="tool#tcontact" p="win=1"}','','dialogWidth=1024px;dialogHeight=768px,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top=20,left=20,resizable=no')" >债权转让及收入协议（范本）</a>
						</div>
						<div class="clearfix">
							<div class="f_l m_info">
								<div class="clearfix pt15">
									剩余本金：<span class="f_red"><?php echo ($transfer["left_benjin_format"]); ?></span>
								</div>
								<div class="clearfix pt15 ">
									剩余利息：<span class="f_red"><?php echo ($transfer["left_lixi_format"]); ?></span>
								</div>
								<div class="clearfix pt15 ">
									转让金额：<span class="f_red"><?php echo ($transfer["transfer_amount_format"]); ?></span>
								</div>
								<div class="clearfix pt15 transmoney">
									受让收益：<span class="f_red"><?php echo ($transfer["transfer_income_format"]); ?></span>
								</div>
							</div>
							<div class="u_money_info f_r">
								<div class="clearfix">
									账户余额 [<a href="<?php echo UU('User/Money/index',array('act'=>'incharge'));?>">充值</a>]
								</div>
								<div class="clearfix">
									<span class="f_red"><?php echo (format_price($can_use_quota)); ?></span>
								</div>
							</div>
						</div>
						<?php if($transfer["t_user_id"] > 0): ?><div class="clearifx tans_user pt15">
                                承接人：<a href="<?php echo ($transfer["tuser"]["url"]); ?>"><?php echo ($transfer["tuser"]); ?></a>
                            </div>
                            <div class="clearifx  pt15">
                                承接时间：<span class="f_red"><?php echo ($transfer["transfer_time_format"]); ?></span>
                            </div>
                            <?php else: ?>
                                <?php if(!empty($user_info)): ?><div class="clearifx tc pt15">
                                        <input type="password" name="bidpaypassword" class="f-input f-input220" id="J_paypassword" placeholder="请输入支付密码" holder="请输入支付密码" <?php if($transfer["status"] == 0): ?>disabled="true"<?php endif; ?> />
                                    </div>
                                    <div class="clearifx tc pt10">
                                        <?php if($transfer["status"] == 0): ?><span class="dtbuy_btn">已撤销转让</span>
                                        <?php else: ?>
                                        <a href="javascript:void(0);" id="J_transferBuy" class="tbuy_btn">购买</a><?php endif; ?>
                                    </div>

                               <?php else: ?>
                                <p align="center " class="p10">
                                    请先<a class="f_blue" href="<?php echo UU('user/Login/index');?>">登录</a>或<a href="<?php echo UU('user/register/index');?>" class="f_blue">注册</a>
                                </p><?php endif; endif; ?>
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
				<?php if($deal["deal_status"] >= 7): ?><li class="list1 right_tab_unselect" style="cursor:pointer;" rel="2">还款详情</li>
				<li class="list1 right_tab_unselect" style="cursor:pointer;" rel="3">债权人信息</li><?php endif; ?>
            </ul>
        </div>
		<div class="cont cont2 p15 pl20 pr20 clearfix" id="J_deal_tab_box">
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
				<p class="b" style="margin-top:20px;">借款描述</p>
				<div class="clearfix" style="border-bottom:1px solid #e3e3e3; padding:0 0 20px 90px;">
					<span><?php echo ($deal["description"]); ?></span>
				</div>
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
		</div>
	</div>
	</div>
	</div>
	<div class="blank"></div>
<script type='text/javascript'>
	jQuery(function(){
		
		$("#J_deal_tab_select li").click(function(){
			$("#J_deal_tab_select li").removeClass("right_tab_select");
			$("#J_deal_tab_select li").addClass("right_tab_unselect");
			$(this).removeClass("right_tab_unselect");
			$(this).addClass("right_tab_select");
			$("#J_deal_tab_box .box_view").addClass("hide");
			$("#J_deal_tab_box .box_view_"+$(this).attr("rel")).removeClass("hide");
		});
		
		$("#J_transferBuy").click(function(){
			var user_id = "<?php echo ($transfer["user_id"]); ?>";//转让的用户
			var tuser_id = "<?php echo ($user_info["id"]); ?>"; //当前登录用户
			var duser_id  = "<?php echo ($deal["user_id"]); ?>";//借款的用户
			var user_money = "<?php echo ($can_use_quota); ?>";

			var transfer_money = "<?php echo ($transfer["transfer_amount"]); ?>";

		/*	if(user_id==tuser_id){
				$.showErr("不能购买自己转让的债权");
				return false;
			}
			if(duser_id==tuser_id){
				$.showErr("不能购买自己的的借贷债权");
				return false;
			}
		*/
			if($.trim($("#J_paypassword").val()) ==""){
				$.showErr("请输入支付密码",function(){
					$("#J_paypassword").focus();
				});
				return false;
			}
            if(user_money<transfer_money){
                $.showErr("帐户余额不足");
                return false;
            }
			var J_paypassword = $("#J_paypassword").val();
			var ajaxurl = "<?php echo UU('loan/index/dotrans',array('id'=>$transfer['id']));?>";
			$.ajax({
				url:ajaxurl,
				data:"&paypassword="+J_paypassword,
				type:"post",
				dataType:"json",
				success:function(result){
					if(result.status==1){
						$.showSuccess(result.info,function(){
							if(result.referer!=""){
								window.location.href=result.referer;
							}
							else{
								window.location.reload();
							}
						});
					}
					else if(result.status==2){
						window.location.href=result.jump;
					}
					else{
                        if(result.referer!=""){
                            window.location.href=result.referer;
                        }else{
                            $.showErr(result.info);
                        }

					}
				},
				error:function(){
					$.showErr("通信失败");
				}
			});
			return false;
		});
	});
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