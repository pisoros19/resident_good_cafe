<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $conn->query("INSERT INTO users (username,password,phone,email) VALUES ('$username','$password','$phone','$email')");

    header("Location: index.php");
    exit();
}
?>
<h2>Add Username</h2>
<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Phone: <input type="text" name="phone"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" name="save" value="Save">
</form>