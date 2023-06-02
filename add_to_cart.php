<?php
session_start();
include "connection.php";
// Mendapatkan data item dari request
$item = json_decode($_POST['item'], true);

// Mendapatkan username dari session atau input (sesuaikan dengan implementasi Anda)
$username = $_SESSION['username'];


// Memasukkan item ke tabel cart_item
$stmt = $conn->prepare('INSERT INTO cart_item (user_id, produk_id) VALUES (:username, :produk_id)');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':produk_id', $item['id']);
$stmt->execute();

// Respon berhasil (jika diperlukan)
echo 'Item berhasil ditambahkan ke keranjang';
