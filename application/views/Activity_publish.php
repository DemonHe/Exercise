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
    <link href="http://localhost/Sportsweb/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<!--    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">-->

</head>

<body style="background: white;">
<!--<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="font-family: 微软雅黑;height:8%;background-color: black;padding: 0;">-->
<!--        <div style="font-family: 微软雅黑;width:100%;height:100%;margin: 0;padding:0;">-->
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

<div class="centerboard">
    <div style="font-family: 微软雅黑;font-size: 25px;margin-left: 5%;">发起活动</div>
    <div class="card-block" style="margin-top: 5%;">
        <form action="http://localhost/Sportsweb/index.php/Activity_create/publish" method="post"
              enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group row">
                <label class="col-md-3 form-control-label accountlabel" for="file-input">海报</label>
                <div class="col-md-9" style="font-family: '微软雅黑';">
                    <img name="picture" src="<?php echo set_value('picture','http://localhost/Sportsweb/img/bg.jpg'); ?>" style="display:inline-block;width: 35%;">
                    <input type="file" id="file-input" name="poster" style="display:inline-block;" size="20" />
<!--                    <input type="submit" value="上传" />-->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label accountlabel" for="text-input">名称</label>
                <div class="col-md-7" style="display: inline-block;">
                    <input type="text" id="text-input" name="name" value="<?php echo set_value('name'); ?>"
                           class="form-control"  placeholder="" required autofocus>
                </div>
                <?php echo form_error('name','<div class="error" style="display: inline-block;width:15%;">', '</div>'); ?>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label accountlabel" for="text-input">开始时间</label>
                <div class="col-md-7">
                    <input type="text" id="stime-input" name="stime" value="<?php echo set_value('stime'); ?>"
                           class="form-control" placeholder="" required autofocus>
                </div>
                <?php echo form_error('stime','<div class="error" style="display: inline-block;width:10%;">', '</div>'); ?>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label accountlabel" for="text-input">结束时间</label>
                <div class="col-md-7">
                    <input type="text" id="etime-input" name="etime" value="<?php echo set_value('etime'); ?>"
                           class="form-control" placeholder="" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label accountlabel" for="textarea-input">活动描述</label>
                <div class="col-md-7">
                    <textarea id="textarea-input" name="description"  value=""
                              rows="9" class="form-control" placeholder="简要描述这个活动..."><?php if(isset($description)) echo $description; ?></textarea>
                </div>
            </div>
<!--            <div class="card-footer">-->
                <input type="submit" value="保存" class="btn btn-primary"
                style="margin-left: 30%;margin-top:5%;width:12%;">
                <a href="http://localhost/Sportsweb/index.php/Activity">
                    <button type="button" class="btn btn-primary-outline"
                            style="margin-left: 10%;margin-top:5%;width:12%;">返回</button>
                </a>
<!--            </div>-->
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
<script type="text/javascript" src="http://localhost/Sportsweb/js/libs/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://localhost/Sportsweb/js/libs/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script src="http://localhost/Sportsweb/js/libs/locales/bootstrap-datetimepicker.zh-CN.js" type="text/javascript"></script>
<script type="text/javascript">
    $("#stime-input").datetimepicker({format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        language:'zh-CN',
        pickerPosition:"bottom-left"
    });
    $("#etime-input").datetimepicker({format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        language:'zh-CN',
        pickerPosition:"bottom-left"});

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