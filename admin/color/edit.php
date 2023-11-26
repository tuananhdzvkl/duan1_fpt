<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=listcolor">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="?act=uploadcolor" enctype="multipart/form-data" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Id:</label>
                    <input class="form-control" name="id" value="<?= $color['id_color'] ?>" placeholder="AUTO NUMBER" readonly>
                    <!-- <input type="hidden" name="id" class="form-control" "> -->
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="color" class="form-control" id="pwd" placeholder="Tên Danh Mục" name="name" value="<?= $color['name_color'] ?>" required>
                </div>

                <input type="submit" class="btn btn-primary" value="Cập Nhật" name="gui">
            </form>

        </div>
    </div>
    <?php
    if ($isthongbao == 1) {
        echo "<div class='alert alert-success'>
        <strong>$thongbao</strong>
    </div>";
    } else  if ($isthongbao == 0) {
        echo "<div class='alert alert-danger'>
        <strong>$thongbao</strong> Bạn Chưa Điền Tên Danh Mục .
      </div>";
    } else {
        echo '';
    }
    ?>
</div>