<?php
    $name = $_REQUEST["name"];

    $dataPath=$_SERVER['DOCUMENT_ROOT']."/meow/funct/data";
    $arrFiles = scandir($dataPath, 1);
    foreach ($arrFiles as $file) {
        if(!is_dir("data/".$file)){
            $str_data = file_get_contents("data/".$file );
            $data = json_decode($str_data, true);
            if(strcmp($data["name"], $name)==0)
                if($data["visible"]==1)
                    echo $str_data;
        }
    }
?>