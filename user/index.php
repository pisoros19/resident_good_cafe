<?php include 'db.php'; ?>

<h2>Username List</h2>

<a href="add.php">Add New Username</a>

<table border="1" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Password</th>
    <th>Phone</th>
    <th>Email</th>
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
      <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
      <a href='deleto.php?id=" . $row['id'] . "'>Delete</a>
    </td>
  </tr>";
  }
  ?>
</table>