<?php
session_start();
session_unset();
header("location: ../login_menu.php");
session_destroy();
?>
