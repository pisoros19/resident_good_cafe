<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $phone, $email);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <nav class="navbar">
        <a href="../dashboard.php">Dashboard</a>
        <a href="../manun/index.php">Menu</a>
        <a href="index.php">User</a>
        <a href="../logout.php">Logout</a>
    </nav>

    <div class="container">
        <div class="card">
            <h2>Add User</h2>

            <form method="post">
                Username:
                <input type="text" name="username" required>

                Password:
                <input type="password" name="password" required>

                Phone:
                <input type="text" name="phone" required>

                Email:
                <input type="email" name="email" required>

                <input type="submit" name="save" value="Save">
            </form>

            <a href="index.php" class="back">Back to User</a>
        </div>
    </div>

</body>

</html>