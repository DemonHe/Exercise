
<!DOCTYPE html>
<html lang="en">
<head>

    <title>发消息</title>

</head>

<body>

<div style="height: 100%;margin-top: -20%;margin-left:10%;margin-bottom:0;width:80%;padding-top: 10%;background-color: white;">
<!--    <div style="vertical-align: top;">-->
        <a class="back_icon" href="javascript:history.go(-1)" style="margin-top: 18%;"><i class="glyphicon glyphicon-arrow-left"></i></a>
        <div style="text-align: center;vertical-align: center;margin-top: 20%;display: inline-block;margin-left: 3%;">
            <img class="img-circle" style="display: inline-block;width:65px;height:65px;" src="http://localhost/Sportsweb/img/<?php echo $userpor?>">
            <div style="font-size: 16px;"><?php echo $username?></div>
        </div>
<!--    </div>-->

    <div style="margin-left: 2%;margin-right: 2%;width:98%;margin-top: -5%;margin-bottom: 5%;font-family: 微软雅黑;">
        <form action="http://localhost/Sportsweb/index.php/Talk/send?userid=<?php echo $userid?>" method="post"
              enctype="multipart/form-data" class="form-horizontal"
              style="display: block;width:70%;margin-left: 15%;margin-top: 15%;">
        <textarea id="textarea-input" name="mcontent"  value="" style="width:100%;"
                  rows="9" class="form-control" placeholder="内容..."></textarea>
            <input type="submit" class="btn btn-primary" value="发送"
                   style="width:20%;font-size:16px;margin-top: 2%;margin-left: 80%;">
        </form>
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
</body>
</html>
