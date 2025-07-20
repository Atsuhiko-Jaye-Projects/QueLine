<?php
include_once "../../config/core.php";






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
                <a href="book_slot.php?did=4"><button>Registar</button></a>
                <a href="book_slot.php?did=3"><button>MIS</button></a>
            </td>
        </tr>
            <tr>
            <td>
                <a href="book_slot.php?did=1"><button>Cashier</button></a>
                <a href="book_slot.php?did=2"><button>Admission</button></a>
            </td>
        </table>
    </div>
</div>



<?php include_once "layout_foot.php";?>