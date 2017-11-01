<?php
namespace app\admin\controller;

use app\admin\controller\Base;
use think\Loader;

class Tags extends Base{
	// 显示Tags标签列表
	public function lst(){
		$tags = db('tags')->order("id desc")->paginate(2);  // 分页显示Tags标签信息
		$this->assign("tags",$tags);
		return $this->fetch();
	}
	// 添加Tags标签
	public function add(){
		// 是否要添加Tags标签信息
		if($this->request->isPost()){
			// 获取Tags标签信息
			$data = [
				"tagname" => $this->request->post("tagname"),
			];
			$validate = Loader::validate("Tags");
			// 验证添加的Tags标签信息是否有误
			if(!$validate->scene('add')->check($data)){
				$this->error($validate->getError());
			}
			// 数据是否添加成功
			if(db('tags')->insert($data)){
				$this->success("Tags标签添加成功",'lst');
			} else {
				$this->error("Tags标签添加失败");
			}
		}
		return $this->fetch();
	}
	// 修改Tags标签
	public function edit(){
		$id = input("id");  // 获取要修改的Tags标签id
		// 是否要修改Tags标签信息
		if($this->request->isPost()){
			// 获取要修改的Tags标签信息
			$data = [
				"id" => $id,        // 添加id元素是为解决因唯一性而导致字段保存不修改原数据时显示验证失败的问题
				"tagname" => $this->request->post("tagname"),
			];
			$validate = Loader::validate("Tags");
			// 验证要修改的Tags标签信息是否有误
			if(!$validate->scene("edit")->check($data)){
				$this->error($validate->getErro());
			}
			$result = db("tags")->where("id","=",$id)->update($data);  // 保存修改的Tags标签信息
			// 修改是否成功
			if($result !== false){
				$this->success("Tags标签修改成功","lst");
			} else {
				$this->error("Tags标签修改失败");
			}
		}
		$tags = db("tags")->find($id); // 获取标签信息
		$this->assign("tags", $tags);
		return $this->fetch();
	}
	// 删除Tags标签
	public function del(){
		// 获取要删除的Tags标签id
		$id = input("id");
		// Tags标签是否删除成功
		if(db("tags")->delete($id)){
			$this->success("Tags标签删除成功","lst");
		} else {
			$this->error("Tags标签删除失败","lst");
		}
	}
}
?>