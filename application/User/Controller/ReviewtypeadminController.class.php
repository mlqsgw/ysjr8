<?php
/**
 * 资料审核
 */
namespace User\Controller;

use Common\Controller\AdminbaseController;

class ReviewtypeadminController extends AdminbaseController
{
    
   
    //资料设置
    public function setting(){
        $this->list=M("data_model")->select();             
        $this->display();
    }
    //添加新类型
    public function add(){
        if(IS_POST){
          $p=I("post.");
          if(!M("data_model")->where(array("name"=>$p['name']))->count()>0){
              $id=M("data_model")->add($p);
              if($id){
                  //返回了的有一个ID 就改创建数据库了
                $sql="CREATE TABLE IF NOT EXISTS `ac_data_table_{$id}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `sys_img` varchar(300) NOT NULL,
  `sys_lodata` int(11) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `sys_audata` int(11) NOT NULL DEFAULT '0' COMMENT '认证时间',
  `sys_updata` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sys_state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0待审核1通过2没有通过',
  `audit_id` int(11) NOT NULL DEFAULT '0' COMMENT '认证操作人ID',
  `user_login` varchar(60) NOT NULL DEFAULT '0' COMMENT '用户登录名称',
  `sys_shuoming` varchar(200) NOT NULL COMMENT '用户留言',
  `sys_remark` varchar(200) NOT NULL COMMENT '管理备注',
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `user_login` (`user_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
                
                $mod=new \Org\Util\Msqlstruct(); 
                if($mod->createTable($sql,"data_table_{$id}")){
                    //先往字段表里面添加一个 图片字段                       
                    M('data_field')->addAll( array(
                    array( 
                        'field'=> 'sys_img',
                        'name'=>'图片',
                        'attribute'=>'varchar',
                        'length'=>250,
                        'type'=>'thumb',
                        'm_id'=>$id,   
                    ),
                    array(
                        'field'=>'sys_shuoming',
                        'name'=>"说明",
                        'attribute'=>'varchar',
                        'length'=>'200',
                        'type'=>'textarea',
                        'm_id'=>$id,
                    )
                    ));
                 
                    
                    //添加菜单                  
                    $menu=array(
                        'parentid' => 590,
                        'name' =>$p['name'],
                        'app' => 'User',
                        'model' => 'Reviewadmin',
                        'action' => 'index',
                        'data' => "mid=$id",
                        'status' => 1,
                        'type' => 1,
                    );
                    $menuid=D("Common/Menu")->add($menu);                    
                    if(M("data_model")->where(array("id"=>$id))->save(array("menu"=>$menuid))){
                        adminLog("添加{$p['name']}资料认证类型");
                        $this->success("添加成功");
                    }else{
                       $this->error("添加菜单失败");
                    }
                    
                }else{
                    $this->error("添加数据库失败");
                }
               
              }else{
                  $this->error("添加新类型失败");
              }
          }else{
              $this->error("重复的资料类型名称");
          }
        }else{
            $this->display();
        }
       
    }
    //编辑类型
    public function edit(){
        $id=I("get.id");  
        if(IS_POST){
            $p=I("post.");
            if(M("data_model")->where(array("id"=>$id))->save($p)){
                $res=M("data_model")->field("menu,name")->find($id); 
                //如果菜单名字没有变就不修改了
                if($p['name']==$res['name']){
                    $this->success("修改成功");
                }else{
                    //编辑菜单
                    $menu=array(
                        'name' =>$p['name']
                    );
                    if(D("Common/Menu")->where(array("id"=>$res['menu']))->save($menu)){
                        adminLog("编辑{$p['name']}资料认证类型");
                        $this->success("修改成功");
                    }else{
                        $this->error("修改菜单失败");
                    }
                }
              
            }else{
                $this->error("修改失败");
            }
            
        }else{
            $this->assign("id",$id);
            $this->res=M("data_model")->find($id);
            $this->display("add");
        }
    }
   //删除类型
   public function del(){
   	 $this->DelTemCache();
       $id=I("get.id","");
       if($id!==""){
           $mod=new \Org\Util\Msqlstruct();
          if( $mod->dropTable("data_table_{$id}")){              
             //删除字段
             M("data_field")->where(array("m_id"=>$id))->delete();   

             //得到菜单ID 
             $menuid=M("data_model")->where(array("id"=>$id))->getField("menu");            
        
             if(D("Common/Menu")->delete($menuid)){
                 if(M("data_model")->delete($id)){ 
                     adminLog("删除id={$id}资料认证类型");
                     $this->success("删除成功");
                 }else{
                     $this->error("删除失败");
                 }
             }else{
                 $this->error("删除菜单失败");
             }
          }else{
               $this->error("删除表失败");
          }
       }
   }
   //排序
   public function listorders() {
       $status = parent::_listorders(M("data_field"));
       if ($status) {
           adminLog("更新字段排序");
           $this->success("排序更新成功！");
       } else {
           $this->error("排序更新失败！");
       }
   }
    //字段配置  字段列表
    public function field(){
        $mid=I("mid","");
        $this->assign("mid",$mid);
        $this->list=M("data_field")->where(array('m_id'=>$mid))->order("listorder asc")->select();        
        $this->display();
    }
    //添加字段
    public function addfield(){
    	
        $mid=I("get.mid");
        $this->assign("mid",$mid);
        if(IS_POST){     

        	$this->DelTemCache();
           $p=I("post.");
        
           if($p['length']==""){
               $this->error("必须填写字段长度");
           }  
           //日期 
           if($p['type']=="date"){
               $p['attribute']="int";
               $p['length']=11;               
           }
           //图片
           if($p['type']=="thumb"){
               $p['attribute']="varchar";
               $p['length']=250;
           }
           /*<option value="text" selected="">单行文本(text)</option>
            <option value="textarea">多行文本(textarea)</option>
            <option value="select">下拉框(select)</option>
            <option value="radio">单选框(radio)</option>
            <option value="checkbox">多选框(checkbox)</option>
            <option value="date">日期选择</option>
            <option value="thumb">图片上传</option> */
           $mod=new \Org\Util\Msqlstruct();
           $mid=$p['m_id'];
           /*
            * 字段信息数组处理，供添加更新字段时候使用
            * info[name]   字段名称
            * info[type]   字段类型
            * info[length]  字段长度
            * info[isNull]  是否为空
            * info['default']   字段默认值
            * info['comment']   字段备注
            */
           $info=array(
               'name' =>strtolower($p['field']),
               'type' =>$p['attribute'],
               'length' =>$p['length'],
           );    
         
           //先检测这个字段是否存在
           if(M("data_field")->where(array("field"=>$p['field'],'m_id'=>$mid))->count()>0 || $mod->checkField("data_table_{$mid}",$p['field'])){
               $this->error("已经存在的字段");
           }
           if($mod->addField("data_table_{$mid}", $info)){
               if(M("data_field")->add($p)){                  
                   adminLog("添加字段");
                   $this->success("添加成功");
               }else{
                   lastsql();
                   $this->error("添加失败");
               }
           }else{
               $this->error("添加字段失败");
           }
           
            
        }else{
          $this->permis=M("user_level")->field("id,name")->select();
          $this->display();
        }
    }
    //编辑字段
    public function editfield(){      
    	
        if(IS_POST){   
        	$this->DelTemCache();
            $p=I("post.");            
            if($p['length']==""){
                $this->error("必须填写字段长度");
            }
            //日期
            if($p['type']=="date"){
                $p['attribute']="char";
                $p['length']=10;
            }
            //图片
            if($p['type']=="thumb"){
                $p['attribute']="varchar";
                $p['length']=250;
            }         
      
            $mod=new \Org\Util\Msqlstruct();
            $mid=$p['m_id'];
            /*
             * 字段信息数组处理，供添加更新字段时候使用
             * info[name]   字段名称
             * info[type]   字段类型
             * info[length] 字段长度          
             */
            $info=array(
                'name' =>strtolower($p['field']),
                'type' =>$p['attribute'],
                'length' =>$p['length'],
            );
            $mid=$p['m_id'];          
             
            //先检测这个字段是否存在
            if(M("data_field")->where(array("field"=>$p['field'],'m_id'=>$p['m_id'],'id'=>array("neq",$p['id'])))->count()>0 ){
                $this->error("已经存在的字段,不能修改");
            }
            $oldfield=M("data_field")->where(array('id'=>$p['id']))->getField("field");
            //新字段名称和老字段名称是否相同
            if($oldfield !=$p['field']){
                //不同了连表名一块修改
                if($mod->changeField("data_table_{$mid}",$oldfield,$info)){
                    if(M("data_field")->save($p)){
                        adminLog("编辑字段");
                        $this->success("修改成功");
                    }else{
                        //lastsql();
                        $this->error("修改失败");
                    }
                }else{
                    $this->error("修改字段失败");
                }
                
            }else{
                //相同了就直接修改字段类型
                if($mod->editField("data_table_{$mid}", $info)){
                    if(M("data_field")->save($p)){
                        $this->success("修改成功");
                    }else{
                        lastsql();
                        $this->error("修改失败");
                    }
                }else{
                    $this->error("修改字段失败");
                } 
            } 
        }else{
            $fid=I("get.fid");
            $this->res=M("data_field")->find($fid);
            
            $this->permis=M("user_level")->field("id,name")->select();
            $this->display();
        }
    }
    //删除字段
    public function delfield(){
    	$this->DelTemCache();
        $id=I("get.fid");
        $res=M("data_field")->field("m_id,field")->find($id);
        $mod=new \Org\Util\Msqlstruct();        
        if($mod->dropField("data_table_{$res['m_id']}", $res['field'])){
           
            if(M("data_field")->delete($id)){
                adminLog("删除字段");
                $this->success("删除成功");
            }else{
                $this->error("删除失败");
            }
        }else{
            $this->error("删除字段失败");
        }      
     
    }
   	private function DelTemCache()
   	{
   		$temAuth=A("Admin/TemAuth");
   		$temAuth->TempDel();
   		
   	}
    
    
}

?>