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


<!-- <div style="width: 1920px; height: 1024px; position: relative; background: #BBDCD3">

  <div style="width: 650px; height: 1024px; left: 0px; top: 0px; position: absolute; background: #96BCB4"></div>

  <div style="width: 188px; height: 32px; left: 828px; top: 686px; position: absolute">
    <div style="width: 141.47px; height: 32px; left: 46.53px; top: 0px; position: absolute; color: #7F7F7F; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Remember me</div>
    <div style="width: 30.32px; height: 30.32px; left: -0px; top: 1.68px; position: absolute; background: #BBDCD3; border-radius: 4px; border: 1px #3D3D3D solid"></div>
  </div>

  <div style="width: 186px; height: 19px; left: 828px; top: 607px; position: absolute; color: #4B72C2; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Forgot password?</div>

  <div style="width: 418px; height: 61px; left: 828px; top: 527px; position: absolute">
    <div style="width: 418px; height: 61px; left: 0px; top: 0px; position: absolute; background: #C9E7F2; border-radius: 4px"></div>
    <div style="width: 182px; height: 30.11px; left: 75px; top: 16px; position: absolute; color: #91ACCB; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Password</div>
    <img style="width: 29px; height: 31.66px; left: 16px; top: 15px; position: absolute" src="https://via.placeholder.com/29x32" />
    <div style="width: 45px; height: 0px; left: 59px; top: 8px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 3px #91ACCB solid"></div>
  </div>

  <div style="width: 418px; height: 61px; left: 828px; top: 441px; position: absolute">
    <div style="width: 418px; height: 61px; left: 0px; top: 0px; position: absolute; background: #C9E7F2; border-radius: 4px"></div>
    <div style="width: 182px; height: 37px; left: 75px; top: 12px; position: absolute; color: #91ACCB; font-size: 24px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Username</div>
    <img style="width: 29.86px; height: 31.37px; left: 16px; top: 15px; position: absolute" src="https://via.placeholder.com/30x31" />
    <div style="width: 45px; height: 0px; left: 59px; top: 8px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 3px #91ACCB solid"></div>
  </div>

  <div style="width: 434px; height: 54px; left: 828px; top: 387px; position: absolute">
    <div style="width: 148px; height: 54px; left: 286px; top: 0px; position: absolute; color: #4B72C2; font-size: 20px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Sign Up here!</div>
    <div style="width: 403.86px; height: 54px; left: 0px; top: 0px; position: absolute; color: #7F7F7F; font-size: 20px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Don’t have an account yet?</div>
  </div>

  <img style="width: 500px; height: 165.82px; left: 795px; top: 181px; position: absolute" src="https://via.placeholder.com/500x166" />

  <div style="width: 200px; height: 48px; left: 945px; top: 742px; position: absolute">
    <div style="width: 200px; height: 48px; left: 0px; top: 0px; position: absolute; background: #4B72C2; border-radius: 4px"></div>
    <div style="left: 77px; top: 12px; position: absolute; color: white; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Log In</div>
  </div>

  <div style="width: 527px; height: 692px; left: 62px; top: 173px; position: absolute">
    <div style="width: 527px; height: 692px; padding-top: 70px; left: 0px; top: 0px; position: absolute; border-radius: 800px; overflow: hidden; border: 1px white solid; flex-direction: column; justify-content: flex-end; align-items: center; display: inline-flex">
      <img style="width: 549px; height: 622px" src="https://via.placeholder.com/549x622" />
    </div>

    <div style="width: 139px; height: 150px; left: 388px; top: 542px; position: absolute; background: #333333"></div>
    
  </div>

</div> -->

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

            <!-- <a href="#" class="btn-login">Login</a> -->

      </form>
  </div>

</div>




<link rel="stylesheet" href="../styles/loginpage.css">
</body>


</html>