<?php
//获取传递的数据
$id = $_POST["id"];
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


//引入数据库工具, 将其存入数据库
require_once("./tools/doSql.php");

//图片不修改  就是原来的路径, 就不会变化, 如果修改了, 在改路径
//判断图片是否修改
if($oldName != "") {

$sql = "update posts set 
                    title='$title', 
                    content='$content', 
                    slug='$slug', 
                    feature='$path', 
                    category_id='$category', 
                    created='$created', 
                    status='$status' 
            where id='$id'";
} else {
$sql = "update posts set 
                    title='$title', 
                    content='$content', 
                    slug='$slug', 
                    category_id='$category', 
                    created='$created', 
                    status='$status' 
            where id='$id'";
}
// var_dump($sql);
// return;

$res = my_zsg($sql);


if($res) {
    echo '{"code" : 10000, "msg" : "ok"}';
} else {
    echo '{"code" : 10001, "msg" : "fail"}';
}


?>