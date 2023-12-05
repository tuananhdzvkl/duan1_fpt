<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complex Order Details</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-list-item {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .product-list-item img {
            max-width: 50px;
            max-height: 50px;
            margin-right: 10px;
        }

        .payment-methods img {
            max-width: 80px;
            margin-right: 10px;
        }

        .order-progress {
            list-style: none;
            padding: 0;
        }

        .order-progress-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .order-progress-bar {
            height: 10px;
            background-color: #ddd;
            position: relative;
            border-radius: 5px;
            width: 100%;
        }

        .order-progress-bar-inner {
            height: 100%;
            border-radius: 5px;
            background-color: #5bc0de;
        }

        .chart-container {
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Chi Tiết Mua Hàng</h2>

            <!-- Order Summary -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Order #12345</h4>
                </div>
                <div class="card-body">
                    <!-- Product Details -->
                    <h5 class="card-title">Product Details</h5>
                    <ul class="product-list">
                        <li class="product-list-item">
                            <img src="https://via.placeholder.com/50" alt="Product Image">
                            <div>
                                <strong>Laptop XYZ</strong>
                                <p>Powerful laptop with the latest features.</p>
                                <span>Quantity: 2</span>
                            </div>
                            <span>$1000 each</span>
                        </li>
                        <li class="product-list-item">
                            <img src="https://via.placeholder.com/50" alt="Product Image">
                            <div>
                                <strong>Smartphone ABC</strong>
                                <p>High-performance smartphone with advanced camera.</p>
                                <span>Quantity: 1</span>
                            </div>
                            <span>$500</span>
                        </li>
                    </ul>

                    <!-- Payment Methods -->
                    <h5 class="card-title mt-4">Payment Methods</h5>
                    <div class="payment-methods">
                        <img src="https://via.placeholder.com/80" alt="PayPal">
                        <!-- Add more payment method images here -->
                    </div>

                    <!-- Total Price -->
                    <h5 class="card-title mt-4">Total Price</h5>
                    <p class="lead">$2500</p>
                </div>
            </div>

            <!-- Order Timeline -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Order Timeline</h4>
                </div>
                <div class="card-body">
                    <ul class="order-progress">
                        <li class="order-progress-item">
                            <div>
                                <strong>Order Placed</strong>
                                <p>Date: January 1, 2023</p>
                            </div>
                            <span>Processing</span>
                        </li>
                        <li class="order-progress-item">
                            <div>
                                <strong>Shipped</strong>
                                <p>Date: January 3, 2023</p>
                            </div>
                            <span>Shipped</span>
                        </li>
                        <li class="order-progress-item">
                            <div>
                                <strong>In Transit</strong>
                                <p>Date: January 5, 2023</p>
                            </div>
                            <span>In Transit</span>
                        </li>
                        <li class="order-progress-item">
                            <div>
                                <strong>Delivered</strong>
                                <p>Date: January 7, 2023</p>
                            </div>
                            <span>Delivered</span>
                        </li>
                    </ul>

                    <!-- Progress Bar -->
                    <div class="order-progress-bar">
                        <div class="order-progress-bar-inner" style="width: 75%;"></div>
                    </div>
                </div>
            </div>

            <!-- Order Analytics -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Order Analytics</h4>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="orderAnalyticsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Cancel Order Button -->
            <div class="mt-4 text-center">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelOrderModal">Cancel Order</button>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Order Modal -->
<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelOrderModalLabel">Cancel Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Cancel Order</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Chart.js -->
<script>
    // Dummy data for analytics chart
    var analyticsData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Order Amount',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            data: [200, 450, 300, 800, 500, 700, 600]
        }]
    };

    // Chart initialization
    var ctx = document.getElementById('orderAnalyticsChart').getContext('2d');
    var orderAnalyticsChart = new Chart(ctx, {
        type: 'bar',
        data: analyticsData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- jQuery (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
