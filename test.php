<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
include('connection.php');

$check = $mysqli->prepare('select subcategory_name from subcategories where id=1');
$check->execute();
$check->store_result();
$num_rows = $check->num_rows();
$check->bind_result($subcategory_name);
$check->fetch();

$response = array('name' => $subcategory_name);
echo json_encode($response);
?>