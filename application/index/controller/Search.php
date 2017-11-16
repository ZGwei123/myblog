<?php
namespace app\index\controller;

use app\index\controller\Base;

class Search extends Base{
	// 显示出用搜索引擎搜索出来的文章
	public function index(){
		$keywords = $this->request->param("keywords");  // 获取搜索的关键词
		// 搜索内容是否为空
		if($keywords){
			// 连表对关键词里含有搜索词或标题含有搜索词的文章进行分页显示
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
				->where("keywords","like","%".$keywords."%")
				->whereOr("title", "like", "%".$keywords."%")
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
			$this->assign([
				"keywords" => $keywords,
				"articles" => $articles,
				"commentsum" => $commentsum,
				"empty"    => "<h3 style='font-size:20px;text-align:center;'>暂无数据</h3>",
			]);
		} else {
			$this->assign([
				"keywords" => "暂无数据",
				"articles" => null,
				"empty"    => "<h3 style='font-size:20px;text-align:center;'>暂无数据</h3>",
			]);
		}
		return $this->fetch('search');
	}
}