<?php
ob_start();
session_start();

require_once('db_connect.php');
$user_id=$_SESSION['user_id'];
$edit_id=$_GET['id'];

if(isset($_POST['submit'])){
	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $supplier_name=test_input($_POST['supplier_name']);
    $product_name=test_input($_POST['product_name']);
    $order_date=test_input($_POST['order_date']);
    $qty=test_input($_POST['qty']);
    $buy_price=test_input($_POST['buy_price']);
    $sale_price=test_input($_POST['sale_price']);
    
    $query="update purchase set
    			supplier_name='$supplier_name' , 
    			product_name='$product_name' ,
                order_date= '$order_date' ,
                qty= '$qty' ,
    			buy_price= '$buy_price' ,
    			sale_price='$sale_price'  where id='$edit_id' ";
    $query_run=mysqli_query($connect, $query);
    if($query_run){
            $message="Information Updated Successfully";
            header( "refresh:0;url=../purchase_report.php" );
    	
    }else{
            $message="Can not Update Information.Try Again... ";
            header( "refresh:0;url=../purchase_report.php" );
    	
    }
}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>