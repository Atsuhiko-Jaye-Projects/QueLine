<?php
include_once "../config/core.php";

$page_title = "Index";
include_once "layout_head.php";

$require_login = true;
include_once "../login_checker.php";


?>

<!-- all content are placed here -->
<div class="main-content">
    <h1>Welcome to My Website</h1>
    <p>This is the mains content area.</p>
    <a href="../logout.php">Logout</a>
</div>

<?php include_once "layout_foot.php"; ?>
