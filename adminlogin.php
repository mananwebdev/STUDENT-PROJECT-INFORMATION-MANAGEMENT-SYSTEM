<?php
session_start();


$usr_id = $_SESSION['usr_id'];

if (!isset($_SESSION['usernames'])) {
    header('Location: login.php');
    exit();
}


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Manan's Project</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px blue;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h3 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: white;
            width: 200px;
            font-size: 18px;
            background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }
        a:hover {
            background: -webkit-linear-gradient(right, #003366, #004080, #0059b3, #0073e6);
            color: #fff;
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
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h3 {
                font-size: 20px;
            }
            a {
                font-size: 16px;
            }
            .logo {
                height: 50px; 
            }

            h5 {
                font-size: 16px; 
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
        <h3>Welcome to Admin Panel</h3>
        <a href="output.php">View / Edit All Data</a><br><br>
        <a href="admin_crud.php">Add / Delete Operations</a><br><br>
        <a href="changepass.php">Change Password</a><br><br>
        <a href="logout.php">Log Out</a>
    </div>

    <footer class="footer">
        <p>
            <span>Copyright &copy; 2024 Manan Patel. All Rights Reserved. </span>
            <span> - Under guidance of Dr. Hiren Joshi</span>
        </p>
    </footer>

    
</body>
</html>
