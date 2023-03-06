<?php
    session_start();
    header('Access-Control-Allow-Origin: *');
    include('connection.php');

    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $query = $mysqli->prepare('select id,email,password,first_name,last_name from admins where email=?');
    $query->bind_param('s', $admin_email);
    $query->execute();

    $query->store_result();
    $num_rows = $query->num_rows();
    $query->bind_result($id, $admin_email, $hashed_password, $first_name, $last_name);
    $query->fetch();
    $response = [];

    if($num_rows > 0) {
        if(password_verify($admin_password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['admin_id'] = $id;
            $response['status'] = 'admin logged in';
            $response['first_name'] = $first_name;
            $response['last_name'] = $first_name;
            $response['email'] = $admin_email;

            echo json_encode($response);
        } else {
            $response['status'] = 'wrong email or password';
            echo json_encode($response);
        }
    } else {
        $response['status'] = 'admin does not exist';
        echo json_encode($response);
    }

?>