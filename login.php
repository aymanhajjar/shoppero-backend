<?php
    session_start();
    header('Access-Control-Allow-Origin: *');
    include('connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $mysqli->prepare('select id,email,password,first_name,last_name from users where email=?');
    $query->bind_param('s', $email);
    $query->execute();

    $query->store_result();
    $num_rows = $query->num_rows();
    $query->bind_result($id, $email, $hashed_password, $first_name, $last_name);
    $query->fetch();
    $response = [];

    if($num_rows > 0) {
        if(password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['first_name'] = $first_name;
            $response['status'] = 'user logged in';
            $response['first_name'] = $first_name;
            echo json_encode($response);
        } else {
            $response['status'] = 'wrong username/pass';
            echo json_encode($response);
        }
    } else {
        $response['status'] = 'user does not exist';
        echo json_encode($response);
    }

?>