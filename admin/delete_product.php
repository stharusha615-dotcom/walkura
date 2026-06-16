<?php

require_once("../php/db_conn.php");

$id = $_GET['id'];

mysqli_query($conn,"
DELETE FROM products
WHERE id=$id
");

header("Location: products.php");
exit();
?>