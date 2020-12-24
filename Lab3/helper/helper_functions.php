<?php
// checks if a field in the signup page is empty
// returns true if the field is empty
function emptyField($input_field) {
    if (empty($input_field)) {
        return true;
    }
    return false;
}
// checks if any of the login fileds are empty
// returns true if any of the two fields are empty
function emptyLoginFields($email, $password) {
    if (empty($email) || empty($password)) {
        return true;
    }
    return false;
}
// checks for invalid full name
// invalid names are names with any numbers of symbols that aren't alphabetic letters
// returns true if the full name is invalid
function invalidFullName($fullname) {
    if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
        return true;
    }
    return false;
}
// uses a build-in function for email validation
// returns true when the email is invalid
function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}
// checks if the password and confirm password fields are equal
// returns true when there is a mismatch
function passwordMismatch($password, $confirm_password) {
    if ($password !== $confirm_password) {
        return true;
    }
    return false;
}
// uses prepared statments to query the database to see if the input $email is already in the database
// if the email already exists, This function returns the row corresponding to the existing email
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
// uses prepared statments to insert a user tuple into the user table
// uses md5 password encryption
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

// the function is called at login
// querys the user table for a row that corresponds to the inputed email and password
// on successful login returns the row
// if the email or password don't exist returns false
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

// after succesful login the user is redirected to a page with his/her name and a table 
// contining the department names and their description
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
    mysqli_free_result($results);
    mysqli_stmt_close($stmt);
}
