<?php 
    include "inc/header.php";
    session_unset();
    session_destroy();
    redirect("login.php");

?>