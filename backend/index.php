<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Student Login</h2>
    <form action="login.php" method="post">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        
        <p><a href="../backend/forgot_password.php">Forgot Password?</a></p><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
