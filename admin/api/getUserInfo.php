<?php
//获取用户信息的数据就不用去数据库获取了,因为设置session时, 就将数据存储在session中
//因此直接去session中获取就可以

//开启session
session_start();

// var_dump($_SESSION["userInfo"]);  //输出的是php类型的数组, 要将其转换成JSON字符串

echo json_encode($_SESSION["userInfo"]);




?>