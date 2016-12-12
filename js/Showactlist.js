/**
 * Created by demon on 2016/11/30.
 */
function showActlist(){
    var url = location.search; //获取url中"?"符后的字串
    var temp = url.split("=");
    var id = 0;
    if(temp.length>1){
        id = temp[1];
    }

    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Activity/getJoin',
        data:{data:id},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            var obj = eval('('+decodeURI(result)+')');
            var parent = document.getElementById("infocon");

            for(var i = 0;i<obj.length;i++) {
                var div = document.createElement("div");
                div.setAttribute("class", "block_activity");

                var imgdiv = document.createElement("div");
                imgdiv.setAttribute("class", "imgdiv");

                var img = document.createElement("img");
                img.setAttribute("src", "http://localhost/Sportsweb/img/bg.jpg");
                img.setAttribute("class","img-circle");
                img.setAttribute("style","display: inline-block;width:88px;height:88px;");

                var textdiv = document.createElement("div");
                textdiv.setAttribute("class", "textdiv");

                var name = document.createElement("span");
                name.setAttribute("class", "text_name");
                name.innerText = obj[i].name;

                var time = document.createElement("span");
                time.setAttribute("class", "text_time");
                time.innerText = "时间: " + obj[i].starttime + "—" + obj[i].endtime;

                var btdiv = document.createElement("a");
                btdiv.setAttribute("class", "btdiv");

                if (obj[i].isInitiator) {
                    btdiv.setAttribute("href", "http://localhost/Sportsweb/index.php/Activity_detail/goTomodify?id=" + obj[i].id);
                } else {
                    btdiv.setAttribute("href", "http://localhost/Sportsweb/index.php/Activity_detail?id=" + obj[i].id);
                }

                var button = document.createElement("button");
                button.setAttribute("class", "btn btn-primary");
                button.setAttribute("style", "margin-top:30%;");
                button.innerHTML = "详情";

                imgdiv.appendChild(img);
                btdiv.appendChild(button);
                textdiv.appendChild(name);
                textdiv.appendChild(time);
                div.appendChild(imgdiv);
                div.appendChild(textdiv);
                div.appendChild(btdiv);

                if (i != obj.length - 1) {
                    var splitline = document.createElement("div");
                    splitline.setAttribute("class", "splitline");
                    div.appendChild(splitline);
                }

                parent.appendChild(div);
            }
        }
    });

}