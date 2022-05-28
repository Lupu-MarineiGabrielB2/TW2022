<?php

$q = $_REQUEST["q"];
if($q==0){
   uploadFile();
}
else{
   deleteFromUpload();
}

function uploadFile(){
   if(isset($_FILES['file']['name'])){
      // file name
      $filename = $_FILES['file']['name'];
   
      // Location
      $location = 'upload/'.$filename;
   
      // file extension
      $file_extension = pathinfo($location, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
   
      // Valid extensions
      $valid_ext = array("jpg","png","jpeg");
   
      if(in_array($file_extension,$valid_ext)){
         // Upload file
         if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         } 
      }
      exit;
   }
}

function deleteFromUpload(){
   $dir=$_SERVER['DOCUMENT_ROOT']."/meow/funct/upload/";
   array_map('unlink', glob("{$dir}title-img.*"));
   array_map('unlink', glob("{$dir}tile-img.*"));
   array_map('unlink', glob("{$dir}gallery-img1.*"));
   array_map('unlink', glob("{$dir}gallery-img2.*"));
   array_map('unlink', glob("{$dir}gallery-img3.*"));
}
?>