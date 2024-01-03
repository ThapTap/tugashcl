<?php
require "../../Controller/logincheck.php";
require "../../Controller/connection.php";

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    if (isset($_SESSION['patient_tokens'][$token])) {
        $patient_id = $_SESSION['patient_tokens'][$token]; 
    } else {
        die('Invalid access token.');
    }
} else {
    die('No patient specified.'); 
}

// Fetch patient details from 'patients' table
$patientSql = "SELECT Name, Age, DateOfBirth, Disease FROM patients WHERE ID = ?";
$patientStmt = $conn->prepare($patientSql);
$patientStmt->bind_param("i", $patient_id);
$patientStmt->execute();
$patientResult = $patientStmt->get_result();
$patientData = $patientResult->fetch_assoc();

// Fetch patient records from 'medical_records' table
$recordsSql = "SELECT * FROM `medical_records` WHERE PatientID = ? ORDER BY Date DESC";
$recordsStmt = $conn->prepare($recordsSql);
$recordsStmt->bind_param("i", $patient_id);
$recordsStmt->execute();
$recordsResult = $recordsStmt->get_result();
$recordsExist = $recordsResult->num_rows > 0;

$detailToken = bin2hex(random_bytes(16));
$_SESSION['patient_tokens'][$detailToken] = $patient_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Patient Record</title>
    <link rel="stylesheet" href="../styles/patient_records.css">
</head>
<body>
    <div class="patient-info">
        <h2>Patient Details</h2>
        <?php if ($patientData): ?>
            <p>Name: <?= htmlspecialchars($patientData['Name']) ?></p>
            <p>Age: <?= htmlspecialchars($patientData['Age']) ?></p>
            <p>Date of Birth: <?= htmlspecialchars($patientData['DateOfBirth']) ?></p>
            <p>Disease: <?= htmlspecialchars($patientData['Disease']) ?></p>
        <?php else: ?>
            <p>Patient details not found.</p>
        <?php endif; ?>

        <h2>Medical Records</h2>
        <?php if ($recordsExist): ?>
        <div class="records">
            <!-- Loop through records and display them -->
            <?php foreach ($recordsResult->fetch_all(MYSQLI_ASSOC) as $record): 
                $deleteToken = bin2hex(random_bytes(16));
                $_SESSION['delete_tokens'][$deleteToken] = $record['ID'];
                $_SESSION['delete_patient_id'][$deleteToken] = $patient_id; // Store patient ID for redirection after delete
            ?>
                <div class="record-entry">
                    <p>Date: <?= htmlspecialchars($record['Date']) ?></p>
                    <p>Heart Rate: <?= htmlspecialchars($record['heartRate']) ?></p>
                    <p>Weight: <?= htmlspecialchars($record['Weight']) ?></p>
                    <p>Diagnosis: <?= htmlspecialchars($record['Diagnosis']) ?></p>
                    <p>Prescription: <?= htmlspecialchars($record['Prescription']) ?></p>
                    <!-- Delete button form -->
                    <form action="../../Controller/delete_record.php" method="post">
                        <input type="hidden" name="delete_token" value="<?= $deleteToken ?>">
                        <input type="hidden" name="patient_id" value="<?= $patient_id ?>"> 
                        <input type="submit" name="delete" value="Delete" class="delete-btn">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No medical records found.</p>
    <?php endif; ?>
        <p><a href="detail.php?token=<?= $token ?>" class="add-records-btn">Add Records</a></p>
    </div>

    <!-- "Return to Patient List" button -->
    <div class="return">
        <a href="pasien.php" class="return-btn">Return to Patient List</a>
    </div>
</body>
</html>

<?php
// Close connections
$patientStmt->close();
$recordsStmt->close();
$conn->close();
?>
