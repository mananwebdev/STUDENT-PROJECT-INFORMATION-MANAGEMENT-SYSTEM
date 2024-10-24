<?php
session_start();

if (isset($_SESSION['inputsuccess'])) {
    $inputsuccess = $_SESSION['inputsuccess'];
    if ($inputsuccess == 1) {
        header('Location: welcome.php?message=You Already Inserted Data');
        exit();
    }
}

if (isset($_SESSION['pid'])) {
    header('Location: welcome.php?message=You Already Inserted Data');
    exit();
}
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
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        h3 {
            text-align: center;
            margin-top: 135px;
            margin-bottom: -8px;
            color: #444;
            font-size: 2em;
        }
        form {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px blue;
            margin-bottom: 20px;
        }
        label, p {
            font-size: 1em;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            font-size: 1em;
            color: white;
            background-color: green;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: blue;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .checkbox-group label {
            width: 45%;
            margin: 5px 0;
        }
        header {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            padding: 13px;
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
            bottom: 0;
            left: 0;
            font-size: 15px;
            padding: 1px;
        }
        @media (max-width: 600px) {
            h3 {
                margin-top: 110px;
                font-size: 1.18em;
            }
            label, p {
                font-size: 1em;
            }
            input[type="text"], input[type="number"], select, textarea, input[type="submit"] {
                font-size: 1em;
            }
            .checkbox-group label {
                width: 100%;
            }
            .logo {
                height: 50px;
            }
            h5 {
                font-size: 16px;
            }
            .footer {
                font-size: 9px;
            }
            p {
                display: block;
            }
            p.foot {
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

    <h3>Welcome! Please fill accurate details.</h3><br><br>

    <form id="projectForm" action="form.php" method="post" onsubmit="return validateinput()">
        <select name="teamsize" id="teamsize" required onchange="updateFields()">
            <option value="">Team-size</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> <br><br>

        
        <div id="dynamicFields"></div>

        <select name="course" required>
            <option value="">Select course</option>

            <?php require("course_drop.php") ?>
        </select> <br><br>

        <p>Year of submission:</p>
        <input type="number" name="year" placeholder="Enter project submission year like - 2024" min="1900" max="9999" required><br><br>

        <p>Enter Project definition:</p>
        <textarea id="validate" name="defination" placeholder="Like - student management, product management etc.." required></textarea>
        <br><br>

        <p>Select Technologies you use:</p>
        
        <div class="checkbox-group" required>
            <?php
            require("database.php");

            $technologies = "select Technologies_Name from technologies order by Technologies_Name asc";
            $technologies_res = mysqli_query($connection, $technologies);

            if ($technologies_res) {
                foreach ($technologies_res as $row) {
                    foreach ($row as $technologiesName) {
                        echo "<label><input type='checkbox' name='tech[]' value='{$technologiesName}'> {$technologiesName}<br></label>";
                    }
                }
            }
            ?>
        </div>
        <p id="error-message" style="color: red;"></p>

        <select name="mentor" required>
            <option value="">Select Your Mentor</option>

            <?php require("mentor_drop.php") ?>

        </select> <br><br>

        <input type="submit" value="Submit"><br><br><br>

        <script>
            function updateFields() {
                var teamsize = document.getElementById("teamsize").value;
                var dynamicFieldsDiv = document.getElementById("dynamicFields");

                
                dynamicFieldsDiv.innerHTML = "";

                
                for (var i = 1; i <= teamsize; i++) {
                    var fnameInput = document.createElement("input");
                    fnameInput.type = "text";
                    fnameInput.name = "students[fname][]" + i;
                    fnameInput.placeholder = "Student " + i + " Name";
                    fnameInput.required = true;

                    var lnameInput = document.createElement("input");
                    lnameInput.type = "text";
                    lnameInput.name = "students[lname][]" + i;
                    lnameInput.placeholder = "Student " + i + " Surname";
                    lnameInput.required = true;

                    var rollInput = document.createElement("input");
                    rollInput.type = "number";
                    rollInput.name = "students[roll][]" + i;
                    rollInput.placeholder = "Student " + i + " Roll No.";
                    rollInput.required = true;

                    dynamicFieldsDiv.appendChild(fnameInput);
                    dynamicFieldsDiv.appendChild(lnameInput);
                    dynamicFieldsDiv.appendChild(rollInput);
                    dynamicFieldsDiv.appendChild(document.createElement("br"));
                    dynamicFieldsDiv.appendChild(document.createElement("br"));
                }
            }

            
            document.getElementById('projectForm').addEventListener('submit', function(event) {
                
                var checkboxes = document.querySelectorAll('input[type="checkbox"][name="tech[]"]');
                var checked = false;

                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        checked = true;
                    }
                });

                if (!checked) {
                    event.preventDefault();
                    document.getElementById('error-message').textContent = 'Please select at least one technology.';
                } else {
                    document.getElementById('error-message').textContent = '';
                }

                
                var namePattern = /^[A-Za-z]+$/;
                var inputs = document.querySelectorAll('input[type="text"][name^="students[fname]"], input[type="text"][name^="students[lname]"]');
                inputs.forEach(function(input) {
                if (!namePattern.test(input.value)) {
                    event.preventDefault();
                    alert("Please enter a valid name and surname containing only alphabetic characters.");
                    return false;
                }
            });
        });


        function validateinput() {
        const text = document.getElementById("validate").value;

        function containsOnlySpaces(value) {
            return /^\s*$/.test(value);
        }
        if (containsOnlySpaces(text)) {
            alert("Definition cannot contain only spaces.");
            return false;
        }
        return true;
    }
    </script>
</form>

<footer class="footer">
    <p id="foot">
        <span>&copy; 2024 Manan Patel. All Rights Reserved.</span>
        <span>- Under guidance of Dr. Hiren Joshi</span>
    </p>
</footer>

</body>
</html>
