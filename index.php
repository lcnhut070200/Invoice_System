<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./webfonts/fontawesome-free-5.15.2-web/css/all.min.css">
    <link rel="stylesheet" href="./style/trangchu.css">
    <link rel="stylesheet" href="./style/grid.css">
</head>
<body>
<div id="container">
        <div class="header" id="header">
            <div class="banner">
                <p>HỆ THỐNG QUẢN LÝ CỬA HÀNG</p>
            </div>
            <nav class="navbar">
                <ul class="navbar-list">
                    <li class="navbar-list-item"><a href="customer/customer.html">Khách Hàng</a>
                    <li class="navbar-list-item"><a href="product/product.html">Sản Phẩm</a>
                    <li class="navbar-list-item"><a href="shopping.php" id="giohang">Giỏ hàng</a> </li>
                    <li class="navbar-list-item"><a href="orders.php" id="giohang">Quản lý hoá đơn</a> </li>
                </ul>
                <!-- <div class="header__search">
                        <input type="text" onkeyup="showSearchResult(this.value)" class="header__search-input" placeholder="Tìm kiếm" >
                        <i class="header__search-icon fas fa-search"></i>
                </div> -->
            </nav>
        </div>

        <div class="slider" id="slider">
        </div>

        <h3 class="title" id="title">TẤT CẢ SẢN PHẨM</h3>
        <div class="main" id="main">
            <div class="grid ">
                <div class="row" id="row">
                    <?php
                        include('allproducts.php');
                    ?>
                </div>
            </div>
        </div>
</div>
<footer class="footer">
            <div class="grid">
                <div class="row">
                    <div class="col l-2-4 m-4 c-12">
                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Trung tâm trợ giúp khách hàng</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Hướng dẫn mua hàng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l-2-4 m-4 c-12">
                        <h3 class="footer__heading">Giới thiệu</h3>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Giới thiệu</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Tuyển dụng</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Điều khoản</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l-2-4 m-4 c-12">
                        <h3 class="footer__heading">Theo dõi</h3>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="https://www.facebook.com/profile.php?id=100036050304065" target="_blank" class="footer__list-item-link">
                                    <i class="footer__list-item__icon fab fa-facebook"></i> Facebook
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href=""  class="footer__list-item-link">
                                    <i class="footer__list-item__icon fab fa-instagram"></i> Instagram
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href=""  class="footer__list-item-link">
                                    <i class="footer__list-item__icon fab fa-youtube"></i> Youtube
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__bottom">
                <div class="grid">
                    <p class="footer__text">© 2021 - Bản quyền thuộc về Công ty LCN</p>
                </div>
            </div>
        </footer>
    </div>
<script >
    function changeBackground() {
        const section = document.getElementById('slider');
        const imgs = [
            'url(./background/slider2.jpeg)',
            'url(./background/slider3.jpeg)',
            'url(./background/slider1.jpeg)'
        ];

        const bg = imgs[Math.floor(Math.random() * imgs.length)];
        section.style.backgroundImage = bg;
    }

    setInterval(changeBackground, 3000);
</script>
</body>

</html>
