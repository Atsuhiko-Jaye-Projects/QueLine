<?php
require 'db.php';

$email = $_GET['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    function isPasswordStrong($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/', $password);
    }

    if ($new_password !== $confirm_password) {
        echo "❌ Passwords do not match.";
    }
    elseif (!isPasswordStrong($new_password)) {
        echo "❌ Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.";
    }
    else {
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ?, otp_code = NULL, otp_expiry = NULL WHERE email = ?");
        $stmt->bind_param("ss", $hashed, $email);
        if ($stmt->execute()) {
            echo "✅ Password has been reset! <a href='index.php'>Login</a>";
        } else {
            echo "❌ Failed to reset password.";
        }
    }
}
?>

<h2>Reset Password</h2>
<form method="post">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <label>New Password:</label><br>
    <input type="password" name="new_password" required><br><br>
    <label>Confirm New Password:</label><br>
    <input type="password" name="confirm_password" required><br><br>
    <button type="submit">Reset Password</button>
</form>
