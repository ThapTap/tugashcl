<?php
    // Directly set the database configuration here
    $server = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $dbname = 'medilogdb';

    // Attempt to establish a connection
    $conn = mysqli_connect($server, $user, $pass, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>