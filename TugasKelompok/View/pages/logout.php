<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: loginpage.php");
    exit;

    // if (isset($_POST['logout'])) {
    //     session_destroy();
    //     header("Location: loginpage.php");
    //     exit();
    // }
?>