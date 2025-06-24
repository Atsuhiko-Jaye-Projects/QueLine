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

// dep_head_cashier logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_head_cashier" &&
    strpos($current_url, 'department/department_head/department_head_cashier/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_cashier/index.php?action=logged_in_as_DHC");
    exit();
}

// dep_head_admission logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_head_admission" &&
    strpos($current_url, 'department/department_head/department_head_admission/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_admission/index.php?action=logged_in_as_DHA");
    exit();
}

// dep_head_MIS logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_head_MIS" &&
    strpos($current_url, 'department/department_head/department_head_MIS/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_MIS/index.php?action=logged_in_as_DHM");
    exit();
}

// dep_head_registrar logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_head_registrar" &&
    strpos($current_url, 'department/department_head/department_head_registrar/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_registrar/index.php?action=logged_in_as_DHR");
    exit();
}

// dep_staff_cashier logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_staff_cashier" &&
    strpos($current_url, 'department/department_head/department_head_cashier/department_staff/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_cashier/department_staff/index.php?action=logged_in_as_DSC");
    exit();
}

// dep_staff_admission logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_staff_admission" &&
    strpos($current_url, 'department/department_head/department_head_admission/department_staff/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_admission/department_staff/index.php?action=logged_in_as_DSA");
    exit();
}

// dep_staff_MIS logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_staff_MIS" &&
    strpos($current_url, 'department/department_head/department_head_MIS/department_staff/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_MIS/department_staff/index.php?action=logged_in_as_DSA");
    exit();
}

// dep_staff_registrar logic
else if (isset($_SESSION['logged_in'], $_SESSION['user_type']) &&
    $_SESSION['logged_in'] === true &&
    $_SESSION['user_type'] == "dept_staff_registrar" &&
    strpos($current_url, 'department/department_head/department_head_registrar/department_staff/index.php') === false) {

    header("Location: {$home_url}department/department_head/department_head_registrar/department_staff/index.php?action=logged_in_as_DSR");
    exit();
}

// Require login enforcement
if (isset($require_login) && $require_login === true) {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: {$home_url}signin.php?action=please_login");
        exit();
    }

    // // Page-specific access check
    // if (isset($isAccessible) && !$isAccessible) {
    //     header("Location: {$home_url}user/index.php?action=access_denied");
    //     exit();
    // }
}
?>