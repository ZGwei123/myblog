<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"E:\wamp64\www\tp5\public/../application/index\view\article\article.html";i:1509284892;s:69:"E:\wamp64\www\tp5\public/../application/index\view\common\header.html";i:1509283056;s:68:"E:\wamp64\www\tp5\public/../application/index\view\common\right.html";i:1509243759;s:69:"E:\wamp64\www\tp5\public/../application/index\view\common\footer.html";i:1506349480;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>童老师ThinkPHP交流群：484519446</title>
        <meta name="keywords" content="童老师ThinkPHP交流群：484519446" />
        <meta name="description" content="童老师ThinkPHP交流群：484519446" />
        <meta name="mobile-agent" content="format=html5; url=http://m.zx.wed114.cn/shenghuo/20160920156214.html" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
		<link href="__STYLE__/style/lady.css" type="text/css" rel="stylesheet" />
		<script type='text/javascript' src='__STYLE__/style/ismobile.js'></script>
    </head>

    <body>

        <div class="ladytop">
            <div class="nav">
                <div class="left"><a href="<?php echo url('Index/index'); ?>"><img src="__STYLE__/images/hunshang.png" alt="wed114婚尚"></a></div>
                <div class="right">
                <div class="box">
                    <a href="<?php echo url('Index/index'); ?>"  rel='dropmenu209'>首页</a>
                    <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('Cate/index',array('cateid' => $vo['id'])); ?>"  rel='dropmenu209'><?php echo $vo['catename']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?> 
                 </div>
                </div>
            </div>
        </div>

        <div class="hotmenu">
            <div class="con">热门标签：
            <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href='/tp5/public/index/Search/index.html?keywords=<?php echo $vo['tagname']; ?>'><?php echo $vo['tagname']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>

        <!--顶部通栏-->
        <script src='/jiehun/goto/my-65547.js' language='javascript'></script>

        <div class="position"><a href='<?php echo url("Index/index"); ?>'>主页</a> > <a href='<?php echo url("Cate/index", array("cateid" => $cate['id'])); ?>'><?php echo $cate['catename']; ?></a> >  </div>

        <div class="overall">
            <div class="left">
                <div class="scrap">
                    <h1><?php echo $article['title']; ?></h1>
                    <div class="spread">
                        <span class="writor">发布时间：<?php echo date("Y-m-d H:i:s",$article['time']); ?></span>
                        <span class="writor">编辑：<?php echo $article['author']; ?></span>
                        <span class="writor">标签：
                            <?php
                                $arr = explode(",",$article['keywords']);
                                foreach($arr as $key=>$value){
                                    echo "<a href='".url('Search/index',array('keywords' => $value))."'>".$value."</a>";
                                }
                            ?>
                        </span>
                        <span class="writor">热度：<script src="/jiehun/plus/count.php?view=yes&aid=156214&mid=55" type='text/javascript' language="javascript"></script><?php echo $article['click']; ?></span>
                    </div>
                </div>

                <!--百度分享-->
                <script src='/jiehun/goto/my-65542.js' language='javascript'></script>

                <div class="takeaway">
                    <span class="btn arr-left"></span>
                    <p class="jjxq"><?php echo $article['synopsis']; ?>
