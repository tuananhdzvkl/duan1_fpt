<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Discount Code</title>
</head>
<body>

<?php
// Function to generate a discount code based on user input and define the discount amount
function generateDiscountCode($userInput, $length = 8) {
    // Validate user input to prevent potential security issues
    if (preg_match('/^[A-Z0-9]{8}$/', $userInput)) {
        // Use the user input as the starting part of the code
        $code = $userInput;

        // Generate a random discount amount based on the total amount
        $discountAmount = rand(1, 100); // Assume the maximum discount is 20% or 10% of the total amount

        return [
            'code' => $code,
            'discountAmount' => $discountAmount
        ];
    } else {
        return false; // Invalid user input
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_discount_code'])) {
    // Process user input
    $userInput = trim($_POST['user_discount_code']);

    // If user input is not empty, generate discount information
    if (!empty($userInput)) {
        $discountInfo = generateDiscountCode($userInput);

        if ($discountInfo) {
            // Replace echo with JavaScript alert
            echo '<script>alert("Mã giảm giá: ' . $discountInfo['code'] . '\nMức giảm giá: ' . $discountInfo['discountAmount'] . '%");</script>';
        } else {
            echo '<script class="alert">alert("Mã giảm giá không hợp lệ.");</script>';
        }
    } else {
        echo '<script class="alert">alert("Vui lòng nhập mã giảm giá.");</script>';
    }
}

?>


<form action="" method="post" id="discountForm">
    <label for="user_discount_code">Nhập mã giảm giá:</label>
    <input type="text" name="user_discount_code" id="user_discount_code" >

<br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Form Styles */
    #discountForm {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
    }

    p {
        margin-top: 20px;
        font-size: 16px;
    }

    /* Alert Styles */
    .alert {
        color: red;
        font-weight: bold;
    }

    /* Modal Styles */
    .modal-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        z-index: 1;
    }

    .modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        animation: fadeInScale 0.3s ease-in-out forwards;
        width: 20pc;
    }

    .close-button {
        background: #3498db;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 3px;
    }

    img {
        margin-left: 15px;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    img:hover {
        transform: scale(1.1);
    }

    @keyframes fadeInScale {
        from {
            transform: scale(0.8);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>

