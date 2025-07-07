<?php
include_once "../../config/core.php";



$require_login = true;
include_once "../../login_checker.php";

$page_title = "Dashboard";
include_once "layout_head.php";


?>

<!-- all content are placed here -->

<link rel="stylesheet" type="text/css" href="">

<section class="flex flex-col md:flex-row gap-6 px-6 md:px-10 py-10 bg-[#E9F0F2] rounded-lg flex-grow overflow-auto h-[20px] w-[1200px] ml-[37px] mt-7">
    <!-- Left box with donut chart -->
    <div class="flex flex-col border border-gray-400 rounded-lg p-6 max-w-md w-full bg-[#E9F0F2]">
        <h2 class="text-[#15294B] text-lg font-normal mb-6 select-none">WEEKLY QUEUE STATUS BREAKDOWN</h2>
        <div class="admin-header-container">
        </div>
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
    </div>
    <!-- Right box with bar chart -->
    <div class="flex flex-col border border-gray-400 rounded-lg p-6 flex-grow bg-[#E9F0F2] min-w-0">
        <h2 class="text-[#15294B] text-lg font-normal mb-6 select-none">TREND OF QUEUE VOLUME PER WEEK</h2>
        <div class="overflow-x-auto">
        <img alt="Bar chart" class="w-full max-w-full h-auto" height="250" src="" width="600"/>
        </div>
    </div>
</section>





<!-- <div class="admin-header-container">
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
</div> -->



<?php include_once "layout_foot.php"; ?>
