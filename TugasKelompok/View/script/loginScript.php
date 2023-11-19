<?php
    session_start();
    require "../Utils/connection.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username=? AND password=?;";
        $statement = $db->prepare($query);
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        $result = $statement->get_result();
        $db->close();

        if ($result->num_rows === 1){
            $row = $result->fetch_assoc();
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['DocName'] = $row['DocName'];
            $_SESSION['id'] = $row['id'];

            header("Location: ../messages.php");
    
        }
        else {
            $_SESSION["error_message"] = "Login Failed!";
            $_SESSION['error'] = true;

            header("Location: ../login.php");
        }

    }
?>