<?php
    $name = $_REQUEST["name"];
    $img = $_REQUEST["image"];

    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/funct/data/pictures/".$name."/";
    array_map('unlink', glob("{$dir}".$img."*"));
    
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/funct/upload/";
    array_map('unlink', glob("{$dir}".$img."*"));
?>