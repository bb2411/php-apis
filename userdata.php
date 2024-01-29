<?php
    header("Access-Control-Allow-Origin: http://localhost:4200");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    $arr=array();
    include "db.php";
    $result=$con->query("select * from users");
    while($row=$result->fetch_assoc()){
        $arr[]=$row;
    }
    echo json_encode($arr);
?>