<?php
header("Content-Type:application/json");
include "./vendor/autoload.php";
include "./db.php";
include "logincache.php";
include "seckey.php";
use Firebase\JWT\JWT;
$email=$_GET['email'];
$password=$_GET['password'];
$sql="select * from users where email='$email'";
$result=$con->query($sql);
$hashedpass=md5($password);
while($row=$result->fetch_assoc()){
    if($row['pass']==$hashedpass){
        $issued=time();
        $exp=$issued+(60*60);
        $payload=[
            "iat"=>$issued,
            "exp"=>$exp,
            "userid"=>$email,
            "keypass"=>encryptData("bhargavdev123456789")
        ];
        $userid=$email;
        $tok=JWT::encode($payload,$secretkey,'HS512');
        header("HTTP_TOKEN:$tok");
        echo $tok;
    }else{
        echo json_encode(["status"=>401,"msg"=>"Password incorrect"]);
    }
}
?>