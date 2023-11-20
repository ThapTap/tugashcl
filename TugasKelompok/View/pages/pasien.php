<?php
    require "./logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PASIEN</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLES -->
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">  
</head>


<body>
    <?php
        require "./navbar.php";
    ?>
    <!-- <header class="container-nav">
            <a href="index.html" class="logo">INILOGO</a>
        <nav class="navbar">
            <a href="index.html">HOME PAGE</a>
            <a href="pasien.html">PASIEN</a>
            <a href="#">SCHEDULE</a>
            <a href="#">OBAT</a>
        </nav>
            <a class="logout" href="loginpage.html">LOG OUT</a>
    </header> -->

<div class="container-pasien">
    <div class="pasien">
        <a href="pasien1.html" class="box-pasien">
            Pasien 1
            <img src="../assets/tuhanalek.jpg" width="200px" height="200px"
        class="foto-pasien">
        </a>
        <a href="pasien1.html" class="box-pasien">
            Pasien 2
            <img src="../assets/tuhanalek.jpg" width="200px" height="200px"
        class="foto-pasien">
        <a href="pasien1.html" class="box-pasien">
            Pasien 3
            <img src="../assets/tuhanalek.jpg" width="200px" height="200px"
        class="foto-pasien">
        
        <div class="add-pasien">
            Add Patient
            <img src="../assets/plus-regular-60.png" class="logo-plus" width="170px" height="170px">
        </div>
    </div>
</div>


</body>
</html>