<style>
    body{
    background:#eee;
}
.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
.text-reset {
    --bs-text-opacity: 1;
    color: inherit!important;
}
a {
    color: #5465ff;
    text-decoration: none;
}
body{margin-top:20px;}

.steps .step {
    display: block;
    width: 100%;
    margin-bottom: 35px;
    text-align: center
}

.steps .step .step-icon-wrap {
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    text-align: center
}

.steps .step .step-icon-wrap::before,
.steps .step .step-icon-wrap::after {
    display: block;
    position: absolute;
    top: 50%;
    width: 50%;
    height: 3px;
    margin-top: -1px;
    background-color: #e1e7ec;
    content: '';
    z-index: 1
}

.steps .step .step-icon-wrap::before {
    left: 0
}

.steps .step .step-icon-wrap::after {
    right: 0
}

.steps .step .step-icon {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    border: 1px solid #e1e7ec;
    border-radius: 50%;
    background-color: #f5f5f5;
    color: #374250;
    font-size: 38px;
    line-height: 81px;
    z-index: 5
}

.steps .step .step-title {
    margin-top: 16px;
    margin-bottom: 0;
    color: #606975;
    font-size: 14px;
    font-weight: 500
}

.steps .step:first-child .step-icon-wrap::before {
    display: none
}

.steps .step:last-child .step-icon-wrap::after {
    display: none
}

.steps .step.completed .step-icon-wrap::before,
.steps .step.completed .step-icon-wrap::after {
    background-color: #0da9ef
}

.steps .step.completed .step-icon {
    border-color: #0da9ef;
    background-color: #0da9ef;
    color: #fff
}

@media (max-width: 576px) {
    .flex-sm-nowrap .step .step-icon-wrap::before,
    .flex-sm-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 768px) {
    .flex-md-nowrap .step .step-icon-wrap::before,
    .flex-md-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 991px) {
    .flex-lg-nowrap .step .step-icon-wrap::before,
    .flex-lg-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 1200px) {
    .flex-xl-nowrap .step .step-icon-wrap::before,
    .flex-xl-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

.bg-faded, .bg-secondary {
    background-color: #f5f5f5 !important;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">


<div class="container">
    <!-- Nội dung chính -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Chi tiết -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between">
                        <div>
                            <span class="me-3">22-11-2021</span>
                            <span class="me-3">#16123222</span>
                            <span class="me-3">Visa -1234</span>
                            <span class="badge rounded-pill bg-info">ĐANG VẬN CHUYỂN</span>
                        </div>
                        <div class="d-flex">
                            
                            <div class="dropdown">
                                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Sửa</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> In</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                            <img src="https://www.bootdey.com/image/280x280/87CEFA/000000" alt=""
                                                width="35" class="img-fluid">
                                        </div>
                                        <div class="flex-lg-grow-1 ms-3">
                                            <h6 class="small mb-0"><a href="#" class="text-reset">Tai Nghe Không
                                                    Dây với Chống Ồn Tru Bass Bluetooth HiFi</a></h6>
                                            <span class="small">Màu: Đen</span>
                                        </div>
                                    </div>
                                </td>
                                <td>1</td>
                                <td class="text-end">$79.99</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                            <img src="https://www.bootdey.com/image/280x280/FF69B4/000000" alt=""
                                                width="35" class="img-fluid">
                                        </div>
                                        <div class="flex-lg-grow-1 ms-3">
                                            <h6 class="small mb-0"><a href="#" class="text-reset">Đồng Hồ Thông Minh IP68
                                                    Chống Nước GPS và Hỗ Trợ Bluetooth</a></h6>
                                            <span class="small">Màu: Trắng</span>
                                            <span class="small" style="margin-left:10px;">Size: S</span>
                                        </div>
                                    </div>
                                </td>
                                <td>1</td>
                                <td class="text-end">$79.99</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Tổng Cộng</td>
                                <td class="text-end">$159,98</td>
                            </tr>
                            <tr>
                                <td colspan="2">Vận Chuyển</td>
                                <td class="text-end">$20.00</td>
                            </tr>
                            <tr>
                                <td colspan="2">Giảm Giá (Mã: NEWYEAR)</td>
                                <td class="text-danger text-end">-$10.00</td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan="2">TỔNG CỘNG</td>
                                <td class="text-end">$169,98</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- Thanh toán -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="h6">Phương Thức Thanh Toán</h3>
                            <p>Visa -1234 <br>
                                Tổng: $169,98 <span class="badge bg-success rounded-pill">ĐÃ THANH TOÁN</span></p>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="h6">Địa Chỉ Thanh Toán</h3>
                            <address>
                                <strong>John Doe</strong><br>
                                1355 Market St, Suite 900<br>
                                San Francisco, CA 94103<br>
                                <abbr title="Phone">ĐT:</abbr> (123) 456-7890
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Ghi chú của Khách hàng -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="h6">Ghi Chú của Khách Hàng</h3>
                    <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet mauris rutrum.
                        Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>
                </div>
            </div>
            <div class="card mb-4">
                <!-- Thông tin Vận Chuyển -->
                <div class="card-body">
                    <h3 class="h6">Thông Tin Vận Chuyển</h3>
                    <strong>FedEx</strong>
                    <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i
                            class="bi bi-box-arrow-up-right"></i> </span>
                    <hr>
                    <h3 class="h6">Địa Chỉ</h3>
                    <address>
                        <strong>John Doe</strong><br>
                        1355 Market St, Suite 900<br>
                        San Francisco, CA 94103<br>
                        <abbr title="Phone">ĐT:</abbr> (123) 456-7890
                    </address>
                </div>
            </div>
        </div>
    </div>
</div>
