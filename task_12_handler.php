<?php 

session_start();
require "database.php";


if($_POST) {

    $text = $_POST['text'];
    
    $_SESSION['text'] = $text;
 

    $sql = "INSERT INTO users2 (text) VALUES (:text)";
    $statement = $conn->prepare($sql);
    $statement->execute(['text' => $text]);

    header("location: /task_12.php"); 
}
