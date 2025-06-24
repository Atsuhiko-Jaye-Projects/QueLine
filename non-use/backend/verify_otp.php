<?php
require 'db.php';

$email = $_GET['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    $stmt = $conn->prepare("SELECT otp_code, otp_expiry FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $current_time = date("Y-m-d H:i:s");

    if ($user && $otp === $user['otp_code'] && $current_time <= $user['otp_expiry']) {
        header("Location: reset_password.php?email=" . urlencode($email));
        exit();
    } else {
        echo "❌ Invalid or expired OTP.";
    }
}
?>

<h2>Verify OTP</h2>
<form method="post">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <label>Enter OTP:</label><br>
    <input type="text" name="otp" required><br><br>
    <button type="submit">Verify OTP</button>
</form>
