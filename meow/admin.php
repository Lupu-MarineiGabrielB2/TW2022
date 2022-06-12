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

    <script src="funct/admin_page_funct.js"></script>
</head>

<body>
    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.html">Test Zoo</a></div>
    </header>

    <div class="title">Admin page</div>

    <div class="content">
        <div class="upper-content">
            <div class="add-div">
                <button type="submit" id="add-button" class=""> <a href="add_animal.html"> Add new animal </a></button>
            </div>

            <div class="search-bar">
                <input type="text" class="search-term" placeholder="Search by name...">
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
                    
                    echo  '<div class="tile" id='.$name.'>
                        <div class="animal-name"> <a href="animal_template.html">' . $name .' </a></div>
                            <div class="tile_buttons">
                                <button type="submit" class="edit-button" onclick="getEditPage('.'\''.$name.'\''.');"> Edit </button>
                                <button type="submit" class="remove-button" onclick="removeAnimal('.'\''.$name.'\''.');"> Remove </button>
                            </div>
                        </div>';
                }
            }
            ?>
        </div>
    </div>

    <footer class="col-12">
    <p> Test zoo 2022 </p>
    </footer>

</body>
</html>