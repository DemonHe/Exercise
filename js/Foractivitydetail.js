/**
 * Created by demon on 2016/11/30.
 */
$(function (){
    var url = location.search; //获取url中"?"符后的字串
    var acname = url.split("=")[1];
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Activity_detail/getIntro',
        data:{data:acname},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            var obj = eval('('+decodeURI(result)+')');
            draw(obj);
        }
    });
});

function draw(obj) {

    var namediv = document.getElementById("acname");
    namediv.innerHTML = obj.name;
    document.getElementById("acposter").setAttribute("src","http://localhost/Sportsweb/img/"+obj.postername);
    var width = document.getElementById("acposter").style.width;
    // document.getElementById("acposter").style.height = width;
    
    var parent = document.getElementById("introduction");
    var timediv = document.createElement("div");
    timediv.setAttribute("class", "detail_label");
    timediv.innerHTML = "时间: ";
    var timecontent = document.createElement("span");
    timecontent.innerHTML = obj.starttime + " — " + obj.endtime;
    timediv.appendChild(timecontent);
    parent.appendChild(timediv);

    var userdiv = document.createElement("div");
    userdiv.setAttribute("class", "detail_label");
    userdiv.innerHTML = "发起人: ";
    var usercontent = document.createElement("span");
    usercontent.innerHTML = obj.username;
    userdiv.appendChild(usercontent);
    parent.appendChild(userdiv);

    var numdiv = document.createElement("div");
    numdiv.setAttribute("class", "detail_label");
    numdiv.innerHTML = "参加人数: ";
    var numcontent = document.createElement("span");
    numcontent.innerHTML = obj.num;
    numdiv.appendChild(numcontent);
    parent.appendChild(numdiv);

    var pardiv = document.createElement("div");
    pardiv.setAttribute("class", "detail_label");
    pardiv.setAttribute("id", "pardiv");
    pardiv.innerHTML = '<div style="display: inline-block">参加用户: </div>';
    // pardiv.innerHTML+='<div class="par_div">';

    var v = obj.participants;
    var length = v.length;
    var more = false;
    if(length>3){
        length=3;
        more = true;
    }

    for(var i = 0;i<length;i++){
        pardiv.innerHTML += '<a class="par_block" title="'+v[i].nickname+'" style="width: 75px;height: 75px;margin-left:3%;text-align: center;vertical-align: middle;"' +
            'href="http://localhost/Sportsweb/index.php/Friends/otherUser?id='+v[i].id+'">' +
            '<img src="http://localhost/Sportsweb/img/'+v[i].portrait+'" style="width: 60px;height: 60px;margin-top:7px;" class="img-circle">' +
            '</a>';
    }
    // pardiv.innerHTML+='</div>';
    if(more){
        pardiv.innerHTML+='<a href="http://localhost/Sportsweb/index.php/Activity_detail/showParlist?id='+obj.id+'" style="display: inline-block;vertical-align:bottom;font-size: 16px;">查看更多</a>';
    }
    parent.appendChild(pardiv);

    var desdiv = document.createElement("div");
    desdiv.setAttribute("class","detail_label");
    desdiv.innerHTML = "活动介绍: ";
    var descontent = document.createElement("span");
    descontent.innerHTML = obj.description;
    desdiv.appendChild(descontent);
    parent.appendChild(desdiv);

    var form = document.getElementById("bgroup");
    var sbutton = document.getElementById("sbutton");

    if(obj.auth==1){
        if(obj.isJoined){
            form.setAttribute("action","http://localhost/Sportsweb/index.php/Activity_detail/quit?id="+obj.id);
            sbutton.setAttribute("value","退出活动");
        }else{
            form.setAttribute("action","http://localhost/Sportsweb/index.php/Activity_detail/join?id="+obj.id);
            sbutton.setAttribute("value","参加");
        }
        // document.getElementById("back").setAttribute("href","javascript:history.go(-1)");
    }else{
        sbutton.setAttribute("style","display:none;");
        document.getElementById("back").setAttribute("style","margin-left:35%;");
        // document.getElementById("back").firstElementChild.innerHTML="返回首页";
        // document.getElementById("back").setAttribute("href","javascript:history.go(-1)");
        // document.getElementById("back").setAttribute("href","http://localhost/Sportsweb/index.php/Manager");
    }
    
}