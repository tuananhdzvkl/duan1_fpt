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
    // execute post
    $result = curl_exec($ch);
    // close connection
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua ATM";
$amount = "100000";
$orderId = time() . "";
$redirectUrl = "http://localhost:3000/index.php?act=CTthanhtoan";
$ipnUrl = "http://localhost:3000/index.php?act=CTthanhtoan";
$extraData = "";

$requestId = time() . "";
$requestType = "payWithATM";
$extraData = ($_POST["extraData"] ?? "");

// Before signing HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secretKey);

$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
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
