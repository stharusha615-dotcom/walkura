<?php
require_once "admin_auth.php";
require_once "../php/db_conn.php";


$p = $conn->query("SELECT COUNT(*) c FROM products")->fetch_assoc()['c'];
$o = $conn->query("SELECT COUNT(*) c FROM orders")->fetch_assoc()['c'];
?>

<?php include "admin_header.php"; ?>

<section class="hero">
<h2>Admin Dashboard</h2>

<p>Total Products: <?= $p ?></p>
<p>Total Orders: <?= $o ?></p>
</section>

</body>
</html>
