<?php
include_once "../../../../config/core.php";

$page_title = "Cashier staff Index";

//prevent direct link
$require_login = true;
include_once "../../../../login_checker.php";

// include the layout head
include_once "layout_head.php";

?>

<div class="main-content">
    <h2><?php echo $page_title; ?></h2>
    <p>This is the mains content area.</p>
    <a href="../../../../logout.php">Logout</a>
</div>


<?php include_once "layout_foot.php"; ?>