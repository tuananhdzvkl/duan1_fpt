<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/location.js"></script>
<form  method="POST" action="?act=thanhtoan">

  </script>
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/slider_4.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Checkout</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="?act=home">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Chi tiết thanh toán</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Shopping Checkout Area Wrapper ==-->
    <section class="shopping-checkout-wrap" style="margin-top:-5pc;">
      <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="checkout-page-login-wrap">
            <!--== Start Checkout Login Accordion ==-->
            <div class="login-accordion" id="LoginAccordion">
              <div class="card">
                <br><br>
                <div id="loginaccordion" class="collapse" data-bs-parent="#LoginAccordion">
                  <div class="card-body">
                    <div class="login-wrap">
                    
                      <form action="#" method="post">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--== End Checkout Login Accordion ==-->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="checkout-page-coupon-wrap">
            <!--== Start Checkout Coupon Accordion ==-->
            <div class="coupon-accordion" id="CouponAccordion">
              <div class="card">
                <h3>
                  <i class="fa fa-info-circle"></i>
                  Có phiếu giảm giá?
                  <a href="#/" data-bs-toggle="collapse" data-bs-target="#couponaccordion"> Bấm vào đây để nhập mã của bạn</a>
                </h3>
                <div id="couponaccordion" class="collapse" data-bs-parent="#CouponAccordion">
                  <div class="card-body">
                    <div class="apply-coupon-wrap mb-60">
                      <p>Nhập mã giảm giá của bạn (Nếu có)</p>
                      <form action="#" method="post">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <input class="form-control" type="text" placeholder="Enter your coupon code..">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <button class="btn-coupon">Xác Nhận</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--== End Checkout Coupon Accordion ==-->
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-6">
            <!--== Start Billing Accordion ==-->
            <div class="checkout-billing-details-wrap">
              <h2 class="title">Chi tiết thanh toán</h2>
              <div class="billing-form-wrap">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" data-margin-bottom="30" style="margin-top:10px;">
                      <label for="email">Họ Và Tên Của Bạn<abbr class="required" name="name" title="required">*</abbr></label>
                      <input id="email" name="name" type="text" value="<?php
                                                                        if (isset($_SESSION['username'])) {
                                                                          echo $_SESSION['username']['full_name'];
                                                                        }


                                                                        ?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group" style="margin-top:10px;">
                      <label for="province_codename_1">Tỉnh/Thành phố <abbr class="required" title="required">*</abbr></label>
                      <select id="province_codename_1" name="province_codename_1" class="form-control" required>
                        <option>Chọn tỉnh thành</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group" style="margin-top:10px;">
                      <label for="district_codename_1">Quận/Huyện <abbr class="required" title="required">*</abbr></label>
                      <select id="district_codename_1" name="district_codename_1" class="form-control">
                        <option>Chọn quận/huyện</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group" style="margin-top:10px;">
                      <label for="ward_codename_1">Xã/Phường <abbr class="required" title="required">*</abbr></label>
                      <select id="ward_codename_1" name="ward_codename_1" class="form-control" required>
                        <option>Chọn xã/phường</option>
                      </select>
                    </div>
                  </div>

                  <!-- Thêm trường nhập tùy chỉnh -->
                  <div class="col-md-12">
                    <div class="form-group" style="margin-top:10px;">
                      <label for="address">Địa chỉ cụ thể <abbr class="required" title="required">*</abbr></label>
                      <input type="hidden" id="diachi" name="diachi" value="<?php
                                                                            if (isset($_SESSION['username'])) {
                                                                              echo $_SESSION['username']['dia_chi'];
                                                                            } ?>" class="form-control">
                      <input type="text" id="customInput" name="customInput" class="form-control" style="display: none;" required>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group" style="margin-top:10px;">
                      <label for="phone">Số điện thoại <abbr class="required" title="required">*</abbr></label>
                      <input id="phone" type="text" name="sdt" required class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" data-margin-bottom="30" style="margin-top:10px;">
                      <label for="email">Địa chỉ Email (optional)</label>
                      <input id="email" type="text" name="email" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group mb--0">
                        <label for="ghichu">Ghi chú đơn hàng (optional)</label>
                        <textarea id="ghichu" name="ghichu" class="form-control" rows="7" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt khi giao hàng."></textarea>
                      </div>
                  </div>


                </div>

              </div>
            </div>
            <!--== End Billing Accordion ==-->
          </div>
          <div class="col-lg-6">
            <!--== Start Order Details Accordion ==-->
            <div class="checkout-order-details-wrap">
              <div class="order-details-table-wrap table-responsive">
                <h2 class="title mb-25">Đơn hàng của bạn</h2>

                <table class="table">
                  <tbody class="table-body">
                    <?php
                    $sum_total = null;
                    if (isset($dataDb)) {
                      foreach ($dataDb as $item => $sanpham) :
                        $quantityInCart = 0;

                        foreach ($_SESSION['cart'] as $item) {
                          if ($item['id'] == $sanpham['id_sp']) {
                            $quantityInCart = $item['quantity'];
                            break;
                          }
                        }
                    ?>
                        <tr class="shipping">
                          <th class='product-name'><b>Sản Phẩm</b> </th>
                          <th class='product-total'><b>Tổng</b></th>
                        </tr>

                        <tr class="cart-item">
                          <?php $giathuc = $sanpham['gia'] - ($sanpham['giam_gia'] * $sanpham['gia']) / 100; ?>
                          <td class="product-name"><?= $sanpham['name_sp'] ?> <span class="product-quantity"> (× <?= $quantityInCart ?>)</span></td>
                          <td class="product-total"><?= number_format((int)$giathuc * (int) $quantityInCart, 0, '.', ',') ?> VNĐ</td>

                        </tr>
                        <tr class="cart-item">
                          <td class="product-name">Màu Sắc : <b style="color:crimson;"><?php foreach ($mau1 as $key => $value) {
                                                                                      if ($value['id_color'] == $sanpham['id_color']) {
                                                                                        echo $value['name_color'];
                                                                                      }
                                                                                    }  ?></b></td>
                          <td class="product-total">Kích Thước: <b style="color: red;"><?php foreach ($size1 as $key => $value) {
                                                                                          if ($value['id_size'] == $sanpham['id_size']) {
                                                                                            echo $value['name_size'];
                                                                                          }
                                                                                        }  ?></b></td>

                        </tr>
                        <?php
                        $sum_total += ((int)$giathuc * (int)$quantityInCart);
                        // $_SESSION['resultTotal'] = $sum_total;
                        setcookie('Tong', $sum_total);
                        ?>
                    <?php endforeach;
                    } else {
                      // Xử lý khi $dataDb rỗng
                    }
                    // Function to get quantity from the original cart data

                    ?>
                  </tbody>
                  <!-- Table Footer -->
                  <tfoot class="table-foot">

                    <tr class="cart-subtotal">
                      <th>Giảm Giá</th>
                      <td><?= isset($discountAmount) ? $discountAmount . ' %' : 'Chưa áp dụng' ?></td>
                    </tr>

                    <tr class="order-total">
                      <th>Tổng Tiền </th>
                      <td class="product-total">
                        <?= number_format($_COOKIE['Tong'], 0, '.', ',') ?> VNĐ
                        <input type="hidden" name="tong" value="<?= $_COOKIE['Tong'] ?>">
                      </td>
                    </tr>
                  </tfoot>
                  <!-- End of Table Footer -->
                </table>


                <div class="shop-payment-method" style="margin-top:50px;">
                  <div id="PaymentMethodAccordion">
                    <div class="card">
                      <h2 class="title mb-25">Phương thức thanh toán</h2>
                      
                    </div>
                    <div class="card">
                      <div class="card-header" id="check_payments3">
                        <input type="radio" name="payment_method" id="payment_method3" value="1" required> Thanh toán khi nhận hàng
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header" id="check_payments4">
                        <input type="radio" name="payment_method" id="payment_method4" value="0" required> Thanh toán ví điện tử
                      </div>
                    </div>
                  </div>
                  
                    <input type="submit" name="dathang" class="btn-theme" value="Đặt hàng" onclick="order();">

                    <!-- JavaScript to handle the form submission and show/hide the alert -->
                    <script>
                      function order() {
                          // Assuming some condition to check if the form submission was successful
                          var isPaymentSuccessful = true; // Replace this with your actual condition

                          if (isPaymentSuccessful) {
                            Swal.fire({
                              icon: 'success',
                              title: 'Thanh toán thành công',
                              showConfirmButton: false,
                              timer: 3000
                            }).then(function() {
                              // Redirect to the success page after displaying the success message
                              window.location.href = "?act=lichsumua";
                            });
                          } else {
                            Swal.fire({
                              icon: 'error',
                              title: 'Thanh toán thất bại',
                              showConfirmButton: false,
                              timer: 3000
                            }).then(function() {
                              // Redirect to the home page after displaying the error message
                              window.location.href = "?act=home";
                            });
                          }
                        }

                    </script>
                    

                </div>
              </div>
            </div>
            <!--== End Order Details Accordion ==-->
          </div>
        </div>
      </div>
    </section>

  </main>
</form>