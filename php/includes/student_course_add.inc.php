<?php

if (isset($_GET['register'])) {
    require_once '../includes/connection.inc.php';
    require_once '../includes/functions.inc.php';
    session_start();

    $courseId = $_GET['courseId'];
    $studentId = $_SESSION['student_id'];
    $sql = "INSERT INTO student_course VALUES('$studentId', '$courseId', 0);";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        header("location: ../student/courses.php?button=courses&error");
        exit();
    } else {
        header("location: ../student/courses.php?button=courses&success");
        exit();
    }
}

?>