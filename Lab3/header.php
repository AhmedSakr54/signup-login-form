<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Castoro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
    <div class="navbar">
        <ul>
            <li class="list-item login"><a class="list-link off-page-style" href="./login.php">Log in</a></li>
            <li class="list-item signup"><a class="list-link off-page-style" href="./signup.php">Sign Up</a></li>
        </ul>
    </div>
    <?php
    session_start();
    if (isset($_SESSION["user_name"]))
        session_destroy();
    else 
        session_abort();
    ?>