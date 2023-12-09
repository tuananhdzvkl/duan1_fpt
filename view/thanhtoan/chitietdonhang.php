<style>
    body {
        background: #eee;
    }

    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: 1rem;
    }

    .text-reset {
        --bs-text-opacity: 1;
        color: inherit !important;
    }

    a {
        color: #5465ff;
        text-decoration: none;
    }

    body {
        margin-top: 20px;
    }

    .steps .step {
        display: block;
        width: 100%;
        margin-bottom: 35px;
        text-align: center
    }

    .steps .step .step-icon-wrap {
        display: block;
        position: relative;
        width: 100%;
        height: 80px;
        text-align: center
    }

    .steps .step .step-icon-wrap::before,
    .steps .step .step-icon-wrap::after {
        display: block;
        position: absolute;
        top: 50%;
        width: 50%;
        height: 3px;
        margin-top: -1px;
        background-color: #e1e7ec;
        content: '';
        z-index: 1
    }

    .steps .step .step-icon-wrap::before {
        left: 0
    }

    .steps .step .step-icon-wrap::after {
        right: 0
    }

    .steps .step .step-icon {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        border: 1px solid #e1e7ec;
        border-radius: 50%;
        background-color: #f5f5f5;
        color: #374250;
        font-size: 38px;
        line-height: 81px;
        z-index: 5
    }

    .steps .step .step-title {
        margin-top: 16px;
        margin-bottom: 0;
        color: #606975;
        font-size: 14px;
        font-weight: 500
    }

    .steps .step:first-child .step-icon-wrap::before {
        display: none
    }

    .steps .step:last-child .step-icon-wrap::after {
        display: none
    }

    .steps .step.completed .step-icon-wrap::before,
    .steps .step.completed .step-icon-wrap::after {
        background-color: #0da9ef
    }

    .steps .step.completed .step-icon {
        border-color: #0da9ef;
        background-color: #0da9ef;
        color: #fff
    }

    @media (max-width: 576px) {

        .flex-sm-nowrap .step .step-icon-wrap::before,
        .flex-sm-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 768px) {

        .flex-md-nowrap .step .step-icon-wrap::before,
        .flex-md-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 991px) {

        .flex-lg-nowrap .step .step-icon-wrap::before,
        .flex-lg-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 1200px) {

        .flex-xl-nowrap .step .step-icon-wrap::before,
        .flex-xl-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    .bg-faded,
    .bg-secondary {
        background-color: #f5f5f5 !important;
    }


    .panel-order .row {
        border-bottom: 1px solid #ccc;
    }

    .panel-order .row:last-child {
        border: 0px;
    }

    .panel-order .row .col-md-1 {
        text-align: center;
        padding-top: 15px;
    }

    .panel-order .row .col-md-1 img {
        width: 50px;
        max-height: 50px;
    }

    .panel-order .row .row {
        border-bottom: 0;
    }

    .panel-order .row .col-md-11 {
        border-left: 1px solid #ccc;
    }

    .panel-order .row .row .col-md-12 {
        padding-top: 7px;
        padding-bottom: 7px;
    }

    .panel-order .row .row .col-md-12:last-child {
        font-size: 11px;
        color: #555;
        background: #efefef;
    }

    .panel-order .btn-group {
        margin: 0px;
        padding: 0px;
    }

    .panel-order .panel-body {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    .panel-order .panel-deading {
        margin-bottom: 0;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

<div class="container">
    <h2>Chi Tiết Đơn Mua</h2>
    <div class="row">
        <div class="col-lg-8">
            <!-- Chi tiết -->
            <?php foreach ($donhang as $key => $value) : ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <!-- Giả định về các biến -->
                                <span class="me-3"><strong><?= $value['thoi_gian'] ?></strong></span>
                                <span class="me-3"><strong><?= $value['ma_don'] ?></strong></span>
                                <span>
                                    <?php
                                    $trang_thai = $value['trang_thai'];

                                    echo "<p class='btn ";

                                    if ($trang_thai == 0) {
                                        echo "btn-warning btn-sm'>Chờ xác nhận";
                                    } elseif ($trang_thai == 1) {
                                        echo "btn-success btn-sm'>Đã xác nhận";
                                    } elseif ($trang_thai == 2) {
                                        echo "btn-primary btn-sm'>Đang giao hàng";
                                    } elseif ($trang_thai == 3) {
                                        echo "btn-info btn-sm'>Đã nhận hàng";
                                    } else {
                                        echo "btn-danger btn-sm'>Đã hủy";
                                    }

                                    echo "</p>";
                                    ?>

                                </span>
                            </div>

                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <!-- Các dòng chi tiết đơn hàng -->
                                <?php foreach ($sanpham_lq as $sanpham) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <!-- Giả định về ảnh sản phẩm -->
                                                    <img src="assets/uploads/<?= $sanpham['image_sp'] ?>" alt="" width="35" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0"><?= $sanpham['name_sp'] ?></h6>



                                                    <span class="small">Màu: <span style="color: red;"> <?php
                                                                                                        foreach ($mau1 as $key => $mau) {
                                                                                                            if ($mau['id_color'] == $sanpham['mau_sac']) {
                                                                                                                echo $mau['name_color'];
                                                                                                            }
                                                                                                        }
                                                                                                        ?></span> </span>


                                                    <span class="small" style="margin-left: 10px;">Kích Cỡ: <span style="color: red;"> <?php
                                                                                                                                        foreach ($size1 as $key => $mau) {
                                                                                                                                            if ($mau['id_size'] == $sanpham['kich_co']) {
                                                                                                                                                echo $mau['name_size'];
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        ?></span> </span>

                                                </div>
                                            </div>
                                        </td>
                                        <td>(x<?= $sanpham['so_luong'] ?>)</td>
                                        <td class="text-end"><?= number_format($sanpham['gia']) ?> VNĐ</td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>

                                <tr>
                                    <td colspan="2">Voucher</td>
                                    <td class="text-danger text-end"><?= isset($discountAmount) ? $discountAmount . ' %' : 'Chưa áp dụng' ?>
                                <tr class="cart-subtotal">
                                </tr>

                                <tr class="fw-bold">
                                    <td colspan="2">TỔNG CỘNG</td>
                                    <td class="text-end"><?= number_format($value['thanh_tien']) ?> VNĐ</td>
                                </tr>

                            </tfoot>

                        </table>
                        <hr>
                        <!-- Add condition to display buttons based on order status -->
                        <tr class="fw-bold">
                            <h3 colspan="2" class="h6">

                            </h3>
                            <p class="text-end">
                                <?php
                                if ($value['trang_thai'] == 0  || $value['trang_thai'] == 1) {
                                    echo '<button class="btn btn-danger btn-sm ms-2" onclick="huyDon(' . $_GET['id_don'] . ',1)">Hủy Đơn Hàng</button>';
                                } elseif ($value['trang_thai'] == 2) {
                                    echo '<button class="btn btn-info btn-sm ms-2" onclick="huyDon(' . $_GET['id_don'] . ',2)">Đã Nhận Hàng</button>';
                                } else {
                                    echo 'Không thể hủy đơn hàng với trạng thái hiện tại.';
                                }
                                ?>
                            </p>
                        </tr>
                    </div>
                </div>




                <!-- Thanh toán -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Phương Thức Thanh Toán</h3>
                                <p>
                                    <?php
                                    if ($value['thanh_toan'] == 0) {
                                        echo "<p class='btn btn-primary btn-sm'>Thanh Toán Online</p>";
                                    } else {
                                        echo " <p class='btn btn-success btn-sm'>Thanh Toán Khi Nhận Hàng</p>";
                                    }
                                    ?>
                                    <br>
                                    <strong>Tổng: <?= number_format($value['thanh_tien']) ?> VNĐ</strong>
                                </p>
                            </div>
                        <?php endforeach ?>
                        <?php foreach ($donhang as $sp) : ?>
                            <div class="col-lg-6">
                                <h3 class="h6">Địa Chỉ Thanh Toán</h3>
                                <address>
                                    <strong><?= $sp['full_name'] ?></strong><br>
                                    <?= $sp['dia_chi'] ?><br>
                                    <abbr title="Phone">SĐT: </abbr> 0<?= $sp['phone'] ?>
                                </address>
                            </div>

                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-4">
            <!-- Ghi chú của Khách hàng -->

            <div class="card mb-4">
                <!-- Thông tin Vận Chuyển -->
                <div class="card-body">
                    <h3 class="h6">Thông Tin Vận Chuyển</h3>

                    <hr>
                    <h3 class="h6">Địa Chỉ</h3>
                    <address>
                        <strong><?= $sp['full_name'] ?></strong><br>
                        <?= $sp['dia_chi'] ?><br>
                        <abbr title="Phone">SĐT: </abbr> 0<?= $sp['phone'] ?>
                    </address>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function huyDon(idDonHang, id) {
        // console.log(idDonHang,id);
        $.ajax({
            type: 'POST',
            url: 'model/xulyhuydon.php', // Thay đổi đường dẫn tới file xử lý hủy đơn
            data: {
                id_don_hang: idDonHang,
                key: id

            },
            success: function(response) {
                // Xử lý phản hồi từ máy chủ nếu cần
                //  console.log(response);
                alert(response);
                location.reload();
                // Cập nhật giao diện người dùng nếu cần
                // Ví dụ: Ẩn nút hủy đơn sau khi hủy thành công
                // $('.btn-danger').hide();
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>