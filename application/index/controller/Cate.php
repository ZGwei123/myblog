<?php
namespace app\index\controller;

use app\index\controller\Base;

class Cate extends Base
{
	//显示列表页
	public function index(){
		$cateid = input("param.cateid");  // 获取栏目id
		// 获取该栏目下的所有文章
		$articles = db("article")->where("cateid","=",$cateid)->order("id desc")->paginate(3); 
		$cate = db("cate")->find($cateid);  // 获取栏目信息
		$this->assign("articles", $articles);
		$this->assign("cate", $cate);
		return $this->fetch("cate");
	}
}
?>