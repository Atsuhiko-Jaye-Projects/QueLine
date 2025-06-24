<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['full_name']; ?>!</h2>
<a href="logout.php">Logout</a>
<p><a href="change_password.php">Change Password</a></p>
