<?php
session_start();
ob_start();

require('db_connect.php');

if(isset($_POST['submit'])){


    $pid=uniqid();
    
     $cust_name=$_POST['customer_name'];
     $order_date=$_POST['order_date'];
     $pro_name=$_POST['pro_name'];
     $qty=$_POST['ream'];
     $unit_type=$_POST['unit_type'];
     $p_unit_price=$_POST['p_unit_price'];
     $price=$_POST['s_unit_price'];
     $sub_total=$_POST['sub_total'];
     $discount=$_POST['discount'];
     $net_total=$_POST['net_total'];
     $paid=$_POST['paid'];
     $due=$_POST['due'];
     $x=($qty * $price) - ($qty * $p_unit_price);
     $p_l=$x - $discount;

     //set due status value
     if($due > 0){
      $due_status=0;
     }else{
      $due_status=1;
     }

  //get total_ream from product table
    $query1="select total_qty from product where product_name='$pro_name' ";
    $query1_run=mysqli_query($connect , $query1);
    while($row=mysqli_fetch_array($query1_run)){
       $total_qty=$row['total_qty'];
    }

    //check if product is available or not
    if($total_qty>$qty){
    $update_qty=$total_qty - $qty;

  //insert into sales table
      $query2="insert into sales(pid,order_date,cust_name,pro_name,qty,unit_type,p_unit_price,price,sub_total,discount,net_total,paid,due,p_l,due_status) values('$pid' , '$order_date' , '$cust_name' , '$pro_name' , '$qty' , '$unit_type' , '$p_unit_price' , '$price' , '$sub_total' , '$discount' , '$net_total' , '$paid' , '$due' , '$p_l' , '$due_status')";
      $query2_run=mysqli_query($connect , $query2);

      $query3="update product set total_qty='$update_qty' where product_name='$pro_name' ";
      $query3_run=mysqli_query($connect , $query3);

      //insert into customer_due table if due > 0
      if($due > 0){
        $query4="insert into customer_due(customer_name,customer_pid,net_total,payment,due,payment_date) values('$cust_name' , '$pid' , '$net_total' , '$paid' , '$due' , '$order_date')";
        $query4_run=mysqli_query($connect , $query4);
      }


      if($query3_run){
      $message= "Sales successful";
      // header('location: ../add_sales.php');
        header("Refresh:0; url=../add_sales.php");
      }
    
  }else{
    $message="You Don Not Have Enough Product.";
    header("Refresh:0; url=../add_sales.php");
  }
}

?>
<script type="text/javascript">
  var message='<?php echo $message; ?>';
  alert(message);
</script>
