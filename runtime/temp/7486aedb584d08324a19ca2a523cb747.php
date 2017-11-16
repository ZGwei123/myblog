<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"E:\wamp64\www\tp\public/../application/index\view\index\index.html";i:1510817188;s:68:"E:\wamp64\www\tp\public/../application/index\view\common\header.html";i:1510146938;s:67:"E:\wamp64\www\tp\public/../application/index\view\common\right.html";i:1510654986;s:68:"E:\wamp64\www\tp\public/../application/index\view\common\footer.html";i:1510745601;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>伟·编程记录</title>
<meta name="keywords" content="伟·编程记录，个人博客" />
<meta name="description" content="伟的编程记录，记录个人学习编程的过程、总结" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
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
    <div class="banner">
      <ul class="texts">
        <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
        <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
      </ul>
    </div>
    <div class="bloglist" id="contents">
      <h2>
        <p><span>最新</span>文章</p>
      </h2>
      <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class="blogs">
        <h3><a href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>"><?php echo $vo['title']; ?></a></h3>
        <figure><img src="<?php if($vo['pic'] == ""): ?>__STYLE__/images/error.png<?php else: ?>__UPLOADS__/<?php echo $vo['pic']; endif; ?>" ></figure>
        <ul>
          <div class="content11" name="content11"><?php echo $vo['content']; ?></div>
          <a href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>" target="_self" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：<?php echo $vo['author']; ?></span><span>分类：【<a href="<?php echo url('Cate/index', array('cateid' => $vo['cate_id'])); ?>"><?php echo $vo['catename']; ?></a>】</span><span>浏览（<a href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>"><?php echo $vo['click']; ?></a>）</span><span>评论（<a href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>">
        <?php if(is_array($commentsum) || $commentsum instanceof \think\Collection || $commentsum instanceof \think\Paginator): if( count($commentsum)==0 ) : echo "" ;else: foreach($commentsum as $k=>$vl): if($k == $vo['id']): ?>
				<?php echo $vl; endif; endforeach; endif; else: echo "" ;endif; ?>
        </a>）</span></p>
        <div class="dateview"><?php echo date("Y-m-d",$vo['time']); ?></div>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      <div class="pages">
			<div class="plist" >
				<?php echo $articles->render(); ?>
			</div>
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
	var txt = 200;//设置留下的字数
    var m = document.getElementsByName("content11");//id   html 中设置
    var ps1 = null;
    var spans1 = null;
    for(var i = 0; i < m.length; i++){
    	// 将文章字体大小设置为12px
    	if(m[i].getElementsByTagName("p")){
    		ps1 = m[i].getElementsByTagName("p");
    		for(var j = 0; j < ps1.length; j++){
    			ps1[j].setAttribute("style","font-size:12px");
    		}
    	}
    	// 将文章字体大小设置为12px
    	if(m[i].getElementsByTagName("span")){
    		spans1 = m[i].getElementsByTagName("span");
    		for(var j = 0; j < spans1.length; j++){
    			spans1[j].setAttribute("style","font-size:12px");
    		}
    	}
    	if(m[i].innerHTML != "" && m[i].innerHTML.length > 200){
    		var str = m[i].innerHTML.substring(0, txt);
    		m[i].innerHTML = str + "...";
    	}
    }
 	function click11(){
 		var click = document.getElementById("search-green").value;
 		window.location="/tp/public/index/search/index/keywords/"+click;
 	}
</script>

</body>
</html>
