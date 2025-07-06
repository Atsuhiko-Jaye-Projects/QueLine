<?php

$id = isset($_GET['id']) ? $_GET['id']: die ("ERROR missing id");
$reset_password_token = isset($_GET['token']) ? $_GET['token']: die ("ERROR: missing invalid token"); 

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


	$user->id= $id;
	$user->access_code = $reset_password_token;

	$new_access_code = $utils->getToken();

	//check if the contact number is exists and last name is exists
	$access_token_exists = $user->accessCodeExists();
	$user->password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];


	if ($user->password != $confirm_password) {
		echo "<div class='forgot-alert-message-error'>";
			echo "Passwords do not match. Please try again.";
		echo "</div>";
	}

	if ($access_token_exists) {
		$user->updatePassword();
		echo "<div class='forgot-alert-message-info'>";
			echo "Your password has been changed.";
		echo "</div>";
		$sender->notifyPasswordChange($user->email, $user->firstname, $user->lastname);
		$user->access_code = $new_access_code;
		$user->insertToken();
		
		echo '<meta http-equiv="refresh" content="2;url=' . $home_url . 'signin.php">';
    	exit;
	}
	else{
		echo "<div class='forgot-alert-message-error'>";
			echo "Invalid access code or id";
		echo "</div>";
	} 

}
?>

<!-- include the alert message  -->
<?php include_once 'alert_message.php'; ?>

<div class="fp-header">
	<img src="libs/images/Logo.png" alt="Logo">
    <p>Fill in your new password to update your login.</p>
</div>

<form class='form-forgot-sign' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']. "?id={$id} && token={$reset_password_token} "); ?>" method='post'>
    <input type="password" name="password" placeholder="Enter new password" required>
    <input type="password" name="confirm_password" placeholder="Confirm password" required>
    <button type="submit">Reset Password</button>
</form>
</div>
</div>

<?php include_once "layout_foot.php";?>