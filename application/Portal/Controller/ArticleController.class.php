<?php

/**
 * 文章内页
 */
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class ArticleController extends HomeBaseController {
    //文章内页
    public function index() {
    	$id=intval($_GET['id']);
		$tid=$_GET["tid"];
		$lm=M("terms");
		$mbxdh=$lm->where("term_id=".$tid)->find();
		$this->assign('mbx',$mbxdh);
		
    	$article=sp_sql_post($id,'');
    	$termid=$article['term_id'];
    	$term_obj= M("Terms");
    	$term=$term_obj->where("term_id='$termid'")->find();
    	
    	$article_id=$article['object_id'];
    	
    	$should_change_post_hits=sp_check_user_action("posts$article_id",1,true);
    	if($should_change_post_hits){
    		$posts_model=M("Posts");
    		$posts_model->save(array("id"=>$article_id,"post_hits"=>array("exp","post_hits+1")));
    	}
    	
    	
    	
    	$smeta=json_decode($article['smeta'],true);
    	$content_data=sp_content_page($article['post_content']);
    	$article['post_content']=$content_data['content'];
    	$this->assign("page",$content_data['page']);
    	$this->assign($article);
    	$this->assign("smeta",$smeta);
    	$this->assign("term",$term);
    	$this->assign("article_id",$article_id);
    	$this->articleClass();
    	$tplname=$term["one_tpl"];
    	$tplname=sp_get_apphome_tpl($tplname, "article");
    	$this->display(":$tplname");
    }
    
    public function do_like(){
    	$this->check_login();
    	
    	$id=intval($_GET['id']);//posts表中id
    	
    	$posts_model=M("Posts");
    	
    	$can_like=sp_check_user_action("posts$id",1);
    	
    	if($can_like){
    		$posts_model->save(array("id"=>$id,"post_like"=>array("exp","post_like+1")));
    		$this->success("赞好啦！");
    	}else{
    		$this->error("您已赞过啦！");
    	}
    	
    }
    

    private function articleClass()
    {
    	$id=intval($_GET['id']);
    	$where["tid"]=$id;
    	$join = "".C('DB_PREFIX').'term_relationships as b on t.term_id =b.term_id';
    	$result=M("terms")->alias("t")->join($join)->where($where)->find();
    	if(!$result) return ;
    	$this->assign("ClassName",$result["name"]);
    	$this->assign("SubClass",$this->get_article($result["term_id"]));
    	$this->assign("tid",$id);
    }
    
    
    
}
?>
