<?php
require_once("../php/db_conn.php");

if(isset($_POST['update'])){

$id=$_POST['id'];
$status=$_POST['status'];

mysqli_query($conn,"
UPDATE orders
SET status='$status'
WHERE id='$id'
");
}

$orders=mysqli_query($conn,"
SELECT *
FROM orders
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Orders</title>

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

h1{
    margin-bottom:25px;
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

select{
    padding:8px;
    border:none;
    border-radius:6px;
    background:#334155;
    color:white;
    margin-right:5px;
}

button{
    padding:8px 14px;
    border:none;
    border-radius:6px;
    background:#ff9800;
    color:white;
    cursor:pointer;
}

button:hover{
    background:#e68900;
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

<h1>Orders</h1>

<table>

<tr>
<th>ID</th>
<th>User ID</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
<th>Update Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($orders)){ ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['user_id'] ?></td>
<td>Rs. <?= number_format($row['total_amount'],2) ?></td>
<td><?= $row['status'] ?></td>
<td><?= $row['order_date'] ?></td>

<td>

<form method="POST">

<input type="hidden"
name="id"
value="<?= $row['id'] ?>">

<select name="status">

<option <?= $row['status']=="Pending" ? "selected" : "" ?>>
Pending
</option>

<option <?= $row['status']=="Processing" ? "selected" : "" ?>>
Processing
</option>

<option <?= $row['status']=="Delivered" ? "selected" : "" ?>>
Delivered
</option>

</select>

<button type="submit" name="update">
Save
</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>