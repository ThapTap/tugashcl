<?php
    // Directly set the database configuration here
    $server = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'medilogdb';

    // Attempt to establish a connection
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>