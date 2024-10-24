<?php

    require("database.php");
    session_start();

    if (!empty($_POST["updatecourse"])) {
    
    $pid = $_SESSION['pid'];

    $updatecourse = $connection->real_escape_string($_POST["updatecourse"]);

    $update_course_qry = "UPDATE project_data SET course = '$updatecourse'
                            WHERE pid = '$pid'";
    $update_course_success = mysqli_query($connection,$update_course_qry);

    if ($update_course_success) {
        header('Location: yourdata.php');
        exit();
    }
    }else {
        header('Location: yourdata.php');
        exit();
    }

?>