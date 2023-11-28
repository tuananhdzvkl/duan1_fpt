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
<section class="product-area product-best-seller-area">
    <div class="container pt--0">
        <div class="row">
            <div class="col-12">
                <!-- Section Title -->
                <div class="section-title text-center">
                    <h3 class="title">Sản Phẩm Tương Tự</h3>
                    <div class="desc">
                        <p>Có Rất Nhiều Lựa Chọn Phù Hợp Hợp Dành Cho Bạn</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Product Slider -->
                <div class="product-slider-wrap">
                    <div class="swiper-container product-slider-col4-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($sanpham as $product) : ?>
                                <?php extract($product); ?>
                                <div class="swiper-slide">
                                    <!-- Product Item -->
                                    <div class="product-item">
                                        <div class="inner-content">
                                            <!-- Product Image -->
                                            <div class="product-thumb">
                                                <a href="?act=chitietSP&id=<?= $id_sp ?>&id_dm=<?= $id_dm ?>">
                                                    <img src="public/uploads/<?= $image_sp ?>" width="270" height="274" alt="Product Image">
                                                </a>
                                                <!-- Discount Flag -->
                                                <div class="product-flag">
                                                    <?php if ($giam_gia > 0) : ?>
                                                        <ul>
                                                            <li class="discount"><?= $giam_gia ?>%</li>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- Product Actions -->
                                                <div class="product-action">
                                                    <a class="btn-product-wishlist" href="" onclick="addToWishlist()"><i class="fa fa-heart"></i></a>
                                                    <a class="btn-product-cart" href="" onclick="addToCart()"><i class="fa fa-shopping-cart"></i></a>
                                                    <button type="button" class="btn-product-quick-view-open">
                                                    <i class="fa fa-arrows"></i>
                                                    </button>
                                                    <a class="btn-product-compare" href=""><i class="fa fa-random"></i></a>
                                                </div>
                                                <script>
                                                    function addToWishlist() {
                                                    // Thêm logic xử lý khi sản phẩm được thêm vào yêu thích
                                                    alert('Sản phẩm đã được thêm vào danh sách yêu thích');
                                                    // Có thể thêm các bước khác như gửi yêu cầu đến máy chủ, cập nhật UI, v.v.
                                                    }

                                                    function addToCart() {
                                                    // Thêm logic xử lý khi sản phẩm được thêm vào giỏ hàng
                                                    alert('Sản phẩm đã được thêm vào giỏ hàng');
                                                    // Có thể thêm các bước khác như gửi yêu cầu đến máy chủ, cập nhật UI, v.v.
                                                    }
                                                </script>
                                                <a class="banner-link-overlay" href="shop.html"></a>
                                            </div>
                                            
                                            <!-- Product Information -->
                                            <div class="product-info">
                                                <!-- Category Information -->
                                                <div class="category">
                                                    <ul>
                                                        <li><a href="shop.php">
                                                                <?php
                                                                $genderName = ($gioi_tinh == 0) ? 'Unisex' : (($gioi_tinh == 1) ? 'Nam' : 'Nữ');
                                                                echo $genderName;
                                                                ?>
                                                            </a></li>
                                                    </ul>
                                                </div>
                                                <!-- Product Name -->
                                                <h4 class="title"><a href="index.php?act=chitietSP&id=<?= $id_sp ?>"><?= $name_sp ?></a></h4>
                                                <!-- Prices -->
                                                <div class="prices">
                                                    <span class="price-old"><?= number_format($gia_cu, 0, '.', ',') ?> vnđ</span>
                                                    <span class="sep">-</span>
                                                    <span class="price"><?= number_format($gia, 0, '.', ',') ?> vnđ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Item -->
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Swiper Navigation Buttons -->
                    <div class="product-swiper-btn-wrap">
                        <div class="product-swiper-btn-prev">
                            <i class="fa fa-arrow-left"></i>
                        </div>
                        <div class="product-swiper-btn-next">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
