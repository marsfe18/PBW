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
    let orderTable = document.getElementById('orderTable');
    let tbody = orderTable.getElementsByTagName('tbody')[0];

    tbody.innerHTML = '';

    for (let i = 0; i < orders.length; i++) {
        let order = orders[i];
        let row = document.createElement('tr');
        row.setAttribute('data-order-id', order.id);
        row.addEventListener('click', function () {
            let orderId = this.getAttribute('data-order-id');
            getOrderItems(orderId, order);
        });

        let orderIdCell = document.createElement('td');
        orderIdCell.textContent = order.id;
        row.appendChild(orderIdCell);

        let tglBeliCell = document.createElement('td');
        tglBeliCell.textContent = order.tgl_beli;
        row.appendChild(tglBeliCell);

        let statusCell = document.createElement('td');
        statusCell.textContent = order.status;
        row.appendChild(statusCell);

        let metodeCell = document.createElement('td');
        metodeCell.textContent = order.metode;
        row.appendChild(metodeCell);

        let addressCell = document.createElement('td');
        addressCell.textContent = order.address;
        row.appendChild(addressCell);

        tbody.appendChild(row);

    }
}

// Fungsi untuk mendapatkan order items berdasarkan order ID
function getOrderItems(orderId, order) {
    let url = 'get_order_items.php';
    let data = 'order_id=' + encodeURIComponent(orderId);

    sendRequest(url, 'POST', data, function (response) {
        let orderItems = JSON.parse(response);
        displayOrderItems(orderItems, order.image);
        openOrderItemPopup();
    });
}

// Fungsi untuk menampilkan order items dalam pop-up
function displayOrderItems(orderItems, orderImage) {
    let orderItemTable = document.getElementById('orderItemTable');
    let tbody = orderItemTable.getElementsByTagName('tbody')[0];
    tbody.innerHTML = '';
    let total = 0;

    for (let i = 0; i < orderItems.length; i++) {
        let orderItem = orderItems[i];
        let row = document.createElement('tr');

        let produkIdCell = document.createElement('td');
        produkIdCell.textContent = orderItem.produk_id;
        row.appendChild(produkIdCell);

        let namaProdukCell = document.createElement('td');
        namaProdukCell.textContent = orderItem.nama_produk;
        row.appendChild(namaProdukCell);

        let hargaCell = document.createElement('td');
        hargaCell.textContent = orderItem.price;
        row.appendChild(hargaCell);

        let kategoriCell = document.createElement('td');
        kategoriCell.textContent = orderItem.kategori;
        row.appendChild(kategoriCell);

        tbody.appendChild(row);
        total += parseInt(orderItem.price);
    }
    let eltotal = document.getElementById('total');
    eltotal.textContent = '';
    let totalharga = document.createElement('h3');
    totalharga.textContent = 'Total Harga : $' + total;
    eltotal.appendChild(totalharga);

}

// Fungsi untuk membuka pop-up order items
function openOrderItemPopup() {
    let popup = document.getElementById('orderItemPopup');
    popup.style.display = 'block';
}

// Fungsi untuk menutup pop-up order items
function closeOrderItemPopup() {
    let popup = document.getElementById('orderItemPopup');
    popup.style.display = 'none';
}

// Mengambil data orders saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    let url = 'get_orders.php';

    sendRequest(url, 'GET', null, function (response) {
        let orders = JSON.parse(response);
        displayOrders(orders);
    });
});

// Menambahkan event listener untuk tombol close pada pop-up order items
let closeBtn = document.getElementsByClassName('close')[0];
closeBtn.addEventListener('click', function () {
    closeOrderItemPopup();
});
