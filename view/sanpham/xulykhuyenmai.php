<!-- process_form.php -->

<?php
header('Content-Type: application/json');

// Function to generate a random discount code and define the discount amount
function generateDiscountCode($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Generate a random discount amount less than 20%
    $discountAmount = rand(1, 20);

    return [
        'code' => $code,
        'discountAmount' => $discountAmount
    ];
}

// Process user input
$userInput = isset($_POST['user_discount_code']) ? trim($_POST['user_discount_code']) : '';

// If user input is not empty, generate discount information
if (!empty($userInput)) {
    // Validate user input to prevent potential security issues
    if (preg_match('/^[a-zA-Z0-9]+$/', $userInput)) {
        $discountInfo = generateDiscountCode();
        echo json_encode($discountInfo);
    } else {
        echo json_encode(['error' => 'Invalid user discount code format']);
    }
} else {
    echo json_encode(['error' => 'User discount code is empty']);
}
?>
