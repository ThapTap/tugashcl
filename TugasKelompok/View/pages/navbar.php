<?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: loginpage.php");
        exit();
    }
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
    <div class="container-fluid p-1 navbar-wrapper">
        <div class="img-logo-wrapper me-5">
            <img src="../assets/medilog-high-resolution-logo-black-transparent.png" alt="" class="img-logo">
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-5 align-items-center" role="search">
                <input class="form-control me-2 rounded-pill search-field" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4">
                <li class="nav-item">
                    <a class="nav-link" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pasien.php">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Schedule</a>
                </li>
                <form action="POST" method="navbar.php">
                    <!-- <button type="submit" name="logout" class="btn btn-outline-success m-0 logout-btn">Logout</button> -->
                    <input type="submit" class="btn btn-outline-success m-0 logout-btn" value="Log out" name="logout">
                </form>
            </ul>
        </div>
    </div>
</nav>