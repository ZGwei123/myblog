<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;
use think\captcha\Captcha;

class Login extends Controller{
	// 管理员登录
	function index(){
		// 用户是否登录
		if(request()->isPost()){
			$data = input("post."); // 获取用户登录信息
			$admin = new Admin();
			$captcha = new Captcha(); // 实例验证码类
			$info = $admin->login($data); // 获取登录状态信息
			if(!$captcha->check($data['captcha'])){
				$this->error("验证码错误","index");
			} elseif($info == 3) {
				$this->success("信息正确","Index/index");
			} else {
				$this->error("用户名或密码错误","index");
			}
		}
		return $this->fetch("login");
	}
}
?>