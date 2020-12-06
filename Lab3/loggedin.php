<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="css/loggedin-style.css" type="text/css">
</head>

<body>
    <?php
require_once 'helper/dbh.php';
require_once 'helper/helper_functions.php';
session_start();
if (!isset($_SESSION["user_name"])) {
    header("location: login.php");
    exit();
}
echo "<h1 class=''>Welcome ". $_SESSION["user_name"]. "</h1>";
// getDepartments($conn);
?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php getDepartments($conn);?>
        </tbody>
    </table>
</body>

</html>