
<html>
    <head>
        <meta charset="utf-8">
        <title></title> 
    </head>

    <body>

        <?php 
            function getJsonFileName($name){
                $jsonName=strtolower($name);
                $jsonName=str_replace(" ","_",$jsonName);
                $name= $jsonName;
                return $jsonName;
            }

            //gets all inputs from the form(except for images)
            foreach($_POST["biome"] as $value){
                $biomes=$biomes.trim($value).", ";
            }

            foreach($_POST["continent"] as $value){
                $cont=$cont.trim($value).", ";
            }

            $formInput = array( "visible"=>1,
            "name"=>trim($_POST["name"]),
            "scientificName"=>trim($_POST["scientificName"]),
            "distribution"=>trim($_POST["distribution"]),
            "habitat"=>trim($_POST["habitat"]),
            "diet"=>trim($_POST["diet"]),
            "lifespan"=>trim($_POST["lifespan"]),
            "species"=>trim($_POST["species"]),
            "continent"=>$cont,
            "order"=>trim($_POST["order"]),
            "biome"=>$biomes,
            "conservationStatus"=>trim($_POST["cons"]),
            "description"=>trim($_POST["description"]),
            "reproduction"=>trim($_POST["reproduction"]),
            "conservationStatusPara"=>trim($_POST["conservationStatusPara"]),
            "funFacts"=>trim($_POST["funFacts"]),
            "naturalEnemies"=>trim($_POST["naturalEnemies"]),
            "relatedAnimal1"=>trim($_POST["relatedAnimal1"]),
            "relatedAnimal2"=>trim($_POST["relatedAnimal2"]),
            "relatedAnimal3"=>trim($_POST["relatedAnimal3"])
            );

            /*
            foreach ($formInput as $key => $val){ 
                echo $key.": ".$val."\n";
                echo "<br>"; 
            } 
            */
            //creates the .json file: data/name_name.json
            $jsonName=getJsonFileName($formInput["name"]);
            $warpedName=$jsonName;
            $jsonName="data/" . $jsonName . ".json";

            //if the name of the animal was modified(in edit), the old json is deleted
            $oldName = $_REQUEST["oldName"];
            if(strlen($oldName)>1){                         
                if(strcmp($oldName, trim($_POST["name"]))!=0){
                    $oldJson=getJsonFileName($oldName);
                    $oldJson="data/" . $oldName . ".json";
                    unlink($oldJson);      //remove json
                    rename("data/pictures/".$oldName, "data/pictures/".$warpedName);        
                }
            }


            //places data in json
            $jsonFile = fopen($jsonName, "w");
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
                $targetPath=$_SERVER['DOCUMENT_ROOT']."/meow/funct/data/pictures/".$warpedName."/";
                //$name2 =pathinfo($url, PATHINFO_FILENAME);
                // $imgSet = glob("funct/data/pictures/".$data["name"]."/gallery-img*.*");
            
              //  $oldImg = glob($targetPath.pathinfo($img, PATHINFO_FILENAME)."*");
                //echo "asdasd    " . $oldImg[0];
               // unlink($oldImg[0]);
                rename($sourcePath, $targetPath.$img);
            }

            //redirects to admin page
             header("Location:http://localhost/meow/admin.php");

        ?>
    </body>
</html>