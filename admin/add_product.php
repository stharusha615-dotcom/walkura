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
}
?>

<form method="POST">

<h2>Add Product</h2>

<input type="text" name="name" placeholder="Product Name" required><br><br>

<input type="number" name="price" placeholder="Price" required><br><br>

<input type="text" name="image" placeholder="Image filename.jpg" required><br><br>

<input type="text" name="sizes" placeholder="7,8,9,10" required><br><br>

<input type="text" name="category" placeholder="Sneakers" required><br><br>

<button name="add">Add Product</button>

</form>