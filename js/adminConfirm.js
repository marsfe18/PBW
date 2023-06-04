// Fungsi untuk membuat AJAX request menggunakan objek XMLHttpRequest (xhttp)
function sendRequest(url, method, data, callback) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback(this.responseText);
        }
    };
    xhttp.open(method, url, true);
    if (method == 'POST') {
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    xhttp.send(data);
}

// Fungsi untuk menampilkan data orders ke dalam tabel
function displayOrders(orders) {
    let orderTableBody = document.getElementById('orderTableBody');
    orderTableBody.innerHTML = '';

    for (let i = 0; i < orders.length; i++) {
        let order = orders[i];
        let row = document.createElement('tr');
        row.setAttribute('data-order-id', order.id);
        row.addEventListener('click', function () {
            let orderId = this.getAttribute('data-order-id');
            getOrderDetails(orderId);
            // console.log(orderId);
        });

        let orderIdCell = document.createElement('td');
        orderIdCell.textContent = order.id;
        row.appendChild(orderIdCell);

        let userIdCell = document.createElement('td');
        userIdCell.textContent = order.user_id;
        row.appendChild(userIdCell);

        let tanggalBeliCell = document.createElement('td');
        tanggalBeliCell.textContent = order.tgl_beli;
        row.appendChild(tanggalBeliCell);

        let statusCell = document.createElement('td');
        statusCell.textContent = order.status;
        row.appendChild(statusCell);

        orderTableBody.appendChild(row);
    }
}

// Fungsi untuk mendapatkan detail order berdasarkan order ID
function getOrderDetails(orderId) {
    let url = 'admin_get_detail.php';
    let data = 'order_id=' + encodeURIComponent(orderId);

    sendRequest(url, 'POST', data, function (response) {
        let order = JSON.parse(response);
        // console.log(orderId);
        displayOrderDetails(order);
        openOrderPopup();
    });
}

// Fungsi untuk menampilkan detail order dalam pop-up
function displayOrderDetails(order) {
    document.getElementById('orderId').textContent = order.id;
    document.getElementById('orderAddress').textContent = order.address;
    document.getElementById('orderMetode').textContent = order.metode;
    document.getElementById('orderStatus').textContent = order.status;
    document.getElementById('orderTanggalBeli').textContent = order.tgl_beli;
    document.getElementById('orderUserId').textContent = order.user_id;
    document.getElementById('orderImage').src = 'payment/' + order.image;

    document.getElementById('confirmBtn').disabled = order.status !== 'pending';
    document.getElementById('cancelBtn').disabled = order.status !== 'pending';
}

// Fungsi untuk membuka pop-up order details
function openOrderPopup() {
    document.getElementById('orderPopup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

// Fungsi untuk menutup pop-up order details
function closeOrderPopup() {
    document.getElementById('orderPopup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

// Fungsi untuk mengubah status order
function changeOrderStatus(status) {
    let orderId = document.getElementById('orderId').textContent;
    let url = 'admin_update_status.php';
    let data = 'order_id=' + encodeURIComponent(orderId) + '&status=' + encodeURIComponent(status);

    sendRequest(url, 'POST', data, function (response) {
        // Tampilkan pesan atau lakukan tindakan lain setelah status berhasil diubah
        alert(response);

        // Refresh halaman untuk memperbarui daftar orders
        location.reload();
    });
}

function filterOrders() {
    let filterStatus = document.getElementById('filterStatus').value;
    if (filterStatus === 'semua') {
        loadOrder();
    } else {
        let url = 'admin_get_order.php';
        let data = 'status=' + encodeURIComponent(filterStatus);
        sendRequest(url, 'POST', data, function (response) {
            let orders = JSON.parse(response);
            displayOrders(orders);
        });
    }


}

function loadOrder() {
    let url = 'admin_get_order.php';

    sendRequest(url, 'GET', null, function (response) {
        let orders = JSON.parse(response);
        displayOrders(orders);
    });
}


// Fungsi untuk mengambil data orders saat halaman dimuat
document.addEventListener('DOMContentLoaded', loadOrder());