<?php
include('connection.php');
header('Access-Control-Allow-Origin: *');

 $sql="select * from users;";
 $result=mysqli_query($mysqli, $sql);
 $resultCheck=mysqli_num_rows($result);
 if($resultCheck>0){
    while($row=mysqli_fetch_assoc($result)){
        echo json_encode($row);
    }
 }
?>