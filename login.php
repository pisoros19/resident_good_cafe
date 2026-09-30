<?php
session_start();
include 'user/db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login-box">
        <h2>Resident Good Cafe</h2>
        <h3>Admin Login</h3>

        <?php
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>

        <form method="post">
            Username:
            <input type="text" name="username" required>

            Password:
            <input type="password" name="password" required>

            <input type="submit" name="login" value="Login">
        </form>
    </div>

</body>

</html>