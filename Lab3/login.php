<?php
include_once 'header.php';
?>

<div class="form-wrapper">
    <h1 class="header-signup-login"><i class="fas fa-user"></i> Log in</h1>
    <form action="" method="POST" onsubmit="return validateForm()">
        <input type="text" name="email" placeholder="Email" class="form-element" id="email"><br>
        <input type="password" name="password" placeholder="Password" class="form-element" id="password"><br>
        <button class="btn"><i class="fas fa-sign-in-alt"></i> Log In</button>
    </form>
</div>
<script src="app.js"></script>
</body>

</html>