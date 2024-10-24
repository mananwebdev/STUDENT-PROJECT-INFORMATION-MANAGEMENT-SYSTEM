<?php

    require("database.php");
    session_start();

    $pid = $_SESSION['pid'];

    if (!empty($_POST["updatedefination"])) {
        
    $updatedefination = $connection->real_escape_string($_POST["updatedefination"]);

    $update_defination_qry = "UPDATE project_data SET defination = '$updatedefination'
                            WHERE pid = '$pid'";
    $update_defination_success = mysqli_query($connection,$update_defination_qry);

    if ($update_defination_success) {
        header('Location: yourdata.php');
        exit();
    }
}else {
    header('Location: yourdata.php');
        exit();
}

?>