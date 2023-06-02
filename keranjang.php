<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/keranjang.css">
    <link rel="stylesheet" href="css/keranjangBox.css">
    <link rel="shortcut icon" href="assets/icon.png">

    <title>CART</title>
</head>

<body>
    <?php include 'navigasi.php'; ?>

    <main>
        <div class="top">
            <ul>
                <li><a href="riwayat.php">Riwayat</a></li>
                <li><a href="keranjang.php">Keranjang</a></li>
            </ul>
        </div>
        <div id="cart-items">

        </div>
        <div id="cart-total">
            <button onclick="showPaymentForm()">Bayar</button>
        </div>
    </main>


    <div id="paymentForm" class="popup-form">
        <div class="form-content">
            <span class="close" onclick="closePaymentForm()">&times;</span>


            <h2>Bayar dulu bos</h2>
            <form id="paymentFormContent" method="POST" enctype="multipart/form-data">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required>

                <label for="jenisPembayaran">Jenis Pembayaran</label>
                <select id="jenisPembayaran" name="jenisPembayaran" onchange="showAlamatPembayaran(this.value)">
                    <option value="usdc">USDC-Polygon</option>
                    <option value="nomor">Gopay, Shopee, OVO, Linkaja</option>
                    <option value="paypal">Paypal</option>
                </select>

                <label for="alamatPembayaran">Alamat Pembayaran</label>
                <div class="alamat-pembayaran">
                    <input type="text" id="alamatPembayaran" name="alamatPembayaran" readonly>
                    <button class="copy-button" onclick="copyAlamat()">Salin</button>
                </div>

                <label for="buktiPembayaran">Bukti Pembayaran</label>
                <input type="file" id="buktiPembayaran" name="buktiPembayaran" accept="image/*" required>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script src="js/show_cart.js"></script>
    <script src="js/bayarBox.js"></script>
    <?php include 'footer.php'; ?>
</body>