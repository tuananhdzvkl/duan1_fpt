<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    h3{
        color: #007bff; /* Màu chữ cho tiêu đề h2 */
        margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
        text-decoration: underline;
    }

    select.custom-select {
        width: 100%; /* Chiều rộng 100% */
        padding: 8px; /* Khoảng cách bên trong */
        border: 1px solid #ced4da; /* Viền */
        border-radius: 5px; /* Bo góc */
        background-color: #ffffff; /* Màu nền */
        color: #495057; /* Màu chữ */
        cursor: pointer; /* Con trỏ chuột khi hover */
    }

    /* Kiểu cho thẻ option */
    select.custom-select option {
        background-color: #ffffff; /* Màu nền */
        color: #495057; /* Màu chữ */
    }


</style>

<body>
    <div class="container mt-3">
        <h3>Lịch Sử Đơn Hàng</h3>
        <form action="/action_page.php">
            <!-- Project Card Example -->
            <select id="customSelect" name="cars" class="custom-select mb-3" onchange="updateCustomSelect(this)">
                <option selected>Custom Select Menu</option>
                <option value="?act=lichsumua">Tất Cả</option>
                <option value="?act=lichsumua&bill=0">Chờ xác nhận</option>
                <option value="?act=lichsumua&bill=1">Đã xác nhận</option>
                <option value="?act=lichsumua&bill=2">Đang giao hàng</option>
                <option value="?act=lichsumua&bill=3">Đã nhận hàng</option>
                <option value="?act=lichsumua&bill=4">Đã hủy</option>
            </select>

            <script>
            function updateCustomSelect(selectElement) {
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                document.getElementById("customSelect").options[0].text = selectedOption.text;

                
                window.location.href = selectedOption.value;
            }
            </script>

        </form>
        <br><br>
        <div class="row">
            <?php
            $totalOrder = 0; // Initialize a variable to store the total order value
            foreach ($don as $key => $value) :
                $id_don = $value['id_ctdon'];
                $sanpham1 = loadd_bill_lq_ct($id_don);

            ?>
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="d-flex justify-content-between card-header py-3">
                            <?php $tong_tien = $value['thanh_tien'] ?>
                            <h7 class="m-0 font-weight-bold text-primary">Đơn: <?= $value['ma_don'] ?></h7>
                            <h7 class="m-0 font-weight-bold text-primary">Thời gian đặt: <span style="color: red;"><?php
                                                                                                                    $dateTime = new DateTime($value['thoi_gian']);
                                                                                                                    $newFormat = $dateTime->format('h:i A, d-m-Y ');
                                                                                                                    echo $newFormat;
                                                                                                                    ?></span>
                            </h7>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                                <div class="d-flex hihi">
                                    <p>Trạng thái: <?php
                                                    if ($value['trang_thai'] == 0) {
                                                        echo "<span class='text-warning'>Đang chờ xác nhận</span>";
                                                    } elseif ($value['trang_thai'] == 1) {
                                                        echo "<span class='text-primary'>Đã xác xác nhận</span>";
                                                    } elseif ($value['trang_thai'] == 2) {
                                                        echo "<span class='text-info'>Đang giao hàng</span>";
                                                    } elseif ($value['trang_thai'] == 3) {
                                                        echo "<span class='text-warning'>Đã Đã Nhận Hàng</span>";
                                                    } else {
                                                        echo "<span class='text-danger'>Đã Hủy</span>";
                                                    }
                                                    ?></p>
                                </div>
                                <div class="d-flex hihi">
                                    <?php
                                    if ($value['thanh_toan'] == 0) {
                                        echo "<span class='btn btn-success btn-sm'>Thanh Toán Online</span>";
                                    } else {
                                        echo "<span class='btn btn-primary btn-sm'>Thanh Toán Khi Nhận Hàng</span>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <br>
                            <?php foreach ($sanpham1 as $key) :
                                extract($key);
                            ?>
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                        <img src="assets/uploads/<?= $image_sp ?>" alt="" width="35" class="img-fluid">
                                    </div>
                                    <div class="flex-lg-grow-1 ms-3">
                                        <h6 class="small mb-0"><a href="?act=chitietSP&id_sp=<?= $id_sp ?>&id_dm=<?= $id_dm ?>" class="text-reset"><?= $name_sp ?></a>
                                            <span>(x<?= $so_luong ?>)</span>
                                        </h6>
                                        <span class="small">Màu: 
                                            <?php
                                                foreach ($mau1 as $key => $value) {
                                                    if ($value['id_color'] == $mau_sac) {
                                                        echo $value['name_color'];
                                                    }
                                                }
                                            ?>
                                        </span>
                                        <span class="small" style="margin-left: 10px;">Size: 
                                            <?php
                                                foreach ($size1 as $key => $value) {
                                                    if ($value['id_size'] == $kich_co) {
                                                        echo $value['name_size'];
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <span class="price" style="font-size: small; color: red; text-decoration: line-through; margin-right: 10px; "><?= number_format($gia) ?></span>
                                        <?php
                                        $gia_thuc = $gia * $giam_gia / 100;
                                        ?>
                                        <span class="price"><?= number_format($gia - $gia_thuc) ?> VNĐ</span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <hr>
                            <style>
                                hr {
                                    border: 1px solid #000; /* Màu sắc và kiểu đường viền */
                                    background-color: #000; /* Màu sắc của đường ngang */
                                }
                            </style>
                            <tr class="fw-bold">
                                <td colspan="2">TỔNG CỘNG:</td>
                                <td class="text-end"><?= number_format($tong_tien) ?> VNĐ</td>
                            </tr>

                            <a class="btn btn-info btn-sm" style="margin-left: 13pc;" href="?act=chitietmua&id_don=<?= $id_ctd ?>">Chi Tiết</a>
                        </div>

                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>

