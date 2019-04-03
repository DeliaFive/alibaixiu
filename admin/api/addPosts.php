<?php
//获取传递的数据
$title = $_POST["title"];
$content = $_POST["content"];
$slug = $_POST["slug"];
// $feature = $_POST["feature"];
$category = $_POST["category"];
$created = $_POST["created"];
$status = $_POST["status"];

//由于feature是文件类型的, 所以不能使用post获取
$feature = $_FILES["feature"];

//获取名字
$oldName = $feature["name"];
//获取临时路径
$tmpPath = $feature["tmp_name"];

//将名字转换成GBK类型的
$newName = iconv("utf-8", "gbk", $oldName);

//拼接新路径
$newPath = "../../uploads/$newName";

//转移文件
move_uploaded_file($tmpPath, $newPath);

//拼接数据库路径
$path = "../../uploads/$oldName";

//开启session, 获取登录用户id
session_start();

$id = $_SESSION["userInfo"]['id'];

//引入数据库工具, 将其存入数据库
require_once("./tools/doSql.php");

$sql = "insert into posts (title, content, slug, feature, category_id, created, status , user_id) 
            values('$title', '$content', '$slug', '$path', '$category', '$created', '$status', '$id')";

$res = my_zsg($sql);


if($res) {
    echo '{"code" : 10000, "msg" : "ok"}';
} else {
    echo '{"code" : 10001, "msg" : "fail"}';
}


?>