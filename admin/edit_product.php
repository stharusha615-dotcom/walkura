<?php
require_once("../php/db_conn.php");

$id = $_GET['id'];

$product = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM products WHERE id=$id")
);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $sizes = $_POST['sizes'];
    $category = $_POST['category'];

    mysqli_query($conn, "
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
    exit; // Good practice to prevent script execution after redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        /* Modern Dark Theme styling matching Walkura Admin */
        body {
            background-color: #0f172a; /* Deep dark blue background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #1e293b; /* Slightly lighter card background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
        }

        h2 {
            color: #ff9800; /* Walkura Admin primary orange */
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
            border-bottom: 2px solid #334155;
            padding-bottom: 10px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #94a3b8; /* Light gray labels */
            font-size: 14px;
            text-transform: capitalize;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            background-color: #0f172a;
            border: 1px solid #334155;
            border-radius: 6px;
            color: #ffffff;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #ff9800; /* Orange highlight on focus */
            outline: none;
        }

        button[name="update"] {
            width: 100%;
            padding: 12px;
            background-color: #ff9800; /* Matches your admin button style */
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        button[name="update"]:hover {
            background-color: #e68a00;
        }

        button[name="update"]:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

<div class="form-container">
    <form method="POST">
        <h2>Edit Product</h2>

        <div class="input-group">
            <label>Product Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>">
        </div>

        <div class="input-group">
            <label>Price (Rs.)</label>
            <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>">
        </div>

        <div class="input-group">
            <label>Image Filename / URL</label>
            <input type="text" name="image" value="<?= htmlspecialchars($product['image']) ?>">
        </div>

        <div class="input-group">
            <label>Available Sizes</label>
            <input type="text" name="sizes" value="<?= htmlspecialchars($product['sizes']) ?>">
        </div>

        <div class="input-group">
            <label>Category</label>
            <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>">
        </div>

        <button name="update">Update Product</button>
    </form>
</div>

</body>
</html>