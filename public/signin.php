<?php

$page_title = "Sign in";
include_once "layout_head.php"

// $require_login=false;
// include_once "login_checker.php";
// default to false
// $access_denied=false;

?>

<div class="container">
  <div class="form-box" id="login-form">
    <img src="images/Logo.png" alt="Logo">
    <h2>Welcome Back!</h2>
    <h1>Please enter your details to login</h1>

    <form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>
      <input type="email" name="email" placeholder="Enter email address" required>
      <button type="button" name="send-otp">SEND OTP</button>
      <input type="password" name="password" placeholder="Enter password" required>
      <p><a href="#">Forgot Password?</a></p>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</div>

<?php include_once "layout_foot.php";?>