<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"E:\wamp64\www\tp\public/../application/index\view\article\article.html";i:1510817812;s:68:"E:\wamp64\www\tp\public/../application/index\view\common\header.html";i:1510146938;s:67:"E:\wamp64\www\tp\public/../application/index\view\common\right.html";i:1510654986;s:68:"E:\wamp64\www\tp\public/../application/index\view\common\footer.html";i:1510745601;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>伟·编程记录</title>
<meta name="keywords" content="伟·编程记录，个人博客" />
<meta name="description" content="伟的编程记录，记录个人学习编程的过程、总结" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<link href="__STYLE__/style/base.css" rel="stylesheet">
<link href="__STYLE__/style/index.css" rel="stylesheet">
<link href="__STYLE__/style/style.css" rel="stylesheet">
</head>
<body>
<div class="ibody">
  <header>
    <h1>伟 · 编程记录</h1>
    <h2>一个好程序猿的成功来源于他每天坚持不断地撸代码，一万小时定律你要坚持住，加油....</h2>
    <div class="logo"><a href="<?php echo url('Index/index'); ?>"></a></div>
    <nav id="topnav">
        <a href="<?php echo url('Index/index'); ?>">首页</a>
        <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo url('Cate/index', array('cateid' => $vo['id'])); ?>"><?php echo $vo['catename']; ?></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </nav>
  </header>
  <article>
    <h2 class="about_h">您现在的位置是：<a href="<?php echo url('Index/index'); ?>">首页</a>><a href="<?php echo url('Cate/index', array('cateid' => $cate['id'])); ?>"><?php echo $cate['catename']; ?></a>></h2>
    <div class="index_about">
      <h2 class="c_titile"><?php echo $article['title']; ?></h2>
      <p class="box_c"><span class="d_time">发布时间：<?php if($article['time'] != ''): ?><?php echo date("Y-m-d",$article['time']); else: ?>暂无<?php endif; ?></span><span>编辑：<?php if($article['author'] != ''): ?><?php echo $article['author']; else: ?>暂无<?php endif; ?></span><span>浏览（<?php echo $article['click']; ?>）</span><span>评论览（<?php echo count($comment); ?>）</span></p>
       <div class="takeaway">
             <span class="btn arr-left"></span>
             <p class="jjxq"><?php if($article['synopsis'] != ''): ?><?php echo $article['synopsis']; else: ?>暂无简介<?php endif; ?></p>
             <span class="btn arr-right"></span>
        </div>
      <ul class="infos">
        <?php echo $article['content']; ?>
      </ul>
      <div class="keybq">
        <p>
            <span>关键字词</span>：
            <?php if(is_array($keywords) || $keywords instanceof \think\Collection || $keywords instanceof \think\Paginator): $i = 0; $__LIST__ = $keywords;if( count($__LIST__)==0 ) : echo "暂无关键词" ;else: foreach($__LIST__ as $key=>$keyword): $mod = ($i % 2 );++$i;if($i-1 != '0'): ?>,<?php endif; ?><a href="<?php echo url('Search/index', array('keywords' => $keyword)); ?>"><?php echo $keyword; ?></a> 
            <?php endforeach; endif; else: echo "暂无关键词" ;endif; ?>
        </p>
      </div>
      <div class="nextinfo">
      <?php if($nextArticle != null): ?>
        <p>上一篇：<a href="<?php echo url('Article/index', array('articleid' => $nextArticle['id'])); ?>"><?php echo $nextArticle['title']; ?></a></p>
      <?php endif; if($lastArticle != null): ?>
        <p>下一篇：<a href="<?php echo url('Article/index', array('articleid' => $lastArticle['id'])); ?>"><?php echo $lastArticle['title']; ?></a></p>
      <?php endif; ?>
      </div>
      <?php if($relates != null): ?>
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
          <?php if(is_array($relates) || $relates instanceof \think\Collection || $relates instanceof \think\Paginator): $i = 0; $__LIST__ = $relates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><a href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
      <?php endif; ?>
      <div class="comment-top" id="comment-top">
        <div class="story">
          <h4 class="stories "><span>评论 (<p id="num11" style="display:inline-block;"><?php echo count($comment); ?></p>)</span></h4>
        </div>
        
        <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="comments-top-top">
          <div class="top-comment-left">
            <img class="img-responsive" src="__STYLE__/images/<?php echo $vo['photo']; ?>" alt="">
          </div>
          <div class="top-comment-right">
            <div class="right-comment">
              <h5><?php echo $vo['name']; ?></h5>
              <span><?php echo date("Y-m-d H:i:s",$vo['comment_time']); ?></span>
              <div class="clearfix"> </div>
            </div>
            <p><?php echo $vo['content']; ?></p>
          </div>
          <div class="clearfix"> </div>
        </div>
        <?php endforeach; endif; else: echo "$empty" ;endif; ?>

      </div>
      <div class="simply">
        <div class="story">
          <h4 class="stories stories-in"><span>填写评论</span></h4>
        </div>
        <form>
          <input type="hidden" value="<?php echo $article['id']; ?>" id="articleid"/>
          <div class="name">
            <span class="sit-in">昵称:</span>
            <input type="text" value="" placeholder="请输入昵称" id="name" oninput="checkname(this)">
            <span id="hint11" style="color:red;margin-left:10px"></span>
          </div>
          <div class="name name-at">
            <span class="sit-in">邮箱:</span>
            <input type="text" value="" placeholder="请输入邮箱" id="email"  oninput="checkemail(this)">
            <span id="hint12" style="color:red;margin-left:10px"></span>
          </div>
          <div class="name name-in">
            <span class="sit-in">内容:</span>
            <textarea id="content" oninput="checkcontent(this)"></textarea>
            <span id="hint13" style="color:red;position: absolute;top: 20px;left: 295px;margin-left:10px"></span>
          </div>
          <input type="button" value="确定" onclick="comment()">
        </form>
        <div class="clearfix"> </div>
      </div>
      </div>
  </article>
        <aside>

	   <div id="wrapper">

		<div id="back">
	         <div id="upperHalfBack">
	         		<img src="__STYLE__/images/spacer.png" /><img id="hoursUpBack" src="__STYLE__/images/Single/Up/AM/0.png"/>
	                <img id="minutesUpLeftBack" src="__STYLE__/images/Double/Up/Left/0.png" class="asd" /><img id="minutesUpRightBack" src="__STYLE__/images/Double/Up/Right/0.png"/>
	                <img id="secondsUpLeftBack" src="__STYLE__/images/Double/Up/Left/0.png" /><img id="secondsUpRightBack" src="__STYLE__/images/Double/Up/Right/0.png"/>
	         </div>
	         <div id="lowerHalfBack">
	         		<img src="__STYLE__/images/spacer.png" /><img id="hoursDownBack" src="__STYLE__/images/Single/Down/AM/0.png" />
	               <img id="minutesDownLeftBack" src="__STYLE__/images/Double/Down/Left/0.png" /><img id="minutesDownRightBack" src="__STYLE__/images/Double/Down/Right/0.png" />
	               <img id="secondsDownLeftBack" src="__STYLE__/images/Double/Down/Left/0.png" /><img id="secondsDownRightBack" src="__STYLE__/images/Double/Down/Right/0.png" />
	         </div>
		</div>
	    
	    
	    <div id="front">
	         <div id="upperHalf">
	         		<img src="__STYLE__/images/spacer.png" /><img id="hoursUp" src="__STYLE__/images/Single/Up/AM/0.png"/>
	                <img id="minutesUpLeft" src="__STYLE__/images/Double/Up/Left/0.png" /><img id="minutesUpRight" src="__STYLE__/images/Double/Up/Right/0.png"/>
	                <img id="secondsUpLeft" src="__STYLE__/images/Double/Up/Left/0.png" /><img id="secondsUpRight" src="__STYLE__/images/Double/Up/Right/0.png"/>
	         </div>
	         <div id="lowerHalf">
	         		<img src="__STYLE__/images/spacer.png" /><img id="hoursDown" src="__STYLE__/images/Single/Down/AM/0.png"/>
	               <img id="minutesDownLeft" src="__STYLE__/images/Double/Down/Left/0.png" /><img id="minutesDownRight" src="__STYLE__/images/Double/Down/Right/0.png" />
	               <img id="secondsDownLeft" src="__STYLE__/images/Double/Down/Left/0.png" /><img id="secondsDownRight" src="__STYLE__/images/Double/Down/Right/0.png" />
	         </div>
		</div>   
	</div>

