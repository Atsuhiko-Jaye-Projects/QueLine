<?php
// Redirect admin if already logged in
$current_url = $_SERVER['REQUEST_URI']; // e.g., /admin/index.php

// Avoid redirecting if already on the target admin page
if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "Admin" &&
    strpos($current_url, 'admin/index.php') === false) {

    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
    exit();
}

// Student logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "Student" &&
    strpos($current_url, 'student/index.php') === false) {

    header("Location: {$home_url}student/index.php?action=logged_in_as_student");
    exit();
}

// Student logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "Student" &&
    strpos($current_url, 'student/index.php') === false) {

    header("Location: {$home_url}student/index.php?action=logged_in_as_student");
    exit();
}



// Require login enforcement
if (isset($require_login) && $require_login === true) {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: {$home_url}signin.php?action=please_login");
        exit();
    }

    // Page-specific access check
    if (isset($isAccessible) && !$isAccessible) {
        header("Location: {$home_url}user/index.php?action=access_denied");
        exit();
    }
}
?>