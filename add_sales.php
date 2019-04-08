
<?php 

require 'include/header.php';
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
=======
<?php
$connect = new PDO("mysql:host=localhost;dbname=inventory_management_system", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM product";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["product_name"].'">'.$row["product_name"].'</option>';
 }
 return $output;
}
function fill_customer_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM customer";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["customer_name"].'">'.$row["customer_name"].'</option>';
 }
 return $output;
}
?>

<?php $currentPage = 'add_sales'; include 'include/header.php' ?>
        <div class="container m-t-80">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header">
                  <h4>New sales</h4>
                </div>
                <div class="card-body">
                  <form id="get_order_data" onsubmit="return false">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" align="right">Order Date</label>
                      <div class="col-sm-6">
                        <input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" align="right">Customer Name*</label>
                      <div class="col-sm-6">
                        <select name="customer_name" id="company_name">
                          <option class="pu-input" value="" disabled selected>--select--</option>
                          <?php echo fill_customer_box($connect); ?>
                        </select>
                      </div>
                    </div>


                    <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                      <div class="card-body p-0">
                        <h3>Make a order list</h3>
                        <table align="center" style="width:800px;">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th style="text-align:center;">Item Name</th>
                                          
                                          <th style="text-align:center;">Quantity</th>
                                          <th style="text-align:center;">Price</th>
                                          <th>Total</th>
                                        </tr>
                                      </thead>
                                      <tbody id="invoice_item">
                                        <!-- <tr>
                                            <td><b id="number">1</b></td>
                                            <td>
                                                <select name="pid[]" class="form-control form-control-sm" required>
                                                    <option>Washing Machine</option>
                                                </select>
                                            </td>
                                            <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
                                            <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
                                            <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
                                            <td>Rs.1540</td>
                                        </tr> -->
                                        <tr>
                                              <td><b class="number">1</b></td>
                                              <td>
                                                  <select name="pid[]" class="form-control form-control-sm pid" required>
                                                      <option value="">Choose Product</option>
                                                      <?php echo fill_unit_select_box($connect); ?>
                                                  </select>
                                              </td>
                                              <!-- <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty" value="5"></td> -->   
                                              <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
                                              <td><input name="price[]" type="text" class="form-control form-control-sm price" ></span>
                                              <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
                                              <td>TK.<span class="amt">0</span></td>
                                        </tr>
                                      </tbody>
                                  </table> <!--Table Ends-->
                                  <!-- <center style="padding:10px;">
                                    <button id="add" style="width:150px;" class="btn btn-success">Add</button>
                                    <button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
                                  </center> -->
                      </div> <!--Crad Body Ends-->
                    </div> <!-- Order List Crad Ends-->

                  <p></p>
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

          </div>
        </div>                 
<?php require 'include/footer.php' ?>
<!-- end document-->

<script>
  $(document).ready(function(){

    // addNewRow();

    // $("#add").click(function(){
    //   addNewRow();
    // })

    // function addNewRow(){
    //   $.ajax({
    //     url :"process.php",
    //     method : "POST",
    //     data : {getNewOrderItem:1},
    //     success : function(data){
    //       $("#invoice_item").append(data);
    //       var n = 0;
    //       $(".number").each(function(){
    //         $(this).html(++n);
    //       })
    //     }
    //   })
    // }

    // $("#remove").click(function(){
    //   $("#invoice_item").children("tr:last").remove();
    //   calculate(0,0);
    // })
    $("#invoice_item").delegate(".price","keyup",function(){
      var pid = $(this).val();
      var tr = $(this).parent().parent();
      $(".overlay").show();
      // $.ajax({
      //   url :"process.php",
      //   method : "POST",
      //   dataType : "json",
      //   data : {getPriceAndQty:1,id:pid},
      //   success : function(data){
          
          tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val() );
          
      //   }
      // })
    });
    // $("#invoice_item").delegate(".qty","keyup",function(){
    //   var qty = $(this);
    //   var tr = $(this).parent().parent();
    //   if (isNaN(qty.val())) {
    //     alert("Please enter a valid quantity");
    //     qty.val(1);
    //   }else{
    //     if ((qty.val() - 0) > (tr.find(".tqty").val()-0)) {
    //       alert("Sorry ! This much of quantity is not available");
    //       aty.val(1);
    //     }else{
    //       tr.find(".amt").html(qty.val() * tr.find(".price").val());
    //       calculate(0,0);
    //     }
    //   }

    // });
    function calculate(dis,paid){
      var sub_total = 0;
      var net_total = 0;
      var discount = dis;
      var paid_amt = paid;
      var due = 0;
      $(".amt").each(function(){
        sub_total = sub_total + ($(this).html() * 1);
      })
      
      net_total = sub_total;
      net_total = net_total - discount;
      due = net_total - paid_amt;

      
      }
      



    });

    $("#paid").keyup(function(){
      var paid = $(this).val();
      var discount = $("#discount").val();
      calculate(discount,paid);
    });

  //   $("#order_form").click(function(){

    

  //   if ($("#cust_name").val() === "") {
  //     alert("Please Enter Customer Name");
  //   }else if($("#paid").val() === ""){
  //     alert("Please Enter Paid Amount");
  //   }else{
  //     $.ajax({
  //       url : "process.php",
  //       method : "POST",
  //       data : $("#get_order_data").serialize(),
  //       success : function(data){

  //         if (data === "ORDER_COMPLETED") {
  //           window.location.href = "add_sales.php";
           
  //         }
  //       }
  //     });
  //   }

    

  // });

  });

</script>