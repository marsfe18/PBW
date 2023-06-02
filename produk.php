<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produk.css">
    <link rel="shortcut icon" href="assets/icon.png">
    <title>PRODUK</title>
    <style>
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <?php include 'navigasi.php'; ?>

    <main>
        <div class="konten">
            <nav class="konten-search">
                <!-- search bar 2 awal -->
                <div>
                    <input type="search" id="search-input" placeholder="Search product name here..">
                    <button id="search">Search</button>
                </div>
                <!-- search bar 2 akhir -->
                <div id="buttons">
                    <!-- tombol awal -->
                    <button class="button-value" id="All" onclick="filterProduct('all')">All</button>
                    <button class="button-value" id="Mouse" onclick="filterProduct('Mouse')">
                        Mouse
                    </button>
                    <button class="button-value" id="Keyboard" onclick="filterProduct('Keyboard')">
                        Keyboard
                    </button>
                    <button class="button-value" id="Headset" onclick="filterProduct('Headset')">
                        Headset
                    </button>
                    <!-- tombol akhir -->
                </div>
            </nav>

            <div id="products">

            </div>
        </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="js/produk.js"></script>

    </script>

</body>

</html>