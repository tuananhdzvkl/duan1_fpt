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
                      <li class="number"><i class="fa fa-phone"></i><a href="tel://0123456789">+84 123 456 789</a></li>
                      <li class="email"><i class="fa fa-envelope"></i><a href="mailto://demo@example.com">demo@example.com</a></li>
                      <li class="account"><i class="fa fa-user"></i><a href="index.php?act=login">Tài khoản</a></li>
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
                  <form class="header-searchbox">
                    <input type="search" class="form-control" placeholder="Search">
                    <button class="btn-submit" type="submit"><i class="pe-7s-search"></i></button>
                  </form>
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
                                  <a href="index.php?act=shop"><span>Danh mục</span></a>
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
                              <li class="has-submenu position-static">
                                  <a href="index.php?act=shop"><span>Sản Phẩm</span></a>
                                  <!-- You may populate this submenu with dynamic data if needed -->
                                  <ul class="submenu-nav submenu-nav-mega1">
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
                                  </ul>
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