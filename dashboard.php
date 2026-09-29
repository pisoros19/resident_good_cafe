<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<h2>Resident Good Cafe - Admin</h2>
<nav>
    <a href="manun/index.php">Menu</a> |
    <a href="user/index.php">User</a> |
    <a href="logout.php">Logout</a>
</nav>
<hr>
<h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>
<p>Welcome to the Admin System.</p>