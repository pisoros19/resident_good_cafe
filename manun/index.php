<?php include 'db.php'; ?>

<h2>Menu List</h2>

<a href="add.php">Add New Menu</a>

<table border="1" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Menu Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Status</th>
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
      <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
      <a href='deleto.php?id=" . $row['id'] . "'>Delete</a>
    </td>
  </tr>";
  }
  ?>
</table>