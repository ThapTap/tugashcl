<?php
session_start();
require 'config.php';
require "connection.php";

if (isset($_POST['delete'])) {
    if (isset($_POST['delete_token'])) {
        $deleteToken = $_POST['delete_token'];
        if (isset($_SESSION['delete_tokens'][$deleteToken])) {
            $recordID = $_SESSION['delete_tokens'][$deleteToken];
            unset($_SESSION['delete_tokens'][$deleteToken]);
        } else {
            die('Invalid delete token.');
        }
    } else {
        die('No delete token provided.');
    }

    $patientID = $_POST['patient_id'] ?? null; // Retrieve patient ID from POST

    // Proceed to delete the record using $recordID
    $stmt_delete = $conn->prepare("DELETE FROM `medical_records` WHERE ID = ?");
    $stmt_delete->bind_param("i", $recordID);
    $stmt_delete->execute();

    if ($stmt_delete->affected_rows > 0 && $patientID) {
        // Generate a new token for the patient
        $new_token = bin2hex(random_bytes(16));
        $_SESSION['patient_tokens'][$new_token] = $patientID;

        header('Location: ../View/pages/patient_records.php?token=' . urlencode($new_token));
        exit();
    } else {
        echo "Error: " . $stmt_delete->error;
    }

    $stmt_delete->close();
    $conn->close();
}
?>
