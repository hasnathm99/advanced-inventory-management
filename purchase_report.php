<?php
require_once('include\db_connect.php');
?>
<?php $currentPage = 'product_report'; include 'include/header.php' ?>
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

                                        <h3>Product Table</h3>
                                        <br>
                                        
                                        <thead>
                                            <tr>
                                                <th >SL NO</th>
                                                <th>Company Name</th>
                                                <th>Product Name</th>
                                                <th>Purchase Unit Price</th>
                                                <th>Purchase Ream</th>
                                                <th>Total Amount</th>
                                                <th>Purchase Date</th>
                                                <th colspan="2" style="text-align: center;">Action</th>                               
                                            </tr>
                                        </thead>
                                        <?php
                                                $counter=0;

                                                $result_per_page=5;
                                                $query="select * from purchase";
                                                $query_run=mysqli_query($connect, $query);
                                                $number_of_result=mysqli_num_rows($query_run);
                                                $number_of_page=ceil($number_of_result/$result_per_page);
                                                if(!isset($_GET['page'])){ 
                                                    $page=1;
                                                }else{
                                                    $page=$_GET['page'];
                                                }
                                                echo 'You are on Page <b>'.$page.'</b><br>';

                                                $starting_limit_num=($page-1)*$result_per_page;
                                                $query="select * from purchase limit " .$starting_limit_num.",".$result_per_page;
                                                $query_run=mysqli_query($connect , $query);

                                                
                                                for($page=1;$page<=$number_of_page;$page++){
                                                // echo 
                                                echo '<a href="purchase_report.php?page=' .$page.' ">'. $page . '</a> ';
                                                 }
                                                
                                                // $query="select * from product";
                                                // $query_run=mysqli_query($connect, $query);
                                                while($row=mysqli_fetch_array($query_run)){
                                                    $counter++;

                                                ?>
                                        <tbody>
                                             
                                            <tr>

                                                <td ><?php echo $counter; ?></td>
                                                <td><?php echo $row['company_name']; ?></td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td><?php echo $row['unit_price']; ?></td>
                                                <td><?php echo $row['ream']; ?></td>
                                                <td><?php echo $row['total']; ?></td>
                                                <td ><?php echo date("d-m-Y", strtotime($row['order_date']));?></td>
                                                <td><a href="inc.process\edit_purchase_report_process.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>

                                                <td><a href="inc.process/delete_product.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" onclick=" return confirm('Sure you want to delete???');" >Delete</button></a></td>
                                                

                                            <?php  
                                            } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                                <?php

                                ?>
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
