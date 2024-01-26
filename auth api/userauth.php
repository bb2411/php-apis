<?php  
header("Content-Type:aplication/json");
$token=$_SERVER['HTTP_TOKEN'];
include "seckey.php";
include "logincache.php";
include "./vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
$keytok=new Key($secretkey,"HS512");
$state=false;
try {
    $data=array(JWT::decode($token, $keytok));
    $decrptedkey=decryptData($data[0]->keypass);
    $state=verifykeypass($decrptedkey);
    if($state){
        echo json_encode(["status"=>200]);
    }else{
        echo json_encode(["status"=>401]);
    }
} catch (ExpiredException $e) {
    $state=false;
    echo json_encode(["status"=>401,"msg"=>"token expired! try again login"]);
} catch (SignatureInvalidException $e) {
    $state=false;
    echo json_encode(["status"=>401,"msg"=>"token was invalid!"]);
} catch (BeforeValidException $e) {
    $state=false;
    echo json_encode(["status"=>401,"msg"=>"token is not validated by server"]);
} catch (Exception $e) {
    $state=false;
    echo json_encode(["status"=>401,"msg"=>"something error happens try again login...!"]);
}
?>