<?php  include('inc/header.php');  ?> 

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-4 border m-4 p-5 bg-secondary text-light">Register</h1>
                <?php 
                    alert('login.php');
                ?>
            </div>
            <div class="col-sm-6 mx-auto">
                <div class="border p-5 my-3  bg-light">
                    <form action="handler/register.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                        </div>
                        <div class="form-group my-2">
                            <input type="text" class="form-control" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group my-2">
                            <input type="text" class="form-control" name="phone" placeholder="Your Mobile">
                        </div>
                        <div class="form-group my-2">
                            <input type="password" class="form-control" name="password" placeholder="Your Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-primary"  value="register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 
