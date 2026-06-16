<?php require_once "admin_auth.php"; 
require_once "../php/db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="../walkura.css"/>
  <link rel="stylesheet" href="../falling-stars.css"/>
  <link rel="stylesheet" href="../stars.css"/>
</head>
<body>
  <nav class="navbar" id="main-navbar" style="background:rgba(0,0,0,0.25);backdrop-filter:blur(4px);">
    <button class="nav-toggle" aria-label="Toggle navigation" onclick="document.getElementById('main-navbar').classList.toggle('open')">&#9776;</button>
    <li>
    <a href="../walkura.html">
      <img src="../walkuralogo.png" alt="Walkura Logo" class="logo" >
    </a>
    </li>
    <ul>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="products.php">Products</a></li>
  <li><a href="orders.php">Orders</a></li>
  <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>

