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
            <li class="active"><a href="<?php echo U('Loan/Loanlistadmin/NewAdd');?>"  target="_self">添加新手借款</a></li>
	    </ul>
		
		<form class="J_ajaxForms" name="myform" id="myform" action="<?php echo u('Loan/Loanlistadmin/NewAdd_two');?>" method="post">
		 <fieldset>
		<div class="tabbable">
        <div class="tab-content">
          <div class="tab-pane active" id="A">
            <table cellpadding="2" cellspacing="2" class="table_form" width="100%">
				<tbody>
                <tr>
                    <td>标分类：</td>
                    <td><input type="hidden" class="input" name="cate_id" value="<?php echo ($loan_cate["id"]); ?>"><?php echo ($loan_cate["cat_name"]); ?></td>
                </tr>
                <tr>
                    <td>用户名称：</td>
                    <td>
                        <input type="hidden" class="input" name="user_id" value="<?php echo ($user["id"]); ?>">
                        <input type="hidden" class="input" name="user_login" value="<?php echo ($user["user_login"]); ?>"/>
                        <?php echo ($user["user_login"]); ?>

                    </td>
                </tr>

					<tr>
						<td width="180">借款标题：</td>
						<td><input type="text" class="input" name="name" value=""><span class="must_red">*</span>
						</td>
					</tr>

                <tr>
                    <td width="180">简短名称：</td>
                    <td><input type="text" class="input" name="sub_name" value=""><span class="must_red">*&nbsp;&nbsp;用于短信，邮箱提醒的简短名称</span>
                    </td>
                </tr>
                    <tr>
                        <td>借款用途：</td>
                        <td>
                            <select name="type_id" class="normal_select" >
                                <?php if(is_array($loan_type)): foreach($loan_type as $key=>$type_id): ?><option value="<?php echo ($type_id["id"]); ?>" ><?php echo ($type_id["t_name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </td>
                    </tr>

					<tr>
						<td>借款金额：</td>
						<td><input type="text" class="input" name="borrow_amount" value=""><span class="must_red">*&nbsp;&nbsp;请填写为<?php echo (C("sys_tenderMultiplicand")); ?>的倍数,最大额度为<?php echo ($loan_cate["amount"]); ?>元</span></td>
					</tr>
					<tr>
						<td>借款期限：</td>
						<td>
							<select name="repay_time" class="normal_select" >

                                <?php $__FOR_START_13277__=$loan_cate['borrowing_time_shortest'];$__FOR_END_13277__=$loan_cate['borrowing_time_longest']+1;for($borrowing_time=$__FOR_START_13277__;$borrowing_time < $__FOR_END_13277__;$borrowing_time+=1){ ?><option value="<?php echo ($borrowing_time); ?>"> <?php echo ($borrowing_time); ?>个月</option><?php } ?>
							</select>
						</td>
					</tr>
                    <tr>
                        <td>年利率：</td>
                        <td><input type="text" class="input" name="rate" value=""><span class="must_red">*&nbsp;&nbsp;年利率请在<?php echo (C("sys_loans_lowest_apr")); ?>%到<?php echo (C("sys_loans_highest_aprs")); ?>%之间</span></td>
                    </tr>

                    <tr>
                        <td>还款周期：</td>
                        <td>按月还款</td>
                    </tr>
					<tr>
						<td>还款方式：</td>
						<td>
							<select name="loantype" class="normal_select" >
									<?php $payback=unserialize($loan_cate['payback']); ?>
                                    <option value="0"> 请选择还款方式</option>
                                    <?php if(is_array($payback)): foreach($payback as $key=>$paybackvo): ?><option value="<?php echo ($key); ?>" ><?php echo ($payback[$key]); ?></option><?php endforeach; endif; ?>

							</select>
						</td>
					</tr>
					<tr>
						<td>筹标期限：</td>
						<td><input type="text" class="input" name="deadline" value=""><span class="must_red">*&nbsp;&nbsp;请在<?php echo ($loan_cate["deadline"]); ?>天内</span></td>
					</tr>
                    <tr>
                        <td>最高投标金额：</td>
                        <td><input type="text" class="input" name="max_loan_money" value="0"><span class="must_red">*&nbsp;&nbsp;0为不限制，请填写<?php echo (C("sys_tenderMultiplicand")); ?>的倍数</span></td>
                    </tr>
                    <tr>
                        <td>最低投标金额：</td>
                        <td><input type="text" class="input" name="min_loan_money" value="<?php echo (C("sys_tenderMultiplicand")); ?>"></td>
                    </tr>
                    <tr>
                        <td>担保公司：</td>
                        <td>
                            <select name="agency_id" class="normal_select" >
                                <option value="">无</option>
                                <?php if(is_array($loan_agency)): foreach($loan_agency as $key=>$agencyvo): ?><option value="<?php echo ($agencyvo["id"]); ?>"><?php echo ($agencyvo["name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>担保方式：</td>
                        <td>
                            <select name="warrant" class="normal_select" >
                                    <option value="0">无</option>
                                    <option value="1">本金</option>
                                    <option value="2">本金及利息</option>
                            </select>
                        </td>
                    </tr>
                <tr>
                    <td>风险等级：</td>
                    <td>
                        <select name="risk_rank" class="normal_select" >
                            <option value="0">低</option>
                            <option value="1">中</option>
                            <option value="2">高</option>
                        </select>
                    </td>
                </tr>
					
					<tr>
						<td>借款描述：</td>
						<td><textarea name="description" rows="7" cols="57"></textarea></td>
					</tr>
                <tr>
                    <?php $userdata=unserialize($user['datamark']); $review=unserialize($loan_cate['review']); ?>
                    <td width="180">用户材料展示:</td>
                    <td>
                        <?php if(is_array($userdata)): foreach($userdata as $key=>$uservo): ?><label style="display: inline-block;margin-right: 10px;" for="Review<?php echo ($key); ?>">
                                <input type="checkbox" name="userdata[<?php echo ($key); ?>]" id="Review<?php echo ($key); ?>"   value="<?php echo ($userdata[$key]); ?>"    <?php echo checked($key, $review);?> /><?php echo ($userdata[$key]); ?></label><?php endforeach; endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>排序：</td>
                    <td><input type="text" class="input" name="listorder" value="255"></td>
                </tr>
				</tbody>
			</table>
          </div>
          
          
        </div>
      </div>
      
      	<div class="form-actions">
      		<input type="hidden"name="borrow_type" value="0">
            <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">提交</button>
          </div>
           </fieldset>
		</form>
		
	</div>
	<script type="text/javascript" src="/statics/js/common.js"></script>
    <script type="text/javascript" src="/statics/js/content_addtop.js"></script>

    
	<script>
/////---------------------

	 Wind.use('validate', 'ajaxForm', 'artDialog', function () {
			//javascript
	        var form = $('form.J_ajaxForms');
	        //ie处理placeholder提交问题
	        if ($.browser.msie) {
	            form.find('[placeholder]').each(function () {
	                var input = $(this);
	                if (input.val() == input.attr('placeholder')) {
	                    input.val('');
	                }
	            });
	        }

         var max=<?php echo (C("sys_loans_lowest_apr")); ?>;
         var min=<?php echo (C("sys_loans_highest_aprs")); ?>;
         var deadline=<?php echo ($loan_cate["deadline"]); ?>;
        var borrowing=<?php echo ($loan_cate["amount"]); ?>;


//表单验证开始
	        form.validate({
				//是否在获取焦点时验证
				onfocusout:false,
				//是否在敲击键盘时验证
				onkeyup:false,
				//当鼠标掉级时验证
				onclick: false,
	            //验证错误
	            showErrors: function (errorMap, errorArr) {
					//errorMap {'name':'错误信息'}
					//errorArr [{'message':'错误信息',element:({})}]
					try{
						$(errorArr[0].element).focus();
						art.dialog({
							id:'error',
							icon: 'error',
							lock: true,
							fixed: true,
							background:"#CCCCCC",
							opacity:0,
							content: errorArr[0].message,
							cancelVal: '确定',
							cancel: function(){
								$(errorArr[0].element).focus();
							}
						});
					}catch(err){
					}
	            },
	            //验证规则
	            rules: {'name':{required:1},'sub_name':{required:1},'rate':{required:true,range:[max,min]},'averagecCapital':{required:true},'borrow_amount':{required:true,max:borrowing},'deadline':{required:true,max:10},'min_loan_money':{required:true,digits:true}},
	            //验证未通过提示消息
	            messages: {'name':{required:'请输入借款标题！'},'sub_name':{required:'请输入一个简短的名称用于发送短信等提醒！'}},
	            //给未通过验证的元素加效果,闪烁等
	            highlight: false,
	            //是否在获取焦点时验证
	            onfocusout: false,
	            //验证通过，提交表单
	            submitHandler: function (forms) {
	                $(forms).ajaxSubmit({
	                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
	                    dataType: 'json',
	                    beforeSubmit: function (arr, $form, options) {
	                        
	                    },
	                    success: function (data, statusText, xhr, $form) {
	                        if(data.status){
								setCookie("refersh_time",1);
								//添加成功
								Wind.use("artDialog", function () {
								    art.dialog({
								        id: "succeed",
								        icon: "succeed",
								        fixed: true,
								        lock: true,
								        background: "#CCCCCC",
								        opacity: 0,
								        content: data.info,
										button:[
											{
												name: '确定',
												callback:function(){
                                                    location.href = "<?php echo U('Loan/Loanlistadmin/index');?>";

													return true;
												},
												focus: true
											},{
												name: '关闭',
												callback:function(){
                                                    location.href = "<?php echo U('Loan/Loanlistadmin/index');?>";
													return true;
												}
											}
										]
								    });
								});
							}else{
								alert(data.info);
							}
	                    }
	                });
	            }
	        });
	    });
	////-------------------------
	
	
	</script>
</body>
</html>