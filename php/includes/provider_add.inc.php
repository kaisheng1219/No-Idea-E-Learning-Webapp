<?php

if (isset($_POST['add'])) {
    require_once 'connection.inc.php';
    require_once 'functions.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $pwdRepeat = $_POST['confirm_password'];

    if (!pwdMatch($pwd, $pwdRepeat)) {
        header("location: ../admin/provider_add.php?error=passwordsDontMatch");
        exit();
    }
    if (userExist($connect, $email) !== false) {
        header("location: ../admin/provider_add.php?error=emailTaken");
        exit();
    }

    $userId = createUser($connect, $email, $pwd, "provider");
    $sql = "INSERT INTO `provider` VALUES('0', '$name', '$userId');";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        header("location: ../admin/provider_add.php?error=unableToAdd");
        exit();
    } else {
        header("location: ../admin/provider_add.php?success");
        exit();
    }
}

?>