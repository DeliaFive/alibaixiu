<?php
//获取文件
$pageIndex = $_GET["pageIndex"];
$pageSize = $_GET["pageSize"];


//获取页码开始的参数
$start = ($pageIndex-1)*$pageSize;

//数据库中查询相关的评论数据

$sql = "select c.id, c.author, c.content, c.created, c.status, p.title from comments c 
        inner join posts p 
        on c.post_id = p.id
        where c.status != 'trashed' 
        limit $start, $pageSize";

require_once("./tools/doSql.php");

// var_dump($sql);

$data = my_select($sql);

// echo json_encode($data);

//再查评论的总数,
$sql2 = "select c.id, c.author, c.content, c.created, c.status, p.title from comments c 
inner join posts p 
on c.post_id = p.id
where c.status != 'trashed'";

$count = count(my_select($sql2));

$totalPages = ceil($count/$pageSize);

//将上面获取到的数组, 和这里获取到的总数拼接成数组
$arr = [
    "data" => $data,
    "totalPages" => $totalPages
];

//输出响应体
echo json_encode($arr);

?>