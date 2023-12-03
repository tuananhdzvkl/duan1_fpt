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
                          <input type="text" class="soluong" title="Quantity" value="1" id="quantityInput" min="1" readonly>

                          <div class="dec qty-btn">-</div>
                          <div class="inc qty-btn">+</div>
                        </div>
                      </div>
                    <button data-id="<?= $sp_img['id_sp'] ?>" class="btn-theme" id="addToCartBtn" onclick="addToCart(<?= $id ?>, '<?= $name_sp ?>', <?= $giathuc ?>)">Thêm vào giỏ hàng</button>
                  </div>
                      <!-- ... Your existing HTML code ... -->

                      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                  <script>
                    let totalProduct = document.getElementById('giohanh');


                    function addToCart(productId, productName, productPrice) {
                      // console.log(productId, productName, productPrice);
                      // Sử dụng jQuery
                      if (mau_sac != null || size_s != null) {
                        $.ajax({
                          type: 'POST',
                          // Đường dẫ tới tệp PHP xử lý dữ liệu
                          url: 'model/addToCart.php',
                          data: {
                            id: productId,
                            name: productName,
                            price: productPrice,
                            sl: soluong,
                            size: size_s,
                            mau: mau_sac
                          },
                          success: function(response) {
                            totalProduct.innerText = response;
                            alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!')
                          },
                          error: function(error) {
                            console.log(error);
                          }
                        });


                      } else {
                        alert('Vui Lòng Chọn Màu Sắc , Size')
                      }


                    }

                    // đoạn số lượng 

                    let mau_sac = null;
                    let size_s = null;
                    let idsp = null;
                    let soluong = 1;

                    //var id_san_pham = $(".product-single-info").children(".id_sp").val();
                    $(document).ready(function() {

                      var quantityInput = $('#quantityInput');
                      $('.inc').click(function() {
                        if (mau_sac != null || size_s != null) {
                          var currentValue = parseInt(quantityInput.val());
                          soluong = parseInt(currentValue+1);
                          console.log(soluong);
                          checkAndUpdateQuantity(currentValue + 1);
                        } else {
                          alert('Vui Lòng Chọn Màu Sắc , Size')
                        }
                      });

                      $('.dec').click(function() {
                        if (mau_sac != null || size_s != null) {
                          var currentValue = parseInt(quantityInput.val());
                         
                          if (currentValue > 1) {
                            soluong = parseInt(currentValue-1);
                            //console.log(soluong);
                            checkAndUpdateQuantity(currentValue - 1);
                          } else {
                            soluong = 1 ; 
                            alert('Số Lượng Sản Phẩm Không Nhỏ Hơn 1')
                          }
                        } else {
                          alert('Vui Lòng Chọn Màu Săc , Size')
                        }
                      });

                      function checkAndUpdateQuantity(newQuantity) {

                        // Gửi yêu cầu Ajax để kiểm tra số lượng
                        $.ajax({
                          type: 'POST',
                          url: 'model/check_sluong.php', // Thay đổi đường dẫn phù hợp
                          data: {
                            newQuantity: newQuantity,
                            mau: mau_sac,
                            size: size_s,
                            id_sp: idsp
                          },
                          success: function(response) {
                            if (response === 'valid') {
                              // Nếu số lượng hợp lệ, cập nhật giá trị
                              quantityInput.val(newQuantity);
                            } else {
                           
                              let hihi = newQuantity - 1;
                              soluong = hihi ; 
                              alert('Hiện tại Trong Kho Còn: ' + hihi + ' Sản phẩm');
                            }
                          }
                        });
                      }
                    });

                    // màu với size 
                    $(document).on('click', '.color-list li', function() {
                      // Xóa class 'active' từ tất cả các màu
                      $('.color-list li').removeClass('active');
                      // Thêm class 'active' cho màu được chọn
                      $(this).addClass('active');

                      // Rest of your code...
                    });
                    $(document).on('click', '.size-list li', function() {
                      // Xóa class 'active' từ tất cả các màu
                      $('.size-list li').removeClass('active');
                      // Thêm class 'active' cho màu được chọn
                      $(this).addClass('active');


                    });


                    // Sự kiện khi một kích thước được chọn
                    $(document).on('click', '.size-list li', function() {
                      var selectedSizeId = $(this).val();
                      var selectedColor = $('.color-list li.active').attr('value');
                      var id_san_pham = $(".product-single-info").children(".id_sp").val();

                      // Check size thuộc màu
                      $.post(
                        "model/check_size.php", {
                          id_sp: id_san_pham,
                          color: selectedColor,
                          size: selectedSizeId,
                        },
function(data) {
                          var isSizeBelongsToColor = JSON.parse(data);
                          if (isSizeBelongsToColor) {
                            // alert("Chọn đúng nền văn minh rồi");
                            // Nếu size thuộc màu, kiểm tra số lượng
                            // console.log(selectedColor);
                            mau_sac = selectedColor;
                            size_s = selectedSizeId;
                            idsp = id_san_pham;
                           // soluong = 1;
                           console.log(soluong);
                            //console.log(id_san_pham);
                            ////console.log(size);
                          } else {

                            alert("Hiện Tại Size này Đang Hết Hàng");
                          }
                        }
                      );
                    });
                    $(document).on('click', '.color-list li', function() {
                      var selectedColor = $(this).val();
                      var selectedSizeId = $('.size-list li.active').attr('value');
                      var id_san_pham = $(".product-single-info").children(".id_sp").val();

                      // Check màu thuộc size
                      $.post(
                        "model/check_size.php", {
                          id_sp: id_san_pham,
                          color: selectedColor,
                          size: selectedSizeId,
                        },
                        function(data) {
                          var isSizeBelongsToSize = JSON.parse(data);
                          if (isSizeBelongsToSize) {
                            mau_sac = selectedColor;
                            size_s = selectedSizeId;
                            idsp = id_san_pham;
                           // soluong = 1;
                             console.log(soluong);
                            // console.log(size_s);
                            //  console.log(id_san_pham);
                            // Nếu màu thuộc size, kiểm tra số lượng

                          } else {
                            alert("Hiện Tại Màu này Đang Hết Hàng");
                          }
                        }
                      );
                    });
                  </script>


                      <!-- ... Your existing HTML code ... -->

                      <div class="product-wishlist-compare"></div>

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