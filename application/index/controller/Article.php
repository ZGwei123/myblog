<?php
namespace app\index\controller;

use app\index\controller\Base;

class Article extends Base
{
	// 显示文章页
	public function index(){
		$articleid = input("param.articleid");	// 获取文章id
		db("article")->where("id", "=", $articleid)->setInc("click",1); // 每查看文章一次，点击数加1
		$article = db("article")->where("id", "=", $articleid)->find(); // 获取文章信息
		$cate = db("cate")->where("id", "=", $article['cateid'])->find();  // 获取该文章的栏目信息
		$commendArticle = db("article")->
			where(array(
					"cateid" => $article['cateid'],
					"state"  => 1
				))->order("id desc")->limit(8)->select(); // 获取该文章所属栏目下的最新8篇有推荐的文章
		$relates = $this->relate($article['keywords'],$articleid);  // 调用relate()函数，获取相关文章数据
		$this->assign([
				"article" => $article,
				"cate" => $cate,
				"commendArticle" => $commendArticle,
				"relates" => $relates
			]);
		return $this->fetch("article");
	}

	// 返回有一个或多个相同关键词的文章数据
	public function relate($keywords, $id){
		$arr = explode(",", $keywords);  // 将关键词字符串转成数组
		$relates = array();
		// 遍历数组 获取出满足条件的数据
		foreach($arr as $key => $value){
			$relate = db("article")->where([
					"id" => ['neq',$id],
					"keywords" => ["like","%".$value."%"]   
				])->order("id desc")->limit(4)->select();   // 获取满足拥有相同关键词条件的最新4篇文章
			$relates = array_merge($relates,$relate);  // 将所有满足条件的文章都叠加组成一个新的二维数组
		}
		//  $relatesb数组不为空时再调用函数
		if(!empty($relates)){
			$relates = arr_unique($relates);  // 调用公用文件common.php中的函数  除去数组中重复的文章
		} 
		return $relates;
	}
}
?>