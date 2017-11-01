<?php
namespace app\index\controller;

use think\Controller;

//基类  继承该类，调用该类的方法
class Base extends Controller{
	// 初始化方法 构造方法   给每个页面都添加相同的信息
	function _initialize(){
		$cates = db("cate")->select();  // 获取所有栏目信息
		$tags = db("tags")->order("id desc")->limit(8)->select();   // 获取所有Tags标签信息;
		$this->assign([
				"cates" => $cates,
				"tags" => $tags,
			]);
		$this->hotArticle();
	}
	// 所有页面右侧各种广告或热门推荐文章的信息
	function hotArticle(){
		$hotClick = db("article")->order("click desc")->limit(5)->select();  // 点击数前5的文章
		// 点击数前5且有推荐的文章
		$hotCommend = db("article")->where("state", "=", 1)->order("click desc")->limit(5)->select();
		$this->assign(
			array(
					"hotClick" => $hotClick,
					"hotCommend" => $hotCommend
				));
	}
}
?>