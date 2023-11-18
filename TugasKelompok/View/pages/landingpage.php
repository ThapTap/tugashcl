<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/landingpage.css">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-0 fixed-top">
        <div class="container-fluid p-1 navbar-wrapper">
            <div class="img-logo-wrapper">
                <img src="../assets/medilog-high-resolution-logo-black-transparent.png" alt="" class="img-logo">
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-us">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- INTRO -->
    <div id="intro" class="container-fluid d-flex justify-content-center">
        <div class="intro-content text-center">
            <h1 class="pt-5 p-3">Scheduling hiccups? We're here to help!</h1>
            <h1 class="p-3 pb-0">INTRODUCING</h1>
            <div style="width: 700px; height:400px;" class="container-fluid d-flex justify-content-center pt-0 pb-5 align-items-center">
                <div>
                    <img src="../assets/soft-star.png" alt="" class="soft-star1">
                    <img src="../assets/soft-star.png" alt="" class="soft-star2">
                    <img src="../assets/medilog-high-resolution-logo-black-transparent.png" alt="" class="img-logo">
                    <a class="try-now-btn btn mb-5 m-3 px-5 py-3 rounded-pill fs-5" href="#" role="button">Try it now!</a>
                </div>
            </div>
        </div>

        <!-- <div>
            <img src="../assets/Star 8-miring.png" alt="" class="star-miring1">
            <img src="../assets/Star 8-miring.png" alt="" class="star-miring1">
        </div> -->
    </div>
    
    <!-- ABOUT US -->
    <div id="about-us">
        <div class="about-us-wrapper container-fluid d-flex justify-content-evenly align-items-center">
            <div class="about-us-text">
                <h1 id="abt-us-h1">About Us</h1>
                <p id="abt-us-p">Elevate your medical practice with MediLog! Say farewell to record-keeping hassles and data disarray. Access patient information with ease, empowering you to make informed healthcare decisions. Embrace the future of medical management, so you can focus on providing top-notch patient care.</p>
                <a id="abt-us-a" href="#">Try it now! <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
            </div>
            <div class="doctor-img-wrapper">
                <img src="../assets/Group 10061.png" alt="" class="doctor-img">
            </div>
        </div>
    </div>

    <!-- OUR SERVICES -->
    <div class="our-services">
        <div class="our-services-wrapper d-flex justify-content-center">
            
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>


</html>