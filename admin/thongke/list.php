<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Lấy thời gian hiện tại
$current_time = "";
// $tong = count($thongke);
$i = 1;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <h6 class="m-0 font-weight-bold text-primary">Thống Kê doanh thu theo : </h6>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <select class="form-select" aria-label="Default select example" id="timeRange">
                <option value="day">1 Ngày</option>
                <option value="week">1 Tuần</option>
                <option value="month">1 Tháng</option>
                <option value="year" selected>1 Năm</option>
            </select>
        </div>
    </div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tổng doanh thu : <span id="totalRevenue">0 VND</span></h6>
        </div>
        <script>
            // ... (các phần khác của mã JavaScript)

            // Lắng nghe sự kiện khi giá trị của phần chọn lọc thay đổi
            $("#timeRange").on("change", function () {
                var selectedValue = $(this).val();

                // Dựa trên giá trị chọn, cập nhật tổng tiền và hiển thị nó
                updateTotal(selectedValue);

                // Dựa trên giá trị chọn, cập nhật dữ liệu biểu đồ và hiển thị nó
                updateChart(selectedValue);
            });

            // Hàm cập nhật tổng tiền và hiển thị nó
            function updateTotal(selectedValue) {
                var total = 0;

                // Dựa trên giá trị chọn, cập nhật tổng tiền
                switch (selectedValue) {
                    case 'day':
                        // Tính tổng theo ngày
                        <?php foreach ($data_ngay as $ngay) : ?>
                            total += <?= $ngay['tong'] ?>;
                        <?php endforeach; ?>
                        break;
                    case 'week':
                        // Tính tổng theo tuần
                        <?php foreach ($thongke_tuan as $tuan) : ?>
                            total += <?= $tuan['tong'] ?>;
                        <?php endforeach; ?>
                        break;
                    case 'month':
                        // Tính tổng theo tháng
                        <?php foreach ($data_thang as $thang) : ?>
                            total += <?= $thang['tong'] ?>;
                        <?php endforeach; ?>
                        break;
                    case 'year':
                        // Tính tổng theo năm
                        <?php foreach ($thongke_nam as $nam) : ?>
                            total += <?= $nam['tong'] ?>;
                        <?php endforeach; ?>
                        break;
                }

                // Hiển thị tổng tiền đã định dạng
                $("#totalRevenue").text(formatCurrency(total));
            }

            // Hàm định dạng số thành VND
            function formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
            }

            // ... (phần còn lại của mã JavaScript)
        </script>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="revenueChart" width="900" height="400"></canvas>
            </div>
        </div>
        <script>
    var timeLabels = ["Mốc 1", "Mốc 2", "Mốc 3", "Mốc 4", "Mốc 5"];
    var revenueData = [150000, 180000, 200000, 220000, 100000];

    // Lấy thẻ canvas
    var ctx = document.getElementById('revenueChart').getContext('2d');

    // Khởi tạo biểu đồ
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: timeLabels,
            datasets: [{
                label: 'Doanh thu',
                data: revenueData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Lắng nghe sự kiện khi giá trị của phần chọn lọc thay đổi
    $("#timeRange").on("change", function () {
        var selectedValue = $(this).val();

        // Dựa trên giá trị chọn, cập nhật dữ liệu biểu đồ
        updateChart(selectedValue);
    });

    // Hàm cập nhật dữ liệu biểu đồ và hiển thị nó
    function updateChart(selectedValue) {
        // Dựa trên giá trị chọn, cập nhật dữ liệu biểu đồ
        switch (selectedValue) {
            case 'day':
                // Lấy dữ liệu cho ngày
                var dayData = [/*...*/];
                myChart.data.labels = ["Mốc 1", "Mốc 2", "Mốc 3", "Mốc 4", "Mốc 5"];
                myChart.data.datasets[0].data = dayData;
                break;
            case 'week':
                // Lấy dữ liệu cho tuần
                var weekData = [/*...*/];
                myChart.data.labels = ["Tuần 1", "Tuần 2", "Tuần 3", "Tuần 4"];
                myChart.data.datasets[0].data = weekData;
                break;
            case 'month':
                // Lấy dữ liệu cho tháng
                var monthData = [/*...*/];
                myChart.data.labels = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
                myChart.data.datasets[0].data = monthData;
                break;
            case 'year':
                // Lấy dữ liệu cho năm
                var yearData = [/*...*/];
                myChart.data.labels = ["2018", "2019", "2020", "2021", "2022", "2023"];
                myChart.data.datasets[0].data = yearData;
                break;

        }

        // Cập nhật biểu đồ
        myChart.update();
    }
        </script>

    </div>
</div>
