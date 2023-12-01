    <!-- Include jQuery library once -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <?php
    // Kiểm tra xem giỏ hàng có dữ liệu hay không
    if (!empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
        $productId = array_column($cart, 'id');

        // Chuyển đôi mảng id thành một chuỗi để thực hiện truy vấn
        $idList = implode(',', $productId);

        // Lấy sản phẩm trong bảng sản phẩm theo id
        $dataDb = loadone_sanphamCart($idList);
        $sum_total = 0;
        foreach ($dataDb as $key => $sanpham) {
            // kiểm tra số lượng sản phẩm trong giỏ hàng
            $quantityInCart = 0;
            foreach ($_SESSION['cart'] as $item) {
                if ($item['id'] == $sanpham['id_sp']) {
                    $quantityInCart = $item['quantity'];
                    break;
                }
            }
            ?>
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
                                                            <span class="price"><?= number_format((int)$sanpham['gia'], 0, '.', ',') ?> <u>VNĐ</u> </span>
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="pro-qty">
                                                                <input type="text" class="quantity" title="Quantity" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $sanpham['id_sp'] ?>" oninput="updateQuantity(<?= $sanpham['id_sp'] ?>, <?= $key ?>)">
                                                            </div>
                                                        </td>

                                                        <td class="product-subtotal">
                                                            <span class="price"><?= number_format((int)$sanpham['gia'] * (int)$quantityInCart, 0, '.', ',') ?> <u>VNĐ</u> </span>
                                                        </td>
                                                        <td class="product-remove">
                                                            <a href="" onclick="removeCart(<?= $sanpham['id_sp'] ?>)" style="margin-left: 17px;"><i class="fa fa-trash-o"></i></a>
                                                        </td>

                                                    </tr>
                                                <?php
                                                // Tính tổng giá đơn hàng
                                                $sum_total += ((int)$sanpham['gia'] * (int)$quantityInCart);

                                                // Lưu tổng giá trị vào session
                                                $_SESSION['resultTotal'] = $sum_total;
                                                endforeach; ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--== End Blog Area Wrapper ==-->
            </main>
        <?php } ?>
        <tr class="actions">
            <td class="border-0" colspan="8">
                <button type="submit" class="update-cart" disabled>Cập nhật giỏ hàng</button>
                <button type="submit" class="clear-cart">Dọn dẹp giỏ hàng</button>
                <button type="button" class="clear-cart" onclick="redirectToCheckout()">Mua Ngay</button>
                <a href="?act=sanpham" class="btn-theme btn-flat">Tiếp tục mua sắm</a>
            </td>

            <script>
                function redirectToCheckout() {
                    window.location.href = "?act=CTthanhtoan";
                }
            </script>

        </tr>
    <?php } ?>