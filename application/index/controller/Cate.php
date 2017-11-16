<?php
namespace app\index\controller;

use app\index\controller\Base;

class Cate extends Base
{
	//显示列表页
	public function index(){
		$cateid = input("param.cateid");  // 获取栏目id
		// 连表获取该栏目下的所有文章信息
		$articles = db("article")
			->alias('a')
    		->join('cate b','a.cateid=b.id')
    		->order("a.id desc")
    		->field([
    				"a.id",
    				"a.title",
    				"a.author",
    				"a.synopsis",
    				"a.keywords",
    				"a.content",
    				"a.pic",
    				"a.click",
    				"a.state",
    				"a.time",
    				"a.cateid",
    				"b.id" => "cate_id",
    				"b.catename",
    			])
			->where("a.cateid","=",$cateid)
			->order("id desc")
			->paginate(5); 
		$commentsum = array();  // 定义一个空数组，防止该变量未在下面操作赋值时引起前端引用是报错
    	// 遍历文章$articles数组
    	foreach($articles as $key => $value){
    		// 获取每篇文章的评论数据
    		$comment = db("comment")->where("articleid","=",$value['id'])->select();
    		// 文章是否有存在评论       建立一个存放每篇文章评论数的数组
    		if($comment){
    			$commentsum[$value['id']] = count($comment);   
    		} else {
    			$commentsum[$value['id']] = 0;     // 无评论时赋值为0
    		}
    	}
		$cate = db("cate")->find($cateid);  // 获取栏目信息
		$this->assign("articles", $articles);
		$this->assign("cate", $cate);
		$this->assign("commentsum",$commentsum);
		return $this->fetch("cate");
	}
}
?>