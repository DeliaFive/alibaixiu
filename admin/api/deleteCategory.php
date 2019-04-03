<?php
$ids = $_POST["ids"];

require_once("./tools/doSql.php");
$sql = "delete from categories where id = $ids";
$res = my_zsg($sql);

if($res){

    echo '{ "code":10000, "msg":"ok" }';
}else{

    echo '{ "code":10001, "msg":"fail" }';
}





?>