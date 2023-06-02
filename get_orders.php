<?php
session_start();
include "connection.php";

// Mengambil data dari tabel orders
$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :username");
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Menampilkan data orders dalam format JSON
echo json_encode($orders);
