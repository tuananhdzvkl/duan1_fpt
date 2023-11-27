<div class="container mt-3">
    <h2>Chi Tiết Tài Khoản</h2>

    <form method="post" action="?act=capnhattk" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <label class="form-label">Tài Khoản Đăng Nhập:</label>
                <input type="text" value="<?= $tk['name_tk'] ?>" name="name" class="form-control" readonly>
            </div>
            <div class="col">
                <label class="form-label">Mật Khẩu</label>
                <input type="password" name="pass" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label">Họ Và Tên:</label>
                <input type="text" value="<?= $tk['full_name'] ?>" name="full_name" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Số Điện Thoại</label>
                <input type="text" value="<?= $tk['phone'] ?>" name="sdt" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label">Địa Chỉ</label>
                <textarea class="form-control" rows="5" id="comment" name="dia_chi"><?= $tk['dia_chi'] ?></textarea>
            </div>
            <div class="col">
                <label class="form-label">Ảnh đại diện</label>
                <input class="form-control" type="file" name="img_tk">
                <input class="form-control" type="hidden" name="img_tk" value="<?= $tk['image_tk'] ?>">
                <img src="../public/uploads/<?= $tk['image_tk'] ?>" class="img-thumbnail" style="border-radius: 50%;" max-width="150px">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label">Email:</label>
                <input type="text" name="email" value="<?= $tk['email'] ?>" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Chức Vụ</label>
                <input type="text" value="<?= ($tk['chucvu']) == 1 ? 'Quản Trị Viên' : 'Khách Hàng' ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col1" style="margin-top: 25px;">
            <input type="hidden" name="id" value="<?= $tk['id_tk'] ?>" class="form-control" readonly>
            <a href="?act=home" class="btn btn-danger"><i class="bi bi-arrow-left-square-fill"></i> Quay Lại</a>
            <input type="submit" value="Cập nhật" name="gui" class="btn btn-primary">
        </div>
    </form>
</div>
