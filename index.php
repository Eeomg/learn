<?php  include('inc/header.php');  ?> 


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4 border m-4 p-5 bg-secondary text-light"> Login System Using PHP </h1>
                <p class="h2 m-5 py-2 px-5 bg-light d-inline">welcome : <?= ($islogin) ? $_SESSION['user_name'] : ""  ?></p>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 
