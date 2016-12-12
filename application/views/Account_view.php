
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>个人设置</title>

    <!-- Bootstrap core CSS -->
    <?php if($_SESSION['auth']==0){
        echo ' <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">';
    }?>

</head>

<body onload="init('<?php echo $birthday?>')" <?php if($_SESSION['auth']==1){echo 'style="background: white;"';}?>>
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--    <div class="navbar-header" style="margin-top: 0.5%;margin-left:8%;">-->
<!--        <a class="navbar-brand" href="#">爱运动</a>-->
<!--    </div>-->
<!---->
<!--    <ul class="nav navbar-nav" style="margin-left: 20%;font-size: 19px;margin-top: 1%;">-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/HomeController">首页</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Exercise">运动</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Activity">活动</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Moment">朋友圈</a></li>-->
<!--        <li><a href="http://localhost/Sportsweb/index.php/Group">兴趣小组</a></li>-->
<!--    </ul>-->
<!--    <div class="icon-envelope message-icon"></div>-->
<!--    <div class="nav_menu-item">-->
<!--        <div>-->
<!--            <img src="../img/--><?php //echo $portrait?><!--" class="portrait_icon">-->
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

<div style="padding-bottom: 3%;margin-top: <?php if($_SESSION['auth']==0){echo '0;padding-top:5%;';}else{echo '12%;';}?>;margin-left: 18%;width: 60%;background: white;">
    <div class="card-block">
        <form action="http://localhost/Sportsweb/index.php/Account/modifyInfo" method="post"
              enctype="multipart/form-data" class="form-horizontal">

            <div class="form-group row">
                <label class="col-md-2 form-control-label accountlabel" for="text-input">邮箱</label>
                <div class="col-md-9"><?php echo $email?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label accountlabel" for="text-input">昵称</label>
                <div class="col-md-9">
                    <input type="text" id="text-input" name="nickname" value="<?php echo set_value('nickname',$nickname)?>"
                           class="form-control" placeholder="昵称">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label accountlabel">性别</label>
                <div class="col-md-9">
                    <label class="radio-inline" for="inline-radio1">
                        <input type="radio" id="inline-radio1" name="sex" value="男"
                            <?php if($sex=="男"){echo  set_radio('sex', '男', TRUE);}?>> 男
                    </label>
                    <label class="radio-inline" for="inline-radio2">
                        <input type="radio" id="inline-radio2" name="sex" value="女"
                            <?php if($sex=="女"){echo  set_radio('sex', '女', TRUE);}?>> 女
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label accountlabel">生日</label>
                <div class="col-md-9">
                    <div class="input-group" style="width: 100%;">
                        <div class="form-group col-sm-4" style="width: 40%;padding-right:0;">
                            <select name="year" class="form-control" id="ccyear" style="display: inline-block;width: 70%;">
                            </select>
                            <div for="ccyear" class="datelabel">年</div>
                        </div>
                        <div class="form-group col-sm-4" style="width: 30%;margin-left: 3%;padding:0;">
                            <select name="month" class="form-control" id="ccmonth" onchange="changeDay()" style="display: inline-block;width: 80%;">
                            </select>
                            <div for="ccmonth" class="datelabel">月</div>
                        </div>
                        <div class="form-group col-sm-4" style="width: 30%;margin-left: 3%;padding:0;">
                            <select name="day" class="form-control" id="ccday" style="display: inline-block;width: 80%;">
                            </select>
                            <div for="ccmonth" class="datelabel">日</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label accountlabel" for="loaction-input">所在地</label>
                <div class="col-md-9">
                    <input type="text" id="location-input" name="location" value="<?php echo $location?>"
                           class="form-control" placeholder="Enter  your city">
                    <!--<span class="help-block">Please enter your email</span>-->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label accountlabel" for="textarea-input">个人描述</label>
                <div class="col-md-9">
                    <textarea id="textarea-input" name="description"  value=""
                              rows="9" class="form-control" placeholder="个人简介"><?php echo $introduction?></textarea>
                </div>
            </div>
<!--            <div class="card-footer">-->
                <input type="submit" value="保存" class="btn btn-sm btn-primary" style="width: 18%;margin-left: 45%;">
<!--                <button type="reset" class="btn btn-sm btn-danger">重置</button>-->
<!--            </div>-->
        </form>
    </div>
    <div style="height:1px;background-color: gray;width: 100%;margin-top: 3%;"></div>
    <div style="margin-top: 7%;">
        <form action="http://localhost/Sportsweb/index.php/Account/upload_file" method="post"
              enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group row">
                <label class="col-md-2 form-control-label accountlabel" for="file-input">修改头像</label>
                <div class="col-md-9" style="font-family: '微软雅黑';">
                    <img name="picture" src="<?php echo set_value('picture','http://localhost/Sportsweb/img/'.$_SESSION['portrait']); ?>"
                         style="display:inline-block;width: 200px;">
                    <input type="file" id="file-input" name="portrait" style="display:inline-block;" size="20" />
                    <input type="submit" value="上传" />
                </div>
            </div>
        </form>
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
<script src="http://localhost/Sportsweb/js/Datechooser.js"></script>

</body>
</html>
