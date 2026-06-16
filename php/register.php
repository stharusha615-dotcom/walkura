<?php
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get data from form using the name
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    //password Hashing
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    //check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists!'); window.location.href='../register.html';</script>";
    } else {
        //insert User
        $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration Successful! Please Login.'); window.location.href='../login.html';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();
?>