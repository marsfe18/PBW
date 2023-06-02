<?php
include "connection.php";
if (isset($_POST['editproduk'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $img = $_FILES['image']['name'];
    $img_temp_name = $_FILES['image']['tmp_name'];
    $img_folder = 'assets/' . $img;

    // Menghapus gambar lama sebelum menggantinya
    $stmt = $conn->prepare("SELECT image FROM produk WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $old_img = $stmt->fetchColumn();

    if ($old_img) {
        unlink($old_img);
    }

    move_uploaded_file($img_temp_name, "assets/$img");

    // Query UPDATE menggunakan PDO
    $stmt = $conn->prepare("UPDATE produk SET nama = :name, kategori = :category, price = :price, image = :image, deskripsi = :description WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $cat);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $img_folder);
    $stmt->bindParam(':description', $desc);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: adminEdit.php");
    $conn = null;
}
