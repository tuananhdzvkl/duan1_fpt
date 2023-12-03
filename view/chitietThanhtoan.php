<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="assets/js/location.js"></script>
<form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="" >
<main class="main-content" >
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
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group" style="margin-top:-10px;">
                        <label for="f_name">Tên của bạn <abbr class="required" title="required">*</abbr></label>
                        <input id="f_name" type="text"  class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group" style="margin-top:-10px;">
                        <label for="l_name">Họ Tên <abbr class="required" title="required">*</abbr></label>
                        <input id="l_name" type="text"  class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-group" style="margin-top:10px;">
                        <label for="province">Tỉnh/Thành phố <abbr class="required" title="required">*</abbr></label>
                        <select id="province" name="province" class="form-control">
                          <option>Chọn tỉnh thành</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group" style="margin-top:10px;">
                        <label for="district">Quận/Huyện <abbr class="required" title="required">*</abbr></label>
                        <select id="district" name="district" class="form-control">
                          <option>Chọn quận/huyện</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group" style="margin-top:10px;">
                        <label for="ward">Xã/Phường <abbr class="required" title="required">*</abbr></label>
                        <select id="ward" name="ward" class="form-control">
                          <option>Chọn xã/phường</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group" style="margin-top:10px;">
                        <label for="address">Địa chỉ cụ thể <abbr class="required" title="required">*</abbr></label>
                        <input id="address" type="text"  class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" style="margin-top:10px;">
                        <label for="phone">Số điện thoại <abbr class="required" title="required">*</abbr></label>
                        <input id="phone" type="text" required class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group" data-margin-bottom="30" style="margin-top:10px;">
                        <label for="email">Địa chỉ Email (optional)</label>
                        <input id="email" type="text"  class="form-control">
                      </div>
                    </div>
                    <!-- <div id="CheckoutBillingAccordion" class="col-md-12">
                      <div class="checkout-box" data-margin-bottom="25" data-bs-toggle="collapse" data-bs-target="#CheckoutOne" aria-expanded="false" role="toolbar">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input visually-hidden" id="CreateAccount">
                          <label class="custom-control-label" for="CreateAccount">Create an account?</label>
                        </div>
                      </div>
                      <div id="CheckoutOne" class="collapse" data-margin-top="30" data-bs-parent="#CheckoutBillingAccordion">
                        <div class="form-group">
                          <label for="password">Create account password <abbr class="required" title="required">*</abbr></label>
                          <input id="password" type="password"  class="form-control" placeholder="Password">
                        </div>
                      </div>
                    </div>
                    <div id="CheckoutBillingAccordion2" class="col-md-12">
                        <div class="checkout-box" data-margin-bottom="25" data-bs-toggle="collapse" data-bs-target="#CheckoutTwo" aria-expanded="false" role="toolbar">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input visually-hidden" id="ship-to-different-address">
                          <label class="custom-control-label" for="ship-to-different-address">Ship to a different address?</label>
                        </div>
                      </div>
                      <div id="CheckoutTwo" class="collapse" data-margin-top="30"  data-bs-parent="#CheckoutBillingAccordion2">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="f_name2">First name <abbr class="required" title="required">*</abbr></label>
                              <input id="f_name2" type="text"  class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="l_name2">Last name <abbr class="required" title="required">*</abbr></label>
                              <input id="l_name2" type="text"  class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="province">Province/City <abbr class="required" title="required">*</abbr></label>
                              <select id="province" name="province" class="form-control">
                                <option>Chọn tỉnh thành</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="district">District <abbr class="required" title="required">*</abbr></label>
                              <select id="district" name="district" class="form-control">
                                <option>Chọn quận/huyện</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="ward">Wards <abbr class="required" title="required">*</abbr></label>
                              <select id="ward" name="ward" class="form-control">
                                <option>Chọn xã/phường</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="address">Address <abbr class="required" title="required">*</abbr></label>
                              <input id="address" type="text"  class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="phone">Phone (optional) <abbr class="required" title="required">*</abbr></label>
                              <input id="phone" type="text" required class="form-control">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group" data-margin-bottom="30">
                              <label for="email">Email address <abbr class="required" title="required">*</abbr></label>
                              <input id="email" type="text"  class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="shipping-form-coupon">
                  <form action="#" method="post">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group mb--0">
                        <label for="order-notes">Ghi chú đơn hàng (optional)</label>
                        <textarea id="order-notes" style="height: 200px;" class="form-control"  placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt khi giao hàng."></textarea>
                        
                      </div>
                    </div>
                    <br><br>
                      <div class="col-md-12">
                        <div class="form-group">
                          <button type="submit" class="coupon-btn" onclick="redirectToCheckout()">Tiến hành kiểm tra</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                   
                  </div>
                </form>
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
                        if (isset($dataDb) && !empty($dataDb)) {
                            foreach ($dataDb as $item) {
                                // Check if the keys exist before accessing them
                                
                                $name_sp = isset($item['name_sp']) ? $item['name_sp'] : '';
                                $productId = isset($item['id_sp']) ? $item['id_sp'] : '';

                                // Fetch the quantity from the original cart data
                                $quantity = getQuantityFromCart($productId, $cart);

                                $gia = isset($item['gia']) ? $item['gia'] : '';

                                // Output the values
                                echo '<tr class="cart-item">';
                                echo '<td class="product-name">' . $name_sp . '<span class="product-quantity"> (× ' . $quantity . ')</span></td>';
                                echo '<td class="product-total">' .number_format((int)$item['gia'] * (int)$quantity, 0, '.', ',') . ' VNĐ</td>';
                                echo '</tr>';
                            }
                        } else {
                            // Handle the case when $dataDb is empty
                        }

                        // Function to get quantity from the original cart data
                        function getQuantityFromCart($productId, $cart) {
                            foreach ($cart as $cartItem) {
                                if ($cartItem['id'] == $productId) {
                                    return $cartItem['quantity'];
                                }
                            }
                            return 0; // Default quantity if not found
                        }
                    ?> 
                    </tbody>
                    <!-- Table Footer -->
                      <?php
                          $discountAmount = rand(1, 30);

                          // Ensure the discount amount is not more than 100%
                          $discountAmount = min(100, $discountAmount);

                          // Function to get quantity from the original cart data
                          if (!function_exists('getQuantityFromCart')) {
                            function getQuantityFromCart($productId, $cart) {
                                foreach ($cart as $cartItem) {
                                    if ($cartItem['id'] == $productId) {
                                        return $cartItem['quantity'];
                                    }
                                }
                                return 0; // Default quantity if not found
                            }
                          }
                          ?>

                          <tfoot class="table-foot">
                              <tr class="cart-subtotal">
                                  <th>Giảm Giá</th>
                                  <td><?= $discountAmount ?> %</td>
                              </tr>
                              <tr class="shipping">
                                  <th>Phí Vận Chuyển</th>
                                  <td>Flat rate: £2.00</td>
                              </tr>
                              <tr class="order-total">
                                  <th>Tổng </th>
                                  <td class="product-total">
                                      <?php
                                      $total = 0;
                                      foreach ($dataDb as $item) {
                                          $productId = isset($item['id_sp']) ? $item['id_sp'] : '';
                                          $quantity = getQuantityFromCart($productId, $cart);
                                          
                                          // Apply the discount to each item's total
                                          $discountedItemTotal = (int)$item['gia'] * (int)$quantity * ((100 - $discountAmount) / 100);
                                          
                                          $total += $discountedItemTotal;
                                      }
                                      echo number_format($total, 0, '.', ',') . ' VNĐ';
                                      ?>
                                  </td>
                              </tr>
                          </tfoot>
                          <!-- End of Table Footer -->
                  </table>

                  <div class="shop-payment-method" style="margin-top:50px;">
                    <div id="PaymentMethodAccordion">
                      <div class="card">
                      <h2 class="title mb-25">Phương thức thanh toán</h2>
                        <!-- <div class="card-header" id="check_payments">
                          <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemOne" aria-controls="itemOne" aria-expanded="true">Chuyển khoản ngân hàng</h5>
                        </div>
                        <div id="itemOne" class="collapse show" aria-labelledby="check_payments" data-bs-parent="#PaymentMethodAccordion">
                          <div class="card-body">
                            <p>Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn đặt hàng của bạn sẽ không được vận chuyển cho đến khi tiền đã được xóa trong tài khoản của chúng tôi.</p>
                          </div>
                        </div> -->
                      </div>
                      <div class="card">
                        <div class="card-header" id="check_payments3">
                          <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemThree" aria-controls="itemTwo" aria-expanded="false">Thanh toán khi nhận hàng</h5>
                        </div>
                        <div id="itemThree" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                          
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="check_payments4">
                          <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemFour" aria-controls="itemTwo" aria-expanded="false">Thanh toán ví điện tử</h5>
                        </div>
                        <div id="itemFour" class="collapse" aria-labelledby="check_payments4" data-bs-parent="#PaymentMethodAccordion">
                          <div class="card-body" >
                          
                              <a href="view/giohang/xulymomo.php">
                                  <img style="margin-left: 15px;" src="../assets/img/icons/momo.png" width="70" height="90" alt="image">
                              </a>
                            
                              <a href="#" onclick="openModal();">
                            <img src="/assets/img/icons/vnpay.png" width="70" height="90" alt="image">
                        </a>

                        <div id="myModal" class="modal-container">
                            <div class="modal-content">
                                <p style="font-size: 15px;">Tính năng đang được cập nhật</p>
                                <button class="close-button" onclick="closeModal()">Đóng</button>
                            </div>
                        </div>

                        <script>
                            function openModal() {
                                // Display the modal
                                document.getElementById('myModal').style.display = 'flex';
                            }

                            function closeModal() {
                                // Hide the modal
                                document.getElementById('myModal').style.display = 'none';
                            }
                        </script>
                    <style>
                            /* Modal container */
                            .modal-container {
                                display: none;
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: rgba(0, 0, 0, 0.5);
                                align-items: center;
                                justify-content: center;
                                z-index: 1;
                            }

                            /* Modal content */
                            .modal-content {
                                background: #fff;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                                text-align: center;
                                animation: fadeInScale 0.3s ease-in-out forwards;
                                width: 20pc;
                            }

                            /* Close button */
                            .close-button {
                                background: #3498db;
                                color: #fff;
                                border: none;
                                padding: 10px 20px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;
                                margin-top: 10px;
                                cursor: pointer;
                                border-radius: 3px;
                            }

                            /* Image style */
                            img {
                                margin-left: 15px;
                                cursor: pointer;
                                transition: transform 0.3s ease-in-out;
                            }

                            /* Hover effect for the image */
                            img:hover {
                                transform: scale(1.1);
                            }

                            @keyframes fadeInScale {
                                from {
                                    transform: scale(0.8);
                                    opacity: 0;
                                }
                                to {
                                    transform: scale(1);
                                    opacity: 1;
                                }
                            }
                        </style>
                                              </div>
                        </div>
                      </div>
                    </div>
                    <p class="p-text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#/">Privacy Policy.</a></p>
                    <div class="agree-policy">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="privacy" class="custom-control-input visually-hidden">
                        <label for="privacy" class="custom-control-label">I have read and agree to the website terms and conditions <span class="required">*</span></label>
                      </div>
                    </div>
                    <a href="account-login.html" class="btn-theme">Place order</a>
                  </div>
                </div>
              </div>
              <!--== End Order Details Accordion ==-->
            </div>
        </div>
      </div>
    </section>
    <!--== End Shopping Checkout Area Wrapper ==-->
  </main>
  </form>