<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="运动社交网站，记录每天运动信息，可以添加好友、关注、发动态">
    <meta name="author" content="Demon">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">

    <!--[if IE]>
    <script>
        (function(){
            if(!/*@cc_on!@*/0)return;
            var e = "header,footer,nav,article,section".split(','),i=e.length;while(i--){document.createElement(e[i])}})()
    </script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">
    <!--    <div style="font-family: 微软雅黑;width:100%;height:100%;margin: 0;padding:0;">-->
    <div class="navbar-header" style="margin-top: 1.5%;margin-left:8%;">
        <a class="navbar-brand" href="#">爱运动</a>
    </div>

    <ul class="nav navbar-nav" id="navbar" style="margin-left: 10%;font-size: 19px;margin-top: 0;margin-bottom: 0;height: 100%;width:50%;">
        <li id="li1" style="width: 25%;height: 100%;text-align: center;vertical-align: center;padding-top: 3%;">
            <a href="http://localhost/Sportsweb/index.php/HomeController">首页</a></li>
        <li id="li1" style="width: 25%;height: 100%;text-align: center;vertical-align: center;padding-top: 3%;">
            <a href="http://localhost/Sportsweb/index.php/Exercise">运动</a></li>
        <li id="li1" style="width: 25%;height: 100%;text-align: center;vertical-align: center;padding-top: 3%;">
            <a href="http://localhost/Sportsweb/index.php/Activity">活动</a></li>
        <li id="li1" style="width: 25%;height: 100%;text-align: center;vertical-align: center;padding-top: 3%;">
            <a href="http://localhost/Sportsweb/index.php/Moment">朋友圈</a></li>
<!--        <li><a href="http://localhost/Sportsweb/index.php/Group">兴趣小组</a></li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right" style="display: inline-block;width:20%;height: 100%;">
        <li class="message-icon">
            <a href="http://localhost/Sportsweb/index.php/Message" <?php if($_SESSION['mnum']>0) echo'title="您有'.$_SESSION['mnum'].'条新的通知"'?> style="padding: 0;text-align: center;vertical-align: middle;margin-top: 27%;">
                <i class="fa fa-envelope-o" style="font-size: 25px;"></i>
                <?php if($_SESSION['mnum']>0) echo'<span class="label label-warning">'.$_SESSION['mnum'].'</span>'?>
            </a>
        </li>
    <li class="nav_menu-item">
        <div style="height: 100%;">
            <img src="http://localhost/Sportsweb/img/<?php echo $_SESSION['portrait']?>" class="img-circle portrait_icon"
            style="margin-top: 10%;width: 50px;height: 50px;">
        </div>
        <dl>
            <dt><span class="arrow"></span></dt>
            <dd><a href="http://localhost/Sportsweb/index.php/Account">个人设置</a></dd>
            <dd><a href="http://localhost/Sportsweb/index.php/Password_change">修改密码</a></dd>
            <dd><a href="http://localhost/Sportsweb/index.php/Friends">好友/关注</a></dd>
            <dd><a href="http://localhost/Sportsweb/index.php/Login/logout">退出登录</a></dd>
        </dl>
    </li>
    </ul>
</nav>
</body>
</html>