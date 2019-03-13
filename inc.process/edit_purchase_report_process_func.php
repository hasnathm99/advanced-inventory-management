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
    $product_name=test_input($_POST['product_name']);
    $company_name=test_input($_POST['company_name']);
    $ream=test_input($_POST['ream']);
    $unit_price=test_input($_POST['unit_price']);
    

    $query="update purchase set
    			company_name='$company_name' , 
    			product_name='$product_name' ,
    			ream= '$ream' ,
    			unit_price='$unit_price'  where id='$edit_id' ";
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