<?php

$action=isset($_GET['action']) ? $_GET['action'] : "";
//tell user hes not yet logged in

if ($action == "not_yet_logged_in") {
    echo "<div class='signin-alert-message-warning' role='alert'>Welcome! Let’s get you signed in.</div>";
}

else if($action=='please_login'){
    echo "<div class='signin-alert-info' id='alert_message'>";
        echo "<strong>Please login to access that page.</strong>";
    echo "</div>";
}

elseif ($action=='email_verified') {
    echo "<div class='alert alert-success'>";
        echo "<strong>Email address has been validated</strong>";
    echo "</div>";
}

if ($access_denied) {
    echo "<div class='signin-alert-message-error' role='alert'>";
        echo "Oops! Something’s Not Right <br/> <br/>";
        echo "Please double-check your Username or Password.";
    echo "</div>";
}
?>