<?php
require_once("../php/db_conn.php");
$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>
</head>
<body>

<h1>Products</h1>

<a href="add_product.php">Add Product</a>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Image</th>
<th>Name</th>
<th>Price</th>
<th>Sizes</th>
<th>Category</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td>
<img src="../<?= $row['image'] ?>" width="80">
</td>

<td><?= $row['name'] ?></td>

<td>Rs. <?= $row['price'] ?></td>

<td><?= $row['sizes'] ?></td>

<td><?= $row['category'] ?></td>

<td>
<a href="edit_product.php?id=<?= $row['id'] ?>">Edit</a>
|
<a href="delete_product.php?id=<?= $row['id'] ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>