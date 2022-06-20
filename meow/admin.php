<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(! ($_SESSION["loggedin"] == true && $_SESSION["username"] == "admin@admin.com")){
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
    <link rel="stylesheet" href="styles/admin/view_contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="funct/javaScript/admin_page_funct.js"></script>
    <script src="funct/javaScript/get_animal_page.js"></script>

    <script src="funct/javaScript/sort_table.js"></script>
</head>

<?php
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/config.php";
    require_once $dir;
?>

<body>
    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.php">Zoo</a></div>
    </header>

    <div class="title" style="margin-top: 75px;">Admin page</div>

    <div class="available-tabs">
        <button id="animals-tablink" class="tablinks" onclick="openTab('animals-tab')">Animals</button>
        <button id="users-tablink" class="tablinks" onclick="openTab('users-tab')">Users</button>
        <button id="contact-tablink" class="tablinks" onclick="openTab('contact-tab')">Contact</button>
    </div>

    <div class="all-content">
    <div id="upper-content">
        <div class="add-div">
            <a id="add-button" href="add_animal.php"> Add new animal </a>
        </div>

        <div id="search-bar">
            <input type="text" id="search" class="search-term" placeholder="Search by name...">
            <button type="submit" class="search-button"> <i class="fa fa-search"></i> </button>
        </div>
    </div>

    <div id="animals-tab" class="tab">
        <div class="content">
            

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
    </div>


    <div id="users-tab" class="tab">
        <?php
            $sql = "SELECT email, banned FROM users";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $email, $banned);
        ?>
        <div class="content">
            <div class="tile-set col-11">
                <?php
                while ($stmt->fetch()) {
                    if(strcmp($email, "admin@admin.com")!=0){
                        echo  '<div class="tile" id='.$email.'>
                        <div class="user-name">'. $email .'</div>
                            <div class="tile_buttons">
                                <button type="submit" class="delete-button" onclick="handleAccount('.'\''.$email.'\''.', 0);"> Remove Account </button>';
                                if($banned==0){
                                echo '<button type="submit" name='.$email.' class="ban-button" onclick="handleAccount('.'\''.$email.'\''.', 1);"> Ban User </button>';
                                echo '<button type="submit" name='.$email.' class="unban-button" onclick="handleAccount('.'\''.$email.'\''.', 2);" disabled> Unban User </button>';
                                }
                                else{
                                    echo '<button type="submit" name='.$email.' class="ban-button" onclick="handleAccount('.'\''.$email.'\''.', 1);" disabled> Ban User </button>';
                                    echo '<button type="submit" name='.$email.' class="unban-button" onclick="handleAccount('.'\''.$email.'\''.', 2);"> Unban User </button>';
                                }
                            echo   ' </div>
                        </div>';
                    }
                }
                ?>
            </div>
            <div class="tile-set">
            </div>
        </div>
    </div>


    <div id="contact-tab" class="tab">
        <?php
            $sql = "SELECT * FROM feedback";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $type, $rating, $message, $user, $date);
        ?>
        <div class="content">
            <table id="table tablemobile">
                <tr>
                    <th class="th-normal" id="date-th" onclick="sortTable(0)"> Date <i id="caret0" class="fa fa-caret-down" aria-hidden="true"></i></th>
                    <th class="th-normal" id="rating-th" onclick="sortTable(1)">Rating <i id="caret1" class="fa fa-caret-down" aria-hidden="true"></i></th>
                    <th class="th-normal" id="type-th" onclick="sortTable(2)">Type <i id="caret2" class="fa fa-caret-down" aria-hidden="true"></i></th>
                    <th class="th-normal" id="message-th">Message </th>
                    <th class="th-normal" id="user-th" onclick="sortTable(4)">User <i id="caret4" class="fa fa-caret-down" aria-hidden="true"></i></th>
                </tr>
                
                <?php
                while ($stmt->fetch()) {
                    echo '<tr id="tr'.$id.'">';
                        echo '<td class="td-normal">' . $date . '</td>';
                        echo '<td class="td-normal">' . $rating . '</td>';
                        echo '<td class="td-normal">' . $type . '</td>';
                        echo '<td class="td-normal"><textarea disabled class="message-textarea" rowspan="5">'. $message . '</textarea></td>';
                        echo '<td class="td-normal"><textarea disabled rowspan="2">'. $user .'</textarea></td>';
                        echo '<td class="separator"></td>';
                        echo '<td class="remove" onclick="removeMessage('.'\''.$id.'\''.');">Remove Entry</td>';
                    echo '</tr>';
                }
                ?>
                
            </table>
        </div>
    </div>
    </div>

    <script src="funct/javaScript/search_bar.js"> </script>
    <script> 
        var el=document.getElementById("animals-tablink");
        el.click();
        el.style.backgroundColor='darkgrey';
    </script>

    <script>
        function openTab(id){
            const availableIds = ["animals-tab", "users-tab", "contact-tab"];
            const buttons = ["animals-tablink", "users-tablink", "contact-tablink"]
            for(let i in availableIds){
                var el=document.getElementById(availableIds[i]);
                if(availableIds[i]==id){
                document.getElementById(buttons[i]).style.backgroundColor='darkgrey';
                el.style.display='flex';
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
    </script>

    <footer class="col-12">
    <p> Zoo 2022 </p>
    </footer>

</body>
</html>