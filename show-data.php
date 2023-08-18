<?php  include('inc/header.php');  ?> 


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4 border m-4 p-5 bg-secondary text-light"> Data</h1>
                <div>
                    <h2> Name : <?= $_SESSION['user_name'] ?></h2>
                    <h2> Email : <?= $_SESSION['user_email'] ?></h2>
                    <h2> Mobile : <?= $_SESSION['user_phone'] ?></h2>
                    <h2> Address : 5 fiesl street  , second floor</h2>
                </div>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 