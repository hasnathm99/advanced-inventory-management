<?php
require_once('db_connect.php');

require 'header.php';

$edit_id=$_GET['id'];

//get sales info from id 
$query="select * from purchase where id='$edit_id' ";
$query_run=mysqli_query($connect ,  $query);
if($query_run){
    while($row=mysqli_fetch_array($query_run)){
        $order_date=$row['order_date'];
        $supplier_name=$row['supplier_name'];
        $product_name=$row['product_name'];
        $qty=$row['qty'];
        $unit_type=$row['unit_type'];
        $buy_price=$row['buy_price'];   
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
                                        <h3>Product Purchase Information</h3>
                                        <br>
                                        <p><b>Supplier Name</b> : <?php echo $supplier_name; ?></p>  
                                        <p><b>Buy Date</b> : <?php echo $order_date; ?></p>  
                                        <p><b>Product Name</b> : <?php echo $product_name; ?></p>  
                                        <p><b>Quantity</b> : <?php echo $qty .' '. $unit_type;; ?></p>  
                                        <p><b>Buy Price</b> : <?php echo $buy_price; ?></p>  
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

