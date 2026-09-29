<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM menu WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $menu_name = $_POST['menu_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $conn->query("UPDATE menu SET menu_name='$menu_name', category='$category', price='$price', status='$status' WHERE id=$id");

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Menu</title>
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
            <h2>Edit Menu</h2>
            <form method="post">
                <label>Menu Name</label>
                <input type="text" name="menu_name" value="<?php echo $row['menu_name']; ?>" required>
                <label>Category</label>
                <input type="text" name="category" value="<?php echo $row['category']; ?>" required>
                <label>Price</label>
                <input type="text" name="price" value="<?php echo $row['price']; ?>" required>
                <label>Status</label>
                <input type="text" name="status" value="<?php echo $row['status']; ?>" required>
                <input type="submit" name="update" value="Update">
            </form>
            <a class="back" href="index.php">← Back</a>
        </div>
    </div>
</body>

</html>