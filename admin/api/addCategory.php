<?php
$name = $_POST["name"];
$slug = $_POST["slug"];

require_once("tools/doSql.php");
$sql = "insert into categories (name, slug) values('$name', '$slug')";
$res = my_zsg($sql);

if($res) {
    echo '{"code" : 10000, "msg" : "ok"}';
} else {
    echo '{"code" : 10001, "msg" : "fail"}';
}

?>