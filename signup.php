<?php

session_start();
require("database.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernames = $connection->real_escape_string($_POST['usernames']);
    $passwords = $connection->real_escape_string(password_hash($_POST['passwords'], PASSWORD_DEFAULT));

    
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    
    $stmt = $connection->prepare('SELECT usr_id FROM userss WHERE usernames = ?');
    $stmt->bind_param('s', $usernames);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header('Location: signlog.php?message=User with this Email ID already exists!');
        exit;
    } else {
        
        $stmt->close();
        $stmt = $connection->prepare('INSERT INTO userss (usernames, passwords) VALUES (?, ?)');
        $stmt->bind_param('ss', $usernames, $passwords);

        if ($stmt->execute()) {
            $usr_id = $connection->insert_id;
            $_SESSION['usr_id'] = $usr_id;
            header('Location: signlog.php?message=Signup successful');
            exit;
        } else {
            echo 'Error: ' . $stmt->error;
        }
    }

    $stmt->close();
    $connection->close();
}
?>
