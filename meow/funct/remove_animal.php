<?php
    // to delete an animal's json file
    $jsonName = $_GET["name"];
    $jsonName=strtolower($jsonName);
    $jsonName=str_replace(" ","_",$jsonName);
    $name= $jsonName;
    $jsonName="data/".$jsonName . ".json";
    unlink($jsonName);

    //to delete the pictures
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/funct/data/pictures/".$name."/";
    array_map('unlink', glob("{$dir}title-img.*"));
    array_map('unlink', glob("{$dir}tile-img.*"));
    array_map('unlink', glob("{$dir}gallery-img1.*"));
    array_map('unlink', glob("{$dir}gallery-img2.*"));
    array_map('unlink', glob("{$dir}gallery-img3.*"));
    rmdir($dir);
?>