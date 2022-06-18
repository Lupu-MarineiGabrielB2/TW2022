<!DOCTYPE html>

<html lang="en">

<?php
        $jsonName = $_GET["name"];
        $jsonName=strtolower($jsonName);
        $jsonName=str_replace(" ","_",$jsonName);
        $jsonName="funct/data/".$jsonName . ".json";
        $str_data = file_get_contents($jsonName);
        $data = json_decode($str_data, true);

        if($data["visible"]==0){
            $data=NULL;
        }
?>

<head>
    <meta name="description" content="1 animal">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/favicon-16x16.ico"/>
    <?php
        echo '<title>'.$data["name"].'</title>';
    ?>
    
    <link rel="stylesheet" href="styles/animals/layout.css"/>
    <link rel="stylesheet" href="styles/animal_temp/layout.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="funct/javaScript/get_animal_page.js"></script>
</head>

<body>

    <header>
        <div class="upper-bar-text"><a id="nav-button" href="home.html">Test Zoo</a></div>
    </header>
    <?php
        $titleImg = glob("funct/data/pictures/".str_replace(" ","_",$data["name"])."/title-img.*");
        echo '<div class="title-img" style="background-image: url('.$titleImg[0].')"></div>';

        echo '<div class="title col-12">'.$data["name"].'</div>';
    ?>
    <div class="content">
        <div class="side_div col-3">

            <div class="conservation">
                <button class="conservation_icon"><i class="fa fa-exclamation-triangle"></i></button>
                <?php
                echo '<h3 id="conservation_status">'.$data["conservationStatus"].'</h3>';
                ?>
            </div>

            <div class="side_collumn">
                <div class="side_title_and_icon">
                    <button class="side_icon"><i class="fa fa-map-marker"></i></button>
                    <h2 class="side_title">Distribution:</h2>
                </div>
                <?php
                echo '<p class="side_information">'.$data["distribution"].'</p>';
                ?>

                <div class="side_title_and_icon">
                    <button class="side_icon"><i class="fa fa-tree"></i></button>
                    <h2 class="side_title">Habitat:</h2>
                </div>
                <?php
                echo '<p class="side_information">'.$data["habitat"].'</p>';
                ?>

                <div class="side_title_and_icon">
                    <button class="side_icon"><i class="fa fa-cutlery"></i></button>
                    <h2 class="side_title">Diet:</h2>
                </div>
                <?php
                echo '<p class="side_information">'.$data["diet"].'</p>';
                ?>

                <div class="side_title_and_icon">
                    <button class="side_icon"><i class="fa fa-hourglass"></i></button>
                    <h2 class="side_title">Lifespan:</h2>
                </div>
                <?php
                echo '<p class="side_information">'.$data["lifespan"].'</p>';
                ?>
            </div>
        </div>

        <div class="center_div col-5">
            <h2>Description</h2>
            <?php 
            $arrayString=  explode("\r", $data["description"] );
            foreach($arrayString as $para){
                echo '<p>'.$para.'</p>';
            }
            ?>
            
            <h2>Reproduction</h2>
            <?php
            $arrayString=  explode("\r", $data["reproduction"] ); 
            foreach($arrayString as $para){
                echo '<p>'.$para.'</p>';
            }
            ?>
           
            <h2>Natural Enemies</h2>
            <ul>
            <?php
            $arrayString= explode("\r", $data["naturalEnemies"] );
            foreach($arrayString as $animal){
                if(glob("funct/data/".str_replace(" ","_",$animal).".json")){
                         echo '<li> <div id="link_to_natural_enemy" onclick="getAnimalPage('.'\''.$animal.'\''.');">'.$animal.'</div> </li>';
                    }   
            }  
            ?>    
            </ul>

            <h2>Conservation Status</h2>
            <?php
            $arrayString=  explode("\r", $data["conservationStatusPara"] ); 
            foreach($arrayString as $para){
                echo '<p>'.$para.'</p>';
            }
            ?>
            
            <h2>Fun Facts:</h2>
            <ul>
            <?php
            $arrayString=  explode("\r", $data["funFacts"] ); 
            foreach($arrayString as $para){
                if(strlen($para)>2)
                    echo '<li>'.$para.'</li>';
            }
            ?>
            </ul>
            
        </div>

        <div class="side_img_div col-7">
            <?php
                $imgSet = glob("funct/data/pictures/".str_replace(" ","_",$data["name"])."/gallery-img*.*");
                foreach($imgSet as $img){
                    echo '<a target="_blank" href='.$img.'>
                            <img class="animal_side_img" src='.$img.' alt='.$data["name"].'>
                         </a>';
                }
            ?>
        </div>
    </div>

    <div class="related_animals_div col-9">
        <h1 id="related_animals">Related Animals</h1>
        <div class="related_animals_tiles">
        <?php
        for($i=1;$i<3;$i++){
            $relatedAnimal=$data["relatedAnimal".$i];
            if(strlen($relatedAnimal)>1){
                if(glob("funct/data/".str_replace(" ","_",$relatedAnimal).".json")){
                    $img = glob("funct/data/pictures/".str_replace(" ","_",$relatedAnimal)."/tile-img.*");
                    echo '<div class="link_to_template_page" onclick="getAnimalPage('.'\''.$relatedAnimal.'\''.');">
                        <div class="animal_tile">
                            <img class="related_animal_img" src='.$img[0].' alt="Raccoon">
                            <div class="related_animal_name"><p>'.$relatedAnimal.' </p></div>
                        </div>  
                    </div>'; 
                } 
            }  
        }  
        ?>    
        </div>
    </div>

    <footer>
        <p> Test zoo 2022 </p>
        <p>All photos are copyright-free and were obtained from <a id="link_in_footer" href="https://www.pexels.com/ro-ro/">Pexels</a>. </p>
      </footer>
</body>

</html>

