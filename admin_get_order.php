<?php
// Koneksi ke database menggunakan PDO
include 'connection.php';
if (isset($_POST['status'])) {
    $status = $_POST['status'];
    $query = "SELECT id, user_id, tgl_beli, status FROM orders WHERE status = :status ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $status);
} else {
    $query = "SELECT id, user_id, tgl_beli, status FROM orders";
    $stmt = $conn->prepare($query);
}

// Query untuk mendapatkan daftar orders
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mengembalikan hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($orders);
