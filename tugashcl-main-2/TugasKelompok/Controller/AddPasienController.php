<?php
session_start();
require 'config.php';
require "../Controller/connection.php";

function checkString($input, $string)
{
    return str_contains($input, $string);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['form-data'] = $_POST;

    $name = trim(strip_tags($_POST['name']));
    $disease = trim(strip_tags($_POST['disease']));
    $dob = trim(strip_tags($_POST['dob']));
    $age = trim(strip_tags($_POST['age']));
    $phone = trim(strip_tags($_POST['phone']));
    $email = trim(strip_tags($_POST['email']));

    $doctor_id = $_SESSION['id'];

    $userDate = new DateTime($dob);
    $currentDate = new DateTime();
    $year = $currentDate->format('Y') - $userDate->format('Y');

    if (empty($name) || empty($disease) || empty($dob) || empty($age) || empty($phone) || empty($email)) {
        $_SESSION['add-error'] = true;
        $_SESSION['add-error-msg'] = "All fields are required!";
        header("Location: ../View/pages/addPasien.php");
    }
    
    else if (checkString(strtolower($name), "javascript:") || checkString(strtolower($disease), "javascript:") || checkString(strtolower($age), "javascript:") || checkString(strtolower($phone), "javascript:") || checkString(strtolower($email), "javascript:")) {
        $_SESSION['add-error'] = true;
        $_SESSION['add-error-msg'] = "Invalid input detected. Please provide valid information.";
        header("Location: ../View/pages/addPasien.php");
    }
    
    else if (!is_numeric($phone)) {
        $_SESSION['add-error'] = true;
        $_SESSION['add-error-msg'] = "Phone number must be numerical!";
        header("Location: ../View/pages/addPasien.php");
    }
    
    else if (!str_starts_with($phone, '08')) {
        $_SESSION['add-error'] = true;
        $_SESSION['add-error-msg'] = "Phone number invalid!";
        header("Location: ../View/pages/addPasien.php");
    }

    else if ($userDate > $currentDate){
        $_SESSION['add-error'] = true;
        $_SESSION['add-error-msg'] = "Selected date cannot be in the future";
        header("Location: ../View/pages/addPasien.php");
    }

    else if($age < $year-1 || $age > $year){
        $_SESSION['add-error'] = true;
        $_SESSION['add-error-msg'] = "Patient's age does not match it's date of birth!";
        header("Location: ../View/pages/addPasien.php");
    }

    // year = 22, dia antara 22 thn or 21

    else if(!filter_var ($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['add-error'] = true;
        $_SESSION['add-error-msg'] = "Email is not valid!";
        header("Location: ../View/pages/addPasien.php");
    }

    // NO MORE ERROR
    else {
        $query = "INSERT INTO `patients` (DoctorID, `Name`, Disease, DateOfBirth, Age, phoneNumber, email) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isssiss", $doctor_id, $name, $disease, $dob, $age, $phone, $email);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        header("Location: ../View/pages/pasien.php");
    }
}
