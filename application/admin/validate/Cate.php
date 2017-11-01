<?php
namespace app\admin\validate;

use think\Validate;

class Cate extends Validate{
	// 定义字段验证
	protected $rule = [
		"catename" => "reuqire|max:25|unique:cate",
	];
	// 返回验证失败原因
	protected $message = [
		"catename.require" => "栏目名称必须填写",
		"catename.max" => "栏目名称不能超过25个字符",
		"catename.unique" => "栏目名称不能重复",
	];
	// 验证应用场景
	protected $scene = [
		"add" => ["catename" => "require|max:25|unique:cate"],
		"edit" => ["catename" => "require|max:25|unique:cate"],
	];
}
?>