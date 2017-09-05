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
<style>
.home_info li em {
float: left;
width: 100px;
font-style: normal;
}
li {
list-style: none;
}
.menu{
   display: inline-block;
   width: 120px;
margin-bottom: 10px;
}
.xinqin {
     margin-right: 10px;
    }
</style>
</head>

<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h4 class="well">待办事务</h4>
  <div class="home_info">
    <ul  id="thinkcmf_notices tixin">
        <li><span class="menu"> 借款初审</span> <span class="xinqin"><a href="javascript:open_iframe_dialog('<?php echo U('Loan/Fristadmin/index',array('deal_status'=>0));?>','借款初审');"><?php echo ($frist); ?></a></span> <span class="menu">满标待审</span> <span  class="xinqin"><a  href="javascript:open_iframe_dialog('<?php echo U('Loan/Fulladmin/index',array('deal_status'=>5));?>','满标待审');"><?php echo ($full); ?></a></span></li>
        <li><span class="menu">  三人内需换 </span>  <span  class="xinqin"><a href="javascript:open_iframe_dialog('<?php echo U('Loan/Repayadmin/index',array('status'=>1));?>','三人内需换');"><?php echo ($nextrepay); ?></a></span><span class="menu"> 预期未还借款</span>  <span  class="xinqin"><a  href="javascript:open_iframe_dialog('<?php echo U('Loan/Repayadmin/index',array('status'=>2));?>','预期未还借款');"><?php echo ($yuqi); ?></a></span></li>
        <li><span class="menu">  提现申请 </span>  <span  class="xinqin"><a href="javascript:open_iframe_dialog('<?php echo U('User/Account/account_cash',array('state_id'=>0));?>','提现申请');"><?php echo ($user_carry); ?></a></span><span class="menu"> 充值待处理</span>  <span  class="xinqin"><a  href="javascript:open_iframe_dialog('<?php echo U('User/Account/account_recharge',array('state_id'=>0));?>',' 充值待处理');"><?php echo ($account); ?></a></span></li>
        <li><span class="menu"> 认证待审核</span>  <span  class="xinqin"><a href="javascript:open_iframe_dialog('<?php echo U('User/Auditadmin/index');?>','认证待审核');"><?php echo ($audit); ?></a></span> 
		<!--<span class="menu">资料待审核</span>  <span  class="xinqin"><a  href="javascript:open_iframe_dialog('<?php echo U('User/auditadmin/autonym',array('typeid'=>2));?>','资料待审核');"><?php echo ($auditdate); ?></a></span>--></li>
    </ul>
  </div>
  <h4 class="well">系统信息</h4>
  <div class="home_info">
    <ul>
      <?php if(is_array($server_info)): $i = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <em><?php echo ($key); ?></em> <span><?php echo ($vo); ?></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
</div>
<script src="/statics/js/common.js"></script> 
<script>


</script>
</body>
</html>