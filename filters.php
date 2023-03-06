<?php
header('Access-Control-Allow-Origin: *');
include('connection.php');
$color_id=$_POST("id");
$color_name = $mysqli->prepare("select color_name from colors WHERE id=?");
$colors_name->bind_param('s',$color_id);
$product_id=$_POST("id");
$product_price=$mysqli->prepare("select price from products WHERE id=?");
$product_price->bind_param('s',$product_id);
$material_id=$_POST("id");
$material_name=$mysqli->prepare("select material_name from materials WHERE id=?");
$material_name->bind_param('s',$material_id);
$brand_id=$_POST("id");
$brand_name=$mysqli->prepare("select brand_name from brands WHERE id=?");
$brand_name->bind_param('s',$brand_id);


?>