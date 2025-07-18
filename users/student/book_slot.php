<?php
$department = isset($_GET['department']) ? $_GET['department']: die ("ERROR: 404 Not Found");

include_once "../../config/core.php";



$require_login=true;
include_once "../../login_checker.php";

$page_title = $department;
include_once "layout_head.php";

?>

<div class="booking-queue-container">
    <div class="booking-queue-header">
        <p>lorem ipsum</p>
    </div>

    <div class="booking-queue-content">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?department={$department}"); ?>" method="POST">
            <table>
                <tr>
                    <td><input type="text" name="student_id" placeholder="Student ID" disabled></td>
                </tr>
                <tr>
                    <td><input type="text" name="department" value="<?php echo $department; ?>" disabled></td>
                    <td><input type="text" name="OTP" placeholder="OTP" maxlength=6></td>
                    <td><button >Send OTP</button>
                </tr>
                <tr>
                    <td><input type="text" name="department" value="<?php echo $_SESSION['firstname']; ?>" disabled></td>
                    <td>
                        <select name="" id="">
                            <option value="">Document Processing</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><button type="submit" id>Submit</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include_once "layout_foot.php";?>