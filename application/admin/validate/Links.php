<?php
namespace app\admin\validate;

use think\Validate;

class Links extends Validate{
	// 定义字段验证
	protected $rule = [
		"title" => "require",
		"url" => "require",
		"state" => "max:25"
	];
	// 返回验证失败原因
	protected $message = [
		"title.require" => "链接标题必须填写",
		"url.require" => "链接地址必须填写",
		"state.max" => "链接说明不能超过25个字符",
	];
	// 验证应用场景
	protected $scene = [
		"add" => ["title","url","state"],
		"edit" => ["title","url","state"],
	];

}
?>