<?php
    $animals=array();

    $dataPath=$_SERVER['DOCUMENT_ROOT']."/meow/funct/data";
    $arrFiles = scandir($dataPath, 1);
    foreach ($arrFiles as $file) {
        if(!is_dir("data/".$file)){
            $str_data = file_get_contents("data/".$file );
            $data = json_decode($str_data, true);
            $animals[] = json_encode(array("name" => $data["name"], "scientificName"=> $data["scientificName"], "species" => $data["species"], "continent" => $data["continent"], "order" => $data["order"],"biome" => $data["biome"], "conservationStatus" => $data["conservationStatus"], "description"=>$data["description"]));
        }
    }

$myJSON = json_encode($animals);

echo $myJSON;
?>