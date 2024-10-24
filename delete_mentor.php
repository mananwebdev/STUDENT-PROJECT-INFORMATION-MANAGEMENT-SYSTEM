<?php
    require("database.php");
    $delete_mentor = $connection->real_escape_string($_POST["delete_mentor"]);

    

    $delete_mentor_qry = "DELETE FROM mentors WHERE Mentor_Name = '{$delete_mentor}'";

    $res_delete_mentor = mysqli_query($connection,$delete_mentor_qry);

    if ($res_delete_mentor) {
        header('Location: admin_crud.php?deletemessage=Deleted Successfully');
        exit();
    }
?>