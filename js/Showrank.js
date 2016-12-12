/**
 * Created by demon on 2016/12/2.
 */
$(function () {
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Exercise/getRank',

        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            var obj = eval('('+decodeURI(result)+')');
            for(var i = 0;i<obj.length;i++) {
                var parent = document.getElementById("rank");
                var j = i+1;

                parent.innerHTML+='<a href="http://localhost/Sportsweb/index.php/Friends/otherUser?id='+obj[i].id+'" ' +
                    'class="block_activity" style="height:110px;">' +
                    '<div class="rank_div">'+j+'</div>'+
                    '<div class="imgdiv">' +
                    '<img class="img-circle" style="display: inline-block;width:65px;height:65px;" src="http://localhost/Sportsweb/img/'+obj[i].portrait+'">' +
                    '</div>'+
                    '<div class="textdiv" style="color: #5e615b;">' +
                    '<span class="text_name">'+obj[i].name+'</span>'+
                    '<span class="text_time">'+"性别: " + obj[i].sex + "    年龄：" + obj[i].age+'</span>' +
                    '</div>' +
                    '<div class="textdiv">' +
                    '<span class="text_name">'+"运动距离: " +'</span>'+
                    '<span class="text_time">'+obj[i].distance+ "km"+ '</span>' +
                    '</div>' +
                    '</a>';

                // var div = document.createElement("a");
                // div.setAttribute("class", "block_activity");
                // div.setAttribute("href", "http://localhost/Sportsweb/index.php/Friends/otherUser?id="+obj[i].id);
                //
                // var rankdiv = document.createElement("div");
                // rankdiv.setAttribute("class", "rank_div");
                // rankdiv.innerHTML=i;
                //
                // var imgdiv = document.createElement("div");
                // imgdiv.setAttribute("class", "imgdiv");
                //
                // var img = document.createElement("img");
                // img.setAttribute("src", "http://localhost/Sportsweb/img/" + obj[i].portrait);
                // img.setAttribute("style", "display:inline-block");
                // img.setAttribute("class", "img-circle");
                //
                // var textdiv = document.createElement("div");
                // textdiv.setAttribute("class", "textdiv");
                //
                // var name = document.createElement("span");
                // name.setAttribute("class", "text_name");
                // name.innerText = obj[i].name;
                //
                // var time = document.createElement("span");
                // time.setAttribute("class", "text_time");
                // time.innerText = "性别: " + obj[i].sex + "    年龄" + obj[i].age;
                //
                // imgdiv.appendChild(img);
                // textdiv.appendChild(name);
                // textdiv.appendChild(time);
                // div.appendChild(rankdiv);
                // div.appendChild(imgdiv);
                // div.appendChild(textdiv);

                if (i != obj.length - 1) {
                    var splitline = document.createElement("div");
                    splitline.setAttribute("class", "splitline");
                    splitline.setAttribute("style", "width:90%; margin-left: 6%;");
                    parent.appendChild(splitline);
                }

                // parent.appendChild(div);
            }
        }
    });
});