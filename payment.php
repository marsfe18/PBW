<?php
session_start();
include "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alamat = $_POST["alamat"];
    $jenisPembayaran = $_POST["jenisPembayaran"];
    // $alamatPembayaran = $_POST["alamatPembayaran"];
    $tanggalBeli = date('Y-m-d');
    $user_id = $_SESSION['username'];
    $status = "pending";

    $image = $_FILES['buktiPembayaran']['name'];
    $tmp_image = $_FILES['buktiPembayaran']['tmp_name'];

    // Upload image
    move_uploaded_file($tmp_image, "payment/$image");


    $conn->beginTransaction();
    try {
        $stmt = $conn->prepare("INSERT INTO `orders` (user_id, status, address, tgl_beli, image, metode) VALUES (:user_id, :status, :address, :tgl_beli, :image, :metode)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':address', $alamat);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':tgl_beli', $tanggalBeli);
        $stmt->bindParam(':metode', $jenisPembayaran);

        // Eksekusi prepared statement
        $stmt->execute();
        $order_id = $conn->lastInsertId();

        // Mendapatkan data produk dari cart_item
        $stmt = $conn->prepare("SELECT * FROM cart_item WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Memasukkan produk ke order_item
        foreach ($cartItems as $cartItem) {
            $produk_id = $cartItem['produk_id'];

            // Memasukkan data produk ke order_item
            $stmt = $conn->prepare("INSERT INTO order_item (order_id, produk_id) VALUES (:order_id, :produk_id)");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':produk_id', $produk_id);

            // Eksekusi prepared statement
            $stmt->execute();
        }

        // Hapus produk dari cart_item
        $stmt = $conn->prepare("DELETE FROM cart_item WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        // Commit transaksi
        $conn->commit();

        // Tampilkan pesan berhasil atau lakukan tindakan lainnya sesuai dengan kebutuhan Anda
        echo json_encode("Pembayaran berhasil! Sedang diproses");
    } catch (PDOException $e) {
        // Rollback transaksi jika terjadi kesalahan
        $conn->rollback();
        echo "Terjadi kesalahan dalam pembayaran: " . $e->getMessage();
    }
    // echo "Pembayaran berhasil! Sedang diproses";
}
