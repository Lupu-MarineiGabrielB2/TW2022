<?php
    session_start();
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/config.php";
    require_once $dir;

    $id = $_REQUEST["id"];
    $sql = "DELETE FROM feedback where id=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
?>