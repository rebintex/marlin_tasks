<?php 
session_start();
require "database.php";

if(!empty($_POST['email']) && !empty($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $conn->prepare("SELECT email, password FROM users2 WHERE email = :email");
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_OBJ);

    if($user) {
        //var_dump($user);
        if(password_verify($password, $user->password)) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['message'] = $message;
            
            $message = "Все OK!";
            header("location: /task_14.php");
            die();

        } else {
            $message = "Неверный логин или пароль. ps_ver";
            header("location: /task_14.php");
            die();
        }
       
    }
    $message = "Неверный логин или пароль. st_ver"; 
    header("location: /task_14.php");
    die();
    // $message = "Неверный логин или пароль";
    //     $_SESSION['message'] = $message;

    //     header("location: /task_14.php");
    //     die; 
}
