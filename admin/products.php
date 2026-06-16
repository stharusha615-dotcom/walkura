<?php
require_once "admin_auth.php";
require_once "../components/connect.php";

$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Products</title>
</head>
<body>

<?php include "admin_header.php"; ?>

<h2>Products</h2>
<a href="product_add.php">+ Add Product</a>

<table border="1">
<tr>
  <th>Name</th>
  <th>Price</th>
  <th>Action</th>
</tr>

<?php while($p = $products->fetch_assoc()): ?>
<tr>
  <td><?= $p['name'] ?></td>
  <td><?= $p['price'] ?></td>
  <td>
    <a href="product_edit.php?id=<?= $p['id'] ?>">Edit</a> |
    <a href="product_delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
  </td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
