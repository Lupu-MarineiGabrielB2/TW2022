<!DOCTYPE html>

<html lang="en">

<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!($_SESSION["loggedin"] == true && $_SESSION["username"] == "admin@admin.com")){
    header("location: login.php");
    exit;
}
?>

<head>
    <meta name="description" content="The list of animals">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/favicon-16x16.ico"/>
    <title> Edit  </title>

    <link rel="stylesheet" href="styles/general_layout.css"/>
    <link rel="stylesheet" href="styles/admin/add_animal_layout.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="funct/javaScript/add_animal.js"></script>
    <script src="funct/javaScript/picture_handlers.js"></script>
    <script src="funct/javaScript/admin_page_funct.js"></script>
    <script src="funct/javaScript/clear_img_input.js"></script>
</head>

<body style="background-image: url('pictures/login-sign-up-background.jpeg')">
    <?php
        $jsonName = $_GET["name"];
        $jsonName=strtolower($jsonName);
        $jsonName=str_replace(" ","_",$jsonName);
        $jsonName="funct/data/".$jsonName . ".json";
        $strData = file_get_contents($jsonName);
        $data = json_decode($strData, true);

        $oldName = $data["name"];
    ?>

    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.php">Zoo</a></div>
    </header>

    <div class="content" >
        <div id="title"> Edit Information</div>
    </div>

    <?php
    echo '<form action="funct/add_animal.php?oldName='.$oldName.'" method="post" id="form">';
    ?>
        <div class="content" >
            <div class="short-text-div">
                <?php
                    echo '<label for="name">Name* (ex: Common Raccoon)</label><br>';
                    echo  '<input type="text" id="name" value="'.$data["name"].'" name="name" class="short-text-input" pattern="([A-Z][a-z]* )*([A-Z][a-z]*)+[ ]*" required><br>';
                ?>
            </div>
            <div class="short-text-div">
                <?php
                    echo '<label for="scientific-name">Scientific Name* (ex: Procyon Lotor)</label><br>';
                    echo  '<input type="text" id="scientific-name" value="'.$data["scientificName"].'" name="scientificName" class="short-text-input" pattern="([A-Z][a-z]* )*([A-Z][a-z]*)+[ ]*" required><br>';
                ?>
            </div>
            <div class="short-text-div">
                <?php
                    echo '<label for="distribution">Distribution*</label><br>';
                    echo  '<input type="text" id="distribution" value="'.$data["distribution"].'" name="distribution" class="short-text-input" required><br>';
                ?>
            </div>
            <div class="short-text-div">
                <?php
                    echo '<label for="habitat">Habitat*</label><br>';
                    echo  '<input type="text" id="habitat" value="'.$data["habitat"].'" name="habitat" class="short-text-input" required><br>';
                ?>
            </div>
            <div class="short-text-div">
                <?php
                    echo '<label for="diet">Diet*</label><br>';
                    echo  '<input type="text" id="diet" value="'.$data["diet"].'" name="diet" class="short-text-input" required><br>';
                ?>
            </div>
            <div class="short-text-div">
                <?php
                    echo '<label for="lifespan">Lifespan*</label><br>';
                    echo  '<input type="text" id="lifespan" value="'.$data["lifespan"].'" name="lifespan" class="short-text-input" required><br>';
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p> Species*</p>
                <?php
                    $labels=array("Mammal", "Bird", "Reptile");
                    $name="species";
                    for($i=0;$i<3;$i++){
                        if(strcmp($data["species"],$labels[$i])==0)
                            echo '<input type="radio" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"checked required>';
                        else
                            echo '<input type="radio" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"required>';
                        echo '<label for="' .$labels[$i]. ' ">'. $labels[$i]. '</label><br>';
                    }
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p>Order*</p>
                <?php
                    $labels=array("Carnivora", "Herbivora", "Omnivora");
                    $name="order";
                    for($i=0;$i<3;$i++){
                        if(strcmp($data["order"],$labels[$i])==0)
                            echo '<input type="radio" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"checked required>';
                        else
                            echo '<input type="radio" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"required>';
                        echo '<label for="' .$labels[$i]. ' ">'. $labels[$i]. '</label><br>';
                    }
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p> Conservation Status*</p>
                <?php
                    $labels=array("Least Concern", "Near Threatened", "Vulnerable", "Endangered", "Critically Endangered", "Extinct In The Wild");
                    $name="cons";
                    for($i=0;$i<6;$i++){
                        if(strcmp($data["conservationStatus"], $labels[$i])==0)
                            echo '<input type="radio" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"checked required>';
                        else
                            echo '<input type="radio" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"required>';
                        echo '<label for="' .$labels[$i]. ' ">'. $labels[$i]. '</label><br>';
                    }
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p> Continent of Origin*</p>
                <?php
                    $labels=array("Africa", "Antarctica", "Australia", "Asia", "Europe", "North America", "South America");
                    $name="continent[]";
                    for($i=0;$i<7;$i++){
                        if(strpos($data["continent"],$labels[$i])!==false)
                            echo '<input type="checkbox" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"checked>';
                        else
                            echo '<input type="checkbox" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '" >';
                        echo '<label for="' .$labels[$i]. ' ">'. $labels[$i]. '</label><br>';
                    }
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p>Biome*</p>
                <?php
                    $labels=array("Temperate Deciduous Forest","Coniferous Forest", "Woodland", "Chaparral", "Tundra", "Grassland", "Desert", "Tropical Savanna", "Tropical Forest");
                    $name="biome[]";
                    for($i=0;$i<9;$i++){
                        if(strpos($data["biome"],$labels[$i])!==false)
                            echo '<input type="checkbox" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '"checked>';
                        else
                            echo '<input type="checkbox" id="'. $labels[$i]. '" name="'. $name. '" value="'. $labels[$i]. '">';
                        echo '<label for="' .$labels[$i]. ' ">'. $labels[$i]. '</label><br>';
                    }
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="description">Description*</label></p>
                <?php
                    echo  '<textarea rows="8" cols="107" name="description" id="description" required>'. $data["description"].'</textarea>';
                ?>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="reproduction">Reproduction*</label></p>
                <?php
                    echo  '<textarea rows="8" cols="107" name="reproduction" id="reproduction" required>'. $data["reproduction"].'</textarea>';
                ?>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="conservation-status-para">Conservation Status*</label></p>
                <?php
                    echo  '<textarea rows="8" cols="107" name="conservationStatusPara" id="conservation-status-para" required>'. $data["conservationStatusPara"].'</textarea>';
                ?>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="fun-facts">Fun Facts (each on a new line):</label></p>
                <?php
                    echo  '<textarea rows="8" cols="107" name="funFacts" id="fun-facts">'. $data["funFacts"].'</textarea>';
                ?>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="natural-enemies">Natural Enemies (each on a new line):</label></p>
                <?php
                    echo  '<textarea rows="8" cols="107" name="naturalEnemies" id="natural-enemies">'. $data["naturalEnemies"].'</textarea>';
                ?>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <label for="related-animal-1">First Related Animal (name)*</label><br>
                <?php
                    echo  '<input type="text" id="related-animal-1" value="'.$data["relatedAnimal1"].'" name="relatedAnimal1" class="short-text-input" required><br>';
                ?>
            </div>
            <div class="short-text-div">
                <label for="related-animal-2">Second Related Animal (name)</label><br>
                <?php
                    echo  '<input type="text" id="related-animal-2" value="'.$data["relatedAnimal2"].'" name="relatedAnimal2" class="short-text-input" ><br>';
                ?>
            </div>
            <div class="short-text-div">
                <label for="related-animal-3">Third Related Animal (name)</label><br>
                <?php
                    echo '<input type="text" id="related-animal-3" value="'.$data["relatedAnimal3"].'" name="relatedAnimal3" class="short-text-input"><br>';
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <label for="title-image">Title Image (banner on the animal's page; if no new image is selected, the old one will be kept):</label><br><br>
                <input type="file" name="file" id="title-img"  oninput="uploadFile('title-img');">
                <?php
                echo '<button class="clear-button" type="button" onclick="clearInput(\'title-img\', '.'\''.$data["name"].'\''.');">Clear Selection</button>';
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <label for="tile-image">Tile Image (for the animal's "card"; if no new image is selected, the old one will be kept):</label><br><br>
                <input type="file" name="file" id="tile-img" oninput="uploadFile('tile-img');" >
                <?php
                echo '<button class="clear-button" type="button" onclick="clearInput(\'tile-img\', '.'\''.$data["name"].'\''.');">Clear Selection</button>';
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <p>Gallery Images (if no new image is selected, the old ones will be kept </p>
                <label for="gallery-1">Image 1:</label><br>
                <input type="file" name="file" id="gallery-img1" oninput="uploadFile('gallery-img1');" >
                <?php
                echo '<button class="clear-button" type="button" onclick="clearInput(\'gallery-img1\', '.'\''.$data["name"].'\''.');">Clear Selection</button><br><br>';
                ?>

                <label for="gallery-2">Image 2:</label><br>
                <input type="file" name="file" id="gallery-img2" oninput="uploadFile('gallery-img2');" >
                <?php
                echo '<button class="clear-button" type="button" onclick="clearInput(\'gallery-img2\', '.'\''.$data["name"].'\''.');">Clear Selection</button><br><br>';
                ?>

                <label for="gallery-3">Image 3:</label><br>
                <input type="file" name="file" id="gallery-img3" oninput="uploadFile('gallery-img3');" >
                <?php
                echo '<button class="clear-button" type="button" onclick="clearInput(\'gallery-img3\', '.'\''.$data["name"].'\''.');">Clear Selection</button><br><br>';
                ?>
            </div>
        </div>

        <div class="content" id="buttons-div">
            <button id="reset-button" onclick="resetForm();" type = "reset" value="Reset"> Undo</button>
            <button id="submit-button" type = "submit" value = "Submit" > Submit </button>  
        </div>
    </form>

    <footer class="col-12">
    <p> Zoo 2022 </p>
    <p>All photos are copyright-free and were obtained from <a class="link_in_footer" href="https://www.pexels.com/ro-ro/">Pexels</a>. </p>
    </footer>

</body>
</html>


