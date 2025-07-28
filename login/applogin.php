<?php
// Dummy users (username => password)
$users = [
    'admin' => 'password123',
    'user1' => 'secret'
];

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check credentials
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Username: <input type="text" name="username"></label><br><br>
        <label>Password: <input type="password" name="password"></label><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
