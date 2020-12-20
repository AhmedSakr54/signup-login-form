<?php
include_once 'header.php';
?>

<div class="form-wrapper">
    <h1 class="header-signup-login"><i class="fas fa-user-plus"></i> Sign Up</h1>

    <form id="postForm">
        <div class='label-class'>
            <label>Full name</label><br>
        </div>
        <input type="text" name="fullname" placeholder="Full Name" class="form-element" id="fullname"><br>
        <div class='label-class'>
            <label>Email</label><br>
        </div>
        <input type="email" name="email" placeholder="Email" class="form-element" id="email"><br>
        <div class='label-class'>
            <label>Password</label><br>
        </div>
        <input type="password" name="password" placeholder="Password" class="form-element" id="password"><br>
        <div class='label-class'>
            <label>Confirm Password</label><br>
        </div>
        <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-element"
            id="repeat-password"><br>
        <button type="submit" name="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Sign Up</button><br>

        <p class="hide error" id="err-paragraph"></p>
    </form>
</div>

<script src="app.js"></script>
</body>

</html>