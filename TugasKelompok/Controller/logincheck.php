<?php
    session_start();
    require 'config.php';
    if ($_SESSION['login'] !== true) {
        header("Location: loginpage.php");
    }
?>