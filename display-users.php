<?php
include('connection.php');
header('Access-Control-Allow-Origin: *');


 $sql="select id from users;";
 $result=mysqli_query($mysqli, $sql);
 $resultCheck=mysqli_num_rows($result);

 if($resultCheck > 0) {
    $response['status'] = 'exist';
    while($row=mysqli_fetch_assoc($result)){
        echo json_encode($row);
    }
} else {
    $response['status'] = 'empty';
 }
?>
    <!-- $search_results = array(); -->

    <!-- while ($row = $result->fetch_assoc()) {
        $search_results[] = $row;
    } -->

    <!-- echo json_encode($search_results); -->