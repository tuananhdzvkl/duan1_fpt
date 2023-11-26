<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
    <div class="product-review-content">
        <div class="review-content-header">
            <h3>Phần bình luận</h3>
            <div class="review-info">
                <span class="review-caption">Hãy cho chúng tôi xin đánh giá về sản phẩm bên chúng tôi</span>
                <span class="review-write-btn">Viết Bình Luận</span>
            </div>
        </div>

        <!-- Start Reviews Form Item -->
        <div class="reviews-form-area">
            <h4 class="title">Bình Luận Mới</h4>
            <div class="reviews-form-content">
                <form action="index.php?act=binhluan" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea id="for_comment" class="form-control" placeholder="Viết bình luận của bạn ở đây" name="binhluan" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-submit-btn">
                                <input type="hidden" name="id" value="<?= $sp_img['id_sp'] ?>">
                                <input type="hidden" name="id_tk" value="<?= $_SESSION['username']['id_tk'] ?>">
                                <input type="submit" class="btn-submit" name="gui" value="Gửi Bình Luận">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Reviews Form Item -->

        <div class="reviews-content-body">
            <!-- Start Reviews Content Item -->
            <?php foreach ($binhluan as $key => $value) : ?>
                <div class="review-item">
                    <ul class="review-rating">
                        <?php
                            // Check if the 'rating' key exists in the current $value array
                            if (isset($value['rating'])) {
                                $rating = filter_var($value['rating'], FILTER_VALIDATE_INT);

                                // Check if the conversion is successful and the rating is a positive integer
                                if ($rating !== false && $rating > 0) {
                                    for ($i = 0; $i < $rating; $i++) {
                                        echo '<li class="fa fa-star"></li>';
                                    }
                                } else {
                                    echo '<li class="fa fa-star"></li>'; // Display at least one star if rating is not valid
                                }
                            } else {
                                echo '<li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>'; // Default to displaying one star if 'rating' key is not present
                            }
                        ?>
                    </ul>
                    <h3 class="title"><?= $value['full_name'] ?></h3>
                    <h5 class="sub-title"><span>đã bình luận</span> vào
                        <span>
                            <?php
                            $dateTime = new DateTime($value['ngaybinhluan']);
                            echo $dateTime->format('h:i A - d-m-Y');
                            ?>
                        </span>
                    </h5>
                    <p><?= $value['comment'] ?></p>
                </div>
                <!-- End Reviews Content Item -->
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php
// Assuming your PHP functions for database operations are defined and loaded
// ...



