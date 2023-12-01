<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $productId = $_POST['id'];
    $newQuantity = $_POST['quantity'];

    // Kiểm giỏ hàng có tồn tại hay không
    if (!empty($_SESSION['cart'])) {
        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $index = array_search($productId, array_column($_SESSION['cart'], 'id'));

        // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
        if ($index !== false) {
            $_SESSION['cart'][$index]['quantity'] = $newQuantity;
            echo 'Cập nhật số lượng sản phẩm thành công';
        } else {
            echo 'Sản phẩm không tồn tại trong giỏ hàng';
        }
    } else {
        echo 'Giỏ hàng không tồn tại';
    }

} else {
    echo 'Yêu cầu không hợp lệ';
}
?>
