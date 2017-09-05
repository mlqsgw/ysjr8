<?php
/**
 * 我要贷款
 */
namespace Loan\Controller;
use Common\Controller\HomeBaseController;
class BorrowController extends HomeBaseController {
	
	function index(){
		$uid=sp_get_current_userid();
		$a = 0;//会员是否符合申请条件 0为符合
		//判断会员是否登陆
		if(empty($uid)){
			$a = 1;
		}else{
			$users = M("users")->field("datamark,auditamark")->where("id=".$uid)->find();
			$datamark = unserialize($users['datamark']);//资料认证
			$this->assign("datamark",$datamark);
			$auditamark = unserialize($users['auditamark']);//个人认证
			$this->assign("auditamark",$auditamark);
		}
		
		$content = M("loan_cate")->where(array('NewSign'=>0))->order("id desc")->select();
		foreach($content as $key=>$value){
			$content[$key]['ks'] = $a;
			$content[$key]['audit'] = unserialize($value['audit']);
			$content[$key]['review'] = unserialize($value['review']);
			$sum = count(array_intersect($content[$key]['audit'],$auditamark));
			$sums = count(array_intersect($content[$key]['review'],$datamark));
			//判断会员个人认证是否符合申请
			if(count($content[$key]['audit']) != $sum){
				$content[$key]['ks'] = 1;
				continue;
			}
			//判断会员资料认证是否符合申请
			if(count($content[$key]['review']) != $sums){
				$content[$key]['ks'] = 1;
			}
		}
		
		$this->assign("content",$content);
		$this->display();
	}
	
	//资粮申请贷款
	function inapply(){
		if(IS_POST){
			$p = I("post.");
			$uid=sp_get_current_userid();
			if($uid){
				$data['uid'] = $uid;
				$data['user_name'] = $_SESSION['user']['user_login'];
			}
			
			$re = "/^[1-9][0-9]*$/";
			if($p['money']=="" || !preg_match($re, $p['money']) || $p['money']<1 || $p['money']>30){
				$this->error("请正确输入借款金额");
			}
			
			if(trim($p['real_name'])==""){
				$this->error("请输入真实姓名");
			}
			
			$re = "/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/";
			if($p['phone']=="" || !preg_match($re, $p['phone'])){
				$this->error("请正确输入手机号码");
			}
			
			if(!empty($p['email'])){
				$re = "/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/";
				if( !preg_match($re, $p['email'])){
					$this->error("请正确输入电子邮箱");
				}
			}
			
			$re = "/^[0-9]{17}[0-9|x|X]$/";
			if($p['Idcard']==""){
				$this->error("请输入身份证号");
			}else{
				if(!$this->idcard_checksum18($p['Idcard'])){
					$this->error("身份证号不合法");
				}
			}
			
			if(($p['s_province']=="台湾省" && $p['s_city']=="地级市")||($p['s_province'] !="台湾省" && $p['s_county']=="市、县级市")){
				$this->error("请正确输入居住城市");
			}

			if($p['city_time']==""){
				$this->error("请输入城市起始居住时间");
			}
			
			if($p['place_time']==""){
				$this->error("请输入住宅起始居住时间");
			}
			
			if($p['work_time']==""){
				$this->error("请输入工作起始时间");
			}
			
			$re = "/^[1-9][0-9]*$/";
			if($p['card_income']=="" || !preg_match($re, $p['card_income'])){
				$this->error("请正确输入每月税后银行卡收入");
			}
			
			if($p['montyly_income']=="" || !preg_match($re, $p['montyly_income'])){
				$this->error("请正确输入每月税后现金收入");
			}
			
			$data['money'] =$p['money'];
			$data['loan_type'] =$p['loan_type'];
			$data['Inform'] =$p['Inform'];
			$data['real_name'] =$p['real_name'];
			$data['phone'] =$p['phone'];
			$data['email'] =$p['email'];
			$data['Idcard'] =$p['Idcard'];
			$data['education'] =$p['education'];
			
			$data['marriage'] =$p['marriage'];
			$data['credit'] =$p['credit'];
			$data['loan'] =$p['loan'];
			$data['native_place'] =$p['s_province']."|".$p['s_city']."|".$p['s_county'];
			$data['city_time'] =$p['city_time'];
			$data['place_type'] =$p['place_type'];
			$data['place_time'] =$p['place_time'];
			$data['house_property'] =$p['house_property'];
			$data['house_loan'] =$p['house_loan'];
			$data['work_type'] =$p['work_type'];
			$data['work_time'] =$p['work_time'];
			$data['income_type'] =$p['income_type'];
			$data['card_income'] =$p['card_income'];
			$data['montyly_income'] =$p['montyly_income'];
			$data['time'] = date("Y-m-d H:i:s",time());
			
		    if(!!$id=M("loan_apply")->add($data)){
    				$this->success("申请提交成功");
    			}else{
    				$this->error("申请提交失败");
    			}

			
			
		}else{
			//借款用途
			$loan_type=M("loan_type")->field("id,t_name")->select();
			$this->assign("loantype",$loan_type);
			//贷款类型
			$content = M("loan_cate")->field("id,cat_name,borrowing_time_shortest,borrowing_time_longest,payback")->select();
			$this->assign("content",$content);
			$this->display();
		}
	}
	
	
	//申请贷款
    function apply(){
    	$uid=sp_get_current_userid();
    	if(empty($uid)){
    		$this->error("请先登陆");
    	}
    	if(IS_POST){
    		$p = I("post.");
    		//先判断这个用户是不是符合条件
    		$result=check_loan($p['cate_id'],$uid);
    		if($result['error'] || $uid !=$p['user_id']){
    			$this->error("该用户不符合该贷款的资料认证条件");
    		}else{
    			if($p['name']==""){
    				$this->error("标名称不能为空");
    			}
    			/*if($p['sub_name']==""){
    				$this->error("简短名称不能为空");
    			}*/
    			$cate_mod=M("loan_cate")->find($p['cate_id']);
    		
    			//借款金额
    			if($p['borrow_amount'] > $cate_mod['amount']){
    		
    				$this->error("借款金额不能大于{$cate_mod['amount']}");
    			}
    			//年利率
    			if($p['rate']<C('sys_loans_lowest_apr') ||$p['rate']> C('sys_loans_highest_apr') ){
    				$this->error("贷款利率请在{C('sys_loans_lowest_apr')}到{C('sys_loans_highest_apr')}之间");
    			}
    			//筹标期限
    			if($p['deadline']>$cate_mod['deadline']){
    				$this->error("筹标期限不能大于{$cate_mod['deadline']}");
    			}
    
    			//序列号用户要显示的资料
    			$p['userdata']=serialize($p['userdata']);

    			//创建时间
    			$p['user_login']=$_SESSION['user']['user_login'];    			$p['create_time']=time();
    			$p['deal_status']=0;
    			$p['listorder'] = 255;
    			//借款周期
    			$cRate='\Common\Lib\Loan\\'.$p['loantype'];
    			$p['repay_nper']=$cRate::getNper($p['repay_time']);
    			if($p['repay_nper']<=0){
    				$this->error("借款还款总期数出现错误");
    			}
    			// 0 待审核	1审核通过	2审核失败	3用户取消	4流标	5满标待审核		6满标审核失败	7还款中	8逾期中	9已完成
    		
    			if(!!$id=M("loan")->add($p)){
    				userLog("贷款申请提交成功，待审核！");
    				loanLog("创建标", $id);
    				$this->success("申请成功");
    			}else{
    				$this->error("申请失败");
    			}
    		}
    	}else{
    		$id = I("get.id");
    		$content = M("loan_cate")->where("id=".$id)->find();
    		$Review = unserialize($content['review']);//资料认证
    		$this->assign("reviews",$Review);
    		
    		$result=check_loan($id,$uid);
    		if($result['error']){
    			$this->success("必要申请条件未认证",U('user/audit/index'));
    		}
    		
    		//借款用途
    		$loan_type=M("loan_type")->field("id,t_name")->select();
    		//担保公司
    		$agency=M("loan_agency")->where("is_effect=1")->select();
    		//资料认证
    		$users = M("users")->field("datamark,auditamark")->where("id=".$uid)->find();
    		$datamark = unserialize($users['datamark']);
    		$this->assign("datamark",$datamark);
    		$this->assign("loantype",$loan_type);
    		$this->assign("agency",$agency);
    		$this->assign("uid",$uid);
    		$this->assign($content);
    		$this->display();
    	}
    }
    
    
    //得到贷款所需的利息
    function countRate(){
    	$p = I("post.");
    	$cRate='\Common\Lib\Loan\\'.$p['loantype'];
    	$zonglixi = $cRate::countRate($p['borrowamount'],$p['apr']/100/12,$p['repaytime']);
    	//每期管理费
    	$money = $cRate::getNperManage(C('sys_borrow_manage_fee'));
    	$money = $money/100;
    	if($zonglixi){
    		$data['status'] = 1;
    		$data['info'] = $zonglixi;
    		$data['money'] = $money;
    	}else{
    		$data['status'] = 0;
    		$data['info'] = '总利息返回出错';
    	}

    	
    	$data = json_encode($data);
    	echo $data;
    }
    
