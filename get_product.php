<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    include('connection.php');
    $id=$_GET['id'];
    
    $product = $mysqli->prepare('select p.id, p.product_name, p.main_color, p.description, p.price, c.image, p.discount, p.for_men, b.brand_name, s.size, sub.subcategory_name, col.color_name
    from products p 
    join product_colors c ON p.id = c.product_id 
    join brands b ON b.id = p.brand_id
    left join product_sizes s on s.product_id = p.id
    join subcategories sub on sub.id = p.subcategory_id
    join colors col on col.id = c.color_id
    where p.id = ?');
    $product->bind_param('s', $id);
    $product->execute();

    $array = $product->get_result();
    $response = []; 
    while($a = $array->fetch_assoc()){
        $response[] = $a;
    }
    echo json_encode($response);
?>