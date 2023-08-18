<?php 
    ob_start();
    session_start();
    include "inc/connection.php";
    include "inc/functions.php";
    $islogin = false;
    $arr = explode('/',$_SERVER['PHP_SELF']);
    $page = end($arr);

    if(!(isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_email']) && isset($_SESSION['user_phone']))){
        if($page != 'login.php' && $page != 'register.php' && $page != 'index.php' ){
            header("location:login.php");
        }
    }else{
        $islogin = true;
        if($page == 'login.php' || $page == 'register.php' ){
            header("location:index.php");
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" > -->
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <title>Login System Using PHP</title>
  </head>
  <body style="background-color:#eee;">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <a class="navbar-brand text-primary " href="index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-light" href="index.php">Home </span></a>
                </li>
                <?php if($islogin && $_SESSION['user_pos'] == 1) : ?>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="users.php">users </span></a>
                </li>
                <?php endif ?>
                <?php if($islogin) : ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="show-data.php">Show Data</a>
                </li>
                <?php endif ?>
                <?php if(!$islogin) : ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="register.php">Register</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="change_pass.php">change password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>
                <?php endif ?>
            </ul>
            
        </div>
    </nav>