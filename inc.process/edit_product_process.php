<?php
require_once('db_connect.php');
$id=$_GET['id'];
?>

<?php include 'header.php'; ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            <?php
                            $query1="select * from product where id=$id ";
							$query1_run=mysqli_query($connect , $query1);
							while($row=mysqli_fetch_array($query1_run)){
								$product_name=$row['product_name'];
								$product_color=$row['product_color'];
								$product_gsm=$row['product_gsm'];
								$unit_price=$row['unit_price'];
								$product_width=$row['product_width'];
								$product_height=$row['product_height'];
							}
                            ?>
                                <form action="edit_product_process_func.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header"><b>Edit Product Information</b></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Provide New Information</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="product_name" class="control-label mb-1">Product Name</label>
                                                <input id="product_name" name="product_name" type="text" class="form-control" value="<?php echo $product_name; ?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="product_color" class="control-label mb-1">Product Color</label>
                                                <input id="product_color" name="product_color" type="text" class="form-control " value="<?php echo $product_color; ?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="product_gsm" class="control-label mb-1">GSM</label>
                                                <input id="product_gsm" name="product_gsm" type="text" class="form-control " value="<?php echo $product_gsm; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="unit_price" class="control-label mb-1">Unit Price</label>
                                                <input id="unit_price" name="unit_price" type="text" class="form-control " value="<?php echo $unit_price; ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="product_width" class="control-label mb-1">Width</label>
                                                        <input id="product_width" name="product_width" type="text" class="form-control " value="<?php echo $product_width; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="product_height" class="control-label mb-1">Height</label>
                                                    <div class="input-group">
                                                        <input id="product_height" name="product_height" type="text" class="form-control " value="<?php echo $product_height; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                    <span id="payment-button-sending" style="display:none;">Updating...</span>
                                                </button>
                                            </div>
                                        </form>
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
        <?php require 'footer.php' ?>
