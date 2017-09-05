<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">

<link rel="icon" href="favicon.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="/image/x-icon" />

    <link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/weebox.css" />
    <link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/tpl/simplebootx/Public/css/user_login_reg.css" />
<style>
.to_regsiter f_yahei a:hover{color:#00C;}
</style>
<script type="text/javascript">
var APP_ROOT = '<?php echo ($APP_ROOT); ?>';;
var LOADER_IMG = '<?php echo ($TMPL); ?>/images/lazy_loading.gif';
var ERROR_IMG = '<?php echo ($TMPL); ?>/images/image_err.gif';

</script>
    <script type="text/javascript" src="http://www.webtiro.com/demo-p2p/public/runtime/app/lang.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.bgiframe.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.weebox.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery.pngfix.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/lazyload.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/script.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/op.js"></script>
    <script type="text/javascript" src="/tpl/simplebootx/Public/js/op.js"></script>



</head>
<body class="login_body">
	<div class="head z100" id="j_head">
		<div class="head_cont" style="background:#fff">
			<div class="wrap constr clearfix">
				<div class="logo f_l">
					<a class="link" href="/">
                        <img src="/4cdd501dc023b.png" alt="">
					</a>
				</div>

				<!--<div class="f_yahei no-nav-text">登录</div>-->

			</div>
		</div>
		<p class="head_bg"></p>
	</div>
	<div class="wrap" id="J_wrap">
		<div class="user_login_bar clearfix">
			<div class="login_bar wrap">
				<div class="xszlogin1" style="background: url(/tpl/simplebootx/Public/images/zx_login_l.png) no-repeat;"></div>
                <div class="inc f_r" style="width:380px;">
                    <div class="clearfix">
                        <div class="user-lr-box-left">
                            <div>
                                <!--登录表单-->

                                <form method="post" action="<?php echo U('user/login/dologin');?>" name="page_login_form" id="page_login_form">
                                    <div class="field email pr">
                                        <span class="holder_tip ps" style="display: block;">Email/帐号/手机</span>
                                        <input id="myinput" type="text" value="" class="f-input ipttxt" id="login-email-address" name="username" size="30" tabindex="1">
                                    </div>
                                    <div class="field password pr">
                                        <span class="holder_tip ps" style="display:block;">密码</span>
                                        <input type="password" value="" class="f-input ipttxt" id="login-password" name="password" size="30" tabindex="2">
                                    </div>
                                    <div class="field  pr" >
                                        <span class="holder_tip ps" style="width: 120px;">验证码</span>
                                        <input type="text" value="" class="f-input ipttxt" id="login-verify" style=" width:120px;margin-right:10px;" name="verify" size="20" tabindex="2">
                                        <?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?>
                                    </div>
                                    <div class="act clearfix" style="margin:0px;padding:0">
                                        <!--<input type="hidden" name="ajax" value="1">-->
                                        <input type="submit" class="login-submit-btn" id="user-login-submit" name="commit" value="登录">
                                    </div>
                                    <div class="act cf" style="border-bottom:1px solid #dedede; margin:0px;padding:0;height:40px; text-align:center;">
									<span class="to_regsiter f_yahei">
										<a href="<?php echo U('User/Resetting/index');?>">忘记密码</a>
										<a href="<?php echo U('User/Register/index');?>" style="margin-left:20px;">免费注册</a>
									</span>
                                    </div>
                                </form>
                                <!--登录表单-->
                            </div>							<div class="blank10"></div>

                        </div>
                    </div>
                    <div class="inc_foot"></div>
                </div>
			</div>
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
<script language="JavaScript" type="text/javascript">  
var is_lock_user_login = false;
$(document).ready(function(){
    var remenber_i=0;
    $(".ui-select").click(function(){
        remenber_i++;
        if(remenber_i%2==1){
            $(this).css("backgroundPosition","0 -33px");
            $(this).css("backgroundPosition","0 0");
        }
        else{
            remenber_i = 0;
            $("#autologin").attr("checked","checked");
            $("#autologin").attr("checked","");
        }
    });

    $(".user_login_bar .holder_tip").click(function(){
        $(this).hide();
        $(this).parent().find(".f-input").focus();
    });

    $(".user_login_bar .f-input").focus(function(){
        $(this).parent().find(".holder_tip").hide();
    });
    $(".user_login_bar .f-input").blur(function(){
        if($(this).val()==""){
            $(this).parent().find(".holder_tip").show();
        }
    });

    $(".user_login_bar .f-input").each(function(){
        if($(this).val()==""){
            $(this).parent().find(".holder_tip").show();
        }
        else{
            $(this).parent().find(".holder_tip").hide();
        }
    });

    $("#user-login-submit").click(function(){
        checkUserLogin();
    });

    $("#page_login_form input,#page_login_form select").keydown(function(e){
        var curKey = e.which;
        if(curKey == 13){
            checkUserLogin();
        }
    });

});

</script>