<?php
include_once 'header.php';
?>

<div class="form-wrapper">
    <h1 class="header-signup-login"><i class="fas fa-user-plus"></i> Sign Up</h1>
    <form action="" method="POST" onsubmit="return validateForm()">
        <input type="text" name="fullname" placeholder="Full Name" class="form-element" id="fullname"><br>
        <input type="text" name="email" placeholder="Email" class="form-element" id="email"><br>
        <input type="password" name="password" placeholder="Password" class="form-element" id="password"><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-element" id="repeat-password"><br>
        <button class="btn"><i class="fas fa-sign-in-alt"></i> Sign Up</button>
    </form>
</div>
</body>

</html>