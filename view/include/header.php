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
<header class="main-header-wrapper position-relative">
    <div class="header-top">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="header-top-align">
              <div class="header-top-align-start">
                <div class="desc">
                <marquee>"Xin chào! Bạn đã đặt chân đến ASCENSION - Nơi Sự Lựa Chọn Đúng Đắn Bắt Đầu."</marquee>
                </div>
              </div>
              <div class="header-top-align-end">
                <div class="header-info-items">
                  <div class="info-items">
                    <ul>
                      <li class="number"><i class="fa fa-phone"></i><a href="tel://0123456789">0985670942</a></li>
                      <li class="email"><i class="fa fa-envelope"></i><a href="mailto://demo@example.com">demo@example.com</a></li>
                      <li class="account">
                          <i class="fa fa-user"></i>
                          <?php
                          if (!isset($_SESSION['username'])) {
                              echo "<a href='?act=login'>Tài khoản</a>";
                          } else {
                              echo "<a type='button' data-bs-toggle='dropdown'> Xin Chào : <span class='text-body'>" . $_SESSION['username']['name_tk'] . "</span> </a> 
                                  <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='userDropdown'>
                                      <a class='dropdown-item' href='?act=thongtin'>
                                          <i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i>
                                          Profile
                                      </a>";
                                      if ($_SESSION['username']['chucvu'] == 1) {
                                          echo "<a class='dropdown-item' href='admin/index.php'>
                                                  <i class='fa-solid fa-flag'></i>
                                                  Admin Page
                                              </a>";
                                      }
                                      echo "<a class='dropdown-item' href='#'>
                                              <i class='fa-solid fa-lock'></i>
                                              Forgot Password?
                                          </a>
                                          <div class='dropdown-divider'></div>
                                          <a class='dropdown-item' href='?act=dangxuat' data-toggle='modal' data-target='#logoutModal'>
                                              <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                              Logout
                                          </a>
                                  </div>";
                          }
                          ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle">
      <div class="container pt--0 pb--0">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="header-middle-align">
              <div class="header-middle-align-start">
                <div class="header-logo-area">
                  <a href="index.php?act=home">
                    <img class="logo-main" src="assets/img/logo.png" width="131" height="34" alt="Logo" />
                    <!-- <img class="logo-light" src="assets/img/logo-light.webp" width="131" height="34" alt="Logo" /> -->
                  </a>
                </div>
              </div>
              <div class="header-middle-align-center">
                  <div class="header-search-area">
                      <form class="header-searchbox" method="post" action="?act=header">
                          <input type="search" class="form-control" name="search" placeholder="Search">
                          <button class="btn-submit" type="submit"><i class="pe-7s-search"></i></button>
                      </form>

                      <?php
                      // Xử lý tìm kiếm khi form được submit
                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          $searchKeyword = $_POST["search"];

                          // Gọi hàm tìm kiếm
                          $searchResults = search_sanpham_by_keyword($searchKeyword);

                          // Hiển thị kết quả
                          if ($searchResults) {
                              foreach ($searchResults as $result) {
                                  // Hiển thị thông tin sản phẩm
                                  echo '<div class="search-result">';
                                  echo '<img src="' . "/public/uploads/" . $result["image_sp"] . '" alt="Product Image" width="100" height="100">';
                                  echo '<p>Name: ' . $result["name_sp"] . '</p>';
                                  echo '<p>Gender: ' . $result["gioi_tinh"] . '</p>';
                                  echo '<p>Price: ' . $result["gia"] . '</p>';
                                  // Hiển thị các thông tin khác về sản phẩm nếu cần
                                  echo '</div>';
                              }
                          } else {
                              echo "Không có kết quả tìm kiếm.";
                          }
                      }
                      ?>
                  </div>
              </div>



              <div class="header-middle-align-end">
                <div class="header-action-area">
                  <div class="shopping-search">
                    <button class="shopping-search-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch"><i class="pe-7s-search icon"></i></button>
                  </div>
                  <div class="shopping-wishlist">
                    <a class="shopping-wishlist-btn" href="index.php?act=wishlist">
                      <i class="pe-7s-like icon"></i>
                    </a>
                  </div>
                  <div class="shopping-cart">
                    <button class="shopping-cart-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasCart" aria-controls="offcanvasRightLabel">
                      <a class="shopping-wishlist-btn" href="index.php?act=cart">
                      <i class="pe-7s-shopbag icon"></i>
                      <sup class="shop-count">02</sup>
                    </a>
                    </button>
                  </div>
                  <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                    <i class="pe-7s-menu"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-area header-default">
      <div class="container">
          <div class="row no-gutter align-items-center position-relative">
              <div class="col-12">
                  <div class="header-align">
                      <div class="header-navigation-area position-relative">
                          <ul class="main-menu nav">
                              <li class="has-submenu1"><a href="index.php?act=home"><span>Trang Chủ</span></a></li>

                              <li class="has-submenu position-static">
                                  <a href=""><span>Danh mục</span></a>
                                  <ul class="submenu-nav submenu-nav-mega1">
                                      <?php
                                      // Assuming LoadAll_DM() returns an array of categories
                                      $danhmuc = LoadAll_DM();

                                      foreach ($danhmuc as $category) {
                                          echo "<li><a href='index.php?act=shop&id={$category['id_dm']}'>{$category['name_dm']}</a></li>";
                                      }
                                      ?>
                                  </ul>
                              </li>
                              <li>
                                  <a href="index.php?act=shop"><span>Sản Phẩm</span></a>
                                  <!-- You may populate this submenu with dynamic data if needed -->
                                  <!-- <ul class="submenu-nav submenu-nav-mega1">
                                      <?php
                                      // Assuming LoadAll_DM() returns an array of categories
                                      $sanpham = load_sanpham_all();

                                      foreach ($sanpham as $product) {
                                          $genderLabel = getGenderLabel($product['gioi_tinh']);
                                          echo "<li><a href='index.php?act=shop&id={$product['id_sp']}'>$genderLabel</a></li>";
                                      }

                                      // Function to get the gender label
                                      function getGenderLabel($gender)
                                      {
                                          switch ($gender) {
                                              case 1:
                                                  return 'Nam';
                                              case 2:
                                                  return 'Nữ';
                                              case 0:
                                                  return 'Unisex';
                                              default:
                                                  return 'Unknown';
                                          }
                                      }
                                      ?>
                                  </ul> -->
                              </li>
                              <li class="has-submenu1"><a href="index.php?act=blog"><span>Tin Tức</span></a></li>
                              <li><a href="index.php?act=contact"><span>Liên hệ</span></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>