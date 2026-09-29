<?php include 'db.php';
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM menu WHERE id=$id");

$row = $result->fetch_assoc();
?>
<h2>Edit Menu</h2>
<form method="post">
    Menu Name: <input type="text" name="menu_name" value="<?php echo $row['menu_name']; ?>"><br>
    Category: <input type="text" name="category" value="<?php echo $row['category']; ?>"><br>
    Price: <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>
    Status: <input type="text" name="status" value="<?php echo $row['status']; ?>"><br>
    <input type="submit" name="update" value="Update">
</form>

<?php

if (isset($_POST['update'])) {
    $menu_name = $_POST['menu_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $conn->query("UPDATE menu SET menu_name='$menu_name', category='$category', price='$price', status='$status' WHERE id=$id");

    header("Location: index.php");
}
?>