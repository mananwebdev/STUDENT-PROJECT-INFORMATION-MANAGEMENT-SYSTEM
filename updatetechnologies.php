<?php

    require("database.php");
    session_start();

    $pid = $_SESSION['pid'];
    if (!empty($_POST["updatetechnologies"])) {
        
    
    $tech = $_POST["updatetechnologies"];
    $updatetechnologies = implode(", ", $tech);

    $update_technologies_qry = "UPDATE project_data SET technologies = '$updatetechnologies'
                            WHERE pid = '$pid'";
    $update_technologies_success = mysqli_query($connection,$update_technologies_qry);

    if ($update_technologies_success) {
        header('Location: yourdata.php');
        exit();
    }
}else {
    header('Location: yourdata.php');
        exit();
}


?>