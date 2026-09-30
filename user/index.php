<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>

<head>
  <title>User List</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <nav class="navbar">
    <a href="../dashboard.php">Dashboard</a>
    <a href="../manun/index.php">Menu</a>
    <a href="index.php">User</a>
    <a href="../logout.php">Logout</a>
  </nav>

  <div class="container">
    <div class="card">
      <h2>User List</h2>

      <a href="add.php" class="btn">Add New User</a>

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
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['password'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['email'] . "</td>
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