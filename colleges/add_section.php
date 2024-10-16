<?php
    include '../dbconnection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $section = $_POST['section_name'];
        $college_id = $_POST['colleges'];
        $course_id = $_POST['courses'];
        
        try{
            $var = $pdo->prepare("INSERT INTO departments(section, college_id, program_id)VALUES( :section, :college_id, :program_id)");
            $var->execute([
                'section' => $section,
                'college_id' => $college_id,
                'program_id' => $course_id
            ]);

            header('location: ../super_admin_ds.php');
            exit();

        }catch(PDOException $e){
            echo "An error accured while recording sections" . $e->getMessage();
        }

    };
?>