<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
 include('connection.php');
 
 $category = $_GET['category'];
 $subcat = $_GET['subcat'];
 $filter = $_GET['filter'];
 $value = $_GET['value'];

 if($category == 'men') {
    if($subcat == 'clothes') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 1 and subcategory_id=7 ORDER BY RAND()');
    } else if($subcat == 'shoes') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 1 and subcategory_id=1 ORDER BY RAND()');
    } else if($subcat == 'accessories') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 1 and subcategory_id=8 ORDER BY RAND()');
    } else if($subcat == 'watches') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 1 and subcategory_id=9 ORDER BY RAND()');
    } else {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 1 ORDER BY RAND()');
    }
 } else if($category == 'women'){
    if($subcat == 'clothes') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 0 and subcategory_id=7 ORDER BY RAND()');
    } else if($subcat == 'shoes') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 0 and subcategory_id=1 ORDER BY RAND()');
    } else if($subcat == 'accessories') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 0 and subcategory_id=8 ORDER BY RAND()');
    } else if($subcat == 'watches') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 0 and subcategory_id=9 ORDER BY RAND()');
    } else {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.for_men = 0 ORDER BY RAND()');
    }
 } else if($filter == 'price') {
    if($value == '0-50') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.price > 0 and p.price < 50 ORDER BY RAND()');
    } else if($value == '50-100') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.price > 50 and p.price < 100 ORDER BY RAND()');
    } else if($value == '100-200') {
        $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id and p.price > 100 and p.price < 200 ORDER BY RAND()');
    }
 } else if($filter == 'color') {
    $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where c.color_name = ? ORDER BY RAND()');
    $check_product->bind_param('s', $value);
 } else if($filter == 'brand') {
    $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id join brands b on p.brand_id = b.id where b.brand_name = ? ORDER BY RAND()');
    $check_product->bind_param('s', $value);
 } else if($filter == 'material') {
    $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id join product_materials m on p.id = m.product_id join materials mat on m.id = mat.id where p.main_color = c.color_id and mat.material_name = ? ORDER BY RAND()');
    $check_product->bind_param('s', $value);
 } else {
    $products = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id where p.main_color = c.color_id ORDER BY RAND()');
 }

 $products->execute();

 $array = $products->get_result();
 $response = []; 
 while($a = $array->fetch_assoc()){
     $response[] = $a;
 }
 echo json_encode($response);
 ?>