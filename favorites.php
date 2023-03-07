<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
include('connection.php');
$user_id = $_GET['user_id'];

$favorites_page = $mysqli->prepare('select * from wishlists JOIN products ON wishlists.product_id=products.id where user_id=?');
$favorites_page->bind_param('i', $user_id);
$favorites_page->execute();

$array = $favorites_page->get_result();
$response = [];
while ($a = $array->fetch_assoc()) {
    $response[] = $a;
}
echo json_encode($response);
