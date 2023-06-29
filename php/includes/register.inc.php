<?php

if (isset($_POST["submit"])) {
    require_once "connection.inc.php";
    require_once "functions.inc.php";

    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    
    if (!pwdMatch($pwd, $pwdRepeat)) {
        header("location: ../register.php?error=passwordsDontMatch");
        exit();
    }
    if (userExist($connect, $email) !== false) {
        header("location: ../register.php?error=emailTaken");
        exit();
    }
    if ($email == "admin@noidea.tech.com")
        createAdmin($connect);
    else 
        createStudent($connect, $name, $age, $email, $pwd);
} else {
    header("location: ../register.php");
    exit();
}

?>