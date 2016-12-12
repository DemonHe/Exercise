
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>其他用户</title>

    <!-- Bootstrap core CSS -->
    <?php if($_SESSION['auth']==0){
        echo ' <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">';
    }?>
</head>

<body  <?php if($_SESSION['auth']==1){echo 'style="background: white;"';}?>>
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--    <div class="navbar-header" style="margin-top: 0.5%;margin-left:8%;">-->
<!--        <a class="navbar-brand" href="#">爱运动</a>-->
<!--    </div>-->
<!---->
<!--    <ul class="nav navbar-nav" style="margin-left: 20%;font-size: 19px;margin-top: 1%;">-->
<!--        <li><a href="../HomeController">首页</a></li>-->
<!--        <li><a href="../Exercise">运动</a></li>-->
<!--        <li><a href="../Activity">活动</a></li>-->
<!--        <li><a href="../Moment">朋友圈</a></li>-->
<!--        <li><a href="../Group">兴趣小组</a></li>-->
<!--    </ul>-->
<!--    <div class="icon-envelope message-icon"></div>-->
<!--    <div class="nav_menu-item">-->
<!--        <div>-->
<!--            <img src="http://localhost/Sportsweb/img/--><?php //echo $userportrait?><!--" class="portrait_icon">-->
<!--        </div>-->
<!--        <dl>-->
<!--            <dt><span class="arrow"></span></dt>-->
<!--            <dd><a href="../Account">个人设置</a></dd>-->
<!--            <dd><a href="">修改密码</a></dd>-->
<!--            <dd><a href="../Friends">好友/关注</a></dd>-->
<!--            <dd><a href="../Login/logout">退出登录</a></dd>-->
<!--        </dl>-->
<!--    </div>-->
<!--</nav>-->

<div class="centerboard"  <?php if($_SESSION['auth']==0){echo 'style="margin-top:0;padding-top:3%;"';}?>>
    <div class="otherdetail">
        <img src="http://localhost/Sportsweb/img/<?php echo $otherportrait?>" class="portarit" style="margin-top: 5%;margin-left: 5%;" id="userportarit">
        <div style="display: inline-block;width:60%;">
            <div style="font-size: 28px;margin-left: 30%;margin-top: 4%;"><?php echo $nickname?>
                <?php if($isFriend){
                    echo '<a href="http://localhost/Sportsweb/index.php/Talk?id='.$id.'" title="发消息"><i class="glyphicon glyphicon-comment"></i></a>';
                }?>
            </div>
            <div class="otherUserlabel">
                性别:&nbsp;&nbsp;<?php echo $sex?></div>
            <div class="otherUserlabel">
                生日:&nbsp;&nbsp;<?php echo $birthday?></div>
            <div class="otherUserlabel">
                所在地:&nbsp;&nbsp;<?php echo $location?></div>
            <div class="otherUserlabel" style="display: block;">个人简介:</div>
            <div class="otherUserlabel" style="display: block;margin-left: 15%;margin-top: 1%;"><?php echo $introduction?></div>
        </div>
    </div>
    <div style="display:inline-block;margin-left: 5%;margin-top: 4%;width:20%;">
        <div class="card" style="height: 30%;width: 100%;" id="card_act">
            <div class="card-footer p-x-1 p-y-h">
                <span>参加的活动</span>
                <a class="font-weight-bold font-xs btn-block text-muted"
                   style="display: inline-block;width:30%;float: right;" href="http://localhost/Sportsweb/index.php/Friends/showActlist?id=<?php echo $id;?>">查看更多
                    <i class="fa fa-angle-right pull-right font-lg"></i></a>
            </div>
        </div>

        <div class="card" style="height: 30%;width: 100%;margin-top: 4%;" id="card_con">
            <div class="card-footer p-x-1 p-y-h">
                <span>关注的人</span>
                <a class="font-weight-bold font-xs btn-block text-muted" style="display: inline-block;width:30%;float: right;" href="http://localhost/Sportsweb/index.php/Friends/showConlist?id=<?php echo $id;?>">查看更多 <i class="fa fa-angle-right pull-right font-lg"></i></a>
            </div>
        </div>
    </div>
