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
                                        <h3>Customer Due Table</h3>
                                        <br>
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Customer Name</th>
                                                <th>Product Order Date</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Paid</th>
                                                <th>Due</th>
                                                <!-- <th colspan="2" style="text-align: center;">Action</th> -->                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter=0;
                                            $query="select * from sales where due > 0 order by order_date desc";
                                            $query_run=mysqli_query($connect, $query);
                                            while($row=mysqli_fetch_array($query_run)){
                                                $counter++;
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['cust_name'] ?></td>
                                                <td ><?php echo date("d-m-Y", strtotime($row['order_date']));?></td>
                                                <td><?php echo $row['pro_name']; ?></td>
                                                <td><?php echo $row['qty']; ?></td>
                                                <td><?php echo $row['net_total']; ?></td>
                                                <td><?php echo $row['paid']; ?></td>
                                                <td><?php echo $row['due']; ?></td>
                                                                                         
                                            </tr>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <!-- END DATA TABLE-->
                                <!-- calculation -->
                                
                            </div>
                        </div>

                        <!-- End the Copy From Here -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>All rights reserved. <a href="https://colorlib.com"></a>.</p>
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

