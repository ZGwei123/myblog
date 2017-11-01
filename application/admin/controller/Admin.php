<?php
namespace app\admin\controller;

use think\Db;
use think\Loader;
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Base;

class Admin extends Base
{
	// 管理员列表
	public function lst()
	{
		// 对管理员进行分页显示
		$list = AdminModel::order("id desc")->paginate(2);
		$this->assign("list",$list);
		return $this->fetch();
	}
	// 管理员信息修改
	public function edit(){
		// 获取将要修改的管理员id值
		$id = input("id");
		$admin = db("admin")->where('id',"=",$id)->find();
		// 是否修改管理员信息
		if($this->request->isPost()){
			// 将要修改的管理员数据
			$data = [
				"id" => $id,    // 添加id元素是为解决因唯一性而导致字段保存不修改原数据时显示验证失败的问题
				"username" => input("post.username"),
			];
			$password = input("post.password");
			if($password == ""){
				$data['password'] = $admin['password'];
			} else {
				$data['password'] = md5($password);
			}
			// 验证修改的管理员信息是否有误
			$validate = Loader::validate("Admin");
			if(!$validate->scene("edit")->check($data)){
				return $this->error($validate->getError());
			}
			$save = db("admin")->where("id","=",$id)->update($data);
			// 管理员信息是否修改成功
			if($save !== false){
				$this->success("管理员信息修改成功","lst");
			} else {
				$this->error("管理员信息修改失败");
			}
		}
		// 显示原管理员信息
		$this->assign("admin",$admin);
		return $this->fetch();
	}
	// 添加管理员
	public function add()
	{
		// 是否要添加管理员
		if($this->request->isPost()){
			$data = [
				"username" => input("post.username"),
				"password" => md5(input("post.password"))
			];
			$validate = Loader::validate("Admin");
			// 验证添加的管理员信息是否有误
			if(!$validate->scene("add")->check($data)){
				$this->error($validate->getError());
			}
			// 是否添加成功
			if(Db::name("admin")->insert($data)){
				return $this->success("添加管理员成功！","lst");
			} else {
				return $this->error("添加管理员失败！");
			}
		}
		return $this->fetch();
	}
	// 删除管理员
	public function del(){
		$id = input("id");
		// 是否为初始管理员
		if($id != 1){
			// 是否删除成功
			if(db("admin")->where("id","=",$id)->delete()){
				$this->success("删除管理员成功","lst");
			} else {
				$this->error("删除管理员失败","lst");
			}
		} else {
			$this->error("初始管理员不能被删除","lst");
		}
	}
}
?>