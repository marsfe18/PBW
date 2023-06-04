<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Orders List</title>
    <style>
        .content {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            z-index: 9999;
            overflow-y: auto;
            max-height: 400px;
            max-width: 300px;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }

        .popup button {
            margin-right: 10px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #999;
            cursor: pointer;
        }

        .filter-container {

            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #555;
            background-color: #fff;
            outline: none;
            cursor: pointer;
        }

        .filter-container:hover {
            border-color: #aaa;
        }

        .filter-container:focus {
            border-color: #444;
        }

        .filter-container option {
            padding: 5px;
        }

        .filter-container option:hover {
            background-color: #f5f5f5;
        }

        .filter-container option[value="semua"] {
            font-weight: bold;
        }

        .filter-container option[value="selesai"] {
            color: green;
        }

        .filter-container option[value="gagal"] {
            color: red;
        }

        .filter-container option[value="pending"] {
            color: orange;
        }

        .popup button {
            margin-right: 10px;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .popup button#confirmBtn:hover {
            background-color: #218838;
        }

        .popup button#cancelBtn:hover {
            background-color: red;
        }
    </style>
</head>

<body>
    <?php
    include 'headerAdmin.php';
    ?>

    <div class="content">
        <h1>Orders List</h1>

        <div>
            <select id="filterStatus" class="filter-container" onchange="filterOrders()">
                <option value="semua">Semua</option>
                <option value="selesai">Selesai</option>
                <option value="gagal">Gagal</option>
                <option value="pending">Pending</option>
            </select>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Tanggal Beli</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="orderTableBody"></tbody>
        </table>

        <div class="popup" id="orderPopup">
            <h2>Order Details</h2>
            <span class="close-btn" onclick="closeOrderPopup()">&times;</span>
            <table>
                <tr>
                    <td>Order ID:</td>
                    <td id="orderId"></td>
                </tr>
                <tr>
                    <td>User ID:</td>
                    <td id="orderUserId"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td id="orderAddress"></td>
                </tr>
                <tr>
                    <td>Metode:</td>
                    <td id="orderMetode"></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td id="orderStatus"></td>
                </tr>
                <tr>
                    <td>Tanggal Beli:</td>
                    <td id="orderTanggalBeli"></td>
                </tr>

            </table>
            <div>
                <img id="orderImage" width="100%" height="100%">
            </div>
            <div>
                <button id="confirmBtn" onclick="changeOrderStatus('selesai')">Konfirmasi</button>
                <button id="cancelBtn" onclick="changeOrderStatus('gagal')">Gagal</button>
            </div>
        </div>

        <div class="popup-overlay" id="overlay"></div>
    </div>





    <script src="js/adminConfirm.js"></script>
</body>

</html>