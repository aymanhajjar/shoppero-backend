<?php
 include('connection.php');
$data = json_decode(file_get_contents('php://input'), true);

// Get product ID from JSON data
$product_id = $data['product_id'];

// Find product with matching ID in database
$stmt = $conn->prepare("SELECT * FROM products WHERE id = :product_id");
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();
$product = $stmt->fetch();

// If no product found, return error response
if (!$product) {
    http_response_code(404);
    echo json_encode(array('error' => 'Product not found'));
    exit();
}

// Add product to cart in database
$stmt = $conn->prepare("INSERT INTO carts (product_id) VALUES (:product_id)");
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();

// Return success response
http_response_code(200);
echo json_encode(array('success' => true));
?>