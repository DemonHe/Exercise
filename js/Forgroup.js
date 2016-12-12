/**
 * Created by demon on 2016/11/29.
 */
/**
 * Created by demon on 2016/11/6.
 */
$(function (){
    $.ajax({
        type: "POST",
        url:'Group/getAll',
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDIv(result,"group_all");

        }
    });

});

$(function (){
    // var url = location.search; //获取url中"?"符后的字串
    // var emailstr = url.split("=")[1];
    $.ajax({
        type: "POST",
        url:'Group/getJoin',
        // data:{data:emailstr},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDIv(result,"group_join");

        }
    });
});

$(function (){
    // var url = location.search; //获取url中"?"符后的字串
    // var emailstr = url.split("=")[1];
    $.ajax({
        type: "POST",
        url:'Group/getCreate',
        // data:{data:emailstr},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDIv(result,"group_create");

        }
    });
});

function addDIv(result,pid) {
    var obj = eval('('+decodeURI(result)+')');
    for(var i = 0;i<obj.length;i++){
        var parent = document.getElementById(pid);
        var div = document.createElement("div");
        div.setAttribute("class","block_activity");

        var imgdiv = document.createElement("div");
        imgdiv.setAttribute("class","imgdiv");

        var img = document.createElement("img");
        img.setAttribute("src","http://localhost/Sportsweb/img/bg.jpg");
        img.setAttribute("class","portrait_friend");

        var textdiv = document.createElement("div");
        textdiv.setAttribute("class","textdiv");

        var name = document.createElement("span");
        name.setAttribute("class","text_name");
        name.innerText=obj[i].name;

        // var time = document.createElement("span");
        // time.setAttribute("class","text_time");
        // time.innerText="时间: "+obj[i].starttime+"—"+obj[i].endtime;

        var btdiv = document.createElement("div");
        btdiv.setAttribute("class","btdiv");
        var button = document.createElement("button");
        button.setAttribute("class","btn btn-primary");
        button.setAttribute("style","margin-top:30%;");
        button.innerHTML="详情";

        imgdiv.appendChild(img);
        btdiv.appendChild(button);
        textdiv.appendChild(name);
        // textdiv.appendChild(time);
        div.appendChild(imgdiv);
        div.appendChild(textdiv);
        div.appendChild(btdiv);

        if(i!=obj.length-1){
            var splitline = document.createElement("div");
            splitline.setAttribute("class","splitline");
            div.appendChild(splitline);
        }

        parent.appendChild(div);
    }
}

