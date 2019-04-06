<?php
require_once('db_connect.php');

require 'header.php';

$edit_id=$_GET['id'];

//get sales info from id 
$query="select * from customer where id='$edit_id' ";
$query_run=mysqli_query($connect ,  $query);
if($query_run){
    while($row=mysqli_fetch_array($query_run)){
        $company_name=$row['company_name'];
        $customer_name=$row['customer_name'];
        $phn_no_1=$row['phn_no_1'];
        $phn_no_2=$row['phn_no_2'];
        $email=$row['email'];
        $address=$row['address'];
        $city=$row['city'];
        $zip_code=$row['zip_code'];
        $country=$row['country'];

         
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
                                        <p><b>Company Name</b> : <?php echo $company_name; ?></p>  
                                        <p><b>Customer Name</b> : <?php echo $customer_name; ?></p>  
                                        <p><b>Contact No 1</b> : <?php echo $phn_no_1; ?></p>  
                                        <p><b>Contact No 2</b> : <?php echo $phn_no_2; ?></p>  
                                        <p><b>Email</b> : <?php echo $email; ?></p>  
                                        <p><b>Address</b> : <?php echo $address; ?></p>  
                                        <p><b>City</b> : <?php echo $city; ?></p>  
                                        <p><b>Zipcode</b> : <?php echo $zip_code; ?></p>  
                                        <p><b>Country</b> : <?php echo $country; ?></p>  
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

