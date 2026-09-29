<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $conn->query("UPDATE users SET username='$username', password='$password', phone='$phone', email='$email' WHERE id=$id");

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="navbar">
        <a href="../dashboard.php">Dashboard</a>
        <a href="../manun/index.php">Menu</a>
        <a href="index.php">User</a>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="card">
            <h2>Edit User</h2>
            <form method="post">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                <input type="submit" name="update" value="Update">
            </form>
            <a class="back" href="index.php">← Back</a>
        </div>
    </div>
</body>

</html>