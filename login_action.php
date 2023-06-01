<?php
session_start();
include 'connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if ($stmt->rowCount() == 1) {
    header('Location: home.php');
} else {
    try {
        $stmt2 = $conn->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        $stmt2->bindParam(':username', $username);
        $stmt2->bindParam(':password', $password);
        $stmt2->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    if ($stmt2->rowCount() == 1) {
        $_SESSION['username'] = $_POST['username'];
        header('Location: adminEdit.php');
    } else {
        $msg = 'Password/Username Salah';
        header('location: index.php?msg=' . $msg);
        exit();
    }
}
$_SESSION['username'] = $_POST['username'];
$conn = null;
