<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARSGEAR</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="assets/icon.png">

</head>

<body>
    <?php include 'navigasi.php'; ?>

    <main>
        <section class="konten1">
            <h2>MARSGEAR</h2>
            <h3>Gapapa Skill Ga Seberapa tapi Gear Harus Mewah</h3>
            <p>Dapatkan voucher gratis ongkos kirim ke wilayah Jawa dan Bali dengan register terlebih dahulu!</p>
            <a href="register.html" class="tombol">Sign Up Now</a>
        </section>

        <section class="body">
            <h2>PRODUK YANG BISA TEMENMU IRI</h2>
            <p>Bermainlah secara maksimal dengan gear gaming berkinerja tertinggi dari MARSGEAR.</p>
        </section>

        <section>
            <div class="konten2">
                <div class="produk" onclick="show(1)">
                    <h3>Mouse Gimang</h3>
                    <img src="assets/produk1.webp" alt="produk 1">
                    <p>Biar aim kamu lebih kece.</p>
                </div>

                <div class="produk" onclick="show(2)">
                    <h3>Keyboard Gimang</h3>
                    <img src="assets/produk2.png" alt="produk 2">
                    <p>Pamer suara cetak-cetak ke discord.</p>
                </div>

                <div class="produk" onclick="show(3)">
                    <h3>Headset Gimang</h3>
                    <img src="assets/produk3.png" alt="produk 3">
                    <p>Suara jedag jedug makin mantap.</p>
                </div>
            </div>
        </section>
        <div class="subkonten">
        </div>

        <div class="konten3">
            <section class="body">
                <h2>BERMAIN UNTUK MENANG</h2>
                <p>Kita semua bermain. Dengan cara kita masing-masing. Untuk alasan kita sendiri. Dan itulah yang membuat
                    komunitas yang kita bangun bersama ini sedemikian luar biasanya</p>
            </section>
            <div class="slider">
                <div class="myslide fade">
                    <div class="txt">
                        <h1>DUKUNG TIM MU</h1>
                        <p>MARSGEAR dengan bangga <br> mensponsori ratusan profesional Esports <br> untuk meraih prestasi gaming
                            <br> terbaik melalui kolaborasi.
                        </p>
                    </div>
                    <img src="https://cdn.shopify.com/s/files/1/0059/0630/1017/t/5/assets/keychronm3opticalmouse2-1661154242392.jpg?v=1661154268" style="width: 100%; height: 100%;" alt="mouse">
                </div>

                <div class="myslide fade">
                    <div class="txt">
                        <h1>GAME TERBARU.</h1>
                        <p>MARSGEAR secara aktif bermitra <br> pembuat game untuk mencapai pengalaman <br>gaming yang sangat
                            memukau.</p>
                    </div>
                    <img src="https://ww1.prweb.com/prfiles/2021/08/23/18147047/Keychron%20Q1%20-%203.jpeg" style="width: 100%; height: 100%;" alt="keyboard">
                </div>

                <div class="myslide fade">
                    <div class="txt">
                        <h1>TEKNOLOGI TERBARU.</h1>
                        <p>MARSGEAR ikut andil berpartisipasi <br>untuk perkembangan teknologi gaming saat ini</p>
                    </div>
                    <img src="https://global-uploads.webflow.com/6084554a4ac993007f0d6bf2/62d445ef7fcc9c241b9b5688_explo-poster-00001.jpg" style="width: 100%; height: 100%;" alt="headset">
                </div>


                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <div class="dotsbox" style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>


            </div>
        </div>

    </main>


    <script src="js/jsfile.js">
    </script>
    <script src="js/subkonten.js"></script>
    <?php include 'footer.php'; ?>
</body>

</html>