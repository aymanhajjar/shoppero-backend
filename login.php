<?php
    include('connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_email = $mysqli->prepare('select email from users where email=?');
    $check_email->bind_param('s', $email);
    $check_email->execute();
    $check_email->store_result();
    $email_exists = $check_email->num_rows();

?>