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
      <li ><a href="<?php echo U('Loan/Loanlistadmin/index');?>">所有借款</a></li>
      <li class="active"><a href="<?php echo U('Loan/Loanlistadmin/add');?>"  target="_self">添加借款</a></li>
     <li><a href="<?php echo U('Loan/Loanlistadmin/NewAdd');?>" target="_self">添加新手借款</a></li>
     <li><a href="<?php echo U('Loan/Loanlistadmin/delindex');?>">删除列表</a></li>
  </ul>
  
  <div class="table_full">
  		 <form class="form-horizontal J_ajaxForm" action="" method="post" id="myform">
         <table width="100%" cellpadding="2" cellspacing="2">
        <tr>
          <th width="180">用户名称/用户id</th>
          <td>
         		<input type="text" name="userInfo" value="" id="userInfo" placeholder="请输入用户名或用户ID" >
                <button type="button" class="btn btn-primary btn_submit" id="getUserList" >搜索</button>
              <span  id="tishi"></span>
                
          </td>
        </tr>

      </table>
  		</form>
  
  </div>


  <form class="form-horizontal J_ajaxForm" action="<?php echo U('Loan/Loanlistadmin/add_two');?>" method="post" id="myform">
  <div class="table_full">
  	
      <table width="100%" cellpadding="2" cellspacing="2">
        <tr>
          <th width="180">用户名称:</th>
          <td id="userselect">
          		<select name="user" >
                    	<option value=""></option>
                </select>
              <span  id="usertishi"></span>
          </td>
        </tr>
          <tr>
              <th width="180">标类型:</th>
              <td>
                  <select name="loan_cate">
                      <option value="">请选择标类型</option>
                      <?php if(is_array($loan_cate)): $i = 0; $__LIST__ = $loan_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                  </select>
                  <span  id="loan_catetishi"></span>
              </td>
          </tr>
      </table>
      <table width="100%" cellpadding="2" cellspacing="2" id="errlist" style="display: none">
      </table>
  </div>
    <div class="form-actions">
        <button type="button" class="btn btn-primary btn_submit " id="nextstep">下一步</button>
        <a class="btn" href="/index.php/loan/loanlistadmin">返回</a>
    </div>
    </form>
</div>
<script>

    $(function(){
        //搜索用户名
        $("#getUserList").click(function(){
            var userInfo=$('#userInfo').val();
            if(userInfo==""){
                return false;
            }
            $('#tishi').html('');
            $('#errlist').hide();
            $.post("<?php echo U('Loan/Loanlistadmin/souser');?>",{userInfo:userInfo},function(data){
                if (data.state === 'success') {
                    var str='<select name="user">',da=data.data;
                    for(var i in da){
                        str+='<option value="'+da[i].id+'">'+da[i].user_login+'</option>';
                    }
                    str+='</select>';
                    $('#userselect').html(str);

                } else if (data.state === 'fail') {
                    $('#tishi').html('<span class="tips_error">' + data.info + '</span>');
                    $('#userselect').html('<select name="user">         <option value=""></option>                       </select>');
                }
            },'json');
            return false;
        });
        //下一步
        $('#nextstep').click(function(){
            var userid,loan_cate;
            userid=$("select[name='user'] option:selected").val();
            loan_cate=$("select[name='loan_cate'] option:selected").val();
           if(userid==""){
               $('#usertishi').html('<span class="tips_error">用户名必须选择</span>');

               return false;
           }
            if(loan_cate==""){
                $('#loan_catetishi').html('<span class="tips_error">标类型必须选择</span>');
                return false;
            }
            $.post("<?php echo U('Loan/Loanlistadmin/check_loan');?>",{user:userid,loan_cate:loan_cate},function(data){
                if (data.state === 'success') {
                    if (data.referer) {                       //返回带跳转地址

                            window.location.href = data.referer;

                    }
                } else if (data.state === 'fail') {

                    $('#errlist').show();
                    var str='<tr><th width="180"></th><td>---- 基础认证---- </td> </tr>',audit=data.data.audit,review=data.data.review;
                    for(var i in audit){
                        str+='  <tr><th width="180"></th><td style="color: '+audit[i].color+'"> '+audit[i].value+' </td> </tr>';
                    }
                    str+=' <tr><th width="180"></th><td>----其他资料----</td> </tr>';
                    for(var i in review){
                        str+='  <tr><th width="180"></th><td style="color: '+review[i].color+'"> '+review[i].value+' </td> </tr>';
                    }

                    $('#errlist').html(str);

                }
            },'json');
        });
    });
</script>

<script src="/statics/js/common.js"></script>
  <script type="text/javascript" src="/statics/js/content_addtop.js"></script>
</body>
</html>