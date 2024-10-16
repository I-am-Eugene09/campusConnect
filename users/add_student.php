<?php
    include '../dbconnection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $studentID = $_POST['idnumber'];
        $firstName = $_POST['firstname'];
        $middleName = $_POST['middlename'];
        $lastName = $_POST['lastname'];
        $courseID = $_POST['courses'];
        $collegeID = $_POST['colleges'];

        try{
            $var = $pdo->prepare("INSERT INTO students(IDnumber, s_firstname, s_middlename, s_lastname, course_id, college_id)
                                VALUES(:IDnumber, :s_firstname, :s_middlename, :s_lastname, :course_id, :college_id)");
            $var->execute([
                'IDnumber' =>  $studentID,
                's_firstname' =>  $firstName,
                's_middlename' =>  $middleName,
                's_lastname' =>  $lastName,
                'course_id' =>  $courseID,
                'college_id' =>  $collegeID
            ]);

            header('location: ../users/user_portal.html');
            exit();

        }catch(PDOException $e){
            echo 'An error occurred! Please Try Again Later!' . $e->getMessage();
        }
    }
?>