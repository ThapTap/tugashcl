<?php
require "../../Controller/logincheck.php";

if (isset($_SESSION['form-data'])) {
    $formData = $_SESSION['form-data'];
    unset($_SESSION['form-data']);
} else {
    $formData = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>

    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/add.css">
</head>

<body>
    <!-- NAVBAR -->
    <?php
    require "./navbar.php";
    ?>

    <div class="title">
        <h1>Add New Patient</h1>
    </div>

    <form method="POST" action="../../Controller/AddPasienController.php" class="form-container">
        <fieldset class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" placeholder="Enter patient's name..." value="<?php echo isset($formData["name"]) ? htmlspecialchars($formData["name"]) : ''; ?>">
        </fieldset>
        <fieldset class="form-group">
            <label for="disease">Disease</label>
            <input type="text" name="disease" placeholder="Enter patient's disease..." value="<?php echo isset($formData["disease"]) ? htmlspecialchars($formData["disease"]) : ''; ?>">
        </fieldset>
        <fieldset class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" value="<?php echo isset($formData["dob"]) ? $formData["dob"] : ''; ?>">
        </fieldset>
        <fieldset class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" placeholder="Enter patient's age..." value="<?php echo isset($formData["age"]) ? htmlspecialchars($formData["age"]) : ''; ?>">
        </fieldset>
        <fieldset class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" placeholder="Enter patient's phone number..." value="<?php echo isset($formData["phone"]) ? htmlspecialchars($formData["phone"]) : ''; ?>">
        </fieldset>
        <fieldset class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter patient's email..." value="<?php echo isset($formData["email"]) ? htmlspecialchars($formData["email"]) : ''; ?>">
        </fieldset>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" name="send">
        </div>
    </form>

    <?php
    if (isset($_SESSION['add-error'])) {
    ?>
        <div class="error-container">
            <p class="alert alert-danger"><?= $_SESSION['add-error-msg']; ?></p>
        </div>
    <?php
    }
    unset($_SESSION['add-error']);
    ?>
    <!-- FOOTER -->
    <?php
    require "./footer.php";
    ?>
</body>

</html>