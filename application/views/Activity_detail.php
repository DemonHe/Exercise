
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>活动详情</title>

    <!-- Bootstrap core CSS -->
    <?php if($_SESSION['auth']==0){
        echo ' <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">';
    }?>

</head>

<body>
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--       <div style="font-family: 微软雅黑;width:100%;height:100%;margin: 0;padding:0;">-->
<!--    <div class="navbar-header" style="margin-top: 0.5%;margin-left:8%;">-->
<!--        <a class="navbar-brand" href="#">爱运动</a>-->
<!--    </div>-->
<!---->
<!--    <ul class="nav navbar-nav" style="margin-left: 20%;font-size: 19px;margin-top: 1%;">-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/HomeController">首页</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Exercise">运动</a></li>-->
<!--        <li class="active"><a href="http://localhost/Sportsweb/index.php/Activity">活动</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Moment">朋友圈</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Group">兴趣小组</a></li>-->
<!--    </ul>-->
<!--    <div class="icon-envelope message-icon"></div>-->
<!--    <div class="nav_menu-item">-->
<!--        <div>-->
<!--            <img src="http://localhost/Sportsweb/img/--><?php //echo $portrait?><!--" class="portrait_icon">-->
<!--        </div>-->
<!--        <dl>-->
<!--            <dt><span class="arrow"></span></dt>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Account">个人设置</a></dd>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Password_change">修改密码</a></dd>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Friends">好友/关注</a></dd>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Login/logout">退出登录</a></dd>-->
<!--        </dl>-->
<!--    </div>-->
<!--</nav>-->

<div class="centerboard" id = "accenter" style="margin-top:0;padding-top: 5%;">
    <div id = "acname" style="font-size: 25px;text-align: center;padding-top: 5%;"></div>
    <div style="display:inline-block;margin-top: 3%;margin-left: 7%;vertical-align: top;width:25%;">
        <img src="" id="acposter" style="width:100%;">
    </div>
    <div id = "introduction" style="display:inline-block;margin-left: 4%;margin-top:3%;width:60%;">
    </div>
    <form class="form-signin" role="form" id = "bgroup" style="display:block;width: 100%;"
          method="post" action="">
        <input type="submit" class="btn btn-primary" value="参加" id="sbutton"
               style="margin-top: 5%;margin-left: 35%;margin-bottom: 5%;">
        
    <a id="back" href="javascript:history.go(-1)">
        <button type="button" class="btn btn-primary-outline" style="margin-top: 5%;margin-bottom: 5%;margin-left: 10%;">
            返回</button>
    </a>
    </form>
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
<script src="http://localhost/Sportsweb/js/Foractivitydetail.js"></script>
<script>
    $(function () {
        var auth = <?php echo $_SESSION['auth']?>;
        if(auth==1){
            var li = document.getElementById("navbar").firstElementChild;
            for(var i = 0;i<4;i++) {
                if (i == <?php echo $index?>)
                    li.setAttribute("class", "active");
                else
                    li.removeAttribute("class");
                li = li.nextElementSibling;
            }
        }
    });
</script>
</body>
</html>
