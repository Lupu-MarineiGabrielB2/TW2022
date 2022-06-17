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
  return checkboxesChecked.length > 0 ? checkboxesChecked : null;
}


function showUser(str) {
   if (str=="") {
     document.getElementById("txtHint").innerHTML="";
     return;
   }
   var xmlhttp=new XMLHttpRequest();
   xmlhttp.onreadystatechange=function() {
     if (this.readyState==4 && this.status==200) {
       document.getElementById("txtHint").innerHTML=this.responseText;
     }
   }
   xmlhttp.open("GET","getuser.php?q="+str,true);
   xmlhttp.send();
 }


//----------------------------------------

var animals;

function setAnimals(r){
  window.animals=r;
}

function fetchAnimals(){
  const xmlhttp = new XMLHttpRequest();
  
  xmlhttp.onload = function() {
    r = JSON.parse(this.responseText);
    setAnimals(r);
  }
  xmlhttp.open("GET", "funct/get_tile.php", false);
  xmlhttp.send();
}


function getAllTiles(){
  //console.log("here");
  //console.log(window.animals);
  for (let i in animals) {
    var animal = JSON.parse(animals[i]);
    getTile(animal);
  }
}

function getTile(animal){
  document.write("<div class='tile' onclick='getAnimalPage(\"",animal.name,"\");'>");
  document.write("<img class='animal_img' alt=", animal.name, " src='funct/data/pictures/", animal.name, "/tile-img.jpg'>");
  document.write("<p class='animal_name'>", animal.name,"</p>"); 
  document.write("<p class='scientific_name'>", animal.scientificName, "</p>");
  document.write("<div class='animal_text'><p>", animal.description, "</p>");
  document.write("</div>");
  document.write("</div>");
}
  

// (mammal || reptile ) && (omivorous || carnivorous)
function updateFilteredItems() {
  var checkedBoxes = getCheckedBoxes("source");
  console.log(checkedBoxes);
  }