<?php 
session_start();
include '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDnumber = $_POST['idnumber'];
    $password = $_POST['password'];

    //gamit joins kasi naka normalize
    $stmt = $pdo->prepare("SELECT * FROM student_registration 
                           INNER JOIN students ON student_registration.student_id = students.student_id 
                           WHERE students.IDnumber = ?");
    $stmt->execute([$IDnumber]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        //assign session here, to retrieve data sa database
        $_SESSION['student_id'] = $user['student_id'];
        $_SESSION['IDnumber'] = $user['IDnumber'];
        $_SESSION['s_firstname'] = $user['s_firstname'];
        $_SESSION['s_lastname'] = $user['s_lastname'];

        // Redirect to the dashboard
        header('location: ../hello.php');
        exit();
    } else {
        // Redirect back to login with an error message
        $_SESSION['error_message'] = 'Invalid ID number or password.';
        header('location: ../users/user_login.php');
        exit();
    }
}
?>
