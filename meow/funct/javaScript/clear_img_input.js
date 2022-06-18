function clearInput(imgName, animalName){
    var xmlHttp = new XMLHttpRequest();   
    xmlHttp.open( "GET", "funct/remove_picture_selection.php?name=" + animalName + "&image=" + imgName, false );
    xmlHttp.send( null );

    const e = document.getElementById(imgName);

    e.value = '';
}