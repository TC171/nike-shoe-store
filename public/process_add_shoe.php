<?php
require_once '../configs/env.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $stmt = $db->prepare("INSERT INTO shoes (name, brand, size, price, quantity, image, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidsiss", $name, $brand, $size, $price, $quantity, $image, $description);

    if ($stmt->execute()) {
        echo "Giày đã được thêm thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
}
?>