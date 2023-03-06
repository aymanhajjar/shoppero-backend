<?php
include('connection.php');
header('Access-Control-Allow-Origin: *');

 $sql="select * from users;";
 $result=mysqli_query($mysqli, $sql);
 $resultCheck=mysqli_num_rows($result);

 if($resultCheck > 0) {
    $response['status'] = 'exist';
    while($row=mysqli_fetch_assoc($result)){
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 'empty';
    echo json_encode("$response");
 }

?>