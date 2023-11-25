<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/slider/1233.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Chi tiết sản phẩm</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="index.html">Trang chủ</a></li>
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
                          $linkimg = "../public/uploads/".$img_url
                          ?>
                          <div class="swiper-slide">
                            <img src="<?= $linkimg ?>" width="127" height="127" alt="Product Image">
                          </div>
                          
                          <?php
                        }
                        ?>
                        
                        </div>
                      </div>
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
                        <div class="rating-box">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <div class="review-status">
                          <a href="">(<?= $view ?> Lượt Xem)</a>
                        </div>
                      </div>
                      <p><?= $mo_ta ?></p>
                      <div class="product-color">
                        <h6 class="title">Color</h6>
                        <ul class="color-list">
                          <?php foreach ($load_color as $key => $value):?>
                            <li class="active" style="background-color: <?= $value['name_color'] ?>"></li>
                          <?php endforeach?>
                        </ul>
                      </div>
                      <div class="product-size">
                        <h6 class="title">Size</h6>
                        <ul class="size-list">
                          <?php foreach ($load_size as $key => $value):?>
                            <li class="active" ><?= $value['name_size']?></li>
                          <?php endforeach?>
                        </ul>
                      </div>
                      <div class="product-quick-action">
                        <div class="qty-wrap">
                          <div class="pro-qty">
                            <input type="text" title="Quantity" value="1">
                          </div>
                        </div>
                        <a class="btn-theme" href="index.php?act=thanhtoan">Thanh Toán</a>
                      </div>
                      <div class="product-wishlist-compare">
                        <a href="shop-wishlist.html"><i class="pe-7s-like"></i>Thêm vào ưa thích</a>
                        <a href="shop-compare.html"><i class="pe-7s-shuffle"></i>Thêm vào giỏ hàng</a>
                      </div>
                      <div class="product-info-footer">
                        <h6 class="code"><span>Code :</span>Ch-256xl</h6>
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
                <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Bình Luận<span>(<?=$tong=count($binhluan)?>)</span></a>
              </li>
            </ul>
            <div class="tab-content product-tab-content" id="ReviewTabContent">
              <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                <div class="product-information">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adlo minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in tun tuni reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserun mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rel aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
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
    <section class="product-area product-best-seller-area">
      <div class="container pt--0">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center">
              <h3 class="title">Sản phẩm tương tự</h3>
              <div class="desc">
                <p>There are many variations of passages of Lorem Ipsum available</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product-slider-wrap">
              <div class="swiper-container product-slider-col4-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product.html">
                            <img src="assets/img/shop/1.webp" width="270" height="274" alt="Image-HasTech">
                          </a>
                          <div class="product-flag">
                            <ul>
                              <li class="discount">-10%</li>
                            </ul>
                          </div>
                          <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                          <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                        <div class="product-info">
                          <div class="category">
                    <ul>
                      <li><a href="shop.html">Nam</a></li>
                              <li class="sep">/</li>
                              <li><a href="shop.html">Nữ</a></li>
                            </ul>
                          </div>
                          <h4 class="title"><a href="single-product.html">Giày thông minh hiện đại</a></h4>
                          <div class="prices">
                            <span class="price-old">$300</span>
                            <span class="sep">-</span>
                            <span class="price">$240.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End prPduct Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product.html">
                            <img src="assets/img/shop/7.webp" width="270" height="274" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                          <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                        <div class="product-info">
                          <div class="category">
                    <ul>
                      <li><a href="shop.html">Nam</a></li>
                              <li class="sep">/</li>
                              <li><a href="shop.html">Nữ</a></li>
                            </ul>
                          </div>
                          <h4 class="title"><a href="single-product.html">Giày nam Quickiin</a></h4>
                          <div class="prices">
                            <span class="price">$240.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End prPduct Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product.html">
                            <img src="assets/img/shop/3.webp" width="270" height="274" alt="Image-HasTech">
                          </a>
                          <div class="product-flag">
                            <ul>
                              <li class="discount">-10%</li>
                            </ul>
                          </div>
                          <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                          <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                        <div class="product-info">
                          <div class="category">
                    <ul>
                      <li><a href="shop.html">Nam</a></li>
                              <li class="sep">/</li>
                              <li><a href="shop.html">Nữ</a></li>
                            </ul>
                          </div>
                          <h4 class="title"><a href="single-product.html">Giày Rexpo Nữ</a></h4>
                          <div class="prices">
                            <span class="price-old">$300</span>
                            <span class="sep">-</span>
                            <span class="price">$240.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End prPduct Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product.html">
                            <img src="assets/img/shop/4.webp" width="270" height="274" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                          <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                        <div class="product-info">
                          <div class="category">
                    <ul>
                      <li><a href="shop.html">Nam</a></li>
                              <li class="sep">/</li>
                              <li><a href="shop.html">Nữ</a></li>
                            </ul>
                          </div>
                          <h4 class="title"><a href="single-product.html">Dép da nam</a></h4>
                          <div class="prices">
                            <span class="price">$240.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End prPduct Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product.html">
                            <img src="assets/img/shop/5.webp" width="270" height="274" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                          <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                        <div class="product-info">
                          <div class="category">
                    <ul>
                      <li><a href="shop.html">Nam</a></li>
                              <li class="sep">/</li>
                              <li><a href="shop.html">Nữ</a></li>
                            </ul>
                          </div>
                          <h4 class="title"><a href="single-product.html">Giày nam nguyên thủy</a></h4>
                          <div class="prices">
                            <span class="price-old">$300</span>
                            <span class="sep">-</span>
                            <span class="price">$240.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End prPduct Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product.html">
                            <img src="assets/img/shop/6.webp" width="270" height="274" alt="Image-HasTech">
                          </a>
                          <div class="product-flag">
                            <ul>
                              <li class="discount">-10%</li>
                            </ul>
                          </div>
                          <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                          <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                        <div class="product-info">
                          <div class="category">
                    <ul>
                      <li><a href="shop.html">Nam</a></li>
                              <li class="sep">/</li>
                              <li><a href="shop.html">Nữ</a></li>
                            </ul>
                          </div>
                          <h4 class="title"><a href="single-product.html">Giày vải đơn giản</a></h4>
                          <div class="prices">
                            <span class="price-old">$300</span>
                            <span class="sep">-</span>
                            <span class="price">$240.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End prPduct Item ==-->
                  </div>
                </div>
              </div>
              <!--== Add Swiper Arrows ==-->
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
    <!--== End Product Area Wrapper ==-->
  </main>