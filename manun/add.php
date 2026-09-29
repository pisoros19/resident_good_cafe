<?php include 'db.php'; ?>

<h2>Add Menu</h2>

<form method="post">
    Menu Name: <input type="text" name="menu_name"><br>
    Category: <input type="text" name="category"><br>
    Price: <input type="text" name="price"><br>
    Status: <input type="text" name="status"><br>
    <input type="submit" name="save" value="Save">
</form>

<?php
if (isset($_POST['save'])) {
    $menu_name = $_POST['menu_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $conn->query("INSERT INTO menu (menu_name, category, price, status) VALUES ('$menu_name', '$category', '$price', '$status')");

    header("Location: index.php");
}
?>