
$(document).ready(function () {
    let title=$(document).attr("title");
    //alert(title);//获取title值.
    //$(document).attr("title","我被修改啦.哈哈");//修改title值
    $("#title").text(title);
});
