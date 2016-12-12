/**
 * Created by demon on 2016/12/2.
 */
$(function () {
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Message/getAll',

        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDiv(result,"mes_con");
        }
    });
});

function addDiv(result,pid) {
    var obj = eval('('+decodeURI(result)+')');
    for(var i = 0;i<obj.length;i++) {
        var parent = document.getElementById(pid);
        var status = obj[i].status;

        var div = document.createElement("div");
        div.setAttribute("style", "min-height:65px;margin-top: 5%;");
        parent.appendChild(div);

        div.innerHTML += '<div class="imgdiv" style="text-align: center;vertical-align: center;height: 100%;">' +
            '<img class="img-circle" style="display: inline-block;width:65px;height:65px;" src="http://localhost/Sportsweb/img/' + obj[i].portrait + '">' +
            '</div>'+
            '<div class="textdiv" style="width:35%;height:100%;">' +
            '<span class="text_name" style="font-size: 20px;">' + obj[i].nickname+obj[i].content + '</span>' +
            '<span class="text_name" style="font-size: 16px;color: gray;">' + "时间：" +obj[i].sendtime + '</span>' +
            '</div>';

        div.innerHTML += '<div class="textdiv" style="width:23%;height:100%;vertical-align: top;">' +
            '<span class="text_name" style="font-size: 20px;color: gray;text-align: center;">'  + "状态：" + obj[i].status + '</span>' +
            '</div>';

        // alert(obj[i].id);
        if(status=="未处理"){
            // div.innerHTML += text1;
            div.innerHTML += '<div style="display: inline-block;width:20%;height:100%;vertical-align: top;">' +
                '<a href="http://localhost/Sportsweb/index.php/Message/accept?id=' +obj[i].id
                +'" class="btn btn-sm btn-primary" style="display: block;margin-left: 5%;width: 35%;">同意</a>'+
                '<a href="http://localhost/Sportsweb/index.php/Message/reject?id=' +obj[i].id
                +'" class="btn btn-sm btn-danger" style="display: block;margin-top: 2%;margin-left: 5%;width: 35%">拒绝</a>'+
                '</div>';
        }
        if(status=="未查看"){
            // div.innerHTML += text1;
            div.innerHTML += '<div style="display: inline-block;width:20%;height:100%;vertical-align: top;margin-top: 1%;">' +
                '<a href="http://localhost/Sportsweb/index.php/Message/check?id=' +obj[i].id
                +'" class="btn btn btn-primary" style="display: block;margin-left: 5%;width: 35%">回复</a>'+
                '</div>';
        }
        if(status=="未阅"){
            // div.innerHTML += text1;
            div.innerHTML += '<div style="display: inline-block;width:20%;height:100%;vertical-align: top;margin-top: 1%;">' +
                '<a href="http://localhost/Sportsweb/index.php/Message/read?id=' +obj[i].id
                +'" class="btn btn btn-primary" style="display: block;margin-left: 5%;width: 35%">已阅</a>'+
                '</div>';
        }

        if (i != obj.length - 1) {
            var splitline = document.createElement("div");
            splitline.setAttribute("class", "splitline");
            splitline.setAttribute("style", "margin-top:3%;");
            parent.appendChild(splitline);
        }
    }
}