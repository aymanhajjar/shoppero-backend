<?php
session_start();
header('Access-Control-Allow-Origin: *');
include('connection.php');



// $check_admin = $mysqli->prepare('select id from admins');
//     $check_product->bind_param('s', $product_name);
//     $check_product->execute();
//     $check_product->store_result();
//     $product_exists = $check_product->num_rows();


// $first_name=$_POST['first-name'];
// $last_name=$_POST['lastname'];
// $phone_number=$_POST['phone-number'];
// $email=$_POST['email'];

// $sql="update admins set first_name=$first_name, last_name=$last_name,email=$email where id=$id;";
// mysqli_query($mysqli, $sql);
?>