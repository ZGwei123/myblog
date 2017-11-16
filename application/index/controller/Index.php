<?php
namespace app\index\controller;

use app\index\controller\Base;

class Index extends Base
{
	// 显示主页 一个包含所有文章的列表
    public function index(){
    	// 连表获取所有文章信息进行列表显示
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
    		->paginate(5);
    	$commentsum = array();
    	foreach($articles as $key => $value){
    		$comment = db("comment")->where("articleid","=",$value['id'])->select();
    		if($comment){
    			$commentsum[$value['id']] = count($comment);
    		} else {
    			$commentsum[$value['id']] = 0;
    		}
    	}
    	$this->assign("articles",$articles);
    	$this->assign("commentsum",$commentsum);
    	return $this->fetch();
    }
}
