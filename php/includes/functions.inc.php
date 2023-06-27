<?php

function pwdMatch($pwd, $pwdRepeat) {
    return $pwd !== $pwdRepeat ? true : false;
}

function userExist($connect, $email) {
    $sql = "SELECT * FROM user WHERE user_email = ?";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result))
        return $row;    
    else 
        return false;
    
    mysqli_stmt_close($stmt);
}

function createStudent($connect, $name, $age, $email, $pwd) {
    $sql = "INSERT INTO student(student_name, student_age, student_email, student_password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "siss", $name, $age, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
}

function loginUser($connect, $email, $pwd) {
    $userExist = userExist($connect, $email);
    if ($userExist === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $userExist["user_password"];
    $checkedPwd = password_verify($pwd, $pwdHashed);

    if ($checkedPwd === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } else if ($checkedPwd === true) {
        session_start();
        $_SESSION["user_email"] =  $userExist["user_email"];
        $_SESSION["user_role"] =  $userExist["user_role"];

        if ($userExist["user_role"] == "provider")
            header("location: ../provider/course_add.php");
        else if ($userExist["user_role"] == "instructor")
            header("location: ../instructor/course_view.php");
        else if ($userExist["user_role"] == "student")
            header("location: ../instructor/course_register.php");
        exit();
    }
}

?>