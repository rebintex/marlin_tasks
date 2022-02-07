<?php 

session_start();
require "database.php";


if($_POST) {

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    

    $statement = $conn->prepare('SELECT * FROM users2 WHERE `email` = :email');
    $statement->execute(['email' => $email]);
    $copy = $statement->fetch(PDO::FETCH_ASSOC);

    if(!empty($copy)) {
        $message = "Email address is already exists in the database";
        $_SESSION['message'] = $message;

        header("location: /task_11.php");
        die;
    }
    
    $sql = "INSERT INTO users2 (email, password) VALUES (:email, :password)";
    $statement = $conn->prepare($sql);
    $statement->execute(['email' => $email, 'password' => $password]);

    header("location: /task_11.php"); 
}

