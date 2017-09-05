<?php
/**
 * 检查用户是否符合标的要求
 * @param int $loan_id
 * @param int $user_id
 */
function check_loan($loan_id,$user_id){
    //取贷款分类的认证条件
 $loan= M("loan_cate")->field("audit,review")->find($loan_id);
 $user=M("users")->field("datamark,auditamark")->find($user_id);
 $audit=unserialize($loan['audit']);
 $review=unserialize($loan['review']);
 $datamark=unserialize($user['datamark']);
 $auditamark=unserialize($user['auditamark']); 
 $user_info=M("user_info");
 $r=$user_info->where("uid=".$_SESSION["user"]["id"])->find();
 if($r["cellphone_audit"]==1)
 {
	$auditamark[1]="手机认证";	
 }	

 $arr=array();
 $error=false;
 foreach ($audit as $k=>$v){
     if(array_key_exists($k, $auditamark) && $v==$auditamark[$k]){
         $arr['audit'][$k]=array('color'=>'green','value'=>$v);
     }else{
         $arr['audit'][$k]=array('color'=>'red','value'=>$v);
         $error=true;
     }
 }
 foreach ($review as $k=>$v){
     if(array_key_exists($k, $datamark) && $v==$datamark[$k]){
         $arr['review'][$k]=array('color'=>'green','value'=>$v);
     }else{
         $arr['review'][$k]=array('color'=>'red','value'=>$v);
         $error=true;
     }
 }
$result=array('data'=>$arr,'error'=>$error);
 return $result; 

}

