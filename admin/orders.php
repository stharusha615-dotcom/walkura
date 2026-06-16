<?php
require_once "admin_auth.php";
require_once "../components/connect.php";

$orders = $conn->query("SELECT * FROM orders ORDER BY id DESC");
?>

<?php include "admin_header.php"; ?>

<h2>Orders</h2>

<table border="1">
<tr>
  <th>Order ID</th>
  <th>User</th>
  <th>Total</th>
  <th>Status</th>
</tr>

<?php while($o = $orders->fetch_assoc()): ?>
<tr>
  <td><?= $o['id'] ?></td>
  <td><?= $o['user_email'] ?></td>
  <td><?= $o['total'] ?></td>
  <td><?= $o['status'] ?></td>
</tr>
<?php endwhile; ?>
</table>
