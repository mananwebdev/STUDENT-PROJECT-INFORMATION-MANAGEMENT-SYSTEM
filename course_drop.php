<?php

            require("database.php");

            $courses = "select Course_Name from courses";

            $course_res = mysqli_query($connection,$courses);

            if ($course_res) {
                foreach ($course_res as $row) {
                    foreach ($row as $courseName) {
                        echo "<option value='{$courseName}'>{$courseName}</option>";
                    }
                }
            }
            

        ?>