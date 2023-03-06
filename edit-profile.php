<?php
session_start();
header('Access-Control-Allow-Origin: *');
include('connection.php');

$first_name=$_POST['first-name'];
$last_name=$_POST['last-name'];
$phone_number=$_POST['phone-number'];
$email=$_POST['email'];
$shipping_address=$_POST['shipping-address'];

$sql="select id from users where email=$email;";
$id=mysqli_query($mysqli, $sql);
$user_exists=mysqli_num_rows($id);

if($user_exists > 0) {
    $response['status'] = 'exist';
    $sql1="update admins set first_name=$first_name, last_name=$last_name,phone_number=$phone_number,shipping_address=$shipping_address where id=$id;";
    mysqli_query($mysqli, $sql1);
}
?>