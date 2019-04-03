<?php

$text = $_POST["text"];
$link = $_POST["link"];

$image = $_FILES["image"];

$name = $image["name"];
$tmpPath = $image["tmp_name"];
$newName = iconv("utf-8", "gbk", $name);
$path = "../../uploads/$newName";
move_uploaded_file($tmpPath, $path);

$path = "../../uploads/$name";

require_once("./tools/doSql.php");
$sql = "insert into sliders (image, text, link) value ('$path', '$text', '$link')";

$res = my_zsg($sql);

if($res) {
    echo '{"code" : 10000, "msg" : "ok"}';
} else {
    echo '{"code" : 10001, "msg" : "fail"}';
}


?>