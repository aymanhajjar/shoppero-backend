<?php
session_start();
header('Access-Control-Allow-Origin: *');
include('connection.php');

$user_id = $_SESSION['user_id'];

$query = $mysqli->prepare('select id,email, first_name,last_name, phone_number, shipping_address from users where id=?');
$query->bind_param('s', $user_id);
$query->execute();
$query->store_result();
$query->bind_result($id, $email, $first_name, $last_name, $phone, $shipping);
$query->fetch();

$response['first_name'] = $first_name;
$response['last_name'] = $last_name;
$response['email'] = $email;
$response['phone'] = $phone;
$response['shipping'] = $shipping;
echo json_encode($response);

?>