<?php 
session_start();

$_SESSION['counter'] = ((isset($_SESSION['counter'])) ? $_SESSION['counter'] : 0);
if(isset($_POST['submit'])){
     $_SESSION['counter']++;
}
//var_dump();
header("location: /task_13.php");