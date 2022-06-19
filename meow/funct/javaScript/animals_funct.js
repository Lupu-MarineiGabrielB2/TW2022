//----------------------------------------

var animals;

function fetchAnimals(){
  const xmlhttp = new XMLHttpRequest();
  
  xmlhttp.onload = function() {
    window.animals = JSON.parse(this.responseText);
  }
  xmlhttp.open("POST", "funct/get_tiles.php", false);
  xmlhttp.send();
}


function getAllTiles(){
  for (let i in animals) {
    var animal = JSON.parse(animals[i]);
    getTile(animal);
  }
}

function getTile(animal){
  document.write("<div class='tile' name=", animal.name.replace(/\s+/g, "_")," onclick='getAnimalPage(\"",animal.name,"\");'>");
  document.write("<img class='animal_img' alt=", animal.name, " src='funct/data/pictures/", animal.name.replace(/ /g, "_"), "/tile-img.jpg'>");
  document.write("<p class='animal_name'>", animal.name,"</p>"); 
  document.write("<p class='scientific_name'>", animal.scientificName, "</p>");
  document.write("<div class='animal_text'><p>", animal.description, "</p>");
  document.write("</div>");
  document.write("</div>");
}
  
//---------------------

const species=["Mammal", "Bird", "Reptile"];
const continent=["Africa", "Antarctica", "Australia", "Asia", "Europe", "North America", "South America"];
const order=["Carnivora", "Herbivora", "Omnivora"];
const biome=["Temperate Deciduous Forest", "Coniferous Forest", "Woodland", "Chaparral", "Tundra", "Grassland", "Desert", "Tropical Savanna", "Tropical Forest"];
const conservation=["Least Concern", "Near Threatened", "Vulnerable", "Endangered", "Critically Endangered", "Extinct In The Wild"];

var checkedSpecies=[];
var checkedContinent=[];
var checkedOrder=[];
var checkedBiome=[];
var checkedConservation=[];

function getCheckedBoxes(chkboxName) {
  var checkboxes = document.getElementsByName(chkboxName);
  var checkboxesChecked = [];
  // loop over them all
  for (var i=0; i<checkboxes.length; i++) {
     // And stick the checked ones onto an array...
     if (checkboxes[i].checked) {
        checkboxesChecked.push(checkboxes[i]);
     }
  }
  // Return the array if it is non-empty, or null
  return checkboxesChecked;
}

function setCheckedParameters(checkedBoxes){
  checkedSpecies=[];
  checkedContinent=[];
  checkedOrder=[];
  checkedBiome=[];
  checkedConservation=[];
  for (let i in checkedBoxes) {
    if(species.includes(checkedBoxes[i].value))
      window.checkedSpecies.push(checkedBoxes[i].value);

    if(continent.includes(checkedBoxes[i].value))
      checkedContinent.push(checkedBoxes[i].value);

    if(order.includes(checkedBoxes[i].value))
      checkedOrder.push(checkedBoxes[i].value);

    if(biome.includes(checkedBoxes[i].value))
      checkedBiome.push(checkedBoxes[i].value);

    if(conservation.includes(checkedBoxes[i].value))
      checkedConservation.push(checkedBoxes[i].value);
  }
}


function passesFilter(filter, animalPara){
  if(filter.length==0)
    return true;
  for (let i in filter) {
    if(animalPara.indexOf(filter[i])!=-1)
      return true;
  }
  return false;
}

function passAllFilters(animal){
  if(passesFilter(window.checkedSpecies, animal.species)&&passesFilter(window.checkedContinent, animal.continent))
    if(passesFilter(window.checkedOrder, animal.order)&&passesFilter(window.checkedBiome, animal.biome))
      if((window.checkedConservation==animal.conservationStatus)||window.checkedConservation.length==0)
    return true;
  return false;
}

function filterTiles(){
  for (let i in animals) {
    var animal = JSON.parse(animals[i]);
    var n=animal.name.replace(/\s+/g, "_");
    element=document.getElementsByName(n);
    if(!passAllFilters(animal))
      element[0].style.display='none';
    else
      element[0].style.display='inline';
  }
}

// (mammal || reptile ) && (omivorous || carnivorous)
function updateFilteredItems() {
  var checkedBoxes = getCheckedBoxes("source");
  if(checkedBoxes!=null){
    setCheckedParameters(checkedBoxes);
    filterTiles();
  }
}