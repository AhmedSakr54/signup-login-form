<?php
include_once 'header.php';
?>

<div class="form-wrapper">
    <h1 class="header-signup-login"><i class="fas fa-user"></i> Log in</h1>
    <form id="postForm">
        <input type="email" name="email" placeholder="Email" class="form-element" id="email"><br>
        <input type="password" name="password" placeholder="Password" class="form-element" id="password"><br>
        <button type="submit" name="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Log In</button><br>
        <p class="hide" id="err-paragraph"></p>
    </form>
</div>
<script src="app.js"></script>
</body>

</html>