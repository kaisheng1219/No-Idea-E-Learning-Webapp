<?php

if (isset($_POST['update'])) {
    require_once 'connection.inc.php';
    require_once 'functions.inc.php';

    $title = $_POST['title'];
    $description = $_POST['description'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $instructors = $_POST['instructors_id'];

    updateCourse($connect, $title, $description, $startDate, $endDate, $instructors);
}

?>