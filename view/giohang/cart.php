<?php
if (empty($dataDb)) {
    echo '<div class="py-3 text-center">
            <div class="fs-4">Giỏ hàng trống</div>
            <img src="/assets/img/icons/logo.png" style="max-width: 90px; height: auto; margin-bottom: 10px;"><br>
            <button type="button" class="btn btn-warning rounded-pill text-dark" onclick="continueShopping()">Tiếp tục mua hàng</button>
        </div>';
    echo '<script>
        function buttonHoverEffect(button) {
          button.style.backgroundColor = "#2c5e28"; /* Adjust hover background color if desired */
          button.style.borderColor = "#2c5e28"; 
        }
        function continueShopping() {
          window.location.href = "?act=sanpham"; // Change "./" to the desired URL
      }
    </script>';
} else {
    // Your existing HTML content for the non-empty cart
?>


<!-- Your existing HTML content -->

<style>
  
 tbody {
        text-align: center; /* Center align text in tbody */
    }

    /* Style for thead */
    thead {
        display: table-header-group;
        background-color: #f5f5f5; /* Background color for thead */
    }

    /* Style for th */
    th {
        text-align: center; /* Center align text */
        padding: 15px 10px; /* Add padding for better spacing */
        border-bottom: 2px solid #ddd; /* Add a bottom border */
    }
    .product-stt{
      font-weight: bold;
    }
    

    /* Increase width for .product-remove and .product-stt */
    .product-stt {
        width: 5%; /* Adjust the width based on your preference */
        
    }

    /* Maintain width for other columns */
    .product-image,
    .product-name,
    .product-price,
    .product-quantity,
    .product-subtotal,
    .product-remove{
        width: 17.7%; /* Maintain width for other columns */
    }

    /* Responsive styling for smaller screens */
    @media (max-width: 768px) {
        th,
        .product-remove,
        .product-stt,
        .product-image,
        .product-name,
        .product-price,
        .product-quantity,
        .product-subtotal {
            width: auto; /* Allow columns to stack on smaller screens */
        }
    }
</style>


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
                  <li>Giỏ Hàng</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->
    <section class="shopping-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart-form table-responsive">
                        <form action="#" method="post">
                            <table class="table text-center">
                            <thead>
                                <tr>
                                    <th class="product-stt">STT</th>
                                    <th class="product-image">IMAGE</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">ACTION</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $sum_total = 0;
                                    foreach ($dataDb as $key => $sanpham) :
                                      // kiểm tra số lượng trong giỏ hàng
                                      $quantityInCart = 0;
                                      
                                      foreach ($_SESSION['cart'] as $item) {
                                          if (isset($item['id']) && $item['id'] == $sanpham['id_sp']) {
                                              $quantityInCart = $item['quantity'];
                                              break;
                                          }
                                      }
                                  
                                      // Debugging: Output the values to check
                                      // var_dump($quantityInCart);
                                    ?>
                                        <tr class="cart-product-item">
                                            <td class="product-stt"><?= $key + 1 ?></td>
                                            <td class="product-thumb">
                                                <a>
                                                    <img style="margin-left: 57px;" src="public/uploads/<?= $sanpham['image_sp'] ?>" width="90" height="110" alt="Image-HasTech">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <h4 class="title"><?= $sanpham['name_sp'] ?></h4>
                                            </td>
                                            <td class="product-price">
                                                <span class="price"><?= number_format((int)$sanpham['gia'], 0, '.', ',') ?> VNĐ </span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="quantity" title="Quantity" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $sanpham['id_sp'] ?>" oninput="updateQuantity(<?= $sanpham['id_sp'] ?>, <?= $key ?>)">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="price"><?= number_format((int)$sanpham['gia'] * (int)$quantityInCart, 0, '.', ',') ?> VNĐ </span>
                                            </td>
                                            <td class="product-remove">
                                                <a href="" onclick="removeCart(<?= $sanpham['id_sp'] ?>)" style="margin-left: 17px;"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                                            <script>  
                                                // hàm cập nhật số lượng
                                                function updateQuantity(id_sp, index) {
                                                    // Get the quantity value from the input field
                                                    let newQuantity = $('#quantity_' + id_sp).val();

                                                    // Add AJAX request to update quantity in session
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'view/giohang/updateQuantity.php',
                                                        data: {
                                                            id_sp: id_sp, // Fix: Use id_sp instead of id
                                                            quantity: newQuantity
                                                        },
                                                        success: function(response) {
                                                            // Calculate the new subtotal
                                                            let price = <?= (int)$sanpham['gia'] ?>; // Replace this with the actual price
                                                            let newSubtotal = price * newQuantity;

                                                            // Update the subtotal in the UI
                                                            $('.subtotal_' + index).text(newSubtotal.toLocaleString('en-US') + ' VNĐ');

                                                            // Log success message
                                                            console.log('Update successful');

                                                            // Log the response for debugging
                                                            console.log(response);
                                                        },
                                                        error: function(error) {
                                                            // Log any error messages
                                                            console.log(error);
                                                        }
                                                    });
                                                }


                                                function removeCart(id) {
                                                    if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
                                                        // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: 'view/giohang/removeCart.php',
                                                            data: {
                                                                id: id
                                                            },
                                                            success: function(response) {
                                                                // Log success message
                                                                console.log('Xóa sản phẩm thành công');

                                                                // Log the response for debugging
                                                                console.log(response);

                                                                // Delay the redirection by 2 seconds (2000 milliseconds)
                                                                setTimeout(function() {
                                                                    // Redirect to ?act=cart regardless of success or error
                                                                    window.location.href = '?act=cart';
                                                                }, 5000);
                                                            },
                                                            error: function(error) {
                                                                // Log any error messages
                                                                console.log(error);
                                                            }
                                                        });
                                                    }
                                                }
                                            </script>
                                        </tr>

                                        <?php
                                              // Tính tổng giá đơn hàng
                                              $sum_total += ((int)$product['gia'] * (int)$quantityInCart);

                                              // Lưu tổng giá trị vào sesion
                                              $_SESSION['resultTotal'] = $sum_total;
                                        ?>
                                    <?php endforeach ?>
                                    <tr class="actions">
                                    <td class="border-0" colspan="8">
                                        <button type="submit" class="update-cart" disabled>Cập nhật giỏ hàng</button>
                                        <button type="submit" class="clear-cart">Dọn dẹp giỏ hàng</button>
                                        <button type="button" class="clear-cart"  onclick="redirectToCheckout()">Mua Ngay</button>
                                        <a href="?act=sanpham" class="btn-theme btn-flat">Tiếp tục mua sắm</a>
                                    </td>

                                    <script>
                                        function redirectToCheckout() {
                                            window.location.href = "?act=CTthanhtoan";
                                        }
                                    </script>   

                                    </tr>
                                    
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
           <!--== End Blog Area Wrapper ==-->
</main>
<?php } ?>

