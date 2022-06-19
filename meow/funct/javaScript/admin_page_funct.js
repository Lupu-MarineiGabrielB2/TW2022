 function getEditPage(name){
   window.location.href="edit_animal.php?name=" + name;
   var xmlHttp = new XMLHttpRequest();
   xmlHttp.open( "GET", "edit_animal.php?name=" + name, false );
   xmlHttp.send( null );
 }    

 function removeAnimal(name){
   if(confirm("Are you sure you want to permanently remove " + name + "?")){
      //to remove all files from server
      var xmlHttp = new XMLHttpRequest();   
      xmlHttp.open( "GET", "funct/remove_animal.php?name=" + name, false );
      xmlHttp.send( null );

      //to remove the tile from admin page
      const div = document.getElementById(name);
      div.remove();
   }
 }

function setVisible(name){
  var xmlHttp = new XMLHttpRequest();   
  xmlHttp.open( "GET", "funct/update_visible.php?name=" + name, false );
  xmlHttp.send( null );
}


function removeMessage(id){
  console.log(id);
  var xmlhttp = new XMLHttpRequest();   
  xmlhttp.open("GET", "funct/remove_message.php?id=" + id, true);
  xmlhttp.send();

  const line = document.getElementById("tr"+id);
  line.remove();
}

function openTab(id){
  const availableIds = ["animals-tab", "users-tab", "contact-tab"];
  const buttons = ["animals-tablink", "users-tablink", "contact-tablink"]
  for(let i in availableIds){
    var el=document.getElementById(availableIds[i]);
    if(availableIds[i]==id){
      document.getElementById(buttons[i]).style.backgroundColor='darkgrey';
      el.style.display='inline';
    }
    else{
      document.getElementById(buttons[i]).style.backgroundColor='gainsboro';
      el.style.display='none';
    }
  }

  if(id=="animals-tab"){
    document.getElementById("search-bar").style.display='initial';
    document.getElementById("add-button").style.display='initial';
  }
  if(id=="users-tab"){
    document.getElementById("add-button").style.display='none';
    document.getElementById("search-bar").style.display='initial';
  }
  if(id=="contact-tab"){
    document.getElementById("add-button").style.display='none';
    document.getElementById("search-bar").style.display='none';
  }
}