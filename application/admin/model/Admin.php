<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class Admin extends Model{
	// 返回登录状态信息
	function login($data){
		$user = Db::name("admin")->where("username","=",$data['username'])->find();
		if($user){
			if($user['password'] == md5($data['password'])){
				session("username",$user['username']);   // 用session保存用户名
				session("uid",$user['id']);
				return 3; // 信息正确
			} else {
				return 2; // 密码错误
			}
		} else {
			return 1; // 用户不存在 
		}
	}
}
?>