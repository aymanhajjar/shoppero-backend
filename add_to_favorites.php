<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
include('connection.php');
$user = $_POST['user'];
$product = $_POST['product'];
$favorites = $mysqli->prepare('select user_id, product_id from wishlists where user_id=? product_id=?')
$favorites->bind_result('ss', $user,$product );
$favorites->execute();
$favorites->store_result();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
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








?>