<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS, POSTch");
include('connection.php');

$email = $_POST['email'];
$new_password = $_POST['password'];

$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);


$query = $mysqli->prepare('update users set password = ? where email=?');
$query->bind_param('ss', $hashed_password, $email);
$query->execute();
$query->store_result();

// $update_result = $mysqli->query("UPDATE users SET password = $hashed_password WHERE email = $email");

// if ($update_result) {
//   echo 'Password updated successfully.';
// } else {
//   echo 'Error updating password: ' . $mysqli->error;
// }

$response['status'] = $hashed_password;
echo json_encode($response);
?>