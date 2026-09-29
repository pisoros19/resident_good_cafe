<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Menu List</title>
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
      <h2>Menu List</h2>

      <a href="add.php" class="btn">Add New Menu</a>

      <table>
        <tr>
          <th>Image</th>
          <th>ID</th>
          <th>Menu Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Status</th>
          <th>Action</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM menu");

        while ($row = $result->fetch_assoc()) {
          $image = !empty($row['image_url']) ? $row['image_url'] : 'https://via.placeholder.com/100x100?text=Food';

          echo "<tr>
                <td><img src='" . $image . "' class='food-image'></td>
                <td>" . $row['id'] . "</td>
                <td>" . $row['menu_name'] . "</td>
                <td>" . $row['category'] . "</td>
                <td>RM " . $row['price'] . "</td>
                <td>" . $row['status'] . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "' class='action'>Edit</a>
                    <a href='deleto.php?id=" . $row['id'] . "' class='action'>Delete</a>
                </td>
                </tr>";
        }
        ?>
      </table>
    </div>
  </div>

</body>

</html>