<?php

function emptyField($email) {
    if (empty($email)) {
        return true;
    }
    return false;
}

function emptyLoginFields($email, $password) {
    if (empty($email) || empty($password)) {
        return true;
    }
    return false;
}

function invalidFullName($fullname) {
    if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
        return true;
    }
    return false;
}

function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function passwordMismatch($password, $confirm_password) {
    if ($password !== $confirm_password) {
        return true;
    }
    return false;
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM `user` WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($results)) {
        return $row;
    }
    mysqli_free_result($results);
    mysqli_stmt_close($stmt);
    return false;
}

function signUp($conn, $fullname, $email, $password) {
    $sql = "INSERT INTO `user`(email,NAME,PASSWORD) VALUES(?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Something went wrong. Please, try again.";
        exit();
    }
    $encryptedPassword = md5($password);
    mysqli_stmt_bind_param($stmt, "sss", $email, $fullname, $encryptedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function userExists($conn, $email, $password) {
    $md5EncryptedPassword = md5($password);
    $sql = "SELECT * FROM `user` WHERE email=? AND PASSWORD=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Something went wrong. Please, try again.";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $email, $md5EncryptedPassword);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($results)) {
        return $row;
    }
    mysqli_free_result($results);
    mysqli_stmt_close($stmt);
    return false;
}

function getDepartments($conn) {
    $sql = "SELECT dept_name, description FROM `department`";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Something went wrong. Please, try again.";
        exit();
    }
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_array($results, MYSQLI_NUM)) {
        echo "<tr class='active-row'><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
    }
}
