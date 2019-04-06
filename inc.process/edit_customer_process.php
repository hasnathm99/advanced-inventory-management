<?php
require_once('db_connect.php');
require 'header.php';
$id=$_GET['id'];
 ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            <?php
                            $query1="select * from customer where id=$id ";
                            $query1_run=mysqli_query($connect , $query1);
                            while($row=mysqli_fetch_array($query1_run)){
                                
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
                            ?>
                                <form action="edit_customer_process_func.php?id=<?php echo $id; ?>" method="POST" >
                                    <div class="col-lg-10">
                                        <div class="card">
                                            <div class="card-header"><b>Customer Information</b></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h3 class="text-center title-2"> Add New Customer</h3>
                                                </div>
                                                <hr>
                                                
                                                    <div class="form-group">
                                                        <label for="company_name" class="control-label mb-1">Company Name</label>
                                                        <input id="company_name" name="company_name" type="text" class="form-control"  value="<?php echo $customer_name; ?>" required >
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="customer_name" class="control-label mb-1">Customer Name</label>
                                                        <input id="customer_name" name="customer_name" type="text" class="form-control" value="<?php echo $company_name; ?>" required >
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="phn_no_1" class="control-label mb-1">Phone No 1</label>
                                                                <input id="phn_no_1" name="phn_no_1" type="number" class="form-control " value="<?php echo $phn_no_1;?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="phn_no_2" class="control-label mb-1">Phone No 2</label>
                                                            <div class="input-group">
                                                                <input id="phn_no_2" name="phn_no_2" type="number" class="form-control " value="<?php echo $phn_no_2; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="email" class="control-label mb-1">Email</label>
                                                        <input id="email" name="email" type="text" class="form-control " value="<?php echo $email; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address" class="control-label mb-1">Address</label>
                                                        <input id="address" name="address" type="text" class="form-control " value="<?php echo $address; ?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="city" class="control-label mb-1">City</label>
                                                                <input id="city" name="city" type="text" class="form-control " value="<?php echo $city; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="zip_code" class="control-label mb-1">Zip Code</label>
                                                            <div class="input-group">
                                                                <input id="zip_code" name="zip_code" type="text" class="form-control" value="<?php echo $zip_code;  ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="country" class="control-label mb-1">Country</label>
                                                                <select  name="country" class="form-control"  value="<?php echo $country; ?>" required>
                                                                    <option value="" >---Select---</option>
                                                                    <?php
                                                                    $query="select * from country ";
                                                                    $query_run=mysqli_query($connect,$query);
                                                                    $row_count=mysqli_num_rows($query_run);
                                                                    while($row=mysqli_fetch_array($query_run)){
                                                                        ?>
                                                                        <option value="<?php echo $row['name']; ?>" required> <?php echo $row['name']; ?></option required>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
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
                                    <p>Copyright © 2019 Hasnath Rahman  &  Sudipta Mondal. All rights reserved. Template by <a href="#"></a>Hasnath Rahman  &  Sudipta Mondal</p>
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
