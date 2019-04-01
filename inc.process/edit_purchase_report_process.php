<?php include 'header.php'; ?>
<?php
require_once('db_connect.php');
$id=$_GET['id'];
?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            <?php
                            $query1="select * from purchase where id=$id ";
							$query1_run=mysqli_query($connect , $query1);
							while($row=mysqli_fetch_array($query1_run)){
								$supplier_name=$row['supplier_name'];
                                $order_date=$row['order_date'];
								$product_name=$row['product_name'];
								$qty=$row['qty'];
                                $buy_price=$row['buy_price'];
								$sale_price=$row['sale_price'];
							}
                            ?>
                                <form action="edit_purchase_report_process_func.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header"><b>Edit Purchase Information</b></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Provide New Purchase Information</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="supplier_name" class="control-label mb-1">Supplier Name</label>
                                                <input id="supplier_name" name="supplier_name" type="text" class="form-control" value="<?php echo $supplier_name; ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="product_name" class="control-label ">Product Name (<?php echo '<b>'.$product_name.'</b>'; ?>)<b style="color: red" >Must Required</b></label>
                                                <select  name="product_name" id="product_name" class="form-control" required >
                                                    <option value="NULL" ></option>
                                                    <?php
                                                    $query="select * from product ";
                                                    $query_run=mysqli_query($connect,$query);
                                                    $row_count=mysqli_num_rows($query_run);
                                                    while($row=mysqli_fetch_array($query_run)){
                                                        ?>
                                                        <option value="<?php echo $row['product_name']; ?>" > <?php echo $row['product_name']; ?></option >
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="order_date" class="control-label mb-1">Order Date(<?php echo $order_date; ?>)</label>
                                                <input id="order_date" name="order_date" type="date" class="form-control " value="<?php echo $order_date; ?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="qty" class="control-label mb-1"> Quantity(<?php echo $qty; ?>)</label>
                                                <input id="qty" name="qty" type="text" class="form-control " >
                                            </div>
                                            <div class="form-group">
                                                <label for="buy_price" class="control-label mb-1">Buy Price(<?php  echo $buy_price; ?>)</label>
                                                <input id="buy_price" name="buy_price" type="text" class="form-control " >
                                            </div>
                                            <div class="form-group">
                                                <label for="sale_price" class="control-label mb-1">Sale Price(<?php echo $sale_price; ?>)</label>
                                                <input id="sale_price" name="sale_price" type="text" class="form-control " >
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

