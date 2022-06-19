<?php
    $type = $_POST["contact-type"];
    $allowContact = $_POST["allow-contact"];
    $message = $_POST["message"];

    session_start();
    require_once "config.php";
?>