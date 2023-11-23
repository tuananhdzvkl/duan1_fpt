<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from template.hasthemes.com/shome/shome/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 15:28:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Shome - Shoes eCommerce Website Template"/>
    <meta name="keywords" content="footwear, shoes, modern, shop, store, ecommerce, responsive, e-commerce"/>
    <meta name="author" content="codecarnival"/>

    <title>STORE ASCENSION</title>

    <!--== Favicon ==-->
    <link rel="icon website" href="assets/img/logo.png" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,500&amp;display=swap" rel="stylesheet"> 

    <!--== Bootstrap CSS ==-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--== Font Awesome Min Icon CSS ==-->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--== Pe7 Stroke Icon CSS ==-->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="assets/css/swiper.min.css" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="assets/css/fancybox.min.css" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="assets/css/aos.min.css" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="assets/css/style1.css" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <!-- <link href="assets/css/style-login.css" rel="stylesheet" /> -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
// include "model/binhluan.php";
// include "model/taikhoan.php";
include "view/header.php";
        if (isset($_GET['act']) &&($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                case 'home':
                    include "view/home.php";
                    break;
                case 'shop':
                    include "view/shop.php";
                    break;
                case 'chitietSP':
                    include "view/chitietSP.php";
                    break;
                case 'thanhtoan':
                    include "view/thanhtoan.php";
                    break;
                case 'CTthanhtoan':
                    include "view/chitietThanhtoan.php";
                    break;
                case 'blog':
                    include "view/blog.php";
                    break;
                case 'chitietBlog':
                    include "view/chitietBlog.php";
                    break;
                case 'wishlist':
                    include "view/wishlist.php";
                    break;
                case 'cart':
                    include "view/cart.php";
                    break;
                case 'login':
                    include "view/login.php";
                    break;
                case 'contact':
                    include "view/contact.php";
                    break;
                default:
                    include "view/404.php";
                    break;
            }
        } else {
            $sanpham = load_sanpham_all();
            include "view/home.php";
        }
        include "view/footer.php"; 
    ?>
<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="assets/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src="assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="assets/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="assets/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="assets/js/bootstrap.min.js"></script>
<!--=== jQuery Ui Min Js ===-->
<script src="assets/js/jquery-ui.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="assets/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="assets/js/fancybox.min.js"></script>
<!--=== jQuery Waypoint Js ===-->
<script src="assets/js/waypoint.js"></script>
<!--=== jQuery Parallax Min Js ===-->
<script src="assets/js/parallax.min.js"></script>
<!--=== jQuery Aos Min Js ===-->
<script src="assets/js/aos.min.js"></script>

<!--=== jQuery Custom Js ===-->
<script src="assets/js/custom.js"></script>

</body>
<script>
  const container = document.getElementById('container2');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');

  registerBtn.addEventListener('click', () => {
      container.classList.add("active");
  });

  loginBtn.addEventListener('click', () => {
      container.classList.remove("active");
  });
</script>
</html>