<?php 


session_start();
require "../inc/connection.php" ;
require "../inc/functions.php" ;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = [];

    $opass = trim($_POST['opass']);

    $npass = trim($_POST['npass']); 

    $rpass = trim($_POST['rpass']);   

    $email = $_SESSION['user_email'];
 
    if(empty($opass)){
        $error[] = 'enter your old password';
    }if(empty($npass) || !preg_match('/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,32})$/u',$npass)){
        $error[] = 'Password Must Has Minimum 8 Characters In Length ,</br>At Least One Uppercase English Letter,</br>At Least Lne Lowercase English Letter,</br>At Least One Digit';
    }if(empty($rpass) ){
        $error[] = 'phone rewrite your new password';
    }if($npass !== $rpass){
        $error[] = 'phone rewrite your new password';
    }if(!empty($error[0])){
        $_SESSION['error'] = implode('</br>',$error); 
        redirect("../change_pass.php");
        die;
    }else{
        $stmt = $conn -> prepare("SELECT `password` FROM `users` WHERE `email` = ? limit 1");
        $stmt -> bindParam(1,$_SESSION['user_email']);
        $stmt -> execute();
        $data = $stmt -> fetchObject();
        if($data){
            if(password_verify($opass,$data->password)){
                $password = password_hash($npass,PASSWORD_DEFAULT);
                $conn -> query("update users set `password` = '$password' where email = ' $email' ");
                $_SESSION['suc'] = "change password successfully"; 
                redirect("../change_pass.php");
                die;
            }else{
                $_SESSION['error'] = "please try again"; 
                redirect("../change_pass.php");
                die;
            }
        }else{
            $_SESSION['error'] = "you are entered a wrong password"; 
            redirect("../change_pass.php");
            die;
        }
    }
}else{
    $_SESSION['error'] = "please try again"; 
    redirect("../change_pass.php");
    die;
}