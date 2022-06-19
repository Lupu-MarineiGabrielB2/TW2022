<?php
    session_start();
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/config.php";
    require_once $dir;

    $x = $_REQUEST["x"];
    if(strpos($x, '@') !== false){
        $sql = "DELETE FROM feedback where user=?";
    }
    else{
        $sql = "DELETE FROM feedback where id=?";
    }
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $x);
    mysqli_stmt_execute($stmt);
?>