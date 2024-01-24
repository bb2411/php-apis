<?php
header("Content-Type:application/json");
include "db.php";
$name=$_GET["name"];
$pass=md5($_GET["password"]);
$sql="insert into users values('$name','','$pass')";
if($con->query($sql)==true){
    $arr=array( "status"=>true,"message"=>"user added successfull" );
    echo json_encode($arr);
}else{
    $arr=array( "status"=>false,"message"=>"not registered try again" );
    echo json_encode($arr);    
}
?>