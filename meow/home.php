<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   // header("location: login.php");
   // exit;
}
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta name="description" content="Home page">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Animals </title>
    <link rel="stylesheet" href="styles/animals/layout.css"/>
    <link rel="icon" href="pictures/favicon-16x16.ico"/>

    <link rel="stylesheet" href="styles/general_layout.css"/>
    <link rel="stylesheet" href="styles/home.css"/>
    <!--<script src="js/slideshow-home.js"></script>-->
</head>
<body>
    <!--upper banner-->
    <header>
        <div class="upper-buttons">
        <?php
          error_reporting(0);     //removes a notice that appears when the user is not logged in
          if($_SESSION["loggedin"]){
            if( $_SESSION["username"] == "admin@admin.com"){
              echo ' <div class="upper-bar-button" id="admin-page"><a class="hyperlink-button" href="admin.php"> Admin Page </a></div>';
              echo '<div class="upper-bar-button"><a class="hyperlink-button" href="logout.php">Logout</a></div>';
              echo '<div class="upper-bar-button"><a class="hyperlink-button" href="reset-password.php">Reset Password</a></div>';  
              echo '<div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn"></button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="logout.php">Logout</a>
                        <a href="reset-password.php">Reset Password</a>
                        <a href="admin.php">Admin</a>
                      </div>
                    </div>';
            }
            else{
            echo '<div class="upper-bar-button"><a class="hyperlink-button" href="logout.php">Logout</a></div>';
            echo '<div class="upper-bar-button"><a class="hyperlink-button" href="reset-password.php">Reset Password</a></div>';
            echo '<div class="dropdown">
              <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                <a href="logout.php">Logout</a>
                <a href="reset-password.php">Reset Password</a>
                <a href="contact_us.php">Contact Us</a>
              </div>
            </div>';
                }
          }
          else{
            echo '<div class="upper-bar-button"><a class="class="hyperlink-button"" href="login.php">Login</a></div>';
            echo '<div class="upper-bar-button"><a class="class="hyperlink-button"" href="sign_up.php">Sign Up</a></div>';
            echo '<div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"></button>
            <div id="myDropdown" class="dropdown-content">
              <a href="login.php">Login</a>
              <a href="sign_up.php">Sign Up</a>
              <a href="contact_us.php">Contact Us</a>
            </div>
          </div>';
          }
          error_reporting(1);
        ?>
        </div>
    </header>


    <!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <img class="slideshow-img" src="pictures/home-raccoon-img.jpg" style="width:100%" alt="Photo of an animal">
    </div>
  
    <div class="mySlides fade">
      <img class="slideshow-img" src="pictures/home-raccoon-img2.jpg" style="width:100%" alt="Photo of an animal">
    </div>
  
    <div class="mySlides fade">
      <img class="slideshow-img" src="https://images.pexels.com/photos/2753515/pexels-photo-2753515.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" style="width:100%" alt="Photo of an animal">
    </div>


  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
    <br>

    <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
  <br>
  <a class="title" href="animals.php">Our animals</a>

  <script>
    let slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    </script>
    <script>
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
      </script>

    <footer id="footer">
        <p> Zoo 2022 </p>
        <p>All photos are copyright-free and were obtained from <a class="link_in_footer" href="https://www.pexels.com/ro-ro/">Pexels</a>. </p>
        <a class="link_in_footer" href="contact_us.php" > Contact Us</a>
      </footer>
</body>
</html>