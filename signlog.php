<?php

session_start();



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
    .message {
      text-align: center;
      color: white;
      margin-top: -70px;
      
    }
    .wrapper {
      overflow: hidden;
      max-width: 390px;
      margin-top: -75px;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
    }
    .wrapper .title-text {
      display: flex;
      width: 200%;
    }
    .wrapper .title {
      width: 50%;
      font-size: 35px;
      font-weight: 600;
      text-align: center;
      transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
    }
    .wrapper .slide-controls {
      position: relative;
      display: flex;
      height: 50px;
      width: 100%;
      overflow: hidden;
      margin: 30px 0 10px 0;
      justify-content: space-between;
      border: 1px solid lightgrey;
      border-radius: 15px;
    }
    .slide-controls .slide {
      height: 100%;
      width: 100%;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      text-align: center;
      line-height: 48px;
      cursor: pointer;
      z-index: 1;
      transition: all 0.6s ease;
    }
    .slide-controls label.signup {
      color: #000;
    }
    .slide-controls .slider-tab {
      position: absolute;
      height: 100%;
      width: 50%;
      left: 0;
      z-index: 0;
      border-radius: 15px;
      background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
      transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
    }
    input[type="radio"] {
      display: none;
    }
    #signup:checked ~ .slider-tab {
      left: 50%;
    }
    #signup:checked ~ label.signup {
      color: #fff;
      cursor: default;
      user-select: none;
    }
    #signup:checked ~ label.login {
      color: #000;
    }
    #login:checked ~ label.signup {
      color: #000;
    }
    #login:checked ~ label.login {
      cursor: default;
      user-select: none;
    }
    .wrapper .form-container {
      width: 100%;
      overflow: hidden;
    }
    .form-container .form-inner {
      display: flex;
      width: 200%;
    }
    .form-container .form-inner form {
      width: 50%;
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
    .form-inner form .signup-link {
      text-align: center;
      margin-top: 30px;
    }
    .form-inner form .pass-link a,
    .form-inner form .signup-link a {
      color: #1a75ff;
      text-decoration: none;
    }
    .form-inner form .pass-link a:hover,
    .form-inner form .signup-link a:hover {
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
    
    #content {
    opacity: 0;
    animation: fadeIn 1s forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

header {
    display: flex;
    margin-top: -70px;
    align-items: center; 
    padding: 20px; 
    width: 100%;
    box-sizing: border-box;
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
            background-color: #003366;
            color: #ffffff;
            width: 100%;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            padding: 5px;
            font-size: 15px;

}

@media only screen and (max-width: 600px) {

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
        <h5>Gujarat University &MediumSpace;:&MediumSpace; &MediumSpace;Department of Computer Science</h5>
    </header>

    <?php if (isset($_GET['message'])): ?>
    <div class="message"><?php echo htmlspecialchars($_GET['message']); ?></div>
  <?php endif; ?>

  <div class="wrapper" id="content">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Registration</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Register</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <!-- Login form -->
        <form action="login.php" method="post" class="login" onsubmit="return validateLoginForm()">
          <div class="field">
            <input type="email" name="logusernames" placeholder="Enter email id" required>
          </div>
          <div class="field">
            <input type="password" name="logpasswords" placeholder="Password" required>
          </div>

          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="">Register now</a></div>
        </form>

        <!-- Signup form -->
        <form action="signup.php" method="post" class="signup" onsubmit="return validateSignupForm()">
          <div class="field">
            <input type="email" name="usernames" placeholder="Enter email id" required>
          </div>
          <div class="field">
            <input type="password" id="passwords" name="passwords" placeholder="Set Password" required>
          </div>
          <div class="field">
            <input type="password" id="cnfpasswords" name="cnfpasswords" placeholder="Confirm Password" required>
            </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Register">
          </div>
        </form>
      </div>
    </div>
  </div>
  


  <script>
  const loginText = document.querySelector(".title-text .login");
  const loginForm = document.querySelector("form.login");
  const loginBtn = document.querySelector("label.login");
  const signupBtn = document.querySelector("label.signup");
  const signupLink = document.querySelector("form .signup-link a");

  signupBtn.onclick = () => {
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
  };

  loginBtn.onclick = () => {
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
  };

  signupLink.onclick = () => {
    signupBtn.click();
    return false;
  };

  function passmatch() {
    var newpassword = document.getElementById("passwords").value;
    var confirm_password = document.getElementById("cnfpasswords").value;

    if (newpassword !== confirm_password) {
      alert("Confirm Password Not Match");
      return false;
    }
    return true;
  }

  function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
  }

  function containsOnlySpaces(value) {
    return /^\s*$/.test(value);
  }

  function validateSignupForm() {
    const email = document.querySelector("input[name='usernames']").value;
    const password = document.querySelector("input[name='passwords']").value;
    const confirmPassword = document.querySelector("input[name='cnfpasswords']").value;

    if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      return false;
    }
    
    if (containsOnlySpaces(email) || containsOnlySpaces(password)) {
      alert("Username and password cannot contain only spaces.");
      return false;
    }
    
    if (/\s/.test(email) || /\s/.test(password)) {
      alert("Username and password cannot contain spaces.");
      return false;
    }

    return passmatch();
  }

  function validateLoginForm() {
    const email = document.querySelector("input[name='logusernames']").value;
    const password = document.querySelector("input[name='logpasswords']").value;

    if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      return false;
    }

    if (containsOnlySpaces(email) || containsOnlySpaces(password)) {
      alert("Username and password cannot contain only spaces.");
      return false;
    }

    if (/\s/.test(email) || /\s/.test(password)) {
      alert("Username and password cannot contain spaces.");
      return false;
    }

    return true;
  }

  document.querySelector("form.signup").onsubmit = validateSignupForm;
  document.querySelector("form.login").onsubmit = validateLoginForm;
</script>




<footer class="footer">
        <p>
            <span>Copyright &copy; 2024 Manan Patel. All Rights Reserved.   </span>
            <span> - Under guidance of Dr. Hiren Joshi</span>
        </p>
</footer>

</body>
</html>

