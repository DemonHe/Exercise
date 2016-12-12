
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>列表</title>

    <!-- Bootstrap core CSS -->
    <?php if($_SESSION['auth']==0){
        echo ' <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">';
    }?>
    
</head>

<body <?php if($type==0){
    echo 'onload="showActlist()"';
} else if($type==1){
    echo 'onload="showCon(\'infocon\')"';
}else if($type==2){
    echo 'onload="showPar()"';
}else if($type==3){
    echo 'onload=\'showUsers("'.$username.'")\'';
}?>>
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--    <!--    <div style="font-family: 微软雅黑;width:100%;height:100%;margin: 0;padding:0;">-->
<!--    <div class="navbar-header" style="margin-top: 0.5%;margin-left:8%;">-->
<!--        <a class="navbar-brand" href="#">爱运动</a>-->
<!--    </div>-->
<!---->
<!--    <ul class="nav navbar-nav" style="margin-left: 20%;font-size: 19px;margin-top: 1%;">-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/HomeController">首页</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Exercise">运动</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Activity">活动</a></li>-->
<!--<!--        <li><a href="http://localhost/Sportsweb/index.php/Moment">朋友圈</a></li>-->
<!--<!--        <li><a href="http://localhost/Sportsweb/index.php/Group">兴趣小组</a></li>-->
<!--    </ul>-->
<!--    <div class="icon-envelope message-icon"></div>-->
<!--    <div class="nav_menu-item">-->
<!--        <div>-->
<!--            <img src="http://localhost/Sportsweb/img/--><?php //echo $portrait?><!--" class="portrait_icon">-->
<!--        </div>-->
<!--        <dl>-->
<!--            <dt><span class="arrow"></span></dt>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Account">个人设置</a></dd>-->
<!--            <dd><a href="">修改密码</a></dd>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Friends">好友/关注</a></dd>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Login/logout">退出登录</a></dd>-->
<!--        </dl>-->
<!--    </div>-->
<!--</nav>-->
<div class="centerboard" style="padding-bottom: 4%;min-height:500px;margin-top:0;padding-top:5%;">
    <a class="back_icon" href="javascript:history.go(-1)"><i class="glyphicon glyphicon-arrow-left"></i></a>
    <?php echo '<div style="display: inline-block;margin-left: 0;font-size: 20px;font-family: 微软雅黑;">'.$content.'</div>';?>
    <div id="infocon"></div>
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
<script src="http://localhost/Sportsweb/js/Showactlist.js"></script>
<script src="http://localhost/Sportsweb/js/Showusers.js"></script>
</body>
</html>
