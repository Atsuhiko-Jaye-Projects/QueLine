<?php
// Login checker based on user role

// Redirect Admins
if (isset($_SESSION['role']) && $_SESSION['role'] == "Admin") {
    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
    exit;
}

// Redirect Sellers
else if (isset($_SESSION['role']) && $_SESSION['role'] == "Student") {
    header("Location: {$home_url}student/index.php?action=logged_in_as_student");
    exit;
}
// redirect department head
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_head_cashier") {
    header("Location: {$home_url}department/dep_head_cashier/index.php?action=logged_in_as_dep_head_cashier");
    exit;
}

// redirect department head
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_head_admission") {
    header("Location: {$home_url}department/dep_head_admission/index.php?action=logged_in_as_dep_head_cashier");
    exit;
}
// redirect department head
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_head_mis") {
    header("Location: {$home_url}department/dep_head_mis/index.php?action=logged_in_as_dep_head_mis");
    exit;
}
// redirect department head
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_head_registar") {
    header("Location: {$home_url}department/dep_head_registar/index.php?action=logged_in_as_dep_head_registar");
    exit;
}
// redirect department staff
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_staff_cashier") {
    header("Location: {$home_url}department/dep_staff/dep_staff_cashier/index.php?action=logged_in_as_dep_staff_cashier");
    exit;
}
// redirect department head
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_staff_registar") {
    header("Location: {$home_url}department/dep_staff_registar/index.php?action=logged_in_as_dep_staff_registar");
    exit;
}
// redirect department head
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_staff_mis") {
    header("Location: {$home_url}department/dep_staff_mis/index.php?action=logged_in_as_dep_staff_mis");
    exit;
}
// redirect department head
else if (isset($_SESSION['role']) && $_SESSION['role'] == "dep_staff_admission") {
    header("Location: {$home_url}department/dep_staff_admission/index.php?action=logged_in_as_dep_staff_admission");
    exit;
}

// If login is required but user is not logged in
else if (isset($require_login) && $require_login == true) {
    if (!isset($_SESSION['role'])) {
        header("Location: {$home_url}login.php?action=please_login");
        exit;
    }
}

// If on login or signup page and user is already logged in as Consumer
else if (isset($page_title) && ($page_title == "Sign In" || $page_title == "Sign Up")) {
    if (isset($_SESSION['role']) && $_SESSION['role'] == "Consumer") {
        header("Location: {$home_url}index.php?action=already_logged_in");
        exit;
    }
}

// Otherwise: do nothing, allow access
?>

<!-- 
1=admin, 
2=student,
3=dep_head_cashier,
4=dep_head_admission,
5=dep_head_mis, 
6=dep_head_registrar, 
7=dep_staff_cashier,
8=dep_staff_admission,
9=dep_staff_mis,
10=dep_staff_registar

-->
