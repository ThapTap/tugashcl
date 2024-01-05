<?php
session_start();
require 'config.php';
require "./connection.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $_SESSION["error_message"] = "Username can only contain letters and numbers.";
        $_SESSION['error'] = true;
        header("Location: ../View/pages/loginpage.php");
        exit;
    }

    $query = "SELECT * FROM doctor WHERE username=?;";
    $statement = $conn->prepare($query);

    if ($statement) {

        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result();

        // Account Check
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                session_regenerate_id(true);
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['DocName'] = $row['DocName'];
                $_SESSION['id'] = $row['ID'];

                // Bind the session to the user's IP and User-Agent
                $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

                header("Location: ../View/pages/home.php");
                exit;
            } else {
                // Password is incorrect
                $_SESSION["error_message"] = "Invalid username or password";
                $_SESSION['error'] = true;

                header("Location: ../View/pages/loginpage.php");
                exit;
            }
        } else {
            // No user found 
            $_SESSION["error_message"] = "Invalid username or password";
            $_SESSION['error'] = true;

            header("Location: ../View/pages/loginpage.php");
            exit;
        }

        $statement->close();
    } else {
        // SQL statement preparation failed
        echo "Failed to prepare the SQL statement.";
    }

    $conn->close();
}
?>