<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;


include("database.php");


$teamSize = $_GET['teamSize'] ?? 'all';
$course = $_GET['course'] ?? 'all';
$technologies = $_GET['technologies'] ?? 'all';
$startDate = $_GET['startDate'] ?? '';
$endDate = $_GET['endDate'] ?? '';
$definitionSearch = strtolower($_GET['definitionSearch'] ?? '');
$mentor = $_GET['mentor'] ?? 'all';
$sortColumn = $_GET['sortColumn'] ?? null;
$sortOrder = $_GET['sortOrder'] ?? null;


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


$filtered_data = array_filter($grouped_data, function($data) use ($teamSize, $course, $technologies, $startDate, $endDate, $definitionSearch, $mentor) {
    if ($teamSize !== 'all' && $data['teamsize'] != $teamSize) {
        return false;
    }
    if ($course !== 'all' && $data['course'] != $course) {
        return false;
    }
    if ($technologies !== 'all' && strpos($data['technologies'], $technologies) === false) {
        return false;
    }
    if ($startDate && $endDate) {
        $year = intval($data['year']);
        $startYear = intval(explode('-', $startDate)[0]);
        $endYear = intval(explode('-', $endDate)[0]);
        if ($year < $startYear || $year > $endYear) {
            return false;
        }
    }
    if ($mentor !== 'all' && $data['mentor'] != $mentor) {
        return false;
    }
    if ($definitionSearch && strpos(strtolower($data['defination']), $definitionSearch) === false) {
        return false;
    }
    return true;
});


if ($sortColumn !== null && $sortOrder !== null) {
    usort($filtered_data, function($a, $b) use ($sortColumn, $sortOrder) {
        $columns = ["pid", "teamsize", "names", "rolls", "course", "defination", "technologies", "mentor", "year"];
        $columnKey = $columns[$sortColumn];
        $aValue = is_array($a[$columnKey]) ? implode(', ', $a[$columnKey]) : $a[$columnKey];
        $bValue = is_array($b[$columnKey]) ? implode(', ', $b[$columnKey]) : $b[$columnKey];
        return $sortOrder === 'asc' ? strcmp($aValue, $bValue) : strcmp($bValue, $aValue);
    });
}


ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Report PDF</title>
    <style>
        
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h3 {
            text-align: center;
            color: #4A90E2;
            font-size: 2em; 
            margin-bottom: 20px;
            margin-top:50px;
            padding-bottom: 10px;
            border-bottom: 2px solid #4A90E2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 13px blue;
            table-layout: auto; 
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
            vertical-align: top;
            word-break: break-word;
            overflow: hidden;
        }

        th {
            background-color: #f7f7f7;
            color: #333;
            font-weight: bold;
            font-size: 0.9em; 
            text-align: center;
        }

        td {
            font-size: 0.8em;
        }

    

        .teamsize {
            width: 8%; 
        }

        .name {
            width: 20%;
        }

        .roll {
            width: 15%; 
        }

        .course {
            width: 15%; 
        }

        .definition {
            width: 25%;
        }

        .technologies {
            width: 15%; 
        }

        .mentor {
            width: 15%; 
        }

        .year {
            width: 10%; 
            text-align: center;
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
            font-size: 0.8em; 
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center; 
            padding: 20px; 
            width: 100%;
            box-sizing: border-box;
            background: #000e66;
        }

        h5 {
            color: yellow;
            font-size: 19px; 
            margin: 0;
        }

        .footer {
            background: #000e66;
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
            h3 {
                font-size: 1.6em; 
            }

            th, td {
                font-size: 0.7em; 
                padding: 4px; 
            }

            .definition {
                width: 30%;
            }

            .technologies {
                width: 18%; 
            }

            .year {
                width: 12%; 
            }

            h5 {
                font-size: 16px; 
            }

            .footer {
                font-size: 13px; 
            }
            p {
                display: block; 
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
        <h5>Gujarat University &MediumSpace;:&MediumSpace; &MediumSpace; Department of Computer Science</h5>
    </header>
        
    <h3>Project Report</h3>
    <?php
        date_default_timezone_set('Asia/Kolkata');
        $curdate = date('d-m-Y h:i:s');
        echo "Filtered by Team Size - {$teamSize} , Course - {$course} , Technologies - {$technologies} , 
                Year Range : {$startDate} - {$endDate} <br> Definition Search - {$definitionSearch} , Mentor - {$mentor}<br>Report as on : {$curdate}";
    ?>

    <table>
        <thead>
            <tr>
                <th class="teamsize">Team Size</th>
                <th class="name">Student Name</th>
                <th class="roll">Roll No.</th>
                <th class="course">Course</th>
                <th class="definition">Definition</th>
                <th class="technologies">Technologies</th>
                <th class="mentor">Mentor</th>
                <th class="year">Year</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filtered_data as $pid => $data): ?>
            <tr>
                
                <td class="teamsize"><?php echo htmlspecialchars($data['teamsize']); ?></td>
                <td class="name">
                    <ol>
                        <?php foreach ($data['names'] as $name): ?>
                        <li><?php echo htmlspecialchars($name); ?></li>
                        <?php endforeach; ?>
                    </ol>
                </td>
                <td class="roll">
                    <ol>
                        <?php foreach ($data['rolls'] as $roll): ?>
                        <li><?php echo htmlspecialchars($roll); ?></li>
                        <?php endforeach; ?>
                    </ol>
                </td>
                <td class="course"><?php echo htmlspecialchars($data['course']); ?></td>
                <td class="definition"><?php echo htmlspecialchars($data['defination']); ?></td>
                <td class="technologies"><?php echo htmlspecialchars($data['technologies']); ?></td>
                <td class="mentor"><?php echo htmlspecialchars($data['mentor']); ?></td>
                <td class="year"><?php echo str_pad(htmlspecialchars($data['year']), 4, '0', STR_PAD_LEFT); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <footer class="footer">
        <p>
            <span>Copyright &copy; 2024 Manan Patel. All Rights Reserved. </span>
            <span> - Under guidance of Dr. Hiren Joshi</span>
        </p>
    </footer>
</body>
</html>

<?php

$html = ob_get_clean();


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape'); 
$dompdf->render();
$dompdf->stream('project_report.pdf', ['Attachment' => 0]);
?>
