/**
 * Created by demon on 2016/11/30.
 */
$(function (){
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
            var length = obj.length;
            if(length>3){
                length = 3;
            }

            var parent = document.getElementById("card_act");
            for(var i = 0;i<length;i++){
                var con = document.createElement("div");
                con.setAttribute("class","block_user");
                con.setAttribute("style","min-height:80px;");

                var pdiv = document.createElement("a");
                pdiv.setAttribute("class","card-block p-a-1 clearfix");
                pdiv.setAttribute("style","height: 100%;width: 100%;");
                pdiv.setAttribute("href","http://localhost/Sportsweb/index.php/Activity_detail?id="+obj[i].id);

                var imgdiv = document.createElement("div");
                imgdiv.setAttribute("class","imglabel_small");
                var img = document.createElement("img");
                img.setAttribute("class","img-circle");
                img.setAttribute("src","http://localhost/Sportsweb/img/"+obj[i].postername);
                img.setAttribute("style","width: 60px;height:60px;margin-top:10px;");
                imgdiv.appendChild(img);
                pdiv.appendChild(imgdiv);

                var namediv = document.createElement("div");
                namediv.setAttribute("class","h5 text-primary m-b-0 m-t-h infolabel_small");
                namediv.innerHTML = obj[i].name;
                pdiv.appendChild(namediv);

                var timediv = document.createElement("div");
                timediv.setAttribute("class","text-muted text-uppercase font-weight-bold font-xs infolabel_small");
                timediv.setAttribute("style","float:right;");
                timediv.innerHTML = obj[i].starttime+" —<br>"+obj[i].endtime;
                pdiv.appendChild(timediv);

                con.appendChild(pdiv);
                parent.appendChild(con);
            }
        }
    });
});

$(function (){
    var url = location.search; //获取url中"?"符后的字串
    var temp = url.split("=");
    var id = 0;
    if(temp.length>1){
        id = temp[1];
    }

    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Friends/getAllC',
        data:{data:id},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            var obj = eval('('+decodeURI(result)+')');
            var length = obj.length;
            if(length>3){
                length = 3;
            }

            var parent = document.getElementById("card_con");
            for(var i = 0;i<length;i++){
                var con = document.createElement("div");
                con.setAttribute("class","block_user");
                con.setAttribute("style","min-height:70px;");

                var pdiv = document.createElement("a");
                pdiv.setAttribute("class","card-block p-a-1 clearfix");
                pdiv.setAttribute("style","height: 100%;width: 100%;");
                pdiv.setAttribute("href","http://localhost/Sportsweb/index.php/Friends/otherUser?id="+obj[i].id);

                var imgdiv = document.createElement("div");
                imgdiv.setAttribute("class","imglabel_small");
                var img = document.createElement("img");
                img.setAttribute("class","img-circle");
                img.setAttribute("src","http://localhost/Sportsweb/img/"+obj[i].portrait);
                img.setAttribute("style","width: 50px;height:50px;margin-top:10px;");
                imgdiv.appendChild(img);
                pdiv.appendChild(imgdiv);

                var namediv = document.createElement("div");
                namediv.setAttribute("class","h5 text-primary m-b-0 m-t-h infolabel_small");
                namediv.innerHTML = obj[i].name;
                pdiv.appendChild(namediv);

                var sexdiv = document.createElement("div");
                sexdiv.setAttribute("class","text-muted text-uppercase font-weight-bold font-xs infolabel_small");
                sexdiv.setAttribute("style","width:10%;");
                sexdiv.innerHTML = obj[i].sex;
                pdiv.appendChild(sexdiv);

                var agediv = document.createElement("div");
                agediv.setAttribute("class","text-muted text-uppercase font-weight-bold font-xs infolabel_small");
                agediv.innerHTML = obj[i].age;
                agediv.setAttribute("style","width:15%;margin-left:2%;");
                pdiv.appendChild(agediv);

                if(obj[i].location!=null){
                    var locationdiv = document.createElement("div");
                    locationdiv.setAttribute("class","text-muted text-uppercase font-weight-bold font-xs infolabel_small");
                    locationdiv.innerHTML = obj[i].location;
                    locationdiv.setAttribute("style","width:15%;margin-left:2%;");
                    pdiv.appendChild(locationdiv);
                }

                con.appendChild(pdiv);
                parent.appendChild(con);
            }
        }
    });
});