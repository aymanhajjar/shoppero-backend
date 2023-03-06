<?php
include('connection.php');
header('Access-Control-Allow-Origin: *');

$first_name=$_post['first-name'];
$last_name=$_post['lastname'];
$phone_number=$_POST['phone-number'];
$email=$_POST['email'];
// reminder to add the id in the where clause

$sql="update admins set first_name=$first_name, last_name=$last_name,email=$email where id=$id;";
mysqli_query($mysqli, $sql);
?>