    //身份证验证
    public function idcard_checksum18($idcard){
    	if (strlen($idcard) != 18){ return false; }
    	$aCity = array(11 => "北京",12=>"天津",13=>"河北",14=>"山西",15=>"内蒙古",
    			21=>"辽宁",22=>"吉林",23=>"黑龙江",
    			31=>"上海",32=>"江苏",33=>"浙江",34=>"安徽",35=>"福建",36=>"江西",37=>"山东",
    			41=>"河南",42=>"湖北",43=>"湖南",44=>"广东",45=>"广西",46=>"海南",
    			50=>"重庆",51=>"四川",52=>"贵州",53=>"云南",54=>"西藏",
    			61=>"陕西",62=>"甘肃",63=>"青海",64=>"宁夏",65=>"新疆",
    			71=>"台湾",81=>"香港",82=>"澳门",
    			91=>"国外");
    	//非法地区
    	if (!array_key_exists(substr($idcard,0,2),$aCity)) {
    		return false;
    	}
    	//验证生日
    	if (!checkdate(substr($idcard,10,2),substr($idcard,12,2),substr($idcard,6,4))) {
    		return false;
    	}
    	$idcard_base = substr($idcard, 0, 17);
    	if ($this->idcard_verify_number($idcard_base) != strtoupper(substr($idcard, 17, 1))){
    		return false;
    	}else{
    		return true;
    	}
    }
    
    // 计算身份证校验码，根据国家标准GB 11643-1999
    public function idcard_verify_number($idcard_base){
    	if (strlen($idcard_base) != 17){ return false; }
    	// 加权因子
    	$factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    
    	// 校验码对应值
    	$verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
    
    	$checksum = 0;
    	for ($i = 0; $i < strlen($idcard_base); $i++){
    		$checksum += substr($idcard_base, $i, 1) * $factor[$i];
    	}
    
    	$mod = strtoupper($checksum % 11);
    	$verify_number = $verify_number_list[$mod];
    
    	return $verify_number;
    }
	
	
}