<?php

$email = $_POST["email"];
$password = $_POST["password"];

$link = mysqli_connect("127.0.0.1", "root", "root", "baixiu");
$sql = "select * from users where email='$email' and password='$password'";
// var_dump($sql);
// return false;
$res = mysqli_query($link, $sql);
$data = mysqli_fetch_all($res, 1);
mysqli_close($link);
 
//通过判断数组长度来判断由没有查询到这个数据
if(count($data) > 0 ) {
    //在登陆成功的地方设置session, 来记录登录状态
    //开启session
    session_start();

    //注意注意注意:  这里一定要去下标, 一定要去下标
    $_SESSION["userInfo"] = $data[0];

    echo '{"code" : 10000, "msg" : "ok"}';
} else {
    echo '{"code" : 10001, "msg" : "fail"}';
}





?>