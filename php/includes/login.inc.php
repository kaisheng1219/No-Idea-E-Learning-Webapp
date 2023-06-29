<?php

if (isset($_POST["login"])) {

    require_once "connection.inc.php";
    require_once "functions.inc.php";

    $email = $_POST["email"];
    $pwd = $_POST["password"];

    loginUser($connect, $email, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}

?>