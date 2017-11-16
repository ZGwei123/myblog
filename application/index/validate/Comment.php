<?php
namespace app\index\validate;

use think\Validate;

class Comment extends Validate{
	// 定义字段验证
	protected $rult = [
		"name" => "require|max:25",
		"email" => "require|email",
		"content" => "require",
		"articleid" => "require",
		"comment_time" => "require",
		"photo" => "reuqire", 
	];
	// 返回失败的原因
	protected $message = [
		"name.require" => "昵称必须填写",
		"name.max" => "昵称不能超过25个字符",
		"email.require" => "邮箱必须填写",
		"email.email" => "邮箱格式有误",
		"content.require" => "内容必须填写",
		"articleid.require" => "文章id必须传入",
		"comment_time.require" => "评论时间必须传入",
		"photo.require" => "评论头像必须传入",
	];
	// 应用场景
	protected $scene = [
		"add" => ["name","email","content","articleid","comment_time","photo"],
	];
}
?>