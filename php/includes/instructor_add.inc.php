<?php

if (isset($_POST['add'])) {
    require_once 'connection.inc.php';
    require_once 'functions.inc.php';
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $pwdRepeat = $_POST['confirm_password'];

    if (!pwdMatch($pwd, $pwdRepeat)) {
        header("location: ../provider/instructor_add.php?error=passwordsDontMatch");
        exit();
    }
    if (userExist($connect, $email) !== false) {
        header("location: ../provider/instructor_add.php?error=emailTaken");
        exit();
    }

    $userId = createUser($connect, $email, $pwd, "instructor");
    $providerId = $_SESSION['provider_id'];
   
    $sql = "INSERT INTO instructor VALUES ('0', '$name', '$providerId', '$userId');";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        header("location: ../provider/instructor_add.php?button=instructors&error=unableToAdd");
        exit();
    } else {
        header("location: ../provider/instructor_add.php?button=instructors&success");
        exit();
    }
}

?>