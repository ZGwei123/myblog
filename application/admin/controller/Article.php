<?php
namespace app\admin\controller;

use think\Loader;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Base;

class Article extends Base{
	// 显示文章列表
	function lst(){
		// 分页显示文章
		// 多表连接查询
		/*$article = ArticleModel::alias("a")->join("cate b","b.id=a.cateid")->field("a.id,a.title,a.author,a.keywords,a.synopsis,a.state,a.pic,b.catename")->paginate(2);*/
		$article = ArticleModel::order("id desc")->paginate(2);
		$this->assign("article",$article);
		return $this->fetch();
	}
	// 添加文章
	function add(){
		// 是否要添加文章
		if(request()->isPost()){
			// 获取要将要添加的文章数据
			$data = [
				"title" => input("post.title"),
				"author" => input("post.author"),
				"keywords" => str_replace("，",",",input("post.keywords")),
				"synopsis" => input("post.synopsis"),
				"cateid" => input("post.cateid"),
				"content" => input("post.content"),
				"time" => time(),
			];
			// 文章是否推荐
			if(input("post.state") == "on"){
				$data['state'] = 1;
			};
			// 文章是否有上传缩略图
			if($_FILES['pic']['tmp_name']){
				// 获取上传的文件
				$file = request()->file("pic");
				// 移动文件到指定目录 *public/static/uploads
				$info = $file->move(ROOT_PATH.'public'.DS.'static/uploads');
				$data['pic'] = $info->getSaveName();
			} else {
				$data['pic'] = "";
			}
			$validate = Loader::validate("Article");
			// 验证添加的文章信息是否正确
			if(!$validate->scene("add")->check($data)){
				$this->error($validate->getError());
			}
			// 文章是否添加成功
			if(db("article")->insert($data)){
				$this->success("文章添加成功","lst");
			} else {
				$this->error("文章添加失败");
			}
		}
		// 获取所有栏目类型
		$cates = db("cate")->select();
		$this->assign("cates",$cates);
		return $this->fetch();
	}
	// 修改文章
	function edit(){
		// 获取将要修改的文章id
		$id = input("id");
		//是否要修改文章信息
		if(request()->isPost()){
			// 获取将要修改文章信息的数据
			$data = [
				"title" => input("post.title"),
				"author" => input("post.author"),
				"keywords" => str_replace("，",",",input("post.keywords")),
				"synopsis" => input("post.synopsis"),
				"cateid" => input("post.cateid"),
				"content" => input("post.content")
			];
			// 是否修改了文章推荐
			if(input("post.state") == "on"){
				$data['state'] = 1;
			} else {
				$data['state'] = 0;
			}
			// 是否上了文件修改文章缩略图
			if($_FILES['pic']['tmp_name']){
				// 获取上传的文件
				$file = request()->file("pic");
				// 移动文件到指定目录  *public/static/uploads
				$info = $file->move(ROOT_PATH.'public'.DS.'static/uploads');
				$data['pic'] = $info->getSaveName();
			}
			$validate = Loader::validate("Article");
			// 验证将要修改的文章数据是否正确
			if(!$validate->scene("edit")->check($data)){
				$this->error($validate->getError());
			}
			// 修改文章数据
			$save = db("article")->where("id","=",$id)->update($data);
			// 是否修改成功
			if($save !== false){
				$this->success("文章修改成功","lst");
			} else {
				$this->error("文章修改失败");
			}
		}
		// 获取所有栏目
		$cates = db("cate")->select();
		// 获取将要修改的文章
		$article = db("article")->find($id);
		$this->assign("cates",$cates);
		$this->assign("article",$article);
		return $this->fetch();	
	}
	// 删除文章
	function del(){
		// 获取要删除的文章id
		$id = input("id");
		// 是否文章删除成功
		if(db("article")->where("id","=",$id)->delete()){
			$this->success("文章删除成功","lst");
		} else {
			$this->error("文章删除失败","lst");
		}
	}
}
?>