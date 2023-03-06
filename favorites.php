<?php
session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
include('connection.php');
$user_id = $_SESSION['user_id'];

$favorites_page = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join wishlists w on p.id = w.product_id join product_colors c on p.id = c.product_id where w.user_id=? and p.main_color = c.color_id');
$favorites_page->bind_param('i', $user_id);
$favorites_page->execute();

$array = $favorites_page->get_result();
$response = [];
while ($a = $array->fetch_assoc()) {
    $response[] = $a;
}
echo json_encode($response);
