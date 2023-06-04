<?php
include 'connection.php';
$orderId = $_POST['order_id'];
// $orderId = 9;
// Query untuk mendapatkan detail order berdasarkan order ID
$query = "SELECT id, address, image, metode, status, tgl_beli, user_id FROM orders WHERE id = :order_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':order_id', $orderId);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Mengembalikan hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($order);
