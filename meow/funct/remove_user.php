<?php
    session_start();
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/config.php";
    require_once $dir;

    $user = $_REQUEST["user"];
    $ban = $_REQUEST["ban"];
    if($ban==0){
        $sql = "DELETE FROM users where email=?";   //delete account
    }
    else{
        if($ban==1){
            $sql = "UPDATE users SET banned = 1 WHERE email=?"; //ban
        }
        else{
            $sql = "UPDATE users SET banned = 0 WHERE email=?"; //unban
        }
    }
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
?>