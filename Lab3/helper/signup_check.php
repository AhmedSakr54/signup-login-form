<?php

if (!isset($_POST["submit"])) {
    header("location: ../signup.php");
    exit();
}

$fullname = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

require_once 'dbh.php';
require_once 'helper_functions.php';

if (emptySignupFields($fullname, $email, $password, $confirm_password)) {
    header("location: ../signup.php?error=emptyField");
    exit();
}
if (invalidFullName($fullname)) {
    header("location: ../signup.php?error=invalidFullName");
    exit();
}
if (invalidEmail($email)) {
    header("location: ../signup.php?error=invalidEmail");
    exit();
}
if (passwordMismatch($password, $confirm_password) !== false) {
    header("location: ../signup.php?error=nonmatchingpasswords");
    exit();
}
if (emailExists($conn, $email)) {
    header("location: ../signup.php?error=emailexits");
    exit();
}

signUp($conn, $fullname, $email, $password);