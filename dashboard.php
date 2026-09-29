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

    <nav class="navbar">
        <a href="dashboard.php">Dashboard</a>
        <a href="manun/index.php">Menu</a>
        <a href="user/index.php">User</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="container">
        <div class="card dashboard">
            <h2>Resident Good Cafe</h2>
            <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
            <p>Manage your cafe menu and users from here.</p>

            <div class="dashboard-buttons">
                <a href="manun/index.php" class="dashboard-btn">
                    <h3>Menu</h3>
                    <p>Manage cafe menu</p>
                </a>

                <a href="user/index.php" class="dashboard-btn">
                    <h3>User</h3>
                    <p>Manage system users</p>
                </a>
            </div>
        </div>
    </div>

</body>

</html>