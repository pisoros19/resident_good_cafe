<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

if (isset($_POST['save'])) {
    $menu_name = $_POST['menu_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $conn->query("INSERT INTO menu (menu_name, category, price, status) VALUES ('$menu_name', '$category', '$price', '$status')");

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Menu</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="navbar">
        <a href="../dashboard.php">Dashboard</a>
        <a href="index.php">Menu</a>
        <a href="../user/index.php">User</a>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="card">
            <h2>Add Menu</h2>
            <form method="post">
                <label>Menu Name</label>
                <input type="text" name="menu_name" required>
                <label>Category</label>
                <input type="text" name="category" required>
                <label>Price</label>
                <input type="text" name="price" required>
                <label>Status</label>
                <input type="text" name="status" required>
                <input type="submit" name="save" value="Save">
            </form>
            <a class="back" href="index.php">← Back</a>
        </div>
    </div>
</body>

</html>