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
        flex-direction: column;
        min-height: 100vh;
    }
    .wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .container {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 3.8px 8px #0073e6;
        max-width: 500px;
        width: 100%;
        margin: 30px;
        margin-top: 145px;
    }
    

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
    }
    input[type="text"]{
        padding: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
        
    }
    input[type="submit"] {
        background: #0073e6;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }
    input[type="submit"][value="Delete"] {
        background: red;
    }
    input[type="submit"][value="Retrieve now"] {
        background: brown;
    }
    input[type="submit"][value="Backup now"] {
        background: #0073e6;
    }
    .section {
        margin-bottom: 30px;
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
        color: white;
        width: 100%;
        text-align: center;
        font-size: 15px;
        padding: 0px 0;
    }
    .addmessage {
            text-align: center;
            color: blue;
        }
        .deletemessage {
            text-align: center;
            color: blue;
            
        }
    @media (max-width: 768px) {
        
        .container{
            margin-top: 100px;
             padding: 15px;
        }
        .wrapper {
            margin: 25px;
            
            
        }
        input[type="text"]{
            padding: 5px 0;
        }
        h1 {
            font-size: 20px;
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

<div class="wrapper">
    <div class="container">
        <div class="section">
        <?php if (isset($_GET['addmessage'])): ?>
        <div class="addmessage">
            <?php echo htmlspecialchars($_GET['addmessage']);
            ?>
        </div>
        <?php endif; ?>
    <?php if (isset($_GET['deletemessage'])): ?>
        <div class="deletemessage">
            <?php echo htmlspecialchars($_GET['deletemessage']);
            ?>
        </div>
        <?php endif; ?>
            <h1>Add / Delete Technologies</h1>
            <form action="add_technologies.php" method="post" onsubmit="return validateinput('validatetech')">
                <input type="text" id="validatetech" name="add_technologies" placeholder=" Add new Technologies" required>
                <input type="submit" value="Add New">
            </form><br><br>

            <form action="delete_technologies.php" method="post" onsubmit="return confirmdelete()">
                <select name="delete_technologies" required>
                    <option value="">Select Technology to Delete</option>
                    <?php require("technologies_drop.php") ?>
                </select>
                <input type="submit" value="Delete">
            </form>
        </div><br><br><br>

        <div class="section">
            <h1>Add / Delete Courses</h1>
            <form action="add_course.php" method="post" onsubmit="return validateinput('validatecourse')">
                <input type="text" id="validatecourse" name="add_course" placeholder=" Add new Course" required>
                <input type="submit" value="Add New">
            </form><br><br>

            <form action="delete_course.php" method="post" onsubmit="return confirmdelete()">
                <select name="delete_course" required>
                    <option value="">Select Course to Delete</option>
                    <?php require("course_drop.php") ?>
                </select>
                <input type="submit" value="Delete">
            </form>
        </div><br><br><br>

        <div class="section">
            <h1>Add / Delete Mentor</h1>
            <form action="add_mentor.php" method="post" onsubmit="return validateinput('validatementor')">
                <input type="text" id="validatementor" name="add_mentor" placeholder=" Add new Mentor" required>
                <input type="submit" value="Add New">
            </form><br><br>

            <form action="delete_mentor.php" method="post" onsubmit="return confirmdelete()">
                <select name="delete_mentor" required>
                    <option value="">Select Mentor to Delete</option>
                    <?php require("mentor_drop.php") ?>
                </select>
                <input type="submit" value="Delete">
            </form>
        </div><br><br><br>
        
        <div class="section">
            <h1>Database Operations</h1>
            <form action="backupdatabase.php" method="post">
                <input type="submit" value="Backup now">
            </form><br><br>

            <form action="retrievedatabase.php" method="post">
            <select name="retrievedatabase" required>
                    <option value="">Select Backup file to Retrieve</option>
                    <?php require("database_backup_drop.php") ?>
                </select>
                <input type="submit" value="Retrieve now">
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <p>
        <span>Copyright &copy; 2024 Manan Patel. All Rights Reserved.</span>
        <span>- Under guidance of Dr. Hiren Joshi</span>
    </p>
</footer>


<script>
        function confirmdelete(){
            return confirm("Are you sure you want to delete?");
            return false;
        }

        function validateinput(formId) {
            const inputField = document.getElementById(formId).value;

            function containsOnlySpaces(value) {
                return /^\s*$/.test(value);
            }
            if (containsOnlySpaces(inputField)) {
                alert("Cannot contain only spaces.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
