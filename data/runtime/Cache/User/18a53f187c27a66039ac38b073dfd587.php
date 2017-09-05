<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
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

	<script type="text/javascript" src="/tpl/simplebootx/Public/js/emailAutoComplete.js"></script> 



<style type="text/css">
	.user-lr-box-left .field .holder_tip{left: 180px;_left:-240px;top:0}
	.register_box .user-lr-box-left .field .f-input-tip{ _position:absolute;_left:-287px;}
	.logo a{ display:block;}
	.hidden {display:none;}
	.parentCls ul{ background:#CCC;}
	.parentCls ul li{ cursor:pointer; color:}
</style>

<!-- 密码安全级别设置 -->
    <STYLE type=text/css>
    .pwd-strength-box,
    .pwd-strength-box-low,
    .pwd-strength-box-med,
    .pwd-strength-box-hi
    {
    color: #464646;
    text-align: center;
    width: 33%;
    }
    .pwd-strength-box-low
    {
    color: #990000;
    background-color: #FFECEC;
    }
    .pwd-strength-box-med
    {
    color: #000066;
    background-color: #D2E9FF;
    }
    .pwd-strength-box-hi
    {
    color: #003300;
    background-color: #DDFFDD;
    }
    </STYLE>


<script type="text/javascript">
 //密码安全等级验证
        function checkPassword(pwd){
            var objLow=document.getElementById("pwdLow");
            var objMed=document.getElementById("pwdMed");
            var objHi=document.getElementById("pwdHi");
            objLow.className="pwd-strength-box";
            objMed.className="pwd-strength-box";
            objHi.className="pwd-strength-box";
            if(pwd.length<6){
            objLow.className="pwd-strength-box-low";
            }else{
            var p1= (pwd.search(/[a-zA-Z]/)!=-1) ? 1 : 0;
            var p2= (pwd.search(/[0-9]/)!=-1) ? 1 : 0;
            var p3= (pwd.search(/[^A-Za-z0-9_]/)!=-1) ? 1 : 0;
            var pa=p1+p2+p3;
            if(pa==1){
            objLow.className="pwd-strength-box-low";
            }else if(pa==2){
            objMed.className="pwd-strength-box-med";
            }else if(pa==3){
            objHi.className="pwd-strength-box-hi";
            }
            }
            }
        







//from表单验证
function check_form(){
    	a = true;
    	//email
    	var email = $("#signup-email-address").val();
    	
		if(email.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
		{
			a=true;
			$("#email_error").text("");
    	}else{
    		$("#email_error").text("　邮箱格式不正确！");
		}	
	

    	//账号
    	var user_name = $("#signup-username").val();
    	
    	if(/^[a-zA-z0-9]\w{5,19}$/.test(user_name)){
    		$("#user_name_error").text("")
    	}else{
    		a=false;
    		$("#user_name_error").text("　账号格式错误");
    	}
		

    	//密码&&重复密码
    	var pasd_1 = $("#signup-password").val();
    	var pasd_2 = $("#signup-password-confirm").val();
    	if(!/^.{6,20}$/.test(pasd_1)){
    		a=false;
    		$("#pasd_1_error").text("　密码位数最少为6位数！");
    	}else{
    		$("#pasd_1_error").text("");
    	}
    	if(pasd_2 == ''  ){
    		a=false;
    		$("#pasd_2_error").text("　确认密码不能为空！");
    	}else{
    		$("#pasd_2_error").text("");
    	}

    	if(pasd_1 !==pasd_2){
    		a=false;
    		$("#pasd_2_error").text("　两次密码不一致！");
    	}
       

    	//手机号
    	var user_phone = $("#settings-mobile").val();
    	if(user_phone == ''){
    		a=false;
    		$("#user_phone_error").text("　手机号不能为空！");
    	}else{
    		$("#user_phone_error").text("");
    	}
		
    	//验证码
    	var yzm = $("#mobile-yzm").val();
    	if(yzm == ''){
    		a=false;
    		$("#yzm_error").text("　验证码不能为空！");
    	}else{
    		$("#yzm_error").text("");
    	}

    	return  a;

}

</script>

</head>
<body class="register_body">
	<div class="head z100" id="j_head">
		<div class="head_cont" style="background:#fff">
			<div class="wrap constr clearfix">
				<div class="logo f_l">
					<a class="link" href="/">
                        <img src="/4cdd501dc023b.png" alt="">
					</a>
				</div>
				<!--<div class="f_yahei no-nav-text">注册</div>-->
			</div>
		</div>
		<p class="head_bg"></p>
	</div>
	<div class="blank20"></div>
	<div class="inc wb wrap register_box">
        <div class="bdd" style="background-color:#fff">
            <div class="inc_main clearfix">
                <div class="user-lr-box-left f_l" style="width:620px">
                    <!--注册表单-->
                    <form action="<?php echo U('User/register/doregister');?>" method="post" id="signup-user-form"  onsubmit="return  check_form()">
                       <div>
                        <div class="field email pr">
                            <label for="signup-email-address"><span class="f_red">*</span> Email</label>
                            <!-- <span class="holder_tip ps">输入常用的邮箱</span> -->
							 <span class="parentCls"> 
	                            <input type="text" value="" class="f-input ipttxt" 
								id="signup-email-address" name="email" size="30"   placeholder="输入常用的邮箱">
								<span  id='email_error'  style="color:red;"> </span>
                            </span>
                            <span class="f-input-tip"></span>
                            <span class="hint">登录及找回密码用，不会公开</span>
                        </div>
                        <div class="blank1"></div>
                        <div class="field username pr">
                            <label for="signup-username"><span class="f_red">*</span> 帐号</label>
                            <!-- <span class="holder_tip ps">输入注册帐号</span> -->
                            <input type="text" value="" class="f-input ipttxt" id="signup-username" name="username" size="30"  placeholder="输入注册帐号"  >
							<span  id='user_name_error'  style="color:red;"> </span>


                            <span class="f-input-tip"></span>
                            <span class="hint">输入6-20英文或数字</span>
                        </div>
                        <div class="blank1"></div>
                        <div class="field password pr">
                            <label for="signup-password"><span class="f_red">*</span> 密码</label>
                            <!-- <span class="holder_tip ps">输入密码</span> -->
                            <input type="password" onkeyup=checkPassword(this.value); class="f-input ipttxt" name="password" id="signup-password" size="30"   placeholder="输入密码">
                            <span  id='pasd_1_error'   style="color:red;"> </span>
                            <span class="f-input-tip"></span>
                            <span style="display: flex;" class="hint"> 
                                <table style="width:290px;">
                                		<tr>
                                		<td style="width:60px;">输入6-20个字符</td>
                                        <TD style="width:40px;">安全等级：</TD>
                                        <TD style="width:70px;">
                                        <TABLE cellSpacing=0 cellPadding=0 width="100%">
                                        <TBODY>
                                        <TR>
                                        <TD class=pwd-strength-box id=pwdLow>低</TD>
                                        <TD class=pwd-strength-box id=pwdMed>中</TD>
                                        <TD class=pwd-strength-box id=pwdHi>高</TD></TR></TBODY></TABLE></TD>
                                        </tr>
                         </table>
                             </span>
                      </div>

                        
                    


                      
                        <div class="blank1"></div>
                        <div class="field password pr">
                            <label for="signup-password-confirm"><span class="f_red">*</span> 确认密码</label>
                            <!-- <span class="holder_tip ps">再次输入密码</span> -->
                            <input type="password" class="f-input ipttxt" name="repassword" id="signup-password-confirm" size="30"  placeholder="再次输入密码">
                            <span  id='pasd_2_error'   style="color:red;"></span>
                            <span class="f-input-tip"></span>
                            <span class="hint">请再次填写密码</span>
                        </div>
                        <div class="blank1"></div>
                        <div class="field mobile pr">
                            <label for="signup-mobile"><span class="f_red">*</span> 手机号码</label>
                           <!--  <span class="holder_tip ps">输入手机号码</span> -->
                            <input type="text" value="" class="f-input ipttxt" id="settings-mobile" name="user_phone" size="30" placeholder="输入手机号码">
                            <span  id='user_phone_error'  style="color:red;"> </span>
                            <span class="f-input-tip"></span>
                            <span class="hint"> 标信息将通过短信发到手机上</span>
                        </div>
                        <div class="blank1"></div>
                        
                        <div class="field weibo pr">
                            <label for="signup-mobile"><span class="f_red">*</span> 验证码</label>
                           <!--  <span class="holder_tip ps">输入手机验证码</span> -->
                            <input type="text" value="" class="f-input ipttxt" id="mobile-yzm" name="phonema" size="30"  placeholder="输入手机验证码">

							<input type="button" id="reveiveActiveCode" class="reveiveActiveCode" value="发送手机验证码"> 
							<br/><span id='yzm_error'   style="color:red;"> </span>
							<!--<?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?>-->
                            <span class="f-input-tip"></span>
                        </div>
                        <div class="blank1"></div>

                        <div class="blank1"></div>
						<input name="terms" type="hidden" id="J_agreement" value="1" checked="checked">
                       
                        <div class="blank"></div>
                        <div class="act">
                            <input type="submit" class="reg-submit-btn" id="signup-submit" name="commit" value="注册">
                        </div>
                        </form>
                    </div>
                </div>
                <div class="user-lr-box-right f_r">
                    <div class="has_account tc pb15 f14">已有帐号？<a href="<?php echo U('User/login/index');?>" class="f_blue">直接登录</a></div>
                </div>
            </div>
            <div class="inc_foot"></div>
        </div>
	</div>
	</div>







<script type="text/javascript">
//发送验证码倒计时
var wait=60; 
function time(o) { 
	var b=document.getElementById("settings-mobile").value;
	var b = $("#settings-mobile").val();
   		 var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 

	if(myreg.test(b) && b!="" ){
	
	if (wait == 0) { 
		o.removeAttribute("disabled"); 
		o.value="免费获取验证码"; 
		wait = 60; 
	}else{ 
		o.setAttribute("disabled", true); 
		o.value="重新发送(" + wait + ")"; 
		wait--; 
		setTimeout(function() {time(o) },1000) 
	} 
	}
	

} 
//调用倒计时JS
		document.getElementById("reveiveActiveCode").onclick=function(){time(this);} 







$("#reveiveActiveCode").click(function(){

		var p=document.getElementById("settings-mobile").value;
		if(p=="")
		{
			$.showErr("手机号不能为空");
			return false;
		}
//
		 var p = $("#settings-mobile").val();
   		 var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 


//		 
		if(!myreg.test(p))
		{
			$.showErr("手机号格式不正确");
			return false;
		}
			var obj = $(this);
			var query = new Object();
			//query.id = $(this).attr("dataid");
			var p=document.getElementById("settings-mobile").value;
				$.ajax({
					url:"/index.php/Loan/Reg/regma/phone/"+p,
					data:query,
					type:"post",
					dataType:"json",
					success:function(result){
						if(result.status==1)
						{
							settime(obj);
						}else if(result.status==-1){
							$.showErr(result.info);
						}else if(result.status==-2){
							$.showErr(result.info);
						}
						
					},
					error:function(){
						alert("操作错误");
						
					}







				});
			

		});
		






		


$(document).ready(function(){
	var remenber_i=0;
	$(".ui-select").click(function(){
		remenber_i++;
		if(remenber_i%2==1){
			$("#J_agreement").attr("checked","");
			$(this).css("backgroundPosition","0 0");
		}
		else{
			remenber_i = 0;
			$("#J_agreement").attr("checked","checked");
			$(this).css("backgroundPosition","0 -33px");
		}
	})
	$(".user-lr-box-left .holder_tip").click(function(){
		$(this).hide();
		$(this).parent().find(".f-input").focus();
	});
	$(".register_box .f-input").focus(function(){
		$(this).parent().find(".holder_tip").hide();
	});
	$(".register_box .f-input").blur(function(){
		if($(this).val()==""){
			$(this).parent().find(".holder_tip").show();
		}
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
 
</body>
</html>