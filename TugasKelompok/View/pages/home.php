<?php
    require "../../Controller/logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">   
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/home.css">
    <title>Home Page</title>
</head>
<body>
    <!-- NAVBAR -->
    <?php
    require "./navbar.php";
    ?>

    <div class="content" style="margin-top: 90.71px; min-height: 100%;">
        <img src="../assets/soft-star.png" class="star1">
        <div class="patient">
            <h1 id="welcome"></h1>
            <p>Take a peek at your patients' records for smarter healthcare decisions!</p>
            <img src="../assets/soft-star.png" class="star2">
            <a class="a" href="./pasien.php">See lists of patients</a>
        </div>
        <div class="schedule">
            <p>Or you can check your upcoming appoinments,</p>
            <p>make sure you don't miss them!</p>
            <img src="../assets/soft-star.png" class="star3">
            <a class="a" href="#">See my schedule</a>
            <img src="../assets/soft-star.png" class="star4">
        </div>
    </div>

    <!-- FOOTER -->
    <?php
    require "./footer.php";
    ?>


    <!-- placeholder !!!!! code buat show nama dokternya -->
    <script>
        var userName = "<?php echo $_SESSION['username']; ?>";
        document.getElementById("welcome").innerText = "Hi, " + userName + "! Welcome to MediLog";
    </script>
</body>
</html>