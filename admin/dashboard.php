<?php
session_start();
require_once("../php/db_conn.php");

// Statistics
$productCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM products"))['total'];

$orderCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders"))['total'];

$userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];

$revenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) AS revenue FROM orders"))['revenue'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Walkura Admin</title>

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

.cards{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.card{
    background:#1e293b;
    padding:25px;
    border-radius:12px;
}

.card h3{
    color:#ff9800;
    margin-bottom:10px;
}

table{
    width:100%;
    margin-top:30px;
    border-collapse:collapse;
}

table th,
table td{
    padding:12px;
    border-bottom:1px solid #333;
    text-align:left;
}

table th{
    background:#1e293b;
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
    <a href="logout.php">Logout</a>
</div>

<div class="main">

<h1>Dashboard</h1>

<br>

<div class="cards">

<div class="card">
<h3>Products</h3>
<h1><?php echo $productCount; ?></h1>
</div>

<div class="card">
<h3>Orders</h3>
<h1><?php echo $orderCount; ?></h1>
</div>

<div class="card">
<h3>Users</h3>
<h1><?php echo $userCount; ?></h1>
</div>

<div class="card">
<h3>Revenue</h3>
<h1>Rs. <?php echo number_format($revenue ?? 0,2); ?></h1>
</div>

</div>

<h2 style="margin-top:40px;">Recent Orders</h2>

<table>
<tr>
<th>ID</th>
<th>User ID</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php

$orders = mysqli_query($conn,"
SELECT * FROM orders
ORDER BY id DESC
LIMIT 10
");

while($row = mysqli_fetch_assoc($orders))
{
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td>Rs. <?php echo $row['total_amount']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['order_date']; ?></td>
</tr>
<?php
}
?>

</table>

</div>

</body>
</html>