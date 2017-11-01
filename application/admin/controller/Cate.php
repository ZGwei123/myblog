<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;
use think\Loader;
use think\Db;
use app\admin\controller\Base;

class Cate extends Base{
	// 栏目列表
	function lst(){
		// 分页显示栏目
		$cate = CateModel::order("id desc")->paginate(2);
		$this->assign("cate",$cate);
		return $this->fetch();
	}
	// 添加栏目
	function add(){
		// 是否要添加栏目
		if(request()->isPost()){
			// 获取要添加的栏目信息
			$data = [
				"catename" => input("post.catename"),
			];
			$validate = Loader::validate("Cate");
			// 验证添加的栏目信息是否正确
			if(!$validate->scene("add")->check($data)){
				$this->error($validate->getError());
			}
			// 保存要添加栏目的数据
			$save = Db::name("cate")->insert($data);
			if($save !== false){
				$this->success("栏目添加成功","lst");
			} else {
				$this->error("栏目添加失败");
			}
		}
		return $this->fetch();
	}
	// 修改栏目信息
	function edit(){
		// 获取将要修改的栏目id
		$id = input("id");
		$cate = Db::name("cate")->find($id);
		// 是否要修改栏目信息
		if(request()->isPost()){
			// 获取要修改的栏目数据
			$data = [
				"id" => $id,    // 添加id元素是为解决因唯一性而导致字段保存不修改原数据时显示验证失败的问题
				"catename" => input("post.catename"),
			];
			$validate = Loader::validate("Cate");
			// 验证修改的栏目数据是否正确
			if(!$validate->scene("edit")->check($data)){
				$this->error($validate->getError());
			} 
			// 保存修改后的栏目信息
			$save = Db::name("cate")->where("id","=",$id)->update($data);
			// 修改栏目信息是否成功
			if($save !== false){
				$this->success("栏目修改成功","lst");
			} else {
				$this->error("栏目修改失败");
			}
		}
		$this->assign("cate",$cate);	
		return $this->fetch();
	}
	// 删除栏目
	function del(){
		// 获取要删除的栏目id
		$id = input("id");
		// 删除栏目是否成功
		if(Db::name("cate")->delete($id)){
			$this->success("栏目删除成功","lst");
		} else {
			$this->error("栏目删除失败","lst");
		}
	}
}
?>