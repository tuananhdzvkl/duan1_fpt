<?php

// In pdo_check_sluong.php

include("pdo.php");

// Get data from POST request
$id_san_pham = $_POST['id_sp'];
$selectedColor = $_POST['color'];
$selectedSize = $_POST['size'];

// Perform quantity check using PDO
$quantity = checkProductQuantity($id_san_pham, $selectedColor, $selectedSize);

// Return the result as JSON
echo json_encode($quantity);

function checkProductQuantity($id_san_pham, $selectedColor, $selectedSize)
{
    // Perform SQL query to get the quantity
    $conn = pdo_get_connection();
    $sql = "SELECT soluong FROM sanpham_bienthe WHERE id_sp = ? AND id_color = ? AND id_size = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_san_pham, $selectedColor, $selectedSize]);
    $quantity = $stmt->fetchColumn();

    // Return the quantity
    return $quantity;
}

?>