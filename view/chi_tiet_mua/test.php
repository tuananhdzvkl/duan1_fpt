<?php
    $sum_total = 0;
    foreach ($dataDb as $key => $sanpham) {
        // kiểm tra số lượng trong giỏ hàng
        $quantityInCart = 0;

        foreach ($_SESSION['cart'] as $item) {
            if ($item['id'] == $sanpham['id_sp']) {
                $quantityInCart = $item['quantity'];
                break;
            }
        }

        // Debugging: Output the values to check
        // var_dump($quantityInCart);
        // die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            white-space: nowrap;
        }

        td img {
            max-width: 80px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        td:nth-child(8) {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h2>Chi Tiết Mua Hàng</h2>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Discount</th>
                    <th>Total Price</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Delivery Status</th>
                </tr>
            </thead>

            <tbody>
                
                <tr>
                    <td class="product-stt"><?= $key + 1 ?></td>    
                    <td class="product-image">
                        <a href="index.php?act=chitietSP&id_sp=<?= $sanpham['id_sp'] ?>&id_dm=<?= $sanpham['id_dm'] ?>">
                            <img src="assets/uploads/<?= $sanpham['image_sp'] ?>" width="90" height="110" alt="Image-HasTech">
                        </a>
                    </td>
                    <td class="product-name">
                        <h10 class="title"><a href="index.php?act=chitietSP&id_sp=<?= $sanpham['id_sp'] ?>&id_dm=<?= $sanpham['id_dm'] ?>"><?= $sanpham['name_sp'] ?></a></h10>
                    </td>
                    <td><?= $quantityInCart ?></td>
                    <td class="product-price">
                          <h10 class="price" style="color: red;"><?php foreach ($size1 as $key => $value) {
                                                                            if ($value['id_size'] == $sanpham['id_size']) {
                                                                              echo $value['name_size'];
                                                                            }
                                                                          }  ?></h10>
                        </td>
                        <td class="product-price">
                          <h10 class="price" style="color: red;"><?php foreach ($mau1 as $key => $value) {
                                                                            if ($value['id_color'] == $sanpham['id_color']) {
                                                                              echo $value['name_color'];
                                                                            }
                                                                          }  ?></h10>
                        </td>
                        <td><?= isset($discountAmount) ? $discountAmount . ' %' : 'Chưa áp dụng' ?></td>
                    <td class="product-price">
                          <?php $giathuc = $sanpham['gia'] - ($sanpham['giam_gia'] * $sanpham['gia']) / 100; ?>
                          <span class="price"><?= number_format((int)$giathuc, 0, '.', ',') ?> vnđ </span>
                        </td>
                    <td><strong><?= $value['full_name'] ?></strong></td>
                    <td><strong><?= $value['phone'] ?></strong></td>
                    <td><?= $sanpham['delivery_address'] ?></td>
                    <td>
                  <?php
                  if ($value['thanh_toan'] == 0) {
                    echo "<p class='btn btn-primary'>Thanh Toán Online</p>";
                  } else {
                    echo " <p class='btn btn-success'>Thanh Toán Khi Nhận Hàng</p>";
                  }
                  ?>
                </td>
                <td><?php
                    if ($value['trang_thai'] == 0) {
                      echo "<p class='btn btn-warning'>đang chờ xác nhận</p>";
                    } elseif ($value['trang_thai'] == 1) {
                      echo "<p class='btn btn-info'>Đã xác xác nhận</p>";
                    } elseif ($value['trang_thai'] == 2) {
                      echo "<p class='btn btn-primary'>Đang giao hàng </p>";
                    } elseif ($value['trang_thai'] == 3) {
                      echo " <p class='btn btn-success'>Đã Đã Nhận Hàng</p>";
                    } else {
                      echo "<p class='btn btn-danger'>Đã Hủy</p>";
                    }



                    ?></td>
                <td>
                </tr>
            </tbody>

        </table>
    </div>
</div>

</body>
</html>
<?php } ?>
