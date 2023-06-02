<?php
session_start();
include "connection.php";
$produk_id = $_POST['item_id']; // Nilai produk_id yang ingin dihapus
$user_id = $_SESSION['username']; // Nilai user_id yang ingin dihapus

$stmt = $conn->prepare("DELETE FROM cart_item WHERE produk_id = :produk_id AND user_id = :user_id LIMIT 1");
$stmt->bindParam(':produk_id', $produk_id);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

echo "Item berhasil dihapus.";
