<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
 include('connection.php');
 
 $products = $mysqli->prepare('select * from products');

 $products->execute();

 $array = $products->get_result();
 $response = []; 
 while($a = $array->fetch_assoc()){
     $response[] = $a;
 }
 echo json_encode($response);
 