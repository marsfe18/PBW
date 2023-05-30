<?php
include "connection.php";
// Mendapatkan data dari formulir
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthdate = $_POST['lahir'];
$gender = $_POST['jk'];

try {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, dob, gender) VALUES (:username, :email, :password, :birthdate, :gender)");

    // Mengikat parameter dengan nilai dari formulir
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':gender', $gender);

    // Menjalankan pernyataan INSERT
    $stmt->execute();

    // Menampilkan pesan sukses
    $msg = "Registration successful. Welcome, $username!";
    header("location: index.php?msg=" . $username);
} catch (PDOException $e) {
    // Menampilkan pesan kesalahan jika terjadi error
    echo "Error: " . $e->getMessage();
}
