<?php
$department = isset($_GET['department']) ? $_GET['department']: die ("ERROR: 404 Not Found");

include_once "../../config/core.php";



$require_login=true;
include_once "../../login_checker.php";

$page_title = $department;
include_once "layout_head.php";

?>

<main>
  <p class="disclaimer" role="note">
    Disclaimer: By using this kiosk, you agree to provide accurate information. Your queue numbers are for personal use only. Missed or skipped turns may require rebooking. All personal data is handled in compliance with the Data Privacy Act of 2012.
  </p>
  
  <form aria-label="Queue registration form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?department={$department}"); ?>" method="POST">
    <button type="button" class="btn-admission" aria-disabled="true" tabindex="-1"><?php echo $department; ?></button>

    <select aria-label="Transaction type" name="transaction" required>
      <option selected disabled value="">Transaction Type</option>
      <option value="enrollment">Enrollment</option>
      <option value="payment">Payment</option>
      <option value="transcript-request">Transcript Request</option>
      <option value="others">Others</option>
    </select>

    <input
      type="text"
      name="fullname"
      placeholder="Enter your fullname"
      autocomplete="name"
      required
      aria-required="true"
      aria-describedby="fullname-desc"
    />
    <input
      type="text"
      name="studentid"
      placeholder="Student ID/LRN"
      inputmode="numeric"
    />

    <label class="checkbox-group" for="priority-checkbox">
      <input type="checkbox" id="priority-checkbox" name="priority" />
      Priority (Pregnant, PWD, or Senior Citizen)
    </label>

    <button type="submit" class="btn-print">
      PRINT
    </button>
  </form>
</main>



<?php include_once "layout_foot.php";?>