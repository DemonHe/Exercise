/**
 * Created by demon on 2016/10/21.
 */
function init(birthday) {
    var year=document.getElementById("ccyear");
    var month=document.getElementById("ccmonth");
    var day=document.getElementById("ccday");

    /////显示年////
    for (var i=1900;i<=2016;i++)
    {
        var op=new Option(i,i);
        year.options.add(op);
        // if(i==date[0]){
        //     year.options[i].selected = true;
        // }
    }
    ////显示月////////////
    for (var i=1;i<=12;i++)
    {
        var op=new Option(i,i);
        month.options.add(op);
    }
    for (var i=1;i<=31;i++)
    {
        var op=new Option(i,i);
        day.options.add(op);
    }

    if(birthday!=null&&(birthday.indexOf("-")!=-1)){
        var date=birthday.split("-");

        var monthval = date[1];
        if(monthval.charAt(0)=='0'){
            monthval = monthval.substr(1,1);
        }
        var dayval = date[1];
        if(dayval.charAt(0)=='0'){
            dayval = dayval.substr(1,1);
        }

        $("#ccyear").val(date[0]);
        $("#ccmonth").val(monthval);
        $("#ccday").val(dayval);
    }

}

function changeDay()
{
    var day=$("ccday");
    var mvalue=$("ccmonth").value;//提到月份的值
    var arr1=new Array("4","6","9","11");
    var arr2=new Array("1","3","5","7","8","10","12");
    ////循环数组看是否用户选择的值，
    ///////30天
    for (var i=0;i<arr1.length;i++)
    {
        if(mvalue==arr1[i])
        {
            day.options.length=0;//清空值
            for (var j=1;j<=30;j++)
            {
                var op1=new Option(j,j);
                day.options.add(op1);
            }
        }
    }
    ////////////31天///
    for (var i=0;i<arr2.length;i++)
    {
        if(mvalue==arr2[i])
        {
            day.options.length=0;//清空值
            for (var j=1;j<=31;j++)
            {
                var op1=new Option(j,j);
                day.options.add(op1);
            }

        }
    }
    ///////////瑞年29天，平年28天
    if(mvalue==2)
    {
        var yr=$("year").value;
        if((yr%4==0&&yr%100!=0)||yr%400==0)
        {
            day.options.length=0;//清空值
            for (var j=1;j<=29;j++)
            {
                var op1=new Option(j,j);
                day.options.add(op1);
            }
        }else
        {
            day.options.length=0;//清空值
            for (var j=1;j<=28;j++)
            {
                var op1=new Option(j,j);
                day.options.add(op1);
            }
        }
    }
}