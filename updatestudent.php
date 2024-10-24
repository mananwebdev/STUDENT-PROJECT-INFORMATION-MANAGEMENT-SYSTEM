<?php

    require("database.php");
    session_start();

    if (!empty($_POST["students"] && $_POST["newteamsize"])) {

    $pid = $_SESSION['pid'];
    
    $students = $_POST['students'];

    $teamsize = $_POST["newteamsize"];

    $update_teamsize_qry = "UPDATE project_data SET teamsize = '$teamsize'
                            WHERE pid = '$pid'";
    $update_teamsize_success = mysqli_query($connection,$update_teamsize_qry);

    $delete_student_data = "DELETE FROM `student_data` WHERE `student_data`.`pid` = '$pid'";
    $delete_student_data_success = mysqli_query($connection,$delete_student_data);

    foreach ($students['fname'] as $index => $fname) {
        $lname = $students['lname'][$index];
        $roll = $students['roll'][$index];
        $name = $fname . " " . $lname;
        $input_student_data = "INSERT INTO student_data (`name`, `roll`, `pid`) VALUES 
                                ('$name', '$roll', '$pid')";
        $input_success_sdata = mysqli_query($connection, $input_student_data);
    }

    if ($update_teamsize_success && $delete_student_data_success && $input_success_sdata) {
        header('Location: yourdata.php');
        exit();
    }
    }else {
        header('Location: yourdata.php');
        exit();
    }



    


?>