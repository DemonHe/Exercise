
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>活动</title>

    <!-- Bootstrap core CSS -->
<!--    <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">-->
<!--    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">-->

</head>

<body onload="getAll();getCreate();getJoin()" style="background: white;">
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--    <!--    <div style="font-family: 微软雅黑;width:100%;height:100%;margin: 0;padding:0;">-->-->
<!--    <div class="navbar-header" style="margin-top: 0.5%;margin-left:8%;">-->
<!--        <a class="navbar-brand" href="#">爱运动</a>-->
<!--    </div>-->
<!---->
<!--    <ul class="nav navbar-nav" style="margin-left: 20%;font-size: 19px;margin-top: 1%;">-->
<!--        <li><a href="HomeController">首页</a></li>-->
<!--        <li><a href="Exercise">运动</a></li>-->
<!--        <li class="active"><a href="Activity">活动</a></li>-->
<!--        <li><a href="Moment">朋友圈</a></li>-->
<!--        <li><a href="Group">兴趣小组</a></li>-->
<!--    </ul>-->
<!--    <div class="icon-envelope message-icon"></div>-->
<!--    <div class="nav_menu-item">-->
<!--        <div>-->
<!--            <img src="../img/--><?php //echo $portrait?><!--" class="portrait_icon">-->
<!--        </div>-->
<!--        <dl>-->
<!--            <dt><span class="arrow"></span></dt>-->
<!--            <dd><a href="Account">个人设置</a></dd>-->
<!--            <dd><a href="http://localhost/Sportsweb/index.php/Password_change">修改密码</a></dd>-->
<!--            <dd><a href="Friends">好友/关注</a></dd>-->
<!--            <dd><a href="Login/logout">退出登录</a></dd>-->
<!--        </dl>-->
<!--    </div>-->
<!--</nav>-->

<div class="centerboard">
    <form class="form-signin" role="form" style="width: 100%;"
          method="post" action="http://localhost/Sportsweb/index.php/Activity/searchAct">
        <?php echo form_error('actname','<div class="error" style="margin-left: 75%;">', '</div>'); ?>
        <div class="input-group" style="width:30%;float: right;margin-top: 1%;margin-right: 5%;">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 搜索活动</button>
            </span>
            <input type="text" id="input1-group2" name="actname" class="form-control" placeholder="输入活动名称">
        </div>
    </form>
    <div>
        <ul id="myTab" class="nav nav-tabs" style="padding-top: 50px;padding-left: 30px;">
            <li class="active">
                <a href="#activity_all" data-toggle="tab">所有活动</a>
            </li>
            <li>
                <a href="#activity_join" data-toggle="tab">参加的活动</a>
            </li>
            <li>
                <a href="#activity_create" data-toggle="tab">发起的活动</a>
            </li>
            <li>
                <a href="http://localhost/Sportsweb/index.php/Activity_create">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="activity_all">
            </div>
            <div class="tab-pane fade" id="activity_join">
            </div>
            <div class="tab-pane fade" id="activity_create">
            </div>
        </div>
    </div>

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
<script src="http://localhost/Sportsweb/js/Foractivity.js"></script>
<script>
    $(function () {
        var li = document.getElementById("navbar").firstElementChild;
        for(var i = 0;i<4;i++) {
            if (i == <?php echo $index?>)
                li.setAttribute("class", "active");
            else
                li.removeAttribute("class");
            li = li.nextElementSibling;
        }
    });
</script>
</body>
</html>
