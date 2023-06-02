<?php
include "connection.php";

$query = "SELECT id, nama, kategori, price, image, deskripsi FROM produk";
$stmt = $conn->query($query);
$produkList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format data sebagai array
$data = array('data' => $produkList);

// Mengirim respon sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
