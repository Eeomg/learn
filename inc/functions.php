<?php 

    function redirect($url,$seconds = '')
    {
        if(empty($seconds)){
            header("location:$url");
        }else{
            header("Refresh:$seconds ; Url=$url");
        }
    }

    function alert($url = '')
    {
        if(isset($_SESSION['error']) ){
            echo "<div class='alert alert-danger w-50 m-auto p-3 text-center'>".$_SESSION['error']."</div>";
            unset($_SESSION['error']);
            redirect($_SERVER['PHP_SELF'],3);
        }

        elseif(isset($_SESSION['suc']) ){
            echo "<div class='alert alert-success w-50 m-auto p-3 text-center'>".$_SESSION['suc']."</div>";
            unset($_SESSION['suc']);
            redirect($url,1);
        }
    }
    