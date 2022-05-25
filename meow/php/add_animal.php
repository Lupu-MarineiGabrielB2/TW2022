
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
            "continent"=>$_POST["continent"],
            "order"=>$_POST["order"],
            "biome"=>$_POST["biome"],
            "conservationStatus"=>$_POST["cons"],
            "description"=>$_POST["description"],
            "reproduction"=>$_POST["reproduction"],
            "consercationStatusPara"=>$_POST["consercationStatusPara"],
            "funFacts"=>$_POST["funFacts"],
            "naturalEnemies"=>$_POST["naturalEnemies"],
            "relatedAnimal1"=>$_POST["relatedAnimal1"],
            "relatedAnimal2"=>$_POST["relatedAnimal2"],
            "relatedAnimal3"=>$_POST["relatedAnimal3"]
            );

            echo $divContent;
            foreach ($formInput as $key => $val){ 
                echo $key.": ".$val."\n";
                echo "<br>"; 
            } 

            //creates the .json file: data/name_name.json
            $jsonName=$formInput["name"];
            $jsonName=strtolower(trim($jsonName));
            $jsonName=str_replace(" ","_",$jsonName);
            $jsonName="data/" . $jsonName . ".json";
            $jsonFile = fopen($jsonName, "w");

            file_put_contents($jsonName, json_encode($formInput));
        ?>

    </body>
</html>