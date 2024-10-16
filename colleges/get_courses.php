<?php
include '../dbconnection.php';

if (isset($_POST['college_id'])) {
    $college_id = $_POST['college_id'];

    try {
        $stmt = $pdo->prepare("SELECT course_id, course_name FROM courses WHERE college_id = ?");
        $stmt->execute([$college_id]);
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($courses) {
            foreach ($courses as $course) {
                echo "<option value='" . htmlspecialchars($course['course_id']) . "'>" . htmlspecialchars($course['course_name']) . "</option>";
            }
        } else {
            echo "<option value=''>No courses found</option>";
        }
    } catch (PDOException $e) {
        echo "<option value=''>Error fetching courses</option>";
    }
}
?>
