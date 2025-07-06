<?php
include_once "config/core.php";
$page_title = "QQMS-Forgot Password";
include_once "layout_head.php";

include_once "login_checker.php";
$require_login=false;

// default to false
$access_denied=false;



if ($_POST) {
	include_once 'config/database.php';
	include_once 'objects/user.php';
	include_once 'utils/send_email.php';
	include_once 'utils/utils.php';

	$database = new Database();
	$db = $database->getConnection();

	$user = new User($db);
	$sender = new Sender();
	$utils = new Utils();



	//check if contact number and password is in the database.

	$user->email = $_POST['email'];
	//check if the contact number is exists and last name is exists
	$email_address_exists = $user->emailExists();

	if ($email_address_exists) {

		$password_attempt = $user->resetPasswordCount();
		if ($password_attempt !== false && $password_attempt < 3) {
				$token = $utils->getToken();
			echo "<div class='forgot-alert-message-info'>";
				echo "We've sent and reset link to your Email.";
			echo "</div>";

			$id = $user->id;
			$sender->sendResetPassword($user->email, $user->lastname, $id, $token);
			$user->access_code = $token;
			$user->insertToken();

			$user->incrementResetAttempt();
		}else{
			echo "<div class='forgot-alert-message-error'>";
				echo "You've reached the maximum attempt today, please try again after 24hrs.";
			echo "</div>";
		}

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
    <input type="email" name="email" placeholder="Enter Email address" required>
    <!-- <input type="password" name="password" placeholder="Enter password" required> -->
    <p>Already have Account? <a href="signin.php">SIGN IN!</a></p>
    <button type="submit" id="sendResetBtn">Send reset link</button>
</form>
</div>
</div>

<?php include_once "layout_foot.php";?>