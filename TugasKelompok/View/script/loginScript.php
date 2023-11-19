<?php
session_start();
require "../Utils/connection.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to select the user based on the username
    $query = "SELECT * FROM doctor WHERE username=?;";
    $statement = $conn->prepare($query);

    if ($statement) {
        // Bind the username parameter and execute the query
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result();

        // Check if a user with the provided username exists
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verify if the provided password matches the hashed password
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['DocName'] = $row['DocName'];
                $_SESSION['id'] = $row['id'];

                // Redirect to the home page
                header("Location: ../pages/home.php");
                exit;
            } else {
                // Password is incorrect, set error message
                $_SESSION["error_message"] = "Invalid username or password";
                $_SESSION['error'] = true;

                // Redirect back to the login page
                header("Location: ../pages/loginpage.php");
                exit;
            }
        } else {
            // No user found with the provided username, set error message
            $_SESSION["error_message"] = "Invalid username or password";
            $_SESSION['error'] = true;

            // Redirect back to the login page
            header("Location: ../pages/loginpage.php");
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