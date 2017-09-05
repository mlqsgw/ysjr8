<?php

/**
 * 贷款后台管理
 */
namespace Loan\Controller;
use Common\Controller\AdminbaseController;
class IndexadminController extends AdminbaseController {
  public  function index(){       
      $Model = D("LoancateView");     
      $this->lists=$Model->order("listorder asc")->select();    
      $this->display();
  }

  private function arrVal($key,$val){
      $temp=array();
      foreach ($key as $v){
          $temp[$v]=$val[$v];
      }
      return $temp;
  }
    
   public function add(){
       if(IS_POST){
           //认证
          $audit=array(1=>'手机认证',2=>'邮箱认证',3=>'实名认证',4=>'视频认证',5=>'现场认证');      
        
          
          $p=I("post.");
          $review_name=$p['review_name'];
       
           $data=array(
               'cat_name'=>$p['cat_name'],
               'introduction'=>$p['introduction'],
               'terms_id'=>$p['terms_id'],
               'borrowing_time_longest'=>$p['borrowing_time_longest'],
               'borrowing_time_shortest'=>$p['borrowing_time_shortest'],
               'deadline'=>$p['deadline'],
               'amount'=>$p['amount'],
               'listorder'=>$p['listorder'],
               'borrow_success_fee'=>$p['borrow_success_fee'],
               'payback'=>serialize($p['payback']),
               'audit'=>serialize($this->arrVal($p['audit'], $audit)),
               'review'=>serialize($this->arrVal($p['review'],$review_name)),
           );         
        
            if(M("loan_cate")->add($data)){
                $this->success("添加成功");
            }else{
                
                $this->error("添加失败");
            }
           
       }else{
           //文章列表
           $join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
           $this->article=M("term_relationships")->alias("a")->join($join)->where("term_id=1")->field("id,post_title")->select();
           //认证资料
           $this->Review=M("data_model")->field("id,name")->select();
           //贷款方式
           $this->payback=M("loan_repay_type")->select();
          
           $this->display();
       }
      
   }
   public function del(){
      $id=I("get.id");
      if(M("loan_cate")->delete($id)){
          $this->success("删除成功");
          }else{
              $this->error("删除失败");
       }
   }
   public function edit(){
       $id=I("get.id");
       if(IS_POST){
          //认证
          $audit=array(1=>'手机认证',2=>'邮箱认证',3=>'实名认证',4=>'视频认证',5=>'现场认证');      
          
           $p=I("post.");
           $review_name=$p['review_name'];
           $data=array(
               'cat_name'=>$p['cat_name'],
               'introduction'=>$p['introduction'],
               'terms_id'=>$p['terms_id'],
               'borrowing_time_longest'=>$p['borrowing_time_longest'],
               'borrowing_time_shortest'=>$p['borrowing_time_shortest'],
               'deadline'=>$p['deadline'],
               'amount'=>$p['amount'],
               'listorder'=>$p['listorder'],
               'payback'=>serialize($p['payback']),
               'borrow_success_fee'=>$p['borrow_success_fee'],
               'audit'=>serialize($this->arrVal($p['audit'], $audit)),
               'review'=>serialize($this->arrVal($p['review'],$review_name)),
               'id'=>$id
           );
        
            if(M("loan_cate")->save($data)){
                $this->success("修改成功");
            }else{
                $this->error("修改失败");
            }
           
           
       }else{
         
           $this->res=M('Loan_cate')->find($id);                 
           //文章列表
           $join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
           $this->article=M("term_relationships")->alias("a")->join($join)->where("term_id=1")->field("id,post_title")->select();
           //认证资料
           $this->Review=M("data_model")->field("id,name")->select();
           //贷款方式
           $this->payback=M("loan_repay_type")->select();
          
           $this->display();
       }  
   }
  
}
?>
