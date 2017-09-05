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
     <li class="active"><a href="<?php echo U('User/Account/index');?>">资金账号管理</a></li>
     <li style="margin:0 0 0 100px;">
      <form class="form-search" action="<?php echo U('User/Account/index');?>"  method="post">
         <input type="text" class="input-medium search-query" name="so_name" placeholder="用户名" value="<?php echo ($so_name); ?>">
            <!--&nbsp;&nbsp; 操作时间
               <input type="text" class="input-small J_date" name="so_start" placeholder="开始时间" value="<?php echo ($so_start); ?>">
                到
                <input type="text" class="input-small J_date" name="so_end" placeholder="结束时间" value="<?php echo ($so_end); ?>">
                --> 
         <button type="submit" class="btn">搜索</button>
     </form>
     </li>
  </ul>
  <div class="table_list">

    <table width="100%" cellspacing="0" class="table table-hover">
        <thead>
        <tr>
            <th align='center'>ID</th>
            <th>用户名</th>
            <th>总金额 </th>
            <th>可用金额 </th>
            <th>冻结金额</th>
            <th>待收金额</th>
            <th width="350">操作</th>
        </tr>
        </thead>
        <style>
            .audit{
                background-image: url('/statics/images/icon/opa-icons-color16.png');
                background-repeat: no-repeat;
                display: inline-block;
                height: 16px;
                vertical-align: text-top;
                width: 16px;
            }
            .audit0{
                background-position: -192px -16px;
            }
            .audit1{
                background-position: -208px -16px;
            }
            .view{
                background-position: -192px -64px;
            }

        </style>
        <tbody>

        <?php if(is_array($content)): foreach($content as $key=>$vo): ?><tr>
                <td align='center'><?php echo ($vo["id"]); ?></td>
                
                <td><a class="J_dialog" href="<?php echo U('indexadmin/basic_information',array('id'=>$vo['id']));?>" ><?php echo ($vo["user_login"]); ?></a></td>
                <td>￥<?php echo ($vo["total_money"]); ?></td>
                <td>￥<?php echo ($vo["available_funds"]); ?></td>
                <td> ￥<?php echo ($vo["freeze_funds"]); ?> </td>
				<td> ￥<?php echo ($vo["due_in"]); ?> </td>
                <td align='center'>
                    <a href="<?php echo U('User/Account/account_recharge',array('uid'=>$vo['uid']));?>"> 充值记录  </a>
                    <a href="<?php echo U('User/Account/account_cash',array('uid'=>$vo['uid']));?>"> 提现记录 </a>
                    <a href="<?php echo U('User/Account/account_log',array('uid'=>$vo['uid']));?>"> 资金记录 </a>
                    <a href="<?php echo U('User/Account/account_log',array('uid'=>$vo['uid']));?>"> 投标记录 </a>
                    <a style="color:red;" href="<?php echo U('User/Account/account_edit',array('uid'=>$vo['uid']));?>"> 修改资金</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>

      <div class="pagination"><?php echo ($page); ?></div>
  </div>
</div>
<script src="/statics/js/common.js"></script>
</body>
</html>