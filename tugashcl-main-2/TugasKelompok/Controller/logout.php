<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../View/pages/loginpage.php");
    exit;
?>