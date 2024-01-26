<?php 
    $userid="";
    $key = 'bhargavbhatt24';
    $iv = "0123456789abcdef";
    function encryptData($data) {
        global $iv,$key;
        $cipher = "aes-256-cbc";
        $encrypted = openssl_encrypt($data, $cipher,$key, 0, $iv);
        return $encrypted;
    }
    function decryptData($encryptedData) {
        global $iv,$key;
        $cipher = "aes-256-cbc";
        $decrypted = openssl_decrypt($encryptedData, $cipher, $key, 0, $iv);
        return $decrypted;
    }
    function verifykeypass($keypass){
        if($keypass=="bhargavdev123456789"){
            return true;
        }else{
            return false;
        }
    }
?>