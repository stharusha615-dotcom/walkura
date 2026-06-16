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

<h1>Orders</h1>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>User ID</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
<th>Update</th>
</tr>

<?php while($row=mysqli_fetch_assoc($orders)){ ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['user_id'] ?></td>
<td>Rs. <?= $row['total_amount'] ?></td>
<td><?= $row['status'] ?></td>
<td><?= $row['order_date'] ?></td>

<td>

<form method="POST">

<input type="hidden"
name="id"
value="<?= $row['id'] ?>">

<select name="status">

<option>Pending</option>
<option>Processing</option>
<option>Delivered</option>

</select>

<button name="update">
Save
</button>

</form>

</td>

</tr>

<?php } ?>

</table>