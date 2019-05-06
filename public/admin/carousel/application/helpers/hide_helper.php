<?php

function encrypt($string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = config_item('encryption_key');
    $secret_iv = config_item('encryption_key');

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    // $output = base64_encode($output);
    $output = rtrim(base64_encode($output), '=');
    return $output;
}

function decrypt($string){
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = config_item('encryption_key');
    $secret_iv = config_item('encryption_key');

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}