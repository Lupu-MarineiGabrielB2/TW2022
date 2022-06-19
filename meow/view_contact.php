<!DOCTYPE html>

<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(! ($_SESSION["loggedin"] == true && $_SESSION["username"] == "admin@admin.com")){
    header("location: login.php");
    exit;
}
?>

<html lang="en">

<head>
    <meta name="description" content="The list of animals">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/favicon-16x16.ico"/>
    <title>Contact</title>

    <link rel="stylesheet" href="styles/general_layout.css"/>
    <link rel="stylesheet" href="styles/admin/view_contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="funct/javaScript/sort_table.js"></script>
    <script src="funct/javaScript/admin_message_funct.js"></script>
</head>

<?php
    $dir=$_SERVER['DOCUMENT_ROOT']."/meow/config.php";
    require_once $dir;

    $sql = "SELECT * FROM feedback";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $type, $rating, $message, $user, $date);
?>

<body>

    <header>
        <div class="upper-bar-text"> <a id="nav-button" href="home.php">Test Zoo</a></div>
    </header>

    <div class="title">Contact</div>

    <div class="content">
       
        <table id="table">
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

    <footer class="col-12">
    <p> Test zoo 2022 </p>
    </footer>

</body>

</html>