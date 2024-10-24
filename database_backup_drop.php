<?php

require("database.php");

$qrry = "SELECT file_name FROM db_backup_files ORDER BY file_id DESC";

$db_backup_files_res = mysqli_query($connection, $qrry);

if ($db_backup_files_res) {
    
    while ($row = mysqli_fetch_assoc($db_backup_files_res)) {
       
        $file_name = $row['file_name'];
        echo "<option value='{$file_name}'>{$file_name}</option>";
    }
}

?>
