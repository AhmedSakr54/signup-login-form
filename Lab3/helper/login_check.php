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
    header("location: ../login.php/error=emptyFields");
    exit();
}
if (invalidEmail($email)) {
    header("location: ../login.php?error=invalidEmail");
    exit();
}
if (emailExists($conn, $email)) {

}