<?php

function pwdMatch($pwd, $pwdRepeat) {
    return $pwd !== $pwdRepeat ? true : false;
}

function userExist($conn, $email) {
    $sql = "SELECT * FROM user WHERE user_email = ?";
    $stmt = mysqli_stmt_init($conn);
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

?>