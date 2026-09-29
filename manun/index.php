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
  <title>Menu Management</title>
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
      <h2>Menu Management</h2>
      <a class="btn" href="add.php">+ Add New Menu</a>
      <table>
        <tr>
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
          echo "<tr>
    <td>" . $row['id'] . "</td>
    <td>" . $row['menu_name'] . "</td>
    <td>" . $row['category'] . "</td>
    <td>" . $row['price'] . "</td>
    <td>" . $row['status'] . "</td>
    <td>
    <a class='action' href='edit.php?id=" . $row['id'] . "'>Edit</a>
    <a class='action' href='deleto.php?id=" . $row['id'] . "'>Delete</a>
    </td>
    </tr>";
        }
        ?>
      </table>
    </div>
  </div>
</body>

</html>