<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    include('connection.php');
    $id=$_GET['id'];
    
    $product = $mysqli->prepare('select * from products where id=?');
    $product->bind_param('s', $id);
    $product->execute();

    $array = $product->get_result();
    $response = []; 
    while($a = $array->fetch_assoc()){
        $response[] = $a;
    }
    echo json_encode($response);
    ?>