<?php
session_start();

include 'db_conn.php'; 

header('Content-Type: application/json');

// Login check — return clear message
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "status" => "error", 
        "message" => "Please login to checkout.",
        "redirect" => "login.html"
    ]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);
if (!$data || empty($data['cart'])) {
    echo json_encode(["status" => "error", "message" => "Cart is empty."]);
    exit();
}

$user_id = $_SESSION['user_id'];
$cart    = $data['cart'];
$total   = 0;

foreach ($cart as $item) {
    $total += ($item['price'] * $item['quantity']);
}

$stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "DB Error: " . $conn->error]);
    exit();
}

$stmt->bind_param("id", $user_id, $total);

if ($stmt->execute()) {
    $order_id = $stmt->insert_id;

    $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity, size) VALUES (?, ?, ?, ?, ?)");
    
    foreach ($cart as $item) {
        $name     = $item['name'];
        $price    = (float)$item['price'];
        $quantity = (int)$item['quantity'];
        $size     = isset($item['size']) ? $item['size'] : 'N/A';

        $stmt_item->bind_param("isdis", $order_id, $name, $price, $quantity, $size);
        $stmt_item->execute();
    }

    echo json_encode(["status" => "success", "message" => "Order placed successfully!", "order_id" => $order_id]);

} else {
    echo json_encode(["status" => "error", "message" => "Order failed: " . $stmt->error]);
}

$conn->close();
?>