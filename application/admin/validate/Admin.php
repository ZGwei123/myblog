<?php
namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
	// 定义字段验证
	protected $rule = [
		"username" => "require|max:25|unique:admin",
		"password" => "require",
	];
	// 返回验证失败原因
	protected $message = [
		"username.require" => "管理员名称必须填写",
		"username.max" => "管理员名称长度不能大于25位",
		"username.unique" => "管理员名称不能重复",
		"password.require" => "管理员密码必须填写",
	];
	// 验证应用场景
	protected $scene = [
		"add" => ['username' => 'require|max:25|unique:admin','password'],
		"edit" => ['username','password'],
	];
}
?>