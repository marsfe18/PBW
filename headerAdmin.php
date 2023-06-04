<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="assets/icon.png">
    <style>
        /* navigasi start */
        .nav-logo a {
            font-family: 'Tilt Warp', cursive;
            text-align: right;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 20px;
        }

        ul {
            list-style: none;
        }

        li {
            display: inline;
        }

        a {
            color: rgb(0, 0, 0);
            text-decoration: none;
        }

        .nav-menu li {
            margin: 0;
            padding: 10px 10px;
            transition: all 0.3s ease-in-out;
        }

        .nav-menu a {
            color: #313131;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .nav-menu a:hover,
        .nav-menu a:active {
            color: #00a7ff;
        }

        .nav-menu {
            padding: 0;
        }

        nav img {
            height: 25px;
            margin-bottom: -5px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            /* agar logo sebelah kiri nav tengah dan search kanan */
            align-items: center;
            padding: 15px;
        }

        .burger {
            display: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        .line {
            width: 25px;
            height: 3px;
            background-color: #000000;
            margin: 5px 0;
            transition: transform 0.3s ease;
        }

        /* navigasi selesai */

        @media screen and (max-width: 800px) {
            .subkonten {
                display: flex;
                flex-direction: column;
                /* padding: 30px; */
            }

            .subkonten div {
                /* border: 1px solid; */
                /* padding: 50px 40px; */
                /* margin: 10px; */
                align-items: center;
            }

            .subkonten img {
                width: 100%;
            }

            .subkonten p {
                font-family: 'Rubik', sans-serif;
                font-size: 20px;
                text-align: center;
            }

            .subkonten h1 {
                text-align: center;

            }

            .nav-menu {
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: #f4f4f4;
                display: none;
                flex-direction: column;
                padding: 1rem;
                text-align: center;
            }

            .nav-menu li {
                margin-bottom: 1rem;
                display: block;
            }

            .burger {
                display: block;
            }

            .line {
                background-color: #000000;
            }


            .nav-active {
                display: block;
            }
        }

        .nav-acc {
            position: relative;
        }

        .nav-acc:hover {
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 51px;
            min-width: 100px;
            background-color: #f9f9f9;
            right: -15px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="nav-logo">
                <a href="#">ADMIN PAGE</a>
            </div>
            <ul class="nav-menu">
                <li><a href="adminAdd.php">Tambah Produk</a></li>
                <li><a href="adminEdit.php">Lihat Produk</a></li>
                <li><a href="adminConfirm.php"> Pembayaran</a></li>
            </ul>
            <div class="nav-acc">
                <a id="dropdown-trigger">
                    <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="Acc">
                </a>
                <div class="dropdown-content" id="dropdown-content">
                    <a href="index.php">Logout
                        <?php
                        session_unset();
                        ?></a>
                </div>
            </div>
        </nav>
    </header>
    <script>
        const navSlide = () => {
            const burger = document.querySelector('.burger');
            const nav = document.querySelector('.nav-menu');
            burger.addEventListener('click', () => {
                nav.classList.toggle('nav-active');
            });
        };

        document.getElementById('dropdown-trigger').addEventListener('click', function() {
            var dropdownContent = document.getElementById('dropdown-content');
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            } else {
                dropdownContent.style.display = 'block';
            }
        });
        navSlide();
    </script>
</body>

</html>