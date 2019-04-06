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
                            $query1="select * from sales where id=$id ";
							$query1_run=mysqli_query($connect , $query1);
							while($row=mysqli_fetch_array($query1_run)){
                                $pid=$row['pid'];
								$order_date=$row['order_date'];
                                $customer_name=$row['cust_name'];
								$product_name=$row['pro_name'];
                                $quantity=$row['qty'];
                                $p_unit_price=$row['p_unit_price'];
                                $sale_price=$row['price'];
                                $discount=$row['discount'];
                                $net_total=$row['net_total'];
                                $paid=$row['paid'];
                                $due=$row['due'];
                                $profit_loss=$row['p_l'];
								
								
							}
                            ?>
                                 <form method="POST" action="edit_sales_report_process_func.php?id=<?php echo $id; ?>">
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
                                                                         <option value="<?php echo $row['cust_name']; ?>" >---Select---</option>
                                                                         <?php
                                                                         $query="select * from customer ";
                                                                         $query_run=mysqli_query($connect,$query);
                                                                         $row_count=mysqli_num_rows($query_run);
                                                                         while($row=mysqli_fetch_array($query_run)){
                                                                             ?>
                                                                             <option value="<?php echo $row['customer_name']; ?>" required> <?php echo $row['customer_name']; ?></option>
                                                                             <?php
                                                                         }
                                                                         ?>
                                                                     </select><span> &nbsp;&nbsp;<?php echo $customer_name;  ?></span>
                                                                 </div>
                                                             </div>
                                                             
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-6">
                                                                 <div class="form-group">
                                                                     <label for="order_date" class="control-label mb-1">Order Date</label>
                                                                     <input id="order_date" name="order_date" type="date" class="form-control" value="<?php echo $order_date; ?>" required>
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
                                                                 <option value="<?php echo $row['product_name']; ?>" >---Select---</option>
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
                                                             </select><?php echo $product_name; ?>
                                                                 
                                                             </div>
                                                         </td>
                                                         <td><div >
                                                             <div class="form-group">
                                                                 <!-- <label for="ream" class="control-label ">Ream</label> -->
                                                                 <input id="qty" name="qty" type="text" class="form-control" required>
                                                                 <?php echo $quantity; ?>
                                                             </div>
                                                         </div></td>
                                                         <td><div >
                                                             <div class="form-group">
                                                                 
                                                                 <input id="p_unit_price" name="p_unit_price" type="text" class="form-control" required>
                                                                 <?php echo $p_unit_price; ?>
                                                             </div>
                                                         </div></td>
                                                         <td><div >
                                                             <div class="form-group">
                                                                 <!-- <label for="s_unit_price" class="control-label">Sale Unit Price</label> -->
                                                                 <input id="s_unit_price" name="s_unit_price" type="text" class="form-control" required>
                                                                 <?php echo $sale_price; ?>
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
                                                <input type="text"  name="sub_total" class="form-control form-control-sm" id="sub_total" />
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
                                              <div class="col-sm-6">
                                                <input type="text" name="discount" class="form-control form-control-sm" id="discount" required>
                                                <?php echo $discount; ?>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                                              <div class="col-sm-6">
                                                <input type="text"  name="net_total" class="form-control form-control-sm" id="net_total" />
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                                              <div class="col-sm-6">
                                                <input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
                                                <?php echo $paid; ?>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
                                              <div class="col-sm-6">
                                                <input type="text"  name="due" class="form-control form-control-sm" id="due" />
                                                <?php echo $due; ?>
                                              </div>
                                            </div>
                                         </div>
                                     </div>
                                     <input type="hidden" name="pid" value="<?php echo $pid; ?>" >
                                     <div align="center">
                                         <input type="submit" name="submit" class="btn btn-info" value="Insert" />
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

<script >
    $(function() {
        $("#qty, #s_unit_price").on("keydown keyup", sum);
        $("#discount").on("keydown keyup", sum);
        $("#paid").on("keydown keyup", sum);

      function sum() {
        $("#sub_total").val(Number($("#qty").val()) * Number($("#s_unit_price").val()));
        $("#total").val(Number($("#qty").val()) * Number($("#s_unit_price").val()));
        $("#net_total").val(Number($("#sub_total").val()) - Number($("#discount").val()));
        $("#due").val(Number($("#net_total").val()) - Number($("#paid").val()));
      
      }
      


    });
</script>