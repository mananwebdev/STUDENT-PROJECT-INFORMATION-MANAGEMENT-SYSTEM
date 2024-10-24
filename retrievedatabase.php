<?php

$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'studentproject';
$retrievedatabase = $_POST["retrievedatabase"];
$backupFile = realpath($retrievedatabase); 

if (!file_exists($backupFile)) {
    die("Backup file does not exist.");
}

$command = "C:\\xampp\\mysql\\bin\\mysql --host=$host --user=$user --skip-password $database < $backupFile";

exec($command . ' 2>&1', $output, $returnVar);

if ($returnVar === 0) {
    header("Location: admin_crud.php?addmessage=Restore Database Successfully!");
    exit();
} else {
    echo "Restore failed";
    echo "<br>Command output: " . implode("\n", $output);
    echo "<br>Executed command: $command";
    var_dump($output); 
}

?>
