<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "studentproject";
    $connection = mysqli_connect($server,$username,$password,$database);

    if (!$connection) {
        echo "Error while connecting database!!";
    }

?>