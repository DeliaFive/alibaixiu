<?php
//引入sql操作的封装工具
require_once("./tools/doSql.php");

$sql = "select * from categories";

$data = my_select($sql);

echo json_encode($data);

?>