<?php
include_once "config/core.php";

$page_title = "OQMS-Sign-in";
include_once "layout_head.php";


include_once "login_checker.php";
$require_login=false;

// default to false
$access_denied=false;

if ($_POST) {
	include_once 'config/database.php';
	include_once 'objects/user.php';

	$database = new Database();
	$db = $database->getConnection();

	$user = new User($db);
	//check if contact number and password is in the database.

	$user->username = $_POST['username'];
	$user->contact_number = $_POST['username'];
	$user->password = $_POST['password'];
	//check if the contact number is exists and last name is exists
	$credential_exists = $user->credentialExists();

	if ($credential_exists && password_verify($_POST['password'], $user->password)) {
		
		$_SESSION['logged_in'] = true;
		$_SESSION['user_type'] = $user->user_type;
		$_SESSION['user_id'] = $user->id;
		$_SESSION['firstname'] = $user->firstname;
		$_SESSION['lastname'] = $user->lastname;
		$_SESSION['contact_number'] = $user->contact_number;
		

		

		if ($user->user_type=='Admin') {
			header("Location:{$home_url}users/admin/index.php?action=login_success");
		}
		else if($user->user_type=='department_head_cashier') {
			header("Location:{$home_url}users/department_head/department_head_cashier/index.php?action=logged_in_success_DHCs");
			exit;
    
		}else if($user->user_type=='department_head_MIS') {
			header("Location:{$home_url}/department/department_head/department_head_MIS/index.php?action=login_success");
			
		}else{
			header("Location:{$home_url}student/index.php?action=login_success");
		}

	}else{
		$access_denied = true;
	} 

}

?>
	<?php include_once 'alert_message.php'; ?>

		<div class='signin-header'>
			<img src="libs/images/Logo.png" alt="Logo">
			<p>Welcome Back to OQMC!</p>
			<p>Sign in to access your account.</p>
		</div>

		<form class='form-signin' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
			<input type="input" name="username" placeholder="Enter Username" required>
			<input type="password" name="password" placeholder="Enter password" required>
			<button type="button" name="send-otp">SEND OTP</button> <!-- Consider implementing OTP -->
			<p>Having Password Issues? <a href="forgot_password.php">HERE</a></p>
			<button type="submit" name="login" >Sign In</button>
		</form>
	</div>
</div>

<?php include_once "layout_foot.php";?>