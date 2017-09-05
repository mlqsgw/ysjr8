<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 文章列表
*/
class ListController extends HomeBaseController {

	//文章内页
	public function index() {
		
		$Fterm=$this->nav_list();
		$id=$_GET["id"];
		if(isset($_GET['id']))
		{	$r=M("terms");
			$term=$r->where("term_id=".$id)->find();
			//$term=sp_get_term($_GET['id']);
		}
		
		$term=is_array($term)?$term:$Fterm;
		//获取文章列表
		
		
		$this->articleList($term["term_id"]);
		
		$tplname=$term["list_tpl"];
    	//$tplname=sp_get_apphome_tpl($tplname, "list");
    	$this->assign($term);
		
    	//$this->assign('cat_id', intval($_GET['id']));
    	//$this->display(":$tplname");
    	$this->display(":list");
	}
	
	public function nav_index(){
		$navcatname="文章分类";
		$datas=sp_get_terms("field:term_id,name");
		$navrule=array(
				"action"=>"List/index",
				"param"=>array(
						"id"=>"term_id"
				),
				"label"=>"name");
				
		exit(sp_get_nav4admin($navcatname,$datas,$navrule));
		
	}
	/**
	 * 获取所有的文章分类 并返回第一个分类的id值 
	 */
	private function nav_list()
	{
		static $navlist=array();
		if(empty($navlist))
		{
			$navlist=sp_get_terms("");
		}
		$this->assign("navlist",$navlist);
		
		return reset($navlist);
	
	}
	/**
	 * 获文章下的分类
	 */
	private function articleList($tid)
	{
		$rs= M("Posts");
		$where['p.post_status'] = array('eq',1);
		$id=intval($tid);
		
		$where["b.term_id"]=$id;
		
		$join = "".C('DB_PREFIX').'term_relationships as b on p.id =b.object_id';
		$count=M("Posts")->alias("p")->join($join)->where($where)->count();
		
		if($count==0) return false;
		$page=new \Think\Page($count,15);
		//$page=$this->page($count,15);
		$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show=$page->show();
		$article=M("Posts")->alias("p")->join($join)->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
	
		$this->assign("article",$article);
	
		$this->assign("page",$show);
		
		
	}
	
}
?>
