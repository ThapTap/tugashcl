<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/home.css">
    <title>Home Page</title>
</head>
<body>
    <!-- NAVBAR -->
    <!-- placeholder !!!!! -->
    <nav>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="#">Patients</a></li>
            <li><a href="#">Schedule</a></li>
        </ul>
    </nav>

    <div class="content">
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
        &copy; 2023 Medi Healthcare
    </footer>


    <!-- placeholder !!!!! code buat show nama dokternya -->
    <script>
        var userName = "Edard Sontase";
        document.getElementById("welcome").innerText = "Hi, " + userName + "! Welcome to MediLog";
    </script>
</body>
</html>