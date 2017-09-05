<?php
namespace Admin\Controller;

use Common\Controller\AdminbaseController;

class PayController extends AdminbaseController
{
    //在线支付
    public function online(){   
        $this->list=M("pay_config")->where(array("type"=>1))->select();
        
        $this->display();
    }
    /**
     * 配置
     */
    public function config(){     
       $id=I("get.id","");        
       $res=M("pay_config")->find($id); 
       $this->assign("res",$res);
       $this->display();        
    }    
    
    /**
     * 更新配置
     */

    public function config_updata(){
       $id=I("get.id","");       
       $post=I("post.");
       if(M("pay_config")->where(array("id"=>$id))->save(array("config"=>serialize($post)))){
           $this->upcache();
           $this->success("更新成功");
                     
       } else{
           $this->error("更新失败");
       }
    }
    //线下银行
    public function linebank(){
        $this->list=M("pay_config")->where(array("type"=>2))->select();
        $this->display();
    }
    /**
     * 添加
     */
    public function add(){
        if(IS_POST){               
            $data['name']=I("post.name");
            $data['state']=I("post.state");
            $data['logo']=I("post.logo");
            $data['type']=2;      
            $data["config"]=serialize(array("subname" => I("post.subname"),"receiver"=>I("post.receiver"),"account"=>I("post.account")));
         
            $data['param']=serialize(array("subname" => "支行名称","receiver"=>"收款人姓名","account"=>"收款人帐号"));
            if(M("pay_config")->add($data)){
                $this->upcache();
                $this->success("更新成功");
            }else{
                $this->error("添加失败");
            }
            
        }else{
            $this->display();
        }
        
    }
    //编辑
   public function edit(){
       $id=I("get.id");
       if(IS_POST){
        $data['name']=I("post.name");
            $data['state']=I("post.state");
            $data['logo']=I("post.logo");
            $data['type']=2;      
            $data["config"]=serialize(array("subname" => I("post.subname"),"receiver"=>I("post.receiver"),"account"=>I("post.account")));
         
            $data['param']=serialize(array("subname" => "支行名称","receiver"=>"收款人姓名","account"=>"收款人帐号"));
            if(M("pay_config")->where(array("id"=>$id))->save($data)){
                $this->upcache();
                $this->success("更新成功");
            }else{
                $this->error("更新失败");
            }
           
       }else{
           $this->assign("id",$id);
           $res=M("pay_config")->find($id);
           $this->assign("res",$res);
           $config=unserialize($res['config']);
           $this->assign("config",$config);
           $this->display("add");
       }
   }
    ///开启或者停用
    public function isok(){
        $id=I("get.id",0);
        $state=I("get.state",0);
        if(M(pay_config)->where(array("id"=>$id))->save(array("state"=>$state))){
              $this->upcache();
           $this->success("更新成功");
        } else{
           $this->error("更新失败");
       }
        
    }
    //更新缓存
   private   function upcache(){
        $list=M("pay_config")->where(array("state"=>1))->getField("id,type,value,name,config,logo");
        F("pay_config",$list);
    }
}

?>