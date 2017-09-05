<?php
/**
 * 等级设置
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class LevelController extends AdminbaseController
{
        //列表
        public function index(){
            adminLog("修改积分设置");
                $this->list=M("user_level")->select();
                $this->display();
              
            }
    
       //添加 
        public function add(){       
            if(IS_POST){
                $p=I('post.');                
                if(!is_numeric($p['min']) || !is_numeric($p['max']) ){
                    $this->error("值必须是数字");
                }
                if(M("user_level")->where(array("name"=>$p['name']))->count()>0){
                    $this->error("重复的等级名称");
                }
                
                if(M("user_level")->add($p)){
                    if($this->upconfig()){
                        $this->success("添加成功");
                    }else{
                        $this->error("添加失败");
                    }
                }else{
                    lastsql();
                    $this->error("添加失败");
                }
            }else{          
                $this->display();
            }
            
        }
        //上传图片
        public function upimg(){
            $config=array(
                'rootPath' => './'.C("UPLOADPATH"),
                'savePath' => './Level/',
                'maxSize' => 512000,//500K
                'saveName'   =>    array('uniqid',''),
                'exts'       =>    array('jpg', 'png', 'jpeg','gif'),
                'autoSub'    =>    false,
            );
            $upload = new \Think\Upload($config);//
            $info=$upload->upload();
        	//开始上传
        	if ($info) {
        	//上传成功
        	//写入附件数据库信息
        		$first=array_shift($info);
        		$file=$first['savename'];           		     		
        		$this->ajaxReturn(array("file"=>$file),"上传成功！",1,"AJAX_UPLOAD");
        	} else {
        		//上传失败，返回错误
        		$this->ajaxReturn(array(),$upload->getError(),0,"AJAX_UPLOAD");
        	}
        }
        //编辑
        public function edit(){
            $id=I("get.id");        
            if(IS_POST){
                $p=I('post.'); 
                if(!is_numeric($p['min']) || !is_numeric($p['max']) ){
                    $this->error("值必须是数字");
                }
                if(isset($p['file'])) unset($p['file']);
                if(M("user_level")->where(array("id"=>$id))->save($p)){
                    if($this->upconfig()){
                        $this->success("更新成功");
                    }else{
                        $this->error("更新失败");
                    }
                }else{
                    $this->error("更新失败");
                }
                
            }else{
                $this->assign("id",$id);        
                $this->res= M("user_level")->find($id);
                $this->display();
            }      
        }
        //删除
        public function del(){
            $id=I("get.id","");
           /*  if($id!=""){
                $res=M("user_level")->find($id); 
                //删除图片 
                unlink($res['img']);                            
                if(M("user_level")->delete($id)){
                    if($this->upconfig()){
                        $this->success("删除成功");
                    }else{
                        $this->error("删除失败");
                    }
                }else{
                    $this->error("删除失败");
                } 
            }*/
        }
        
        private function upconfig(){  
            $conf=M("user_level")->getField("id,name,img,min,max");           
            F("user_level",$conf);
            return true; 
        }
    
}

?>