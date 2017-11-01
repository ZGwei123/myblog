<?php
namespace app\admin\validate;

use think\Validate;

class Tags extends Validate{
	// 定义要验证的字段
	protected $rule = [
		"tagname" => "require|max:25|unique:tags",
	];
	// 定义验证失败返回的信息
	protected $message = [
		"tagname.require" => "Tags标签名不能为空",
		"tagname.max" => "Tags标签名不能超过25个字符",
		"tagname.unique" => "Tags标签名不能重复",
	];
	// 验证应用场景
	protected $scene = [
		"add" => ["tagname" => "require|max:25|unique:tags"],
		"edit" => ["tagname" => "require|max:25|unique:tags"],
	];
}
?>