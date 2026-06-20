<?php
require_once("../php/db_conn.php");

$result=mysqli_query($conn,"
SELECT *
FROM messages
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Messages</title>

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

.table-container{
    overflow-x:auto;
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
    vertical-align:top;
}

table tr:hover{
    background:#293548;
}

.message-box{
    max-width:350px;
    white-space:normal;
    word-wrap:break-word;
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

<h1>Customer Messages</h1>

<div class="table-container">

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Email</th>
<th>Subject</th>
<th>Message</th>
<th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= htmlspecialchars($row['name']) ?></td>

<td><?= htmlspecialchars($row['phone']) ?></td>

<td><?= htmlspecialchars($row['email']) ?></td>

<td><?= htmlspecialchars($row['subject']) ?></td>

<td class="message-box">
    <?= htmlspecialchars($row['message']) ?>
</td>

<td><?= $row['submitted_at'] ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>