<?php
    session_start();

    $type = $_POST["contact-type"];
    $rating = $_POST["rating"];
    $message = $_POST["message"];
    $user = $_SESSION["username"];
    echo $type . "   " . $rating . "   " . $message;
    
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/config.php";
    require_once $dir;
  
    $sql = "INSERT INTO feedback (type, rating, message, user) VALUES (?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $type, $rating, $message, $user);
        mysqli_stmt_execute($stmt);       
    }

    mysqli_close($link);
    header("Location:http://localhost/meow/home.php");
?>

