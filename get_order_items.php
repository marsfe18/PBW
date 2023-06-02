<?php
include "connection.php";
// Mendapatkan order ID dari data POST
if (isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // Mengambil data order items berdasarkan order ID
    $stmt = $conn->prepare("SELECT order_item.*, produk.nama AS nama_produk, produk.price AS price, produk.kategori AS kategori FROM order_item
                            INNER JOIN produk ON order_item.produk_id = produk.id
                            WHERE order_item.order_id = :order_id");
    $stmt->bindParam(':order_id', $orderId);
    $stmt->execute();
    $orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Menampilkan data order items dalam format JSON
    echo json_encode($orderItems);
}
