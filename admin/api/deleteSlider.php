<?php
$ids = $_POST["ids"];

require_once("tools/doSql.php");
$sql = "delete from sliders where Id in ($ids)";
$res = my_zsg($sql);

    //判断结果
    if($res){

        echo '{ "code":10000, "msg":"ok" }';
    }else{

        echo '{ "code":10001, "msg":"fail" }';
    }



?>
