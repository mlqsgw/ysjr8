<?php
namespace Admin\Controller;
//use Common\Controller\AdminbaseController;
use Common\Controller\AppframeController;
/**
 * 认证模版解析
 * @author 2
 *
 */
class TemAuthController extends AppframeController{
	
	private  $CacheFile; //缓存文件
	private  $TempFile;	 //模版文件
   /**
    * 获取模块的add模版
    * @param $mid  模型id
    * @param $dir  A:F 前后台模版
    * */
   public function addtemp($mid,$dir="A")
   {
   //	$result=$this->ModeData($mid);
   //	print_r($result);die();
   	 return $this->seachTem("addtemp",$mid,$dir); 
   }
   private function setFileDir($name,$mid,$dir)
   {
	   	$pix=$dir=="A"?"Admin_":"Font_";
	   	$Suffix=".html";
	   	$fileDir=SITE_PATH."/data/temAuth/";
	   	$curFileName=$pix.$name;
	   	$this->CacheFile=$fileDir."Cache/".md5($curFileName.$mid).$Suffix;
	   	$this->TempFile=$fileDir."Template/".$curFileName.$Suffix;
   
   }
   private function seachTem($name,$mid,$dir)
   {
 		$this->setFileDir($name, $mid, $dir);
   		// 页面缓存
   		if(file_exists($this->CacheFile) && filemtime($this->CacheFile)>filemtime($this->TempFile))
   		{
   			return file_get_contents($this->CacheFile);
   		}else{
   			ob_start();
   			ob_implicit_flush(0);
			$result=$this->ModeData($mid);	
			 include $this->TempFile; 		
			 $content = ob_get_clean();
			 file_put_contents($this->CacheFile, $content);
   			return $content;
   		}
   }
   /**
    *  获取预览模版
    *  @param $mid 模版id
    *  @param $arr 数据值数组 一维数组
    *  @param $dir  A:F 前后台模版
    *  @param $type see:edit 查看或修改模版
    *  @param $usergreat 查看用户的vip等级
    */
   public function getTemp($mid,$arr,$type="see",$dir="A",$usergreat=0)
   {
   		$modtemp=$type=="see"?"chakan":"edit";
   		$this->setFileDir("$modtemp", $mid, $dir);
   		if(!file_exists($this->TempFile)) return "模版不存在";
   		ob_start();
   		ob_implicit_flush(0);
   		$result=$this->ModeData($mid);
   		$level=M("user_level")->getField("id,name");
   		include $this->TempFile;
   		$content = ob_get_clean();
   		return $content;
   }
   private function ModeData($mid)
   {
   		if(empty($mid)) return false;
   		$where["m_id"]=$mid;
   		$result=M("data_field")->where($where)->select();
   		if(!$result) return false;
   		//处理默认值
   		$data=array();
   		foreach($result as $key=>$val)
   		{
   			$val["default"]=$this->DealData($val["default"]);
   			//$result[$key]=$val;
   			$data[$val["field"]]=$val;
   		}
   		return $data;
   }
  /***
   * 处理默认值或者选项值 
   */ 
  private function DealData($val)
  {
  	$temp=array();
  	$data=array();
  	if(empty($val)) return "";
 	if(strpos($val,"|"))	//查找是否至少存在1行数据
 	{
 		if(strpos($val,"*")) //查找是否是多行数据
 		{
 			$temp=explode("*", $val);		
 		}else{
 			$temp[]=$val;	
 		}	
 		$temp=array_filter($temp);
 	 	foreach($temp as $k=>$v)
 	 	{
 	 		unset($temStr);
 	 		$tempStr=explode("|",$v);		
 	 		$data[$tempStr[0]]=$tempStr[1];
 	 	}
 	 	
 		return $data;
 	}
 	return $val;
  }

  /***
   * 
   * 
   */
   public function insertData($mid)
   {
   		$model=M("data_table_{$mid}");
   		$u_id=I("post.u_id");
   		if(empty($u_id)) return "用户信息丢失";
   		//获取用户登录名
   		$where["id"]=$u_id;
   		$where["user_type"]=2;
   		$userInfo=M("users")->where($where)->find();
   		if(!$userInfo) return "不存在此用户";
   		$result=$this->ModeData($mid);
   		unset($_POST["mid"]);
   		foreach($_POST as $k=>$v)
   		{
   			if(isset($result[$k]))
   			{
   				 if(empty($v)){ return $result[$k]["name"]."不能为空";  }
	   			 if(is_array($v))
	   			 {
	   			 	$data[$k]=implode(",",$v);
	   			 }else{
	   			 	$data[$k]=$v;
	   			 }
   			}
   		}
   		$data["user_login"]=$userInfo["user_login"];
   		$data["sys_lodata"]=time();
   		$data["u_id"]=$u_id;
   		$jg=$model->add($data);
   		return $jg?true:false;	
   }
   public function editData($mid)
   {
   		$model=M("data_table_{$mid}");
   		$id=I("get.id");
   		if(empty($id)) return "数据信息丢失";
   		//获取用户登录名
   		$where["id"]=$id;
   		$Info=$model->where($where)->find();
   		if(!$Info) return "不存在此信息";
   		$result=$this->ModeData($mid);
   		unset($_POST["mid"]);
   		foreach($_POST as $k=>$v)
   		{
   			if(isset($result[$k]))
   			{
   				if(empty($v)){ return $result[$k]["name"]."不能为空";  }
   				if(is_array($v))
   				{
   					$data[$k]=implode(",",$v);
   				}else{
   					$data[$k]=$v;
   				}
   			}
   		}
   		$data["sys_updata"]=time();
   		$jg=$model->where($where)->save($data);
   		return $jg?true:false;
   
   }

   
   
   /**
    * 删除缓存模版 
    */
   public function TempDel()
   {
   		$fileDir=SITE_PATH."/data/temAuth/Cache/";
   		//先删除目录下的文件：
   		$dh=opendir($fileDir);
   		while ($file=readdir($dh)) {
   			if($file!="." && $file!="..") {
   				$fullpath=$fileDir."/".$file;
   				if(!is_dir($fullpath)) {
   					unlink($fullpath);
   				} else {
   					$this->TempFile($fullpath);
   				}
   			}
   		}
   }
   
	
}
