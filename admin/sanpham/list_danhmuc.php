<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Sản Phẩm </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giảm giá</th>
                            <th>Giá tiền</th>
                            <th>Mô tả</th>
                            <th>Ngày nhập</th>
                            <th>Danh mục</th>
                            <th>Lượt xem</th>
                            <th>Giới tính</th>
                            <th>Chức Năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php foreach ($sanpham as $key => $value) : ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['name_sp'] ?></td>
                                    <td><img src="../assets/uploads/<?= $value['image_sp'] ?>" alt="" width="100"></td>
                                    <td><?= $value['giam_gia'] ?>%</td>
                                    <td><?= $value['gia'] ?></td>
                                    <td><?= $value['mo_ngan'] ?></td>
                                    <td><?= $value['ngay_nhap'] ?></td>
                                    <td><?= $value['name_dm'] ?></td>
                                    <td><?= $value['view'] ?></td>
                                    <td><?php
                                        if ($value['gioi_tinh'] == '0') {
                                            echo "Nam/Nữ";
                                        } else if ($value["gioi_tinh"] == "1") {
                                            echo "Nam";
                                        } else {
                                            echo "Nữ";
                                        }

                                        ?></td>
                                    <td><a href="?act=editsp&idsp=<?= $value['id_sp'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Sửa</a>
                                        <a href="?act=xoasp&idsp=<?= $value['id_sp'] ?>" onclick="return confirm('Bạn có muốn xóa không ?') " class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>




                </table>
                <a href="" type="reset" class="btn btn-secondary">Bỏ Chọn Tất Cả </a>
                <a href="" type="button" class="btn btn-success">Chọn Tất Cả</a>
                <a type="button" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa không ?')">Xóa Các Mục Đã Chọn</a>
                <a href="" onclick="return confirm('Bạn có muốn xóa không ?')" type="button" class="btn btn-danger">Xóa Tất Cả</a>
                <a href="" type="button" class="btn btn-info">Số Lượng Sản Phẩm</a>
                </form>
                </tbody>
            </div>
        </div>
    </div>

</div>