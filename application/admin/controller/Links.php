<?php
namespace app\admin\controller;

use think\Loader;
use think\Db;
use app\admin\model\Links as LinksModel;
use app\admin\controller\Base;

class Links extends Base{
	// 链接列表
	function lst(){
		// 分页显示连接信息
		$list = LinksModel::order("id desc")->paginate(2);
		$this->assign("list",$list);
		return $this->fetch();
	}
	// 链接修改
	function edit(){
		// 获取将要修改的链接id
		$id = $this->request->param("id");
		$links = LinksModel::get($id);
		// 是否要修改连接信息
		if($this->request->isPost()){
			// 获取修改的链接数据
			$data = [
				"title" => $this->request->post("title"),
				"url" => $this->request->post("url"),
				"state" => $this->request->post("state"),
			];
			$validate = Loader::validate("Links");
			// 验证修改的链接数据是否正确
			if(!$validate->scene("edit")->check($data)){
				$this->error($validate->getError());
			}
			$save = LinksModel::where("id",$id)->update($data);
			// 修改连接数据是否成功
			if($save !== false){
				$this->success("链接信息修改成功","lst");
			} else {
				$this->error("链接信息修改失败");
			}
		}
		$this->assign("links",$links);
		return $this->fetch();
	}
	// 链接添加
	function add(){
		// 是否要添加链接信息
		if($this->request->isPost()){
			// 获取添加的链接数据
			$data = [
				"title" => $this->request->post("title"),
				"url" => $this->request->post("url"),
				"state" => $this->request->post("state"),
			];
			$validate = Loader::validate("Links");
			// 验证数据是否正确
			if(!$validate->scene("add")->check($data)){
				$this->error($validate->getError());
			}
			// 链接数据是否添加成功
			if(Db::name("links")->insert($data)){
				$this->success("添加链接成功","lst");
			} else {
				$this->error("添加链接失败");
			}
		}
		return $this->fetch();
	}
	//链接删除
	function del(){
		// 获取要删除的链接id
		$id = $this->request->param("id");
		// 是否删除成功
		if(LinksModel::destroy($id)){
			$this->success("链接删除成功","lst");
		} else {
			$this->error("链接删除失败","lst");
		}
	}
}
?>