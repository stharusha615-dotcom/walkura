<?php
require_once "admin_auth.php";
require_once "../components/connect.php";

if ($_POST) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (?,?)");
    $stmt->bind_param("sd", $name, $price);
    $stmt->execute();

    header("Location: products.php");
}
?>

<form method="POST">
  <input name="name" placeholder="Product Name" required>
  <input name="price" placeholder="Price" required>
  <button>Add Product</button>
</form>
