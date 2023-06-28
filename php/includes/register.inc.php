<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    
    require_once "connection.inc.php";
    require_once "functions.inc.php";

    if (!pwdMatch($pwd, $pwdRepeat)) {
        header("location: ../register.php?error=passwordsDontMatch");
        exit();
    }
    if (userExist($connect, $email) !== false) {
        header("location: ../register.php?error=emailTaken");
        exit();
    }

    createStudent($connect, $name, $age, $email, $password);
} else {
    header("location: ../register.php");
    exit();
}

?>