<?php 
require 'include/header.php';
require_once('include/db_connect.php');
?>

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            
                                <form action="inc.process/add_user_process.php" method="POST">
                                    <div class="col-lg-10" >
                                <div class="card">
                                    <div class="card-header"><b>New User Form</b></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Provide The Information</h3>
                                        </div>
                                        <hr>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Username</label>
                                                <input id="name" name="name" type="text" class="form-control" required="must fill a Username" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="password" class="control-label mb-1">Password</label>
                                                <input id="password" name="password" type="text" class="form-control " required="must fill Password">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="repassword" class="control-label mb-1">Password Again</label>
                                                <input id="repassword" name="repassword" type="text" class="form-control " placeholder="Two Password Must Be Same" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="userlevel" class="control-label mb-1">Level</label>
                                                <input id="userlevel" name="userlevel" type="number" class="form-control " required placeholder="Must be 0 or 1" >
                                                <label style="color: red">0 for Admin, 1 for other User</label>
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Save User</span>
                                                    <span id="payment-button-sending" style="display:none;">Saving...</span>
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                                </form>
                            
                        <!-- End the Copy From Here -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Utshab Technologies. All rights reserved. Template by <a href="https://utshabtech.com">Utshab Technologies</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php require 'include/footer.php' ?>
<!-- end document-->
