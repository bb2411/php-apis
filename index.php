<?php
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