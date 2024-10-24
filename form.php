<?php

include("database.php");
session_start();
ob_start();
$students = $_POST['students'];

$teamsize = $_POST["teamsize"];
$course = $connection->real_escape_string($_POST["course"]);
$defination = $connection->real_escape_string($_POST["defination"]);
$tech = $_POST["tech"];
$mentor = $connection->real_escape_string($_POST["mentor"]);
$year = $_POST["year"];

$usr_id = $_SESSION['usr_id'];

$technologies = implode(", ", $tech);

$input_project_data = "INSERT INTO `project_data` (`pid`, `teamsize`, `course`, `defination`, `technologies`, `mentor`, `year`) VALUES 
                (NULL,'$teamsize', '$course', '$defination', 
                '$technologies', '$mentor', '$year')";

$input_success_pdata = mysqli_query($connection, $input_project_data);

$pid = $connection->insert_id;

foreach ($students['fname'] as $index => $fname) {
    $lname = $students['lname'][$index];
    $roll = $students['roll'][$index];
    $name = $fname . " " . $lname;
    $input_student_data = "INSERT INTO student_data (`name`, `roll`, `pid`) VALUES 
                            ('$name', '$roll', '$pid')";
    $input_success_sdata = mysqli_query($connection, $input_student_data);
}
    $input_usr_id = "UPDATE userss SET pid = '$pid' WHERE usr_id = '$usr_id'";
    $input_success_usr_id = mysqli_query($connection, $input_usr_id);   

    if ($input_success_usr_id) {
        $inputsuccess = 1;
        $_SESSION['inputsuccess'] = $inputsuccess;
    }

    header('Location: welcome.php?message=Data Inserted successfully');
    exit();
    ob_end_flush();
?>

