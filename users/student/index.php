<?php
include_once "../../config/core.php";


$require_login=true;
include_once "../../login_checker.php";



$page_title = "Student Index";
include_once "layout_head.php";

include_once "kiosk-alert.php";

?>


<div class="dep-option-container">
    <div class="dep-option-contents">
        <div class="dep-option-header">
            
        </div>

        <table class="booking-options">
        <tr>
            <td>
                <a href="book_slot.php?department=Registar"><button>Registar</button></a>
                <a href="book_slot.php?department=MIS"><button>MIS</button></a>
            </td>
        </tr>
            <tr>
            <td>
                <a href="book_slot.php?department=Cashier"><button>Cashier</button></a>
                <a href="book_slot.php?department=Admission"><button>Admission</button></a>
            </td>
        </table>
    </div>
</div>



<?php include_once "layout_foot.php";?>