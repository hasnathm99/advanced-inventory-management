<?php
require_once('db_connect.php');

require 'header.php';

$edit_id=$_GET['id'];

//get sales info from id 
$query="select * from sales where id='$edit_id' ";
$query_run=mysqli_query($connect ,  $query);
if($query_run){
    while($row=mysqli_fetch_array($query_run)){
        $order_date=$row['order_date'];
        $cust_name=$row['cust_name'];
        $pro_name=$row['pro_name'];
        $qty=$row['qty'];
        $price=$row['price'];
        $sub_total=$row['sub_total'];
        $discount=$row['discount'];
        $net_total=$row['net_total'];
        $paid=$row['paid'];
        $due=$row['due'];
        $p_l=$row['p_l'];


         
    }
}
?>
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
                                        <h3>Customer Sales Information</h3>
                                        <br>
                                        <p><b>Customer Name</b> : <?php echo $cust_name; ?></p>  
                                        <p><b>Order Date</b> : <?php echo $order_date; ?></p>  
                                        <p><b>Product Name</b> : <?php echo $pro_name; ?></p>  
                                        <p><b>Total Unit</b> : <?php echo $qty; ?></p>  
                                        <p><b>Sales Rate</b> : <?php echo $price; ?></p>  
                                        <p><b>Discount</b> : <?php echo $discount; ?></p>  
                                        <p><b>Net Total</b> : <?php echo $net_total; ?></p>  
                                        <p><b>Paid</b> : <?php echo $paid; ?></p>  
                                        <p><b>Due</b> : <?php echo $due; ?></p>  
                                        <br>
                                        
                                        <thead>
                                        
                                        </thead>
                                        <tbody>
                                        
                                            <?php  ?>
                                          
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
                                    <p>Copyright © 2018 </p>
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

    <?php require 'footer.php' ?>
<!-- end document-->