</p>
                    <span class="btn arr-right"></span>
                </div>

                  <script src='/jiehun/goto/my-65541.js' language='javascript'></script>

                <div class="substance"><?php echo $article['content']; ?></div>


                <div class="biaoqian">
                   
                </div>



                <!--相关阅读 -->
                <?php if($relates != null): ?>
                <div class="xgread">
                    <div class="til"><h4>相关阅读</h4></div>
                    <div class="lef"><!--相关阅读主题链接--><script src='/jiehun/goto/my-65540.js' language='javascript'></script></div>
                    <div class="rig">
                        <ul>
                            <?php if(is_array($relates) || $relates instanceof \think\Collection || $relates instanceof \think\Paginator): $i = 0; $__LIST__ = $relates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li><a href='<?php echo url("Article/index", array("articleid" => $vo['id'])); ?>' target="_self"><?php echo $vo['title']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>        
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                <!--频道推荐-->
                <div class="hotsnew">
                    <div class="til"><h4>频道推荐</h4></div>
                    <ul>
                    <?php if(is_array($commendArticle) || $commendArticle instanceof \think\Collection || $commendArticle instanceof \think\Paginator): $i = 0; $__LIST__ = $commendArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><div class="tu"><a href='<?php echo url("Article/index",array("articleid" => $vo['id'])); ?>' target="_self"><img src='<?php if($vo['pic'] != ''): ?>__UPLOADS__/<?php echo $vo['pic']; else: ?>
                        __STYLE__/images/error.png<?php endif; ?>' alt="<?php echo $vo['title']; ?>"/></a></div><p><a href='<?php echo url("Article/index",array("articleid" => $vo['id'])); ?>'><?php echo $vo['title']; ?></a></p></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                    </ul>
                </div>		
            </div>

                    <div class="right">
                <!--右侧各种广告-->
                <!--猜你喜欢-->
<div id="hm_t_57953"><div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
<div class="hm-t-container" style="width: 298px;"><div class="hm-t-main"><div class="hm-t-header">热门点击</div><div class="hm-t-body"><ul class="hm-t-list hm-t-list-img">
<?php if(is_array($hotClick) || $hotClick instanceof \think\Collection || $hotClick instanceof \think\Paginator): $i = 0; $__LIST__ = $hotClick;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="hm-t-item hm-t-item-img"><a data-pos="0" title="<?php echo $vo['title']; ?>" target="_self" href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>" class="hm-t-img-title" style="visibility: visible;"><span><?php echo $vo['title']; ?></span></a></li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div></div></div>

</div></div>
<div style="height:15px"></div>
<div id="hm_t_57953"><div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
<div style="width: 298px;" class="hm-t-container"><div class="hm-t-main"><div class="hm-t-header">推荐阅读</div><div class="hm-t-body"><ul class="hm-t-list hm-t-list-img">
<?php if(is_array($hotCommend) || $hotCommend instanceof \think\Collection || $hotCommend instanceof \think\Paginator): $i = 0; $__LIST__ = $hotCommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="hm-t-item hm-t-item-img"><a style="visibility: visible;" class="hm-t-img-title" href="<?php echo url('Article/index', array('articleid' => $vo['id'])); ?>" target="_self" title="<?php echo $vo['title']; ?>" data-pos="0"><span><?php echo $vo['title']; ?></span></a></li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div></div></div>

</div></div>
<div style="height:15px"></div>
<div id="bdcs"><div class="bdcs-container"><meta content="IE=9" http-equiv="x-ua-compatible">   <!-- 嵌入式 --> 	<div id="default-searchbox" class="bdcs-main bdcs-clearfix">      
		<div id="bdcs-search-inline" class="bdcs-search bdcs-clearfix">          
			<form id="bdcs-search-form" autocomplete="off" class="bdcs-search-form" target="_self" method="get" action="<?php echo url('Search/index'); ?>">              
		   		 <input type="text" placeholder="请输入关键词" id="bdcs-search-form-input" class="bdcs-search-form-input" name="keywords" autocomplete="off" style="line-height: 30px; width:220px;">
		    	<input type="submit" value="搜索" id="bdcs-search-form-submit" class="bdcs-search-form-submit bdcs-search-form-submit-magnifier">                       
		    </form>      
		</div>               
	 	<div id="bdcs-search-sug" class="bdcs-search-sug" style="top: 552px; width: 239px;">             
	  		<ul id="bdcs-search-sug-list" class="bdcs-search-sug-list"></ul>       
	    </div>                 
	     </div>                      
	</div>
</div>

<div style="height:15px"></div>


                
            </div>
    
</div>

        <div class="footerd">
            <ul>
                <li>Copyright &#169; 2008-2015  all rights reserved 版权所有</li> 
            </ul>
        </div>

    

    </body>
</html>