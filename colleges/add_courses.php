<?php
    include '../dbconnection.php';

    if($_SERVER['REQUEST_METHOD'] = 'POST'){
        $college_name = $_POST['colleges'];
        $course = $_POST['course_name'];

        try{
            $var = $pdo->prepare("INSERT INTO courses(course_name, college_id) VALUES (:course_name, :college_id)");

            $var->execute([
                'college_id' => $college_name,
                'course_name' => $course
            ]);

            header('location: ../super_admin_ds.php');
            exit();

        }catch(PDOException $e){
            echo 'data not added: '. $e->getMessage();
        }
    }

?>