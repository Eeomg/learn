<?php  include('inc/header.php');  ?> 


    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <h1 class="text-center display-4 border m-4 p-5 bg-secondary text-light"> change password</h1>
                <?php 
                    alert();
                ?>
            </div>
            <div class="col-sm-6 mx-auto ">
                <div class="border p-5 my-3  bg-light">
                    <form action="handler/change_pass.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="opass" placeholder="Your Password">
                        </div>
                        <div class="form-group my-2">
                            <input type="text" class="form-control" name="npass" placeholder="new Password">
                        </div>
                        <div class="form-group my-2">
                            <input type="text" class="form-control" name="rpass" placeholder="rewrite Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-primary"  value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 