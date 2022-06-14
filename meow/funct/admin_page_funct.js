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

 function redirect(){
      //  window.location.replace("C:/xampp/htdocs/meow/admin.php");
      console.log("Asdasd")
      window.location.href = "http://localhost/meow/admin.php";
 }