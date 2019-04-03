<?php
require_once("./tools/doSql.php");

//获取除了被废弃的文章之外的所有文章数
$sql = "select * from posts where status != 'trsahed'";
$data = my_select($sql);
$wenzhang = count($data);

//获取草稿数
$sql = "select * from posts where status = 'drafted'";
$data = my_select($sql);
$caogao = count($data);

//获取分类数
$sql = "select * from categories";
$data = my_select($sql);
$fenlei = count($data);

//获取评论数
$sql = "select * from comments where status != 'trsahed'";
$data = my_select($sql);
$pinglun = count($data);

//获取待评论数
$sql = "select * from comments where status = 'held'";
$data = my_select($sql);
$daishenhe = count($data);

$arr = [
    "wenzhang" => $wenzhang,
    "caogao" => $caogao,
    "fenlei" => $fenlei,
    "pinglun" => $pinglun,
    "daishenhe" => $daishenhe
];

// var_dump($arr);
//将php数组转换恒JSON字符串
echo json_encode($arr);

?>