function showPaymentForm() {
    var paymentForm = document.getElementById("paymentForm");
    paymentForm.classList.add("show");
}

function closePaymentForm() {
    var paymentForm = document.getElementById("paymentForm");
    paymentForm.classList.remove("show");
}

document.getElementById("paymentFormContent").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent form submission

    // Submit form data using AJAX
    var xhr = new XMLHttpRequest();
    var formData = new FormData(document.getElementById("paymentFormContent"));
    xhr.open("POST", "payment.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Form submitted successfully, reload review list
            // loadReviewList();
            // closeReviewForm();
            document.getElementById("paymentFormContent").reset();
            window.alert(JSON.parse(this.responseText));
            closePaymentForm();
            window.location.href = "keranjang.php";
        }
    };
    // console.log(formData);
    xhr.send(formData);
});

function showAlamatPembayaran(a) {
    var jenisPembayaran = document.getElementById("jenisPembayaran");
    var alamatPembayaran = document.getElementById("alamatPembayaran");

    if (a === "nomor") {
        alamatPembayaran.value = "089602499078";
    } else if (a === "paypal") {
        alamatPembayaran.value = "https://www.paypal.me/marsayfe";
    } else if (a === "usdc") {
        alamatPembayaran.value = "0x2C96f1ea45aa3dF8D94b96F2eA2065bB31d7C499";
    }
}

function copyAlamat() {
    var alamatPembayaran = document.getElementById("alamatPembayaran");
    alamatPembayaran.select();
    document.execCommand("copy");
    window.alert("tersalin");
}

