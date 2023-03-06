<?php
    header('Access-Control-Allow-Origin: *');
    include('connection.php');

    $query = $_GET['query'];

    $search = $mysqli->prepare('select p.id, p.product_name, p.price, c.image, p.discount from products p join product_colors c on p.id = c.product_id  where p.product_name like ? and p.main_color = c.color_id');
    $query_string = '%' . $query . '%';
    $search->bind_param('s', $query_string);
    $search->execute();
    $result = $search->get_result();

    $search_results = array();

    while ($row = $result->fetch_assoc()) {
        $search_results[] = $row;
    }

    echo json_encode($search_results);
?>