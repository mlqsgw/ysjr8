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
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li><a href="<?php echo U('Loan/Loanlistadmin/index');?>">所有借款</a></li>
     <li><a href="<?php echo U('Loan/Loanlistadmin/add');?>"  target="_self">添加借款</a></li>
     <li><a href="<?php echo U('Loan/Loanlistadmin/NewAdd');?>" target="_self">添加新手借款</a></li>
     <li class="active"><a href="<?php echo U('Loan/Loanlistadmin/delindex');?>">删除列表</a></li>
  </ul>
  <form class="well form-search" method="post" action="<?php echo U('Loan/Loanlistadmin/index');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">分类：
        <select class="select_2" name="cate_id" style="width:150px;">
          	<option value='0' >全部</option>
            <?php if(is_array($loan_cate)): foreach($loan_cate as $key=>$catevo): ?><option value='<?php echo ($catevo["id"]); ?>'  <?php if(($cate_id) == $catevo['id']): ?>selected<?php endif; ?> ><?php echo ($catevo["cat_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        &nbsp;&nbsp;
            贷款状态：
        <select class="select_2" name="deal_status" style="width:150px;">
            <option value='' >全部</option>
            <option value='0' <?php if(($deal_status) == "0"): ?>selected<?php endif; ?> >待审核</option>
            <option value='1' <?php if(($deal_status) == "1"): ?>selected<?php endif; ?> >进行中</option>
            <option value='2' <?php if(($deal_status) == "2"): ?>selected<?php endif; ?>>审核失败</option>
            <option value='3' <?php if(($deal_status) == "3"): ?>selected<?php endif; ?>>用户取消</option>
            <option value='4' <?php if(($deal_status) == "4"): ?>selected<?php endif; ?>>流标</option>
            <option value='5'<?php if(($deal_status) == "5"): ?>selected<?php endif; ?> >满标待审核</option>
            <option value='6' <?php if(($deal_status) == "6"): ?>selected<?php endif; ?>>满标审核失败</option>
            <option value='7'<?php if(($deal_status) == "7"): ?>selected<?php endif; ?>>还款中</option>
            <option value='8' <?php if(($deal_status) == "8"): ?>selected<?php endif; ?>>逾期中</option>
            <option value='9' <?php if(($deal_status) == "9"): ?>selected<?php endif; ?>>已完成</option>
        </select>

        <!-- 
        <select class="select_2" name="searchtype" style="width:70px;">
          <option value='0' >标题</option>
        </select>
         -->
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
	            <th width="16"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
	            <th width="40">排序</th>
	            <th width="50">编号ID</th>
	            <th width="200">贷款名称</th>
                  <th width="50">借款人</th>
	            <th width="70">投标类型</th>
                <th width="70">借款金额</th>
                  <th width="60">利率</th>
                  <th width="70">借款期限</th>
                  <th width="100">还款方式</th>
	            <th width="80">投标状态</th>
	            <th width="240">操作</th>
	          </tr>
        </thead>

        	<?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>
		            <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["id"]); ?>" ></td>
		            <td><input name='listorders[<?php echo ($vo["id"]); ?>]' class="input input-order"  type='text' size='3' value='<?php echo ($vo["listorder"]); ?>'></td>
		            <td><a><?php echo ($vo["id"]); ?></a></td>
		            <td>
		            	<a href="<?php echo U('loan/index/deal',array('id'=>$vo['id']));?>" target="_blank">
		            		<span><?php echo ($vo["name"]); ?></span>
		            	</a>
		            </td>
                    <td><?php echo ($vo["user_login"]); ?></td>
                    <td><?php echo ($vo["cat_name"]); ?></td>
                    <td><?php echo ($vo["borrow_amount"]); ?></td>
                    <td><?php echo ($vo["rate"]); ?></td>
                    <td><?php echo ($vo["repay_time"]); ?></td>
                    <td><?php echo ($vo["repay_type_name"]); ?></td>
                    <td><?php echo (loan_state($vo["deal_status"])); ?></td>

		            <td>
                        <a href='<?php echo U("loan/loanlistadmin/restore",array("id"=>$vo["id"]));?>'>还原</a>|
						<a href='javascript:del(<?php echo ($vo["id"]); ?>)'>删除</a>
					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
          <div class="pagination"><?php echo ($Page); ?></div>
     
    </div>

  </form>
</div>
<script src="/statics/js/common.js"></script>
<script>
function del(i){
	var mes=confirm("您确定要删除吗？");
	var url='<?php echo U("loan/loanlistadmin/del");?>'+'/del/0/id/'+i;
	if(mes){
		window.location.href=url;
	}
}
function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location="<?php echo u('AdminPost/index',$formget);?>";
    }
}
setInterval(function(){
	refersh_window();
}, 2000);
$(function () {
	setCookie("refersh_time",0);
    Wind.use('ajaxForm','artDialog','iframeTools', function () {
        //批量移动
        $('#J_Content_remove').click(function (e) {
            var str = 0;
            var id = tag = '';
            $("input[name='ids[]']").each(function () {
                if ($(this).attr('checked')) {
                    str = 1;
                    id += tag + $(this).val();
                    tag = ',';
                }
            });
            if (str == 0) {
				art.dialog.through({
					id:'error',
					icon: 'error',
					content: '您没有勾选信息，无法进行操作！',
					cancelVal: '关闭',
					cancel: true
				});
                return false;
            }
            var $this = $(this);
            art.dialog.open("/index.php?g=portal&m=AdminPost&a=move&ids=" + id, {
                title: "批量移动",
                width:"80%"
            });
        });
    });
});


</script>
</body>
</html>