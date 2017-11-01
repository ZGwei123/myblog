<?php
namespace app\admin\validate;

use think\Validate;

class Article extends Validate{
	// 定义字段验证
	protected $rule = [
		"title" => "require|max:25",
		"cateid" => "require",
	];
	// 返回验证失败的原因
	protected $message = [
		"title.reuqire" => "文章标题必须填写",
		"title.max" => "文章标题不能超过25个字符",
		"cateid.require" => "文章所属栏目必须填写",
	];
	// 验证应用场景
	protected $scene = [
		"add" => ["title","cateid"],
		"edit" => ["title","cateid"],
	];

}
?>