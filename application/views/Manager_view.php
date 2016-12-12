
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="运动社交网站，记录每天运动信息，可以添加好友、关注、发动态">
    <meta name="author" content="Demon">
<!--    <link rel="icon" href="../../favicon.ico">-->

    <title>系统管理员界面</title>

<!--     Bootstrap core CSS -->
        <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
        <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
        <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">
        <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">

</head>

<body <?php echo 'onload="showAlluser()"'?>>
<div class="nav_menu-item" style="width: 5%;height:5%;margin-left: 5%;;">
    <div style="height: 100%;">
        <img src="http://localhost/Sportsweb/img/<?php echo $portrait?>" class="img-circle portrait_icon"
             style="margin-top: 10%;">
    </div>
    <dl>
        <dt><span class="arrow"></span></dt>
        <dd><a href="http://localhost/Sportsweb/index.php/Account">个人设置</a></dd>
        <dd><a href="http://localhost/Sportsweb/index.php/Password_change">修改密码</a></dd>
        <dd><a href="http://localhost/Sportsweb/index.php/Login/logout">退出登录</a></dd>
    </dl>
</div>

<div class="centerboard" style="padding-bottom: 4%;">
    <div style="width: 100%;min-height: 55px;">
        <form class="form-signin" role="form" style="width: 100%;height: auto;"
              method="post" action="http://localhost/Sportsweb/index.php/Friends/searchUser">
            <?php echo form_error('username','<div class="error" style="margin-left: 55%;">', '</div>'); ?>
            <div class="input-group" style="width:30%;float: right;margin-top: 1%;margin-right: 5%;">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 搜索用户</button>
            </span>
                <input type="text" id="input1-group2" name="username" class="form-control" placeholder="输入用户昵称">
            </div>
        </form>
    </div>

    <div id="alluser" style="width:100%;padding-right:7%;"></div>
</div>

<div class="footer">
    <div class="line"></div>
    <div>
        Copyright&copy;爱运动&nbsp;
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://cdn.bootcss.com/tether/1.3.6/js/tether.min.js"></script>
<script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://localhost/Sportsweb/js/Showusers.js"></script>
</body>
</html>
