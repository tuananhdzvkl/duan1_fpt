<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
    <div class="product-review-content">
        <div class="review-content-header">
            <h3>Phần bình luận</h3>
            <div class="review-info">
                <span class="review-caption">Hãy cho chúng tôi xin đánh giá về sản phẩm bên chúng tôi</span>
                <span class="review-write-btn">Viết Bình Luận</span>
            </div>
        </div>
        <script>
    // JavaScript to scroll to the reviews section
    document.addEventListener("DOMContentLoaded", function () {
        // Check if the URL contains the reviews-container hash
        if (window.location.hash === "#reviews") {
            // Scroll to the reviews section
            document.getElementById("reviews").scrollIntoView();
        }
    });
</script>

        <!--== Start Reviews Form Item ==-->
        <?php
if (isset($_SESSION['username'])) {
    echo "<div class='reviews-form-area'>
        <h4 class='title'>Bình Luận Mới</h4>
        <div class='reviews-form-content'>
            <form action='index.php?act=binhluan' method='post' onsubmit='return submitForm();'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-group'>
                            <textarea id='for_comment' class='form-control' placeholder='Write your comments here' name='binhluan'></textarea>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='form-submit-btn'>
                            <input type='hidden' name='id' value='" . $sp['id_sp'] . "'>
                            <input type='hidden' name='id_dm' value='" . $sp['id_dm'] . "'>
                            <input type='hidden' name='id_tk' value='" . $_SESSION['username']['id_tk'] . "'>
                            <input type='submit' class='btn-submit' name='gui' value='Bình Luận'>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>";

    if (isset($_POST['gui'])) {
        // Your form submission logic here...
        echo "<script>window.location.href='index.php?act=binhluan#reviews'</script>";
    }
} else {
    echo "<div class='reviews-form-area'>
        <h4 class='title'>Bạn Hãy Vui Lòng <a href='?act=login'>Đăng Nhập</a> Để Bình Luận </h4>
    </div>";
}
?>
        <!--== End Reviews Form Item ==-->

        <div class="reviews-content-body">
            <!--== Start Reviews Content Item ==-->
            <?php foreach ($binhluan as $key => $value) : ?>
                <div class="review-item">
                    <ul class="review-rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>

                    <h3 class="title">
                        <?php if (isset($value['image_tk'])) : ?>
                            <img src="public/uploads/<?= $value['image_tk'] ?>" alt="" class="img-thumbnail" style="border-radius: 50%; width: 30px; height: 30px; object-fit: cover;">
                        <?php endif; ?>
                        <span class='text-body'><?= $value['full_name'] ?></span>
                    </h3>
                    <h5 class="sub-title">
                        <span>đã bình luận</span> vào
                        <span>
                            <?php
                            $dateTime = new DateTime($value['ngaybinhluan']);
                            // Chuyển đổi sang định dạng khác (ví dụ: dd/mm/yyyy)
                            $newFormat = $dateTime->format('h:i A, d-m-Y');
                            echo $newFormat;
                            ?>
                        </span>
                    </h5>
                    <p><?= $value['comment'] ?></p>
                </div>
            <?php endforeach ?>     
            <!--== End Reviews Content Item ==-->
        </div>
    </div>
</div>