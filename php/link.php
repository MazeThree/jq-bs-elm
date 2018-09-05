<?php
$servername = "localhost";
$username = "wp";
$password = "1220";
$dbname = "elm";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

//这就是指定数据库字符集，一般放在连接数据库后面就行了
$program_char = "utf8" ;
mysqli_set_charset( $conn , $program_char );


// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

?>