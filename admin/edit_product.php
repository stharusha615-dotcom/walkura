<?php
require_once("../php/db_conn.php");

$id = $_GET['id'];

$product = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM products WHERE id=$id")
);

if(isset($_POST['update'])){

$name=$_POST['name'];
$price=$_POST['price'];
$image=$_POST['image'];
$sizes=$_POST['sizes'];
$category=$_POST['category'];

mysqli_query($conn,"
UPDATE products
SET
name='$name',
price='$price',
image='$image',
sizes='$sizes',
category='$category'
WHERE id=$id
");

header("Location: products.php");
}
?>

<form method="POST">

<h2>Edit Product</h2>

<input type="text" name="name"
value="<?= $product['name'] ?>"><br><br>

<input type="number" name="price"
value="<?= $product['price'] ?>"><br><br>

<input type="text" name="image"
value="<?= $product['image'] ?>"><br><br>

<input type="text" name="sizes"
value="<?= $product['sizes'] ?>"><br><br>

<input type="text" name="category"
value="<?= $product['category'] ?>"><br><br>

<button name="update">Update</button>

</form>