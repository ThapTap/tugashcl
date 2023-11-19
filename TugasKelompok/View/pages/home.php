<?php
    require "./logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">   
    <link rel="stylesheet" href="../styles/home.css">
    <title>Home Page</title>
</head>
<body>
    <!-- NAVBAR -->
    <!-- placeholder !!!!! -->
    <?php
    require "./navbar.php";
    ?>

    <div class="content" style="margin-top: 90.71px;">
        <img src="../assets/soft-star.png" class="star1">
        <div class="patient">
            <h1 id="welcome"></h1>
            <p>Take a peek at your patients' records for smarter healthcare decisions!</p>
            <img src="../assets/soft-star.png" class="star2">
            <button onclick="window.location.href=patients.html">See lists of patients</button>
        </div>
        <div class="schedule">
            <p>Or you can check your upcoming appoinments,</p>
            <p>make sure you don't miss them!</p>
            <img src="../assets/soft-star.png" class="star3">
            <button onclick="window.location.href=schedule.html">See my schedule</button>
            <img src="../assets/soft-star.png" class="star4">
        </div>
    </div>

    <!-- FOOTER -->
    <!-- placeholder !!!!! -->
    <footer>
        <div class="footer">
            <span>&copy; 2023 Medi Healthcare</span>
        </div>
    </footer>


    <!-- placeholder !!!!! code buat show nama dokternya -->
    <script>
        document.getElementById("welcome").innerText = "Hi! Welcome to MediLog";
    </script>
</body>
</html>