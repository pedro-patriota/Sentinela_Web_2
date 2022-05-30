<!DOCTYPE html>
<?php
    session_start(); 
?>
<?php
    if (isset($_SESSION["userid"])){
        echo "Olá, bem vindo a sua página principal" + $_SESSION["useruid"];

    }
    else{
        header("location: ../login_menu.php");
        exit();
    }
?>