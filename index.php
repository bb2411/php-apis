<?php
    header("Access-Control-Allow-Origin: http://localhost:4200");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");
    $requesturi=strtok($_SERVER['REQUEST_URI'],'?');
    $routes=[
        '/apis/userdata'=>"userdata.php",
        '/apis/adduser'=>"adduser.php",
        '/apis/generatepdf'=>"generatebasicpdf.php",
        '/apis/generatexlsx'=>"generatebasicxlsx.php",
        '/apis/authapi/userverify'=>"./auth api/userverify.php",
        '/apis/authapi/userauth'=>"./auth api/userauth.php"
    ];
    if(isset($routes[$requesturi])){
        include $routes[$requesturi];
    }else{
        echo "404 not found";
    }
?>