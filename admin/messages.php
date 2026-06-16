<?php
require_once("../php/db_conn.php");

$result=mysqli_query($conn,"
SELECT *
FROM messages
ORDER BY id DESC
");
?>

<h1>Customer Messages</h1>

<table border="1" cellpadding="10">

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
<td><?= $row['name'] ?></td>
<td><?= $row['phone'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['subject'] ?></td>
<td><?= $row['message'] ?></td>
<td><?= $row['submitted_at'] ?></td>

</tr>

<?php } ?>

</table>