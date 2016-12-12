
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>个人主页</title>

    <!-- Bootstrap core CSS -->
<!--    <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">-->
<!--    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">-->
    
</head>

<body style="background-color: white;font-family: '微软雅黑';">
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--    <div class="navbar-header" style="margin-top: 0.5%;margin-left:8%;">-->
<!--        <a class="navbar-brand" href="#">爱运动</a>-->
<!--    </div>-->
<!---->
<!--    <ul class="nav navbar-nav" style="margin-left: 20%;font-size: 19px;margin-top: 1%;">-->
<!--        <li class="active"><a href="HomeController">首页</a></li>-->
<!--        <li><a href="Exercise">运动</a></li>-->
<!--        <li><a href="Activity">活动</a></li>-->
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
<!--            <dd><a href="">修改密码</a></dd>-->
<!--            <dd><a href="Friends">好友/关注</a></dd>-->
<!--            <dd><a href="Login/logout">退出登录</a></dd>-->
<!--        </dl>-->
<!--    </div>-->
<!--</nav>-->

<div id="portpanel">
<div style="min-height:250px;border: solid 1px lightgrey;padding-top: 5%;padding-bottom: 5%;">
    <div style="text-align: center;vertical-align: middle;">
        <img src="http://localhost/Sportsweb/img/<?php echo $_SESSION['portrait']?>"
             class="img-circle" style="width: 200px;height:200px;">
    </div>
    <div style="font-size: 16px;color: #5e615b;margin-left: 20%;margin-top:5%;">
        <div style="margin-top:2%;"> <?php if($nickname!=null)echo $nickname;
            else echo $email;?> <?php echo '   '.$sex.'  '.$grade.'级';?></div>
<!--        <div style="margin-left: 5%;"></div>-->
        <div style="margin-top:2%;"> 所在地：<?php echo $location;?></div>
        <div style="margin-top:2%;"> 生日：<?php echo $birthday;?></div>
<!--        <div style="margin-top:2%;"> --><?php //echo $grade;?><!--级</div>-->
    </div>
</div>
    <div style="display:inline-block;margin-left: 0;margin-top: 10%;width:100%;">
        <div class="card" style="height: 30%;width: 100%;" id="card_act">
            <div class="card-footer p-x-1 p-y-h">
                <span>参加的活动</span>
                <a class="font-weight-bold font-xs btn-block text-muted"
                   style="display: inline-block;width:30%;float: right;" href="http://localhost/Sportsweb/index.php/Friends/showActlist">查看更多
                    <i class="fa fa-angle-right pull-right font-lg"></i></a>
            </div>
        </div>

        <div class="card" style="height: 30%;width: 100%;margin-top: 8%;" id="card_con">
            <div class="card-footer p-x-1 p-y-h">
                <span>关注的人</span>
                <a class="font-weight-bold font-xs btn-block text-muted" style="display: inline-block;width:30%;float: right;" href="http://localhost/Sportsweb/index.php/Friends/showConlist">查看更多 <i class="fa fa-angle-right pull-right font-lg"></i></a>
            </div>
        </div>
    </div>
</div>

<div style="display:inline-block;width: 50%;min-height:800px;margin-left: 5%;margin-top:100px;background-color: white;">
    <div style="margin-top: 50px;width:100%;height: 250px;">
        <div class="col-sm-6 col-md-2" style="width: 33%;height: auto">
            <div class="card card-inverse card-info">
                <div class="card-block">
                    <div class="h1 text-muted text-xs-right m-b-2">
                        <span style="font-size: 35px;">运动时长</span>
                    </div>
                    <div class="h4 m-b-0" style="font-size: 23px;"> <?php echo $time?>h</div>
<!--                    <small class="text-muted text-uppercase font-weight-bold">Visitors</small>-->
<!--                    <progress class="progress progress-xs progress-info m-t-1 m-b-0" value="25" max="100">25%</progress>-->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2" style="width: 33%;height: auto;">
            <div class="card card-inverse card-warning" >
                <div class="card-block">
                    <div class="h1 text-muted text-xs-right m-b-2">
                        <span style="font-size: 35px;">运动距离</span>
                    </div>
                    <div class="h4 m-b-0" style="font-size: 23px;"><?php echo $distance?>km</div>
                    <!--<small class="text-muted text-uppercase font-weight-bold">Returning Visitors</small>-->
                    <!--<progress class="progress progress-xs progress-primary m-t-1 m-b-0" value="25" max="100">25%</progress>-->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2" style="width: 33%;height: auto;">
            <div class="card card-inverse card-danger">
                <div class="card-block">
                    <div class="h1 text-muted text-xs-right m-b-2">
                        <span style="font-size: 35px;">燃烧热量</span>
                    </div>
                    <div class="h4 m-b-0" style="font-size: 23px;"><?php echo $calorie?>KJ</div>
                    <!--<small class="text-muted text-uppercase font-weight-bold">Avg. Time</small>-->
                    <!--<progress class="progress progress-xs progress-danger m-t-1 m-b-0" value="25" max="100">25%</progress>-->
                </div>
            </div>
        </div>
    </div>
    <div>
<!--        <div class="card">-->
<!--            <div class="card-header">-->
<!--                好友排名-->
<!--                <span class="label label-pill label-danger pull-right">42</span>-->
<!--            </div>-->
<!--            <div class="card-block" id="rank">-->
<!--            </div>-->
<!--        </div>-->
        <div style="font-family: 微软雅黑;font-size: 20px;">好友排名</div>
        <div id="rank"></div>
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
<script src="http://localhost/Sportsweb/js/Forotheruser.js"></script>
<script src="http://localhost/Sportsweb/js/Showrank.js"></script>
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
