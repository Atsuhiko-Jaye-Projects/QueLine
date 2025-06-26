<?php
include_once "../../config/core.php";

$page_title = "Dashboard";
include_once "layout_head.php";

$require_login = true;
include_once "../../login_checker.php";


?>

<!-- all content are placed here -->

<div class="admin-header-container">
    <div class="admin-header">
        <img src="../../libs/images/admin-user.jpg" alt=""><br>
        <p>OQMS Administrator</p>
    </div>
</div>
<hr>

<div class="admin-content-container">
    <div class="admin-content-title">
        <h1><?php echo $page_title; ?></h1>
    </div>
    <div class="content-data-container">
        <form action="" method="get">
            <input type="date" id="datePicker" name="date" onchange="this.form.submit()">
            <div class="graph-data-container">
                <h2>Statistics Today</h2>
                <canvas id="myChart"></canvas>
                <div class="legends">
                    <ul id="chartLegend" class="chart-legend"></ul>
                </div>
            </div>
        </form>
    </div>
</div>



<?php include_once "layout_foot.php"; ?>
