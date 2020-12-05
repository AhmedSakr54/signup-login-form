<?php
if (!isset($_POST["submit"])) {
    header("location: ../login.php");
    exit();
}

$email = $_POST["email"];
$password = $_POST["password"];

require_once 'dbh.php';
require_once 'helper_functions.php';

if (emptyLoginFields($email, $password)) {
    echo "Empty Email/Password Fields";
    exit();
}
if (invalidEmail($email)) {
    echo "You entered an invalid Email";
    exit();
}
if (!userExists($conn, $email, $password)) {
    echo "Wrong email or password";
}

