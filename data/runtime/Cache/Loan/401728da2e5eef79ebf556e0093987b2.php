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
<body class="J_scroll_fixed" style="min-width:800px;">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('commentadmin/index');?>">贷款初审</a></li>
  </ul>
    <div class="table_list">
        <form class="J_ajaxForm" method="post"   action="<?php echo U('Loan/Fristadmin/fristaudit');?>">
          <table cellpadding="0" cellspacing="0" class="table_form" width="50%">
              <tbody>
              <tr>
                  <td width="300">审核状态:</td>
                  <td>
                      <label class="radio inline" for="tongguo">
                          <input type="radio" id="tongguo"  class="" name="deal_status" value="1"  />初审通过</label>
                      <label class="radio inline" for="butonguo">
                          <input type="radio" id="butonguo" class="" name="deal_status" value="2" checked/>初审不通过</label>
                  </td>
              </tr>
              <tr id="zhaobaioshijian" style="display: none">
                  <td>开始招标时间:</td>
                  <td>
                      <input type="text" class="input length_2 J_datetime date" name="start_time"/>
                  </td>
              </tr>
              <tr>
                  <td>审核备注:</td>
                  <td><textarea name="firstauditmark" rows="5" cols="57"></textarea></td>
              </tr>

              <tr id="tuijian" style="display: none">
                  <td>是否推荐:</td>
                  <td>
                      <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" id="check_all" value="1" name="is_recommend">推荐</label>
                  </td>
              </tr>
              <input type="hidden" name="id" value="<?php echo ($loan_id); ?>"/>
          </tbody>
          </table>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">审核</button>
            </div>
        </form>
    </div>

</div>
<script src="/statics/js/common.js"></script>
<script>

    $(function(){
        $("input[name=deal_status]").click(function(){
            switch($("input[name=deal_status]:checked").val()){
                case "1":
                        $("#zhaobaioshijian").show();
                        $("#tuijian").show();
                    break;
                case "2":
                    $("#zhaobaioshijian").hide();
                    $("#tuijian").hide();
                    break;

            }

        });
    });


</script>
</body>
</html>