let products = {
  data: []
};

// Menggunakan AJAX untuk mengambil data dari PHP
let xhr = new XMLHttpRequest();
xhr.open('GET', 'get_produk.php', true); // Menyesuaikan path ke "../produk.php"
xhr.onload = function () {
  if (xhr.status === 200) {
    // Mengubah respons JSON menjadi objek JavaScript
    let response = JSON.parse(xhr.responseText);
    products.data = response.data;
    // console.log(products.data); // Menampilkan data produk di konsol
    // document.createElement("span").textContent = "prsdfads";

    loaddata(products.data);
  }
};
xhr.send();

function loaddata(data) {
  console.log(data)
  for (let i of data) {
    //div satu kotak
    let card = document.createElement("div");
    //Card should have kategori and should stay hidden initially
    card.classList.add("card", i.kategori, "hide");

    //div untuk image
    let imgContainer = document.createElement("div");
    imgContainer.classList.add("image-container");

    let image = document.createElement("img");
    image.setAttribute("src", i.image);
    imgContainer.appendChild(image);

    //nama dan price
    let container = document.createElement("div");
    container.classList.add("container");

    let name = document.createElement("h3");
    name.classList.add("product-name");
    name.innerText = i.nama.toUpperCase();
    container.appendChild(name);

    let price = document.createElement("p");
    price.innerText = "$" + i.price;
    container.appendChild(price);

    //form add to cart
    let form = document.createElement("div");
    form.classList.add("tombol");
    //tombol
    let button = document.createElement("button");
    button.classList.add("button-card");
    button.setAttribute("name", "button");
    button.innerText = "Add to Cart";
    button.addEventListener("click", () => {
      addToCart(i)
    });
    form.appendChild(button);
    container.appendChild(form)

    card.appendChild(imgContainer);
    card.appendChild(container);
    document.getElementById("products").appendChild(card);
  }
}


function addToCart(item) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.push(item);
  localStorage.setItem("cart", JSON.stringify(cart));

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'add_to_cart.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Respon dari server (jika diperlukan)
      // console.log(xhr.responseText);
      window.alert(xhr.responseText);
    }
  };
  xhr.send('item=' + JSON.stringify(item));
}


function filterProduct(value) {

  let buttons = document.querySelectorAll(".button-value");
  buttons.forEach((button) => {

    if (value.toUpperCase() == button.innerText.toUpperCase()) {
      button.classList.add("active");
      document.getElementById(button.innerText).style.padding = "10px 10px";
      document.getElementById(button.innerText).style.backgroundColor = "White";
      document.getElementById(button.innerText).style.color = "#505050";
      document.getElementById(button.innerText).style.border = "1px solid";
      document.getElementById(button.innerText).style.borderRadius = "7px";
    } else {
      button.classList.remove("active");
      document.getElementById(button.innerText).style.padding = "10px 10px";
      document.getElementById(button.innerText).style.backgroundColor = "#505050";
      document.getElementById(button.innerText).style.color = "White";
      document.getElementById(button.innerText).style.border = "none";
    }
  });
  let elements = document.querySelectorAll(".card");

  elements.forEach((element) => {

    if (value == "all") {
      element.classList.remove("hide");
    } else {
      if (element.classList.contains(value)) {
        element.classList.remove("hide");
      } else {
        element.classList.add("hide");
      }
    }
  });
}

document.getElementById("search").addEventListener("click", () => {

  let searchInput = document.getElementById("search-input").value;
  let elements = document.querySelectorAll(".product-name");
  let cards = document.querySelectorAll(".card");


  elements.forEach((element, index) => {
    if (element.innerText.includes(searchInput.toUpperCase())) {
      cards[index].classList.remove("hide");
    } else {
      cards[index].classList.add("hide");
    }
  });
});

window.onload = () => {
  filterProduct("all");
};



// products = {
//   data: [
//     {
//       nama: "Mouse G",
//       kategori: "Mouse",
//       price: "30",
//       image: "assets/produk1.webp",
//       deskripsi: "Tambahan terbaru pada jajaran produk G yang legendaris. Dilengkapi switch optik-mechanical hibrida LIGHTFORCE kami yang pertama dan protokol LIGHTSPEED",
//     },
//     {
//       nama: "Keyboard G",
//       kategori: "Keyboard",
//       price: "49",
//       image: "assets/produk2.png",
//       deskripsi: "Tactile mechanical switch standar gaming memberikan feedback yang jelas melalui momen aktuasi",
//     },
//     {
//       nama: "Headset G",
//       kategori: "Headset",
//       price: "99",
//       image: "assets/produk3.png",
//       deskripsi: "Mulai dari desain hingga produksi, sampai pengiriman, kami sebisa mungkin menggunakan plastik daur ulang, menciptakan kemasan yang ramah lingkungan,",
//     },
//     {
//       nama: "Mouse M",
//       kategori: "Mouse",
//       price: "29",
//       image: "assets/produk4.png",
//       deskripsi: "Kurang dari 63 gram. Low-latency LIGHTSPEED wireless terbaik. Presisi tingkat tinggi dengan sensor HERO 25K.",
//     },
//     {
//       nama: "Keyboard M",
//       kategori: "Keyboard",
//       price: "129",
//       image: "assets/produk5.png",
//       deskripsi: "Dilengkapi dengan pencahayaan RGB memukau dan switch mechanical GX pilihanmu. Hadir dalam corak White Mist. Aksesori bercorak warna dijual terpisah.",
//     },
//     {
//       nama: "Headset M",
//       kategori: "Headset",
//       price: "89",
//       image: "assets/produk6.webp",
//       deskripsi: "memaksimalkan kenyamanan dan kecocokan untuk semua gamer termasuk gamer dengan ukuran kepala lebih kecil.",
//     },
//     {
//       nama: "Mousepad X",
//       kategori: "Mousepad",
//       price: "189",
//       image: "assets/produk7.webp",
//       deskripsi: "Mouse G adalah tambahan",
//     },
//     {
//       nama: "Mouse X",
//       kategori: "Mouse",
//       price: "49",
//       image: "assets/produk8.webp",
//       deskripsi: " Dengan teknologi LIGHTSYNC, sensor kelas gaming, dan desain 6 tombol klasik, kamu akan menceriakan game-mu dan mejamu",
//     },
//   ],
// };

// console.log(products.data);






