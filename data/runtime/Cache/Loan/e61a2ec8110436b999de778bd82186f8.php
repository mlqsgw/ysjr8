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
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">

     <li <?php if(($deal_status) == "0"): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Loan/Fristadmin/index',array('deal_status'=>0));?>">发标待审核</a></li>
     <li <?php if(($deal_status) == "1"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Loan/Fristadmin/index',array('deal_status'=>1));?>"  target="_self">正在借款标</a></li>
     <li <?php if(($deal_status) == "2"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Loan/Fristadmin/index',array('deal_status'=>2));?>"  target="_self">失败借款标</a></li>
     <li <?php if(($deal_status) == "4"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Loan/Fristadmin/index',array('deal_status'=>4));?>"  target="_self">流标</a></li>
  </ul>
  <form class="well form-search" method="post" action="">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">分类：
        <select class="select_2" name="cate_id" style="width:150px;">
          	<option value='0' >全部</option>
            <?php if(is_array($loan_cate)): foreach($loan_cate as $key=>$catevo): ?><option value='<?php echo ($catevo["id"]); ?>'  <?php if(($cate_id) == $catevo['id']): ?>selected<?php endif; ?> ><?php echo ($catevo["cat_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        &nbsp;&nbsp;添加时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width:80px;" autocomplete="off">-<input type="text" class="input length_2 J_date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width:80px;" autocomplete="off">

               &nbsp; &nbsp;贷款名称：
        <input type="text" class="input length_2" name="name" style="width:150px;" value="<?php echo ($name); ?>" placeholder="请输入关键字...">
            贷款人帐号：
        <input type="text" class="input length_2" name="user_login" style="width:150px;" value="<?php echo ($user_login); ?>" placeholder="请输入关键字...">
        <input type="submit" class="btn" value="搜索"/>
        </span>
      </div>
    </div>
  </form>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th width="50">编号ID</th>
	            <th width="200">贷款名称</th>
                  <th width="50">借款人</th>
	            <th width="70">投标类型</th>
                <th width="70">借款金额</th>
                  <th width="60">利率</th>
                  <th width="70">借款期限</th>
                  <th width="100">还款方式</th>
	            <th width="100">添加时间</th>
	            <th width="200">操作</th>
	          </tr>
        </thead>

        	<?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>
		            <td><a><?php echo ($vo["id"]); ?></a></td>
		            <td>
		            	<a href="<?php echo U('Loan/index/deal',array('id'=>$vo['id']));?>" target="_blank">
		            		<span><?php echo ($vo["name"]); ?></span>
		            	</a>
		            </td>
                    <td><?php echo ($vo["user_login"]); ?></td>
                    <td><?php echo ($vo["cat_name"]); ?></td>
                    <td><?php echo ($vo["borrow_amount"]); ?></td>
                    <td><?php echo ($vo["rate"]); ?></td>
                    <td><?php echo ($vo["repay_time"]); ?></td>
                    <td><?php echo ($vo["repay_type_name"]); ?></td>
                    <td><?php echo (date("y-m-d H:i:s",$vo["create_time"])); ?></td>
                    </td>
		            <td>
                        <a href="javascript:open_iframe_dialog('<?php echo U('User/indexadmin/basic_information',array('id'=>$vo['user_id']));?>','用户信息')">用户信息</a> |
		            <?php if(($deal_status) == "0"): ?><a href="<?php echo U('Loan/Loanlistadmin/edit',array('loan_id'=>$vo['id']));?>">修改</a>|
                        <a href="javascript:open_iframe_dialog('<?php echo U('Loan/Fristadmin/fristaudit',array('loan_id'=>$vo['id']));?>','贷款初审')">审核</a> |
                        <a href="<?php echo U('User/indexadmin/delete',array('id'=>$vo['user_id']));?>" class="J_ajax_del" >删除</a>|<?php endif; ?>
                        <?php if(($deal_status) != "0"): ?><a href="javascript:open_iframe_dialog('<?php echo U('Loan/Loanlistadmin/loanloadlist',array('loan_id'=>$vo['id']));?>','投标列表')">投标列表</a> |<?php endif; ?>
                        <a href="javascript:open_iframe_dialog('<?php echo U('Loan/Loanlistadmin/loanlog',array('loan_id'=>$vo['id']));?>','<?php echo ($vo['name']); ?>的日志')">标日志</a>

					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
          <div class="pagination"><?php echo ($Page); ?></div>
     
    </div>


  </form>
</div>
<script src="/statics/js/common.js"></script>
<script>
</script>
</body>
</html>