<!--    <div class="card" style="display:inline-block;vertical-align:top;margin-left: 5%;margin-top: 3%;width:50%;">-->

        <div style="display:inline-block;vertical-align:top;margin-left: 5%;margin-top: 3%;width:60%;">
            <h3>运动曲线图</h3>
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#distance" id="distance-tab" role="tab" data-toggle="tab" aria-controls="distance" aria-expanded="true">距离</a>
                </li>
                <li role="presentation">
                    <a href="#time" role="tab" id="time-tab" data-toggle="tab" aria-controls="time">时间</a>
                </li>
                <li role="presentation">
                    <a href="#heat" role="tab" id="heat-tab" data-toggle="tab" aria-controls="heat">卡路里</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="distance" aria-labelledBy="distance-tab">
                    <div id="distanceline" style="width:100%;height: auto;"></div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="time" aria-labelledBy="time-tab">
                    <div id="timeline" style="width:50%;height: auto;"></div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="heat" aria-labelledBy="heat-tab">
                    <div id="calorline" style="width:50%;height: auto;"></div>
                </div>
            </div>
        </div>
<!--    </div>-->
    <?php
    if($_SESSION['auth']==0){
        echo ' <a href="http://localhost/Sportsweb/index.php/Manager/deleteUser?id='.$id.'">
        <button type="button" class="btn btn-primary" style="margin-top: 5%;margin-left: 30%;margin-bottom: 5%;">
            删除用户</button>
    </a>';
    }else{
        if($_SESSION['id']!=$id){
            if($isFriend) {
                echo ' <a href="http://localhost/Sportsweb/index.php/Friends/breakFriend?id='.$id.'">
        <button type="button" class="btn btn-primary" style="margin-top: 5%;margin-left: 25%;margin-bottom: 5%;">
            删除好友</button>
    </a>';
            }else{
                echo ' <a href="http://localhost/Sportsweb/index.php/Friends/makeFriend?id='.$id.'">
        <button type="button" class="btn btn-primary" style="margin-top: 5%;margin-left: 25%;margin-bottom: 5%;">
            添加好友</button>
    </a>';
            }
            if($isConcerned) {
                echo ' <a href="http://localhost/Sportsweb/index.php/Friends/cancelConcern?id='.$id.'">
        <button type="button" class="btn btn-success" style="margin-top: 5%;margin-left: 10%;margin-bottom: 5%;">
            取消关注</button>
    </a>';
            }else{
                echo ' <a href="http://localhost/Sportsweb/index.php/Friends/createConcern?id='.$id.'">
        <button type="button" class="btn btn-success" style="margin-top: 5%;margin-left: 10%;margin-bottom: 5%;">
            关注</button>
    </a>';
            }
        }
    } ?>
    <a href="<?php if($_SESSION['auth']==0) echo 'http://localhost/Sportsweb/index.php/Manager';
    else echo 'http://localhost/Sportsweb/index.php/Friends';?>">
        <button type="button" class="btn btn-primary-outline" style="margin-top: 5%;margin-bottom: 5%;margin-left: <?php
        if($_SESSION['id']==$id){echo '50%;display:block;';}
        else{echo '10%';}?>;">
            <?php if($_SESSION['auth']==1) echo '返回好友列表';
            else echo '返回首页';?></button>
    </a>

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
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://localhost/Sportsweb/js/Forotheruser.js"></script>
<!--Highcharts-->
<script src="http://cdn.hcharts.cn/highstock/highstock.js"></script>
<script src="http://localhost/Sportsweb/js/Distanceline.js"></script>
<script src="http://localhost/Sportsweb/js/Timeline.js"></script>
<script src="http://localhost/Sportsweb/js/Calorieline.js"></script>

</body>
</html>
