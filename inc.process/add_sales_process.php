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
  //get total_ream from product table

    $query1="select total_qty from product where product_name='$pro_name' ";
    $query1_run=mysqli_query($connect , $query1);
    while($row=mysqli_fetch_array($query1_run)){
       $total_qty=$row['total_qty'];
    }

    //check if product is available or not
    if($total_qty>$qty){
    $update_qty=$total_qty - $qty;
  //calculate profit/loss
    //$p_l=($s_unit_price - $m_unit_price) * $ream;

  //insert into sales table
      $query2="insert into sales(pid,order_date,cust_name,pro_name,qty,unit_type,p_unit_price,price,sub_total,discount,net_total,paid,due,p_l) values('$pid' , '$order_date' , '$cust_name' , '$pro_name' , '$qty' , '$unit_type' , '$p_unit_price' , '$price' , '$sub_total' , '$discount' , '$net_total' , '$paid' , '$due' , '$p_l')";
      $query2_run=mysqli_query($connect , $query2);

      $query3="update product set total_qty='$update_qty' where product_name='$pro_name' ";
      $query3_run=mysqli_query($connect , $query3);

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
