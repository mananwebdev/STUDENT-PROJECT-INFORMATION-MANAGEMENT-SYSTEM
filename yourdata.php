
<?php
session_start();

if (isset($_SESSION['inputsuccess'])) {
    $inputsuccess = $_SESSION['inputsuccess'];
    if ($inputsuccess == 0) {
        header('Location: welcome.php?message=You have not inserted any data!');
        exit();
    }
}
if (!isset($_SESSION['pid'])) {
    header('Location: welcome.php?message=You have not inserted any data!');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <header>
        <img src="gujaratuniversity.png" alt="Logo" class="logo">
        <h5>Gujarat University &MediumSpace;:&MediumSpace; &MediumSpace; Department of Computer Science</h5>
    </header>
</body>
</html>

<?php
include("database.php");



$usr_id = $_SESSION['usr_id'];

$q1 = "SELECT project_data.pid, teamsize, name, roll, course, defination, technologies, mentor, year 
FROM student_data 
JOIN project_data on student_data.pid = project_data.pid 
JOIN userss on project_data.pid = userss.pid 
WHERE userss.usr_id = '$usr_id'";

$res1 = mysqli_query($connection, $q1);

$grouped_data = [];

while ($row = mysqli_fetch_assoc($res1)) {
    $pid = $row["pid"];
    if (!isset($grouped_data[$pid])) {
        $grouped_data[$pid] = [
            "teamsize" => $row["teamsize"],
            "names" => [],
            "rolls" => [],
            "course" => $row["course"],
            "defination" => $row["defination"],
            "technologies" => $row["technologies"],
            "mentor" => $row["mentor"],
            "year" => $row["year"]
        ];
    }
    $grouped_data[$pid]["names"][] = $row["name"];
    $grouped_data[$pid]["rolls"][] = $row["roll"];
}

echo "<br><br>";

echo "<table id='dataTable'>";
echo "<thead>";
echo "<tr>";
echo "<th>Project ID</th>";
echo "<th>Team Size</th>";
echo "<th>Student Name</th>";
echo "<th>Roll No.</th>";
echo "<th>Course</th>";
echo "<th>Definition</th>";
echo "<th>Technologies</th>";
echo "<th>Mentor</th>";
echo "<th>Year</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($grouped_data as $pid => $data) {
    echo "<tr>";
    echo "<td>{$pid}</td>";
    echo "<td>{$data['teamsize']}</td>";
    echo "<td>";
    echo "<ol>";
    foreach ($data['names'] as $name) {
        echo "<li>{$name}</li>";
    }
    echo "</ol>";
    echo "</td>";
    echo "<td>";
    echo "<ol>";
    foreach ($data['rolls'] as $roll) {
        echo "<li>{$roll}</li>";
    }
    echo "</ol>";
    echo "</td>";
    echo "<td>{$data['course']}</td>";
    echo "<td>{$data['defination']}</td>";
    echo "<td>{$data['technologies']}</td>";
    echo "<td>{$data['mentor']}</td>";
    echo "<td>{$data['year']}</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
if (isset($pid)) {
    $_SESSION['pid'] = $pid;
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
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
        }

        h3 {
            margin: 20px 0;
            font-size: 1.5em;
        }

        table {
            margin-top: 130px;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 1.5px 8px blue;
        
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        ol {
            margin: 0;
            padding-left: 20px;
            list-style-position: inside;
            font-size: 0.9em;
            max-height: 100px;
            overflow-y: auto;
        }

        li {
            word-wrap: break-word;
        }

        form {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 3.5px 8px blue;
            border-radius: 8px;
        }

        form p {
            margin-bottom: 10px;
            font-weight: bold;
        }

        form textarea, 
        form input[type="text"], 
        form input[type="number"], 
        form input[type="submit"], 
        form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
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

        .forms {
            padding: 20px;
        }

        form input[type="submit"] {
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 0.8em;
            }
            h3 {
                margin: 15px 0;
                font-size: 1.2em;
            }
            ol {
                font-size: 0.85em;
            }
            .footer {
                font-size: 9px; /* Adjust footer font size for smaller screens */
            }
            p {
                display: block;
            }
            #foot {
                font-size: 9px;
            }
            p::before {
                content: " ";
            }
            p span {
                display: block;
                margin-bottom: 5px; /* Adjust spacing as needed */
            }
        }

        @media (max-width: 576px) {
            table, th, td {
                font-size: 0.7em;
                padding: 8px;
            }

            form {
                padding: 10px;
            }

            form textarea, form input, form select {
                padding: 8px;
                margin: 8px 0;
            }

            .checkbox-group label {
                width: 100%;
            }

            .checkbox-group {
                flex-direction: column;
            }
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
            bottom: 0;
            left: 0;
            font-size: 15px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="forms">
    <br><br><br>
    <h3>Update project details If you needed:</h3><br>
    <h3 style="color:red;">First discuss with your mentor and then update details below</h3><br><br>

    <form action="updatedefination.php" method="post"  onsubmit="return validateinput()">
        <p>Update Definition:</p>
        <textarea id="validate" name="updatedefination" placeholder="Enter New Definition.." required></textarea><br>
        <input type="submit" value="Update Definition">
    </form>

    <form action="updatetechnologies.php" method="post" onsubmit="validatecheckbox()">
        <p>Update Technologies:</p>
        <div class="checkbox-group">
        <?php
        require("database.php");
        $technologies = "SELECT Technologies_Name FROM technologies order by Technologies_Name asc";
        $technologies_res = mysqli_query($connection, $technologies);
        if ($technologies_res) {
            while ($row = mysqli_fetch_assoc($technologies_res)) {
                $technologiesName = $row['Technologies_Name'];
                echo "<label><input type='checkbox' name='updatetechnologies[]' value='{$technologiesName}'> {$technologiesName}<br></label>";
            }
        }
        ?>
        </div>
        <input type="submit" value="Update Technologies">
        <p id="error-message" style="color: red;"></p>
    </form>

    <form action="updatementor.php" method="post">
        <p>Update Mentor:</p>
        <select name="updatementor" required>
            <option value="">Select New Mentor</option>
            <?php require("mentor_drop.php") ?>
        </select><br>
        <input type="submit" value="Update Mentor">
    </form>

    <form action="updatecourse.php" method="post">
        <p>Update Course:</p>
        <select name="updatecourse" required>
            <option value="">Select New Course</option>
            <?php require("course_drop.php") ?>
        </select><br>
        <input type="submit" value="Update Course">
    </form>

    <form action="updatestudent.php" method="post" id="updateStudentForm">
        <p>Update student details and teamsize:</p>
        <select name="newteamsize" id="newteamsize" required onchange="updateFields()">
            <option value="">Team-size</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <div id="dynamicFields"></div>
        <input type="submit" value="Update Student's details">
    </form>

    <script>
        function updateFields() {
            var teamsize = document.getElementById("newteamsize").value;
            var dynamicFieldsDiv = document.getElementById("dynamicFields");

            dynamicFieldsDiv.innerHTML = "";

            for (var i = 1; i <= teamsize; i++) {
                var fnameInput = document.createElement("input");
                fnameInput.type = "text";
                fnameInput.name = "students[fname][" + i + "]";
                fnameInput.placeholder = "Student " + i + " Name";
                fnameInput.required = true;

                var lnameInput = document.createElement("input");
                lnameInput.type = "text";
                lnameInput.name = "students[lname][" + i + "]";
                lnameInput.placeholder = "Student " + i + " Surname";
                lnameInput.required = true;

                var rollInput = document.createElement("input");
                rollInput.type = "number";
                rollInput.name = "students[roll][" + i + "]";
                rollInput.placeholder = "Student " + i + " Roll No.";
                rollInput.required = true;

                dynamicFieldsDiv.appendChild(fnameInput);
                dynamicFieldsDiv.appendChild(lnameInput);
                dynamicFieldsDiv.appendChild(rollInput);
                dynamicFieldsDiv.appendChild(document.createElement("br"));
                dynamicFieldsDiv.appendChild(document.createElement("br"));
            }
        }

        document.getElementById('updateStudentForm').addEventListener('submit', function(event) {
            var namePattern = /^[A-Za-z]+$/;
            var fnameInputs = document.querySelectorAll('input[name^="students[fname]"]');
            var lnameInputs = document.querySelectorAll('input[name^="students[lname]"]');
            
            fnameInputs.forEach(function(input) {
                if (!namePattern.test(input.value)) {
                    event.preventDefault();
                    alert("Please enter a valid name containing only alphabetic characters.");
                    return false;
                }
            });

            lnameInputs.forEach(function(input) {
                if (!namePattern.test(input.value)) {
                    event.preventDefault();
                    alert("Please enter a valid surname containing only alphabetic characters.");
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

        function validatecheckbox(){
            var checkboxes = document.querySelectorAll('input[type="checkbox"][name="updatetechnologies[]"]');
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
        }
    </script>
</div>

    <footer class="footer">
        <p id="foot">
            <span>&copy; 2024 Manan Patel. All Rights Reserved.</span>
            <span>- Under guidance of Dr. Hiren Joshi</span>
        </p>
    </footer>
</body>
</html>
