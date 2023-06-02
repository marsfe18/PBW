let cartItems;
const cartElement = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');
let total = 0;

function showCartItems(cartItems) {
    cartItems.forEach(item => {
        // console.log(item);

        let card = document.createElement('div');
        card.classList.add('card');

        let imgContainer = document.createElement('div');
        imgContainer.classList.add("image-container");

        let image = document.createElement("img");
        image.setAttribute("src", item.image);
        imgContainer.appendChild(image);


        let container = document.createElement('div');
        container.classList.add('container');

        let name = document.createElement('h3');
        name.classList.add("product-name");
        name.innerText = item.nama;

        let priceColumn = document.createElement('p');
        priceColumn.innerText = "Harga : $" + item.price;


        const form = document.createElement('form');
        form.setAttribute('method', 'POST');
        const deleteButton = document.createElement('button');
        deleteButton.classList.add('remove-button');
        deleteButton.textContent = 'Remove';
        deleteButton.addEventListener('click', () => {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "remove_cart.php", true);
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.alert(this.responseText);
                }
            };
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("item_id=" + item.id);
            showCartItems(cartItems);
            updateCartTotal(cartItems);
        });

        card.appendChild(imgContainer);
        container.appendChild(name);
        container.appendChild(priceColumn);
        card.appendChild(container);
        form.appendChild(deleteButton);
        card.appendChild(form);


        cartElement.appendChild(card);
    });
}

let xhr = new XMLHttpRequest();
xhr.open('GET', 'get_cart.php', true);
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        cartItems = JSON.parse(xhr.responseText);
        console.log(cartItems);
        showCartItems(cartItems);
        updateCartTotal(cartItems);
    }
};
xhr.send();
console.log(cartItems);

// showCartItems();


// function removeItem(item, cartItems) {
//     let i = 0;
//     cartItems.forEach((items) => {
//         if (item == items) {
//             cartItems.splice(i, 1);
//         } else {
//             i = i + 1;
//         }
//     });
//     localStorage.setItem('cart', JSON.stringify(cartItems));
//     showCartItems();
//     updateCartTotal();
// }

function updateCartTotal(cartItems) {
    for (let item of cartItems) {
        total = item.price * 1 + total;
    }
    let totHarga = document.createElement('h4');
    totHarga.innerText = "Total Harga : $" + total;
    cartTotal.appendChild(totHarga);
    return total;
}



function clearCart() {
    // localStorage.removeItem('cart');
    // cartElement.innerHTML = '';
    // cartTotal.getElementsByTagName('h4').innerHTML = '0';
}

function addToTable() {
    localStorage.setItem("histemp", JSON.stringify(cartItems));
    clearCart();
}



updateCartTotal();
