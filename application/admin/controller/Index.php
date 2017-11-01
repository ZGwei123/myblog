<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Index extends Base
{
	// 显示主页
	public function index()
	{
		return $this->fetch();
	}
	// 退出登录
	public function logout(){
		session("username",null);	//删除用户名的session
		session("uid",null);
		$this->success("退出登录成功",'Login/index');
	}
}
?>