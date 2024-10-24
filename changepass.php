<?php
session_start();
ob_start(); 
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
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    html, body {
      display: grid;
      height: 100%;
      width: 100%;
      place-items: center;
      background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
    }
    ::selection {
      background: #1a75ff;
      color: #fff;
    }
    .wrapper {
      overflow: hidden;
      max-width: 390px;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
    }
    .wrapper .title-text {
      display: flex;
      width: 100%;
      justify-content: center;
    }
    .wrapper .title {
      font-size: 35px;
      font-weight: 600;
      text-align: center;
      transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
    }
    .wrapper .form-container {
      width: 100%;
      overflow: hidden;
    }
    .form-container .form-inner form {
      width: 100%;
      transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
    }
    .form-inner form .field {
      height: 50px;
      width: 100%;
      margin-top: 20px;
    }
    .form-inner form .field input {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 15px;
      border-radius: 15px;
      border: 1px solid lightgrey;
      border-bottom-width: 2px;
      font-size: 17px;
      transition: all 0.3s ease;
    }
    .form-inner form .field input:focus {
      border-color: #1a75ff;
    }
    .form-inner form .field input::placeholder {
      color: #999;
      transition: all 0.3s ease;
    }
    form .field input:focus::placeholder {
      color: #1a75ff;
    }
    .form-inner form .pass-link {
      margin-top: 5px;
    }
    .form-inner form .changepass-link {
      text-align: center;
      margin-top: 30px;
    }
    .form-inner form .pass-link a,
    .form-inner form .changepass-link a {
      color: #1a75ff;
      text-decoration: none;
    }
    .form-inner form .pass-link a:hover,
    .form-inner form .changepass-link a:hover {
      text-decoration: underline;
    }
    form .btn {
      height: 50px;
      width: 100%;
      border-radius: 15px;
      position: relative;
      overflow: hidden;
    }
    form .btn .btn-layer {
      height: 100%;
      width: 300%;
      position: absolute;
      left: -100%;
      background: -webkit-linear-gradient(right, #003366, #004080, #0059b3, #0073e6);
      border-radius: 15px;
      transition: all 0.4s ease;
    }
    form .btn:hover .btn-layer {
      left: 0;
    }
    form .btn input[type="submit"] {
      height: 100%;
      width: 100%;
      z-index: 1;
      position: relative;
      background: none;
      border: none;
      color: #fff;
      padding-left: 0;
      border-radius: 15px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
    }
    .message {
      text-align: center;
      color: white;
      margin-top: -160px;
    }

    header {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center; /* Align items vertically centered */
            padding: 10px; /* Adjust padding if needed */
            width: 100%;
            box-sizing: border-box;
        }

        .logo {
            height: 70px; /* Adjust the logo size */
            margin-right: 15px; /* Add spacing between the logo and the text */
        }

        h5 {
            color: yellow;
            font-size: 19px; /* Adjust the font size of the header text */
            margin: 0; /* Remove any default margin */
        }

        .footer {
            background-color: #003366;
            color: #ffffff;
            width: 100%;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            font-size: 15px;
            padding: 5px;
        }

        
@media only screen and (max-width: 600px) {

        .logo {
            height: 50px; /* Adjust logo size for smaller screens */
        }

        h5 {
            font-size: 16px; /* Adjust font size for smaller screens */
        }

        a {
            padding: 8px 16px; /* Adjust padding for smaller screens */
            font-size: 14px; /* Adjust font size for links */
        }

        .footer {
            font-size: 13px; /* Adjust footer font size for smaller screens */
        }
        p {
            display: block;
            font-size: 9px; /* Ensures each element takes a new line */
         }

        p::before {
            content: " ";
        }

        p span {
            display: block;
            margin-bottom: 5px; /* Adjust spacing as needed */
        }
}
  </style>
</head>
<body>

    <header>
        <img src="gujaratuniversity.png" alt="Logo" class="logo">
        <h5>Gujarat University &MediumSpace;:&MediumSpace; &MediumSpace; Department of Computer Science</h5>
    </header>

    <div class="wrapper">
        <div class="title-text">
            <div class="title">Change Password</div>
        </div>
        <div class="form-inner">
            <form action="" method="post" onsubmit="return passmatch()">
                <div class="field">
                    <input type="password" id="oldpassword" name="oldpassword" placeholder="Old Password" required>
                </div>
                <div class="field">
                    <input type="password" id="newpassword" name="newpassword" placeholder="New Password" required>
                </div>
                <div class="field">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Change it">
                </div>
            </form>
        </div>
    </div>

    <script>
    function passmatch() {
        var oldpassword = document.getElementById("oldpassword").value;
        var newpassword = document.getElementById("newpassword").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if (oldpassword == newpassword) {
            alert("New password cannot be same as old password! try different ");
            return false;
        }
        // Check if passwords match
        if (newpassword !== confirm_password) {
            alert("Confirm Password Not Match");
            return false;
        }

        // Function to check if value contains only spaces
        function containsOnlySpaces(value) {
            return /^\s*$/.test(value);
        }

        // Check if password contains only spaces
        if (containsOnlySpaces(newpassword)) {
            alert("Password cannot contain only spaces.");
            return false;
        }

        // Check if password contains any spaces
        if (/\s/.test(newpassword)) {
            alert("Password cannot contain spaces.");
            return false;
        }

        return true;
    }
</script>


    <footer class="footer">
        <p>
            <span>Copyright &copy; 2024 Manan Patel. All Rights Reserved. </span>
            <span> - Under guidance of Dr. Hiren Joshi</span>
        </p>
    </footer>
</body>
</html>

<?php
    require("database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldpassword = $connection->real_escape_string($_POST["oldpassword"]);
    $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);


    $username = $_SESSION['usernames'];

    $stmt = $connection->prepare('SELECT passwords FROM userss WHERE usernames = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);

    if ($stmt->fetch() && password_verify($oldpassword, $hashed_password)) {
        $stmt2 = $connection->prepare('UPDATE userss SET passwords = ? WHERE usernames = ?');
        $stmt2->bind_param('ss', $newpassword, $username);

        if ($stmt2->execute()) {
            header('Location: signlog.php?message=Password change successfully! please re-login');
            exit();
        } else {
            echo 'Error: ' . $stmt2->error;
        }
    } else {
        echo "<p class='message'>Invalid old password.</p>";
    }
}

ob_end_flush(); // Flush the output buffer
?>
