<?php
session_start();
header('Access-Control-Allow-Origin: *');
 include('connection.php');
$product_id  = $_POST['product_id'];
$user_id = $_SESSION['user_id'];

$query = $mysqli->prepare('INSERT INTO carts (user_id, product_id, quantity) VALUES (?, ?, ?)');
$quantity = 1;
$query->bind_param('iii',$user_id, $product_id, $quantity );
$query->execute();

// Return success response
http_response_code(200);
echo json_encode(array('success' => $product_id));
?>