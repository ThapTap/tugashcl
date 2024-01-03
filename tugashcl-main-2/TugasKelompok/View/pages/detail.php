<?php
require "../../Controller/logincheck.php";


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    if (isset($_SESSION['patient_tokens'][$token])) {
        $patient_id = $_SESSION['patient_tokens'][$token]; // Retrieve the actual patient ID using the token
    } else {
        die('Invalid access token.'); // Or handle the error as appropriate
    }
} else {
    die('No patient specified.'); // Or redirect to a default page
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient Record</title>
    <link rel="stylesheet" href="../styles/detail.css">
</head>
<body>
    <div class="container">
        <h2>Add New Patient Record</h2>
        <form action="../../Controller/update_record.php" method="post">
        <input type="hidden" name="token" value="<?= $token ?>" required>
    
    <label for="Date">Date:</label>
    <input type="datetime-local" id="Date" name="Date" required>
    
    <label for="heartRate">Heart Rate:</label>
    <input type="text" id="heartRate" name="heartRate" required>
    
    <label for="Weight">Weight:</label>
    <input type="text" id="Weight" name="Weight" required>
    
    <label for="Diagnosis">Diagnosis:</label>
    <textarea id="Diagnosis" name="Diagnosis" required></textarea>
    
    <label for="Prescription">Prescription:</label>
    <textarea id="Prescription" name="Prescription" required></textarea>
    
    <button type="submit" name="submit">Add Record</button>
        </form>
    </div>
</body>
</html>
