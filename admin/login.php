<?php
session_start();
require_once("../php/db_conn.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE adminEmail='$email' AND adminPassword='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        $_SESSION['admin'] = $email;
        header("Location: dashboard.php");
        exit();
    }else{
        $error = "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body{
background:#111827;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
font-family:Arial;
}
form{
background:#1f2937;
padding:30px;
border-radius:10px;
width:350px;
}
input{
width:100%;
padding:12px;
margin:10px 0;
}
button{
width:100%;
padding:12px;
background:#ff9800;
border:none;
color:white;
}
</style>
</head>
<body>

<form method="POST">

<h2 style="color:white">Walkura Admin</h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

</body>
</html>