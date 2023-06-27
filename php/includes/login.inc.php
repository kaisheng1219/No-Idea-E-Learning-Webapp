<?php

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    require_once "connection.inc.php";
    require_once "functions.inc.php";

    loginUser($connect, $email, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}

?>