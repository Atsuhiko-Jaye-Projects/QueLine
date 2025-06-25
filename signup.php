<?php
include_once "config/core.php";



$page_title = "OQMS-Sign-up";
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
	include_once "utils/utils.php";

	$utils = new Utils;

	
	$access_code = $utils->getToken();

    $user->contact_number = $_POST['contact_number'];
    
    $user->lastname = $_POST['lastname'];
    $user->email= $_POST['email'];
    $user->access_code = $access_code;


    if ($user->isEmailExists()){
        echo "<div class='forgot-alert-message-error'>";
             echo "Email address.is already taken.";
			// echo "Contact No. is already taken.";
		echo "</div>";

    }
    if ($user->isContactExists()){
        echo "<div class='forgot-alert-message-error'>";
            echo "Contact No. is already taken.";
			// echo "Email address.is already taken.";
		echo "</div>";
    }
    else{
    	$user->createAccount();
    	echo "<div class='forgot-alert-message-info'>";
            echo "Welcome to OQMC! Your account is ready.";
			// echo "Email address.is already taken.";
		echo "</div>";
    }


}

?>
	<?php include_once 'alert_message.php'; ?>

		<div class='signin-header'>
			<img src="libs/images/Logo.png" alt="Logo">
			<p>Join the OQMC community!</p>
			<p>Create your account and start using our services.</p>
		</div>

		<form class='form-signin' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
			<input type="tel" name="contact_number" placeholder="Enter Cellphone No." pattern="09[0-9]{9}" maxlength="11" required>
			<input type="email" name="email" placeholder="Enter Email Address" required>
            <input type="input" name="lastname" placeholder="Enter Last Name" required>
			<button type="button" name="send-otp">SEND OTP</button> <!-- Consider implementing OTP -->
			<p>Already have Account? <a href="signin.php">SIGN IN!</a></p>
			<button type="submit" name="login" >Sign Up</button>
		</form>
	</div>
</div>

<?php include_once "layout_foot.php";?>