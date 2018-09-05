$(document).ready(function(){

    // 发送验证码按钮,输入数字后可点击

    $(".tel").keyup(function () {
        let tel = $(".tel").val().length;
        if(tel==11){
            $(".verify").removeClass('disabled');

        }else{
            $(".verify").addClass('disabled');
        }
    });
});
//这里是网上找的发送验证代码，原理其实很简单，点击发送后判断是否可以发送，然后禁用按钮开始倒计时
// 可以写简单的。但不全面
let after ='';
let InterValObj; //timer变量，控制时间
let count = 60; //间隔函数，1秒执行
let curCount = 60;//当前剩余秒数
let exp =new Date();
let time;
time = exp.getTime();

//获取cookie值
function getCookie(name){
    let arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}

//这是有设定过期时间的使用示例：
//s20是代表20秒
//h是指小时，如12小时则是：h12
//d是天数，30天则：d30
//设置cookie
function setCookie(name,value,time){
    let strsec = getsec(time);
    let exp = new Date();
    exp.setTime(exp.getTime() + strsec*1);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
function getsec(str){
    // alert(str);
    let str1=str.substring(1,str.length)*1;
    let str2=str.substring(0,1);
    if (str2=="s")
    {
        return str1*1000;
    }
    else if (str2=="h")
    {
        return str1*60*60*1000;
    }
    else if (str2=="d")
    {
        return str1*24*60*60*1000;
    }
}

function sendMessage() {

    if(getCookie('after')<time || document.cookie.indexOf('after=') == -1 || getCookie('after')==null){
        //测试时先注释掉ajax请求代码，否则会不成
        // $.ajax({
        //     url: "你要请求的路径",
        //     type: "get",
        //     dataType: "json",
        //     data: {'需要传的参数'},
        //     success: function (data) {
        //         if (data.code == 0) {
        //             alert('发送成功');
        //         } else {
        //             alert(data.msg);
        //         }
        //     },
        //     error: function () {
        //
        //     }
        // });

         setCookie("after",time+60*1000,"s60");
         //setCookie("phone",$('#phone').val(),"s60");
        curCount = count;
        //设置button效果，开始计时
        $(".verify").attr("disabled", "true");
        $(".verify").val(curCount + "秒后重新获取");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
    }
}
//timer处理函数
function SetRemainTime() {
    if (curCount == 0) {
        window.clearInterval(InterValObj);//停止计时器
        $(".verify").removeAttr("disabled");//启用按钮
        $(".verify").val("重新发送验证码");
        // code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效
    } else {
        curCount--;
        $(".verify").val(curCount + "秒后重新获取");
    }
}