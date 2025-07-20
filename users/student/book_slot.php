<?php
include_once "../../config/database.php";
include_once "../../objects/transaction.php";

$database = new Database();
$db = $database->getConnection();

$transaction = new Transaction ($db);

$did = isset($_GET['did']) ? $_GET['did']: die ("ERROR: 404 Not Found");

include_once "../../config/core.php";


$department=null;
if ($did==1) {
  $department = "Cashier";
}else if ($did==2) {
  $department = "Admission";
}else if ($did==3) {
  $department= "MIS";
}else if ($did==4){
  $department= "Registrar";
}else{
  $department= "Department Not Available";
}


$page_title = $department;
include_once "layout_head.php";

?>

<main>
  <p class="disclaimer" role="note">
    Disclaimer: By using this kiosk, you agree to provide accurate information. Your queue numbers are for personal use only. Missed or skipped turns may require rebooking. All personal data is handled in compliance with the Data Privacy Act of 2012.
  </p>
  
  <form aria-label="Queue registration form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?did={$did}"); ?>" method="POST">
    <button type="button" class="btn-admission" aria-disabled="true" tabindex="-1"><?php echo $page_title; ?></button>

    <?php
      $stmt = $transaction->read($did);
      echo "<select aria-label='Transaction type' name='transaction_id' required>";
        echo "<option value=''hidden>Transaction Type</option>";
        while ($row_transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row_transaction);
          echo "<option value={$id}>{$name}</option>";
        }
      echo "</select>";
    ?>

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
  </form>

  <?php 


      echo"<button id='showModalBtn' class='btn-print'>";
          echo "Preview";
      echo "</button>";
        include_once "reciept_form.php";
      ?>
</main>



<?php include_once "layout_foot.php";?>