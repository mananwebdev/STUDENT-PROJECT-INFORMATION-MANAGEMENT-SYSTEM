<?php

$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$database = 'studentproject'; 

date_default_timezone_set('Asia/Kolkata'); 


$backupFile = 'backup-' . date('d-m-Y-h-i-s') . '.sql';


$command = "C:/xampp/mysql/bin/mysqldump --opt --host=$host --user=$user --password=$password $database > $backupFile";


system($command, $returnVar);

if ($returnVar === 0) {


    require("database.php");
    $stmt = $connection->prepare("INSERT INTO db_backup_files (file_name) VALUES (?)");
    $stmt->bind_param("s", $backupFile);
    $stmt->execute();

    header("Location: admin_crud.php?addmessage=Backup Database Successfully! File: $backupFile");
    exit();

} else {
    echo "Backup failed";
}
?>
