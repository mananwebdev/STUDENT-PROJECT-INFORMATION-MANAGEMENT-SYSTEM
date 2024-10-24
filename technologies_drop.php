<?php

            require("database.php");

            $technologies = "select Technologies_Name from technologies ORDER BY Technologies_Name asc";

            $technologies_res = mysqli_query($connection,$technologies);

            if ($technologies_res) {
                foreach ($technologies_res as $row) {
                    foreach ($row as $technologiesName) {
                        echo "<option value='{$technologiesName}'>{$technologiesName}</option>";
                    }
                }
            }
            

        ?>