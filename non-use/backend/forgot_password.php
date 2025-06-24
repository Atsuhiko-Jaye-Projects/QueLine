<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $otp = rand(100000, 999999);
        $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

        $stmt = $conn->prepare("UPDATE users SET otp_code = ?, otp_expiry = ? WHERE email = ?");
        $stmt->bind_param("sss", $otp, $expiry, $email);
        $stmt->execute();

        echo "✅ OTP sent to your email (simulated): <strong>$otp</strong><br>";
        echo "<a href='verify_otp.php?email=$email'>Go to OTP Verification</a>";
    } else {
        echo "❌ No account found with that email.";
    }
}
?>

<h2>Forgot Password</h2>
<form method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">Send OTP</button>
</form>
