
<?php

function my_select($sql) {
    //先封装一个查询的工具
$link = mysqli_connect("127.0.0.1", "root", "root", "baixiu");

$res = mysqli_query($link, $sql);
$data = mysqli_fetch_all($res, 1);

// echo count($data);
mysqli_close($link);

//返回$data
return $data;

}




function my_zsg($sql){

    //1. 连接数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //2. 操作数据库
    $result = mysqli_query($link,$sql);

    //3. 关闭数据库
    mysqli_close($link);

    return $result;
}