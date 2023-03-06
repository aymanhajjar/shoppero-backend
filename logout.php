<?php
    session_start();
    header('Access-Control-Allow-Origin: *');
    include('connection.php');

    unset($_SESSION['user_id']);
    unset($_SESSION['loggedin']);
    unset($_SESSION['first_name']);

    session_destroy();

    $response['status'] = 'logged out';
    echo json_encode($response);
?>