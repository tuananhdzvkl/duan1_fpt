<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/slider_4.webp">
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
                  <a class="active" id="information-tab" data-bs-toggle="pill" href="#information" role="tab" aria-controls="information" aria-selected="true">Thông tin sản phẩm</a>
                </li>
                <li role="presentation">
                  <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá sản phẩm<span>(05)</span></a>
                </li>
              </ul>
              <div class="tab-content product-tab-content" id="ReviewTabContent">
                <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                  <div class="product-information">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adlo minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in tun tuni reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserun mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rel aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                  </div>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <div class="product-review-content">
                    <div class="review-content-header">
                      <h3>Người dùng đánh giá</h3>
                      <div class="review-info">
                        <ul class="review-rating">
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star-o"></li>
                        </ul>
                        <span class="review-caption">Dựa trên 5 đánh giá</span>
                        <span class="review-write-btn">Viết đánh giá</span>
                      </div>
                    </div>

                    <!--== Start Reviews Form Item ==-->
                    <div class="reviews-form-area">
                      <h4 class="title">Viết đánh giá</h4>
                      <div class="reviews-form-content">
                        <form action="#">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="for_name">Tên</label>
                                <input id="for_name" class="form-control" type="text" placeholder="Enter your name">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="for_email">Địa chỉ</label>
                                <input id="for_email" class="form-control" type="email" placeholder="john.smith@example.com">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <span class="title">Xếp hạng</span>
                                <ul class="review-rating">
                                  <li class="fa fa-star-o"></li>
                                  <li class="fa fa-star-o"></li>
                                  <li class="fa fa-star-o"></li>
                                  <li class="fa fa-star-o"></li>
                                  <li class="fa fa-star-o"></li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="for_review-title">Đánh giá tiêu đề</label>
                                <input id="for_review-title" class="form-control" type="text" placeholder="Give your review a title">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="for_comNamt">Cơ quan đánh giá (1500)</label>
                                <textarea id="for_comNamt" class="form-control" placeholder="Write your comNamts here"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-submit-btn">
                                <button type="submit" class="btn-submit">Đăng bình luận</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!--== End Reviews Form Item ==-->

                    <div class="reviews-content-body">
                      <!--== Start Reviews Content Item ==-->
                      <div class="review-item">
                        <ul class="review-rating">
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                        </ul>
                        <h3 class="title">Dịch vụ vận chuyển tuyệt vời</h3>
                        <h5 class="sub-title"><span>Nantu Nayal</span> no <span>Sep 30, 2022</span></h5>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <a href="#/">Báo cáo là không phù hợp</a>
                      </div>
                      <!--== End Reviews Content Item ==-->

                      <!--== Start Reviews Content Item ==-->
                      <div class="review-item">
                        <ul class="review-rating">
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star-o"></li>
                          <li class="fa fa-star-o"></li>
                          <li class="fa fa-star-o"></li>
                          <li class="fa fa-star-o"></li>
                        </ul>
                        <h3 class="title">Chất lượng thấp</h3>
                        <h5 class="sub-title"><span>Oliv hala</span> no <span>Sep 30, 2022</span></h5>
                        <p>My Favorite White Sneakers From Splurge To Save the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                        <a href="#/">Báo cáo là không phù hợp</a>
                      </div>
                      <!--== End Reviews Content Item ==-->

                      <!--== Start Reviews Content Item ==-->
                      <div class="review-item">
                        <ul class="review-rating">
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                        </ul>
                        <h3 class="title">Dịch vụ xuất sắc!</h3>
                        <h5 class="sub-title"><span>Halk Marron</span> no <span>Sep 30, 2022</span></h5>
                        <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                        <a href="#/">Báo cáo là không phù hợp</a>
                      </div>
                      <!--== End Reviews Content Item ==-->

                      <!--== Start Reviews Content Item ==-->
                      <div class="review-item">
                        <ul class="review-rating">
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star-o"></li>
                          <li class="fa fa-star-o"></li>
                        </ul>
                        <h3 class="title">Giá rất cao</h3>
                        <h5 class="sub-title"><span>Musa</span> no <span>Sep 30, 2022</span></h5>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        <a href="#/">Báo cáo là không phù hợp</a>
                      </div>
                      <!--== End Reviews Content Item ==-->

                      <!--== Start Reviews Content Item ==-->
                      <div class="review-item">
                        <ul class="review-rating">
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star"></li>
                          <li class="fa fa-star-o"></li>
                        </ul>
                        <h3 class="title">Bình thường</h3>
                        <h5 class="sub-title"><span>Muhammad</span> no <span>Sep 30, 2022</span></h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
                        <a href="#/">Báo cáo là không phù hợp</a>
                      </div>
                      <!--== End Reviews Content Item ==-->
                    </div>

                    <!--== Start Reviews Pagination Item ==-->
                    <div class="review-pagination">
                      <span class="pagination-pag">1</span>
                      <span class="pagination-pag">2</span>
                      <span class="pagination-next">Tiếp »</span>
                    </div>
                    <!--== End Reviews Pagination Item ==-->
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