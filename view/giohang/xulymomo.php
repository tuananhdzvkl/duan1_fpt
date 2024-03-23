<?php
header('Content-type: text/html; charset=utf-8');

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    $result = curl_exec($ch);

    if ($result === false) {
        // Handle cURL error
        die('cURL Error: ' . curl_error($ch));
    }

    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMO';
$partnerName = 'ASCENSION';
$requestType = 'captureMoMoWallet';
$accessKey = 'F8BBA842ECF85';
$secretKey = 'K951B6PE1waDMi640xX08PD3vg6EkVlz';
$orderInfo = "Thanh toán qua ATM";
$amount = "100000";
$orderId = time(); // Use timestamp as orderId
$redirectUrl = "http://localhost:3000/index.php?act=CTthanhtoan";
$ipnUrl = "http://localhost:3000/index.php?act=CTthanhtoan";
$extraData = "";

// Calculate signature
$rawHash = "partnerCode={$partnerCode}&accessKey={$accessKey}&requestId={$orderId}&amount={$amount}&orderId={$orderId}&orderInfo={$orderInfo}&returnUrl={$redirectUrl}&notifyUrl={$ipnUrl}&extraData={$extraData}";
$signature = hash_hmac("sha256", $rawHash, $secretKey);

$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => $partnerName,
    'storeId' => 'MomoTestStore',
    'requestId' => $orderId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
);

$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);

// Check if 'payUrl' is present in the response
if (isset($jsonResult['payUrl'])) {
    // Redirect to the payment URL
    header('Location: ' . $jsonResult['payUrl']);
} else {
    // Handle the case when 'payUrl' is not found in the response
    echo "Error: 'payUrl' not found in the response";
}
?>


<form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="view/giohang/xulymomo.php">
    <img style="margin-left: 15px;" src="../assets/img/icons/momo.png"  width="70" height="90" alt="image">
</form>
