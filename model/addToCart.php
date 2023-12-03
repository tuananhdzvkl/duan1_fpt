<?php
session_start();

// Kiểm tra xem có tồn tại mảng giỏ hàng hay không.
if (!isset($_SESSION['cart'])) {
    // Nếu không có thì đi khởi tạo
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $soluong = $_POST['sl'];
    $mau = $_POST['mau'];
    $size = $_POST['size'];
    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    $index = false;
    if (!empty($_SESSION['cart'])) {
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $productId && $item['mau'] == $mau && $item['size'] == $size) {
                    // Sản phẩm đã tồn tại, tăng số lượng
                    $_SESSION['cart'][$key]['quantity'] += $soluong;
                    $index = $key;
                    break;
                }
            }
        }
        // $index = array_search($productId, array_column($_SESSION['cart'], 'id'));
    }

    // array_column() trích xuất một cột từ mảng giỏ hàng và trả về một mảng chứ giá trị của cột id
    if ($index === false) {

        // Nếu sản phẩm chưa tồn tại thì thêm mới vào giỏ hàng
        $product = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $soluong,
            'mau' => $mau,
            'size' => $size
        ];
        $_SESSION['cart'][] = $product;
        // var_dump($_SESSION['cart']);die;
    }
    // Trả về số lượng sản phẩm của giỏ hàng
    echo count($_SESSION['cart']);
} else {
    echo 'Yêu cầu không hợp lệ';
}
