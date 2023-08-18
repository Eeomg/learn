<?php  
    include('inc/header.php'); 
    if($_SESSION['user_pos'] != 1){
        redirect("index.php");
    }
?> 

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4 border m-4 p-5 bg-secondary text-light"> Data</h1>
                    <table class="table table-sm table-striped text-center">
                        <thead>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>position</th>
                        </thead>
                        <tbody>
                            <?php 
                                $id = 1;
                                // try{
                                    $stmt = $conn -> prepare("SELECT users.*,position.position as pos_title FROM users join position on users.position = position.id");
                                    $stmt -> execute();
                                    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                // }catch(Exception $e){
                                //     $_SESSION['error'] = $e->getMessage();
                                //     alert();
                                // }
                                foreach($data as $row) :
                            ?>
                            <tr>
                                <td><?= $id++ ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['pos_title'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 

    

    