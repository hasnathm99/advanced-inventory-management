<?php require 'include/header.php' ?>
<?php 
// if(!isset($_SESSION['user_id'])){
//   echo '<h2 style="color:#C9302C">Log in First<h2>';
//   header('refresh:1 ; url=login.php');
//   die();
// }

// $user_id=$_SESSION['user_id'];

include('include/db_connect.php');
?>
                        <!-- Start to Copy From Here -->
<br>
<br>
                            <form method="POST" action="inc.process/add_sales_process.php">
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <div class="col-lg-7">
                                        <div class="card">
                                            <div class="card-header">sales Information</div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h3 class="text-center title-2">Provide New Sales Information</h3>
                                                </div>
                                                <hr>
                                                
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="customer_name" class="control-label mb-1">Customer Name</label>
                                                            <div class="input-group">
                                                                <select  name="customer_name" required>
                                                                    <option value="" >---Select---</option>
                                                                    <?php
                                                                    $query="select * from customer ";
                                                                    $query_run=mysqli_query($connect,$query);
                                                                    $row_count=mysqli_num_rows($query_run);
                                                                    while($row=mysqli_fetch_array($query_run)){
                                                                        ?>
                                                                        <option value="<?php echo $row['customer_name']; ?>" required> <?php echo $row['customer_name']; ?></option required>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="order_date" class="control-label mb-1">Order Date</label>
                                                                <input id="order_date" name="order_date" type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                            <table class="table table-borderless table-data3" id="item_table">
                                                
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Type</th>
                                                        <th>Purchase Unit Price</th>
                                                        <th>Sales Unit Price</th>
                                                        
                                                        <th>Total</th>              
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <td>
                                                            <div class="form-group">
                                                                <!-- <label for="product_name" class="control-label ">Product</label> -->
                                                                <select  name="pro_name" required>
                                                                    <option value="" >---Select---</option>
                                                                    <?php
                                                                    $query="select * from product ";
                                                                    $query_run=mysqli_query($connect,$query);
                                                                    $row_count=mysqli_num_rows($query_run);
                                                                    while($row=mysqli_fetch_array($query_run)){
                                                                        ?>
                                                                        <option value="<?php echo $row['product_name']; ?>" required> <?php echo $row['product_name']; ?></option required>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td><div >
                                                            <div class="form-group">
                                                                <!-- <label for="ream" class="control-label ">Ream</label> -->
                                                                <input id="ream" name="ream" type="text" class="form-control" required>
                                                                
                                                            </div>
                                                        </div></td>
                                                        <td><div >
                                                            <div class="form-group">
                                                                <select  name="unit_type" required>
                                                                    <option value="" >---Select---</option>
                                                                    <?php
                                                                    $query="select * from unit_type ";
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
                                                        </div></td>
                                                        <td><div >
                                                            <div class="form-group">
                                                                
                                                                <input id="p_unit_price" name="p_unit_price" type="text" class="form-control" required>
                                                                
                                                            </div>
                                                        </div></td>
                                                        <td><div >
                                                            <div class="form-group">
                                                                <!-- <label for="s_unit_price" class="control-label">Sale Unit Price</label> -->
                                                                <input id="s_unit_price" name="s_unit_price" type="text" class="form-control" required>
                                                                
                                                            </div>
                                                        </div></td>
                                                        <td><div >
                                                            <div class="form-group">
                                                                <!-- <label for="total" class="control-label ">Total</label> -->
                                                                <input id="total" name="total" type="text" class="form-control" >
                                                                
                                                            </div>
                                                        </div></td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group row">
                             <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
                             <div class="col-sm-6">
                               <input type="text"  name="sub_total" class="form-control form-control-sm" id="sub_total" required/>
                             </div>
                           </div>

                           <div class="form-group row">
                             <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
                             <div class="col-sm-6">
                               <input type="text" name="discount" class="form-control form-control-sm" id="discount" required/>
                             </div>
                           </div>
                           <div class="form-group row">
                             <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                             <div class="col-sm-6">
                               <input type="text"  name="net_total" class="form-control form-control-sm" id="net_total" required/>
                             </div>
                           </div>
                           <div class="form-group row">
                             <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                             <div class="col-sm-6">
                               <input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
                             </div>
                           </div>
                           <div class="form-group row">
                             <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
                             <div class="col-sm-6">
                               <input type="text"  name="due" class="form-control form-control-sm" id="due" required/>
                             </div>
                           </div>
                           
                                        <!-- END DATA TABLE-->
                                    </div>
                                </div>
                                <div align="center">
                                    <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                                </div>
                            </form>


                        <!-- end of  form -->


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
<script >
    $(function() {
        $("#ream, #s_unit_price").on("keydown keyup", sum);
        $("#discount").on("keydown keyup", sum);
        $("#paid").on("keydown keyup", sum);

      function sum() {
        $("#sub_total").val(Number($("#ream").val()) * Number($("#s_unit_price").val()));
        $("#total").val(Number($("#ream").val()) * Number($("#s_unit_price").val()));
        $("#net_total").val(Number($("#sub_total").val()) - Number($("#discount").val()));
        $("#due").val(Number($("#net_total").val()) - Number($("#paid").val()));
      
      }
      


    });
</script>