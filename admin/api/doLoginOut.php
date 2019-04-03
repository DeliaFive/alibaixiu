<?php
//退出就是清除session
//开启session 
session_start();

//清除session
unset($_SESSION["userInfo"]);

//清除session之后需要返回登录页面
header("location: ../login.html");

?>