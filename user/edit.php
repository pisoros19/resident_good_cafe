<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, phone = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $username, $password, $phone, $email, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
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
            <h2>Edit User</h2>

            <form method="post">
                Username:
                <input type="text" name="username" value="<?php echo $row['username']; ?>" required>

                Password:
                <input type="password" name="password" value="<?php echo $row['password']; ?>" required>

                Phone:
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>

                Email:
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

                <input type="submit" name="update" value="Update">
            </form>

            <a href="index.php" class="back">Back to User</a>
        </div>
    </div>

</body>

</html>