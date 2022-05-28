//pictureHandlers.js and picture.php fetch files from the form as they are selected (not ideal but works)
//if another file is selected, the old one is simply overwritten
//i suppose that there is only one admin

function uploadFile(id){
   var files = document.getElementById(id).files;

   if(files.length > 0 ){
      var fname=files[0].name;
      
     //replace the name of the file with the id of the tag
      regex = new RegExp('[^.]+$');
      extension = fname.match(regex);
      newFname=id.concat(".", extension);
      var renamedFile = new File([files[0]], newFname);

      //place the file in formData
      var formData = new FormData();
      formData.append("file", renamedFile);

      var xhttp = new XMLHttpRequest();

      // Set POST method and ajax file path
      xhttp.open("POST", "funct/picture.php?q=" + 0, true);

      // Send request with data
      xhttp.send(formData);
   }
}


//deletes the pictures that the form put inside the upload folder
function resetForm(){
   var xmlhttp = new XMLHttpRequest();   
   xmlhttp.open("GET", "funct/picture.php?q=" + 1, true);
   xmlhttp.send();
}

