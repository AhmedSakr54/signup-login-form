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

if (emptyField($fullname)) {
    echo "Empty Full Name Field";
    exit();
}
if (emptyField($email)) {
    echo "Empty Email Field";
    exit();
}
if (emptyField($password)) {
    echo "Empty Password Field";
    exit();
}

if (invalidFullName($fullname)) {
    echo "Invalid Full Name";
    exit();
}
if (invalidEmail($email)) {
    echo "Invalid Email";
    exit();
}
if (passwordMismatch($password, $confirm_password) !== false) {
    echo "Confirm password is not the same as password";
    exit();
}
if (emailExists($conn, $email)) {
    echo "Email already exists";
    exit();
}

signUp($conn, $fullname, $email, $password);
echo "Registration Successful";

