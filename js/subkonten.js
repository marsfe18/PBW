// let produk = document.querySelector('.produk');
let konten2 = document.querySelector('.konten2');



function show(i) {
    clearHtml();
    // console.log('test');
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_produk.php', true); // Menyesuaikan path ke "../produk.php"
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Mengubah respons JSON menjadi objek JavaScript
            let response = JSON.parse(xhr.responseText);
            let item = response.data;
            console.log(response.data);
            let div = document.querySelector('.subkonten');
            // div.innerHTML = 'test';
            for (let element of item) {

                let div2 = document.createElement('div');
                let div3 = document.createElement('div');
                div3.classList.add('desc');
                let b = document.createElement('h1');
                let desc = document.createElement('p');
                let img = document.createElement('img');
                if (i == 1 && element.kategori == 'Mouse') {
                    b.textContent = element.nama;
                    img.setAttribute('src', element.image);
                    desc.textContent = element.deskripsi;
                } else if (i == 2 && element.kategori == 'Keyboard') {
                    b.textContent = element.nama;
                    img.setAttribute('src', element.image);
                    desc.textContent = element.deskripsi;
                } else if (i == 3 && element.kategori == 'Headset') {
                    b.textContent = element.nama;
                    img.setAttribute('src', element.image);
                    desc.textContent = element.deskripsi;
                } else {
                    continue;
                }
                div2.appendChild(img);
                div3.appendChild(b);
                div3.appendChild(desc);
                div.appendChild(div2);
                div.appendChild(div3);
                // konten2.appendChild(div);
            }


        }
    };
    xhr.send();
}


function clearHtml() {
    let a = document.querySelector('.subkonten');
    a.textContent = "";
}

