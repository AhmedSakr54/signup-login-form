<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("location: login.php");
    exit();
}
echo "Welcome ". $_SESSION["user_name"];