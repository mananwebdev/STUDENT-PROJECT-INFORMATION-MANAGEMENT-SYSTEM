<?php

    require("database.php");
    $delete_course = $connection->real_escape_string($_POST["delete_course"]);



    $delete_course_qry = "DELETE FROM courses WHERE Course_Name = '{$delete_course}'";

    $res_delete_course = mysqli_query($connection,$delete_course_qry);

    if ($res_delete_course) {
        header('Location: admin_crud.php?deletemessage=Deleted Successfully');
        exit();
    }
?>