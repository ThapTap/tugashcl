<?php
    require "./database.php";
    $db = mysqli_connect(
        $config['server'],
        $config["username"],
        $config["password"],
        $config["database"]
    )

?>