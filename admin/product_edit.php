<?php
require_once "admin_auth.php";
require_once "../components/connect.php";

$id = $_GET['id'];
$p = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_POST) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE products SET name=?, price=? WHERE id=?");
    $stmt->bind_param("sdi", $name, $price, $id);
    $stmt->execute();

    header("Location: products.php");
}
?>

<form method="POST">
  <input name="name" value="<?= $p['name'] ?>">
  <input name="price" value="<?= $p['price'] ?>">
  <button>Update</button>
</form>
