<?php
header('Access-Control-Allow-Origin: *');
 include('connection.php');
$product_id  = $_GET['product_id'];
// Find product with matching ID in database
$query = $mysqli->prepare('select * from products WHERE id =?');
$query->bind_param('s',$product_id );
$query->execute();
$product = $query->fetch();

// If no product found, return error response
if (!$product) {
    http_response_code(404);
    echo json_encode(array('error' => 'Product not found'));
    exit();
}

// Add product to cart in database
$stmt = $mysqli->prepare("INSERT INTO carts (product_id) VALUES (:product_id)");
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();

// Return success response
http_response_code(200);
echo json_encode(array('success' => true));
?>