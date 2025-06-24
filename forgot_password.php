<?php
include_once "config/core.php";
$page_title = "QQMS-Forgot Password";
include_once "layout_head.php";

include_once "login_checker.php";
$require_login=false;

// default to false
$access_denied=false;

// include email utils


if ($_POST) {
	include_once 'config/database.php';
	include_once 'objects/user.php';

	$database = new Database();
	$db = $database->getConnection();

	$user = new User($db);
	//check if contact number and password is in the database.

	$user->email_address = $_POST['email_address'];
	//check if the contact number is exists and last name is exists
	$email_address_exists = $user->emailExists();

	if ($email_address_exists) {
		include_once "utils/send_email.php";
		echo "<div class='forgot-alert-message-info'>";
			echo "We've sent and reset link to your Email.";
		echo "</div>";
		
	}else{
		echo "<div class='forgot-alert-message-error'>";
			echo "No Email address found.";
		echo "</div>";
	} 

}
?>

<!-- include the alert message  -->
<?php include_once 'alert_message.php'; ?>



<div class="fp-header">
	<img src="libs/images/Logo.png" alt="Logo">
    <p>Please enter your email address. We’ll send you a link to reset your password.</p>
</div>

<form class='form-forgot-sign' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
    <input type="email" name="email_address" placeholder="Enter Email address" required>
    <!-- <input type="password" name="password" placeholder="Enter password" required> -->
    <p>Already have Account? <a href="signin.php">SIGN IN!</a></p>
    <button type="submit">Send reset link</button>
</form>
</div>
</div>

<?php include_once "layout_foot.php";?>