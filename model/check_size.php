<?php

include("pdo.php");

// Trong file check_size_color.php

// Lấy dữ liệu từ yêu cầu POST
$id_san_pham = $_POST['id_sp'];
$selectedColor = $_POST['color'];
$selectedSize = $_POST['size'];

// Thực hiện kiểm tra bằng cách truy vấn cơ sở dữ liệu hoặc thực hiện logic kiểm tra khác

$isSizeBelongsToColor = checkSizeBelongsToColor($id_san_pham, $selectedColor, $selectedSize);

// Trả về kết quả dưới dạng JSON
echo json_encode($isSizeBelongsToColor);

function checkSizeBelongsToColor($id_san_pham, $selectedColor, $selectedSize)
{
    // Thực hiện truy vấn SQL hoặc logic kiểm tra khác để xác định xem kích thước có thuộc màu không
    // Ví dụ: trả về true nếu kích thước thuộc màu, ngược lại trả về false
    // Đây chỉ là ví dụ, bạn cần thay đổi theo cấu trúc dữ liệu và logic của mình
    // Thực hiện kiểm tra bằng PDO
    $conn = pdo_get_connection();
    $sql = "SELECT COUNT(*) FROM sanpham_bienthe WHERE id_sp = ? AND id_color = ? AND id_size = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_san_pham, $selectedColor, $selectedSize]);
    $count = $stmt->fetchColumn();

    // Trả về kết quả kiểm tra
    return $count > 0;
}
?>
