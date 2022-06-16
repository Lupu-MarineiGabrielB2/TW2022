<?php
    $jsonName = $_GET["name"];
    $jsonName=strtolower($jsonName);
    $jsonName=str_replace(" ","_",$jsonName);
    $name= $jsonName;
    $jsonName="data/".$jsonName . ".json";

    $jsonString = file_get_contents($jsonName);
    $data = json_decode($jsonString, true);

    if($data["visible"]==1)
        $data["visible"]=0;
    else
        $data["visible"]=1;

        $newJsonString = json_encode($data);
    file_put_contents($jsonName, $newJsonString)
?>