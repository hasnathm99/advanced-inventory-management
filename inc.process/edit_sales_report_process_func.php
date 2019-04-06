<?php
require_once('db_connect.php');

$edit_id=$_GET['id'];

if(isset($_POST['submit'])){

	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
     $pid=test_input($_POST['pid']);
     $customer_name=test_input($_POST['customer_name']);
     $order_date=test_input($_POST['order_date']);
     $pro_name=test_input($_POST['pro_name']);
     $qty=test_input($_POST['qty']);
     $p_unit_price=test_input($_POST['p_unit_price']);
     $s_unit_price=test_input($_POST['s_unit_price']);
     $sub_total=test_input($_POST['sub_total']);
     $discount=test_input($_POST['discount']);
     $net_total=test_input($_POST['net_total']);
     $paid=test_input($_POST['paid']);
     $due=test_input($_POST['due']);
     @$x=($qty * $s_unit_price) - ($qty * $p_unit_price);
     @$p_l=$x - $discount;

        $query="update sales set
                    pid='$pid' , 
                    order_date='$order_date' ,
                    cust_name='$customer_name' ,
                    pro_name= '$pro_name' ,
                    qty= '$qty' ,
                    p_unit_price= '$p_unit_price' ,
                        price= '$s_unit_price' ,
                    sub_total= '$sub_total' ,
                    discount= '$discount' ,
                    net_total= '$net_total' ,
                    paid= '$paid' ,
                    due= '$due' ,
                    p_l='$p_l'  where id='$edit_id' ";
        $query_run=mysqli_query($connect, $query);
        if($query_run){
            $message="Information Updated Successfully";
            header( "refresh:0;url=../sales_report.php" );
        }else{
            $message="Can not Update Information.Try Again... ";
            header( "refresh:0;url=../sales_report.php" );
        }

}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>