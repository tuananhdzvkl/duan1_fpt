<!-- Thư viện FancyBox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<!-- Thư viện jQuery (nếu chưa có) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Thư viện FancyBox JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/1.jpeg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Chi tiết sản phẩm</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="?act=home">Trang chủ</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Chi tiết sản phẩm</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Single Area Wrapper ==-->
    <section class="product-area product-single-area">
      <div class="container">
        <div class="row">
          <?php extract($sp) ?>
            <div class="col-12">
              <div class="product-single-item">
                <div class="row">
                  <div class="col-xl-6">
                    <!--== Start Product Thumbnail Area ==-->
                    <div class="product-single-thumb">
                      <div class="swiper-container single-product-thumb single-product-thumb-slider">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <a class="lightbox-image" data-fancybox="gallery" href="../public/uploads/<?= $image_sp ?>">
                              <img src="../public/uploads/<?= $image_sp ?>" width="570" height="541" alt="Image-HasTech">
                            </a>
                          </div>
                          
                        </div>
                      </div>
                      <div class="swiper-container single-product-nav single-product-nav-slider">
                          <div class="swiper-wrapper">
                              <?php
                              foreach ($img_sp as $key) {
                                  extract($key);
                                  $linkimg = "../public/uploads/".$img_url;
                              ?>
                              <div class="swiper-slide">
                                  <a href="<?= $linkimg ?>" data-fancybox="gallery" data-caption="Optional caption">
                                      <img src="<?= $linkimg ?>" width="127" height="127" alt="Product Image">
                                  </a>
                              </div>
                              <?php
                              }
                              ?>
                          </div>
                      </div>


                      <script>
                          $(document).ready(function() {
                              $(".single-product-nav-slider a").fancybox();
                          });
                      </script>

                    </div>
                    <!--== End Product Thumbnail Area ==-->
                  </div>
                  <div class="col-xl-6">
                    <!--== Start Product Info Area ==-->
                    <div class="product-single-info">
                      <h3 class="main-title"><?=$name_sp ?></h3>
                      <div class="prices">
                        <span class="price"><?= number_format($sp['gia'], 0, '.', ',') ?> vnđ</span>
                      </div>
                      <div class="rating-box-wrap">
                      <div class="rating-box" onclick="handleRating(event)">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                      <script>
                        function handleRating(event) {
                          // Lấy danh sách các sao
                          const stars = document.querySelectorAll('.rating-box i');

                          // Lấy chỉ số của ngôi sao được click
                          const clickedStarIndex = Array.from(stars).indexOf(event.target);

                          // Đặt tất cả các ngôi sao với chỉ số nhỏ hơn hoặc bằng ngôi sao được click là "active"
                          stars.forEach((star, index) => {
                            if (index <= clickedStarIndex) {
                              star.classList.add('fa-star');
                              star.classList.remove('fa-star-o');
                            } else {
                              star.classList.add('fa-star-o');
                              star.classList.remove('fa-star');
                            }
                          });

                          // Ở đây, bạn có thể thực hiện các bước khác như gửi điểm đánh giá lên máy chủ.
                        }
                      </script>
                      <style>
                        .rating-box {
                          cursor: pointer;
                        }
                      </style>
                        <div class="review-status">
                          <a href="">(<?= $view ?> Lượt Xem)</a>
                        </div>
                      </div>
                      <p><?= $mo_ta ?></p>
                      <div class="product-color">
                        <h6 class="title">Color</h6>
                        <ul class="color-list">
                            <?php foreach ($load_color as $key => $value):?>
                                <li class="color-item" style="background-color: <?= $value['name_color'] ?>" onclick="selectColor(this)"></li>
                            <?php endforeach?>
                        </ul>
                    </div>

                    <div class="product-size">
                        <h6 class="title">Size</h6>
                        <ul class="size-list">
                            <?php foreach ($load_size as $key => $value):?>
                                <li class="size-item" data-size="<?= $value['name_size'] ?>" onclick="selectSize(this)"><?= $value['name_size']?></li>
                            <?php endforeach?>
                        </ul>
                    </div>

                    <script>
                        function selectColor(element) {
                            // Remove 'active' class from all color items
                            var colorItems = document.querySelectorAll('.color-item');
                            colorItems.forEach(function(item) {
                                item.classList.remove('active');
                            });

                            // Add 'active' class to the selected color item
                            element.classList.add('active');

                            // You can also store the selected color in a variable or perform other actions here
                            var selectedColor = element.getAttribute('data-color');
                            console.log('Selected Color:', selectedColor);
                        }

                        function selectSize(element) {
                            // Remove 'active' class from all size items
                            var sizeItems = document.querySelectorAll('.size-item');
                            sizeItems.forEach(function(item) {
                                item.classList.remove('active');
                            });

                            // Add 'active' class to the selected size item
                            element.classList.add('active');

                            // You can also store the selected size in a variable or perform other actions here
                            var selectedSize = element.getAttribute('data-size');
                            console.log('Selected Size:', selectedSize);
                        }
                    </script>

                      <div class="product-quick-action">
                        <div class="qty-wrap">              
                          <div class="pro-qty">
                            <input type="text" title="Quantity" value="1">
                          </div>
                        </div>
                        <a class="btn-theme" href="index.php?act=thanhtoan">Thanh Toán</a>
                      </div>
                      <!-- ... Your existing HTML code ... -->

                      <div class="product-wishlist-compare">
                          <a href="#" onclick="addToWishlist();"><i class="pe-7s-like"></i>Thêm vào ưa thích</a>
                          <a href="#" data-id="<?= $id ?>" class="btnCart" onclick="addToCart(<?= $id ?>, '<?= $name_sp ?>', <?= $gia ?>)">
                              <i class="pe-7s-shuffle"></i>Thêm vào giỏ hàng
                          </a>
                      </div>

                      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                      <script>
                          $(document).ready(function () {
                              // Array to keep track of added products
                              let addedProducts = [];

                              $('.btnCart').on('click', function (e) {
                                  e.preventDefault();

                                  let productId = $(this).data('id');
                                  let productName = '<?= $name_sp ?>';
                                  let productPrice = <?= $gia ?>;

                                  // Check if the product is already added
                                  if (addedProducts.includes(productId)) {
                                      alert('Sản phẩm này đã được thêm vào giỏ hàng!');
                                  } else {
                                      addToCart(productId, productName, productPrice);
                                  }
                              });

                              function addToCart(productId, productName, productPrice) {
                                  $.ajax({
                                      type: 'POST',
                                      url: '/view/giohang/themgiohang.php',
                                      data: {
                                          id: productId,
                                          name_sp: productName,
                                          gia: productPrice
                                      },
                                      success: function (response) {
                                          if (response === 'Invalid request') {
                                              console.error('Invalid request');
                                          } else {
                                              updateCartTotal(response);
                                              // Add the product to the array
                                              addedProducts.push(productId);
                                              alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!');
                                          }
                                      },
                                      error: function (error) {
                                          console.log(error);
                                      }
                                  });
                              }

                              function updateCartTotal(total) {
                                  let totalProduct = document.getElementById('totalProduct');
                                  if (totalProduct) {
                                      totalProduct.innerText = total;
                                  }

                                  // Update the initial count value if it exists on the page
                                  let initialCount = document.getElementById('initialCount');
                                  if (initialCount) {
                                      initialCount.innerText = total;
                                  }
                              }
                          });
                      </script>



                      <!-- ... Your existing HTML code ... -->



                      <div class="product-info-footer">
                        <h6 class="code"><span>Code :</span><?=$ma_sp?></h6>
                        <div class="social-icons">
                          <span>Share</span>
                          <a href="#/"><i class="fa fa-facebook"></i></a>
                          <a href="#/"><i class="fa fa-dribbble"></i></a>
                          <a href="#/"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                      </div>
                    </div>
                    <!--== End Product Info Area ==-->
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="product-review-tabs-content">
              <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
                <li role="presentation">
                  <a class="active" id="information-tab" data-bs-toggle="pill" href="#information" role="tab" aria-controls="information" aria-selected="true">Thông tin sản phẩm</a>
                </li>
                <li role="presentation">
                  <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Bình Luận<span>(<?=$tong=count($binhluan)?>)</span></a>
                </li>
              </ul>
              <div class="tab-content product-tab-content" id="ReviewTabContent">
                <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                  <div class="product-information">
                    <p><?= $mota_ct ?></p>
                  </div>
                </div>
                
                <?php include("view/binhluan/binhluan.php") ?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Single Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <?php include "sanphamlienquan.php" ?>
    <!--== End Product Area Wrapper ==-->
  </main>