<?php 
session_start();
require "database.php";

if($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $conn->prepare("SELECT email FROM users2 WHERE email = :email");
    $statement->execute(['email' => $email]);
    $copy = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($copy)) {
        $message = "Неверный логин или пароль";
        $_SESSION['message'] = $message;

        header("location: /task_14.php");
        die;
        
    }

    $statement = $conn->prepare("SELECT password FROM users2 WHERE password = :password");
    $statement->bindValue(':password', $password, PDO::PARAM_STR);
    $copy_p = $statement->execute();
   
    
    if(password_verify($password, $copy_p)) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    
        header("location: /task_14.php");
        die;
    }

}
