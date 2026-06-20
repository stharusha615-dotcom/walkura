<?php
require_once("../php/db_conn.php");

if(isset($_POST['add'])){

$name=$_POST['name'];
$price=$_POST['price'];
$sizes=$_POST['sizes'];
$category=$_POST['category'];
$image=$_POST['image'];

mysqli_query($conn,"
INSERT INTO products
(name,price,image,sizes,category)
VALUES
('$name','$price','$image','$sizes','$category')
");

header("Location: products.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#0f172a;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.form-container{
    background:#1e293b;
    width:500px;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 15px rgba(0,0,0,0.3);
}

.form-container h2{
    text-align:center;
    color:#ff9800;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    margin-bottom:15px;
    background:#334155;
    color:white;
    font-size:15px;
}

input::placeholder{
    color:#cbd5e1;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#ff9800;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#e68900;
}

.back-btn{
    display:block;
    text-align:center;
    margin-top:15px;
    color:#ff9800;
    text-decoration:none;
}

.back-btn:hover{
    text-decoration:underline;
}

</style>

</head>
<body>

<div class="form-container">

<h2>Add Product</h2>

<form method="POST">

<input type="text" name="name" placeholder="Product Name" required>

<input type="number" name="price" placeholder="Price" required>

<input type="text" name="image" placeholder="Image filename.jpg" required>

<input type="text" name="sizes" placeholder="7,8,9,10" required>

<input type="text" name="category" placeholder="Sneakers" required>

<button type="submit" name="add">Add Product</button>

</form>

<a href="products.php" class="back-btn">← Back to Products</a>

</div>

</body>
</html>