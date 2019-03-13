<?php
require_once('include\db_connect.php');
?>
<?php require 'include/header.php' ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            
                                <form action="inc.process\add_expense_process.php" method="POST">
                                    <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header"><b>Expense Information Form</b></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Provide The Information</h3>
                                        </div>
                                        <hr>
                                            <div class="form-group">
                                                <label for="title" class="control-label mb-1">Title</label>
                                                <input id="title" name="title" type="text" class="form-control" required="must fill a title" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="amount" class="control-label mb-1">Amount</label>
                                                <input id="amount" name="amount" type="text" class="form-control " required="must fill amount">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="remarks" class="control-label mb-1">Remarks</label>
                                                <input id="remarks" name="remarks" type="text" class="form-control " >
                                            </div>
                                            <div class="form-group">
                                                <label for="date" class="control-label mb-1">Date</label>
                                                <input id="date" name="date" type="date" class="form-control " required="enter date">
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Save</span>
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
                                    <p>Copyright © 2018 Utshab Technologies. All rights reserved. Template by <a href="https://colorlib.com">Utshab Technologies</a>.</p>
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
