<?php
require_once "admin_auth.php";
require_once "../components/connect.php";

$id = $_GET['id'];
$conn->query("DELETE FROM products WHERE id=$id");

header("Location: products.php");
