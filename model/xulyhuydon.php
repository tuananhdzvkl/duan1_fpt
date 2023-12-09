<?php
include("pdo.php");
include("thanhtoan.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy ID đơn hàng từ dữ liệu POST
    $idDonHang = isset($_POST['id_don_hang']) ? $_POST['id_don_hang'] : null;
    $key = $_POST['key'];
    // Lấy trạng thái đơn hàng từ cơ sở dữ liệu
    $trangthai = chitietmua_ctdon($idDonHang);

    // Kiểm tra trạng thái có thể hủy đơn hay không
    if ($trangthai == 1 || $trangthai == 0 || $trangthai == 4) {
        // Thực hiện xử lý hủy đơn ở đây
        // Cập nhật trạng thái đơn hàng trong cơ sở dữ liệu, thực hiện các thao tác cần thiết
        echo 'Không thể hủy đơn hàng với trạng thái hiện tại.';
    } else {
        if ($key == 1 ) {
            $sql = "UPDATE chitiet_donhang SET trang_thai = '4' WHERE id_ctdon = $idDonHang";
            pdo_execute($sql);
            // Trả về phản hồi cho máy chủ
            echo 'Đơn hàng đã được hủy thành công.';
        } else {
            $sql = "UPDATE chitiet_donhang SET trang_thai = '3' WHERE id_ctdon = $idDonHang";
            pdo_execute($sql);
            // Trả về phản hồi cho máy chủ
            echo 'Cảm Mơn Bạn Đã Mua Hàng.';
        }
       
    }
} else {
    // Nếu không phải là yêu cầu POST, trả về lỗi
    http_response_code(405); // Phương thức không được phép
    echo 'Phương thức không hợp lệ';
}
