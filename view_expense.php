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
                            <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <h3>Expense Table</h3>
                                        <br>
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Title</th>
                                                <th>Amount</th>
                                                <th>Remarks</th>
                                                <th>Date</th>
                                                <th colspan="2" style="text-align: center;">Action</th>                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $counter=0;
                                                
                                                $query="select * from expense";
                                                $query_run=mysqli_query($connect, $query);
                                                while($row=mysqli_fetch_array($query_run)){
                                                    $counter++;

                                                ?>
                                            <tr>

                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['remarks']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><a href="inc.process/edit_expense_process.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>

                                                <td><a href="inc.process/delete_expense_process.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" >Delete</button></a></td>
                                                
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

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
