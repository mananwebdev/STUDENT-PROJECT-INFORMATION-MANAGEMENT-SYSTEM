<?php

            require("database.php");

            $mentors = "select Mentor_Name from mentors";

            $ment_res = mysqli_query($connection,$mentors);

            if ($ment_res) {
                foreach ($ment_res as $row) {
                    foreach ($row as $mentName) {
                        echo "<option value='{$mentName}'>{$mentName}</option>";
                    }
                }
            }
            

        ?>