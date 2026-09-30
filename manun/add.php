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
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("INSERT INTO menu (menu_name, category, price, status, image_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdss", $menu_name, $category, $price, $status, $image_url);
    $stmt->execute();

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

    <nav class="navbar">
        <a href="../dashboard.php">Dashboard</a>
        <a href="index.php">Menu</a>
        <a href="../user/index.php">User</a>
        <a href="../logout.php">Logout</a>
    </nav>

    <div class="container">
        <div class="card">
            <h2>Add Menu</h2>

            <form method="post">
                Menu Name:
                <input type="text" name="menu_name" required>

                Category:
                <input type="text" name="category" required>

                Price:
                <input type="number" step="0.01" name="price" required>

                Status:
                <input type="text" name="status" required>

                Image URL:
                <input type="text" name="image_url" placeholder="Paste image URL here">

                <input type="submit" name="save" value="Save">
            </form>

            <a href="index.php" class="back">Back to Menu</a>
        </div>
    </div>

</body>

</html>