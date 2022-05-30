<!DOCTYPE html>
<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo "<li><a href='../backend/logout.php'>Log out</a></li>";
        exit();

    }
    else{
        header("location: ../login_menu.php");
        exit();
    }
?>
