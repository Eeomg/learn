<?php 
    session_start();
    require "../inc/connection.php" ;
    require "../inc/functions.php" ;


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = [];
        $name = trim(filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS));   

        $email = trim(filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS));     
        $email = filter_var($email,FILTER_VALIDATE_EMAIL);   
        
        $phone = trim(filter_input(INPUT_POST,'phone',FILTER_SANITIZE_NUMBER_INT));   

        $password = trim($_POST['password']);    

        if(empty($name)){
            $error[] = 'name not valid';
        }if(empty($email)){
            $error[] = 'email not valid';
        }if(empty($phone) || !preg_match("/^(^01[0-2,5]{1}[0-9]{8}$)$/u",$phone)){
            $error[] = 'phone not valid';
        }if(empty($password) || !preg_match('/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,32})$/u',$password)){
            $error[] = 'Password Must Has Minimum 8 Characters In Length ,</br>At Least One Uppercase English Letter,</br>At Least Lne Lowercase English Letter,</br>At Least One Digit';
        }
        if(!empty($error[0])){
            $_SESSION['error'] = implode('</br>',$error); 
            redirect("../register.php");h
            die;
        }else{
            try{
                $stmt = $conn -> prepare("SELECT `email` FROM `users` WHERE `email` = ? limit 1");
                $stmt -> bindParam(1,$email);
                $stmt -> execute();
                $count = $stmt -> rowCount();
                if($count != 0){
                    $_SESSION['error'] = "this email is already exist";
                    redirect("../register.php");
                    die;
                }else{
                    $password = password_hash($password,PASSWORD_DEFAULT);
                    $stmt = $conn -> prepare("INSERT INTO `users` (`name`,`email`,`phone`,`password`,`position`) VALUES (?,?,?,?,2)");
                    $stmt -> bindParam(1,$name);
                    $stmt -> bindParam(2,$email);
                    $stmt -> bindParam(3,$phone);
                    $stmt -> bindParam(4,$password);
                    $stmt -> execute();
                    $_SESSION['suc'] = "user added successfully";
                    redirect("../register.php");
                    die;
                }
            }catch(PDOException $e){
                $_SESSION['error'] = "please try again".$e->getMessage();
                redirect("../register.php");
                die;
            }
        }
    }else{
        $_SESSION['error'] = "not found";
        redirect("../register.php");
        die;
    }