<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $menu_name = $_POST['menu_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("UPDATE menu SET menu_name = ?, category = ?, price = ?, status = ?, image_url = ? WHERE id = ?");
    $stmt->bind_param("ssdssi", $menu_name, $category, $price, $status, $image_url, $id);
    $stmt->execute();

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

    <nav class="navbar">
        <a href="../dashboard.php">Dashboard</a>
        <a href="index.php">Menu</a>
        <a href="../user/index.php">User</a>
        <a href="../logout.php">Logout</a>
    </nav>

    <div class="container">
        <div class="card">
            <h2>Edit Menu</h2>

            <form method="post">
                Menu Name:
                <input type="text" name="menu_name" value="<?php echo $row['menu_name']; ?>" required>

                Category:
                <input type="text" name="category" value="<?php echo $row['category']; ?>" required>

                Price:
                <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required>

                Status:
                <input type="text" name="status" value="<?php echo $row['status']; ?>" required>

                Image URL:
                <input type="text" name="image_url" value="<?php echo $row['image_url']; ?>"
                    placeholder="Paste image URL here">

                <input type="submit" name="update" value="Update">
            </form>

            <a href="index.php" class="back">Back to Menu</a>
        </div>
    </div>

</body>

</html>