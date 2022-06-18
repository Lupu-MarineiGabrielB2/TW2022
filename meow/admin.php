<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
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
    <title>Admin</title>

    <link rel="stylesheet" href="styles/general_layout.css"/>
    <link rel="stylesheet" href="styles/admin/layout.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="funct/javaScript/admin_page_funct.js"></script>
    <script src="funct/javaScript/get_animal_page.js"></script>
</head>

<body>
    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.php">Test Zoo</a></div>
    </header>

    <div class="title">Admin page</div>

    <div class="content">
        <div class="upper-content">
            <div class="add-div">
                <button type="submit" id="add-button" class=""> <a href="add_animal.php"> Add new animal </a></button>
            </div>

            <div class="search-bar">
                <input type="text" id="search" class="search-term" placeholder="Search by name...">
                <button type="submit" class="search-button">
                  <i class="fa fa-search"></i>
               </button>
           </div>
        </div>

        <div class="tile-set">
            <?php
            $dataPath=$_SERVER['DOCUMENT_ROOT']."/meow/funct/data";
            $arrFiles = scandir($dataPath, 1);
            foreach ($arrFiles as $file) {
                if(!is_dir($file)){
                    $str_data = file_get_contents("funct/data/" . $file);
                    $data = json_decode($str_data, true);
                    $name=$data["name"];
                    
                    echo  '<div class="tile" id='.$name.' name='.$name.'>
                        <div class="animal-name"> <div onclick="getAnimalPage('.'\''.$name.'\''.');">' . $name .' </div></div>
                            <div class="tile_buttons">
                                <button type="submit" class="edit-button" onclick="getEditPage('.'\''.$name.'\''.');"> Edit </button>
                                <button type="submit" class="remove-button" onclick="removeAnimal('.'\''.$name.'\''.');"> Remove </button>
                                <div class="visible_checkbox">
                                    <input type="checkbox" id="is_visible" name='. $name.' value="is_visible" checked  onclick="setVisible('.'\''.$name.'\''.');">
                                    <label > Visible</label>
                                </div>
                            </div>
                        </div>';
                }
            }
            ?>
        </div>
    </div>

    <script src="funct/javaScript/search_bar.js"></script>

    <footer class="col-12">
    <p> Test zoo 2022 </p>
    </footer>

</body>
</html>