<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $conn->query("UPDATE users SET username='$username', password='$password', phone='$phone', email='$email' WHERE id=$id");

    header("Location: index.php");
    exit();
}
?>
<h2>Edit Username</h2>
<form method="post">
    Username: <input type="text" name="username" value="<?php echo $row['username']; ?>"><br>
    Password: <input type="password" name="password" value="<?php echo $row['password']; ?>"><br>
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" name="update" value="Update">
</form>