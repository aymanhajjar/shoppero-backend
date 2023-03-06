<?php
session_start();
header('Access-Control-Allow-Origin: *');
 include('connection.php');
$user_id = $_SESSION['user_id'];

$favorites_page = $mysqli->prepare('delete from carts where user_id = ?');
$favorites_page->bind_param('i', $user_id);
$favorites_page->execute();

?>