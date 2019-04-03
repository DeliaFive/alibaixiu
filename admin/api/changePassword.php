<?php
//获取传递过来的密码
$oldPass = $_POST["oldPass"];


//判断传递过来的旧密码与session中存储的是否一致
//开启session
session_start();
if($oldPass != $_SESSION["userInfo"]["password"]) {
    echo '{"code" : 10001. "msg" : "密码核对失败"}';
    return;
}

$newPass = $_POST["newPass"];

$id = $_SESSION["userInfo"]["id"];

require_once("tools/doSql.php");
$sql = "update users set password='$newPass' where id=$id";
$res = my_zsg($sql);

if($res) {
    echo '{"code" : 10000, "msg" : "修改成功"}';
} else {
    echo '{"code" : 10002, "msg" : "密码修改失败"}';
}



?>