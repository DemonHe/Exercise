
<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>运动</title>

    <!-- Bootstrap core CSS -->
<!--    <link href="http://localhost/Sportsweb/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/style.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Custom.css" rel="stylesheet">-->
<!--    <link href="http://localhost/Sportsweb/css/Dropdownmenu.css" rel="stylesheet">-->
<!--    <link href="http://cdn.bootcss.com/tether/1.3.6/css/tether.min.css" rel="stylesheet">-->
    <link href="http://localhost/Sportsweb/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

</head>

<body style="background-color: white;">

<div class="centerboard">
    <div style="width: 100%;height: 20%;margin-left: 15%;">
        <div class="exerciselabel">周目标：</div>
        <form class="form-signin" role="form" style="width: 100%;"
              method="post" action="http://localhost/Sportsweb/index.php/Exercise/modifyGoal">
        <select id="goaltype" name="goaltype" class="form-control" size="1" onchange="changeUnit()"
                style="display:inline-block;width:10%;height: 18%;margin-left:5%;margin-top: 3%;">
            <option value="0">距离</option>
            <option value="1">时长</option>
            <option value="2">卡路里</option>
        </select>
            <input type="number" id="goal" name="goal" class="form-control" value=""
                   style="display:inline-block;width: 26%;margin-left: 3%;">
        <div id="unit" style="display:inline-block;width: 7%;font-size: 18px;">km</div>
        <input type="submit" class="btn btn-primary" style="width:8%;" value="保存">
        </form>
    </div>
    <div style="width: 100%;height: 30%;margin-left: 15%;margin-top: 5%;">
        <div class="exerciselabel">运动状况</div>
        <?php $a=($total['wd']==null)?0:$total['wd'];
        if($distance==0){
            $rate = 0;
        }else{
            $rate = $a/$distance;
        }
        $rate = round($rate*100,2);?>
            <div id="completepor" data-dimension="250" data-text="<?php echo $rate.'%'?>" data-info="周目标完成"
                 data-width="25" data-fontsize="34" data-percent="<?php echo $rate?>" data-fgcolor="#61a9dc"
                 data-bgcolor="#eee" style="display: inline-block;width: 40%;margin-left: 5%;margin-top: 5%;">
            </div>
        <div style="display: inline-block;width: 40%;height: 30%;margin-left: 8%;margin-top:5%;vertical-align: top;">
            <select id="datatype" name="datatype" class="form-control" size="1" onchange="changeTotal()"
                    style="display:inline-block;width:50%;height: 18%;">
                <option value="0">本周</option>
                <option value="1">本月</option>
                <option value="2">今年</option>
                <option value="3">全部</option>
            </select>
            <p class="exerciseinfolabel" style="margin-top: 8%;">运动距离<span id="dtotal"> <?php echo ($total['wd']==null)?0:$total['wd']?></span>公里</p>
            <p class="exerciseinfolabel">运动时间<span id="ttotal"> <?php echo ($total['wt']==null)?0:$total['wt']?></span>小时</p>
            <p class="exerciseinfolabel">燃烧热量<span id="ctotal"> <?php echo ($total['wc']==null)?0:$total['wc']?></span>卡路里</p>
        </div>
    </div>
    <div style="width:80%;height: auto;margin-top:4%;margin-left: 10%;margin-bottom: 5%;">
        <div class="exerciselabel" style="margin-left: 7%;">运动曲线图</div>
        <ul id="myTab" class="nav nav-tabs" role="tablist" style="padding-top: 50px;padding-left: 30px;">
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
                <div id="distanceline" style="width:100%;height: auto;margin: 0;"></div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="time" aria-labelledBy="time-tab">
                <div id="timeline" style="width:66%;height: auto;;margin: 0;"></div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="heat" aria-labelledBy="heat-tab">
                <div id="calorline" style="width:66%;height: auto;;margin: 0;"></div>
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
<!--Highcharts-->
<script src="http://cdn.hcharts.cn/highstock/highstock.js"></script>
<script src="http://localhost/Sportsweb/js/Distanceline.js"></script>
<script src="http://localhost/Sportsweb/js/Timeline.js"></script>
<script src="http://localhost/Sportsweb/js/Calorieline.js"></script>
<script src="http://localhost/Sportsweb/js/libs/jquery.circliful.min.js"></script>
<script>
    $( document ).ready(function() {
        $('#completepor').circliful();
        var value = <?php echo $distance?>;
//        alert(value);
        document.getElementById("goal").value=value;

          var li = document.getElementById("navbar").firstElementChild;
            for(var i = 0;i<4;i++) {
                if (i == <?php echo $index?>)
                    li.setAttribute("class", "active");
                else
                    li.removeAttribute("class");
                li = li.nextElementSibling;
            }
    });

    function changeUnit() {
        var obj = document.getElementById("goaltype");
        var type = obj.options[obj.selectedIndex].value;
        var unit = "";
        var value = "";

        if (type == 0) {
            unit = "km";
            value = <?php echo $distance?>;
        }
        if (type == 1) {
            unit = "h";
            value = <?php echo $time?>;
        }
        if(type==2) {
            unit = "KJ";
            value = <?php echo $heat?>;
        }
        document.getElementById("unit").innerHTML=unit;
//        alert(value);
        document.getElementById("goal").value=value;
    }

    function changeTotal() {
        var obj = document.getElementById("datatype");
        var type = obj.options[obj.selectedIndex].value;
        var dvalue = "";
        var tvalue = "";
        var cvalue = "";

        if (type == 0) {
            dvalue = <?php echo ($total['wd']==null)?0:$total['wd']?>;
            tvalue = <?php echo ($total['wt']==null)?0:$total['wt']?>;
            cvalue = <?php echo ($total['wc']==null)?0:$total['wc']?>;
        }
        if (type == 1) {
            dvalue = <?php echo ($total['md']==null)?0:$total['md']?>;
            tvalue = <?php echo ($total['mt']==null)?0:$total['mt']?>;
            cvalue = <?php echo ($total['mc']==null)?0:$total['mc']?>;
        }
        if(type==2) {
            dvalue = <?php echo ($total['yd']==null)?0:$total['yd']?>;
            tvalue = <?php echo ($total['yt']==null)?0:$total['yt']?>;
            cvalue = <?php echo ($total['yc']==null)?0:$total['yc']?>;
        }
        if(type==3) {
            dvalue = <?php echo ($total['ad']==null)?0:$total['ad']?>;
            tvalue = <?php echo ($total['at']==null)?0:$total['at']?>;
            cvalue = <?php echo ($total['ac']==null)?0:$total['ac']?>;
        }
//        alert(value);
        document.getElementById("dtotal").innerHTML=dvalue;
        document.getElementById("ttotal").innerHTML=tvalue;
        document.getElementById("ctotal").innerHTML=cvalue;
    }
</script>
</body>
</html>
