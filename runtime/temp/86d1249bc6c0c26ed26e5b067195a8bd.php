<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\wamp64\www\tp\public/../application/admin\view\login\login.html";i:1508641933;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>童老师ThinkPHP交流群：484519446</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__STYLE__/style/bootstrap.css" rel="stylesheet">
    <link href="__STYLE__/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="__STYLE__/style/beyond.css" rel="stylesheet">
    <link href="__STYLE__/style/demo.css" rel="stylesheet">
    <link href="__STYLE__/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">
        <form action="" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">登录</div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="用户名" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="密码" name="password" type="password">
                </div>
                <div class="loginbox-textbox">
                    <input style="width:100px;float:left;" class="form-control" placeholder="验证码" name="captcha" type="text">
                    <img src="<?php echo captcha_src(); ?>" style="margin-left:10px;cursor:pointer;" onclick="this.src='<?php echo captcha_src(); ?>?id='+Math.random()" id="img"/>
                </div>
                
                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="登录" type="submit">
                </div>
            </div>
                <div class="logobox">
                    <p class="text-center">童老师ThinkPHP交流群：4845194464</p>
                </div>
        </form>
    </div>
    <!--Basic Scripts-->
    <script src="__STYLE__/style/jquery.js"></script>
    <script src="__SYTLE__/style/bootstrap.js"></script>
    <script src="__SYTLE__/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="__STYLE__/style/beyond.js"></script>
    <script type="text/javascript">
        function refersh(){
            document.getElementById("img").src = "<?php echo captcha_src(); ?>?id="+Math.random();
        }
    </script>



</body><!--Body Ends--></html>