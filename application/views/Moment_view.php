
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>朋友圈</title>

    <!-- Bootstrap core CSS -->
<!--    <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">-->
<!--    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">-->

</head>

<body>
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--    <!--    <div style="font-family: 微软雅黑;width:100%;height:100%;margin: 0;padding:0;">-->-->
<!--    <div class="navbar-header" style="margin-top: 0.5%;margin-left:8%;">-->
<!--        <a class="navbar-brand" href="#">爱运动</a>-->
<!--    </div>-->
<!---->
<!--    <ul class="nav navbar-nav" style="margin-left: 20%;font-size: 19px;margin-top: 1%;">-->
<!--        <li><a href="HomeController">首页</a></li>-->
<!--        <li><a href="Exercise">运动</a></li>-->
<!--        <li><a href="Activity">活动</a></li>-->
<!--        <li class="active"><a href="Moment">朋友圈</a></li>-->
<!--        <li><a href="/Group">兴趣小组</a></li>-->
<!--    </ul>-->
<!--    <div class="icon-envelope message-icon"></div>-->
<!--    <div class="nav_menu-item">-->
<!--        <div>-->
<!--            <img src="../img/--><?php //echo $portrait?><!--" class="portrait_icon">-->
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

<div style="height: 100%;margin-top: -20%;margin-left:10%;margin-bottom:7%;width:80%;padding-top: 20%;background-color: white;">
    <form action="http://localhost/Sportsweb/index.php/Moment/publish" method="post"
          enctype="multipart/form-data" class="form-horizontal"
          style="display: block;width:70%;margin-left: 15%;margin-top: 15%;">
        <textarea id="textarea-input" name="mcontent"  value="" style="width:100%;"
                  rows="9" class="form-control" placeholder="内容..."></textarea>
        <input type="submit" class="btn btn-primary" value="发布"
               style="width:20%;font-size:16px;margin-top: 2%;margin-left: 80%;">
    </form>
    <div style="width:70%;margin-left: 15%;margin-top: 8%;margin-bottom:5%;">
        <ul id="myTab" class="nav nav-tabs" style="padding-top: 1%;padding-left: 3%;">
            <li class="active">
                <a href="#moment_all" data-toggle="tab">所有动态</a>
            </li>
            <li>
                <a href="#moment_me" data-toggle="tab">我发布的动态</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content" style="margin-bottom: 5%;">
            <div class="tab-pane fade in active" id="moment_all">
<!--                <div class="moment_div">-->
<!--                    <div class="moment_content">-->
<!--                        nickname:assdfghjkkl-->
<!--                    </div>-->
<!--                    <div style="padding-top: 1%;padding-bottom: 3%;">-->
<!--                        <a href="">查看评论</a>-->
<!--                        <a href="" class="moment_option" style="float: right;"><i class="glyphicon glyphicon-comment"></i>评论</a>-->
<!--                    </div>-->
<!--                    <div>评论</div>-->
<!--                </div>-->
            </div>
            <div class="tab-pane fade" id="moment_me">
            </div>
        </div>
    </div>
</div>

<div class="footer" style="margin-top: 5%;">
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
<script src="http://localhost/Sportsweb/js/Showmoments.js"></script>
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
