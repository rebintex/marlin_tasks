<?php 

session_start();
require "database.php";


if($_POST) {

    $text = $_POST['text'];
    $statement = $conn->prepare('SELECT * FROM text WHERE `text` = :text');
    $statement->execute(['text' => $text]);
    $copy = $statement->fetch(PDO::FETCH_ASSOC);

    if(!empty($copy)) {
        $message = "You should check in on some of those fields below.";
        $_SESSION['message'] = $message;

        header("location: /task_10.php");
        die;
    }
    
    $sql = "INSERT INTO text (text) VALUES (:text)";
    $statement = $conn->prepare($sql);
    $statement->execute(['text' => $text]);

    header("location: /task_10.php"); 
}

?>