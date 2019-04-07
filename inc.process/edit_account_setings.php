<?php
include 'header.php'; 
require_once('db_connect.php');
$id=$_GET['id'];
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            <?php
                            $query1="select * from users where id=$id ";
							$query1_run=mysqli_query($connect , $query1);
							while($row=mysqli_fetch_array($query1_run)){
								$name=$row['name'];
								$password=$row['password'];
								
							}
                            ?>
                                <form action="edit_account_setings_func.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header"><b>Edit User Information</b></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Provide New Information</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">UserName</label>
                                                <input id="name" name="name" type="text" class="form-control" value="<?php echo $name; ?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="password" class="control-label mb-1">User Password</label>
                                                <input id="password" name="password" type="text" class="form-control " value="<?php echo $password; ?>">
                                            </div>
                                        
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                    <span id="payment-button-sending" style="display:none;">Updating...</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                </form>
                            
                        <!-- End the Copy From Here -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Utshab Technologies. All rights reserved. Template by <a href="https://colorlib.com">Utshab Technologies</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
<?php require 'footer.php' ?>
