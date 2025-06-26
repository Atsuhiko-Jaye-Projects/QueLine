<?php
include_once "../config/core.php";

$page_title = "admission Index";
 $require_login = true;
 include_once "../login_checker.php";

 include_once "layout_head.php";
?>


<div class="main-content">
    <h1>Welcome to My Website</h1>
    <p>This is the mains content area.</p>
    <a href="../logout.php">Logout</a>
</div>


<?php include_once "layout_foot.php";?>  
