<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
    session_start();
    
    include('connection.php');

    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    // $hashed_password=password_hash($admin_password,PASSWORD_BCRYPT);

    $query = $mysqli->prepare('select id,email,password,first_name,last_name from admins where email=?');
    $query->bind_param('s', $admin_email);
    $query->execute();

    $query->store_result();
    $num_rows = $query->num_rows();
    $query->bind_result($id, $admin_email, $hashed_password, $first_name, $last_name);
    $query->fetch();
    $response = [];
    
    if($num_rows > 0) {
        if($hashed_password==$admin_password){
            $_SESSION['loggedin'] = true;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['admin_id'] = $id;
            $response['status'] = 'admin logged in';
            $response['first_name'] = $first_name;
            $response['last_name'] = $last_name;
            $response['email'] = $admin_email;

            echo json_encode($response);
        }
        else{
            $response['status'] = 'Password is incorrect';
            echo json_encode($response);

        }
    }
     else {
        $response['status'] = 'admin does not exist';
        echo json_encode($response);
    }

?>