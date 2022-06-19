<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: login.php");
    //exit;
}
?>


<!DOCTYPE html>

<!-- position:12, grade:5 -->

<html lang="en">

<head>
    <meta name="description" content="The list of animals">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/favicon-16x16.ico"/>
    <title> Animals </title>

    <link rel="stylesheet" href="styles/general_layout.css"/>
    <link rel="stylesheet" href="styles/animals/filters.css" />
    <link rel="stylesheet" href="styles/animals/layout.css"/>
    <link rel="stylesheet" href="styles/animals/tile.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="funct/javaScript/animals_funct.js"></script>
    <script src="funct/javaScript/get_animal_page.js"></script>
</head>


<body>
    
    <!--upper banner-->
    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.php">Test Zoo</a></div>
    </header>

    <!-- Sets the "Animals" title and its background image-->
    <!-- Probably should download an image-->
        <div class="title-img col-12" style="background-image: url('https://images.pexels.com/photos/386147/pexels-photo-386147.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')"></div>

    <div class="title col-12">Animals</div>


    <div class="content col-11">
    <!-- this form represents the whole filter section; if you add a new "accordeon", you must add the id of the label to the filters.css, alongside with #legend1, #legend2...-->
    
    <div class="filters col-3">     <!-- without this, the flex(applied to .content) would expand the form(and its colourful background). Now, this div is the one that gets expanded-->
      <div class="search_bar">
           <input type="text" id="search" class="search_term" placeholder="Search by name...">
           <button type="submit" class="search_button">
             <i class="fa fa-search"></i>
          </button>
      </div>
      
      
      <form>
        <div class="accordion">
                <input type="checkbox" id="legend1"  value="legend1" >       <!-- "legend" and its label-->
                <label class="criterion" for="legend1">Species</label>

            <fieldset>                                                                     <!--the list of checkboxes-->
              <div class="selector">
                  <input type="checkbox" id="mammal" name="source" value="Mammal" >
                  <label for="mammal" >Mammal</label>
              </div>
              <div class="selector">
                  <input type="checkbox" id="bird" name="source" value="Bird">
                  <label for="bird">Bird</label>
              </div>
              <div class="selector">
                <input type="checkbox" id="reptile" name="source" value="Reptile">
                <label for="reptile">Reptile</label>
              </div>
            </fieldset>
        </div>


        <div class="accordion">
          <input type="checkbox" id="legend2" value="legend2">
          <label class="criterion" for="legend2">Continent of origin</label>
          <fieldset>
            <div class="selector">
                <input type="checkbox" id="Africa" name="source" value="Africa">
                <label for="Africa">Africa</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="Antarctica" name="source" value="Antarctica">
              <label for="Antarctica">Antarctica</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="Australia" name="source" value="Australia">
              <label for="Australia">Australia</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="Asia" name="source" value="Asia">
              <label for="Asia">Asia</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="Europe" name="source" value="Europe">
              <label for="Europe">Europe</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="North America" name="source" value="North America">
              <label for="North America">North America</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="South_America" name="source" value="South America">
              <label for="South_America">South America</label>
            </div>
          </fieldset>
        </div>

        <div class="accordion">
          <input type="checkbox" id="legend3"  value="legend3" >
          <label class="criterion" for="legend3">Order</label>
          <fieldset>
            <div class="selector">
                <input type="checkbox" id="carnivora" name="source" value="Carnivora">
                <label for="carnivora">Carnivora</label>
            </div>
            <div class="selector">
                <input type="checkbox" id="herbivora" name="source" value="Herbivora">
                <label for="herbivora">Herbivora</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="omnivora" name="source" value="Omnivora">
              <label for="omnivora">Omnivora</label>
            </div>
          </fieldset>
        </div>

        <div class="accordion">
          <input type="checkbox" id="legend4" value="legend4" >
          <label class="criterion" for="legend4">Biome</label>
          <fieldset>
            <div class="selector">
                <input type="checkbox" id="temp_forest" name="source" value="Temperate Deciduous Forest">
                <label for="temp_forest">Temperate Deciduous Forest</label>   <!-- former Temperate Deciduous Forest; renamed to decrease filters section size-->
            </div>
            <div class="selector">
                <input type="checkbox" id="coniferous_forest" name="source" value="Coniferous Forest">
                <label for="coniferous_forest">Coniferous Forest</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="woodland" name="source" value="Woodland">
              <label for="woodland">Woodland</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="chaparral" name="source" value="Chaparral">
              <label for="chaparral">Chaparral</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="tundra" name="source" value="Tundra">
              <label for="tundra">Tundra</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="grassland" name="source" value="Grassland">
              <label for="grassland">Grassland</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="desert" name="source" value="Desert">
              <label for="desert">Desert</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="tropical_savannah" name="source" value="Tropical Savannah">
              <label for="tropical_savannah">Tropical Savanna</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="tropical_forest" name="source" value="Tropical Forest">
              <label for="tropical_forest">Tropical Forest</label>
            </div>
          </fieldset>
        </div>

        <div class="accordion">
          <input type="checkbox" id="legend5" value="legend5" >
          <label class="criterion" for="legend5">Conservation Status</label>
          <fieldset>
            <div class="selector">
                <input type="checkbox" id="least_concern" name="source" value="Least Concern">
                <label for="least_concern">Least Concern</label>
            </div>
            <div class="selector">
                <input type="checkbox" id="near_threatened" name="source" value="Near Threatened">
                <label for="near_threatened">Near Threatened</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="vulnerable" name="source" value="Vulnerable">
              <label for="vulnerable">Vulnerable</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="endangered" name="source" value="Endangered">
              <label for="endangered">Endangered</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="critically_endangered" name="source" value="Critically Endangered">
              <label for="critically_endangered">Critically Endangered</label>
            </div>
            <div class="selector">
              <input type="checkbox" id="extinct_in_the_wild" name="source" value="Extinct In The Wild">
              <label for="extinct_in_the_wild">Extinct In The Wild</label>
            </div>
          </fieldset>
        </div>
      </form>
  
    </div>

<!-- template tile for: 1.animal picture and name; 2.basic info about said animal -->
<div class="tile_set col-9">
<script>
    fetchAnimals();
    getAllTiles();
</script>
</div>

<script>
  const filterCheckboxes = document.getElementsByName("source");
  filterCheckboxes.forEach( function(i) {
    i.addEventListener("click", updateFilteredItems);
  });
</script>

<script src="funct/javaScript/search_bar.js"></script>

</div>    <!-- end of "content"-->

<footer class="col-12">
  <p> Test zoo 2022 </p>
  <p>All photos are copyright-free and were obtained from <a class="link_in_footer" href="https://www.pexels.com/ro-ro/">Pexels</a>. </p>
  <a class="link_in_footer" href="contact_us.php" > Contact Us</a>
</footer>

</body>
</html>