<?php
include_once "../../config/core.php";


$require_login=true;
include_once "../../login_checker.php";



$page_title = "Student Index";
include_once "layout_head.php";

?>


<div class="dep-option-container">
    <div class="dep-option-contents">
        <div class="dep-option-header">
            <h1>Departments</h1>
        </div>

        <table class="booking-options">
        <tr>
            <td>
                <a href=""><button>Registar</button></a>
                <a href=""><button>MIS</button></a>
            </td>
        </tr>
            <tr>
            <td>
                <a href=""><button>Cashier</button></a>
                <a href=""><button>Admission</button></a>
            </td>
        </table>
    </div>
</div>

<a href="../../logout.php">Logout</a>

<?php include_once "layout_foot.php";?>