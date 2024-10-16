<?php
include '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDnumber = $_POST['idnumber'];
    $email = $_POST['email'];
    $password = $_POST['create_password'];

    if (!empty($IDnumber) && !empty($email) && !empty($password)) {

   
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Invalid Email Address';
            exit;
        }

        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters!";
            exit;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $getID = $pdo->prepare("SELECT student_id FROM students WHERE IDnumber = ?");
        $getID->execute([$IDnumber]);

        if ($parent = $getID->fetch(PDO::FETCH_ASSOC)) {
            $retrieveID = $parent['student_id'];

            
            $var = $pdo->prepare("INSERT INTO student_registration (student_id, email, password) VALUES (:student_id, :email, :password)");

            try {
                $var->execute([
                    ':student_id' => $retrieveID,
                    ':email' => $email,
                    ':password' => $hash
                ]);

                header('location: ../users/user_login.html');
                exit();

            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    echo 'Account already exists';
                } else {
                    echo 'An error occurred when creating your account! ' . htmlspecialchars($e->getMessage());
                }
            }
        } else {
            echo 'No matching student ID found!';
        }
    } else {
        echo 'All fields are required!';
    }
}
?>
