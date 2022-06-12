
<html>
    <head>
        <meta charset="utf-8">
        <title></title> 
    </head>

    <body>

        <?php 
        //gets all inputs from the form(except for images)

            $formInput = array("name"=>$_POST["name"],
            "scientificName"=>$_POST["scientificName"],
            "distribution"=>$_POST["distribution"],
            "habitat"=>$_POST["habitat"],
            "diet"=>$_POST["diet"],
            "lifespan"=>$_POST["lifespan"],
            "species"=>$_POST["species"],
            "continent"=>$cont,
            "order"=>$_POST["order"],
            "biome"=>$biomes,
            "conservationStatus"=>$_POST["cons"],
            "description"=>$_POST["description"],
            "reproduction"=>$_POST["reproduction"],
            "conservationStatusPara"=>$_POST["conservationStatusPara"],
            "funFacts"=>$_POST["funFacts"],
            "naturalEnemies"=>$_POST["naturalEnemies"],
            "relatedAnimal1"=>$_POST["relatedAnimal1"],
            "relatedAnimal2"=>$_POST["relatedAnimal2"],
            "relatedAnimal3"=>$_POST["relatedAnimal3"]
            );

            /*
            foreach ($formInput as $key => $val){ 
                echo $key.": ".$val."\n";
                echo "<br>"; 
            } 
            */
            //creates the .json file: data/name_name.json
            $jsonName=$formInput["name"];
            $jsonName=strtolower(trim($jsonName));
            $jsonName=str_replace(" ","_",$jsonName);
            $warpedName=$jsonName;
            $jsonName="data/" . $jsonName . ".json";
            $jsonFile = fopen($jsonName, "w");

            //places data in json
            file_put_contents($jsonName, json_encode($formInput));

            //creates the folder for each animal's pictures
            $picturesFolder="data/pictures/". $warpedName;
            @mkdir($picturesFolder, 0777);

            //fetches all files from upload and sends them to data/pictures/$warpedName
            //echo $_SERVER['DOCUMENT_ROOT'];
            $uploadPath=$_SERVER['DOCUMENT_ROOT']."/meow/funct/upload";
            $arrFiles = scandir($uploadPath, 1);
            foreach ($arrFiles as $img) {
                $sourcePath=$uploadPath."/".$img;
                $targetPath=$_SERVER['DOCUMENT_ROOT']."/meow/funct/data/pictures/".$warpedName."/".$img;
                rename($sourcePath, $targetPath);
            }

            //window.location.replace("http://newpage.php/");
            $redirect=$_SERVER['DOCUMENT_ROOT']."/meow/admin.php";
            header("Location:".$redirect);
            exit();
        ?>
    </body>
</html>