<div class="self">
        <figure><img src="__STYLE__/images/007.jpg"></figure>
     

      </div>

    <div class="topspaceinfo">
      <div class="rnav about_c">
      <p>网名：~~kong||白</p>
      <p>职业：学生、网页开发 </p>
      <p>现居：广东省—汕头市</p>
      <p>电话：15919286310</p>
      <p>邮箱：839319250@qq.com</p>
    </div>
    </div>
    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
    </div>
    <div class="tj_news">
      <h2>
        <p class="tj_t1">热门文章</p>
      </h2>
      <ul class="ph_n">
      <?php if(is_array($hotClick) || $hotClick instanceof \think\Collection || $hotClick instanceof \think\Paginator): $i = 0; $__LIST__ = $hotClick;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li><span class="num<?php echo $i; ?>"><?php echo $i; ?></span><a href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>"><?php echo $vo['title']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul class="ph_m">
      <?php if(is_array($hotCommend) || $hotCommend instanceof \think\Collection || $hotCommend instanceof \think\Paginator): $i = 0; $__LIST__ = $hotCommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li><a href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>"><?php echo $vo['title']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="links link11">
      <h2>
        <p>站内搜索</p>
      </h2>
      <div class="wrapper-green">
      	<div onclick="click11()" class="searchMeme-button-right  searchMeme-round-right green-hover">
      		<div class="searchMeme-button-icon searchMeme-button-inner"></div>
      	</div> 
      	<div class="searchMeme-input-right">
      		<input onkeypress="if (event.keyCode == 13){ click11();}" type="text" id="search-green" placeholder="请输入关键字" class="searchMeme-water-mark" style="margin-left: 0px; padding-left: 11px; padding-right: 11px;">
      	</div>
      	<div style="clear:both;"></div>
      </div>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
      	<?php if(is_array($links) || $links instanceof \think\Collection || $links instanceof \think\Paginator): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        	<li><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </aside>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
  <footer style="">
     <div style="text-align:center;background: #141414;line-height: 40px;color: #f16e50;">
        <p>Copyright &#169; 2015-2017  all rights reserved 版权所有</p>
     </div>
  </footer>
