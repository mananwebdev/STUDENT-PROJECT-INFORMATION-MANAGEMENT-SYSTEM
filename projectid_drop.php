<?php

            require("database.php");

            $pids = "select pid from project_data order by pid desc";

            $pids_res = mysqli_query($connection,$pids);

            if ($pids_res) {
                foreach ($pids_res as $row) {
                    foreach ($row as $projectid) {
                        echo "<option value='{$projectid}'>{$projectid}</option>";
                    }
                }
            }
            

        ?>