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
<body class="J_scroll_fixed" style="min-width:700px;">
<div class="wrap J_check_wrap">
	<ul class="nav nav-tabs">
		 <li class="active">
			<a href="<?php echo U('User/Indexadmin/basic_information',array('id'=>$uid));?>">基本信息</a>
		</li>
		<li>
			<a href="<?php echo U('User/Indexadmin/money_information',array('id'=>$uid));?>">财务信息</a>
		</li>
	</ul>
        <div class="table_list">
			<h4>个人基本信息</h4>
            <table width="100%" class="table table-hover">
                <tr>
                    <th>用户名称:</th>
                    <td><?php echo ($user["user_login"]); ?></td>
                    <th>真实姓名:</th>
                    <td><?php echo ($user["name"]); ?></td>
                </tr>
                <tr>
                    <th>性别:</th>
                    <td><?php if($user["gender"] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                    <th>生日:</th>
                    <td><?php echo ($user["born"]); ?></td>
                </tr>
                <tr>
                    <th>婚姻:</th>
                    <td><?php echo ($user["marriage"]); ?></td>
                    <th>最高学历:</th>
                    <td><?php echo ($user["education"]); ?></td>
                </tr>
                <tr>
                    <th>手机号:</th>
                    <td><?php if($user["cellphone"] != ''): echo ($user["cellphone"]); else: echo ($user["user_phone"]); endif; ?></td>
                    <th>邮箱:</th>
                    <td><?php echo ($user["user_email"]); ?></td>
                </tr>
                <tr>
                    <th>籍贯:</th>
                    <td><?php echo ($user["native_place"]); ?></td>
                    <th>现居住地址:</th>
                    <td><?php echo ($user["location"]); ?></td>
                </tr>
                <tr>
                    <th>注册时间:</th>
                    <td><?php echo ($user["create_time"]); ?></td>
                    <th>最后登陆时间:</th>
                    <td><?php echo ($user["last_login_time"]); ?></td>
                </tr>
            </table>
            <h4><a href='<?php echo U('User/Shangchuan/index',array('uid'=>$uid));?>'>上传图片</a></h4>
            <h4><a href='<?php echo U('User/Shangchuan/img_lists',array('uid'=>$uid));?>'>用户图片列表</a></h4>
			<!-- <?php if(is_array($list)): foreach($list as $key=>$vo): ?><img src="/chuangcai11/Uploads/Public/Uploads/<?php echo ($vo["uid"]); ?>/<?php echo ($vo["images_name"]); ?>"/><?php endforeach; endif; ?> -->
			<h4>工作信息</h4>
			<?php if($work == 1): ?><h5 style="margin:0 0 0 100px;">会员未填写工作信息</h5>
			<?php else: ?>
            <table width="100%" class="table table-hover">
                <tr>
                    <th>单位名称:</th>
                    <td><?php echo ($office); ?></td>
                    <th>职业状态:</th>
                    <td><?php echo ($jobtype); ?></td>
                </tr>
                <tr>
                    <th>工作城市:</th>
                    <td><?php echo ($work_city); ?></td>
                    <th>公司类别:</th>
                    <td><?php echo ($officetype); ?></td>
                </tr>
                <tr>
                    <th>公司行业:</th>
                    <td><?php echo ($officedomain); ?></td>
                    <th>公司规模:</th>
                    <td><?php echo ($officecale); ?></td>
                </tr>
                <tr>
                    <th>职位:</th>
                    <td><?php echo ($position); ?></td>
                    <th>月收入:</th>
                    <td><?php echo ($salary); ?></td>
                </tr>
                <tr>
                    <th>工作年限:</th>
                    <td><?php echo ($workyears); ?></td>
                    <th>公司电话:</th>
                    <td><?php echo ($workphone); ?></td>
                </tr>
                <tr>
                    <th>工作邮箱:</th>
                    <td><?php echo ($workemail); ?></td>
                    <th>公司地址:</th>
                    <td><?php echo ($officeaddress); ?></td>
                </tr>
                <tr>
                    <th>直系亲属:</th>
                    <td><?php echo ($urgentrelation); ?>/<?php echo ($urgentcontact); ?></td>
                    <th>手机:</th>
                    <td><?php echo ($urgentmobile); ?></td>
                </tr>
                <tr>
                    <th>其他联系人:</th>
                    <td><?php echo ($urgentrelation2); ?>/<?php echo ($urgentcontact2); ?></td>
                    <th>手机:</th>
                    <td><?php echo ($urgentmobile2); ?></td>
                </tr>
            </table><?php endif; ?>
        </div>

</div>
</body>
</html>