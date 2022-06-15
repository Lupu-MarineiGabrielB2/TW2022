function getAnimalPage(name){
    window.location.href="animal_template.php?name=" + name;
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", "animal_template.php?name=" + name, false );
    xmlHttp.send( null );
  } 

