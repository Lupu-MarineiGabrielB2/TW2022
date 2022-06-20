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
  xmlhttp.open("GET", "funct/remove_message.php?x=" + id, true);
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

function removeAllMessages(name){
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open( "GET", "funct/remove_message.php?x=" + name, false );
  xmlHttp.send( null );
}

function removeUser(name, ban){
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open( "GET", "funct/remove_user.php?user=" + name + "&ban=" + ban, false );
  xmlHttp.send( null );
}

function handleAccount(name, ban){
  const div = document.getElementById(name);
  if(ban==0){
    if(confirm("Are you sure you want to remove user " + name + "?")){
      removeAllMessages(name);
      removeUser(name, ban);
      div.remove();
    }
  }
  else{
    removeAllMessages(name);
    removeUser(name, ban);
    banButtons = document.getElementsByName(name);
    if(banButtons[0].enabled==true){
      banButtons[0].enabled=false;
      banButtons[0].disabled=true;
      banButtons[1].enabled=true;
      banButtons[1].disabled=false;
    }
    else{
      banButtons[1].enabled=false;
      banButtons[1].disabled=true;
      banButtons[0].enabled=true;
      banButtons[0].disabled=false;
    }
  }
}

//Twinglog1
//gabi_cars31@yahoo.com