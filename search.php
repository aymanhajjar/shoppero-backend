<?php
    header('Access-Control-Allow-Origin: *');
    include('connection.php');

    $query = $_GET['query'];

    $search = $mysqli->prepare('select id, product_name, price, discount from products where product_name like ?');
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