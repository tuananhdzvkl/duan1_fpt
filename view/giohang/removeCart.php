<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $productId = $_POST['id'];

    // Kiểm giỏ hàng có tồn tại hay không
    if (!empty($_SESSION['cart'])) {
        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $index = array_search($productId, array_column($_SESSION['cart'], 'id'));

        // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
        if ($index !== false) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);

            // Tính toán tổng số lượng và tổng giá tiền sau khi xóa sản phẩm
            $totalQuantity = array_sum(array_column($_SESSION['cart'], 'quantity'));
            $totalPrice = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $_SESSION['cart']));

            // Trả về thông tin cập nhật cho client
            $response = [
                'status' => 'success',
                'message' => 'Xóa sản phẩm thành công',
                'totalQuantity' => $totalQuantity,
                'totalPrice' => $totalPrice
            ];
            echo json_encode($response);
        } else {
            // Trả về thông báo nếu sản phẩm không tồn tại trong giỏ hàng
            $response = [
                'status' => 'error',
                'message' => 'Sản phẩm không tồn tại trong giỏ hàng'
            ];
            echo json_encode($response);
        }
    } else {
        // Trả về thông báo nếu giỏ hàng không tồn tại
        $response = [
            'status' => 'error',
            'message' => 'Giỏ hàng không tồn tại'
        ];
        echo json_encode($response);
    }
} else {
    // Trả về thông báo nếu yêu cầu không hợp lệ
    $response = [
        'status' => 'error',
        'message' => 'Yêu cầu không hợp lệ'
    ];
    echo json_encode($response);
}
