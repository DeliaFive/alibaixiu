<?php
//获取id
$id = $_GET["id"];

require_once("tools/doSql.php");

$sql = "select * from posts where id = $id";

$data = my_select($sql);

// var_dump($res);

echo json_encode($data[0]);

?>
