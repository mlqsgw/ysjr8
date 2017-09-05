<?php

/**
 * 会员
 */
namespace User\Controller;
use Common\Controller\AdminbaseController;
class ShangchuanController extends AdminbaseController {
	public function doMess(){
		$uid=$_POST['uid'];//获取用户ID
		$upload = new \Think\Upload();// 实例化上传类
		//$upload->maxSize=3145728;//设置附件上传大小
		$upload->exts=array('jpg','gif','png','jpeg');//设置附件上传类型
		$upload->savePath =  '../tpl/simplebootx/Public/user_img_info/'.$uid.'/';// 设置附件上传目录		
		//上传文件
		$info =$upload->upload();

		//上传图片的信息写入到数据库
		foreach ($info as $k=>$v){
			$data['uid']=$uid;
			$data['images_name']=$v['savename'];
			$data['time']=time();
			//var_dump($data);
			M('user_images_info')->add($data);
		}

		if (!$info) {//上传错误提示信息
			$this->error($upload->getError());
		}else{//上传成功  获取上传文件信息
			$this->success('图片添加成功', U("indexadmin/basic_information",array('id'=>$uid)));
		}
	}
	//显示图片列表 
	public function img_lists(){
		//var_dump($_GET);
		$uid=$_GET['uid'];
		$m=M('user_images_info');//实例化一个对象
		if (!empty($_POST)) {//排序
			$Arrange=$m->where('uid='.$uid)->order("arrange asc")->select();//查询数据获取条件
			foreach ($Arrange as $k=>$v){
				$data=$m->where(array('uid'=>$uid,'id'=>$v['id']))
				->order("arrange asc")
				->save(array('arrange'=>$_POST['arrange'][$k]));
			}
		}
		
		
		$arr=$m->where('uid='.$uid)->order("arrange asc")->select();//把m的数据一数组的形式显示出来
		//var_dump($arr);
		$this->assign('uid',$uid);//把arr的数据交个data
		$this->assign('list',$arr);//把arr的数据交个data
		// $images_info=M('user_images_info');
		// $lists=$images_info->field('*')->select();
		// //var_dump($lists);
		$this->display();
	}
	//上传图片页面
	public function index(){
		//$data=M('user_images');
		$this->assign('uid',$uid=$_GET['uid']);
		
		$this->display();
	}
	public function del(){
		$uid=$_GET['uid'];
		//删除数据
		$m=M('user_images_info');
		$id=array('id'=>$_GET['id']);//接收点击删除时传来的id号
		//var_dump($id);exit();
		$images_data=$m->field('images_name')->where($id)->find();//查询图片的名字
		$images_name=$images_data['images_name'];
		$filename ='tpl/simplebootx/Public/user_img_info/'.$uid.'/'.$images_name;//删除文件的路径
		if(unlink ($filename)){//删除本地文件
			$count=$m->where($id)->delete();//删除数据库数据
			if($count>0){
					$this->success('数据删除成功',U("Shangchuan/img_lists",array('uid'=>$uid)));
			}else{
					$this->error('数据删除失败',U("Shangchuan/img_lists",array('uid'=>$uid)));
			}
		}else {
			$this->error('数据删除失败,请查看文件是否存在!',U("Shangchuan/img_lists",array('uid'=>$uid)));
		}
	}
	public function modified(){
		if(!empty($_POST)){
				$uid=$_POST['uid'];
				$id=$_POST['id'];//获取用户ID
				$img_data=M('user_images_info')->where('id='.$id)->find();//查询对应图片信息
				$filename ='tpl/simplebootx/Public/user_img_info/'.$uid.'/'.$img_data['images_name'];//删除文件的路径
				//echo $filename;
				//var_dump($img_data);exit();
				$upload = new \Think\Upload();// 实例化上传类
				//$upload->maxSize=3145728;//设置附件上传大小
				$upload->exts=array('jpg','gif','png','jpeg');//设置附件上传类型
				$upload->savePath =  '../tpl/simplebootx/Public/user_img_info/'.$uid.'/';// 设置附件上传目录		
				//上传文件
				$info =$upload->upload();
				if(unlink ($filename)){
					//上传图片的信息写入到数据库
					foreach ($info as $k=>$v){
						$data['images_name']=$v['savename'];
						$data['time']=time();
						M('user_images_info')->where('id='.$id)->save($data);//修改对应图片信息
					}
	
					if (!$info) {//上传错误提示信息
						$this->error($upload->getError());
					}else{//上传成功  获取上传文件信息
						$this->success('图片修改成功', U("Shangchuan/img_lists",array('uid'=>$uid)));
					}
				}else{
					$this->error('图片修改失败,请查看文件是否存在!',U("Shangchuan/img_lists",array('uid'=>$uid)));
				}
		}else{
			$m=M('user_images_info');
			$id=array('id'=>$_GET['id']);
			$count=$m->where($id)->find();
			$this->assign('data',$count);
			$this->display();
		}
		
	}

}
?>
