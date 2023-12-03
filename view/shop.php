<style>
  .price-old {
    color: red; /* Đặt màu đỏ cho văn bản */
    font-size: 15px;
    font-family:sans-serif;
  }
  .price{
    font-size: 18px;
    font-family:sans-serif;
  }
</style>
<?php
  $count = COUNT($sanpham);
?>
<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/shop/1.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Trang sản phẩm</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="?act=home">Trang chủ</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Trang sản phẩm</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-default-area">
      <div class="container">
        <div class="row flex-xl-row-reverse justify-content-between">
          <div class="col-xl-9">
            <div class="row">
              <div class="col-12">
                <div class="shop-top-bar">
                  <div class="shop-right">
                    <marquee behavior="" direction=""><p class="pagination-line" style="margin-left: 10pc;">Cảm ơn bạn đã ghé thăm sản phẩm của chúng tôi. Hiện tại cửa hàng đang có <a href="?act=sanpham"><?= $count ?> </a>  sản phẩm</p></marquee>
                  </div>
                  <!-- <div class="shop-top-center">
                    <nav class="product-nav">
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-list"></i></button>
                      </div>
                    </nav>
                  </div> -->
                  <!-- <div class="shop-top-right">
                    <div class="shop-sort">
                      <span>Sort By :</span>
                      <select class="form-select" aria-label="Sort select example">
                        <option selected>Default</option>
                        <option value="1">Popularity</option>
                        <option value="2">Average Rating</option>
                        <option value="3">Newsness</option>
                        <option value="4">Price Low to High</option>
                      </select>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row">
                    <?php foreach ($dssp as $k)  : extract($k) ?>
                        <div class="col-sm-6 col-lg-4">
                          <!--== Start Product Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="index.php?act=chitietSP&id=<?= $id_sp ?>&id_dm=<?= $id_dm ?>">
                                  <img src="assets/img/shop/<?=$image_sp?>" width="270" height="274" alt="Image-HasTech">
                                </a>
                                <div class="product-flag">
                                  <ul>
                                      <?php if ($giam_gia > 0): ?>
                                          <li class="discount"><?= $giam_gia ?>%</li>
                                      <?php endif; ?>
                                  </ul>
                                </div>
                                <!-- <div class="product-action">
                                  <a class="btn-product-wishlist" href="#" onclick="addToWishlist()"><i class="fa fa-heart"></i></a>
                                  <a class="btn-product-cart" href="#" onclick="addToCart()"><i class="fa fa-shopping-cart"></i></a>
                                  <button type="button" class="btn-product-quick-view-open">
                                    <i class="fa fa-arrows"></i>
                                  </button>
                                  <a class="btn-product-compare" href="#"><i class="fa fa-random"></i></a>
                                </div> -->
                                
                                <!-- <a class="banner-link-overlay" href="shop.html"></a> -->
                              </div>
                              <div class="product-info">
                                <div class="category">
                                  <ul>
                                      <li><a href="shop.php">
                                          <?php
                                          $genderName = '';
                                          switch ($gioi_tinh) {
                                              case 0:
                                                  $genderName = 'Unisex';
                                                  break;
                                              case 1:
                                                  $genderName = 'Nam';
                                                  break;
                                              case 2:
                                                  $genderName = 'Nữ';
                                                  break;
                                              default:
                                                  $genderName = 'Unknown';
                                          }
                                          echo $genderName;
                                          ?>
                                      </a></li>
                                  </ul>
                                </div>
                                <h4 class="title"><a href="index.php?act=chitietSP&id=<?= $id_sp ?>&id_dm=<?= $id_dm ?>"><?=$name_sp?></a></h4>
                                <div class="prices">
                                <?php if ($giam_gia == 0) : ?>
                                      <span class="price"><?php echo number_format($gia, 0, '.', ','); ?> VND</span>
                                  <?php else : ?>
                                      <?php $giathuc = $gia - ($giam_gia * $gia) / 100; ?>
                                      <span class="price-old" style="font-size: small; color: red;"><?php echo number_format($gia, 0, '.', ','); ?> VND</span>
                                      <span class="sep">-</span>
                                      <span class="price"><?php echo number_format($giathuc, 0, '.', ','); ?> VND</span>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End prPduct Item ==-->
                        </div>
                    <?php endforeach  ?>
                      
                    <?php
                      // Assuming $sanpham contains the list of all products
                      $productsPerPage = 9;
                      $totalProducts = COUNT($sanpham);
                      $totalPages = ceil($totalProducts / $productsPerPage);

                      // Get the current page from the URL parameter
                      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                      // Calculate the offset for the array slice
                      $offset = ($current_page - 1) * $productsPerPage;

                      // Get the products for the current page
                      $currentProducts = array_slice($sanpham, $offset, $productsPerPage);
                      ?>

                      <!-- Display products -->
                      <?php foreach ($currentProducts as $k) : extract($k); ?>
                          <!-- Your existing HTML for displaying product details goes here -->
                      <?php endforeach; ?>

                      <!-- Display pagination links -->
                      <div class="col-12">
                          <div class="pagination-items">
                              <ul class="pagination justify-content-end mb--0">
                                  <?php
                                  // Display the "Previous" link if not on the first page
                                  if ($current_page > 1) {
                                      echo '<li><a href="?act=chitietSP&page=' . ($current_page - 1) . '">Previous</a></li>';
                                  }

                                  // Display the page links
                                  for ($i = 1; $i <= $totalPages; $i++) {
                                      $class = ($i == $current_page) ? 'active' : '';
                                      echo '<li><a class="' . $class . '" href="?act=chitietSP&page=' . $i . '">' . $i . '</a></li>';
                                  }

                                  // Display the "Next" link if not on the last page
                                  if ($current_page < $totalPages) {
                                      echo '<li><a href="?act=chitietSP&page=' . ($current_page + 1) . '">Next</a></li>';
                                  }
                                  ?>
                              </ul>
                          </div>
                      </div>




                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="shop-sidebar">
            <div class="shop-sidebar-category">
              <h4 class="sidebar-title">Gender</h4>
                <div class="sidebar-category">
                  <ul class="category-list mb--0">
                      <?php
                      $genderCounts = load_gioitinh_all();
                      $genderMapping = [
                          0 => 'Unisex',
                          1 => 'Nam',
                          2 => 'Nữ',
                      ];

                      foreach ($genderCounts as $gioitinh) {
                          $currentGenderId = $gioitinh['gioi_tinh'];
                          $currentGenderName = isset($genderMapping[$currentGenderId]) ? $genderMapping[$currentGenderId] : 'Unknown';

                          // Lấy tổng số sản phẩm theo giới tính
                          $gioitinhCounts = tongsp_gioitinh();
                          

                          // Kiểm tra xem $currentGenderId có tồn tại trong $gioitinhCounts không
                          if (isset($gioitinhCounts[$currentGenderId])) {
                              $totalProductsForGender = $gioitinhCounts[$currentGenderId]['total'];
                          } else {
                              $totalProductsForGender = 0;
                          }

                          // Tính toán URL dựa trên giới tính
                          
                          $shopURL = $currentGenderId !== null ? "?act=sanpham&gioi_tinh={$currentGenderId}" : "index.php";

                      ?>
                      
                          <li class="<?= $currentGenderId == $gioi_tinh ? 'active' : ''; ?>">
                              <a href="<?= $shopURL ?>">
                                  <?= $currentGenderName ?>
                                  <!-- Hiển thị số lượng sản phẩm theo giới tính -->
                                  
                                  <?php if ($totalProductsForGender > 0) : ?>
                                      <span class="product-count">(<?= $totalProductsForGender ?>)</span>
                                  <?php endif; ?>
                              </a>
                          </li>
                      <?php } ?>
                  </ul>
              </div>
            </div>

              <!-- <div class="shop-sidebar-price-range">
                <h4 class="sidebar-title">Price Filter</h4>
                <div class="sidebar-price-range">   
                  <div id="price-range"></div>
                </div>
              </div> -->
            
              <div class="shop-sidebar-color">
                  <h4 class="sidebar-title">Color</h4>
                  <div class="sidebar-color">
                      <ul class="color-list">
                        <li>
                          <?php
                          $load_color = load_color_all();

                          foreach ($load_color as $color) {
                              // Access color data using $data['name_color']
                              $colorName = $color['name_color'];
                              ?>
                              <li class="active" style="background-color: <?= $colorName ?>"></li>
                          <?php } ?>
                        </li>
                      </ul>
                  </div>
              </div>


              <div class="shop-sidebar-size">
                  <h4 class="sidebar-title">Size</h4>
                  <div class="sidebar-size">
                      <ul class="size-list">
                          <?php
                          $load_size = load_size_with_total_products();
                          foreach ($load_size as $size) {
                              $sizeName = $size['name_size'];
                              $sizeId = $size['id_size'];
                              $sizeCount = $size['total_products'];

                              // Load products for the current size
                              $load_sp = load_sanpham_all_size($sizeId);
                          ?>
                              <li class="<?= $sizeCount > 0 ? 'active' : ''; ?>">
                                  <a href="?act=sizesp&id_size=<?= $sizeId ?>">
                                      <?= $sizeName ?>
                                      <?php if ($sizeCount > 0) : ?>
                                          <span class="product-count">(<?= $sizeCount ?>)</span>
                                      <?php endif; ?>
                                  </a>
                              </li>
                          <?php } ?>
                      </ul>
                  </div>
              </div>



              <div class="shop-sidebar-brand">
                  <h4 class="sidebar-title">Brand</h4>
                  <div class="sidebar-brand">
                      <ul class="brand-list mb--0">
                          <?php
                            // $sanpham = loadAll_DM();

                            foreach ($dm as $danhmuc) {
                                $danhmucName = $danhmuc['name_dm'];
                            ?>
                            <li>
                              <a href='index.php?act=danhmuc&id_dm=<?= $danhmuc['id_dm'] ?>'>
                              <?= $danhmuc['name_dm'] ?>
                              <?php
                                $tong = thongke(); // Assuming this function returns an array with brand counts
                                foreach ($tong as $key => $value) :
                                  if ($value['id_dm'] == $danhmuc['id_dm']) :
                              ?>
                              <span>(<?= $value['Tong'] ?>)</span>
                                <?php
                                  endif;
                                  endforeach;
                                ?>
                              </a>
                            </li>
                          <?php } ?>
                      </ul>
                  </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
  </main>