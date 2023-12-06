<section class="product-area product-best-seller-area">
    <div class="container pt--0">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h3 class="title">Các Sản Phẩm Liên Quan</h3>
                    <div class="desc">
                        <p>Có Rất Nhiều Lựa Chọn Phù Hợp Hợp Dành Cho Bạn</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider-wrap">
                    <div class="swiper-container product-slider-col4-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($sanpham as $key) : extract($key)  ?>
                                <div class="swiper-slide">
                                    <!--== Start Product Item ==-->
                                    <div class="product-item">
              <div class="inner-content">
                <div class="product-thumb">
                <a href="?act=chitietSP&id_sp=<?= $id_sp ?>&id_dm=<?=$id_dm?>">
                    <img src="assets/uploads/<?= $image_sp ?>" width="270" height="274" alt="Image-HasTech">
                  </a>
                  <?php if ($giam_gia == 0) {
                    echo "";
                  } else {
                    echo "  <div class='product-flag'>
                    <ul>
                      <li class='discount'>$giam_gia%</li>
                    </ul>
                  </div>";
                  }


                  ?>

                  <!-- <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                  <a class="banner-link-overlay" href="shop.html"></a> -->
                </div>
                <div class="product-info">
                  <div class="category">
                    <ul>
                      <li><a href="shop.html">Nam</a></li>
                      <li class="sep">/</li>
                      <li><a href="shop.html">Nữ</a></li>
                    </ul>
                  </div>
                  <h4 class="title"><a href="?act=chitietSP&id_sp=<?= $id_sp ?>&id_dm=<?=$id_dm?>"><?= $name_sp ?></a></h4>
                  <div class="prices">
                    <?php if ($giam_gia == 0) {
                      echo " <span class='price'  >". number_format($gia, 0, '.', ',') ." VND</span>";
                    } else {
                      $giathuc = $gia - ($giam_gia*$gia)/100 ;  
                      echo "<span class='price-old' style='font-size: small; color: red; '>".number_format($gia, 0, '.', ',')." VND</span>
                      <span class='price'  >". number_format($giathuc, 0, '.', ',') ." VND</span>";
                    }
                    ?>
                   
                  </div>
                </div>
              </div>
            </div>
                                    <!--== End prPduct Item ==-->
                                </div>
                            <?php endforeach ?>
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