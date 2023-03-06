<?php
session_start();
header('Access-Control-Allow-Origin: *');
include('connection.php');

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$phone_number=$_POST['phone_number'];
$email=$_POST['email'];
$shipping_address=$_POST['shipping_address'];

$id = $_SESSION['user_id'];

if(isset($shipping_address) && isset($phone_number)) {
    $sql1 = $mysqli->prepare("UPDATE users SET first_name=?, last_name=? WHERE id=?");
    $sql1->bind_param('ssi', $first_name, $last_name, $id);
    $sql1->execute();
    $response['status'] = $shipping_address . 'ok';
    echo json_encode($response);
} else if (isset($shipping_address)) {
    // $sql1 = $mysqli->prepare("UPDATE users SET first_name=?, last_name=?, shipping_address=? WHERE id=?");
    // $sql1->bind_param('sssi', $first_name, $last_name, $shipping_address, $id);
    // $sql1->execute();
    // $response['status'] = 'success';
    // echo json_encode($response);
} else if (isset($phone_number)) {
    // $sql1 = $mysqli->prepare("UPDATE users SET first_name=?, last_name=?, phone_number=? WHERE id=?");
    // $sql1->bind_param('sssi', $first_name, $last_name, $phone_number, $id);
    // $sql1->execute();
    // $response['status'] = 'success';
    // echo json_encode($response);
} else {
    // $sql1 = $mysqli->prepare("UPDATE users SET first_name=?, last_name=? WHERE id=?");
    // $sql1->bind_param('ssi', $first_name, $last_name, $id);
    // $sql1->execute();
    // $response['status'] = 'success';
    // echo json_encode($response);
}

    
?>