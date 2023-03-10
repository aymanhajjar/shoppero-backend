<?php
session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
    include('connection.php');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_email = $mysqli->prepare('select email from users where email=?');
    $check_email->bind_param('s', $email);
    $check_email->execute();
    $check_email->store_result();
    $email_exists = $check_email->num_rows();

    if($email_exists > 0) {
        $response['status'] = 'email already exists';
        echo json_encode($response);
    } else {

        if(strlen($password) >= 8 && preg_match('/[A-Z]/', $password) && preg_match('/\d/', $password) && preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)
        && preg_match('/[a-z]/', $password)) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $query = $mysqli->prepare('insert into users(first_name, last_name, email, password) values(?,?,?,?)');
            $query->bind_param('ssss', $first_name, $last_name, $email, $hashed_password);
            $query->execute();
            $_SESSION['loggedin'] = true;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['user_id'] = $id;
            $response['status'] = 'user added';
            $response['first_name'] = $first_name;
            echo json_encode($response);

        } else {
            $response['status'] = 'password not validated';
            echo json_encode($response);
        }

    }
?>