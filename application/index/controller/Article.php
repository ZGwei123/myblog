<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Loader;

class Article extends Base
{
	// 显示文章页
	public function index(){
		$articleid = input("param.articleid");	// 获取文章id
		db("article")->where("id", "=", $articleid)->setInc("click",1); // 每查看文章一次，点击数加1
		$article = db("article")->where("id", "=", $articleid)->find(); // 获取文章信息
		// 关键词是否为空
		if($article['keywords'] != ""){
			$keywords = explode(",", $article['keywords']);   // 将关键字从字符串分隔为数组
		} else {
			$keywords = array();
		}
		$lastArticle = db("article")->where(
				[
					"id" => ["<", $articleid],
					"cateid" => $article['cateid'],
				]
			)->order("id desc")->find();   // 获取上一篇文章信息
		$nextArticle = db("article")->where(
				[
					"id" => [">", $articleid],
					"cateid" => $article['cateid'],
				]
			)->find();   // 获取下一篇文章信息
		$cate = db("cate")->where("id", "=", $article['cateid'])->find();  // 获取该文章的栏目信息
		$commendArticle = db("article")->
			where(array(
					"cateid" => $article['cateid'],
					"state"  => 1
				))->order("id desc")->limit(8)->select(); // 获取该文章所属栏目下的最新8篇有推荐的文章
		$relates = $this->relate($article['keywords'],$articleid);  // 调用relate()函数，获取相关文章数据
		$comment = $this->comment($articleid);  // 调用comment()函数，获取文章评论信息
		$this->assign([
				"article" => $article,
				"keywords" => $keywords,
				"lastArticle" => $lastArticle,
				"nextArticle" => $nextArticle,
				"cate" => $cate,
				"commendArticle" => $commendArticle,
				"relates" => $relates,
				"comment" => $comment,
				"empty"    => "<h3 id='notdata' style='font-size:20px;text-align:center;								color:#756f71;margin:20px 0px'>暂无评论</h3>",
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
				])->order("id desc")->limit(8)->select();   // 获取满足拥有相同关键词条件的最新8篇文章
			$relates = array_merge($relates,$relate);  // 将所有满足条件的文章都叠加组成一个新的二维数组
		}
		//  $relatesb数组不为空时再调用函数
		if(!empty($relates)){
			$relates = arr_unique($relates);  // 调用公用文件common.php中的函数  除去数组中重复的文章
		} 
		return $relates;
	}

	// 文章评论
	// 参数$id 为默认值0时，将进行插入文章评论，非0时返回对应文章评论
	public function comment($id=0){
		if($id != 0){
			$comment = db("comment")->where("articleid", "=", $id)->select();   // 获取文章评论信息
			return $comment;
		} else {
			// 获取要添加的评论信息
			$data = [
				"name"     =>    $this->request->param("name"),
				"email"    =>    $this->request->param("email"),
				"content"  =>    $content = $this->request->param("content"),
				"articleid"=>    $this->request->param("articleid"),
				"comment_time"=> $this->request->param("time"), 
				"photo"    =>    $this->request->param("photo"),
			];
			$validate = Loader::validate("Comment");
			// 验证将要添加的评论信息
			if(!$validate->scene("add")->check($data)){
				echo "false";        // false 使前端终止异步操作添加评论
				return;
			}
			// 添加评论是否成功
			if(db("comment")->insert($data)){
				echo "true";		// true  使前端继续成功异步操作添加评论
			} else {
				echo "false";      // false 使前端终止异步操作添加评论
			}
		}
	}
}
?>