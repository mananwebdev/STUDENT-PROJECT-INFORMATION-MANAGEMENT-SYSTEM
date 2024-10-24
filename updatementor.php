<?php

    require("database.php");
    session_start();

    if (!empty($_POST["updatementor"])) {
    
    $pid = $_SESSION['pid'];

    $updatementor = $connection->real_escape_string($_POST["updatementor"]);

    $update_mentor_qry = "UPDATE project_data SET mentor = '$updatementor'
                            WHERE pid = '$pid'";
    $update_mentor_success = mysqli_query($connection,$update_mentor_qry);

    if ($update_mentor_success) {
        header('Location: yourdata.php');
        exit();
    }
    }else {
        header('Location: yourdata.php');
        exit();
    }

?>