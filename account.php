<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Walkura - Account</title>
  <link rel="stylesheet" href="account.css">
  <link rel="stylesheet" href="falling-stars.css">
  <link rel="stylesheet" href="stars.css">
  
<body>
 
  <nav class="navbar" id="main-navbar">
    <button class="nav-toggle" aria-label="Toggle navigation" onclick="document.getElementById('main-navbar').classList.toggle('open')">&#9776;</button>
    <li>
    <a href="walkura.html">
      <img src="walkuralogo.png" alt="Walkura Logo" class="logo" >
    </a>
    </li>
    <ul>
  <li><a href="walkura.html">Home</a></li>
  <li><a href="products.html">Products</a></li>
  <li><a href="account.php ">Account</a></li>
  <li><a href="cart.html">Cart (<span id="cartCount">0</span>)</a></li>
  <li><a href="support.html">Support</a></li>
    </ul>
  </nav>

  <div class="account-container">
    <h2>My Account</h2>

    <div class="account-box">
        <img src="User.png" alt="User" class="user-img">

        <h3><?php echo $_SESSION['fullname']; ?></h3>
        <p>Email: <?php echo $_SESSION['email']; ?></p>

        <button class="btn">Edit Profile</button>
        <a href="php/logout.php">
            <button class="btn logout">Logout</button>
        </a>
    </div>
</div>

     <footer class="footer">
<script>
  function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let count = cart.reduce((sum, item) => sum + item.quantity, 0);
    document.getElementById('cartCount').textContent = count;
  }
  window.onload = updateCartCount;
</script>
    <h2>Walkura Shoe Store</h2>
    <p>Your one-stop online shoe store for sneakers, sports, formal shoes and slippers. Shop 24/7 with convenience.</p>
    
    <div class="social-icons">
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube"></a>
    </div>

    <p class="copyright">&copy; 2025 Walkura. All rights reserved.</p>
  </footer>

<script src="stars.js"></script>

</body>
</html>

