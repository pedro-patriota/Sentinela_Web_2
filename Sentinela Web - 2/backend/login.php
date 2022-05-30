<?php
session_start();

if(isset($_POST["submit"])){
    #header("location: ../index.html"); // dashboard page
    $username = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once "config.php";
    require_once "functions.php";

    if (emptyInputLogin($username, $pwd) !== false){
        header("location: ../login_menu.php?error=emptyinput");
        exit();
    }
    

    loginUser($link, $username, $pwd);
}
else{
    header("location: ../login_menu.php");
    exit();
}

?>