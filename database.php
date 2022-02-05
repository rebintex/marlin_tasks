<?php

$username = "root";
$password = "root";
try {
$conn = new PDO("mysql:host=localhost;dbname=marlin", $username, $password);
}
catch (PDOException $e){
    echo "Error!: " . $e->getMessage();
    die();
}


?>