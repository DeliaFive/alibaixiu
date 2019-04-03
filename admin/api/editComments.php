<?php
//获取传递过来的值
$status = $_POST["status"];
$ids = $_POST["ids"];

//在数据库中查询对应的数据
$link = mysqli_connect("127.0.0.1", "root", "root", "baixiu");
$sql = "update comments set status='$status' where id in ($ids)";
$res = mysqli_query($link, $sql);  //修改成功, 返回1
// echo $res;

mysqli_close($link);

//判断$res的值
if($res) {
    echo '{"code" : 10000, "msg" : "ok"}';
} else {
    echo '{"code" : 10001, "msg" : "fail"}';
}

?>