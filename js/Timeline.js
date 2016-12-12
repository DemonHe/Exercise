/**
 * Created by demon on 2016/11/28.
 */
$(function () {
    var url = location.search; //获取url中"?"符后的字串
    var temp = url.split("=");
    var id = 0;
    if(temp.length>1){
        id = temp[1];
    }
    
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Exerciseapi/exercisetim',
        data:{data:id},
        datatype:'xml',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            var a = new Array();
            $(result).find("item").each(
                function () {
                    var timestr = $(this).find("time").text();
                    // timestr = timestr.substr(0, 16);
                    var time = Date.parse(timestr);
                    // var dTime = new Date(timestr.replace(new RegExp("-", "g"), "/"));
                    // var time = dTime.getTime();//毫秒级
                    var timelength = parseFloat($(this).find("timelength").text());
                    var b = new Array(time, timelength);
                    a.push(b);
                }
            );
            // Create the chart
            $('#timeline').highcharts('StockChart', {
                rangeSelector: {
                    selected: 1
                },
                title: {
                    text: '运动时长'
                },
                series: [{
                    name: '运动时长',
                    data: a,
                    tooltip: {
                        valueDecimals: 2,
                        valueSuffix: 'h'
                    }
                }]
            });
        }
    });
});