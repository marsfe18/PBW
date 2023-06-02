<?php
session_start();
include "connection.php";
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT p.id, p.nama, p.kategori, p.price, p.image, p.deskripsi
                       FROM cart_item ci
                       JOIN produk p ON ci.produk_id = p.id
                       JOIN users u ON ci.user_id = u.username
                       WHERE u.username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$produk = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Menampilkan hasil
echo json_encode($produk);
