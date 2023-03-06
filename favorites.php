<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
include('connection.php');
$user_id = $_GET['user_id'];

$favorites_page = $mysqli->prepare('select user_id from wishlists where id=?');
$favorites_page->bind_param('s', $id);
$favorites_page->execute();

$array = $favorites_page->get_result();
$response = [];
while ($a = $array->fetch_assoc()) {
    $response[] = $a;
}
echo json_encode($response);
