<?php
session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
include('connection.php');
$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$favorites = $mysqli->prepare('SELECT user_id, product_id FROM wishlists WHERE user_id=? AND product_id=?');
$favorites->bind_param('ii', $user_id, $product_id);
$favorites->execute();
$favorites->store_result();
$favorites->fetch();
$favorites_exists = $favorites->num_rows();

if ($favorites_exists > 0) {
    $delete = $mysqli->prepare('delete from wishlists where user_id=? and product_id=?');
    $delete->bind_param('ss', $user, $product);
    $delete->execute();
    echo json_encode(array("success" => true, "message" => "Product removed from wishlist"));
} else {
    $insert = $mysqli->prepare('insert into wishlists (user_id, product_id) values (?, ?)');
    $insert->bind_param('ss', $user, $product);
    $insert->execute();
    echo json_encode(array("success" => true, "message" => "Product added to wishlist"));
}
