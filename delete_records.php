<?php
    require("database.php");
    $project_id = $connection->real_escape_string($_POST["project_id"]);

    

    $delete_student_name = "DELETE FROM student_data WHERE pid = '{$project_id}'";

    $res_delete_student_name = mysqli_query($connection,$delete_student_name);

    $delete_user = "DELETE FROM userss WHERE pid = '{$project_id}'";

    $res_delete_user = mysqli_query($connection,$delete_user);

    $delete_project_details = "DELETE FROM project_data WHERE pid = '{$project_id}'";

    $res_delete_project_details = mysqli_query($connection,$delete_project_details);


    if ($res_delete_student_name && $delete_user && $res_delete_project_details) {
        header('Location: output.php');
        exit();
    }
?>