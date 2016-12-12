<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>注册界面</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">
    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

</head>

<body style="background-color: rgba(241, 241, 235, 0.96);">
    <div class="line" style="margin-top: 80px;"></div>
    <div class="container" style="width: 20%;margin-left: 40%;padding-top: 200px;height:800px;">
        <form class="form-signin" role="form" style="width: 100%;"
              method="post" action="http://localhost/Sportsweb/index.php/Register/confirm_register">
            <?php echo form_error('email','<div class="error">', '</div>'); ?>
            <input name="email" type="email" value="<?php echo set_value('email'); ?>"
                   class="form-control" placeholder="邮箱" required autofocus>
            <br>
            <input name="nickname" type="text" class="form-control" value="<?php echo set_value('nickname'); ?>" placeholder="昵称" required autofocus>
            <br>
            <?php echo form_error('password','<div class="error">', '</div>'); ?>
            <input name="password" type="password"
                   class="form-control" placeholder="密码" required>
            <br>
<!--            <input type="text" class="form-control" placeholder="验证码" required>-->
<!--            <br>-->
            <input type="submit" value="注册" class="btn btn-primary" style="margin-left: 30%;width:30%;">
            </input>
        </form>

    </div>

    <div class="footer">
        <div class="line"></div>
        <div>
            Copyright&copy;爱运动&nbsp;
        </div>
    </div>
</body>

</html>