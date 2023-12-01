// Sự kiện khi một kích thước được chọn
$(document).on('click', '.color-list li', function() {
    // Xóa class 'active' từ tất cả các màu
    $('.color-list li').removeClass('active');
    // Thêm class 'active' cho màu được chọn
    $(this).addClass('active');

    // Rest of your code...
});
$(document).on('click', '.size-list li', function() {
    // Xóa class 'active' từ tất cả các màu
    $('.size-list li').removeClass('active');
    // Thêm class 'active' cho màu được chọn
    $(this).addClass('active');


});
// Function to check quantity based on size and color
function checkQuantity(id_san_pham, selectedColor, selectedSizeId) {
    // Gửi yêu cầu AJAX để kiểm tra số lượng và mối quan hệ giữa size và màu
    $.post(
        "model/check_size.php", {
            id_sp: id_san_pham,
            color: selectedColor,
            size: selectedSizeId,
        },
        function(data) {
            // Parse JSON response
            var result = JSON.parse(data);

            // Kiểm tra kết quả từ server
            if (result.isSizeBelongsToColor) {
                alert("Chọn đúng nền văn minh rồi hoặc Màu của bạn đẹp quá ");
                // Nếu size hoặc màu thuộc, kiểm tra số lượng
                checkQuantity(id_san_pham, selectedColor, selectedSizeId);
            } else if (result.isColorBelongsToSize) {
                alert("Chọn đúng nền văn minh rồi hoặc Màu của bạn đẹp quá ");
                // Nếu size hoặc màu thuộc, kiểm tra số lượng
                checkQuantity(id_san_pham, selectedColor, selectedSizeId);
            } else {
                alert("Hiện Tại Size hoặc Màu này Đang Hết Hàng");
            }
        }
    );
}

// Sự kiện khi một kích thước được chọn
$(document).on('click', '.size-list li', function() {
    var selectedSizeId = $(this).val();
    var selectedColor = $('.color-list li.active').attr('value');
    var id_san_pham = $(".product-single-info").children(".id_sp").val();

    // Check size và màu
    checkQuantity(id_san_pham, selectedColor, selectedSizeId);
});

// Check màu thuộc size
$(document).on('click', '.color-list li', function() {
    var selectedColor = $(this).val();
    var selectedSizeId = $('.size-list li.active').attr('value');
    var id_san_pham = $(".product-single-info").children(".id_sp").val();

    // Check size và màu
    checkQuantity(id_san_pham, selectedColor, selectedSizeId);
});
