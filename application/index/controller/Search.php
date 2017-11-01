<?php
namespace app\index\controller;

use app\index\controller\Base;

class Search extends Base{
	// 显示出用搜索引擎搜索出来的文章
	public function index(){
		$keywords = $this->request->param("keywords");  // 获取搜索的关键词
		// 搜索内容是否为空
		if($keywords){
			// 对拥有搜索的关键词的文章进行分页显示
			$articles = db("article")->where("keywords","like","%".$keywords."%")->order("id desc")->paginate(3,false,['query' => array("keywords" => $keywords)]);
			$this->assign([
				"keywords" => $keywords,
				"articles" => $articles
			]);
		} else {
			$this->assign([
				"keywords" => "暂无数据",
				"articles" => null
			]);
		}
		return $this->fetch('search');
	}
}