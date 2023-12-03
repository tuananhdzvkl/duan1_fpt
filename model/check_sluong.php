<?php
// Trong file kiem-tra-so-luong.php
include("pdo.php");
// Chấp nhận yêu cầu POST từ Ajax
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy số lượng mới từ yêu cầu
    $newQuantity = isset($_POST['newQuantity']) ? intval($_POST['newQuantity']):0;
    $id_san_pham = isset($_POST['id_sp']) ? intval($_POST['id_sp']) : 0;
    $selectedColor = isset($_POST['mau']) ? intval($_POST['mau']) : 0;
    $selectedSize = isset($_POST['size']) ? intval($_POST['size']) : 0;

    // Thực hiện kiểm tra số lượng (thay đổi phần này để phản ánh logic của bạn)
    if (checkQuantity($newQuantity, $id_san_pham, $selectedColor, $selectedSize)) {
        // Nếu số lượng hợp lệ, trả về 'valid'
        echo 'valid'; 
    } else {
        // Nếu số lượng không hợp lệ, trả về 'invalid'
        echo 'invalid';
    }
} else {
    // Nếu không phải yêu cầu POST, trả về lỗi
    http_response_code(400);
    echo 'Bad Request';
}

function checkQuantity($newQuantity, $id_san_pham, $selectedColor, $selectedSize)
{
    // Thực hiện truy vấn SQL để lấy số lượng tối đa từ cơ sở dữ liệu
    $conn = pdo_get_connection();
    $sql = "SELECT soluong FROM sanpham_bienthe WHERE id_sp = ? AND id_color = ? AND id_size = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_san_pham, $selectedColor, $selectedSize]);
    $maxQuantity = $stmt->fetchColumn();

    // So sánh với số lượng mới
    return $newQuantity <= $maxQuantity;
}
?>
