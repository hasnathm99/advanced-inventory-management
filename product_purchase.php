<?php
//index.php
include 'include/header.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('Location: login.php');
  die();
 }


$connect = new PDO("mysql:host=localhost;dbname=inventory_management_system", "root", "");

//function to get product names
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

//function to get unit type
function fill_unit_type_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM unit_type";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
 }
 return $output;
}

?>
<?php $currentPage = 'add_product';  ?>
                        <!-- Start to Copy From Here -->

                            <form method="POST" id="insert_form">
                                <span id="error"></span>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <div class="col-lg-7">
                                        <div class="card m-t-70">
                                            <div class="card-header">Purchase Information</div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h3 class="text-center title-2">Provide Information</h3>
                                                </div>
                                                <hr>
                                                
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="supplier_name" class="control-label mb-1">Supplier Name</label>
                                                            <div class="input-group">
                                                                <input id="supplier_name" name="supplier_name" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-6">
                                                            <label for="dc_no" class="control-label mb-1">DC NO</label>
                                                            <div class="input-group">
                                                                <input id="dc_no" name="dc_no" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="dc_date" class="control-label mb-1">DC Date</label>
                                                                <input id="dc_date" name="dc_date" type="date" class="form-control">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="order_date" class="control-label mb-1">Order Date</label>
                                                                <input id="order_date" name="order_date" type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                            <table class="table table-borderless table-data3" id="item_table">
                                                <button type="button" name="add" class="btn btn-success btn-sm add" style="margin-bottom: 5px;"><i class="fas fa-plus"></i>  Add Row</button>
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Type</th>
                                                        <th>Price Rate</th>
                                                        <th></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                                <!-- <tfoot>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td><input type="number" name="t_ream" class="t_ream" value=""placeholder="Total Ream" readonly=""></td>
                                                        <td></td>
                                                        <td><input type="number" name="" class="subt" value="" placeholder="Total Spent" readonly=""></td>
                                                        <td></td>
                                                        
                                                    </tr>
                                                    
                                                </tfoot> -->
                                                
                                            </table>
                                        </div>
                                        
                                        <!-- END DATA TABLE-->
                                    </div>
                                </div>
                                <div align="center">
                                    <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                                </div>
                            </form>


                        <!-- end of second form -->


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

<?php require 'include/footer.php' ?>
<!-- end document-->
<script>
  $(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select name="product_name[]" class="pu-input product_name"><option value="">--Select--</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><input type="text" name="qty[]" class="pu-input ream"></td>';

  html += '<td><select name="unit_type[]" class="pu-input unit_type"><option value="">--Select--</option><?php echo fill_unit_type_box($connect); ?></select></td>';

  html += '<td><input type="text" name="buy_price[]" class="pu-input unit_price"></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span><i class="fas fa-minus"></i></span></button></td></tr>';
$('#item_table').append(html);
 });

 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });


// $('table').on('keyup', 'input', function(){ // run anytime the value changes
//     $thisRow = $(this).parent().parent();console.log($thisRow.find('td>.total'));
//     var ream  = Number($thisRow.find('td>.ream').val());   // get value of field
//     var price = Number($thisRow.find('td>.unit_price').val()); // convert it to a float

//     $thisRow.find('td>.total').val(ream * price);

//   });
// Subtotal of values ream
// $(document).on("change", ".ream", function() {
//     var sum = 0;
//     $(".ream").each(function(){
//         sum += +$(this).val();
//     });
//     $(".t_ream").val(sum);
// });

// Subtotal of values total
// $(document).on("change", ".total", function() {
//     var sum = 0;
//     $(".total").each(function(){
//         sum += +$(this).val();
//     });
//     $(".subt").val(sum);
// });
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.product_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"inc.process/add_purchase_process.php",
    method:"POST",
    data: form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      
      // $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
      alert('Information Saved Successfully');
      var url = "inc.process/purchase_update_stock_process.php";    
      $(location).attr('href',url);
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });

 
    

});
</script>
