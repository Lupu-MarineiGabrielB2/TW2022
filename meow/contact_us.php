<?php
session_start();
function isBanned(){
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/config.php";
    require_once $dir;
    $sql = "SELECT banned FROM users where email=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["username"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $banned);
    while ($stmt->fetch()) {
        if($banned==1)
            return true;
    }
    return false;
}
// Initialize the session

// Check if the user is logged in, if not then redirect him to login page
if(! ($_SESSION["loggedin"])||isBanned()){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta name="description" content="The list of animals">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/favicon-16x16.ico"/>
    <title>Contact Us</title>

    <link rel="stylesheet" href="styles/general_layout.css"/>
    <link rel="stylesheet" href="styles/feedback/layout.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background-image: url('pictures/login-sign-up-background.jpeg')">
    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.php">Zoo</a></div>
    </header>

    <div class="content" >
        <form action="funct/feedback_receiver.php" method="post" id="form">
            <h1 style="text-align:center">Contact Us</h1><br>
            <p>We appreciate any and all questions, suggestions and comments … positive or negative.  Thank you!</p><br>

            <p>Select Contact Type</p>
            <select name="contact-type">
                <option value="general-information"> General Infromation </option>
                <option value="animals"> Animals </option>
                <option value="feedback"> Feedback </option>
            </select>
            <br> <br> <br>

            <p>Please rate your overall experience during your recent visit (5 = Very satisfied, 1 = Very dissatisfied)</p>
            <select name="rating">
                <option value="default">None selected</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br> <br> <br>

            <p>Message*</p>
            <textarea style="resize:vertical; max-width: 700px;" rows="8" cols="85" id="message" name="message" minlength=20 maxlength=3000 required></textarea>
            <br> <br> <br>

            <button id="submit-button" type = "submit" value = "Submit" > Submit </button> 

        </form>
    </div>


    <footer class="footer col-12">
    <p> Zoo 2022 </p>
    <p>All photos are copyright-free and were obtained from <a class="link_in_footer" href="https://www.pexels.com/ro-ro/">Pexels</a>. </p>
    </footer>

</body>
</html>