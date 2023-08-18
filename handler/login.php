<?php 
    session_start();
    require "../inc/connection.php" ;
    require "../inc/functions.php" ;

    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $error = [];

        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);     
        $email = filter_var(trim($email),FILTER_VALIDATE_EMAIL);   

        $password = trim($_POST['password']);    

        if(empty($email)){
            $error[] = 'please enter your email';
        }
        if(empty($password) ){
            $error[] = 'please enter your password';
        }
        if(!empty($error[0])){
            $_SESSION['error'] = implode('</br>',$error); 
            redirect("../login.php");
            die;
        }else{
            try{
                $stmt = $conn -> prepare("SELECT * FROM `users` WHERE `email` = ? limit 1");
                $stmt -> bindParam(1,$email);
                $stmt -> execute();
                $data = $stmt -> fetchObject();
                if($data){

                    $check = password_verify($password,$data->password);
                    if($check){
                        $_SESSION['user_id']    = $data->id   ;
                        $_SESSION['user_name']  = $data->name ;
                        $_SESSION['user_email'] = $data->email;
                        $_SESSION['user_phone'] = $data->phone;
                        $_SESSION['user_pos']   = $data->position;
                        redirect("../index.php");
                        die;
                    }else{
                        $_SESSION['error'] = "email or password is not correct";
                        redirect("../login.php");
                        die;
                    }
                }else{
                    $_SESSION['error'] = "email or password is not correct";
                    redirect("../login.php");
                    die;
                }
            }catch(PDOException $e){
                $_SESSION['error'] = "email or password is not correct"; // .$e->getMessage();
                redirect("../login.php");
                die;
            }
        }
    }else{
        $_SESSION['error'] = "not found"; // .$e->getMessage();
        redirect("../login.php");
    }