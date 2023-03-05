<?php
include('connection.php');
header('Access-Control-Allow-Origin: *');

$product_name=$_post['product_name'];
$description=$_post['description'];
$price=$_post['price'];
$main_color=$_post['main_color'];
$for_men=$_post['for_men'];
$subcategory=$_post['subcategory'];
$brand=$_post['brand'];
$discount=$_post['discount'];
$product_size=$_post['product_size'];
$product_material=$_post['product_material'];
$product_image=$_post['product_image'];
$discount=$_post['discount'];

$sql1="insert into products(product_name,description,price,main_color,for_men,subcategory,brand,discount) VALUES ($product_name,$description,$price,$main_color,$for_men,$subcategory,$brand,$discount);";
mysqli_query($mysqli, $sql1);
$sql2="insert into product_colors(product_id,color_id,image) VALUES ($product_id,$color_id,$image);";
mysqli_query($mysqli, $sql2);
$sql3="insert into product_materials(product_id,material_id) VALUES ($product_id,$material_id);";
mysqli_query($mysqli, $sql3);
$sql4="insert into product_sizes(product_id,size) VALUES ($product_id,$size);";
mysqli_query($mysqli, $sql4);
?>