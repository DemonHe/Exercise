/**
 * Created by demon on 2016/10/19.
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
        url:'http://localhost/Sportsweb/index.php/Exerciseapi/exercisecal',
        data:{data:id},
        datatype:'xml',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            var a = new Array();
            $(result).find("item").each(
                function(){
                    var timestr = $(this).find("time").text();
                    // timestr = timestr.substr(0,16);
                    var time = Date.parse(timestr);
                    // var dTime = new Date(timestr.replace(new RegExp("-", "g"), "/"));
                    // var time =dTime.getTime();//毫秒级
                    var calorie = parseFloat($(this).find("calorie").text());
                    var b = new Array(time,calorie);
                    a.push(b);
                }
            );
            // Create the chart
            $('#calorline').highcharts('StockChart', {
                rangeSelector: {
                    selected: 1
                },
                title: {
                    text: '燃烧热量'
                },
                series: [{
                    name: '燃烧热量',
                    data: a,
                    type: 'area',
                    threshold: null,
                    tooltip: {
                        valueDecimals: 2,
                        valueSuffix: 'KJ'
                    },
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    }
                }]
            });
        }
    });
});