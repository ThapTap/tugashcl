<?php 
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

// Bind session to IP and User-Agent
if (!isset($_SESSION['user_ip']) && !isset($_SESSION['user_agent'])) {
    $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
}

// Check for session hijacking attempt
if ($_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR'] || 
    $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
    $_SESSION = array(); 
    session_destroy(); 
    setcookie(session_name(), '', time() - 42000, '/'); // Clear the session cookie
    header('Location: loginpage.php'); 
    exit;
}
?>