<?php
//获取传递过来的数据
$pageIndex = $_GET["pageIndex"];
$pageSize = $_GET["pageSize"];
$category = $_GET["category"];
$status = $_GET["status"];

//开始的索引
$start = ($pageIndex-1)*$pageSize;

//导入封装的sql处理工具
require_once("tools/doSql.php");

$sql = "select p.id, p.title, u.nickname, c.name, p.created, p.status from posts p
        inner join users u 
        on p.user_id = u.id
        inner join categories c
        on p.category_id = c.id
        where p.status != 'trashed'";

        //判断,如果下拉框不是所有分类, 就加一个筛选条件
        if($category != "所有分类") {
            $sql .= "and c.name = '$category'";
        }

        //判断, 如果下拉框不是所有状态, 即添加一个筛选条件
        if($status != "所有状态") {
            $sql .= "and p.status = '$status'";
        }

        //#sql2就是没有拼接limit语句之前的属于, 所以直接使用$sql2保存这些数据就好
        $sql2 = $sql;

$sql .= "order by p.id desc limit $start , $pageSize ";

$data = my_select($sql);

// $sql2 = "select p.id, p.title, u.nickname, c.name, p.created, p.status from posts p
//             inner join users u 
//             on p.user_id = u.id
//             inner join categories c
//             on p.category_id = c.id
//             where p.status != 'trashed'";

$count = count(my_select($sql2));

$totalPages = ceil($count/$pageSize);

//拼接成关系型数组
$arr = array(
    "data" => $data,
    "totalPages" => $totalPages
);

echo json_encode($arr);



?>