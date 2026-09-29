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
  <title>User Management</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <div class="navbar">
    <a href="../dashboard.php">Dashboard</a>
    <a href="../manun/index.php">Menu</a>
    <a href="index.php">User</a>
    <a href="../logout.php">Logout</a>
  </div>
  <div class="container">
    <div class="card">
      <h2>User Management</h2>
      <a class="btn" href="add.php">+ Add New User</a>
      <table>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM users");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
    <td>" . $row['id'] . "</td>
    <td>" . $row['username'] . "</td>
    <td>" . $row['password'] . "</td>
    <td>" . $row['phone'] . "</td>
    <td>" . $row['email'] . "</td>
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