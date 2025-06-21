<?php
include_once "config/core.php";

$page_title = "Sign in";
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
	$user->password = $_POST['password'];
	//check if the contact number is exists and last name is exists
	$credential_exists = $user->credentialExists();

	if ($credential_exists && password_verify($_POST['password'], $user->password)) {
		
		$_SESSION['logged_in'] = true;
		$_SESSION['user_type'] = $user->user_type;
		$_SESSION['user_id'] = $user->id;
		$_SESSION['firstname'] = $user->firstname;
		$_SESSION['lastname'] = $user->lastname;
		$_SESSION['mobile_number'] = $user->mobile_number;
		

		if ($user->user_type=='Admin') {
			header("Location:{$home_url}admin/index.php?action=login_success");
		}
		else if($user->user_type=='DH_cashier') {
			header("Location:{$home_url}department/department_head/department_head_cashier/index.php?action=logged_in_success_DHCs");
			exit;
    
		}else if($user->user_type=='DH_MIS') {
			header("Location:{$home_url}/department/department_head/department_head_cashier/index.php?action=login_success");
			
		}else{
			header("Location:{$home_url}student/index.php?action=login_success");
		}

	}else{
		$access_denied = true;
	} 

}

?>

<div class="container">
    <div class="form-box" id="login-form">

        <?php include_once 'alert_message.php'; ?>

        <img src="images/Logo.png" alt="Logo">
        <h2>Welcome Back!</h2>
        <h1>Please enter your details to login</h1>

        <form class='form-signin' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
            <input type="email" name="username" placeholder="Enter Username" required>
            <button type="button" name="send-otp">SEND OTP</button> <!-- Consider implementing OTP -->
            <input type="password" name="password" placeholder="Enter password" required>
            <p><a href="#">Forgot Password?</a></p>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>

<?php include_once "layout_foot.php";?>