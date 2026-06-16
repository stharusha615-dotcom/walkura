<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //verify Password
        if (password_verify($pass, $row['password'])) {
            //set session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            
            echo "<script>alert('Login Successful!'); window.location.href='../walkura.html';</script>";
        } else {
            echo "<script>alert('Incorrect Password'); window.location.href='../login.html';</script>";
        }
    } else {
        echo "<script>alert('Email not found. Please Register.'); window.location.href='../register.html';</script>";
    }
}
$conn->close();
?>