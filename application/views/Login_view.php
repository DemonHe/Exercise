<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>登录界面</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

</head>

<body id="bg1">

<div style="font-family: 微软雅黑;">
    <div class="container" style="width: 20%;margin-left: 40%;padding-top: 20%;">
    <form class="form-signin" role="form" style="width: 100%;"
          method="post" action="http://localhost/Sportsweb/index.php/Login/checkinfo">
        <?php echo form_error('email','<div class="error">', '</div>'); ?>
        <input name="email" type="email" value="<?php echo set_value('email'); ?>"
               class="form-control" placeholder="邮箱" required autofocus>
        <br>
        <?php echo form_error('password','<div class="error">', '</div>'); ?>
        <input name="password" type="password" value="<?php echo set_value('password'); ?>"
               class="form-control" placeholder="密码" required>
<!--        <div class="checkbox">-->
<!--            <label>-->
<!--                <input type="checkbox" value="remember-me"> 记住我-->
<!--            </label>-->
<!--        </div>-->
<!--        <a>-->
<!--        <a href="" style="display: block;text-align: right;width: 100%;margin-top:1%;">忘记密码</a>-->
        <div style="display: block;width: 100%;">
            <input type="submit" class="btn btn-primary-outline" value="登录"
                   style="display: inline-block;width:35%;font-size:16px;margin-top:4%;margin-left: 9%;"/>
            <a href="Register" style="display: inline-block;width:35%;font-size:16px;margin-top: 4%;margin-left: 8%;"
               class="btn btn-primary">注册
            </a>
        </div>
    </form>

    </div>
</div>

</body>
</html>