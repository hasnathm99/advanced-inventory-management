<?php
require_once('db_connect.php');
require 'header.php';

$edit_id=$_GET['pid'];

//get sales info from id 
$query="select * from sales where pid='$edit_id' ";
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
                                        <p><b>Order Date</b> : <?php echo date("d-m-Y", strtotime($order_date));?></p>  
                                        <p><b>Product Name</b> : <?php echo $pro_name; ?></p>  
                                        <p><b>Total Unit</b> : <?php echo $qty; ?></p>  
                                        <p><b>Sales Rate</b> : <?php echo $price; ?> Tk</p>    
                                        <p><b>Total</b> : <?php echo $sub_total; ?> Tk</p>  
                                        <p><b>Discount</b> : <?php echo $discount; ?> Tk</p>
                                        <p><b>Net Total</b> : <?php echo $net_total; ?> Tk</p>   
                                        <br>

                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Payment Date</th>
                                                <th>Paid Amount</th>                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter=0;
                                            $query="select payment_date,payment from customer_due where customer_pid='$edit_id' ";
                                            $query_run=mysqli_query($connect, $query);
                                            while($row=mysqli_fetch_array($query_run)){
                                                $counter++;
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($row['payment_date']));?></td>
                                                <td><?php echo $row['payment']; ?> Tk</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                         <?php
                                         $query="select sum(payment),net_total from customer_due where customer_pid= '$edit_id' ";
                                         $query_run=mysqli_query($connect, $query);
                                         while( $row=mysqli_fetch_array($query_run)){
                                             $net_total=$row['net_total'];
                                             $payment=$row['sum(payment)'];
                                             @$due=$net_total - $payment;
                                         }
                                             ?>
                                             <p><b>Present Due</b> : <?php echo $due; ?> Tk</p>
                                             <a href="pay_due_process.php?id=<?php echo $edit_id; ?>"><button type="button" class="btn btn-success btn-md">Pay Now</button></a>
                                             <br>
                                             <br>
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


