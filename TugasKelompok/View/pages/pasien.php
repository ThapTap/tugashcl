<?php
require "../../Controller/logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pasien</title>

    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/pasien.css">
</head>


<body>
    <?php
    require "./navbar.php";
    ?>

    <div class="title">
        <h1>See your patients list</h1>
        <div>
            <a class="btn btn-primary my-auto add-medrec" href="./addMedRec.php">Add new medical record</a>
            <a class="btn btn-primary my-auto add-pasien" href="./addPasien.php">Add new patient</a>
        </div>
    </div>

    <div class="container-patient">
        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $_SESSION['add-error'] = NULL;
                $i = 1;
                require "../../Controller/connection.php";

                $query = "SELECT ID, Name, Disease
                FROM patients
                WHERE DoctorID = {$_SESSION['id']};";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                $conn->close();

                foreach ($result as $i => $patient) {
                    $i++;

                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $patient['Name'] . '</td>';
                    echo '<td>' . $patient['Disease'] . '</td>';
                    echo '<td><a class="btn btn-primary detail" href="">Details</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

    </div>
</body>