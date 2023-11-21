<?php
    require "../../Controller/logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PASIEN</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLES -->
    <link rel="stylesheet" href="../styles/pasien.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">  
</head>


<body>
    <?php
        require "./navbar.php";
    ?>
    

    <div class="container-patient">

        <div class="title-column">
            <span>No.</span>
            <span>First Name</span>
            <span>Last Name</span>
            <span>Disease</span>
            <span>Last Measurement</span>
            <span>Last Visit</span>
            <span>Action</span>
        </div>
    
        <div class="content-column">
            <span>1.</span>
            <span>John</span>
            <span>Doe</span>
            <span>Malaria</span>
            <span>11/92</span>
            <span>60 Day(s) Ago</span>
            <span a href="#">Details</span>
        </div>

        <div class="content-column2">
            <span>2.</span>
            <span>RANJAG</span>
            <span>ONOWARP</span>
            <span>FLU KUDA</span>
            <span>9/11</span>
            <span>1 Day(s) Ago</span>
            <span a href="#">Details</span>
        </div>

        <div class="content-column3">
            <span>3.</span>
            <span>Uchiha</span>
            <span>NARBIG</span>
            <span>Healthy</span>
            <span>12/12</span>
            <span>15 Day(s) Ago</span>
            <span a href="#">Details</span>
        </div>
    </div>
