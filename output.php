<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" no-cache>
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
            padding:20px 20px 0px 20px;
        }

        
        h4 {
            text-align: center;
            color: #4444FF;
            font-size: 2.1em;
            margin-bottom: 20px;
            margin-top: 100px;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 13px blue;
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

        
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filters label {
            font-weight: bold;
        }

        .filters select, .filters input[type="text"], .filters input[type="number"] {
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .filters select:focus, .filters input[type="text"]:focus, .filters input[type="number"]:focus {
            border-color: #4444FF;
            outline: none;
        }

        .filters select, .filters input[type="number"] {
            width: 180px;
        }
        select{
            width: 180px;
            border-color: #4444FF;
            outline: none;
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: all 0.3s;   
        }
        input[type="submit"]{
            width: 110px;
            padding: 8px;
            background: red;
            color: white;
            border: 1px;
            border-radius: 2px;
        }

        .filters input[type="text"] {
            width: 250px;
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
            position: bottom;
            bottom: 0;
            left: 0;
            font-size: 15px;
            padding: 12px 0;
        }

        @media (max-width: 768px) {
            .filters select, .filters input[type="text"], .filters input[type="number"] {
                width: 100%;
            }
            table, th, td {
                font-size: 0.8em;
            }

            ol {
                font-size: 0.85em;
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
            input[type="submit"]{  
                display: block;
                width: 100%;
                text-align: center;
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

        
        #exportLink {
            display: inline-block;
            padding: 8px;
            font-size: 1em;
            color: blue;
            background-color: yellow;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        #exportLink:hover {
            background-color: lightgreen;
        }

        
        @media (max-width: 576px) {
            h4 {
                font-size: 1.2em;
            }

            table {
                font-size: 0.9em;
            }

            .filters select, .filters input[type="text"], .filters input[type="number"] {
                font-size: 0.9em;
            }

            #exportLink {
                display: block;
                width: 100%;
                text-align: center;
            }
        }
    </style>
    <script>
        let currentSortColumn = null;
        let currentSortOrder = null;

        function filterTable() {
            const teamSize = document.getElementById('teamSizeFilter').value;
            const course = document.getElementById('courseFilter').value;
            const technologies = document.getElementById('technologiesFilter').value;
            const startDate = document.getElementById('startYearFilter').value;
            const endDate = document.getElementById('endYearFilter').value;
            const definitionSearch = document.getElementById('definitionSearch').value.toLowerCase();
            const mentor = document.getElementById('mentorFilter').value;

            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const teamSizeCell = rows[i].getElementsByTagName('td')[1];
                const courseCell = rows[i].getElementsByTagName('td')[4];
                const technologiesCell = rows[i].getElementsByTagName('td')[6];
                const yearCell = rows[i].getElementsByTagName('td')[8];
                const definitionCell = rows[i].getElementsByTagName('td')[5];
                const mentorCell = rows[i].getElementsByTagName('td')[7];

                let showRow = true;

                if (teamSize !== 'all' && teamSizeCell.innerText !== teamSize) {
                    showRow = false;
                }
                if (course !== 'all' && courseCell.innerText !== course) {
                    showRow = false;
                }
                if (technologies !== 'all' && !technologiesCell.innerText.includes(technologies)) {
                    showRow = false;
                }
                if (startDate && endDate) {
                    const year = parseInt(yearCell.innerText);
                    const startYear = parseInt(startDate.split('-')[0]);
                    const endYear = parseInt(endDate.split('-')[0]);
                    if (year < startYear || year > endYear) {
                        showRow = false;
                    }
                }
                if (mentor !== 'all' && mentorCell.innerText !== mentor) {
                    showRow = false;
                }
                if (definitionSearch && !definitionCell.innerText.toLowerCase().includes(definitionSearch)) {
                    showRow = false;
                }

                rows[i].style.display = showRow ? '' : 'none';
            }

            updateExportLink();
        }

        function sortTable(columnIndex, ascending) {
            const table = document.getElementById('dataTable');
            const rows = Array.from(table.getElementsByTagName('tr')).slice(1);
            const sortedRows = rows.sort((a, b) => {
                const aText = a.getElementsByTagName('td')[columnIndex].innerText;
                const bText = b.getElementsByTagName('td')[columnIndex].innerText;
                return ascending ? aText.localeCompare(bText) : bText.localeCompare(aText);
            });

            sortedRows.forEach(row => table.appendChild(row));

            currentSortColumn = columnIndex;
            currentSortOrder = ascending ? 'asc' : 'desc';

            updateExportLink();
        }

        function updateExportLink() {
            const teamSize = document.getElementById('teamSizeFilter').value;
            const course = document.getElementById('courseFilter').value;
            const technologies = document.getElementById('technologiesFilter').value;
            const startDate = document.getElementById('startYearFilter').value;
            const endDate = document.getElementById('endYearFilter').value;
            const definitionSearch = document.getElementById('definitionSearch').value.toLowerCase();
            const mentor = document.getElementById('mentorFilter').value;

            const exportLink = document.getElementById('exportLink');
            let href = `pdf.php?teamSize=${teamSize}&course=${course}&technologies=${technologies}&startDate=${startDate}&endDate=${endDate}&definitionSearch=${definitionSearch}&mentor=${mentor}`;

            if (currentSortColumn !== null && currentSortOrder !== null) {
                href += `&sortColumn=${currentSortColumn}&sortOrder=${currentSortOrder}`;
            }

            exportLink.href = href;
        }

        function confirmdelete(){
            return confirm("Are you sure you want to delete?");
            return false;
        }
    </script>
</head>
<body>

    <header>
        <img src="gujaratuniversity.png" alt="Logo" class="logo">
        <h5>Gujarat University &MediumSpace;:&MediumSpace; &MediumSpace; Department of Computer Science</h5>
    </header>

    <h4>Welcome! Find Records </h4>
<hr><br>
    <form action="pdf.php" method="post">
        <div class="filters">
            <label for="teamSizeFilter">Team Size:</label>
            <select id="teamSizeFilter" onchange="filterTable()">
                <option value="all">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <label for="courseFilter">Course:</label>
            <select id="courseFilter" onchange="filterTable()">
                <option value="all">All</option>
                <?php require("course_drop.php") ?>
            </select>

            <label for="technologiesFilter">Technologies:</label>
            <select id="technologiesFilter" onchange="filterTable()">
                <option value="all">All</option>
                <?php require("technologies_drop.php") ?>
            </select>

            <label for="startYearFilter">Start Year:</label>
            <input type="number" id="startYearFilter" onchange="filterTable()" placeholder="Start Year..">

            <label for="endYearFilter">End Year:</label>
            <input type="number" id="endYearFilter" onchange="filterTable()" placeholder="End Year..">
            
            <label for="definitionSearch">Definition:</label>
            <input type="text" id="definitionSearch" onkeyup="filterTable()" placeholder="Search for definitions..">

            <label for="mentorFilter">Mentor:</label>
            <select id="mentorFilter" onchange="filterTable()">
                <option value="all">All</option>
                <?php require("mentor_drop.php") ?>
            </select>
        </div>
    </form>
    <hr>


    <a id="exportLink" href="pdf.php" target="_blank">Export in PDF</a><br><br>
    
    <form action="delete_records.php" method="post" onsubmit="return confirmdelete()">
        <label for="DeleteRecord" style="color:red;"><b>Delete Record:</b></label>
        <select id="DeleteRecord" name="project_id" required>
                <option value="">Select Project ID</option>
                <?php require("projectid_drop.php") ?>
            </select>
        <input type="submit" value="Delete Record">
    </form>
    <br><hr>
    <br><br>

    

    <?php
    include("database.php");

    $q1 = "SELECT project_data.pid, teamsize, name, roll, course, defination, technologies, mentor, year 
    FROM student_data JOIN project_data on student_data.pid = project_data.pid
    order by project_data.pid DESC;";

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

    echo "<table id='dataTable'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Project ID</th>";
    echo "<th>Team Size</th>";
    echo "<th>Student Name</th>";
    echo "<th>Roll No.</th>";
    echo "<th>Course <button onclick='sortTable(4, true)'>&#9650;</button><button onclick='sortTable(4, false)'>&#9660;</button></th>";
    echo "<th>Definition</th>";
    echo "<th>Technologies</th>";
    echo "<th>Mentor <button onclick='sortTable(7, true)'>&#9650;</button><button onclick='sortTable(7, false)'>&#9660;</button></th>";
    echo "<th>Year <button onclick='sortTable(8, true)'>&#9650;</button><button onclick='sortTable(8, false)'>&#9660;</button></th>";
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
    ?>


    <footer class="footer">
        <p>
            <span>Copyright &copy; 2024 Manan Patel. All Rights Reserved. </span>
            <span> - Under guidance of Dr. Hiren Joshi</span>
        </p>
    </footer>
</body>
</html>
