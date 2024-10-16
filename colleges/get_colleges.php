<?php
    include '../dbconnection.php';

    try{
        $var = $pdo->prepare("SELECT id, college_name FROM colleges");
        $var->execute();

        $colleges = $var->fetchAll(PDO::FETCH_ASSOC);

        if($colleges){
            foreach($colleges as $college){
                echo "<option value=". htmlspecialchars($college['id']).">". htmlspecialchars($college['college_name']) . "</option>";
            }
        }else{
            echo "<option value='No selected college'></option>";
        }

    }catch(PDOException $e){
        echo "";
    }
?>  