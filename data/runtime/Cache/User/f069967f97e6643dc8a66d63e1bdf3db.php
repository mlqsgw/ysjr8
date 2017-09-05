<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
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
    <script src="/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<head/>
<body>
	<div class="wrap J_check_wrap">
	  <ul class="nav nav-tabs">
	  	<li><a href="<?php echo U('User/Account/index');?>">资金账号管理</a></li>
	     <li class="active"><a>调整资金</a></li>
	  </ul>
	  <div class="table_list" style="padding:0 0 0 200px;">
	      <form class="form-search" action="<?php echo U('User/Account/account_edit');?>"  method="post">
	          	&nbsp;&nbsp;  用户名：&nbsp;<?php echo ($user_login); ?>
			 <div style="margin:10px 0 0 0;"></div>
	     		    变动金额：<input type="text" class="input-medium search-query" name="money" value="">如果是减少余额，请填负数，如-1000
			 <div style="margin:10px 0 0 0;"></div>
				变动原因：<input style="width:350px;" type="text" class="input-medium search-query" name="dec" value="">

			<div style="margin:25px 0 0 0;"></div>
			<input name="uid" type="hidden" value="<?php echo ($id); ?>">
			<input name="user_name" type="hidden" value="<?php echo ($user_login); ?>">
			<input class="btn" type="button" value="提交">
	         
	      </form>
	  </div>
	</div>
<script type="text/javascript">
		$(document).ready(function(){
		$(".btn").click(function(){
			if(!($("input[name='money']").val()!=''&&!isNaN($("input[name='money']").val())))			
			{
				alert("请输入正确的充值金额");
				return false;
			}
			else if(!$("input[name='dec']").val()!="")
			{
				alert("变动原因不能为空");
				return false;
			}
			$("form").submit();
		});
	});
</script>
</body>
</html>