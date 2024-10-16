<?php
session_start(); 

// Include the database connection file
include 'dbconnection.php';

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    header('Location: ../users/verify_login.php'); 
    exit;
}

// Retrieve session variables
$IDnumber = isset($_SESSION['IDnumber']) ? $_SESSION['IDnumber'] : 'Guest';
$firstname = htmlspecialchars($_SESSION['s_lastname']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HELLO</title>
</head>
<body>
    <h1>Hello, <?php echo htmlspecialchars($firstname) . " (" . htmlspecialchars($IDnumber) . ")"; ?>!</h1>
    <p>Welcome to your dashboard.</p>
</body>
</html>

 