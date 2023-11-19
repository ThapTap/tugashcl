<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../styles/register.css">
</head>

<body>
    <div class="container">
        <div class="left-section">
            <img src="../assets/medi-logo1.png" alt="Descriptive Text for Image" class="left-image">
            <h1>Join Us!</h1>
            <p>Manage Your Patients' Medical Record in a single click!</p>
        </div>
        <div class="right-section">
            <?php 
            if (isset($_POST["submit"])) {
                $fullName = $_POST["fullName"];
                $username = $_POST["username"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirmPassword"];

                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();

                if (empty($fullName) OR empty($username) OR empty($phone) OR empty($email) OR empty($password)
                OR empty($confirmPassword)) {
                    array_push($errors, "All fields are required");
                }

                if (!filter_var ($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }

                if (strlen($password) < 8){
                    array_push($errors, "Password must be at least 8 characters long");
                }

                if ($password!=$confirmPassword) {
                    array_push($errors, "Password doest not match");
                }

                if (count($errors) > 0){
                    foreach($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    require_once "../Utils/connection.php";
                    $sql = "INSERT INTO doctor (DocName, username, DocPhoneNumber, DocEmail, password) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    if($stmt) {
                        $stmt->bind_param("sssss", $fullName, $username, $phone, $email, $passwordHashed);
                        $stmt->execute();

                        if ($stmt->affected_rows > 0) {
                            echo "<div class='alert alert-success'> User Registered Successfully. </div>";
                            header("Location: loginpage.php");
                            exit;
                        } else {
                            echo "<div class='alert alert-danger'>Error: User registration failed.</div>";
                        }

                        $stmt->close();
                    } else {
                        echo "<div class='alert alert-danger'>Error: Could not prepare the statement.</div>";
                    }
                }
            }
            ?>
            <h2>Set Up Your Account</h2>
            <form class="register-container" action="register.php" method="post">
                <div class="form-group">
                    <label for="fullName">Full Name*</label>
                    <input type="text" name="fullName" id="fullName" placeholder="Enter Your Full Name" value="<?php echo isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="username">Username*</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number*</label>
                    <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password*</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password" value="<?php echo isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : ''; ?>">
                </div>

                <div class="form-group terms">
                    <p>By creating an account, you agree to our <a href="terms_and_conditions_url">Terms & Conditions</a>.</p>
                </div>

                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Sign Up" name="submit">
                </div>
            </form>
            <div class="signin-redirect">
                Already have an account? <a href="loginpage.php">Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>