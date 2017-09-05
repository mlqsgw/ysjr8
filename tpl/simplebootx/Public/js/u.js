jQuery(function(){
	$("#Jcarry_amount").keyup(function(){
		setCarryResult()
	});
	$("#Jcarry_amount").blur(function(){
		setCarryResult()
	});
	$("#Jcarry_bank_id").change(function(){
		if($(this).val()=="other"){
			$("#Jcarry_otherbank").removeClass("hide");
			$("#Jcarry_bankSuggestNote").addClass("f_red");
			$("#Jcarry_bankSuggestNote").html("其他银行的提现时间约为3-5个工作日,建议使用推荐的银行进行提现操作。");
		}
		else{
			$("#Jcarry_otherbank").addClass("hide");
			$("#Jcarry_otherbank").val("");
			$("#Jcarry_bankSuggestNote").removeClass("f_red");
			if($(this).find("option:selected").attr("day")!=undefined)
				$("#Jcarry_bankSuggestNote").html("提现时间约为"+$(this).find("option:selected").attr("day")+"个工作日。");
			else
				$("#Jcarry_bankSuggestNote").html("提现时间约为3个工作日。");
		}
	});
	
	$("#Jcarry_otherbank").change(function(){
		$("#Jcarry_bankSuggestNote").removeClass("f_red");
		if($(this).find("option:selected").attr("day")!=undefined)
			$("#Jcarry_bankSuggestNote").html("提现时间约为"+$(this).find("option:selected").attr("day")+"个工作日。");
		else
			$("#Jcarry_bankSuggestNote").html("提现时间约为3个工作日。");
	});
	$("#Jcarry_From").submit(function(){
		if($.trim($("#Jcarry_amount").val())=="" || !$.checkNumber($("#Jcarry_amount").val()) || parseFloat($("#Jcarry_amount").val())<=0){
			$.showErr(LANG.CARRY_MONEY_NOT_TRUE,function(){
				$("#Jcarry_amount").focus();
			});
			return false;
		}
		if(parseFloat($("#Jcarry_acount_balance_res").val())<0){
			$.showErr(LANG.CARRY_MONEY_NOT_ENOUGHT,function(){
				$("#Jcarry_acount_balance_res").focus();
			});
			return false;
		}
		
		if($.trim($("#J_PAYPASSWORD").val())==""){
			$.showErr(LANG.PAYPASSWORD_EMPTY,function(){
				$("#J_PAYPASSWORD").focus();
			});
			return false;
		}
		
		return true;
	});
});
function tips(input,msg,top,left)
{
	var tip='<div class="cashdraw_tips" style="top: '+top+'px; left:'+left+'px; display: block;"><div class="cashdraw_tip_header"></div><div class="cashdraw_tip_body_container"><div class="cashdraw_tip_body"><div class="cashdraw_tip_content">'+msg+'</div></div></div></div>';
	$("#imgtips").after(tip);
	input.onmouseout=function(){
		setTimeout(function(){
			$(".cashdraw_tips").remove()
		},500);	
	}
}

function setCarryResult(){
	var carry_amount = 0;
	var total_amount =  parseFloat($("#Jcarry_totalAmount").val());
	if ($.trim($("#Jcarry_amount").val()).length > 0) {
		if ($("#Jcarry_amount").val() == "-") {
			carry_amount = "-0";
		}
		else{
			carry_amount = parseFloat($("#Jcarry_amount").val());
		}
	}
	
	carry_amount = parseFloat(carry_amount);
	
	if(carry_amount < 0){
		$("#Jcarry_balance").html(LANG.CARRY_MONEY_NOT_TRUE);
	}
	else if(carry_amount > total_amount){
		$("#Jcarry_balance").html(LANG.CARRY_MONEY_NOT_ENOUGHT);
	}
	else if(carry_amount == 0){
		$("#Jcarry_balance").html(LANG.MIN_CARRY_MONEY);
	}
	else{
		$("#Jcarry_balance").html("");
	}
	var fee = 0;
	if(json_fee.length > 0){
		if(carry_amount >= json_fee[json_fee.length-1].max_price){
			fee = json_fee[json_fee.length-1].fee;
		}
		else{
			$.each(json_fee,function(n,data) {
				if(carry_amount >=data.min_price && carry_amount<=data.max_price) { 
	           	 fee = data.fee;
				}
	        }); 
		}
	}
	
	fee = parseFloat(fee);
	
	if(carry_amount + fee > total_amount){
		$("#Jcarry_balance").html(LANG.CARRY_MONEY_NOT_ENOUGHT);
	}
	
	$("#Jcarry_fee").html(foramtmoney(fee,2)+" 元");
	var realAmount = carry_amount+fee;
	$("#Jcarry_realAmount").html(foramtmoney(realAmount,2)+" 元");
	var acount_balance = total_amount-carry_amount-fee;
	$("#Jcarry_acount_balance_res").val(foramtmoney(acount_balance,2));
	$("#Jcarry_acount_balance").html(foramtmoney(acount_balance,2)+" 元");
}
