<?php

include '../dbconnection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $collegeName = $_POST['college_name'];
    $collegeAbv = $_POST['college_abv'];


    if(isset($_FILES['college_image']) && $_FILES['college_image']['error'] == 0){

        $imgName = $_FILES['college_image']['tmp_name'];
        $imgSize = $_FILES['college_image']['size'];
        $imgType = $_FILES['college_image']['type'];

        if($imgSize > 5 * 1024 * 1024 ){ die('file size exceeds limit from 5mb'); }

        $allowedImg = ['image/jpeg', 'image/png', 'image/gif'];
        if(!in_array($imgType, $allowedImg)){
            die('Only "jpg", "png", "gif" file is allowed!!');
        }

        $imgData = file_get_contents($imgName);

        try{

            $var = $pdo->prepare("INSERT INTO colleges(college_name, college_abv, college_image)VALUES(:college_name, :college_abv, :college_image)");
            
            $var->execute([
                'college_name' => $collegeName,
                'college_abv' => $collegeAbv,
                'college_image' => $imgData
            ]);

            header('location: ../super_admin_ds.php');
            exit();

        }catch(PDOException $e){
            echo 'Data not added!!' .$e->getMessage();
        }
    } else { echo "There is an error in uploading image" . $_FILES['college_image']['error']; }

}

?>