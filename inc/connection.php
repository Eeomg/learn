<?php 

    $dsn = 'mysql:hoszt=localhost;dbname=user_auth;charset=utf8';
    $user = 'root';
    $password = '';

    try{
        $conn = new PDO($dsn,$user,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] );
    }catch(PDOException $e){
        echo 'Error : '.$e->getMessage();
        die;
    }
