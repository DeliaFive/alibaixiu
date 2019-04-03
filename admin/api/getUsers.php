<?php
require_once("tools/doSql.php");
$sql = "select * from users ";
$data = my_select($sql);

echo json_encode($data);




?>