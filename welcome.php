<?php
session_start();


$usr_id = $_SESSION['usr_id'];

require("database.php");

$q1 = "SELECT project_data.pid FROM userss 
        JOIN project_data on userss.pid = project_data.pid 
        WHERE userss.usr_id = '$usr_id'";

$res1 = mysqli_query($connection, $q1);

foreach ($res1 as $row) {
    foreach ($row as $pid) {
        $_SESSION['pid'] = $pid;
        break;
    }
}

if (!isset($_SESSION['usernames'])) {
    header('Location: login.php');
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Manan's Project</title>
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            padding: 10px;
            box-sizing: border-box;
        }

        .container {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px blue;
            text-align: center;
            max-width: 100%;
            width: 100%;
            box-sizing: border-box;
            max-width: 600px; 
        }

        h2 {
            color: #333;
        }

        a {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            width: 200px;
            background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background: -webkit-linear-gradient(right, #003366, #004080, #0059b3, #0073e6);
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center; 
            padding: 10px; 
            width: 100%;
            box-sizing: border-box;
            background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
        }

        .logo {
            height: 70px; 
            margin-right: 15px; 
        }

        h5 {
            color: yellow;
            font-size: 19px;
            margin: 0; 
        }

        .footer {
            background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
            color: #ffffff;
            width: 100%;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            font-size: 15px;
        }
        .message {
            text-align: center;
            color: darkgreen;
        }

@media only screen and (max-width: 768px) {
        .container {
            padding: 1em; 
            width: 90%; 
        }
        h2{
            font-size: 1em;
        }
        .logo {
            height: 50px; 
        }

        h5 {
            font-size: 16px; 
        }

        a {
            padding: 8px 16px;
            font-size: 14px; 
        }

        .footer {
            font-size: 13px; 
        }
        p {
            display: block;
            font-size: 9px; 
         }

        p::before {
            content: " ";
        }

        p span {
            display: block;
            margin-bottom: 5px; 
        }
}
    </style>
</head>
<body>

    <header>
        <img src="gujaratuniversity.png" alt="Logo" class="logo">
        <h5>Gujarat University &MediumSpace;:&MediumSpace; &MediumSpace; Department of Computer Science</h5>
    </header>
    
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['usernames']); ?>!</h2>
        <a href="input.php">Insert Project Details</a>
        <a href="yourdata.php">View / edit Project Details</a>
        <a href="changepass.php">Change Password</a>
        <a href="logout.php">Logout</a>
        <?php if (isset($_GET['message'])): ?>
        <div class="message">
            <?php echo htmlspecialchars($_GET['message']);
            ?>
        </div>
        <?php endif; ?>
    </div>

    <footer class="footer">
        <p>
            <span>Copyright &copy; 2024 Manan Patel. All Rights Reserved. </span>
            <span> - Under guidance of Dr. Hiren Joshi</span>
        </p>
    </footer>

</body>
</html>


<?php
ob_end_flush();
?>
