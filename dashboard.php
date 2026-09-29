<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manun/index.php">Menu</a>
        <a href="user/index.php">User</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="card">
            <h2>Admin Dashboard</h2>
            <h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>
            <p>Welcome to the Resident Good Cafe Admin System.</p>
        </div>
    </div>
</body>

</html>