<?php

    require("database.php");
    if (isset($_POST["add_mentor"])) {
    
    $add_mentor = $connection->real_escape_string($_POST["add_mentor"]);

    

    $add_mentor_qry = "INSERT INTO `mentors` (`mid`, `Mentor_Name`) VALUES (NULL, '$add_mentor')";

    $res_add_mentor = mysqli_query($connection,$add_mentor_qry);

    if ($res_add_mentor) {
        header('Location: admin_crud.php?addmessage=Added Successfully');
        exit();
    }
}
?>