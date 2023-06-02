<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/icon.png">
    <link rel="stylesheet" href="css/order.css">
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
    </main>

    <table id="orderTable">
        <thead>
            <tr>
                <th>Order ID</th>
                <!-- <th>User ID</th> -->
                <th>Tanggal Pembelian</th>
                <th>Status</th>
                <th>Metode Pembayaran</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div id="orderItemPopup" class="order-item-popup">
        <div class="order-item-content">
            <span class="close">&times;</span>
            <div><img src="" alt="" class="bukti"></div>
            <h2>Order Items</h2>
            <table id="orderItemTable">
                <thead>
                    <tr>
                        <th>Produk ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>

    <script src="js/show_order.js"></script>

</body>

</html>