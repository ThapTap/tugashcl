<?php
session_start();

if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "medilogdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        if (isset($_SESSION['patient_tokens'][$token])) {
            $PatientID = $_SESSION['patient_tokens'][$token];
        } else {
            die('Invalid access token.');
        }
    } else {
        die('Patient token not provided.');
    }

    // Input validation
    $Date = trim($_POST['Date']);
    $heartRate = trim($_POST['heartRate']);
    $Weight = trim($_POST['Weight']);
    $Diagnosis = trim($_POST['Diagnosis']);
    $Prescription = trim($_POST['Prescription']);

    $errors = [];

    // Validate PatientID (integer and non-negative)
    if (!filter_var($PatientID, FILTER_VALIDATE_INT) || $PatientID < 0) {
        $errors[] = 'Invalid Patient ID';
    }

    $Date = $_POST['Date'];

    // Validate heartRate (format "210/75")
    if (!preg_match("/^\d+\/\d+$/", $heartRate)) {
        $errors[] = 'Invalid Heart Rate format. Expected format: 210/75';
    }

    // Validate Weight (non-negative decimal number)
    if (!filter_var($Weight, FILTER_VALIDATE_FLOAT) || $Weight < 0) {
        $errors[] = 'Invalid Weight';
    }

    // Validate Diagnosis (non-empty)
    if (empty($Diagnosis)) {
        $errors[] = 'Diagnosis cannot be empty';
    }

    // Validate Prescription (non-empty)
    if (empty($Prescription)) {
        $errors[] = 'Prescription cannot be empty';
    }

    // If there are errors, don't proceed with database operation
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO `medical_records` (PatientID, Date, heartRate, Weight, Diagnosis, Prescription) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issdss", $PatientID, $Date, $heartRate, $Weight, $Diagnosis, $Prescription);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Generate a new token for redirection
            $new_token = bin2hex(random_bytes(16));
            $_SESSION['patient_tokens'][$new_token] = $PatientID;
        
            // Redirect to patient_records.php using the token
            header('Location: ../View/pages/patient_records.php?token=' . urlencode($new_token));
            exit();
        }  else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>
