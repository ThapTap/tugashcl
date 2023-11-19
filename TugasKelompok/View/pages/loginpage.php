<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/loginpage.css">
</head>


<body>

<div class="container-loginform-kiri">
  <img src="../assets/2doctors.png" alt="">
</div>

<div class="container-loginform-kanan">

<img src="../assets/medilog-high-resolution-logo-black-transparent.png" class="img-logo" alt="">

  <div class="login-form">
      <form action="../script/loginScript.php" method="POST">

          <div class="register">
            <p>Don't have an account yet?</p>
            <a href="register.php">Sign Up Here!</a>
          </div>

          <div class="input-box">
              <input type="text" placeholder="Username" name="username" required>
              <!-- <i class='bx bxs-user'></i> -->
          </div>

          <div class="input-box">
              <input type="password" placeholder="Password" name="password" required>
              <!-- <i class='bx bxs-lock-alt' ></i> -->
          </div>

          <div class="remember-forgot">
            <a href="#"> Forgot Password?</a>
          </div>

          <div class="btn-submit">
            <label for="login"></label>
            <input type="submit" name="login">
          </div>

          <?php
          session_start(); // Ensure session is started

          if (isset($_SESSION['error']) && $_SESSION['error'] === true) {
              echo "<p style='color: red; text-align: center; margin-top: 20px;'>" . $_SESSION["error_message"] . "</p>";
              // Clear the error message after displaying
              unset($_SESSION['error']);
              unset($_SESSION["error_message"]);
          }
          ?>

            <!-- <a href="#" class="btn-login">Login</a> -->

      </form>
  </div>

</div>




<link rel="stylesheet" href="../styles/loginpage.css">
</body>


</html>