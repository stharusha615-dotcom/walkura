<?php
require_once("../php/db_conn.php");
$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>

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
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100vh;
    background:#111827;
    padding:20px;
}

.sidebar h2{
    color:#ff9800;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    margin:8px 0;
    border-radius:8px;
}

.sidebar a:hover{
    background:#1f2937;
}

.main{
    margin-left:270px;
    padding:30px;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.add-btn{
    background:#ff9800;
    color:white;
    padding:12px 20px;
    text-decoration:none;
    border-radius:8px;
}

.add-btn:hover{
    background:#e68900;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#1e293b;
    border-radius:12px;
    overflow:hidden;
}

table th{
    background:#111827;
    color:#ff9800;
    padding:15px;
    text-align:left;
}

table td{
    padding:15px;
    border-bottom:1px solid #334155;
}

table tr:hover{
    background:#293548;
}

img{
    border-radius:8px;
}

.edit-btn{
    background:#22c55e;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:6px;
    margin-right:5px;
}

.edit-btn:hover{
    background:#16a34a;
}

.delete-btn{
    background:#ef4444;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:6px;
}

.delete-btn:hover{
    background:#dc2626;
}

</style>

</head>
<body>

<div class="sidebar">

    <h2>
        <a href="login.php" style="color: #ff9800; text-decoration: none;">Walkura Admin</a>
    </h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="products.php">Products</a>
    <a href="orders.php">Orders</a>
    <a href="messages.php">Messages</a>
    <a href="http://172.20.10.2/walkura/walkura.html">Logout</a>

</div>

<div class="main">

<div class="header">
    <h1>Products</h1>

    <a href="add_product.php" class="add-btn">
        + Add Product
    </a>
</div>

<table>

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

<td>Rs. <?= number_format($row['price'],2) ?></td>

<td><?= $row['sizes'] ?></td>

<td><?= $row['category'] ?></td>

<td>
<a class="edit-btn" href="edit_product.php?id=<?= $row['id'] ?>">
    Edit
</a>

<a class="delete-btn"
   href="delete_product.php?id=<?= $row['id'] ?>"
   onclick="return confirm('Delete this product?')">
    Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>