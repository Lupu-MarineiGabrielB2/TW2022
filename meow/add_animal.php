<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if( !($_SESSION["loggedin"] == true && $_SESSION["username"] == "admin@admin.com")){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta name="description" content="The list of animals">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/favicon-16x16.ico"/>
    <title> New Animal </title>

    <link rel="stylesheet" href="styles/general_layout.css"/>
    <link rel="stylesheet" href="styles/admin/add_animal_layout.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="funct/javaScript/add_animal.js"></script>
    <script src="funct/javaScript/picture_handlers.js"></script>
    <script src="funct/javaScript/clear_img_input.js"></script>
</head>

<body style="background-image: url('pictures/login-sign-up-background.jpeg')">

    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.php">Zoo</a></div>
    </header>

    <div class="content" >
        <div id="title"> Add a new animal </div>
    </div>
    
    <form action="funct/add_animal.php" method="post" id="form">
        <div class="content" >
            <div class="short-text-div">
                <label for="name">Name* (ex: Common Raccoon)</label><br>
                <input type="text" id="name" name="name" class="short-text-input" pattern="([A-Z][a-z]* )*([A-Z][a-z]*)+[ ]*" required><br>
            </div>
            <div class="short-text-div">
                <label for="scientific-name">Scietific Name* (ex: Procyon Lotor)</label><br>
                <input type="text" id="scientific-name" name="scientificName" class="short-text-input" pattern="([A-Z][a-z]* )*([A-Z][a-z]*)+[ ]*" required>
            </div>
            <div class="short-text-div">
                <label for="distribution">Distribution*</label><br>
                <input type="text" id="distribution" name="distribution" class="short-text-input" required>
            </div>
            <div class="short-text-div">
                <label for="habitat">Habitat*</label><br>
                <input type="text" id="habitat" name="habitat" class="short-text-input" required>
            </div>
            <div class="short-text-div">
                <label for="diet">Diet*</label><br>
                <input type="text" id="diet" name="diet" class="short-text-input" required>
            </div>
            <div class="short-text-div">
                <label for="lifespan">Lifespan*</label><br>
                <input type="text" id="lifespan" name="lifespan" class="short-text-input" required>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p> Species*</p>
                <input type="radio" id="mammal" name="species" value="Mammal" required>
                <label for="mammal">Mammal</label><br>
        
                <input type="radio" id="bird" name="species" value="Bird">
                <label for="bird">Bird</label><br>
        
                <input type="radio" id="reptile" name="species" value="Reptile">
                <label for="reptile">Reptile</label><br>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p>Order*</p>
                <input type="radio" id="carnivora" name="order" value="Carnivora" required>
                <label for="carnivora">Carnivora</label><br>

                <input type="radio" id="herbivora" name="order" value="Herbivora">
                <label for="herbivora">Herbivora</label><br>

                <input type="radio" id="omnivora" name="order" value="Omnivora">
                <label for="omnivora">Omnivora</label><br>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p> Conservation Status*</p>
                <input type="radio" id="least-concern" name="cons" value="Least Concern" required>
                <label for="least-concern">Least Concern</label><br>

                <input type="radio" id="near-threatened" name="cons" value="Near Threatened">
                <label for="near-threatened">Near Threatened</label><br>

                <input type="radio" id="vulnerable" name="cons" value="Vulnerable">
                <label for="vulnerable">Vulnerable</label><br>

                <input type="radio" id="endangered" name="cons" value="Endangered">
                <label for="endangered">Endangered</label><br>

                <input type="radio" id="critically-endangered" name="cons" value="Critically Endangered">
                <label for="critically-endangered">Critically Endangered</label><br>

                <input type="radio" id="extinct-in-the-wild" name="cons" value="Extinct In TheWild">
                <label for="extinct-in-the-wild">Extinct In The Wild</label><br>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p> Continent of Origin*</p>
                <input type="checkbox" id="africa" name="continent[]" value="Africa">
                <label for="africa">Africa</label><br>

                <input type="checkbox" id="antarctica" name="continent[]" value="Antarctica">
                <label for="antarctica">Antarctica</label><br>

                <input type="checkbox" id="australia" name="continent[]" value="Australia">
                <label for="australia">Australia</label><br>

                <input type="checkbox" id="asia" name="continent[]" value="Asia">
                <label for="asia">Asia</label><br>

                <input type="checkbox" id="europe" name="continent[]" value="Europe">
                <label for="europe">Europe</label><br>

                <input type="checkbox" id="north-america" name="continent[]" value="North America">
                <label for="north-america">North America</label><br>

                <input type="checkbox" id="south-america" name="continent[]" value="South America">
                <label for="south-america">South America</label><br>
            </div>
        </div>

        <div class="content" >
            <div class="radio-div">
                <p>Biome*</p>
                <input type="checkbox" id="temperate-deciduous-forest" name="biome[]" value="Temperate Deciduous Forest">
                <label for="temperate-deciduous-forest">Temperate Deciduous Forest</label><br>

                <input type="checkbox" id="coniferous-forest" name="biome[]" value="Coniferous Forest">
                <label for="coniferous-forest">Coniferous Forest</label><br>

                <input type="checkbox" id="woodland" name="biome[]" value="Woodland">
                <label for="woodland">Woodland</label><br>

                <input type="checkbox" id="chaparral" name="biome[]" value="Chaparral">
                <label for="chaparral">Chaparral</label><br>

                <input type="checkbox" id="tundra" name="biome[]" value="Tundra">
                <label for="tundra">Tundra</label><br>

                <input type="checkbox" id="grassland" name="biome[]" value="Grassland">
                <label for="grassland">Grassland</label><br>

                <input type="checkbox"id="desert" name="biome[]" value="Desert">
                <label for="desert">Desert</label><br>

                <input type="checkbox" id="tropical-savanna" name="biome[]" value="Tropical Savanna">
                <label for="tropical-savanna">Tropical Savanna</label><br>

                <input type="checkbox" id="tropical-forest" name="biome[]" value="Tropical Forest">
                <label for="tropical-forest">Tropical Forest</label><br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="description">Description*</label></p>
                <textarea rows="8" cols="107" name="description" id="description" required></textarea>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="reproduction">Reproduction*</label></p>
                <textarea rows="8" cols="107" name="reproduction" id="reproduction" required></textarea>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="conservation-status-para">Conservation Status*</label></p>
                <textarea rows="8" cols="107" id="conservation-status-para" name="conservationStatusPara" required></textarea>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="fun-facts">Fun Facts (each on a new line):</label></p>
                <textarea rows="8" cols="107" id="fun-facts" name="funFacts"></textarea>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="text-area-div">
                <p><label for="natural-enemies">Natural Enemies (each on a new line):</label></p>
                <textarea rows="8" cols="107" id="natural-enemies" name="naturalEnemies"></textarea>
                <br>
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <label for="related-animal-1">First Related Animal (name)*</label><br>
                <input type="text" id="related-animal-1" name="relatedAnimal1" class="short-text-input" required>
            </div>
            <div class="short-text-div">
                <label for="related-animal-2">Second Related Animal (name)</label><br>
                <input type="text" id="related-animal-2" name="relatedAnimal2" class="short-text-input">
            </div>
            <div class="short-text-div">
                <label for="related-animal-3">Third Related Animal (name)</label><br>
                <input type="text" id="related-animal-3" name="relatedAnimal3" class="short-text-input">
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <label for="title-image">Title Image* (banner on the animal's page):</label><br><br>
                <input type="file" name="file" id="title-img"  oninput="uploadFile('title-img');">
                <?php
                error_reporting(0);
                echo '<button class="clear-button" type="button" onclick="clearInput(\'title-img\', '.'\''.$data["name"].'\''.');">Clear Selection</button>';
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <label for="tile-image">Tile Image* (for the animal's "card"):</label><br><br>
                <input type="file" name="file" id="tile-img" oninput="uploadFile('tile-img');" >
                <?php
                echo '<button class="clear-button" type="button" onclick="clearInput(\'tile-img\', '.'\''.$data["name"].'\''.');">Clear Selection</button>';
                ?>
            </div>
        </div>

        <div class="content" >
            <div class="short-text-div">
                <p>Gallery Images </p>
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
                error_reporting(1);
                ?>
            </div>
        </div>
        <div class="content" id="buttons-div">
            <button id="reset-button" onclick="resetForm();" type = "reset" value="Reset"> Reset </button>
            <button id="submit-button" type = "submit" value = "Submit" > Submit </button>  
          
          <!--  <input onclick="window.location.href = 'animals.html';" type="submit" value="Submit request" /> -->
        </div>
    </form>

    <footer class="col-12">
    <p> Zoo 2022 </p>
    <p>All photos are copyright-free and were obtained from <a class="link_in_footer" href="https://www.pexels.com/ro-ro/">Pexels</a>. </p>
    </footer>

</body>
</html>


