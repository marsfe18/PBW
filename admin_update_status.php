<?php
include "connection.php";
$status = $_POST['status'];
$orderId = $_POST['order_id'];
// Update status order berdasarkan order ID
$query = "UPDATE orders SET status = :status WHERE id = :order_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':order_id', $orderId);
$stmt->execute();

echo "Status order berhasil diubah menjadi: $status";
