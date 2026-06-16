<?php
session_start();
require_once "../components/connect.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE adminEmail=? AND adminPassword=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        $_SESSION['admin_id'] = $admin['adminID'];
        $_SESSION['admin_email'] = $admin['adminEmail'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid admin credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Admin Login</h2>

<form method="POST">
  <input type="email" name="email" placeholder="Admin Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>

<p style="color:red"><?= $error ?></p>

</body>
</html>
