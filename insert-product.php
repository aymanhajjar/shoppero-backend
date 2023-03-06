<?php
include('connection.php');
header('Access-Control-Allow-Origin: *');

$product_name=$_POST['product_name'];
$description=$_POST['description'];
$price=$_POST['product_price'];
$main_color=$_POST['main_color'];
$product=$_POST['product_color'];
$for_men=$_POST['for_men'];
$subcategory=$_POST['subcategory'];
$brand=$_POST['brand'];
$discount=$_POST['discount'];
$product_size=$_POST['product_size'];
$product_material=$_POST['product_material'];
$product_image=$_POST['product_image'];

$check_product = $mysqli->prepare('select product_name from products where product_name=?');
    $check_product->bind_param('s', $product_name);
    $check_product->execute();
    $check_product->store_result();
    $product_exists = $check_product->num_rows();

    if($product_exists > 0) {
        $response['status'] = 'exists';
        echo json_encode($response);
    } else {
        $sql1="insert into products(product_name,description,price,main_color,for_men,subcategory,brand,discount) VALUES ($product_name,$description,$price,$main_color,$for_men,$subcategory,$brand,$discount);";
        mysqli_query($mysqli, $sql1);
        $sql2="insert into product_colors(product_id,color_id,image) VALUES ($product_id,$color_id,$image);";
        mysqli_query($mysqli, $sql2);
        $sql3="insert into product_materials(product_id,material_id) VALUES ($product_id,$material_id);";
        mysqli_query($mysqli, $sql3);
        $sql4="insert into product_sizes(product_id,size) VALUES ($product_id,$size);";
        mysqli_query($mysqli, $sql4);
        $response['status'] = 'added';
        echo json_encode($response);
    }
?>