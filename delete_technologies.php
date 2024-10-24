<?php
    require("database.php");
    $delete_technologies = $connection->real_escape_string($_POST["delete_technologies"]);

    

    $delete_technologies_qry = "DELETE FROM technologies WHERE Technologies_Name = '{$delete_technologies}'";

    $res_delete_technologies = mysqli_query($connection,$delete_technologies_qry);

    if ($res_delete_technologies) {
        header('Location: admin_crud.php?deletemessage=Deleted Successfully');
        exit();
    }
?>