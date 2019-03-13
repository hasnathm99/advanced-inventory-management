<?php
ob_start();
session_start();
if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('Location:login.php');
  
  die();
}
require_once('include/db_connect.php');
$query="select * from users";
$query_run=mysqli_query($connect , $query);

?>
<?php include 'include/header.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       <!--  Start Copy From Here -->
                       <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <h3>Accounts Table</h3>
                                        <br>
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>User Name</th>
                                                <th>User Password</th>
                                                <th colspan="2">Action</th>
                                                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter=0;
                                                $query="select * from users";
                                                $query_run=mysqli_query($connect, $query);
                                                while($row=mysqli_fetch_array($query_run)){
                                                    $counter++;

                                                ?>
                                            <tr>

                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td>••••••••••</td>
                                                
                                                <td><a href="inc.process/edit_account_setings.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>

                                                <td><a href="inc.process/delete_account_setings.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" onclick=" return confirm('Sure you want to delete???');" >Delete</button></a></td>
                                                
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                    </div>
                </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            </div>

    </div>

   <?php require 'include/footer.php' ?>