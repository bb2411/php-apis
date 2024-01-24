<?php
    header('Content-Type: application/json');
    $arr=array();
    include "db.php";
    $result=$con->query("select * from users");
    while($row=$result->fetch_assoc()){
        $arr[]=$row;
    }
    echo json_encode($arr);
?>