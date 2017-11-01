<?php
namespace app\index\controller;

use app\index\controller\Base;

class Index extends Base
{
	// 显示主页 一个包含所有文章的列表
    public function index(){
    	$articles = db("article")->order("id desc")->paginate(3); // 对获取的所有文章信息进行列表显示
    	$this->assign("articles",$articles);
    	return $this->fetch();
    }
}
