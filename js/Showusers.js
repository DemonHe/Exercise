/**
 * Created by demon on 2016/11/6.
 */
function showFri(){
    var url = location.search; //获取url中"?"符后的字串
    var temp = url.split("=");
    var id = 0;
    if(temp.length>1){
        id = temp[1];
    }

    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Friends/getAllF',
        data:{data:id},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDIv(result,"friend");

        }
    });
}

function showCon(pid){
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
            // alert(id);
            addDIv(result,pid);

        }
    });

}

function showPar(){
    var url = location.search; //获取url中"?"符后的字串
    var id = url.split("=")[1];
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Activity_detail/getParticipant',
        data:{data:id},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDIv(result,"infocon");

        }
    });
}

function showUsers(usename){
    // var url = location.search; //获取url中"?"符后的字串
    // var id = url.split("=")[1];
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Friends/getUserInfo',
        data:{data:usename},
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDIv(result,"infocon");

        }
    });
}

function showAlluser(){
    
    $.ajax({
        type: "POST",
        url:'http://localhost/Sportsweb/index.php/Manager/getAlluser',
        
        datatype:'json',
        error: function(request) {
            // alert("获取");
        },
        success: function(result) {
            // alert(result);
            addDIv(result,"alluser");

        }
    });
}

function addDIv(result,pid) {
    var obj = eval('('+decodeURI(result)+')');
    for(var i = 0;i<obj.length;i++){
        var parent = document.getElementById(pid);
        var div = document.createElement("div");
        div.setAttribute("class","block_friend");

        var textdiv = document.createElement("a");
        textdiv.setAttribute("style","margin-top:5%;");
        textdiv.setAttribute("href","http://localhost/Sportsweb/index.php/Friends/otherUser?id="+obj[i].id);

        var imgdiv = document.createElement("div");
        imgdiv.setAttribute("src","http://localhost/Sportsweb/img/"+obj[i].portrait);
        imgdiv.setAttribute("class","portrait_friend");

        var img = document.createElement("img");
        img.setAttribute("src","http://localhost/Sportsweb/img/"+obj[i].portrait);
        img.setAttribute("style","width:150px;height:150px;");
        img.setAttribute("class","img-circle");
        imgdiv.appendChild(img);
    
        var name = document.createElement("span");
        name.setAttribute("class","baseinfolabel");
        name.innerText=obj[i].name;
        var sex = document.createElement("span");
        sex.setAttribute("class","baseinfolabel");
        sex.innerText="   "+obj[i].sex;
        var age = document.createElement("span");
        age.setAttribute("class","baseinfolabel");
        age.setAttribute("style","float:right;margin-right:3%;");
        age.innerText=obj[i].age;

        var btdiv = document.createElement("div");
        btdiv.setAttribute("style","margin-top:5%;");

        var ab = document.createElement("a");
        ab.setAttribute("style","float:right;");
        var button = document.createElement("button");
        button.setAttribute("class","btn btn-primary");
        // button.setAttribute("style","float:right;");
        // button.setAttribute("style","display:block;");

        if(pid=="friend"||(pid=="infocon"&&obj[i].isFriend)){
            button.innerHTML="删除好友";
            ab.setAttribute("href","http://localhost/Sportsweb/index.php/Friends/breakFriend?id="+obj[i].id+"&type=0");
            ab.appendChild(button);
            btdiv.appendChild(ab);
        }
        if(pid=="concern"||(pid=="infocon"&&obj[i].isConcerned)){
            button.innerHTML="取消关注";
            ab.setAttribute("href","http://localhost/Sportsweb/index.php/Friends/cancelConcern?id="+obj[i].id+"&type=0");
            ab.appendChild(button);
            btdiv.appendChild(ab);
        }
        
        if(pid=="alluser"){
            button.innerHTML="删除用户";
            ab.setAttribute("href","http://localhost/Sportsweb/index.php/Manager/deleteUser?id="+obj[i].id);
            ab.appendChild(button);
            btdiv.appendChild(ab);
        }

        textdiv.appendChild(imgdiv);
        textdiv.appendChild(name);
        textdiv.appendChild(sex);
        textdiv.appendChild(age);
        div.appendChild(textdiv);
        div.appendChild(btdiv);
        parent.appendChild(div);
    }
}

