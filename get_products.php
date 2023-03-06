<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
 include('connection.php');
 
 $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id ORDER BY RAND()');

 $products->execute();

 $array = $products->get_result();
 $response = []; 
 while($a = $array->fetch_assoc()){
     $response[] = $a;
 }
 echo json_encode($response);
 