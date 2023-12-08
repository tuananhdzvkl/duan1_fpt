<main class="main-content">
  <!--== Start Page Header Area Wrapper ==-->
  <div class="page-header-area" data-bg-img="assets/img/slider/1233.jpg">
    <div class="container pt--0 pb--0">
      <div class="row">
        <div class="col-12">
          <div class="page-header-content">
            <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Product Details</h2>
            <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
              <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="breadcrumb-sep">//</li>
                <li>Chi Tiết</li>
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
        <div class="col-12">
          <div class="product-single-item">
            <div class="row">
              <div class="col-xl-6">
                <!--== Start Product Thumbnail Area ==-->
                <div class="product-single-thumb">
                  <div class="swiper-container single-product-thumb single-product-thumb-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <a class="lightbox-image" data-fancybox="gallery" href="assets/uploads/<?= $sp_img['image_sp'] ?>">

                          <img src="assets/uploads/<?= $sp_img['image_sp'] ?>" width="570" height="541" alt="Image-HasTech">
                        </a>
                      </div>
                      <?php foreach ($img as $key => $value) :  ?>
                        <div class="swiper-slide">
                          <a class="lightbox-image" data-fancybox="gallery" href="assets/uploads/<?= $value['img_url'] ?>">
                            <img src="assets/uploads/<?= $value['img_url'] ?>" width="570" height="541" alt="Image-HasTech">
                          </a>
                        </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="swiper-container single-product-nav single-product-nav-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img src="assets/uploads/<?= $sp_img['image_sp'] ?>" width="127" height="127" alt="Image-HasTech">
                      </div>
                      <?php foreach ($img as $key => $value) :  ?>
                        <div class="swiper-slide">
                          <img src="assets/uploads/<?= $value['img_url'] ?>" width="127" height="127" alt="Image-HasTech">
                        </div>
                      <?php endforeach ?>

                    </div>
                  </div>
                </div>
                <!--== End Product Thumbnail Area ==-->
              </div>
              <div class="col-xl-6">
                <!--== Start Product Info Area ==-->
                <div class="product-single-info">
                  <input type="hidden" value="<?= $sp_img['id_sp'] ?>" class="id_sp">
                  <h3 class="main-title"><?= $sp_img['name_sp'] ?></h3>
                  <div class="prices">
                    <?php if ($sp_img['giam_gia'] == 0) {
                      echo " <span class='price'  >" . number_format($sp_img['gia'], 0, '.', ',') . " VND</span>";
                    } else {
                      $giathuc = $sp_img['gia'] - ($sp_img['giam_gia'] * $sp_img['gia']) / 100;
                      echo "<span class='price-old' style='font-size: small; color: red; text-decoration: line-through;'>" . number_format($sp_img['gia'], 0, '.', ',') . " VND</span>
                      <span class='price'  >" . number_format($giathuc, 0, '.', ',') . " VND</span>";
                    }
                    ?>
                  </div>
                  <div class="rating-box-wrap">
                    <div class="rating-box">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="review-status">
                      <a href="">(<?= $sp_img['view'] ?> Lượt Xem)</a>
                    </div>
                  </div>
                  <p><?= $sp_img['mo_ngan'] ?></p>
                  <!-- HTML -->
                  <div class="product-color" id="colorSection">
                    <h6 class="title">Color</h6>
                    <ul class="color-list">
                      <?php foreach ($load_color as $key => $value) : ?>
                        <li value="<?= $value['id_color'] ?>" data-bg-color="<?= $value['mau'] ?> "></li>
                      <?php endforeach ?>
                    </ul>
                  </div>

                  <div class="product-size" id="sizeSection">
                    <h6 class="title">Size</h6>
                    <ul class="size-list">
                      <?php foreach ($load_size as $key => $value) : ?>
                        <li value="<?= $value['id_size'] ?>"><?= $value['name_size'] ?></li>
                      <?php endforeach ?>
                    </ul>
                  </div>

                  <div class="product-quick-action">
                    <div class="qty-wrap">
                      <div class="pro-qty">
                        <input type="text" class="soluong" title="Quantity" value="1" id="quantityInput" min="1" readonly>

                        <div class="dec qty-btn">-</div>
                        <div class="inc qty-btn">+</div>
                      </div>
                    </div>
                    <button data-id="<?= $sp_img['id_sp'] ?>" class="btn-theme" id="addToCartBtn" onclick="addToCart(<?= $sp_img['id_sp'] ?>, '<?= $sp_img['name_sp'] ?>', <?= $giathuc ?>)">Thêm vào giỏ hàng</button>
                  </div>

                  <!-- check size color  -->
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
                        alert('Vui Lòng Chọn Màu Săc , Size')
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
                          soluong = parseInt(currentValue + 1);
                          console.log(soluong);
                          checkAndUpdateQuantity(currentValue + 1);
                        } else {
                          alert('Vui Lòng Chọn Màu Săc , Size')
                        }
                      });

                      $('.dec').click(function() {
                        if (mau_sac != null || size_s != null) {
                          var currentValue = parseInt(quantityInput.val());

                          if (currentValue > 1) {
                            soluong = parseInt(currentValue - 1);
                            //console.log(soluong);
                            checkAndUpdateQuantity(currentValue - 1);
                          } else {
                            soluong = 1;
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
                              soluong = hihi;
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
                      resetOldData()
                      // Rest of your code...
                    });
                    $(document).on('click', '.size-list li', function() {
                      // Xóa class 'active' từ tất cả các màu
                      $('.size-list li').removeClass('active');
                      // Thêm class 'active' cho màu được chọn
                      $(this).addClass('active');
                      resetOldData()

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
                            //console.log(selectedColor);
                            mau_sac = selectedColor;
                            size_s = selectedSizeId;
                            idsp = id_san_pham;
                            // soluong = 1;
                            //console.log(soluong);
                            //console.log(id_san_pham);
                            console.log(size);
                          } else {

                            alert("Hiện Tại Size này Đang Hết Hàng");
                          }
                        }
                      );
                    });

                    function resetOldData() {
                      mau_sac = null;
                      size_s = null;
                      idsp = null;
                      soluong = 1;
                      // Thêm bất kỳ đoạn mã đặt lại dữ liệu khác nếu cần
                    }
                  </script>





                  <div class="product-wishlist-compare">

                  </div>
                  <div class="product-info-footer">
                    <h6 class="code"><span>Code :</span>SP_S<?= $sp_img['id_sp'] ?></h6>
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
                <a class="active" id="information-tab" data-bs-toggle="pill" href="#information" role="tab" aria-controls="information" aria-selected="true">Thông Tin Sản Phẩm</a>
              </li>

              <li role="presentation">
                <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Bình Luận<span>(<?= $tong = count($binhluan) ?>)</span></a>
              </li>
            </ul>
            <div class="tab-content product-tab-content" id="ReviewTabContent">
              <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                <div class="product-information">
                  <p><?= $sp_img['mo_ta'] ?></p>
                </div>
              </div>

              <?php include("view/binhluan/binhluan.php") ?>


            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>
  <!--== End Product Single Area Wrapper ==-->

  <!--== Start Product Area Wrapper ==-->
  <?php include("sanphamlienquan.php") ?>
  <!--== End Product Area Wrapper ==-->
</main>