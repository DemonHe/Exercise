/**
 * Created by demon on 2016/11/30.
 */
$(function () {
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Moment/getAll',

        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);

            addDiv(result,"moment_all");
        }
    });
});

$(function () {
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Moment/getMine',

        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);

            addDiv(result,"moment_me");
        }
    });
});

function addDiv(result,pid) {
    var obj = eval('('+decodeURI(result)+')');
    for(var i = 0;i<obj.length;i++) {
        var parent = document.getElementById(pid);

        parent.innerHTML += '<div style="min-height: 65px;margin-top: 5%;">' +
            '<div class="imgdiv" style="text-align: center;vertical-align: center;height: 100%;">' +
            '<img class="img-circle" style="display: inline-block;width:65px;height:65px;" src="http://localhost/Sportsweb/img/' + obj[i].portrait + '">' +
            '<div style="font-size: 16px;">'+obj[i].nickname+'</div></div>' +
            '<div class="textdiv" style="width:70%;height:50%;">' +
            '<span class="text_name" style="font-size: 20px;">' + obj[i].content + '</span>' +
            '</div>' +
            '<div class="textdiv" style="width:70%;height:50%;">' +
            '<span class="text_name" style="font-size: 16px;color: gray;float: right">发布于' + obj[i].publishtime + '</span>' +
            '</div>' +
            '</div>';

        if (i != obj.length - 1) {
            var splitline = document.createElement("div");
            splitline.setAttribute("class", "splitline");
            splitline.setAttribute("style", "margin-top:3%;");
            parent.appendChild(splitline);
        }
    }
}
