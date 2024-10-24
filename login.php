<?php
session_start();

if (isset($_SESSION['usr_id'])) {
    $usr_id = $_SESSION['usr_id'];
}

require("database.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernames = $connection->real_escape_string($_POST['logusernames']);
    $passwords = $connection->real_escape_string($_POST['logpasswords']);

    
    
    $stmt = $connection->prepare('SELECT passwords FROM userss WHERE usernames = ?');
    $stmt->bind_param('s', $usernames);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);

    if ($usernames == "admin@gmail.com") {
        if ($stmt->fetch() && password_verify($passwords, $hashed_password)) {
        $_SESSION['usernames'] = $usernames;
        header('Location: adminlogin.php');
        }else {
            header('Location: signlog.php?message=Invalid username or password');
            exit;
        }
    }elseif ($stmt->fetch() && password_verify($passwords, $hashed_password)) {
        $_SESSION['usernames'] = $usernames;
        header('Location: welcome.php');
    }else {
        header('Location: signlog.php?message=Invalid username or password');
        exit;
    }

    $stmt->close();

    $qry = "SELECT usr_id FROM userss WHERE usernames = '$usernames'";
    $usr_id = mysqli_query($connection,$qry);

    foreach ($usr_id as $row) {
        foreach ($row as $usr_id) {
            $_SESSION['usr_id'] = $usr_id;
            break;
        }
    }
    $connection->close();
}
?>
