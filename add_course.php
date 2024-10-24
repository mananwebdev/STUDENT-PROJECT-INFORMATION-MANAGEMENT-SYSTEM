<?php

    require("database.php");

    if (isset($_POST["add_course"])) {

    $add_course = $connection->real_escape_string($_POST["add_course"]);

    

    $add_course_qry = "INSERT INTO `courses` (`cid`, `Course_Name`) VALUES (NULL, '$add_course')";

    $res_add_course = mysqli_query($connection,$add_course_qry);

    if ($res_add_course) {
        header('Location: admin_crud.php?addmessage=Added Successfully');
        exit();
    }
}
?>