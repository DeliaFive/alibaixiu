<?php
//获取传递过来的数据

$email = $_POST["email"];
$slug = $_POST["slug"];
$nickname = $_POST["nickname"];
$bio = $_POST["bio"];

$avatar = $_FILES["avatar"];
$name = $avatar["name"];
$path = $avatar["tmp_name"];
$gbkName = iconv("utf-8", "gbk", $name);
//拼接新路径
$new_path = "../../uploads/$gbkName";
move_uploaded_file($path, $new_path);

$path = "../../uploads/$name";

//判断图片有内有修改过
if($name != "") {
$sql = "update users set
                    slug='$slug',
                    nickname='$nickname',
                    avatar='$path',
                    bio= '$bio'
            where email='$email'";
} else {
    $sql = "update users set
                        slug='$slug',
                        nickname='$nickname',
                        bio= '$bio'
                    where email='$email'"; 
}

require_once("tools/doSql.php");
$res = my_zsg($sql);

if($res) {
    //修改成功后, 重新设置session, 否则刷新后, 还是最初获得的用户信息
    //开启session
    session_start();
    $_SESSION["userInfo"]["slug"] = $slug;
    $_SESSION["userInfo"]["nickname"] = $nickname;
    $_SESSION["userInfo"]["bio"] = $bio;

    //判断图片是否修改
    if($name != "") {
        $_SESSION["userInfo"]["avatar"] = $path;
    }

    echo '{"code" : 10000, "msg" : "ok"}';
} else {
    echo '{"code" : 10001, "msg" : "fail"}';
}




?>