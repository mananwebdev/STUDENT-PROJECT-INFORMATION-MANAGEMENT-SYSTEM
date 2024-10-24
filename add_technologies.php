<?php

    require("database.php");
    if (isset($_POST["add_technologies"])) {

    $add_technologies = $connection->real_escape_string($_POST["add_technologies"]);

    

    $add_technologies_qry = "INSERT INTO `technologies` (`tid`, `Technologies_Name`) VALUES (NULL, '$add_technologies')";

    $res_add_technologies = mysqli_query($connection,$add_technologies_qry);

    if ($res_add_technologies) {
        header('Location: admin_crud.php?addmessage=Added Successfully');
        exit();
    }
    
}
?>