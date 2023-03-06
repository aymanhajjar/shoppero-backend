<?php
session_start();
header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Credentials: true');

include('connection.php');

if (isset($_SESSION['loggedin'])) {
    $response = array('success' => true, 'first_name' => $_SESSION['first_name']);
} else {
    $response = array('success' => false);
}

echo json_encode($response);

?>