</div>
<script src="__STYLE__/style/silder.js"></script>
<script src="__STYLE__/style/mootools.js" type="text/javascript"></script>
<script src="__STYLE__/style/animate.js" type="text/javascript"></script>

<script type="text/javascript">
    function click11(){
        var click = document.getElementById("search-green").value;
        window.location="/tp/public/index/search/index/keywords/"+click;
    }
    // 提交评论后能异步更新评论列表
    function comment(){
        var commentTop = document.getElementById("comment-top");
        var name = document.getElementById("name");
        var email = document.getElementById("email");
        var content = document.getElementById("content");
        var articleid = document.getElementById("articleid");
        var photo = "photo/"+Math.ceil(Math.random()*6)+".jpg";
        var num11 = commentTop.getElementById("num11");
        var time = new Date();
        if(checkname(name) && checkemail(email) && checkcontent(content)){
          var xmlhttp = null;
          xmlhttp = new window.XMLHttpRequest();
          xmlhttp.open("GET","/tp/public/index/Article/comment.html?name="+name.value+"&email="+email.value+"&content="+content.value+"&articleid="+articleid.value+"&photo="+photo+"&time="+(Date.parse(time)/1000),true);
          xmlhttp.send();
          xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
              var result = xmlhttp.responseText;
                if(result == "true"){
                  var div1 = document.createElement("div");
                  var div2 = document.createElement("div");
                  var div3 = document.createElement("div");
                  var div31 = document.createElement("div");
                  var div311 = document.createElement("div");
                  var div4 = document.createElement("div");
                  var img = document.createElement("img");
                  var h5 = document.createElement("h5");
                  var span = document.createElement("span");
                  var p = document.createElement("p");
                  div1.setAttribute("class","comments-top-top");
                  div2.setAttribute("class","top-comment-left");
                  div3.setAttribute("class","top-comment-right");
                  div31.setAttribute("class","right-comment");
                  div311.setAttribute("class","clearfix");
                  div4.setAttribute("class","clearfix");
                  img.setAttribute("class","img-responsive");
                  img.setAttribute("src","http://localhost/tp/public/static/index/images/"+photo);
                  h5.innerHTML = name.value;
                  span.innerHTML = time.getFullYear()+"-"+(time.getMonth+1 < 10 ? '0'+(time.getMonth()+1) : time.getMonth()+1)+"-"+(time.getDate() < 10 ? '0'+time.getDate() : time.getDate())+" "+(time.getHours() < 10 ? '0'+time.getHours() : time.getHours())+":"+(time.getMinutes() < 10 ? '0'+time.getMinutes() : time.getMinutes())+":"+(time.getSeconds() < 10 ? '0'+time.getSeconds() : time.getSeconds());  // 设置显示时间样式
                  p.innerHTML = content.value;
                  div2.appendChild(img);
                  div31.appendChild(h5);
                  div31.appendChild(span);
                  div31.appendChild(div311);
                  div3.appendChild(div31);
                  div3.appendChild(p);
                  div1.appendChild(div2);
                  div1.appendChild(div3);
                  div1.appendChild(div4);
                  if(document.getElementById("notdata")){
                      commentTop.removeChild(document.getElementById("notdata"));
                  }
                  num11.innerHTML = parseInt(num11.innerHTML)+1;
                  commentTop.appendChild(div1);
                }
            }
          }
        }
    }
    // 验证表单
    function checkname(name){
        var hint11 = document.getElementById("hint11");
        if(name.value == ""){
          hint11.innerHTML = "*昵称不能为空";
          return false;
        } else if(name.value.length > 25){
          hint11.innerHTML = "*昵称不能超过25个字符";
          return false;
        } else {
          hint11.innerHTML = "";
          return true;
        }
    }
    function checkemail(email){
      var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
      var hint12 = document.getElementById("hint12");
      if(email.value == ""){
          hint12.innerHTML = "*邮箱不能为空";
          return false;
        } else if(!reg.test(email.value)){
          hint12.innerHTML = "*邮箱格式有误,正确:123@123.com";
          return false;
        } else {
          hint12.innerHTML = "";
          return true;
        }
    }
    function checkcontent(content){
      var hint13 = document.getElementById("hint13");
      if(content.value == ""){
        hint13.innerHTML = "*内容不能为空";
        return false;
      } else {
        hint13.innerHTML = "";
        return true;
      }
    }
</script>

</body>
</html>
